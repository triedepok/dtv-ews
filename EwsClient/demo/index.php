<?php
require_once "config/config.php";
extract($_GET); // row post data
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>DEMO ERLY WARNING SYSTEM</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<link rel="shortcut icon" href="images/favicon.ico">
	<meta name="keywords" content="Aplikasi untuk Pengujian Set Top Box DVB-T2" />
	<meta name="description" content="Aplikasi untuk Pengujian Set Top Box DVB-T2, dikembangkan oleh PTIK-BPPT, email:triedepok@gmail.com" />
</head>

<body>
<form name="form1" method="get" action="<?php $_PHP_SELF ?>">
<table width="871" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="15">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="634">&nbsp;</td>
    <td width="6">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Jenis Bencana </td>
    <td><select name="disaster_code" id="disaster_code">
      <option value="1" <?php if(!empty($disaster_code) && $disaster_code=="1"){ echo "selected"; }?>>1 .Gempa Bumi</option>
      <option value="2" <?php if(!empty($disaster_code) && $disaster_code=="2"){ echo "selected"; }?>>2 .Tsunami</option>
      <option value="3" <?php if(!empty($disaster_code) && $disaster_code=="3"){ echo "selected"; }?>>3 .Letusan Gunung Berapi</option>
      <option value="4" <?php if(!empty($disaster_code) && $disaster_code=="4"){ echo "selected"; }?>>4 .Gerakan Tanah</option>
      <option value="5" <?php if(!empty($disaster_code) && $disaster_code=="5"){ echo "selected"; }?>>5 .Banjir</option>
      <option value="6" <?php if(!empty($disaster_code) && $disaster_code=="6"){ echo "selected"; }?>>6 .Kekeringan</option>
      <option value="7" <?php if(!empty($disaster_code) && $disaster_code=="7"){ echo "selected"; }?>>7 .Kebakaran Hutan dan Lahan</option>
      <option value="8" <?php if(!empty($disaster_code) && $disaster_code=="8"){ echo "selected"; }?>>8 .Erosi</option>
      <option value="9" <?php if(!empty($disaster_code) && $disaster_code=="9"){ echo "selected"; }?>>9 .Kebakaran Gedung dan Pemukiman</option>
      <option value="10" <?php if(!empty($disaster_code) && $disaster_code=="10"){ echo "selected"; }?>>10.Gelombang Ekstrim dan Abrasi</option>
      <option value="11" <?php if(!empty($disaster_code) && $disaster_code=="11"){ echo "selected"; }?>>11.Cuaca Ekstrim</option>
      <option value="12" <?php if(!empty($disaster_code) && $disaster_code=="12"){ echo "selected"; }?>>12.Kegagalan Teknologi</option>
      <option value="13" <?php if(!empty($disaster_code) && $disaster_code=="13"){ echo "selected"; }?>>13.Epidemi dan Wabah Penyakit</option>
      <option value="14" <?php if(!empty($disaster_code) && $disaster_code=="14"){ echo "selected"; }?>>14.Konflik Sosial</option>
      <option value="15" <?php if(!empty($disaster_code) && $disaster_code=="15"){ echo "selected"; }?>>15.Cadangan</option>
                                </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FF0000">
    <td>&nbsp;</td>
    <td>Tipe Awas </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kode Pos </td>
    <td><select name="propinsi1" id="propinsi1">
      <option selected>Propinsi</option>
    </select> <select name="kabupaten1" id="kabupaten1">
      <option>Kabupaten</option>
    </select> <select name="kecamatan1" id="kecamatan1">
      <option>Kecamatan</option>
    </select> <select name="lokasi1" id="lokasi1">
      <option>Lokasi</option>
    </select>
	<button class="last_row" name="insert" value="insert1">Insert</button> </td>
    <td>&nbsp; </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pesan</td>
    <td>
      <textarea name="pesan1" cols="60" rows="3" wrap="PHYSICAL" id="pesan1"><?php if(!empty($pesan1)){ echo $pesan1; }?></textarea>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFF00">
    <td>&nbsp;</td>
    <td>Tipe Siaga </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kode Pos </td>
    <td><select name="propinsi2" id="propinsi2">
      <option selected>Propinsi</option>
    </select> <select name="kabupaten2" id="kabupaten2">
      <option>Kabupaten</option>
    </select> <select name="kecamatan2" id="kecamatan2">
      <option>Kecamatan</option>
    </select> <select name="lokasi2" id="lokasi2">
      <option>Lokasi</option>
    </select> 
	<button class="last_row" name="insert" value="insert2">Insert</button></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pesan</td>
    <td><textarea name="pesan2" cols="60" rows="3" wrap="PHYSICAL" id="pesan2"><?php if(!empty($pesan2)){ echo $pesan2; }?></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#00FF00">
    <td>&nbsp;</td>
    <td>Tipe Waspada </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kode Pos </td>
    <td><select name="propinsi3" id="propinsi3">
      <option selected>Propinsi</option>
    </select> <select name="kabupaten3" id="kabupaten3">
      <option>Kabupaten</option>
    </select> <select name="kecamatan3" id="kecamatan3">
      <option>Kecamatan</option>
    </select> <select name="lokasi3" id="lokasi3">
      <option>Lokasi</option>
    </select>
	<button class="last_row" name="insert" value="insert3">Insert</button> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pesan</td>
    <td><textarea name="pesan3" cols="60" rows="3" wrap="PHYSICAL" id="pesan3"><?php if(!empty($pesan3)){ echo $pesan3; }?></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
    <button class="last_row" name="proses" value="next">Next</button>&nbsp; <button class="last_row" name="proses" value="simpan">Proses</button>
    </td>
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
