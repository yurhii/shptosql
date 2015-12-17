<?php


//exec("shp2pgsql -W Latin1 -s 4326 F:\aviso_88_2015\aviso88_2015.shp aviso88_2015 > F:\aviso_88_2015\avis88_2015.sql");
//exec("shp2pgsql -W Latin1 -s 4326 ../shape/".$fileName." ".$name." > ../sql/".$name.".sql");
//echo exec("C:/Program Files (x86)/Notepad++/notepad++.exe");



//data conecction with postgres
define('DB_HOST', 'localhost');
define('DB_PORT', '5432');     
define('DB_NAME', 'siarapurimac');
define('DB_USER', 'postgres');
define('DB_PASS', '123456');

$messageError = "<div id='success' class=\"alert alert-danger alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
  <strong>Error!</strong> seleccione bien sus archivos
</div>";
$messageCorrect = "<div id='success' class=\"alert alert-success alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
  <strong>Correcto!</strong> proceso satisfactorio...
</div>";

if ($_FILES['fileShape']["error"][0] > 0){
    echo $messageError;
}else{
    
    if(count($_FILES['fileShape']['name'])==3){
        $validextensions = array("shp", "dbf", "shx");
        $e1 = explode('.', $_FILES['fileShape']['name'][0]);
        $e2 = explode('.', $_FILES['fileShape']['name'][1]);
        $e3 = explode('.', $_FILES['fileShape']['name'][2]);

        $file_extension1 = end($e1);
        $file_extension2 = end($e2);
        $file_extension3 = end($e3);
        
        if(in_array($file_extension1, $validextensions) && in_array($file_extension2, $validextensions) && in_array($file_extension3, $validextensions)){
        
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
            exec("shp2pgsql -W Latin1 -s 4326 ../shape/".$fileName." ".$name." > ../sql/".$name.".sql");
            //string connection with postgres
            $db = new PDO('pgsql:host=' . DB_HOST . ';'
                             . 'port=' . DB_PORT . ';'
                             . 'dbname=' . DB_NAME . ';'
                             . 'user=' . DB_USER . ';'
                             . 'password=' . DB_PASS);
            // get contents file .sql
            $sql = file_get_contents('../sql/'.$name.'.sql');
            //execute content the file .sql and return one number if is correct
            $qr = $db->exec($sql);
            echo $messageCorrect;
    
        }  else {
            echo $messageError;
        }
    
    }else{
        echo $messageError;
    }
}