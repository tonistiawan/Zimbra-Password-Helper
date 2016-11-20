<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ZPH - Zimbra Password Helper</title>
<link rel="stylesheet" href="./css/forgot-password.css">
<link rel="stylesheet" href="./css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="./jscripts/jquery.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery.ui.shake.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/forgot-password.js"></script>
<script type="text/javascript" language="javascript" class="init">
</script>
</head>
<body>
<div id="main">
<table border=0 align='center'>
<tr><td width='120'><img src='./images/key-password.jpg'></td></tr>
<tr><td><br /><b>Zimbra Password Helper</b></td></tr>
</table><br /><br />
<div id="box">
<center><h2>Forgot password</h2></center>
<div id="forgottabs">
	<ul>
		<li><a href="#forgot_find"><span>Find</span></a></li>
		<li><a href="#forgot_auth"><span>Authenticate</span></a></li>
		<li><a href="#forgot_newpass"><span>New Password</span></a></li>
	</ul>
	<div id="forgot_find">
		<form action="#" method="post" id="frm_Forgot">
		<label class="kotakisian" for="username">Username</label> 
		<input type="text" name="username" class="kotakisian" id="username"/>
		<input type="hidden" name="linked_to_id" id="linked_to_id"/>
		<input type="hidden" name="userid" id="userid"/>
		<div id="tipeakun_list">
		</div><br />
		<center><input type="submit" class="button button-primary" value="Next >>" id="btn_cari_id"/></center> 
		</form>
	</div>
	<div id="forgot_auth">
		Authenticate your self<br />
		<form action="#" method="post" id="frm_Forgot_2">
		<fieldset>
		<label for="files">Method :</label>
		<select name="acc_type" id="acc_type">
			<option value='none' disabled selected>-- Choose one---</option>
			<optgroup id="optgrp_qna" label="Questions">
				<option value="q_n_a">Private questions</option>
			</optgroup>
			<optgroup id="optgrp_acctpass" label="Account Password">
			</optgroup>
		</select>
		</fieldset><br />
		<div id="validate_password">
			<label class="kotakisian" for="v_username">Username</label> 
			<input type="text" name="v_username" class="kotakisian" id="v_username"/><br />
			<label class="kotakisian" for="v_userpass">Password</label> 
			<input type="password" name="v_userpass" class="kotakisian" id="v_userpass"/>
		</div>
		<div id="frm_qna">
			<span id="txt_qna_1"></span><input type="hidden" name="qna_1" id="qna_1"><br />
			<input type="text" name="useranswer_1" class="kotakisian" id="useranswer_1"/><br />
			<span id="txt_qna_2"></span><input type="hidden" name="qna_2" id="qna_2"><br />
			<input type="text" name="useranswer_2" class="kotakisian" id="useranswer_2"/>
		</div>
		<center><input type="submit" class="button button-primary" value="Next >>" id="btn_auth"/></center> 
		</form>
	</div>
	<div id="forgot_newpass">
		<form action="#" method="post" id="frm_Forgot_3">
		<div id="frm_newpass">
			<label class="kotakisian" for="newpass_1">New password</label> 
			<input type="password" name="newpass_1" class="kotakisian" id="newpass_1"/><br />
			<label class="kotakisian" for="newpass_2">Confirm new password</label> 
			<input type="password" name="newpass_2" class="kotakisian" id="newpass_2"/>
		</div>
		<center><input type="submit" class="button button-primary" value="SAVE" id="btn_newpass"/></center> 
		</form>
	</div>
</div>
</div>
</div>
<center><div id="err_msg" title="Pesan Kesalahan">

</div></center>
 </body>
</html>