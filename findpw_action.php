<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

include "db_connection.php";

$id = $_POST['id'];

function send_mail($new_pw, $id, $type=0) {
    $s_name = "ADMIN";
    $s_mail = "eaaha@naver.com";
    $s_id = "eaaha";
    $s_pw = "dbstjdtn3416!";
    $u_mail = $id;
    $subject = "임시 비밀번호 발급 이메일입니다.";
    $content = "임시 비밀번호는 [ ".$new_pw." ] 입니다.";

    if ($type != 1) $content = nl2br($content);
    // type : text=0, html=1, text+html=2
    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->IsSMTP();
        //   $mail->SMTPDebug = 2;
    $mail->SMTPSecure = "ssl";
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.naver.com";
    $mail->Port = 465;
    $mail->Username = $s_id;
    $mail->Password = $s_pw;
    $mail->CharSet = 'UTF-8';
    $mail->From = $s_mail;
    $mail->FromName = $s_name;
    $mail->Subject = $subject;
    $mail->AltBody = ""; // optional, comment out and test
    $mail->msgHTML($content);
    $mail->addAddress($u_mail);

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}

#check idowner
$query1 = "SELECT * FROM user_info WHERE id='".$id."'";
$res = mysqli_query($db_connection,$query1);
$num = mysqli_num_rows($res);
#null value checker


if($num != 1)
{
  echo "<script>alert('잘못된 정보입니다.');history.back();</script>";
}
else 
{
  #random pw generate
  $new_pw = mt_rand(10000000,99999999);
  $new_pw_hash = password_hash($new_pw, PASSWORD_DEFAULT);
  #update pw
  $query2 = "UPDATE user_info SET pw='".$new_pw_hash."' WHERE id='".$id."'";
  $res2 = mysqli_query($db_connection,$query2);
  mysqli_close($db_connection);

  #send tmp pw
  
  $mail_check = send_mail($new_pw, $id);

  if ($mail_check) {
      echo "
          <script>
              alert('이메일을 보냈습니다. 메일을 확인하세요.');
              location.href='./login.php';
          </script>
      ";
  } else {
      echo "
          <script>
              alert('이메일 발송 실패. 관리자에게 문의하세요.');
              location.href='./login.php';
          </script>
      ";
  }

}

?>