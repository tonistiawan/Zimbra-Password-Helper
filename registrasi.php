<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ZPH - Zimbra Password Helper</title>
<link rel="stylesheet" href="./css/forgot-password.css">
<link rel="stylesheet" href="./css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="./jscripts/jquery.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/jquery.ui.shake.js"></script>
<script type="text/javascript" language="javascript" src="./jscripts/register.js"></script>
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
<center><h2>Registrasi Baru</h2></center>
<div id="registertabs">
	<ul>
		<li><a href="#info_awal"><span>Info</span></a></li>
		<li><a href="#new_auth"><span>Verifikasi Awal</span></a></li>
		<li><a href="#priv_question"><span>Pertanyaan pribadi</span></a></li>
	</ul>
	<div id="info_awal">
	Registrasi adalah langkah mendaftarkan diri menggunakan
	akun yang valid. Akun yang dimaksud dapat menggunakan
	akun windows / email / ess.<br /><br />
	Saat tools ini dapat melakukan verifikasi akun dan password
	Anda dengan benar, langkah selanjutnya adalah mengisi jawaban
	atas pertanyaan yang diberikan sistem.
	<form action="#" method="post" id="frm_info">
		<center><input type="submit" class="button button-primary" value="Next >>" id="btn_info"/></center> 
	</form>
	</div>
	<div id="new_auth">
		Pilih salah satu akun untuk verifikasi<br />
		<form action="#" method="post" id="frm_verikasi">
		<fieldset>
		<label for="logon_type">Method :</label>
		<select name="logon_type" id="logon_type">
			<option disabled selected>-- Choose one---</option>
			<optgroup label="Account Password" id="optgrp_logontype">
			</optgroup>
		</select>
		</fieldset><br />
		<div id="validate_password">
			<label class="kotakisian" for="username">Username</label> 
			<input type="text" name="username" class="kotakisian" id="username"/><br />
			<label class="kotakisian" for="userpass">Password</label> 
			<input type="password" name="userpass" class="kotakisian" id="userpass"/>
		</div>
		<center><input type="submit" class="button button-primary" value="Next >>" id="btn_verifikasi"/></center> 
		</form>
	</div>
	<div id="priv_question">
	Pertanyaan pribadi ini sebagai langkah cadangan apabila
	password akun tidak diingat.
	<form action="#" method="post" id="frm_pertanyaan">
    <table border="0" cellspacing="0" id="tbl_pertanyaan">
	<tr>
		<th>Jawablah minimal 4 buah pertanyaan berikut ini :</th>
	</tr>
	</table><br />	
	<center>
	<input type="submit" class="button button-primary" value="Tambah Pertanyaan" id="btn_tambah"/>
	<input type="submit" class="button button-primary" value="Simpan" id="btn_simpan"/></center> 
	</form>
	</div>
</div>
</div>
</div>
<div id="err_msg" title="Pesan Kesalahan">

</div>
 </body>
</html>