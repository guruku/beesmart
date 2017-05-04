<?php
function &backup_tables($host, $user, $pass, $name, $tables = '*'){
  $data = "\n/*---------------------------------------------------------------".
          "\n  SQL DB BACKUP ".date("d.m.Y H:i")." ".
          "\n  HOST: {$host}".
          "\n  DATABASE: {$name}".
          "\n  TABLES: {$tables}".
          "\n  ---------------------------------------------------------------*/\n";
  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);
  mysql_query( "SET NAMES `utf8` COLLATE `utf8_general_ci`" , $link ); // Unicode

  if($tables == '*'){ //get all of the tables
    $tables = array();
    $result = mysql_query("SHOW TABLES");
    while($row = mysql_fetch_row($result)){
      $tables[] = $row[0];
    }
  }else{
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }

  foreach($tables as $table){
    $data.= "\n/*---------------------------------------------------------------".
            "\n  TABLE: `{$table}`".
            "\n  ---------------------------------------------------------------*/\n";           
    $data.= "DROP TABLE IF EXISTS `{$table}`;\n";
    $res = mysql_query("SHOW CREATE TABLE `{$table}`", $link);
    $row = mysql_fetch_row($res);
    $data.= $row[1].";\n";

    $result = mysql_query("SELECT * FROM `{$table}`", $link);
    $num_rows = mysql_num_rows($result);    

    if($num_rows>0){
      $vals = Array(); $z=0;
      for($i=0; $i<$num_rows; $i++){
        $items = mysql_fetch_row($result);
        $vals[$z]="(";
        for($j=0; $j<count($items); $j++){
          if (isset($items[$j])) { $vals[$z].= "'".mysql_real_escape_string( $items[$j], $link )."'"; } else { $vals[$z].= "NULL"; }
          if ($j<(count($items)-1)){ $vals[$z].= ","; }
        }
        $vals[$z].= ")"; $z++;
      }
      $data.= "INSERT INTO `{$table}` VALUES ";      
      $data .= "  ".implode(";\nINSERT INTO `{$table}` VALUES ", $vals).";\n";
    }
	
	if($_REQUEST['aksi']=='2'){
	$sql = mysql_query("TRUNCATE TABLE $table");	
	}

  }

	

  mysql_close( $link );
  return $data;
}
?>

<?php
// create backup
//////////////////////////////////////

if (!file_exists('C:/CBT_BEESMART')) {
    mkdir('C:/CBT_BEESMART', 0777, true);
}

$tabel = "cbt_jawaban,cbt_kelas,cbt_mapel,cbt_nilai,cbt_paketsoal,cbt_siswa,cbt_siswa_ujian,cbt_soal,cbt_tugas,cbt_ujian";

//$backup_file = 'data/'.time().'-'.$tabel.'.sql';
$backup_file = 'C:/CBT_BEESMART/dbee_'.time().'.sql';
// get backup
//$mybackup = backup_tables("localhost:3306","root","","beesmartv3","*");
$mybackup = backup_tables("localhost:3306","root","","beesmartv3",$tabel);

// save to file
$handle = fopen($backup_file,'w+');
fwrite($handle,$mybackup);
fclose($handle);

?>
<br /><div class="alert alert-success alert-dismissable" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Tabel <?php echo $tabel; ?> telah di Backup<br />
                                Lokasi file Backup, Silahkan Lihat folder C:/CBT_BEESMART/
                            </div>