<?php 
date_default_timezone_set('Asia/Jakarta'); // set tanggal ke lokal indonesia
ini_set("error_reporting", E_ALL & ~E_DEPRECATED);

function open_connection(){
    //koneksi databases
    $filename	= "/home/".get_current_user()."/.gdm-db";
    $ini_array	= parse_ini_file($filename);
    $host	= $ini_array['hostname'];
    $user	= $ini_array['username'];
    $pass	= $ini_array['password'];
    $db		= $ini_array['database'];
    $koneksi	= mysql_connect($host,$user,$pass);
    mysql_select_db($db,$koneksi);
    return $koneksi;
}

function close_connection(){
    mysql_close(open_connection()) ;
    return true;
}



function real_escape($data){
    if(substr_count($data,'|')>0){
        $aray=explode("|",$data);
        for($i=0;$i<count($aray);$i++){
            $aray[$i]=mysql_real_escape_string($aray[$i]);
            $aray[$i]="'".$aray[$i]."'";
        }
        $aray=implode(",",$aray);
        return $aray;
    }
    else{
        $aray =mysql_real_escape_string($data);
        $aray="'".$aray."'";
        return $aray;
    }
}
function update($tabel,$field,$data){
    if(open_connection()){
        $data=real_escape($data);
        $query = "UPDATE $tabel SET ";
        if(substr_count($field,',')>0){
            $aray=explode(",",$field);
            $aray2=explode(",",$data);
            for($i=0;$i<count($aray);$i++){
                $query=$query.$aray[$i]."=".$aray2[$i];
                if($i<(count($aray)-1)){
                    $query=$query.",";
                }
            }
        }else{
            $query = $query."$field=$data";
        }
        mysql_query($query);
        close_connection();
        return true;
    }
}
function truncate_table($tabel){

    if(open_connection()){
        $query = "TRUNCATE TABLE $tabel ";
        mysql_query($query);
        close_connection();
        return 0;
    }
}
function tanggal($tgl){
    $tgl = date('d/m/Y H:i:s',strtotime($tgl));
    return $tgl;
}
function cek_session(){
	if (!isset($_SESSION)) {
        session_start();
	}
    if(empty($_SESSION['username']) || empty($_SESSION['nama']) || empty($_SESSION['level'])){
 		header('location:logout.php');
	}else if(($_SESSION['level'] > 3) || ($_SESSION['level'] < 1)){
 		header('location:logout.php');
	}
	if (time() > $_SESSION['expire']){
		header('location:logout.php');
	}
	if(open_connection()){
		$user_id = $_SESSION['username'];
		$row=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user_id='$user_id'"));
		$disabled = $row['disabled'];
		if($disabled == 0){
			header('location:logout.php');
		}
	}
}

?>
