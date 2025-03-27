<html>
<body>
<form action="login.php" method="POST">
Name: <input type="text" name="name"><br>
<input type="submit">
</form>
</body>
</html>

<?php
$user_name = $_POST['name'];

$cmd = escapeshellcmd("python3 redis_client.py $user_name");
$user_name = "";
$output = shell_exec($cmd);

echo "<pre>$output</pre>";
?>
