<html>
<body>
<form action="login.php" method="POST">
Name: <input type="text" name="name"><br>
Pwd: <input type="text" name="pwd"><br>
<input type="submit">
</form>
</body>
</html>

<?php
$user_name = $_POST['name'];
$pwd = $_POST['pwd'];

$cmd = escapeshellcmd("python3 redis_client.py $user_name $pwd");
$user_name = "";
$output = shell_exec($cmd);

echo "<pre>$output</pre>";
?>
