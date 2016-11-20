<?
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: ../login.php'); exit;
}
if($_SESSION['user_priv']=='USER')
{
header('Location: index.php'); exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ZPH - Zimbra Password Helper</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/index-dashboard.css">
<link rel="stylesheet" href="../css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
<style>
.mytoolbar {
    float: left;
	cursor: pointer;
}
</style>
<script type="text/javascript" language="javascript" src="../jscripts/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../jscripts/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="../jscripts/jquery.ui.shake.js"></script>
<script type="text/javascript" language="javascript" src="../jscripts/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="../jscripts/admin-userlist.js"></script>
<script type="text/javascript" language="javascript" class="init">
// ===== Inisiator Document ======
$(document).on( 'preInit.dt', function (e, settings) {
});
$(document).ready(function() {
	init_object()
});	// Document Ready
</script>
</head>
<body>
<div id="main">
<table id="jssp_users" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th width='60'></th>
			<th>Username</th>
			<th>Module / Sumber DB</th>
			<th>Akun terkait</th>
			<th>Level</th>
		</tr>
	</thead>
</table>
</div>
<center><div id="err_msg" title="Pesan Kesalahan" class="hideDialog">
</div></center>
<center><div id="box_dialog" title="Settings" class="hideDialog">
</div></center>
<div id="editrow" title="Ubah akun ini" class="hideDialog">
<form id="frm_editrow">
	<input type=hidden name="user_id" id="user_id">
	<input type=hidden name="user_id_terkait" id="user_id_terkait">
	<input type=hidden name="rowinfo" id="rowinfo">
	<label class="kotakisian" for="username">Username</label> 
	<input type="text" name="username" class="kotakisian" id="username"/><br />
	<label class="kotakisian" for="user_terkait">User terkait</label> 
	<input type="text" name="user_terkait" class="kotakisian" id="user_terkait"/><br />
	<label for="logon_type">Tipe akun :</label>
	<select name="logon_type" id="logon_type">
		<option disabled selected>--- Pilih Server ---</option>
	</select><br /><br />
	<label for="allow_pop3">Izinkan login melalui POP3 :</label>
	<select name="allow_pop3" id="allow_pop3">
		<option disabled selected>--- Pilih izin ---</option>
		<option value='YES'>YES</option>
		<option value='NO'>NO</option>
	</select><br /><br />
	<label for="allow_imap">Izinkan login melalui IMAP :</label>
	<select name="allow_imap" id="allow_imap">
		<option disabled selected>--- Pilih Server ---</option>
		<option value='YES'>YES</option>
		<option value='NO'>NO</option>
	</select><br /><br />
	<label for="user_priv">User privileges:</label>
	<select name="user_priv" id="user_priv">
	</select><br />
	<br /><br />
</form>
</div>
<form name="frm_userinfo" id="frm_userinfo">
	<input type="hidden" name="linked_to_id" id="linked_to_id" value="<?=$_SESSION['linked_to_id'];?>" />
	<input type="hidden" name="username" id="username" value="<?=$_SESSION['login_user'];?>" />
	<input type="hidden" name="modname" id="modname" value="<?=$_SESSION['modname'];?>" />
</form>
</body>
</html>
