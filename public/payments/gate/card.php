
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport" />
    <link rel="stylesheet" href="https://speed4g.me/payments/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://speed4g.me/payments/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://speed4g.me/payments/assets/css/app.css">
    <link rel="stylesheet" href="https://speed4g.me/payments/assets/css/responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://speed4g.me/payments/assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://speed4g.me/payments/assets/js/plugins.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://speed4g.me/payments/assets/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4784117378785533"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <link rel="stylesheet" id="css-main" href="https://speed4g.me/payments/assets/css/dashmix.min.css" />
    <title>Thanh Toán Thẻ Cào</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://www.tuanori.com/assets/css/glightbox.css" type="text/css">
    <link rel="stylesheet" href="https://www.tuanori.com/assets/css/dataTables.bootstrap4.min.css">
    <script src="https://www.tuanori.com/assets/js/jquery.dataTables.min.js"></script>
    <script src="https://www.tuanori.com/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.2/dist/lazyload.min.js"></script>
    <script src="https://www.tuanori.com/assets/js/lazyload.js"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>
    <script>
        function changeText() {
            document.getElementById("Napthestatus").innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Đang Xử Lí...";
            document.getElementById("Napthe").disabled = true;
        }
    </script>
    
</head>
<?php
include "db_connect.php";
include "config.php";
echo "<script>
      Swal.fire({
        title: 'Chú Ý!',
        text: 'Đơn Hàng Sẽ Hết Hạn Sau 30 Phút Kể Từ Lúc Tạo Đơn, Vui Lòng Lựa Chọn Phương Thức Để Thanh Toán.',
        icon: 'warning',
        confirmButtonText: 'OK'
      });
    </script>";
$check_order = mysqli_query($con, "SELECT * FROM v2_order WHERE id LIKE '$order_id'");
while ($row_order = mysqli_fetch_array($check_order)) {
    $user_id = $row_order["user_id"];
    $trade_no = $row_order["trade_no"];
    $price_name = $row_order["price_name"];
    $plan_id = $row_order["plan_id"];
    $total_amount = $row_order["total_amount"];
    $balance_amount = $row_order["balance_amount"];
    $total_amount_thuc = $total_amount / 100;
    $balance_amount_thuc = $balance_amount / 100;
    $balance = number_format($balance_amount_thuc, 0, '', ',');
}
$check_user = mysqli_query($con, "SELECT * FROM v2_user WHERE id LIKE '$user_id'");
while ($row = mysqli_fetch_array($check_user)) {
    $email = $row["email"];
}
$check_plan = mysqli_query($con, "SELECT * FROM v2_plan WHERE id LIKE '$plan_id'");
while ($row_plan = mysqli_fetch_array($check_plan)) {
    $name_plan = $row_plan["name"];
}



$textnapthe = "Nạp Thẻ";
?>
<?php

?>
<style>
    .lazy-bg {
        width: 753px;
        height: 500px;
        margin: 10px auto;
        background-size: cover;
        background-position: center;
    }
</style>
<body>
    </div>
    <style>
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #ffcd30;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: red;
        }
    </style>
    
    
    <div class="container pt-2" style=" margin-top: 10px;">
        <div class="row">
            
            
            </style>
            
        </div>
        <div class="" style=" margin-top: 2px;justify-content: center;align: center">
            <div class="row">
                <div class="col-xl-12" style="display:block;" id="card">
                    <div class="card">
                        <div class="card-header"> THANH TOÁN CARD VIETTEL</div>
                        <form action method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <select class="form-control mb-3" id="menhgia" name="menhgia">
                                            <option value="">-- Chọn mệnh giá --</option>
                                            <?php $ck = json_decode(file_get_contents('https://api.speed4g.me/api/chietkhaucard'), true);
                                            ?>
                                            <option value="10000"><?php echo $ck[0]['text']; ?></option>
                                            <option value="20000"><?php echo $ck[1]['text']; ?></option>
                                            <option value="30000"><?php echo $ck[2]['text']; ?></option>
                                            <option value="50000"><?php echo $ck[3]['text']; ?></option>
                                            <option value="100000"><?php echo $ck[4]['text']; ?></option>
                                            <option value="200000"><?php echo $ck[5]['text']; ?></option>
                                            <option value="300000"><?php echo $ck[6]['text']; ?></option>
                                            <option value="500000"><?php echo $ck[7]['text']; ?></option>
                                            <option value="1000000"><?php echo $ck[8]['text']; ?></option>
                                            
                                        </select>
                                        <div class="form-group">
                                            <input type="number" required minlength="11" maxlength="14" name="seri"
                                                id="seri" class="form-control mb-3" placeholder="Nhập seri">
                                            <div class="form-group">
                                                <input type="number" required minlength="13" maxlength="15" id="mathe"
                                                    name="mathe" class="form-control mb-3" placeholder="Nhập mã thẻ">
                                                <br />
                                                <div class="form-group" align="center">
                                                    <form action="<?php echo "https://".$_SERVER['SERVER_NAME']."/payments/gate/card.php"?>" method="post">
                                                        <button type="submit" id="Napthe" onsubmit="changeText()"
                                                            class="btn btn-primary btn-block" disabled><span
                                                                id="Napthestatus"><i class="far fa-money-bill-alt"
                                                                    style="font-size:17px"></i>
                                                                Nạp Thẻ</span></button>
                                                    </form>
                                                </div>
                                                <div class="card-header"><a style="color:red;">
                                                        <p>
                                                            - Chỉ nhận thẻ cào Viettel<br>
                                                            - Tiền thừa sẽ được cộng vào tài khoản trên web<br>
                                                            - Sai mệnh giá khiếu nai cũng vô ích</p>
                                                        <p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $giatri = $_POST['menhgia'];
            $seri = $_POST['seri'];
            $pin = $_POST['mathe'];
            if ($giatri == 0) {
                echo "<script>
      Swal.fire({
        title: 'Gửi Thẻ Thất Bại!',
        text: 'Bạn Chưa Lựa Chọn Mệnh Giá Thẻ!',
        icon: 'error',
        confirmButtonText: 'OK'
      });
    </script>";
                exit();
            }
            $data = array("mathe" => "$pin", "seri" => "$seri", "amount" => "$giatri", "order_id" => "$order_id");
            $data_string = json_encode($data);
            $ch = curl_init("https://api.speed4g.me/api/card/" . CONFIG['GATE']['CARD']['TOKEN'] . "");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string)
                )
            );
            $result = curl_exec($ch);
            if (strpos($result, "PENDING") !== false) {
                echo "<script>
      Swal.fire({
        title: 'Gửi Thẻ Thành Công!',
        text: 'Vui Lòng Chờ 1-2 Phút Để Hệ Thống Duyệt Thẻ!',
        icon: 'success',
        confirmButtonText: 'OK'
      });
    </script>";
            }
            if (strpos($result, "charging.card_existed") !== false) {
                $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
                $host = $_SERVER['HTTP_HOST'];
                $uri = $_SERVER['REQUEST_URI'];
                $full_url = $protocol . "://" . $host . $uri;
                echo "<script>
      Swal.fire({
        title: 'Gửi Thẻ Thất Bại!',
        text: 'Mã Thẻ, Serial Đã Tồn Tại. Vui Lòng Kiểm Tra Lại!',
        icon: 'error',
        confirmButtonText: 'OK'
      }).then((result) => {
  if (result.isConfirmed) {
    window.location.href = '$full_url';
  }
});
    </script>";
            }
        }
        ?>
        <script>
            var clipboard = new ClipboardJS('.copy-text');
            clipboard.on('success', function (e) {
                Swal.fire({
                    title: 'Sao Chép Thành Công',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
        <script>
            var left = <?php echo time(); ?> - <?php echo $time; ?>;
            console.log(left);
            var offset = (30 * 60) - left;
            console.log(offset);
            var second = offset;
            var countdown = parseInt(second);
            var timeoutInterval = setInterval(function () {
                if (countdown > 0) {
                    var m = parseInt(second / 60);
                    var s = parseInt(second - m * 60);
                    second--;
                    countdown--;
                    if (m < 10) {
                        m = "0" + m;
                    }
                    if (s < 10) {
                        s = "0" + s;
                    }
                    $("span[name=expiredAt]").html(m + ":" + s);
                    $("b[name=expiredAt]").html(m + ":" + s);
                }
                else {
                    window.location.href = "<?php echo $return_url; ?>";
                }
            }, 1000);
        </script>
        
        <script>
            function changeText() {
                document.getElementById("Napthestatus").innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Đang Xử Lí...";
                document.getElementById("Napthe").disabled = true;
            }
        </script>
        <script>
            var minSeri = 11;
            var maxSeri = 14;
            var minMathe = 13;
            var maxMathe = 15;
            var seri = document.getElementById("seri");
            var mathe = document.getElementById("mathe");
            var button = document.getElementById("Napthe");
            seri.oninput = function () {
                validateInput();
            }
            seri.onchange = function () {
                validateInput();
            }
            mathe.oninput = function () {
                validateInput();
            }
            mathe.onchange = function () {
                validateInput();
            }
            function validateInput() {
                var seriLength = seri.value.length;
                var matheLength = mathe.value.length;
                if (seriLength == minSeri && matheLength == minMathe || seriLength == maxSeri && matheLength == maxMathe) {
                    button.disabled = false;
                } else {
                    button.disabled = true;
                }
            }
        </script>
        <script>
            var order_id = "<?php echo strtoupper(CONFIG['KEYWORD']); ?><?php echo $order_id; ?>";
            var loopCheck;
            var Url = '<?php echo "https://".$_SERVER['SERVER_NAME']."/payments/status.php"; ?>';
            setInterval(function () { check() }, 7000);
            function check() {
                $.ajax({
                    url: Url,
                    type: 'POST',
                    dataType: 'JSON',
                    data: { order_id: order_id },
                    success: function (res) {
                        if (res.status === 1) {
                            Swal.fire({
                                title: "Thanh Toán Thành Công",
                                text: "Trở Lại Trang Mua Hàng Sau 1 Giây!",
                                icon: "success",
                                confirmButtonText: "OK"
                            });
                            clearInterval(loopCheck);
                            setTimeout(function () { window.location.href = "<?php echo $return_url; ?>"; }, 1500);
                        }
                        else if (res.status === 2) {
                            Swal.fire({
                                title: "Thanh Toán Thất Bại",
                                text: "Số Tiền Bạn Nạp Chưa Đủ Để Hoàn Thành Đơn, Vui Lòng Nạp Thêm!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                            clearInterval(loopCheck);
                            setTimeout(function () { window.location.href = "https://<?php echo "".$_SERVER['SERVER_NAME'].""; ?>/#/profile"; }, 1500);
                        }
                        else if (res.status === 3) {
                            Swal.fire({
                                title: "Thanh Toán Thất Bại",
                                text: "Thẻ Lỗi Hoặc Đã Qua Sử Dụng!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                            clearInterval(loopCheck);
                            setTimeout(function () { window.location.href = "<?php echo $return_url; ?>"; }, 1500);
                        }
                        else if (res.status === 4) {
                            Swal.fire({
                                title: "Thanh Toán Thất Bại",
                                text: "Sai Mệnh Giá Thẻ!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                            clearInterval(loopCheck);
                            setTimeout(function () { window.location.href = "<?php echo $return_url; ?>"; }, 1500);
                        }
                    }
                });
            }
        </script>
        <div id="AADIV35">
            <style>
                #footerbanner57A {
                    position: fixed;
                    bottom: 0;
                    transform: translate(-50%, 0%);
                    left: 50%;
                    z-index: 9999;
                }
                .closemex57A {
                    position: absolute;
                    top: -15px;
                    right: -15px;
                    text-decoration: none;
                    font-size: 15px;
                    display: inline-block;
                    width: 30px;
                    height: 30px;
                    line-height: 30px;
                    text-align: center;
                    background-color: #000000;
                    color: #ffffff;
                    border-radius: 50%;
                    z-index: 9999;
                }
            </style>
        </div>
        <style>
            html,
            body {
                cursor: url("https://1.bp.blogspot.com/-qbWo9mPKO2Y/YL9utYdQBdI/AAAAAAAAFs4/mtjGu6u2uGwtJsT4gZG4lbhLV1a5lG6OQCLcBGAsYHQ/s0/mouse-f1.png"), auto;
            }
            a:hover {
                cursor: url("https://1.bp.blogspot.com/-nYv2dLl3oXY/YL9utYBCh8I/AAAAAAAAFtA/wII4lVw5w4k-4isGMY41heTqk8U4TJujgCLcBGAsYHQ/s0/mouse-f2.png"), auto;
            }
        </style>

        <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
        <script type="text/javascript">
            var pusher = new Pusher('10d5ea7e7b632db09c72', {
                encrypted: true
            });
            var channel = pusher.subscribe('GG58091323');
            channel.bind('realtime', function (data) {
                console.log(data.message);
                if (data.message) {
                    if (data.type == 'success') {
                    }
                    swal(data.title, data.message, data.type);
                }
            });
        </script>
        <script src="https://www.tuanori.com/assets/js/glightbox.js"></script>
        <script src="https://www.tuanori.com/assets/js/function.js"></script>
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-G6604DGQR6"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
        <script>
            new ClipboardJS('.copy');
        </script>
        <script src="https://www.tuanori.com/assets/js/popper.min.js"></script>
        <script src="https://www.tuanori.com/assets/js/bootstrap.min.js"></script>
        <script src="https://www.tuanori.com/assets/js/page.min.js"></script>
</body>
</html>
</body>
</html>