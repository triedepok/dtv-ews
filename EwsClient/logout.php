<?php
if (!isset($_SESSION)) {
        session_start();
}
require_once "config/db.php";
date_default_timezone_set('Asia/Jakarta'); // set tanggal ke lokal indonesia
$logout_date = date("Y-m-d H:i:s");
$user_id = $_SESSION['username'];

if(!empty($user_id)){
	if(open_connection()){
		//Stop porses player
		mysql_query("UPDATE ews_config SET status_muxer=0");
		//update data history
		mysql_query("UPDATE history SET logout_date='$logout_date' WHERE username='$user_id' ORDER BY id DESC LIMIT 1");
		//update user
		mysql_query("UPDATE user SET disabled=0 WHERE user_id='$user_id'");
		//hapus semua data
		mysql_query("TRUNCATE TABLE trdw");
		mysql_query("TRUNCATE TABLE tcdw");
		mysql_query("TRUNCATE TABLE tmdw");
		//tutup koneksi
		close_connection();
	}
	//hancurkan sesi
	session_destroy();
}
header('Location: index.php');
?>
