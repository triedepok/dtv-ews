<?php 
function open_connection(){
	//konfigurasi
    $host="localhost";
    $user="root";
    $pass="skm2010";
    $db="ews_server";
    //koneksi databases
    $koneksi=mysql_connect($host,$user,$pass);
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

?>
