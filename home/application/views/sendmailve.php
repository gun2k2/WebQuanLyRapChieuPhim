
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
    $mail->Username   = 'n18dcat061@student.ptithcm.edu.vn';                   // tài khoản gmail của mình
    $mail->Password   = 'n18dcat061#160600';                           // password gmail của mình
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('n18dcat061@student.ptithcm.edu.vn
', 'CGV Thủ Đức');      // Khi người dùng nhận được thư email thì sẽ báo email gửi từ gmail nào và tên người gửi
   $email = $this->input->post('email');
    $mail->addAddress($email);     // khách hàng 1: Email khách hàng và tên khách hàng
//    $mail->addAddress('ellen@example.com');                        // khách hàng 2
//    $mail->addAddress('ellen@example.com');                        // khách hàng 3
    $mail->addReplyTo('n18dcat061@student.ptithcm.edu.vn', 'PhuongPhan');  // Email và tên để khi khách hàng muốn hồi âm lại cho mình
//    $mail->addCC('cc@example.com'); // Thêm người nhận
//    $mail->addBCC('bcc@example.com'); // Thêm người nhận

    // Attachments
   // $mail->addAttachment('chibu.jpg');               // thêm file gửi cho khách hàng
//    $mail->addAttachment('chibu.jpg', 'tên cần đổi.jpg');    // thêm file và có thể đổi tên file trước khi gửi cho khách hàng

    // Content Nội dung email
    $mail->isHTML(true);                                  // Thư email sẽ viết được ở dạng HTML - Nếu k còn thì false
    $mail->Subject = 'Đặt Vé Thành Công '; // Tiêu Đề Email
    $this->load->model('admin/showlichchieu_model');
    $this->load->model('admin/showphim_model');
    $this->load->model('admin/showphong_model');
    
    $lichchieu = $this->showlichchieu_model->ktdanhmuc($mangketqua['lichchieu']);
	foreach ($lichchieu as $key => $value) {
        $ngaychieu = $value['ngaychieu'];
        $giochieu = $value['thoigian'];
    }
    
    $tenphim = $mangketqua['tenphim'];
    $id_lichchieu = $mangketqua['lichchieu'];
    $phong = $mangketqua['phong'];
    $maghe = $mangketqua['maghe'];
    $giave = number_format($mangketqua['giave']);
    
    $mave     =     $mangketqua['ma_ve'];

    $body= "<h3> <b>Cám ơn bạn đã đặt vé!</b> </h3> <br> Thông tin vé của bạn là: <br> Mã vé: $mave <br> Tên Phim: $tenphim <br> Lịch Chiếu: $ngaychieu | $giochieu <br>  Phòng: $phong <br> Ghế: $maghe <br> Gía vé: $giave <br> Cám ơn quý khách !!  ";
   
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
