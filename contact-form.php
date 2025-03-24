<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
require_once 'phpmailer/Exception.php'; // Adjust the path as per your PHPMailer installation

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'sathishworks04@gmail.com';                  // SMTP username (your Gmail address)
        $mail->Password   = 'pfuc cgsp dtjr hyap';                         // SMTP password (your Gmail password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('sathishworks04@gmail.com', $name);              // Sender's email address and name
        $mail->addAddress('sathishbabumg2003@gmail.com');                  // Recipient's email address

     // Email subject
     $mail->Subject = 'New Contact Message from TNMPDA Website';

     // Email body - HTML format
     $email_body = '<html>
                     <head>
                         <style>
                             body {
                                 font-family: Arial, sans-serif;
                                 background-color: #f4f4f4;
                                 padding: 20px;
                             }
                             .container {
                                 max-width: 600px;
                                 margin: 0 auto;
                                 padding: 20px;
                                 background-color: #ffffff;
                                 border-radius: 10px;
                                 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                             }
                             .header {
                                 text-align: center;
                                 margin-bottom: 20px;
                             }
                             .header img {
                                 max-width: 200px;
                                 height: auto;
                                 margin-bottom: 10px;
                             }
                             .header h2 {
                                 color: #333;
                             }
                             .message {
                                 background-color: #f9f9f9;
                                 padding: 15px;
                                 border-radius: 5px;
                                 margin-bottom: 20px;
                             }
                             .message p {
                                 margin: 0;
                             }
                         </style>
                     </head>
                     <body>
                         <div class="container">
                             <div class="header">
                                 <img src="images/blog/logo1.png" alt="TNMPDA Logo">
                                 <h2>Tamilnad Motor Parts Dealers\' Association (TNMPDA)</h2>
                             </div>
                             
                             <hr>
                             <h3>Contact Details</h3>
                             <p><strong>Name:</strong> ' . htmlspecialchars($name) . '</p>
                             <p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>
                             <p><strong>phone:</strong> ' . htmlspecialchars($phone) . '</p>
                             <p><strong>Message:</strong>' . htmlspecialchars($message) . '</p>
                             
                         </div>
                     </body>
                   </html>';

     $mail->isHTML(true);  // Set email format to HTML
     $mail->Body = $email_body;

     // Send email
     $mail->send();
     echo '<script>alert("Your Email has been sent successfully!"); window.location.replace("contact-01.html");</script>';
    } catch (Exception $e) {
        // Display JavaScript alert with error message
        echo '<script>alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '"); window.location.replace("contact-01.html");</script>';
    }
} else {
    header("Location: contact-01.html");
}
?>
