<?php
ob_implicit_flush ( true );
require_once "config/db.php";

cek_session();
$user_id = $_SESSION['username'];


if(!empty($_POST['submit'])){
	extract($_POST); // row post data

	// Stop proses player sebelum melakukan update konfigurasi modulator
	if(open_connection()){
		$row_ews = mysql_fetch_array(mysql_query("SELECT * FROM ews_config"));
		$status_player = $row_ews['status_player'];
		$status_player_tmp = $status_player;
		$proses_update = "UPDATE ews_config SET status_muxer=0";
		mysql_query($proses_update);
		while($status_player!=0){
			$row_ews = mysql_fetch_array(mysql_query("SELECT * FROM ews_config"));
			$status_player = $row_ews['status_player'];
			ob_flush(); 
		}
	}close_connection();
	
	if($video_conten=="on"){
		$conten = 1;
	}else{
		$conten = 0;
	}
	$field ="network_id,network_name,ews_service_number,psi_pmt_id,psi_service_number,psi_service_name,psi_bitrate,video_bitrate,psi_video_id,psi_audio_id,ews_bitrate,null_bitrate,card_type,card_port,freq,stream_ip,stream_port,conten,folder_video";
	$data = "$network_id|$network_name|$ews_service_number|$psi_pmt_id|$psi_service_number|$psi_service_name|$psi_bitrate|$video_bitrate|$psi_video_id|$psi_audio_id|$ews_bitrate|$null_bitrate|$card_type|$card_port|$freq|$stream_ip|$stream_port|$conten|$file_video";
	update("ews_config",$field,$data);
	$error = "Data berhasil di update...";
	
	// Start proses player setelah melakukan update konfigurasi modulator
	if(open_connection()){
		if($status_player_tmp==1){
			$proses_update = "UPDATE ews_config SET status_muxer=1";
			mysql_query($proses_update);
			while($status_player!=1){
				$row_ews = mysql_fetch_array(mysql_query("SELECT * FROM ews_config"));
				$status_player = $row_ews['status_player'];
				ob_flush(); 
			}
		} 
	}close_connection();
}



//Row data
if(open_connection()){
	$config = mysql_query("SELECT * FROM ews_config");
	$row_ews = mysql_fetch_array($config);
	$ews_pmt_id = $row_ews['ews_pmt_id'];
	$ews_data_id = $row_ews['ews_data_id'];
	$network_id = $row_ews['network_id'];
	$network_name = $row_ews['network_name'];
	$ews_service_number = $row_ews['ews_service_number'];
	$ews_service_name = $row_ews['ews_service_name'];
	$psi_pmt_id = $row_ews['psi_pmt_id'];
	$psi_service_number = $row_ews['psi_service_number'];
	$psi_service_name = $row_ews['psi_service_name'];
	$psi_bitrate = $row_ews['psi_bitrate'];
	$video_bitrate = $row_ews['video_bitrate'];
	$psi_video_id = $row_ews['psi_video_id'];
	$psi_audio_id = $row_ews['psi_audio_id'];
	$ews_bitrate = $row_ews['ews_bitrate'];
	$null_bitrate = $row_ews['null_bitrate'];
	$card_type = $row_ews['card_type'];
	$card_port = $row_ews['card_port'];
	$freq = $row_ews['freq'];
	$stream_ip = $row_ews['stream_ip'];
	$stream_port = $row_ews['stream_port'];
	$conten = $row_ews['conten'];
	$file_video =  $row_ews['folder_video'];
} close_connection();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><head>
  <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
  <title>EWS-CONFIGURASI</title>
  <link rel="stylesheet" type="text/css" href="css/styleku.css">
  <link rel="shortcut icon" href="images/favicon.ico">
  <meta name="keywords" content="Aplikasi untuk Pengujian Set Top Box DVB-T2" />
  <meta name="description" content="Aplikasi untuk Pengujian Set Top Box DVB-T2, dikembangkan oleh PTIK-BPPT, email:triedepok@gmail.com" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
<form name="form" method="post" action="<?php $_PHP_SELF ?>">
<table width="739" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="99">&nbsp;</td>
    <td width="158">&nbsp;</td>
    <td width="367">&nbsp;</td>
    <td width="76">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div align="center"><h1>KONFIGURASI SISTEM </h1><p align="center"><a href=uji.php>Kembali ke Menu</a></p></div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php if(!empty($error)){ echo "*".$error; } ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>EWS PMT ID </td>
    <td>
      <input name="ews_pmt_id" type="text" id="ews_pmt_id" size="20" maxlength="8" value="<?php if(!empty($ews_pmt_id)){ echo $ews_pmt_id; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>EWS PID </td>
    <td><input name="ews_data_id" type="text" id="ews_data_id" size="20" maxlength="8" value="<?php if(!empty($ews_data_id)){ echo $ews_data_id; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>NETWORK ID </td>
    <td><input name="network_id" type="text" id="network_id" size="20" maxlength="8" value="<?php if(!empty($network_id)){ echo $network_id; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>NETWORK NAME </td>
    <td><input name="network_name" type="text" id="network_name" size="50" maxlength="50" value="<?php if(!empty($network_name)){ echo $network_name; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>EWS SERVICE NUMBER </td>
    <td><input name="ews_service_number" type="text" id="ews_service_number" size="20" maxlength="8" value="<?php if(!empty($ews_service_number)){ echo $ews_service_number; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>EWS SERVICE NAME </td>
    <td><input name="ews_service_name" type="text" id="ews_service_name" size="50" maxlength="50" value="<?php if(!empty($ews_service_name)){ echo $ews_service_name; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>VIDEO PMT ID </td>
    <td><input name="psi_pmt_id" type="text" id="psi_pmt_id" size="20" maxlength="8" value="<?php if(!empty($psi_pmt_id)){ echo $psi_pmt_id; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>VIDEO SERVICE NUMBER</td>
    <td><input name="psi_service_number" type="text" id="psi_service_number" size="20" maxlength="8" value="<?php if(!empty($psi_service_number)){ echo $psi_service_number; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>VIDEO SERVICE NAME </td>
    <td><input name="psi_service_name" type="text" id="psi_service_name" size="50" maxlength="50" value="<?php if(!empty($psi_service_name)){ echo $psi_service_name; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>SI BITRATE </td>
    <td><input name="psi_bitrate" type="text" id="psi_bitrate" size="30" maxlength="30" value="<?php if(!empty($psi_bitrate)){ echo $psi_bitrate; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>VIDEO BITRATE</td>
    <td><input name="video_bitrate" type="text" id="video_bitrate" size="30" maxlength="30" value="<?php if(!empty($video_bitrate)){ echo $video_bitrate; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>AUDIO PID</td>
    <td><input name="psi_audio_id" type="text" id="psi_audio_id" size="20" maxlength="8" value="<?php if(!empty($psi_audio_id)){ echo $psi_audio_id; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>VIDEO PID </td>
    <td><input name="psi_video_id" type="text" id="psi_video_id" size="20" maxlength="8" value="<?php if(!empty($psi_video_id)){ echo $psi_video_id; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>EWS BITRATE</td>
    <td><input name="ews_bitrate" type="text" id="ews_bitrate" size="30" maxlength="30" value="<?php if(!empty($ews_bitrate)){ echo $ews_bitrate; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>NULL BITRATE</td>
    <td><input name="null_bitrate" type="text" id="null_bitrate" size="30" maxlength="30" value="<?php if(!empty($null_bitrate)){ echo $null_bitrate; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>CARD TYPE </td>
    <td><select name="card_type" id="card_type">
        <option value="110" <?php if(!empty($card_type) && $card_type==110){ echo "selected"; } ?>>110</option>
        <option value="115" <?php if(!empty($card_type) && $card_type==115){ echo "selected"; } ?>>115</option>
        <option value="205" <?php if(!empty($card_type) && $card_type==205){ echo "selected"; } ?>>205</option>
        <option value="215" <?php if(!empty($card_type) && $card_type==215){ echo "selected"; } ?>>215</option>
      </select>&nbsp;PORT
	<select name="card_port" id="card_port">
        <option value="1" <?php if(!empty($card_port) && $card_port==1){ echo "selected"; } ?>>1</option>
        <option value="2" <?php if(!empty($card_port) && $card_port==2){ echo "selected"; } ?>>2</option>
      </select>&nbsp;
	FREQ <select name="freq" id="freq">
	<?php for($i=514;$i<800;){
			$i=$i+8;
			echo "<option value=".$i." ";
			if(!empty($freq) && $freq==$i){
				echo "selected";
			}
			echo ">".$i."</option>";
		} ?> </select> &nbsp; MHz</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>FILE VIDEO</td>
    <td><input name="file_video" type="text" id="file_video" size="30" maxlength="30" value="<?php if(!empty($file_video)){ echo $file_video; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>CONTEN VIDEO</td>
    <td><input name="video_conten" type="radio" value="on" <?php if(!empty($conten) && $conten==1){ echo "checked"; } ?>>
      ON 
      <input name="video_conten" type="radio" value="off" <?php if(empty($conten)){ echo "checked"; } ?>>
      OFF</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>STREAM IP </td>
    <td><input name="stream_ip" type="text" id="stream_ip" size="20" maxlength="20" value="<?php if(!empty($stream_ip)){ echo $stream_ip; } ?>"> 
      example:192.168.0.1  
      </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>STREAM PORT </td>
    <td><input name="stream_port" type="text" id="stream_port" size="20" maxlength="20" value="<?php if(!empty($stream_port)){ echo $stream_port; } ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Submit" onclick="return confirm('Anda yakin melakukan perubahan?')"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
