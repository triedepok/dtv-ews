<?php
require_once "config/db.php";

$user_aktif = $_SESSION['username'];

cek_session();


if(!empty($_GET['update'])){
  	$inputan = false;
	$update = true;
}else{
  	$update = false;
	$inputan = true;
}
  
  $error ="";
  $password = false;
  if(!empty($_POST['Submit'])){
    extract($_POST); // row post data
  	if(empty($username)){
		$error = $error . "*username belum di isi<br>";
	}
	if(empty($nama)){
		$error = $error . "*nama belum di isi<br>";
	}
	if(empty($email)){
		$error = $error . "*email belum di isi<br>";
	}
	if(empty($password1) || empty($password2)){
		$error = $error . "*password belum lengkap<br>";
	}else if($password1 <> $password2){
		$error = $error . "*password yang dimasukkan tidak sama<br>";
	}else{
		$password = true;
		$pwd = md5($password1);
	}
	
	if((!empty($username)) && (!empty($nama)) && (!empty($email)) && ($password)){
		if(open_connection()){
        	$cekuser=mysql_query("SELECT * FROM user WHERE user_id='$username'");
			$ketemu=mysql_num_rows($cekuser);
			// Apabila email ditemukan
			if ($ketemu < 1){
				//Insert User baru
				mysql_query("INSERT INTO user values('$username','$pwd','BPPT','$email','$nama',1,0,0)");
				//update data history
				mysql_query("UPDATE history SET aktifitas='Tambah user $username' WHERE username='$user_aktif' ORDER BY id DESC LIMIT 1");
				$inputan = false;
				$error = $error . "*data berhasil disimpan";
				$error = $error . "<br><br><p>username &nbsp; : $username <br>nama &nbsp;: $nama <br>email &nbsp;&nbsp; : $email<br><br><a href=logout.php>Home</a></p>";
			}else{
				$error = $error . "*alamat email sudah digunakan";
				$inputan = false;
				$update = true;
			}
        	close_connection();
    	}
	}

  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>REGISTRASI PESUT-EWS</title>
<meta charset="UTF-8" />
<meta name="Author" content="triedepok@gmail.com">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/styleku.css">
</head>

<body>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <?php if($inputan){ ?>
  <form method="post" action="<?php $_PHP_SELF ?>">
  <table width="721" border="0" align="center">
  <tr align="center" valign="middle">
    <td height="39" colspan="3"><h3 align="center">Registrasi</h3></td>
    </tr>
	<tr align="left" valign="middle">
	<td width="68">&nbsp;</td>
    <td height="39" colspan="2"><p><?php echo $error; ?></p></td>
    </tr>
  <tr>
    <td width="68">&nbsp;</td>
    <td width="77">username</td>
    <td width="426"><input name="username" type="text" class="ffield" size="50" value="<?php if(!empty($username)){ echo $username; } ?>"> 
      * </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>nama</td>
    <td><input name="nama" type="text" class="ffield" id="nama" value="<?php if(!empty($nama)){ echo $nama; } ?>" size="60"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>email</td>
    <td><input name="email" type="text" class="ffield" size="30" value="<?php if(!empty($email)){ echo $email; } ?>"> 
      * </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Password</td>
    <td><input name="password1" type="password" class="ffield" size="30" value="<?php if(!empty($password1)){ echo $password1; } ?>"> 
    * </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="password2" type="password" class="ffield" size="30" value="<?php if(!empty($password2)){ echo $password2; } ?>"> 
    retype </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Submit"></td>
  </tr>
</table>
</form>
<?php } if($update){ ?>
  <form method="post" action="<?php $_PHP_SELF ?>">
  <table width="721" border="0" align="center">
  <tr>
    <td width="68">&nbsp;</td>
    <td width="77">username</td>
    <td width="426"><input name="username" type="text" class="ffield" size="50" value="<?php if(!empty($username)){ echo $username; } ?>"> 
      * </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>nama</td>
    <td><input name="nama" type="text" class="ffield" id="nama" value="<?php if(!empty($nama)){ echo $nama; } ?>" size="60"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>email</td>
    <td><input name="email" type="text" class="ffield" size="30" value="<?php if(!empty($email)){ echo $email; } ?>"> 
      * </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Password</td>
    <td><input name="password1" type="password" class="ffield" size="30" value="<?php if(!empty($password1)){ echo $password1; } ?>"> 
    * </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="password2" type="password" class="ffield" size="30" value="<?php if(!empty($password2)){ echo $password2; } ?>"> 
    retype </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Update"></td>
  </tr>
</table>
</form>
<?php } // close inputan ?>

  <p>&nbsp;</p>
</body>
</html>
  
