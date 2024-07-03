<?php
const CONFIG = [
                    'DOMAINV2B' => "domain.com", //domain của v2board
                    'TOKEN' => "b716b3550783f37dsdf68ba02a", 
                    'SIGNATIRE' => "63be3339a3c74be45e0dbcc357bba8f9d9afb068fc87d28419fa404ede071aa2", //tùy thích
                    'KEYWORD' => "mua", //chữ thường không in hoa
                    'URL' =>[
                        'CALLBACK'=> "https://domain.com/payments/hook.php" // truy cập https://t.me/getmyid_bot để lấy
                        ],
                    'TELEGRAM' =>[
                        'USER_ID'=> "xxx", // truy cập https://t.me/getmyid_bot để lấy
                        'TOKEN_BOT'=> "5493289327:xxxx" // Nếu dùng bot mặc định vui lòng chat với   để nhận thông báo
                        ],
                    'DATABASE' =>[
                        'HOST'=> "localhost", 
                        'USERNAME'=> "data",
                        'PASSWORD'=> "data",
                        'DBNAME'=> "data"
                        ],
                    'GATE' =>[
                        'VIETINBANK'=> [
                            'ACCOUNT_NUMBER' => "888888", // số tài khoản
                            'ACCOUNT_NAME' => "Nguyễn Văn Quang",
                            'BANKID' => "970415",
                            'WEBHOOK' => "https://domain.com/api/v1/guest/payment/notify/VietinBank/Kmh8OpM8"
                        ],
                        'VIETTELPAY'=> [
                            'ACCOUNT_NUMBER' => "888888", // số tài khoản
                            'ACCOUNT_NAME' => "Nguyễn Văn Quang",
                            'BANKID' => "970422"
                        ],
                        
                    ]
                ];