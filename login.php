<?php
session_start();
if(!empty($_SESSION['login_user']))
{
header('Location: index.php');
}
if (empty($_SESSION['user_unique'])) {
	$unique_id=strtoupper(substr(md5(uniqid($_POST['username'], true)),0,7));
	$_SESSION['user_unique']=$unique_id;
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>ZPH - Zimbra Password Helper</title>
<link rel="stylesheet" href="./css/login.css"/>
<link rel="stylesheet" href="./css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="./jscripts/jquery.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery.ui.shake.js"></script>
<script>
function error_msg(txtPesan) {
	$('#box').shake();
	$("#err_msg").html("<span style='color:#cc0000'>Error:</span> "+txtPesan+". ");
	$("#err_msg").dialog();
}
function startDoc() {
	$('#logon_type').selectmenu({
		width: 210
	});
	$.get("libs/modules.php?ops=getModules", function(data){
		var data = jQuery.parseJSON(data);
		var parentgroup=$('#optgrp_logontype')
		for (idx=0;idx<data.length;idx++) {
			parentgroup.append("<option value='" + data[idx]['mod_name'] + "' id='rec_" + data[idx]['mod_name'] + "'>" + data[idx]['mod_title'] + '</option>');
		}
	});
}
function save_session(username,modname) {
	var dataString = 'username='+encodeURI(username)+'&modname='+modname;
	var url_ajax="./save-session.php"
	$.ajax({
	type: "POST",
	url: url_ajax,
	data: dataString,
	cache: false,
	beforeSend: function(){ $("#btn_login").val('Connecting...');},
	success: function(data){
		$("#btn_login").val('Next >>');
		window.location.href='index.php';	
	}
	})

}
function act_1_1_checkUser(user_id,user_type) {
	var deferredObject = $.Deferred();
	var dataString="user_type="+user_type+"&user_id="+user_id;
	var ajax_url="./libs/users.php?ops=checkuser";
	var username, linked_id;
	var jsonData;
	$.ajax({
		'type': 'POST',
		'url': ajax_url,
		'data': dataString,
		'dataType': 'json',
		beforeSend: function(){ $("#btn_login").val('Checking...');},
		success : function (data) { deferredObject.resolve(data); }
	});
	return deferredObject.promise();
}
function act_1_2_verify_password(v_modname,v_username,v_userpass) {
	var dataString = 'username='+encodeURI(v_username)+'&userpass='+encodeURI(v_userpass);
	var url_ajax="./modules/"+v_modname+"/index.php?ops=verifypassword"
	$.ajax({
	type: "POST",
	url: url_ajax,
	data: dataString,
	cache: false,
	beforeSend: function(){ $("#btn_login").val('Verifying...');},
	success: function(data){
		if (data=="FAIL") {
			$("#btn_login").val('Next >>');
			error_msg('Kata sandi (password) tidak tepat');
			return false;
		} else {
			$("#btn_login").val('Next >>');
			save_session(v_username,v_modname)
		}
	}
	})
}
$(document).ready(function() {
	startDoc()
	$("#frm_login").submit(function() {
		event.preventDefault();
	});
	$('#registernew').on( 'click', function () {
		window.location.href="registrasi.php";
	});
	$('#forgotpass').on( 'click', function () {
		window.location.href="forgot-password.php";
	});
	$('#btn_login').click(function() {
		var logontype=auth_type=$('select[name="logon_type"] option:selected').val();
		var username=$("#username").val();
		var password=$("#password").val();
		if (logontype==='-- Choose one---') {
			error_msg('Pilih LOGON KE : ')
		} else {
			var my=act_1_1_checkUser(username,logontype);
			var myOut=$.when(my).done(function(data) {
				$("#btn_login").val('Next >>');
				if (typeof(data['username'])==='undefined') {
					error_msg('User '+username+' belum terdaftar pada tools ini.')
				} else {
					act_1_2_verify_password(logontype,username,password)
				}
			});
			
		}
		return false;
	});
});
$("#err_msg").dialog({ autoOpen: false });
</script>
</head>

<body>
<div id="main">
<table border=0 align='center'>
<tr><td width='120'><img src='./images/key-password.jpg'></td></tr>
<tr><td><br /><b>Zimbra Password Helper</b></td></tr>
</table><br /><br />
<div id="box">
<form action="" method="post" id="frm_login">
<label>Username</label> 
<input type="text" name="username" class="input" autocomplete="off" id="username"/>
<label>Password </label>
<input type="password" name="password" class="input" autocomplete="off" id="password"/><br/>
<label for="logon_type">Logon ke :</label>
<select name="logon_type" id="logon_type">
	<option disabled selected>-- Choose one---</option>
	<optgroup label="Account Password" id="optgrp_logontype">
	</optgroup>
</select>
<br /><br />
<center><input type="submit" class="button button-primary" value="Log In" name="btn_login" id="btn_login"/></center> 
<span class='msg'></span> 
<table id="example" class="display" cellspacing="0" width="100%">
<tr>
<td align="left" id="registernew">Register</td>
<td align="right" id="forgotpass">Forget Password</td>
</tr>
</table>
<div id="err_msg" title="Pesan Kesalahan">

</div>	

</div>

</form>	
</div>

</div>
</body>
</html>