<?php
require_once "config/db.php";

//Funsi-fungsi khusus
//===================
//Hapus seluruh data pada tabel trdw,tcdw,tmdw
function hapus_data(){
	if(open_connection()){
		mysql_query("TRUNCATE TABLE trdw");
		mysql_query("TRUNCATE TABLE tcdw");
		mysql_query("TRUNCATE TABLE tmdw");
	}
	close_connection();
}

//Update versi
function update_versi(){
	if(open_connection()){
		$row_ews = mysql_fetch_array(mysql_query("SELECT * FROM ews_config"));
		$versi = $row_ews['version'];
		if($versi < 15){
			$versi++;
		}else{
			$versi=0;
		}
		$proses_update = "UPDATE ews_config SET version='".$versi."'";
		mysql_query($proses_update);
	}
}

//create satu bencana
function satu_bencana($type_tampilan){
	if(open_connection()){
		if(!empty($type_tampilan) && $type_tampilan==1){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33333F','Kab.Meulaboh',0,2),(1,2,1,'33332F','Kab.Sigli',0,2),
			(2,2,1,'33331F','Kab.Pasaman Barat',1,2),(2,2,1,'33334F','Kab.Mentawai',1,2),
			(3,2,1,'33335F','Kab.Sleman',2,2),(3,2,1,'33336F','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,2),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,2)");
		}else if(!empty($type_tampilan) && $type_tampilan==2){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,2),(1,2,1,'33332F','Kab.Sigli',0,2),
			(2,2,1,'33333F','Kab.Pasaman Barat',1,2),(2,2,1,'33334F','Kab.Mentawai',1,2),
			(3,2,1,'33335F','Kab.Sleman',2,2),(3,2,1,'33336F','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,2),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,2)");
		}else if(!empty($type_tampilan) && $type_tampilan==3){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,2),(1,2,1,'33332F','Kab.Sigli',0,2),
			(2,2,1,'33336F','Kab.Pasaman Barat',1,2),(2,2,1,'33334F','Kab.Mentawai',1,2),
			(3,2,1,'33335F','Kab.Sleman',2,2),(3,2,1,'33333F','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,2),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,2)");
		}
	}
	close_connection();
}

//create dua bencana
function dua_bencana($type_tampilan2){
	if(open_connection()){
		if(!empty($type_tampilan2) && $type_tampilan2==1){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33333F','Kab.Meulaboh',0,4),(2,2,1,'33332F','Kab.Sigli',1,4),
			(3,2,1,'33331F','Kab.Pasaman Barat',2,4),
			(1,1,2,'33335F','Kab.Sleman',3,4),(2,1,2,'33336F','Kab.Klaten',4,4)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,4),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,4),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,4),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,4),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,4)");
		}else if(!empty($type_tampilan2) && $type_tampilan2==2){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,4),(2,2,1,'33333F','Kab.Sigli',1,4),
			(3,2,1,'33332F','Kab.Pasaman Barat',2,4),
			(1,1,2,'33335F','Kab.Sleman',3,4),(2,1,2,'33336F','Kab.Klaten',4,4)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,4),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,4),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,4),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,4),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,4)");
		}else if(!empty($type_tampilan2) && $type_tampilan2==3){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,4),(2,2,1,'33332F','Kab.Sigli',1,4),
			(3,2,1,'33333F','Kab.Pasaman Barat',2,4),
			(1,1,2,'33335F','Kab.Sleman',3,4),(2,1,2,'33336F','Kab.Klaten',4,4)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,4),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,4),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,4),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,4),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,4)");
		}else if(!empty($type_tampilan2) && $type_tampilan2==4){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,4),(2,2,1,'33332F','Kab.Sigli',1,4),
			(3,2,1,'33335F','Kab.Pasaman Barat',2,4),
			(1,1,2,'33333F','Kab.Sleman',3,4),(2,1,2,'33336F','Kab.Klaten',4,4)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,4),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,4),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,4),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,4),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,4)");
		}else if(!empty($type_tampilan2) && $type_tampilan2==5){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,4),(2,2,1,'33332F','Kab.Sigli',1,4),
			(3,2,1,'33336F','Kab.Pasaman Barat',2,4),
			(1,1,2,'33335F','Kab.Sleman',3,4),(2,1,2,'33333F','Kab.Klaten',4,4)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,4),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,4),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,4),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,4),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,4)");
		}else if(!empty($type_tampilan2) && $type_tampilan2==6){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,5),(2,2,1,'33332F','Kab.Sigli',1,5),
			(3,2,1,'33336F','Kab.Pasaman Barat',2,5),
			(1,1,2,'33335F','Kab.Sleman',3,5),(2,1,2,'33334F','Kab.Klaten',4,5),(3,1,2,'33333F','Kab.Magelang',5,5)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,5),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,5),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,5),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,5),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,5),
			(3,2,'Telah terjadi Gempa Bumi di Kab.Sleman...',5,5)");
		}
	}
	close_connection();
}

//create satu bencana untuk on/off
function bencana_on($type_model){
	if(open_connection()){
		if(!empty($type_model) && $type_model==1){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,4),(2,2,1,'33333F','Kab.Sigli',1,4),
			(3,2,1,'33334F','Kab.Pasaman Barat',2,4),
			(1,1,2,'33335F','Kab.Sleman',3,4),(2,1,2,'33336F','Kab.Klaten',4,4)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,4),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,4),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,4),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,4),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,4)");
		}else if(!empty($type_model) && $type_model==2){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33331F','Kab.Meulaboh',0,4),(2,2,1,'33332F','Kab.Sigli',1,4),
			(3,2,1,'33334F','Kab.Pasaman Barat',2,4),
			(1,1,2,'33335F','Kab.Sleman',3,4),(2,1,2,'33336F','Kab.Klaten',4,4)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,4),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,4),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,4),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,4),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,4)");
		}else if(!empty($type_model) && $type_model==3){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,255,'33331F','Kab.Meulaboh',0,4),(2,2,255,'33333F','Kab.Sigli',1,4),
			(3,2,255,'33334F','Kab.Pasaman Barat',2,4),
			(1,1,2,'33335F','Kab.Sleman',3,4),(2,1,2,'33336F','Kab.Klaten',4,4)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(255,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,1),
			(2,2,1,'Gempa Bumi','5.35LU 73.03BT 13km Barat Daya Kab.Sleman','11/12/2013 Jam:15:38 WIB','Gempa Bumi Mag:6.7rs Kedalaman 4km',1,1)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,4),
			(2,255,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,4),
			(3,255,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,4),
			(1,2,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',3,4),
			(2,2,'Dihimbau agar seluruh masyarakat untuk selalu berada di tempat lapang, hindari bangunan...',4,4)");;
		}
	}
	close_connection();
}

// create untuk otoritas bencana
function otoritas($type_otoritas){
	if(open_connection()){
		if(!empty($type_otoritas) && $type_otoritas==1){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33333F','Kab.Meulaboh',0,2),(1,2,1,'33332F','Kab.Sigli',0,2),
			(2,2,1,'33331F','Kab.Pasaman Barat',1,2),(2,2,1,'33334F','Kab.Mentawai',1,2),
			(3,2,1,'33335F','Kab.Sleman',2,2),(3,2,1,'33336F','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,2),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,2)");
		}else if(!empty($type_otoritas) && $type_otoritas==2){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33333F','Kab.Meulaboh',0,2),(1,2,1,'33332F','Kab.Sigli',0,2),
			(2,2,1,'33331F','Kab.Pasaman Barat',1,2),(2,2,1,'33334F','Kab.Mentawai',1,2),
			(3,2,1,'33335F','Kab.Sleman',2,2),(3,2,1,'33336F','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,2),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,2)");
		}
	}
}


// create untuk kombinasi on
function kombinasi_on($kombinasion){
	if(open_connection()){
		if(!empty($kombinasion) && $kombinasion==1){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'3FFFFF','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($kombinasion) && $kombinasion==2){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33FFFF','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($kombinasion) && $kombinasion==3){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'333FFF','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($kombinasion) && $kombinasion==4){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'3333FF','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($kombinasion) && $kombinasion==5){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33333F','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}
	}
}

// create untuk kombinasi off
function kombinasi_off($kombinasioff){
	if(open_connection()){
		if(!empty($kombinasioff) && $kombinasioff==1){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'8FFFFF','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($kombinasioff) && $kombinasioff==2){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'38FFFF','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($kombinasioff) && $kombinasioff==3){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'338FFF','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($kombinasioff) && $kombinasioff==4){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'3338FF','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($kombinasioff) && $kombinasioff==5){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'33338F','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}
	}
}


// create untuk kode pos desimal, hexadesimal, berurut
function kode_pos_type($type){
	if(open_connection()){
		if(!empty($type) && $type==1){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'08235F','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($type) && $type==2){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'008235','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}else if(!empty($type) && $type==3){
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'12345F','Kab.Meulaboh',0,0)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,1,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:15:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,0)");
		}
	}
}

//create simbol bencana
function simbol_bencana($type_bencana,$type_disaster){
	if(open_connection()){
		if(!empty($type_bencana) && $type_bencana==1){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,1,1,'$kodepos_1','Kab.Meulaboh',0,2),
			(2,1,1,'$kodepos_2','Kab.Pasaman Barat',1,2),
			(3,1,1,'$kodepos_3','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,1,'Gempa Bumi','1.33LU 93.05BT 396km Barat Daya Meulaboh','12/05/2013 Jam:10:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi ke tanah lapang dan jauhi bangunan/benda2 yang mudah jatuh...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan jauhi bangunan...',1,2),
			(3,1,'Telah terjadi Gempa Bumi dan tidak berpotensi Tsunami...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==2){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,2,1,'$kodepos_1','Kab.Meulaboh',0,2),
			(2,2,1,'$kodepos_2','Kab.Pasaman Barat',1,2),
			(3,2,1,'$kodepos_3','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,2,'Tsunami','1.33LU 93.05BT 396km Barat Daya Meulaboh','11/05/2013 Jam:10:38 WIB','Gempa Bumi Mag:8.3rs Kedalaman 10km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk yang telah ada...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari pantai...',1,2),
			(3,1,'Telah terjadi Gempa Bumi yang berpotensi Tsunami, jauhi aktifitas di sekitar pantai...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==3){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,3,1,'$kodepos_1','Kab.Meulaboh',0,2),
			(2,3,1,'$kodepos_2','Kab.Pasaman Barat',1,2),
			(3,3,1,'$kodepos_3','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,3,'Letusan Gunung Berapi','1.33LU 93.05BT Gunung Merapi','11/01/2014 Jam:10:38 WIB','24x Gempa VB, 4x Gempa VA, 1x Gempa LF dan Gempa Tremor aplitudo 0,5-1mm',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib sesuai petunjuk, anda berada didaerah rawan...',0,2),
			(2,1,'Masyarakat yang berada dalam Kawasan ini agar selalu waspada dan memperhatikan perkembangan aktivitas Gunung yang dikeluarkan oleh BPBD dan SATLAK setempat...',1,2),
			(3,1,'Masyarakat di sekitar Gunung dan pengunjung/wisatawan tidak diperbolehkan mendekati kawah dalam radius 8 km...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==4){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,4,1,'$kodepos_1','Kec.Bekasi Barat',0,2),
			(2,4,1,'$kodepos_2','Kec.Bekasi Timur',1,2),
			(3,4,1,'$kodepos_3','Kec. Jatiasih',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,4,'Gerakan Tanah','1.93LU 66.05BT Kota Bekasi','12/01/2014 Jam:10:38 WIB','Gerakan Tanah terjadi Januari-Februari 2014, 0,24 mm/hari',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi dengan tertib, anda berada didaerah Rawan Longsor...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga persiapkan anda untuk melakukan evakusi...',1,2),
			(3,1,'Telah terjadi Pergerakan tanah yang terjadi berupa longsoran bahan rombakan akibat erosi sungai...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==5){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,5,1,'$kodepos_1','Jakarta Utara',0,2),
			(2,5,1,'$kodepos_2','Jakarta Barat',1,2),
			(3,5,1,'$kodepos_3','Jakarta Selatan',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,5,'Banjir','5.44LU 33.03BT Jakarta Utara','03/01/2014 Jam:10:30 WIB','Curah Hujan Tinggi dan Air Pasang',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Segera lakukan evakuasi, Air diperkirakan datang 30 menit...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga persiapkan anda untuk melakukan evakusi...',1,2),
			(3,1,'Telah terjadi Bencana Banjir di wiliayah Jakarta Utara, Pertimbangkan untuk melewati daerah2 tersebut...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==6){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,6,1,'$kodepos_1','Kec.Danurejan',0,2),
			(2,6,1,'$kodepos_2','Kec.Gondokusuman',1,2),
			(3,6,1,'$kodepos_3','Gunung Kidul',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,6,'Kekeringan','1.33LU 93.05BT DIY','11/05/2013 Jam:15:38 WIB','Kejadian Kekeringan',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Dihimbau agar seluruh masyarakat untuk menghemat Air, akan segera dikirim bantuan Air.....',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk menghemat Air...',1,2),
			(3,1,'Telah terjadi Bencana Kekeringan di DIY dan sekitarnya...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==7){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,7,1,'$kodepos_1','Kab. Bengkalis',0,2),
			(2,7,1,'$kodepos_2','Kab. Kampar',1,2),
			(3,7,1,'$kodepos_3','Kab.Mentawai',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,7,'Kebakaran Hutan dan Lahan','1.33LU 93.05BT Prov. Riau','11/05/2013 Jam:15:38 WIB','Arah angin menuju Arah Tenggara',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Daerah anda rawan kebakaran, pergunakan masker dan jauhi titik api...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat untuk selalu siaga dan menjauh dari titik api dan pergunakan masker...',1,2),
			(3,1,'Telah terjadi Kebakaran yang berpotensi kabut asap, usahakan tidak ke wilayah riau...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==8){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,8,1,'$kodepos_1','Kec.Gondomanan',0,2),
			(2,8,1,'$kodepos_2','Kec.Kotagede',1,2),
			(3,8,1,'$kodepos_3','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,8,'Erosi','1.33LU 93.05BT DIY','11/05/2013 Jam:15:38 WIB','Kejadian Erosi',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Seluruh masyarakat untuk segera mengungsi, daerah anda rawan terhadap erosi...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat berhati-hati, daerah anda rawan terhadap erosi...',1,2),
			(3,1,'Telah terjadi Bencana Erosi di DIY dan sekitarnya...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==9){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,9,1,'$kodepos_1','Desa Tanjung Barat',0,2),
			(2,9,1,'$kodepos_2','Desa Jagakarsa',1,2),
			(3,9,1,'$kodepos_3','Desa Cipedak',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,9,'Kebakaran Gedung dan Pemukiman','1.33LU 93.05BT Kecamatan Jagakarsa','11/05/2013 Jam:15:38 WIB','Kebakaran',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Seluruh masyarakat untuk segera mengungsi, daerah anda rawan terhadap Kebakaran...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat berhati-hati, daerah anda rawan terhadap Kebakaran...',1,2),
			(3,1,'Telah terjadi Bencana Kebakaran Pemukiman di Desa Tanjung Barat, Kecamatan Jagakarsa...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==10){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,10,1,'$kodepos_1','Desa Penjaringan',0,2),
			(2,10,1,'$kodepos_2','Desa Pejagalan',1,2),
			(3,10,1,'$kodepos_3','Desa Kapuk Muara',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,10,'Gelombang Ekstrim dan Abrasi','1.33LU 93.05BT Kecamatan Penjaringan','11/05/2013 Jam:15:38 WIB','Gelombang setinggi 9meter',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Seluruh masyarakat untuk segera mengungsi, daerah anda rawan Abrasi...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat berhati-hati, daerah anda rawan terkena banjir rob...',1,2),
			(3,1,'Telah terjadi Bencana Gelombang Tinggi dan Abrasi di Kecamatan Penjaringan, jauhi aktifitas di Pantai...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==11){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,11,1,'$kodepos_1','Kec.Gondokusuman',0,2),
			(2,11,1,'$kodepos_2','Kec.Kotagede',1,2),
			(3,11,1,'$kodepos_3','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,11,'Cuaca Ekstrim','1.33LU 93.05BT DIY','11/05/2013 Jam:15:38 WIB','Temperatur siang hari 30-40celcius, malam hari 12-20celcius',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Seluruh masyarakat untuk segera mengungsi, daerah anda rawan...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat berhati-hati, daerah anda rawan...',1,2),
			(3,1,'Telah terjadi Cuaca Ekstrim di wilayah DIY dan sebagian Jawa Tenggah...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==12){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,12,1,'$kodepos_1','Kec.Gondokusuman',0,2),
			(2,12,1,'$kodepos_2','Kec.Kotagede',1,2),
			(3,12,1,'$kodepos_3','Kab.Klaten',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,12,'Kegagalan Teknologi','1.33LU 93.05BT DIY','11/05/2013 Jam:15:38 WIB','Kebocoran Reaktor Nuklir, radius radiasi 12km',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Seluruh masyarakat untuk segera mengungsi, daerah anda akan terpapar radiasi...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat berhati-hati, daerah anda rawan terpapar radiasi...',1,2),
			(3,1,'Telah terjadi Kebocoran Reaktor Nuklir pada pembangkit listrik di Yogyakarta, radius radiasi 12km...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==13){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,13,1,'$kodepos_1','Desa Penjaringan',0,2),
			(2,13,1,'$kodepos_2','Desa Pejagalan',1,2),
			(3,13,1,'$kodepos_3','Desa Kapuk Muara',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,13,'Epidemi dan Wabah Penyakit','1.33LU 93.05BT Kecamatan Penjaringan','11/05/2013 Jam:15:38 WIB','Gejala wabah flu burung',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Seluruh masyarakat untuk berhati-hati, segera timbun/bakar unggas yang mati...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat berhati-hati, daerah anda terkena wabah flu burung, jauhi unggas...',1,2),
			(3,1,'Telah terjadi Bencana penyebaran wabah flu burung di Kec.Penjaringan, Jakarta Utara, berhati-hatilah dalam membeli unggas...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==14){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,14,1,'$kodepos_1','Johar Baru,Cempaka Putih',0,2),
			(2,14,1,'$kodepos_2','Kampung Rawa,Cempaka Putih',1,2),
			(3,14,1,'$kodepos_3','Tanah Tinggi,Cempaka Putih',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,14,'Konflik Sosial','1.33LU 93.05BT Kecamatan Cempaka Putih','11/05/2013 Jam:15:38 WIB','Tawuran antar Kelompok',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Seluruh masyarakat untuk berhati-hati...',0,2),
			(2,1,'Dihimbau agar seluruh masyarakat berhati-hati, sedang terjadi tawuran di wilayah Johar Baru...',1,2),
			(3,1,'Telah terjadi tawuran di Johar Baru Kec.Cempaka Putih, berhati-hatilah jika melewati daerah tersebut...',2,2)");
		}else if(!empty($type_bencana) && $type_bencana==15){
			if(!empty($type_disaster) && $type_disaster==1){
				$kodepos_1 = "33333F";$kodepos_2 = "33332F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==2){
				$kodepos_1 = "33332F";$kodepos_2 = "33333F";$kodepos_3 = "33331F";
			}else if(!empty($type_disaster) && $type_disaster==3){
				$kodepos_1 = "33331F";$kodepos_2 = "33332F";$kodepos_3 = "33333F";
			}else{
				$kodepos_1 = "99991F";$kodepos_2 = "99992F";$kodepos_3 = "99993F";
			}
			//disaster-Type_code,disaster_code,package_id,location_code,char_location_code,section_number,last_section_number
			mysql_query("INSERT INTO trdw VALUES(1,15,1,'$kodepos_1','Desa Penjaringan',0,2),
			(2,15,1,'$kodepos_2','Desa Pejagalan',1,2),
			(3,15,1,'$kodepos_3','Desa Kapuk Muara',2,2)");
			//Packet_id,authority,disaster_code,char_disater_code,char_disaster_position,char_disaster_date,char_disaster_characteristic,
			//section_number,last_section_number
			mysql_query("INSERT INTO tcdw VALUES(1,2,15,'Cadangan','Lokasi Cadangan','11/05/2013 Jam:15:38 WIB','Keterangan Cadangan',0,0)");
			//location_type_code,package_id,char_information_message,section_number,last_section_number
			mysql_query("INSERT INTO tmdw VALUES(1,1,'Cadangan untuk wilayah awas...',0,2),
			(2,1,'Cadangan untuk wilayah siaga...',1,2),
			(3,1,'Cadangan untuk wilayah waspada...',2,2)");
		}
	}
}
?>
