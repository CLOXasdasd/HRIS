<?php
		

			use PHPMailer\PHPMailer\PHPMailer;
		    use PHPMailer\PHPMailer\Exception;

			require './PHPMailer/src/Exception.php';
		    require './PHPMailer/src/PHPMailer.php';
		    require './PHPMailer/src/SMTP.php';

		   	$email = "chesterallancustodio@gmail.com"; 
		        $mail = new PHPMailer(true);
		        $mail->isSMTP();
		        $mail->Host = 'smtp.gmail.com';
		        $mail->SMTPAuth = true;
		        // $mail->Username = 'PurchaseRequest_Asia@texwipe.com';
		        // $mail->Password = 'KE+BBtF^9Kp5BSur1';
		        // $mail->Username = 'HRIS_Notifications@itwconnect.onmicrosoft.com';
		        // $mail->Password = 'ZUB%7yDEk2YKDu@y';

		        $mail->Username = 'chester.atiph@gmail.com';
        		$mail->Password = 'sjiwzhmwlgkargnh';
		        $mail->Port = 587;
		        $mail->SMTPSecure = "tls";
		        // $mail->setFrom('PurchaseRequest_Asia@texwipe.com', 'Texwipe HRIS Approval');
		        $mail->setFrom('chester.atiph@gmail.com', 'Texwipe HRIS Approval');
		        $mail->addAddress($email); 
		      
		        $mail->isHTML(true);                                  // Set email format to HTML
		        $mail->Subject = "APPROVAL OF HRIS REQUEST ";
		        $mail->Body = " <!DOCTYPE html>
                        <html>
                            <head>
                                <style>
                                    div {
                                      background-color: white;
                                      width: 700px;
                                      margin-left: auto;
                                      margin-right: auto;
                                      text-align: center;
                                    }

                                    h2, p {
                                        text-align: center;
                                    }
                                 
                                </style>
                            </head>
                            <body>
                                <div>
                                    <img src='https://tukuz.com/wp-content/uploads/2021/02/texwipe-logo-vector.png' width='650' height=350'>
                                    <h1> Number is waiting for approval</h1>
                                    <h2> " .  date("D M j Y g:i:s T") . " </h2>
                                   
                                </div>
                            </body>
                        </html>";

		        
		    ?>