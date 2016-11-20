<?
session_start();
if(isSet($_POST['username']) ) {
	require_once(dirname(__FILE__) . "/libs/dbaccess.php");
	try {
		$dbuser = new dbaccess($options);
	}
	catch (dbaccessException $e) {
		//echo $e;
		exit();   
	}

	$rs=$dbuser->search_user($_POST['username'],$_POST['modname']);
	$_SESSION['login_user']=$_POST['username'];
	$_SESSION['modname']=$_POST['modname'];

	$_SESSION['login_userid']=$rs['user_id'];
	$_SESSION['linked_to_id']=$rs['linked_to_id'];
	$_SESSION['user_priv']=$rs['user_priv'];
	$unique_id=strtoupper(substr(md5(uniqid($_POST['username'], true)),0,7));
	$_SESSION['user_unique']=$unique_id;
	session_commit();
	// Log to server
	$dbuser->save_to_log($rs['user_id'],"LOGON TO","$unique_id | INPUT - username=".$_POST['username'],$_SERVER['REMOTE_ADDR']);
}
?>