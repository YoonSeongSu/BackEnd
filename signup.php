<?php
  $user_name = $_POST[ 'username' ];
  $user_pw = $_POST[ 'password' ];
  $password_confirm = $_POST[ 'password_confirm' ];
  if ( !is_null( $username ) ) {
    $jb_conn = mysqli_connect( 'eaaha.kro.kr', 'root', 'fun1', 'capstone', '3306' );
    $jb_sql = "SELECT username FROM user_info WHERE name = '$user_name';";
    $jb_result = mysqli_query( $jb_conn, $jb_sql );
    while ( $jb_row = mysqli_fetch_array( $jb_result ) ) {
      $user_name_e = $jb_row[ 'username' ];
    }
    if ( $user_name == $user_name_e ) {
      $wu = 1;
    } elseif ( $user_pw != $password_confirm ) {
      $wp = 1;
    } else {
      $encrypted_password = password_hash( $user_pw, PASSWORD_DEFAULT);
      $jb_sql_add_user = "INSERT INTO member ( username, password ) VALUES ( '$user_name', '$encrypted_password' );";
      mysqli_query( $jb_conn, $jb_sql_add_user );
      echo "
            <script>
                alert('회원가입이 완료되었습니다.');
                location.href='login.php';
            </script>
        ";
    }
  }
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>회원 가입</title>
    <style>
      body { font-family: sans-serif; font-size: 14px; }
      input, button { font-family: inherit; font-size: inherit; }
    </style>
  </head>
  <body>
    <h1>회원 가입</h1>
    <form action="register.php" method="POST">
    <fieldset>
				<legend>입력사항</legend>
					<table>
                    <tr>
							<td>이메일</td>
							<td><input type="text" name="email">@<select name="emadress"><option value="naver.com">naver.com</option><option value="nate.com">nate.com</option>
							<option value="gmail.com">gmail.com</option><option value="kakao.com">kakao.com</option><option value="daum.net">daum.net</option></select></td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<td><input type="password" size="35" name="userpw" placeholder="비밀번호"></td>
						</tr>
						<tr>
							<td>이름</td>
							<td><input type="text" size="35" name="name" placeholder="이름"></td>
						</tr>
						<tr>
							<td>주소</td>
							<td><input type="text" size="35" name="adress" placeholder="주소"></td>
						</tr>
					</table>

				<input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />
			
		</fieldset>
      <?php
        if ( $wu == 1 ) {
          echo "<p>아이디가 중복되었습니다.</p>";
        }
        if ( $wp == 1 ) {
          echo "<p>비밀번호가 일치하지 않습니다.</p>";
        }
      ?>
    </form>
  </body>
</html>