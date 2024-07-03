<?php
error_reporting(0);
include('config.php');
$con = mysqli_connect("".CONFIG['DATABASE']['HOST']."", "".CONFIG['DATABASE']['USERNAME']."", "".CONFIG['DATABASE']['PASSWORD']."", "".CONFIG['DATABASE']['DBNAME']."");
$token_bot = "" . CONFIG['TELEGRAM']['TOKEN_BOT'] . "";
$chat_id = "" . CONFIG['TELEGRAM']['USER_ID'] . "";
$rawInput = file_get_contents("php://input");
$DataInput = json_decode($rawInput);
if (isset($DataInput->token) and $DataInput->token == CONFIG['TOKEN'] or isset($DataInput->token) and $DataInput->token == CONFIG['GATE']['CARD']['TOKEN']) {
    if (isset($DataInput->method)) {
        $tranId = $DataInput->tranId;
        $amount = (int) $DataInput->amount;
        $method = $DataInput->method;
        $comment = $DataInput->comment;
        $comment = strtolower($comment);
        if (file_exists('ttt/' . $comment . '/status.log') and file_exists('ttt/' . $comment . '/price.log') and file_exists('ttt/' . $comment . '/trade_no.log')) {
            $status = file_get_contents('ttt/' . $comment . '/status.log');
            $price = (int) file_get_contents('ttt/' . $comment . '/price.log');
            $trade_no = file_get_contents('ttt/' . $comment . '/trade_no.log');
            $email = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM v2_user WHERE id LIKE '".mysqli_fetch_array(mysqli_query($con, "SELECT * FROM v2_order WHERE trade_no LIKE '$trade_no'"))['user_id']."'"))['email'];
            if ($amount >= $price) {
                if ($status == "0") {
                    file_put_contents('ttt/' . $comment . '/status.log', 1);
                    mysqli_query($con, "UPDATE v2_order SET status='1' WHERE trade_no='$trade_no'");
                    $text_succes = "𝙉𝙊𝙏𝙄𝙁𝙄𝘾𝘼𝙏𝙄𝙊𝙉\n—————————————————————\n<strong>Email:</strong> $email\n—————————————————————\n<strong>Đơn Hàng:</strong> $comment\n—————————————————————\n<strong>Số Tiền:</strong> " . number_format($price) . " VNĐ\n—————————————————————\n<strong>Thanh Toán:</strong> $method\n—————————————————————\n";
                    $data = [
                        'text' => $text_succes,
                        'chat_id' => $chat_id,
                        'parse_mode' => 'HTML',
                    ];
                    file_get_contents("https://api.telegram.org/bot$token_bot/sendMessage?" . http_build_query($data));
                }
            }
        }
    }
} else {
    echo "Không Được Phép!";
}