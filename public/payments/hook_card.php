<?php
include('config.php');
error_reporting(0);
date_default_timezone_set("Asia/Ho_Chi_Minh");
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);
if (isset($data["token"]) and $data["token"] == CONFIG['GATE']['CARD']['TOKEN']) {
    $token_card = $data["token"];
    $order_id = $data["order_id"];
    $status = $data["status"];
    $seri = $data["seri"];
    $menhgiathuc = $data["value_back"];
    $menhgiagui = $data["value_send"];
    $menhgianhan = $data["money"];
    $keyword = "" . CONFIG['KEYWORD'] . "";
    $token_bot = "" . CONFIG['TELEGRAM']['TOKEN_BOT'] . "";
    $chat_id = "" . CONFIG['TELEGRAM']['USER_ID'] . "";
    $noidung = "$keyword$order_id";
    if ($menhgiathuc == 0) {
        file_put_contents('ttt/' . CONFIG['KEYWORD'] . '' . $order_id . '/status.log', 3);
        exit;
    }
    if ($menhgiathuc != $menhgiagui) {
        file_put_contents('ttt/' . CONFIG['KEYWORD'] . '' . $order_id . '/status.log', 4);
        exit;
    }
    $con = mysqli_connect("" . CONFIG['DATABASE']['HOST'] . "", "" . CONFIG['DATABASE']['USERNAME'] . "", "" . CONFIG['DATABASE']['PASSWORD'] . "", "" . CONFIG['DATABASE']['DBNAME'] . "");
    $thucnhan = $menhgianhan * 100;
    $check_order = mysqli_query($con, "SELECT * FROM v2_order WHERE id LIKE '$order_id'");
    while ($rowget_order = mysqli_fetch_array($check_order)) {
        $total_amount = $rowget_order["total_amount"];
        $user_id = $rowget_order["user_id"];
    }
    $check_user = mysqli_query($con, "SELECT * FROM v2_user WHERE id LIKE '$user_id'");
    while ($rowget = mysqli_fetch_array($check_user)) {
        $oldbalance = $rowget["balance"];
        $email = $rowget["email"];
        $newbalance = $oldbalance + $thucnhan;
        $tienconlai = $newbalance - $total_amount;
    }
    if ($menhgiathuc == $menhgiagui) {
        if ($newbalance >= $total_amount) {
            file_put_contents('ttt/' . CONFIG['KEYWORD'] . '' . $order_id . '/status.log', 1);
            $update_balance = "UPDATE v2_user SET balance='$tienconlai' WHERE email='$email'";
            mysqli_query($con, $update_balance);
            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => "" . CONFIG['URL']['CALLBACK'] . "",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => '{
    					                        "comment": "' . $noidung . '",
    					                        "amount": "' . $menhgianhan . '",
    					                        "method": "CARD",
    					                        "tranId": "' . $seri . '",
    					                        "token": "' . $token_card . '"
    					                      }',
                    CURLOPT_HTTPHEADER => array(
                        "Connection:  close",
                        "Accept:  application/json",
                        "User-Agent:  Mozilla/5.0 (Linux; Android 7.1.2; IM-A870S Build/N2G47E; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.105 Mobile Safari/537.36",
                        "Content-Type:  application/json",
                        "Accept-Language:  vi-VN,en-US;q=0.8",
                    )
                )
            );
            $response = curl_exec($curl);
            curl_close($curl);
            exit();
        }
        if ($newbalance < $total_amount) {
            file_put_contents('ttt/' . CONFIG['KEYWORD'] . '' . $order_id . '/status.log', 2);
            $update_balance = "UPDATE v2_user SET balance='$newbalance' WHERE email='$email'";
            mysqli_query($con, $update_balance);
        }
    }
} else {
    echo "Không Được Phép!";
}
?>