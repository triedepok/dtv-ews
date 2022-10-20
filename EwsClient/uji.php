<?php
ob_implicit_flush ( true );
date_default_timezone_set('Asia/Jakarta'); // set tanggal ke lokal indonesia
$now = time(); // Checking the time now when home page starts.
require_once "config/config.php";

cek_session();

if($_SESSION['level'] == 1){
 	$menu_admin ="";
}else if($_SESSION['level'] == 3){
 	$menu_admin ="<a href=signup.php title=konfigurasi untuk system konfigurasi modulators>SignUp</a> | ";
}


$namaku = $_SESSION['nama'];
extract($_GET); // row post data

// Tanpa Bencana
if((!empty($start)) && ($start=="start0" || $start=="start1" || $start=="start2" || $start=="start3" || $start=="start4" || $start=="start6" || $start=="start7" || $start=="start8" || ($start=="start10" && !empty($simbol)))){
	$all_error = "Proses Player Konten";
		
	hapus_data();
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
}else if((!empty($stop)) && ($stop=="stop0" || $stop=="stop1" || $stop=="stop2" || $stop=="stop3" || $stop=="stop4" || $stop=="stop5" || $stop=="stop6" || $stop=="stop7" || $stop=="stop8" || $stop=="stop10")){
	$all_error = "Proses Stop Konten";
	$status_player=1; 
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	hapus_data();
}

// Satu Bencana
if(!empty($awas) && $awas=="awas2"){
	$simbol = "";
	$all_error = "Status Awas pada Konten dengan satu Bencana";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	satu_bencana(1);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
}else if(!empty($siaga) && $siaga=="siaga2"){
	$simbol="";
	$all_error = "Status Siaga pada Konten dengan satu Bencana";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	satu_bencana(2);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
}else if(!empty($waspada) && $waspada=="waspada2"){
	$simbol="";
	$all_error = "Status Waspada pada Konten dengan satu Bencana";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	satu_bencana(3);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
}

// Kode pos Error
if(!empty($type) && $type=="type1"){
	$simbol = "";
	$all_error = "Kode pos dengan hexa 08235F";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();	
	hapus_data();
	kode_pos_type(1);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
}else if(!empty($type) && $type=="type2"){
	$simbol="";
	$all_error = "Kode pos dengan hexa 008235";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kode_pos_type(2);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
}


// Dua Bencana
if(!empty($awas) && $awas=="awas3"){
	$simbol="";
	$all_error = "Status Awas pada Konten dengan Dua Bencana1";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	dua_bencana(1);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($siaga) && $siaga=="siaga3"){
	$simbol="";
	$all_error = "Status Siaga pada Konten dengan Dua Bencana1";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	dua_bencana(2);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($waspada) && $waspada=="waspada3"){
	$simbol="";
	$all_error = "Status Waspada pada Konten dengan Dua Bencana1";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	dua_bencana(3);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($awas) && $awas=="awas4"){
	$simbol="";
	$all_error = "Status Awas pada Konten dengan Dua Bencana2";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	dua_bencana(4);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($siaga) && $siaga=="siaga4"){
	$simbol="";
	$all_error = "Status Siaga pada Konten dengan Dua Bencana2";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	dua_bencana(5);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($waspada) && $waspada=="waspada4"){
	$simbol="";
	$all_error = "Status Waspada pada Konten dengan Dua Bencana2";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	dua_bencana(6);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}

//Start stop
if(!empty($start) && ($start=="start5a" || $start=="start5b")){
	$simbol="";
	$all_error = "Start Konten dengan mode Start-Stop";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	bencana_on(1);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($stoppos) && $stoppos=="stoppos5"){
	$simbol="";
	$all_error = "Status Tidak ada Kode Pos yang sama";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	bencana_on(2);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($stoppacket) && $stoppacket=="stoppacket5"){
	$simbol = "";
	$all_error = "Status denga Packet_id=FF";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	bencana_on(3);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}

//Otoritas Bencana
if(!empty($bmkg) && $bmkg=="bmkg6"){
	$simbol = "";
	$all_error = "Status Konten dengan Logo Otoritas BMKG";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	otoritas(1);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($bnpb) && $bnpb=="bnpb6"){
	$simbol = "";
	$all_error = "Status Konten dengan Logo Otoritas BNPB";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	otoritas(2);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}

//Kombinasi On
if(!empty($satu) && $satu=="satu7"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 3xxxx";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_on(1);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($dua) && $dua=="dua7"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 33xxx";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_on(2);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($tiga) && $tiga=="tiga7"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 333xx";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_on(3);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($empat) && $empat=="empat7"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 3333x";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_on(4);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($lima) && $lima=="lima7"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 33333";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_on(5);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}

//Kombinasi Off
if(!empty($satu) && $satu=="satu8"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 8xxxx";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_off(1);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($dua) && $dua=="dua8"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 38xxx";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_off(2);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($tiga) && $tiga=="tiga8"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 338xx";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_off(3);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($empat) && $empat=="empat8"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 3338x";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_off(4);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}else if(!empty($lima) && $lima=="lima8"){
	$simbol = "";
	$all_error = "Status Konten dengan Kombinasi Kode Pos 33338";
	if(open_connection()){
		//Stop Player
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		$status_player=1;
		while($status_player!=0){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1); 
		}
	}
	update_versi();
	hapus_data();
	kombinasi_off(5);
	
	if(open_connection()){
		//Start Player
		$proses_update = "UPDATE ews_config SET status_muxer=1";
		mysql_query($proses_update);
		
		$status_player=0;
		while($status_player!=1){
			$config = mysql_query("SELECT * FROM ews_config");
			$row_ews = mysql_fetch_array($config);
			$status_player = $row_ews['status_player'];
			ob_flush();
			//sleep (1);
		}
	}
}

//Simbol Bencana
if((!empty($simbol) && $simbol=="gempa")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Gempa Bumi status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(1,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Gempa Bumi status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(1,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Gempa Bumi status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(1,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="tsunami")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Tsunami status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(2,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Tsunami status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(2,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Tsunami status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(2,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="letusan")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Letusan Gunung Berapi status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(3,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Letusan Gunung Berapi status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(3,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Letusan Gunung Berapi status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(3,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="gerakan")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Gerakan Tanah status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(4,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Gerakan Tanah status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(4,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Gerakan Tanah status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(4,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="banjir")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Simbol Banjir status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(5,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Simbol Banjir status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(5,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Simbol Banjir status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(5,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="kekeringan")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Kekeringan status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(6,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Kekeringan status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(6,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Kekeringan status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(6,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="kebakaranhutan")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Kebakaran Hutan dan Lahan status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(7,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Kebakaran Hutan dan Lahan status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(7,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Kebakaran Hutan dan Lahan status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(7,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="erosi")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Erosi status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(8,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Erosi status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(8,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Erosi status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(8,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="kebakarangedung")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Kebakaran Gedung dan Pemukiman status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(9,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Kebakaran Gedung dan Pemukiman status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(9,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Kebakaran Gedung dan Pemukiman status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(9,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="gelombang")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Gelombang Exstrim status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(10,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Gelombang Exstrim status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(10,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Gelombang Exstrim status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(10,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="cuaca")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Cuaca Exstrim status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(11,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Cuaca Exstrim status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(11,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Cuaca Exstrim status	Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(11,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="kegagalan")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Kegagalan Teknologi status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(12,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Kegagalan Teknologi status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(12,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Kegagalan Teknologi status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(12,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="epidemi")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Epidemi dan Wabah Penyakit status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(13,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Epidemi dan Wabah Penyakit status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(13,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Epidemi dan Wabah Penyakit status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(13,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="konflik")){
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Konflik Sosial status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(14,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Konflik Sosial status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(14,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Konflik Sosial status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(14,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}else if((!empty($simbol) && $simbol=="cadangan")){
	$start1 = true;
	$stop9 = false;
	$all_error = "Status Konten dengan Simbol Cadangan";
	if((!empty($awas) && $awas=="awas10")){
		$all_error = "Status Konten dengan Simbol Cadangan status Awas";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(15,1);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($siaga) && $siaga=="siaga10")){
		$all_error = "Status Konten dengan Simbol Cadangan status Siaga";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(15,2);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}else if((!empty($waspada) && $waspada=="waspada10")){
		$all_error = "Status Konten dengan Simbol Cadangan status Waspada";
		if(open_connection()){
			//Stop Player
			$proses_update = "UPDATE ews_config SET status_muxer=0";
			mysql_query($proses_update);
			$status_player=1;
			while($status_player!=0){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1); 
			}
		}
		update_versi();
		hapus_data();
		simbol_bencana(15,3);
	
		if(open_connection()){
			//Start Player
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
		
			$status_player=0;
			while($status_player!=1){
				$config = mysql_query("SELECT * FROM ews_config");
				$row_ews = mysql_fetch_array($config);
				$status_player = $row_ews['status_player'];
				ob_flush();
				//sleep (1);
			}
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
  <meta http-equiv="refresh" content="25">
  <title>PESUT - EWS</title>
  <link rel="stylesheet" type="text/css" href="css/styleku.css">
  <link rel="shortcut icon" href="images/favicon.ico">
  <meta name="Author" content="triedepok@gmail.com">
  <meta name="keywords" content="Aplikasi untuk Pengujian Set Top Box DVB-T2" />
  <meta name="description" content="Aplikasi untuk Pengujian Set Top Box DVB-T2, dikembangkan oleh PTIK-BPPT, email:triedepok@gmail.com" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <script src="jquery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript">
		$(function(){
			startRefresh();
		});

		function startRefresh() {
			setTimeout(startRefresh,1000);
			$.get('proses.php', function(data) {
				$('#lihat_hasil').html(data);
			});
		}
  </script>
</head>
<body>
<form method="get" action="<?php $_PHP_SELF ?>" name="uji">
  <table border="0" align="center" cellpadding="0" cellspacing="3" width="780">
    <tbody>
      <tr>
        <td height="93" colspan="4" rowspan="1"><img src="images/barner.jpg" width="774" height="130"></td>
      </tr>
      <tr>
        <td width="5">&nbsp;</td>
        <td width="733" colspan="2">Anda login sebagai <?php if(!empty($namaku)){ echo $namaku; }?></td>
        <td width="5">&nbsp;</td>
      </tr>
      <tr>
        <td width="5">&nbsp;</td>
        <td width="140">Tanpa Bencana</td>
        <td width="593"><button class="last_row" name="start" value="start1" <?php if(!empty($start) && $start=="start1"){ echo "disabled"; }?>>Start</button>  
        <button class="last_row" name="stop" value="stop1" <?php if(!empty($stop) && $stop=="stop1"){ echo "disabled"; }?>>Stop</button> 
        </td>
        <td width="5">&nbsp;</td>
      </tr>
      <tr>
        <td width="5">&nbsp;</td>
        <td width="140">Kode Pos Error</td>
        <td width="593"><button class="last_row" name="start" value="start0" <?php if(!empty($start) && $start=="start0"){ echo "disabled"; }?>>Start</button>&nbsp;
        <button class="last_row" name="type" value="type1" <?php if(!empty($type) && $type=="type1"){ echo "disabled"; }?>>08235F</button>&nbsp;
        <button class="last_row" name="type" value="type2" <?php if(!empty($type) && $type=="type2"){ echo "disabled"; }?>>008235</button>&nbsp;
        <button class="last_row" name="type" value="type3" <?php if(!empty($type) && $type=="type3"){ echo "disabled"; }?>>12345F</button>&nbsp;
        <button class="last_row" name="stop" value="stop0" <?php if(!empty($stop) && $stop=="stop0"){ echo "disabled"; }?>>Stop</button>
        </td>
        <td width="5">&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td>Satu Bencana</td>
        <td><button class="last_row" name="start" value="start2" <?php if(!empty($start) && $start=="start2"){ echo "disabled"; }?>>Start</button>  
        <button class="last_row" name="awas" value="awas2" <?php if(!empty($awas) && $awas=="awas2"){ echo "disabled"; }?>>Awas</button>  
        <button class="last_row" name="siaga" value="siaga2" <?php if(!empty($siaga) && $siaga=="siaga2"){ echo "disabled"; }?>>Siaga</button>  
        <button class="last_row" name="waspada" value="waspada2" <?php if(!empty($waspada) && $waspada=="waspada2"){ echo "disabled"; }?>>Waspada</button>  
        <button class="last_row" name="stop" value="stop2" <?php if(!empty($stop) && $stop=="stop2"){ echo "disabled"; }?>>Stop</button>  
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td colspan="1" rowspan="2">Dua Bencana</td>
        <td><button class="last_row" name="start" value="start3" <?php if(!empty($start) && $start=="start3"){ echo "disabled"; }?>>Start</button>  
        <button class="last_row" name="awas" value="awas3" <?php if(!empty($awas) && $awas=="awas3"){ echo "disabled"; }?>>Awas</button>  
        <button class="last_row" name="siaga" value="siaga3" <?php if(!empty($siaga) && $siaga=="siaga3"){ echo "disabled"; }?>>Siaga</button>  
        <button class="last_row" name="waspada" value="waspada3" <?php if(!empty($waspada) && $waspada=="waspada3"){ echo "disabled"; }?>>Waspada</button>  
        <button class="last_row" name="stop" value="stop3" <?php if(!empty($stop) && $stop=="stop3"){ echo "disabled"; }?>>Stop</button>  
		Bencana 1</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td><button class="last_row" name="start" value="start4" <?php if(!empty($start) && $start=="start4"){ echo "disabled"; }?>>Start</button>  
        <button class="last_row" name="awas" value="awas4" <?php if(!empty($awas) && $awas=="awas4"){ echo "disabled"; }?>>Awas</button>  
        <button class="last_row" name="siaga" value="siaga4" <?php if(!empty($siaga) && $siaga=="siaga4"){ echo "disabled"; }?>>Siaga</button>  
        <button class="last_row" name="waspada" value="waspada4" <?php if(!empty($waspada) && $waspada=="waspada4"){ echo "disabled"; }?>>Waspada</button>  
        <button class="last_row" name="stop" value="stop4" <?php if(!empty($stop) && $stop=="stop4"){ echo "disabled"; }?>>Stop</button>  
		Bencana 2</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td>Start/Stop Bencana</td>
        <td><button class="last_row" name="start" value="start5a" <?php if(!empty($start) && $start=="start5a"){ echo "disabled"; }?>>Start</button>  
        <button class="last_row" name="stoppos" value="stoppos5" <?php if(!empty($stoppos) && $stoppos=="stoppos5"){ echo "disabled"; }?>>Kd Pos</button>  
        <button class="last_row" name="start" value="start5b" <?php if(!empty($start) && $start=="start5b"){ echo "disabled"; }?>>Start</button>  
        <button class="last_row" name="stoppacket" value="stoppacket5" <?php if(!empty($stoppacket) && $stoppacket=="stoppacket5"){ echo "disabled"; }?>>Packet</button>  
        <button class="last_row" name="stop" value="stop5" <?php if(!empty($stop) && $stop=="stop5"){ echo "disabled"; }?>>Stop</button>  
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td>Otoritas Bencana</td>
        <td><button class="last_row" name="start" value="start6" <?php if(!empty($start) && $start=="start6"){ echo "disabled"; }?>>Start</button>  
        <button class="last_row" name="bmkg" value="bmkg6" <?php if(!empty($bmkg) && $bmkg=="bmkg6"){ echo "disabled"; }?>>BMKG</button>  
        <button class="last_row" name="bnpb" value="bnpb6" <?php if(!empty($bnpb) && $bnpb=="bnpb6"){ echo "disabled"; }?>>BNPB</button>   
        <button class="last_row" name="stop" value="stop6" <?php if(!empty($stop) && $stop=="stop6"){ echo "disabled"; }?>>Stop</button>  
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Kode Pos On</td>
        <td><button class="last_row" name="start" value="start7" <?php if(!empty($start) && $start=="start7"){ echo "disabled"; }?>>Start</button>&nbsp;
        <button class="last_row" name="satu" value="satu7" <?php if(!empty($satu) && $satu=="satu7"){ echo "disabled"; }?>>3</button>&nbsp;
        <button class="last_row" name="dua" value="dua7" <?php if(!empty($dua) && $dua=="dua7"){ echo "disabled"; }?>>33</button>&nbsp;
		<button class="last_row" name="tiga" value="tiga7" <?php if(!empty($tiga) && $tiga=="tiga7"){ echo "disabled"; }?>>333</button>&nbsp;
		<button class="last_row" name="empat" value="empat7" <?php if(!empty($empat) && $empat=="empat7"){ echo "disabled"; }?>>3333</button>&nbsp;
		<button class="last_row" name="lima" value="lima7" <?php if(!empty($lima) && $lima=="lima7"){ echo "disabled"; }?>>33333</button>&nbsp;
        <button class="last_row" name="stop" value="stop7" <?php if(!empty($stop) && $stop=="stop7"){ echo "disabled"; }?>>Stop</button>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td>Kode Pos Off</td>
        <td><button class="last_row" name="start" value="start8" <?php if(!empty($start) && $start=="start8"){ echo "disabled"; }?>>Start</button>&nbsp;
        <button class="last_row" name="satu" value="satu8" <?php if(!empty($satu) && $satu=="satu8"){ echo "disabled"; }?>>8</button>&nbsp;
        <button class="last_row" name="dua" value="dua8" <?php if(!empty($dua) && $dua=="dua8"){ echo "disabled"; }?>>38</button>&nbsp;
		<button class="last_row" name="tiga" value="tiga8" <?php if(!empty($tiga) && $tiga=="tiga8"){ echo "disabled"; }?>>338</button>&nbsp;
		<button class="last_row" name="empat" value="empat8" <?php if(!empty($empat) && $empat=="empat8"){ echo "disabled"; }?>>3338</button>&nbsp;
		<button class="last_row" name="lima" value="lima8" <?php if(!empty($lima) && $lima=="lima8"){ echo "disabled"; }?>>33338</button>&nbsp;
        <button class="last_row" name="stop" value="stop8" <?php if(!empty($stop) && $stop=="stop8"){ echo "disabled"; }?>>Stop</button>
		</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Simbol Bencana</td>
        <td><select name="simbol">
		   <option value="">Pilih Simbol Bencana</option>
            <option value="gempa" <?php if(!empty($simbol) && $simbol=="gempa"){ echo "selected"; }?>>1 .Gempa Bumi</option>
            <option value="tsunami" <?php if(!empty($simbol) && $simbol=="tsunami"){ echo "selected"; }?>>2  .Tsunami</option>
            <option value="letusan" <?php if(!empty($simbol) && $simbol=="letusan"){ echo "selected"; }?>>3  .Letusan Gunung Berapi</option>
            <option value="gerakan" <?php if(!empty($simbol) && $simbol=="gerakan"){ echo "selected"; }?>>4  .Gerakan Tanah</option>
            <option value="banjir" <?php if(!empty($simbol) && $simbol=="banjir"){ echo "selected"; }?>>5  .Banjir</option>
            <option value="kekeringan" <?php if(!empty($simbol) && $simbol=="kekeringan"){ echo "selected"; }?>>6  .Kekeringan</option>
            <option value="kebakaranhutan" <?php if(!empty($simbol) && $simbol=="kebakaranhutan"){ echo "selected"; }?>>7  .Kebakaran Hutan dan Lahan</option>
            <option value="erosi" <?php if(!empty($simbol) && $simbol=="erosi"){ echo "selected"; }?>>8  .Erosi</option>
            <option value="kebakarangedung" <?php if(!empty($simbol) && $simbol=="kebakarangedung"){ echo "selected"; }?>>9  .Kebakaran Gedung dan Pemukiman</option>
            <option value="gelombang" <?php if(!empty($simbol) && $simbol=="gelombang"){ echo "selected"; }?>>10.Gelombang Exstrim dan Abrasi</option>
            <option value="cuaca" <?php if(!empty($simbol) && $simbol=="cuaca"){ echo "selected"; }?>>11.Cuaca Exstrim</option>
            <option value="kegagalan" <?php if(!empty($simbol) && $simbol=="kegagalan"){ echo "selected"; }?>>12.Kegagalan Teknologi</option>
            <option value="epidemi" <?php if(!empty($simbol) && $simbol=="epidemi"){ echo "selected"; }?>>13.Epidemi dan Wabah Penyakit</option>
            <option value="konflik" <?php if(!empty($simbol) && $simbol=="konflik"){ echo "selected"; }?>>14.Konflik Sosial</option>
            <option value="cadangan" <?php if(!empty($simbol) && $simbol=="cadangan"){ echo "selected"; }?>>15.Cadangan</option>
          </select>
		</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><button class="last_row" name="start" value="start10" <?php if(!empty($start) && $start=="start10"){ echo "disabled"; }?>>Start</button>  
        <button class="last_row" name="awas" value="awas10" <?php if(!empty($awas) && $awas=="awas10"){ echo "disabled"; }?>>Awas</button>  
        <button class="last_row" name="siaga" value="siaga10" <?php if(!empty($siaga) && $siaga=="siaga10"){ echo "disabled"; }?>>Siaga</button>  
        <button class="last_row" name="waspada" value="waspada10" <?php if(!empty($waspada) && $waspada=="waspada10"){ echo "disabled"; }?>>Waspada</button>  
        <button class="last_row" name="stop" value="stop10" <?php if(!empty($stop) && $stop=="stop10"){ echo "disabled"; }?>>Stop</button> 
		</td>
        <td>&nbsp;</td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
        <td>&nbsp;</td>
	  </tr>
	</tbody>
  </table>
</form>
<br>
  <table width="780" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td width="6"></td>
        <td width="133"></td>
        <td width="574">&nbsp; </td>
        <td width="19">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Status Player</td>
        <td><?php if(!empty($all_error)){ echo $all_error;}else{ echo "-";} ?></td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td>Status Hardware</td>
        <td><div id="lihat_hasil"></div></td>
        <td>&nbsp;</td>
	  </tr>
	  <tr>
        <td>&nbsp;</td>
        <td valign="top">Konfigurasi</td>
        <td valign="top"><?php echo $menu_admin ?><a href="setting.php" title="konfigurasi untuk system konfigurasi modulator">Setting</a> | <a href="logout.php">Logout</a><br></td>
        <td valign="top">&nbsp;</td>
	  </tr>
      <tr>
        <td colspan="4" rowspan="1" align="center">
        <h4 align="center">copyright&copy;2014</h4>
        </td>
      </tr>
</table>

</body></html>
