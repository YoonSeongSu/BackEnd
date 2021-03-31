<?php
	include "../db_connection.php"; //db연결
	include "../password.php"; // 기본내장함수

	$user_id = $_POST['id'].'@'.$_POST['emaddress'];
	$user_pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$user_name = $_POST['name'];
	$address = $_POST['address'];

$sql = mq("insert into member (id,pw,name,adress) values('".$user_id."','".$user_pw."','".$user_name."','".$address."')");

?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">