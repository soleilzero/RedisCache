<html>
<body>
<form action="login.php" method="POST">
Name: <input type="text" name="name"><br>
Password: <input type="text" name="pwd"><br>
<input type="submit">
</form>
</body>
</html>

<?php
$user_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);

$cmd = escapeshellcmd("python3 redis_client.py $user_name $pwd");

$output = shell_exec($cmd);

echo "<pre>$output</pre>";
?>
