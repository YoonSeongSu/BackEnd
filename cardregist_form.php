
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="cardregist_action.php" method="post">
    
    <table border="1">
        <tr>
            <td>카드이름</td>
            <td><input type="text" name="card_name"></td>
        </tr>

        <tr>
            <td>카드회사</td>
            <td><input type="text" name="card_cmp"></td>
        </tr>
        
        <tr>
            <td colspan="2"> <button type="submit">입력</button></td>
        </tr>
    
    </table>
    </form>
</body>
</html>