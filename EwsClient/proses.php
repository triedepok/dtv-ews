<?php
date_default_timezone_set('Asia/Jakarta'); // set tanggal ke lokal indonesia
include "config/db.php";

	
if(open_connection()){
		$tabel = "ews_config";
		$config = mysql_query("SELECT * FROM ews_config");
		$row_ews = mysql_fetch_array($config);
		$field = "status_muxer";
		$kondisi = "ews_pmt_id=911";
		$status_player = $row_ews['status_player'];
		if($status_player == 0){
			echo "<font color=yellow>Status hardware tidak aktif</font>";
		}else{
			echo "<font color=red>Status hardware aktif</font>";
		}
}
?>
