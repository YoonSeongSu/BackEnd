<?php
include "db_connection.php";

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

#check idowner
$query1 = "SELECT * FROM info WHERE email='$email'and password='$password'and name='$name'";
$res = mysqli_query($db,$query1);
$num = mysqli_num_rows($res);
#null value checker


if($num != 1)
{
  echo "<script>alert('Wrong Info');history.back();</script>";
}
else if ($num==1)
{
  #random pw generate
  $new_pw = substr(hash("sha256",mt_rand()),1,10);
  $new_pw_hash = hash("sha256",$new_pw);
  #update pw
  $query2 = "UPDATE info SET pw_hash='$new_pw_hash' WHERE id='$id'";
  $res2 = mysqli_query($db,$query2);
  mysqli_close($db);

  #send tmp pw

  echo "<script>alert('새로운 비밀번호가 전송되었습니다.')</script>";
}

echo "<form method=post action='sendmail.php' name='frm'>";
echo "<input type='hidden' name='email' value=$mail>";
echo "<input type='hidden' name='new_pw' value=$new_pw>";
echo"<input type='hidden' name='name' value=$name>";
echo"</form>";

echo"<script language='javascript'>";
echo"document.frm.submit();</script>";



?>