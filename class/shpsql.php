<?php
//data conecction with postgres
define('DB_HOST', 'localhost');
define('DB_PORT', '5432');     
define('DB_NAME', 'siarapurimac');
define('DB_USER', 'postgres');
define('DB_PASS', '123456');

if ($_FILES['fileShape']["error"][0] > 0){
  echo "Error: " . $_FILES['fileShape']['error'][0] . "<br>";
}else{
    for ($index = 0; $index < count($_FILES['fileShape']['name']); $index++) {
        //file move to folder shape
        move_uploaded_file($_FILES['fileShape']['tmp_name'][$index],"../shape/" . $_FILES['fileShape']['name'][$index]);
        //capture extension the file shp
        $extensionfile = explode('.', $_FILES['fileShape']['name'][$index]);
        //compare if equal shp
        if($extensionfile[1]=='shp'){
            //save file name the file shape with extension
            $fileName = $_FILES['fileShape']['name'][$index];
            //save file name
            $name = $extensionfile[0];
        }
    }    
    //convert file shape to sql and sabe file .sql in directory shape
    exec("shp2pgsql -W Latin1 -s 24047 ../shape/".$fileName." ".$name." > ../sql/".$name.".sql");
    //string conecction with postgres
    $db = new PDO('pgsql:host=' . DB_HOST . ';'
                     . 'port=' . DB_PORT . ';'
                     . 'dbname=' . DB_NAME . ';'
                     . 'user=' . DB_USER . ';'
                     . 'password=' . DB_PASS);
    // get contents file .sql
    $sql = file_get_contents('../sql/'.$name.'.sql');
    //execute content the file .sql and return one number if is correct
    $qr = $db->exec($sql);
    echo($qr);
}