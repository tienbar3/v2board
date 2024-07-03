
<?php
    $linkQR = "https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=" . urlencode("2|99|" . CONFIG['GATE']['MOMO']['PHONE'] . "|" . CONFIG['GATE']['MOMO']['ACCOUNT_NAME'] . "||0|0|".$amount."|".strtoupper(CONFIG['KEYWORD'])."".$order_id."|transfer_myqr");
?>
<html lang="vi">
    
    <head id="j_idt6">
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>
            Thanh Toán MOMO
        </title>
        <meta name="description" content="Cổng thanh toán qua Ví điện tử MoMo" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="robots" content="all,follow" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="pragma" content="no-cache" />
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Google fonts - Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"
        />
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="css/style.default.css?version=<?php echo time();?>" id="theme-stylesheet" />
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="css/style.css?version=<?php echo time();?>" />
        <link rel="stylesheet" href="css/qr-code.css?version=<?php echo time();?>" />
        <link rel="stylesheet" href="css/qr-code-tablet.css?version=<?php echo time();?>" />
      
        <!-- Font Awesome CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style type="text/css">
		
			
            .container-fluid {
				width: 40 % !important;
				min-width: 750px!important;
			}
			.info-box {
				min-height: 600px;
			}
			#page{
				padding: 50px 0;
			}
			.image-qr-code{
				max-width: 300px;
			}
			.note-box{
				background-color: #ffde4f;
				padding: 25px 15px;
				max-width: 400px;
				margin: 20px auto;
			}
			.code{
				font-weight: 700;
				color: red;
				font-size: 22px;
			}
			.code span{
				color: #5d5b5b;
				cursor: pointer;
			}
			.note-title{
				font-weight: bold;
				font-size: 18px;
				color: #3f3f3f;
				padding-bottom: 5px;
			}
			.momo-buttom{
				margin-bottom: 20px;
			}
			@media (max-height: 750px){
				#page {
					padding: 0;
				}
				.provider{
					margin-bottom: 10px;
				}
			}
			.sweet-alert h2{
				padding-top: 12px;
				font-size: 19px;
				text-transform: uppercase;
				font-weight: 700;
				color: #5cb85c;
			}
			.provider{
				margin-top: 19px;
				font-size: 10px;
				color: #b9b9b9;
				font-style: italic;
			}
			.provider a{
				color: #b9b9b9
			}
        </style>
		
    </head>
    
    <body>
        
        <div id="page">
            
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 left hidden-xs">
                        <div class="info-box">
                            <div class="expiredAt" style="position: relative; padding-bottom: 20px; color: white">
                                <h3 style="color: #e8e8e8;">
                                    Đơn Hàng Hết Hạn Sau
                                </h3>
                                <span name="expiredAt" style="font-size: 1.7rem;">
                                </span>
                            </div>
							
                            <div class="entry">
                                <p>
                                    <i class="fa fa-money" aria-hidden="true" style="">
                                    </i>
                                    <span style="padding-left: 5px;">
                                        Số Tiền
                                    </span>
                                    <br />
                                    <span style="padding-left: 25px;">
                                        <?php echo number_format($amount);?>đ
                                    </span>
                                </p>
                            </div>
                            <div class="entry">
                                <p>
                                    <i class="fa fa-credit-card" aria-hidden="true" style="">
                                    </i>
                                    <span style="padding-left: 5px;">
                                        Đơn Hàng
                                    </span>
                                    <br />
                                    <span style="padding-left: 25px;word-break: keep-all;">
                                        <?php echo $trade_no;?>
                                    </span>
                                </p>
                            </div>
                            <div class="entry">
                                <p>
                                    <i class="fa fa-barcode" aria-hidden="true" style="">
                                    </i>
                                    <span style="padding-left: 5px;">
                                        Mã Đơn Hàng
                                    </span>
                                    <br />
                                    <span style="padding-left: 25px;word-break: break-all;">
                                        <?php echo strtoupper(CONFIG['KEYWORD']);?><?php echo $order_id;?>
                                    </span>
                                </p>
                            </div>
                            <div class="entry" style="width: 100%;text-align: center;position: absolute;bottom: 10px; left: 0;">
                                <a href="<?php echo $return_url;?>"
                                style="color: #e8e8e8;font-weight: 200;">
                                <i class="fa fa-arrow-left" aria-hidden="true" style=""></i>
                                <span>Quay Lại</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 right">
                        <div class="content">
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="message" id="loginForm">
                                        
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="qr-code">
                                                    <img class="image-qr-code" src="<?php echo $linkQR;?>"
                                                    alt="paymentcode" />
                                                    <p class="hidden-md">
                                                        Đơn Hàng Hết Hạn Sau:
                                                        <b name="expiredAt" style="font-size: 1rem;">
                                                        </b>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="info-qr-code">
                                                    <p>
                                                        <img width="25" src="images/qr-code-1.png"
                                                        alt="" />
                                                        Sử Dụng <strong> App MoMo</strong>  Để Quét Mã Phía Trên.
                                                    </p>
													<p style="text-align: center;">Hoặc Chuyển Khoản Với Thông Tin Sau</p>
													<div>Số Tiền: <span style="font-weight:bold"><?php echo number_format($amount);?> VNĐ</span></div><br>
														<div>Ví Điện Tử: <span style="font-weight:bold">MOMO</span></div><br>
														<div class="stkmomo">Số Tài Khoản: <span style="font-weight:bold" class="copyclipboard" data-content="<?php echo CONFIG['GATE']['MOMO']['PHONE'];?>"><?php echo CONFIG['GATE']['MOMO']['PHONE'];?></span> <i class="fa fa-clipboard" aria-hidden="true"></i></div><br>
														<div>Chủ Tài Khoản: </span> <span style="font-weight:bold"><?php echo CONFIG['GATE']['MOMO']['ACCOUNT_NAME'];?></span></div><br>
													<div class="note-box">
													    
														<div class="note-title"><span style="font-weight:bold; font-size:20px">NỘI DUNG CHUYỂN KHOẢN</span></div>
														<div class="code"><?php echo strtoupper(CONFIG['KEYWORD']);?><?php echo $order_id;?> <span><i class="fa fa-clipboard" aria-hidden="true"></i></span></div>
													</div>
													
													<div class="hidden-md momo-buttom">
														<a class="btn btn-success btn-lg" href="https://nhantien.momo.vn/<?php echo CONFIG['GATE']['MOMO']['PHONE'];?>/<?php echo $amount;?>">Mở Ứng Dụng MoMo <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
													</div>
													
                                                    <p id="status">
                                                        <i class="fa fa-spinner fa-spin">
                                                        </i>
                                                        Đang Chờ Thanh Toán ...
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="provider">Cung Cấp Bởi <a href="https://zalo.me/0848892333">api.speed4g.me</a></div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row info-box-ipad hidden-md">
                            <div class="col-xs-4 col-sm-4 col-md-4 info-box-border">
                                <div style="word-break: break-all;">
                                    <i class="fa fa-credit-card" aria-hidden="true" style="">
                                    </i>
                                    <h5 style="padding-left: 5px;">
                                        Đơn Hàng
                                    </h5>
                                    <span style="word-break: break-all;">
                                        <?php echo $trade_no;?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 info-box-border">
                                <i class="fa fa-credit-card" aria-hidden="true" style="">
                                </i>
                                <h5 style="padding-left: 5px;">
                                    Số Tiền
                                </h5>
                                <b>
                                   <?php echo number_format($amount);?>đ
                                </b>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 nowrap">
                                <div style="word-break: break-all;">
                                    <i class="fa fa-barcode" aria-hidden="true" style="">
                                    </i>
                                    <h5 style="padding-left: 5px;">Mã Đơn Hàng</h5>
                                    <span style="white-space: pre-wrap;"><?php echo strtoupper(CONFIG['KEYWORD']);?><?php echo $order_id;?></span>
                                </div>
                            </div>
							
							
                            <div class="col-xs-12 back-merchant">
                                <a href="<?php echo $return_url;?>"
                                style="color: #e8e8e8;font-weight: 200;cursor: pointer;" id="cancelOrderT">
                                <i class="fa fa-arrow-left" aria-hidden="true" style=""></i>
                                <span>Quay Lại</span></a>
                            </div>
							
							
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
		
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		
		<script>
			var order_id = "<?php echo strtoupper(CONFIG['KEYWORD']);?><?php echo $order_id;?>";
			var loopCheck;
			var Url = '<?php echo "https://".$_SERVER['SERVER_NAME']."/payments/status.php"; ?>';
			setInterval(function(){ check() }, 3000);
			function check(){
				$.ajax({
					url: Url,
					type: 'POST',
					dataType: 'JSON',
					data: {order_id: order_id},
						success : function (res){
							if(res.status === 1){
								clearInterval(loopCheck);
								$("#status").html('Thanh Toán Thành Công! Đang Chuyển Về Trang Mua Hàng.');
								setTimeout(function(){ window.location.href = "<?php echo $return_url;?>"; }, 1500);
							}
							if(res.status === 2){
								clearInterval(loopCheck);
								$("#status").html('Thanh Toán Thành Công! Nhưng Đơn Hàng Đã Hủy Do Quá Thời Gian Thanh Toán, Vui Lòng Liên Hệ Admin.');
							}
						}
				});
			}
			var left = <?php echo time();?>-<?php echo $time;?>;
			console.log(left);
			var offset = (29*60)-left;
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
				else{
					window.location.href = "<?php echo $return_url;?>";
				}
			}, 1000);
			
			$('.code span, .code').click(function(){
				copy(order_id);
				swal({
					type: "success",
					title: "Đã Copy",
					timer: 1000,
					showConfirmButton: false
				  });
			})
			var stk_atm = "<?php echo CONFIG['GATE']['MOMO']['PHONE'];?>";
			$('.stkmomo span, .stkmomo').click(function(){
				copy(stk_atm);
				swal({
					type: "success",
					title: "Đã Copy",
					timer: 1000,
					showConfirmButton: false
				  });
			})
			function copy(text) {
				var input = document.createElement('input');
				input.setAttribute('value', text);
				document.body.appendChild(input);
				input.select();
				var result = document.execCommand('copy');
				document.body.removeChild(input);
				return result;
			 }
			
		</script>
    </body>

</html>