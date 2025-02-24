<?php
    date_default_timezone_set('Asia/Manila');

    //  $data = "AMCI230708546";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    try{
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        // $mail->Host = 'smtp.office365.com';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'chester.atiph@gmail.com';
        $mail->Password = 'sjiwzhmwlgkargnh';


        // $mail->Username = 'PurchaseRequest_Asia@outlook.com';
        // $mail->Password = 'AdvMolding123!';
        
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";
        // $mail->setFrom('PurchaseRequest_Asia@outlook.com', 'Texwipe PR Request');
        $mail->setFrom('chester.atiph@gmail.com', 'Texwipe Interviewer Session');


        $mail->addAddress($email); 

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Applicatant Interview if di ka busy ";
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
                                    <h1>An interviewee is waiting for your interview please pray first</h1>
                                    <h2> " .  date("D M j Y g:i:s T") . " </h2>
                                </div>
                            </body>
                        </html>";
        $mail->send();
        $getSet = 1;
    } catch(Exception $e) {
        echo $e;
    }
?>