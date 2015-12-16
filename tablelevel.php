<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shape to sql</title>
        <link href="public/css/micss.css" rel="stylesheet" media="screen">
        <link href="public/css/bootstrap.css" rel="stylesheet" media="screen">        
        <script src="public/js/jquery-2.1.1.min.js" type="text/javascript"></script>        
        <script src="public/js/bootstrap.js" type="text/javascript"></script>
    
    </head>
    <body style="margin-bottom: 0; padding: 0;">
       
        <?php
            require_once("class/queryalert.php");
            $tablaLevel = new Queryalert();
//            foreach ($tablaLevel->getData() as $value) {
//                echo $value['nombre'].'<br>';
//            }
        ?>
        
        <div class="contenido" id="container">            
            <div class="col-md-12">
               	<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Convertir Shape a Sql</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead style="background-color: #D9EDF7">
                                    <th>Provincia</th>
                                    <th>Distrito</th>
                                    <th>Nivel 1</th>
                                    <th>Nivel 2</th>
                                    <th>Nivel 3</th>
                                    <th>Nivel 4</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($tablaLevel->getData() as $value) { ?>
                                        <tr>
                                            <?php 
                                            $localidad = explode('.', $value['nombre']);
                                            $provincia = $localidad[0];
                                            $distrito = $localidad[1];                                            
                                            ?>
                                            <td><?php echo $provincia; ?></td>
                                            <td><?php echo $distrito; ?></td>                                            
                                            <?php
                                            if($value['nivel1']=='Nivel 1'){
                                                echo '<td style="background-color: #e8e8e8;"></td>';
                                            }else{
                                                echo '<td></td>';
                                            }                                            
                                            
                                            if($value['nivel2']=='Nivel 2'){
                                                echo '<td style="background-color: yellow;"></td>';
                                            }else{
                                                echo '<td></td>';
                                            }                                            
                                            
                                            if($value['nivel3']=='Nivel 3'){
                                                echo '<td style="background-color: orange;"></td>';
                                            }else{
                                                echo '<td></td>';
                                            }                                            
                                            
                                            if($value['nivel4']=='Nivel 4'){
                                                echo '<td style="background-color: red;"></td>';
                                            }else{
                                                echo '<td></td>';
                                            }                                            
                                            ?>
                                            
                                        </tr>
                                    <?php }
                                        
                                        ?>
                                    </tbody>
                                </table>
                                
                               
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <footer>
            <center>
                <h4>                   
                    </h4> &copy; ShapeToSql - 2015                   
            </center>
        </footer>
        
    </body>
</html>

                      
