<?php
session_start();
if(!empty($_SESSION['login_user']))
{
	$_SESSION['login_user']='';
	$_SESSION['login_user']='';
	$_SESSION['modname']='';

	$_SESSION['login_userid']='';
	$_SESSION['linked_to_id']='';
	$_SESSION['user_priv']='';
	$unique_id=strtoupper(substr(md5(uniqid($_POST['username'], true)),0,7));
	$_SESSION['user_unique']=$unique_id;
	session_commit();
}
header("Location:index.php");

?>
