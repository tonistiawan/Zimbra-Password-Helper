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
<script type="text/javascript" language="javascript" src="../jscripts/admin-questionlist.js"></script>
<script type="text/javascript" language="javascript" class="init">
// ===== Inisiator Document ======
$(document).on( 'preInit.dt', function (e, settings) {
});
$(document).ready(function() {
	init_object();
});	// Document Ready
</script>
</head>
<body>
<div id="main">
<table id="jssp_questions" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th width="40"></th>
			<th width="60%">Pertanyaan untuk user</th>
			<th>Dipakai user sebanyak (orang)</th>
		</tr>
	</thead>
</table>
</div>
<center><div id="err_msg" title="Pesan Kesalahan">
</div></center>
<center><div id="box_dialog" title="Settings">
</div></center>
<div id="editrow" title="Ubah pertanyaan ini" class="hideDialog">
<form id="frm_editrow">
	<input type=hidden name="q_id" id="q_id">
	<label class="kotakisian" for="q_text">Pertanyaan pribadi</label> 
	<input type="text" name="q_text" class="kotakisian" id="q_text"/><br />

	<br /><br />
</form>
</div>
</body>
</html>
