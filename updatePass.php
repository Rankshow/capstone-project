<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pass</title>
</head>
<body>
    <form action="./auth/fgetpass.php" method="POST">
        <input type="password" name="password" placeholder="Enter new password"/>
        <br>
        <input type="password" name="password_verify" placeholder="Verify Password"/>
        <br>
        <input type="submit" name="updatePass" value="Update Pass" />
    </form>
</body>
</html>