<?php

define('DB_HOST', 'localhost');  // MySQL server hostname
define('DB_PORT', '5432');       // MySQL server port number (default 3306)
define('DB_NAME', 'siarapurimac');       // MySQL database name
define('DB_USER', 'postgres');   // MySQL username
define('DB_PASS', '123456');       // password

if ($_FILES['fileShape']["error"] > 0){
  echo "Error: " . $_FILES['fileShape']['error'] . "<br>";
}else{
    $fileName = $_FILES['fileShape']['name'];    
    move_uploaded_file($_FILES['fileShape']['tmp_name'],"../sql/" . $_FILES['fileShape']['name']);
    $db = new PDO('pgsql:host=' . DB_HOST . ';'
                     . 'port=' . DB_PORT . ';'
                     . 'dbname=' . DB_NAME . ';'
                     . 'user=' . DB_USER . ';'
                     . 'password=' . DB_PASS);
    //$db = pg_connect("host=localhost port=5432 dbname=siarapurimac user=postgres password=123456");
    $sql = file_get_contents('../sql/'.$fileName); //file name should be name of SQL file with .sql extension. 
    $qr = $db->exec($sql);    
    echo($qr);
    
}


//shell_exec("C:\\path\\to\\cmd.exe /c C:\\batchfile.cmd");
//if ($_FILES['fileShape']["error"] > 0){
//  echo "Error: " . $_FILES['fileShape']['error'] . "<br>";
//}else{
//    $fileName = $_FILES['fileShape']['name'];
//    
//    //exec("shp2pgsql -W Latin1 -s 24047 F:\\aviso_65_2015\\".$fileName. "aviso_65_nevadas > F:\\aviso_65_2015\\aviso_65_nevadas.sql");
//    echo $fileName;
//    //psql -d basededatos -h localhost -U postgres -p54321 -f ocean.sql
//    exec("psql -d siarapurimac -h localhost -U postgres -w -p 5432 -f F:\\aviso_65_2015\\aviso_65_nevadas.sql");
//    //Password for user postgres:
//    //exec("psql siarapurimac < F:\\aviso_65_2015\\aviso_65_nevadas.sql");
//    //exec("Password:123456");
//}
//exec('shp2pgsql -W Latin1 -s 24047 F:\aviso_88_2015\aviso88_2015.shp aviso88_2015 > F:\aviso_88_2015\aviso88_2015.sql');