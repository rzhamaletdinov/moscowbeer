<?
if(($_POST['login'] == 'director')||($_POST['password'] == 'mypassword'))
{
	header ("Location: personal");
	exit();
}
else
{
	header ("Location: bad_pass.php");
	exit();
}
// echo $_POST['remember_me'];
// echo'<br>';
// echo $_POST['login'];
// echo'<br>';
// echo $_POST['password'];
// var_dump($_POST);


?>