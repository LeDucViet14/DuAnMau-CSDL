<?php
    // session_start();
    function insert_taikhoan($email, $user, $pass){
        $sql = "INSERT INTO duanmau2023.taikhoan (user, pass, email)
                VALUES ('$user', '$pass', '$email')";
        pdo_execute($sql);
    }

    function dangnhap($user, $pass){
        $sql = "SELECT * FROM duanmau2023.taikhoan WHERE user='$user' and pass='$pass'";
        $taikhoan = pdo_query_one($sql);
        // if($taikhoan != false) {
        //     $_SESSION['user'] = $taikhoan;
        // }else{
        //     return "Thong tin tai khoan sai";
        // }
        return $taikhoan;
        
    }

    function dangxuat() {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
    }

    function update_taikhoan($id, $user, $pass, $email, $address, $tel) {
        $sql = "UPDATE duanmau2023.taikhoan SET `user`='$user',`pass`='$pass',`email`='$email',`address`='$address',`tel`='$tel' WHERE `id`='$id'";
        pdo_execute($sql);
    }

    function update_tk_role($id, $user, $pass, $email, $address, $tel, $role) {
        $sql = "UPDATE duanmau2023.taikhoan SET `user`='$user',`pass`='$pass',`email`='$email',`address`='$address',`tel`='$tel',`role`='$role' WHERE `id`='$id'";
        pdo_execute($sql);
    }

    function xoatk($id){
        $sql = "DELETE FROM `taikhoan` WHERE id = $id";
        pdo_execute($sql);
    }

    function sendMail($email){
        $sql = "SELECT * FROM duanmau2023.taikhoan WHERE email = '$email'";
        $taikhoan = pdo_query_one($sql);
        if($taikhoan != false) {
            sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);
            return "thanh cong. mk của bạn là ".$taikhoan['pass'];
        }else{
            return "email ban nhap khong co trong he thong";
        }
    }

    function sendMailPass($email, $username, $pass){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '9799dac9fa679b';                     //SMTP username
            $mail->Password   = 'b3a2e1b239a19e';                               //SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('duanmau@example.com', 'DuAnMau');
            $mail->addAddress($email, $username);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nguoi dung quen mat khau';
            $mail->Body    = 'Mat khau cua ban la' .$pass;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function loadall_taikhoan(){
        $sql = "SELECT * FROM duanmau2023.taikhoan WHERE 1";
        $taikhoan = pdo_query($sql);
        return $taikhoan;
    }

    function loadone_taikhoan($id){
        $sql = "SELECT * FROM duanmau2023.taikhoan WHERE id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }
