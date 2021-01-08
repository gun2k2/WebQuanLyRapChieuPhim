
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer; // Cần hay không cũng được
use PHPMailer\PHPMailer\SMTP;      // Cần hay không cũng được
use PHPMailer\PHPMailer\Exception; // Cần hay không cũng được


require 'PHPMailer/PHPMailer-master/src/Exception.php';
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';

// Instantiation and passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
//    $mail->SMTPDebug = 2;                      // Thông báo code xử lí khi đã gửi email
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Server gmail của google . Từ khóa là smtp gmail google
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contact.cgv4@gmail.com';                   // tài khoản gmail của mình
    $mail->Password   = 'hoangminhtuan';                           // password gmail của mình
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above
    $mail->CharSet = 'UTF-8';
    $email = $this->input->post('email');
    //Recipients
    $mail->setFrom($email);      // Khi người dùng nhận được thư email thì sẽ báo email gửi từ gmail nào và tên người gửi
  
    $mail->addAddress('n18dcat061@student.ptithcm.edu.vn');     // khách hàng 1: Email khách hàng và tên khách hàng
//    $mail->addAddress('ellen@example.com');                        // khách hàng 2
//    $mail->addAddress('ellen@example.com');                        // khách hàng 3
    $mail->addReplyTo('contact.cgv4@gmail.com', 'PhuongPhan');  // Email và tên để khi khách hàng muốn hồi âm lại cho mình
//    $mail->addCC('cc@example.com'); // Thêm người nhận
//    $mail->addBCC('bcc@example.com'); // Thêm người nhận

    // Attachments
   // $mail->addAttachment('chibu.jpg');               // thêm file gửi cho khách hàng
//    $mail->addAttachment('chibu.jpg', 'tên cần đổi.jpg');    // thêm file và có thể đổi tên file trước khi gửi cho khách hàng

    // Content Nội dung email
    $mail->isHTML(true);                                  // Thư email sẽ viết được ở dạng HTML - Nếu k còn thì false
    $mail->Subject = 'Contact Cinema'; // Tiêu Đề Email

    $name     =     $this->input->post('name');
                            
     $email    = $this->input->post('email');        
                            
     $noidung        =   $this->input->post('noidung');          

    $body= " <b>Contact form $email !</b> <br> <br> <br> <b>Thông tin khách hàng: </b> $email | $name <br> <br> <b> Nội dung: </b> $noidung  !!  ";
   
    $mail->Body    = $body; // Nội dụng Email khi dùng HTML
//    $mail->AltBody = 'Nội dung khi không dùng html (false)'; // Văn bản thuần khi không dùng HTML .

   if( $mail->send())
   {
     $this->session->flashdata('message');
     //redirect(base_url('login_controller/forgotpassword'));
         
   }
    
} catch (Exception $e) {
    echo "Thư gửi thật bại. Chi tiết lỗi : {$mail->ErrorInfo}";
}
