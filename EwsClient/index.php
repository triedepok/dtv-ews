<?php
if (!isset($_SESSION)) {
        session_start();
    }
require_once "config/db.php";

if(!empty($_POST['submit'])){
	if (!empty($_POST['username']) AND !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if(open_connection()){
			$login=mysql_query("SELECT * FROM user WHERE user_id='$username'");
			$ketemu=mysql_num_rows($login);
			$row=mysql_fetch_array($login);
			// Apabila username dan password ditemukan
			if ($ketemu > 0){
				$disabled = $row['disabled'];
				$user_id = $row['user_id'];
				$_SESSION['username'] = $user_id;
				$_SESSION['nama'] = $row['nama_lengkap'];
				$_SESSION['level'] = $row['level'];
				// Ending a session in 30 minutes from the starting time.
				$_SESSION['expire'] = time() + (30 * 60);
				$counter = $row['counter'];
				
				if($row['password'] == $password){
					if($disabled == 0){
						$counter++;
						
						if($counter < 5000){
							if(open_connection()){
								mysql_query("UPDATE user SET counter=$counter,disabled=1 WHERE user_id='$user_id'");
								mysql_query("INSERT INTO history values('','$user_id','$login_date','','-')");
								close_connection;
							}
							//masuk ke page uji
							header('location:uji.php');
						}else{
							header('location:logout.php');
						}
						
					}else{
						echo "<br><p align=center>*user sudah login...</p><p align=center><a href=logout.php title=logout>LogOut</a></p>";
					}
				}else{
						echo "<br><p align=center>*password salah...</p><br>";
				}
			
			}else{
				echo "<br><p align=center>*username salah...</p><br>";
			}
		}
	}else{
		echo "<br><p align=center>*username / password belum diisi....</p><br>";
	}
	
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>PESUT - EWS</title>
<meta charset="UTF-8" />
<meta name="Author" content="triedepok@gmail.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
<link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
<form class="box login" action="<?php $_PHP_SELF ?>" method="post">
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input name="username" type="text" tabindex="1" placeholder="trie" value="<?php if(!empty($username)){ echo $username; } ?>" required>
	  <label>Password</label>
	  <input name="password" type="password" tabindex="2" required>
	</fieldset>
	<footer>
	  <label><input type="checkbox" tabindex="3">Biarkan tetap masuk</label>
	  <input type="submit" name="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
</form>
<footer id="main">
  Badan Pengkajian dan Penerapan Teknologi
</footer>
</body>
</html>
