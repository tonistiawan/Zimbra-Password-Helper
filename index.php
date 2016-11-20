<?
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: login.php'); exit;
}
if (empty($_SESSION['user_unique'])) {
	$unique_id=strtoupper(substr(md5(uniqid($_POST['username'], true)),0,7));
	$_SESSION['user_unique']=$unique_id;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ZPH - Zimbra Password Helper</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/index-dashboard.css">
<link rel="stylesheet" href="./css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="./css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="./jscripts/jquery.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery.ui.shake.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/index-dashboard.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/newuser.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/private-questions.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/newpassword.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/index-admin.js"></script>
<script type="text/javascript" language="javascript" class="init">

	// ===== Inisiator Document ======
	$(document).on( 'preInit.dt', function (e, settings) {
	});
	$(document).ready(function() {
		startDoc();
		startDoc_initlogon();
		startDoc_userInfo()
		$('#newakun_link').on('click',function() {
			$('#logon_type').selectmenu({
				width: 350,
				style: 'popup'
			})
			var newfield=$("<input type='password' name='userpass' id='userpass' class='kotakisian'>")
			$("#frm_newakun  input[name='user_terkait']").replaceWith(newfield);
			$("#frm_newakun  input[name='user_id_terkait']").remove();
			$('#lbl_userpass').html('Password');
			$('#newakun').dialog({
			buttons: {
				"Verifikasi": newakun_1_start,
				Cancel: function() {
				  $(this).dialog( "close" );
				}
			}
			});
			$('#newakun').dialog('open');
		})
		$('#manageakun_link').on('click',function() {
			console.log('Manage akun di klik');
			$('#manakun').dialog('open');
		})
		$('#changepass_link').on('click',function() {
			$('#newpassword').dialog('open')
		})
		$('#privq_link').on('click',function() {
			$('#priv_question').dialog('open')
		})
<? if ($_SESSION['user_priv']!='USER') { ?>
		$('#admin_adduser').on('click',function() {
			$('#logon_type').selectmenu({
				width: 350,
				style: 'popup'
			})
			adduser_initialize();
			$('#newakun').dialog('open');
			return false;
		})
		$('#admin_listuser').on('click',function() {
			window.location.href='./admin/userlist.php';
			return false;
		})
		$('#admin_privq').on('click',function() {
			window.location.href='./admin/questionlist.php';
			console.log('admin private question');
			return false;
		})
<? } ?>		
	});	// Document Ready
</script>
</head>
<body>
<div id="main">
<table border=0 align='center'>
<tr><td width='120'><img src='./images/key-password.jpg'></td></tr>
<tr><td><br /><b>User Dashboard - Zimbra Password Helper</b></td></tr>
</table><br /><br />
<div id="disp_qna" title="Ubah jawaban pertanyaan pribadi" class="hideDialog">
<form id="frm_edit_qna">
	<input type="hidden" name="act" id="qna_act" value="qna_act">
	<input type="hidden" name="act" id="q_id" value="q_id">
	<input type="hidden" name="act" id="user_id" value="user_id">
	<span id="question_priv"/></span><br /><br />
	Jawaban : 
	<input type="text" name="jaw_priv" class="kotakisian" id="jaw_priv"/>
	<br /><br />
</form>
</div>

<div id="newakun" title="Menambah akun baru" class="hideDialog">
<form id="frm_newakun">
	<label class="kotakisian" for="username">Username</label> 
	<input type="text" name="username" class="kotakisian" id="username"/><br />
	<label class="kotakisian" for="userpass" id="lbl_userpass">Password</label> 
	<input type="password" name="userpass" class="kotakisian" id="userpass"/><br />
	<label for="logon_type">Logon ke :</label>
	<select name="logon_type" id="logon_type">
		<option disabled selected>--- Choose one ---</option>
		<optgroup label="Account Password" id="optgrp_logontype">
		</optgroup>
	</select>
	<br /><br />
</form>
</div>
<div id="newpassword" title="Mengganti Password" class="hideDialog">
<form id="frm_newakun">
	<label for="pilih_tipeakun">Tipe akun :</label>
	<select name="pilih_tipeakun" id="pilih_tipeakun">
		<option disabled selected>--- Choose one ---</option>
		<optgroup label="Tipe akun" id="tipeakun_lupa">
		</optgroup>
	</select>
	<input type="hidden" name="modname" class="kotakisian" id="modname"/><br />
	<br /><br />
	Username : 
	<input type="text" name="req_username" class="kotakisian" id="req_username"/><br />
	Password Baru : 
	<input type="password" name="newpass_1" class="kotakisian" id="newpass_1"/>
	Password baru lagi : 
	<input type="password" name="newpass_2" class="kotakisian" id="newpass_2"/>
</form>
</div>
<div id="priv_question" title="Mengelola Pertanyaan Pribadi" class="hideDialog">
<form id="frm_privq">
	<table id="privq_list" class="display" width="100%">
	<thead>
		<tr class="ui-widget-header ">
		<th>Pertanyaan</th>
		<th>Jawaban</th>
		<th>Proses</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
	</table>
</form>
</div>
<div id="manakun" title="Mengelola akun terkait" class="hideDialog">
<form id="frm_manakun">
	<table id="akun_list" class="ui-widget ui-widget-content" width="100%">
	<thead>
		<tr class="ui-widget-header ">
		<th>Username</th>
		<th>Module</th>
		<th>Proses</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
	</table>
</form>
</div>
<div id="box">
<div id="usertabs">
	<ul>
		<li><a href="#tab_acctInfo"><span>Info</span></a></li>
		<li><a href="#tab_settings"><span>Settings</span></a></li>
<? if ($_SESSION['user_priv']!='USER') { ?>
		<li><a href="#tab_admin"><span>Admin</span></a></li>
<? } ?>
	</ul>
	<div id="tab_acctInfo">
	Terakhir logon pada :<br />
	Dari IP : <br />
	<br />
	<br />
	<a href="logout.php">LOGOUT</a>
	</div>
	<div id="tab_settings">
	<span id="newakun_link" class="linkteks">[1] Menambah akun lain (linked)</span><br />
	<span id="manageakun_link" class="linkteks">[2] Mengelola akun lain (linked)</span><br />
	<span id="changepass_link" class="linkteks">[3] Ganti password</span><br />
	<span id="privq_link" class="linkteks">[4] Mengelola pertanyaan rahasia</span>
	</div>
<? if ($_SESSION['user_priv']!='USER') { ?>
	<div id="tab_admin">
	<span id="admin_adduser" class="linkteks">[1] Tambahkan akun</span><br />
	<span id="admin_listuser" class="linkteks">[2] Tampilkan akun terdaftar</span><br />
	<span id="admin_privq" class="linkteks">[3] Mengelola daftar pertanyaan</span><br />
	<span id="admin_modules" class="linkteks">[4] Mengelola modules</span>
	</div>
<? } ?>
</div>
</div>
</div>
<center><div id="err_msg" title="Pesan Kesalahan">
</div></center>
<center><div id="box_dialog" title="Settings">
</div></center>
<form name="frm_userinfo" id="frm_userinfo">
	<input type="hidden" name="linked_to_id" id="linked_to_id" value="<?=$_SESSION['linked_to_id'];?>" />
	<input type="hidden" name="username" id="username" value="<?=$_SESSION['login_user'];?>" />
	<input type="hidden" name="modname" id="modname" value="<?=$_SESSION['modname'];?>" />
</form>
</body>
</html>
