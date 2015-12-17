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
            
            if(!empty($_POST['rbtnLocality']) && !empty($_POST['rbtnAlert'])){
                $locality = $_POST['rbtnLocality'];
                $alert = $_POST['rbtnAlert'];
            }else{                
                $msjError = ' Seleccione una alerta...';
                header("Location: alerta.php?msj=$msjError");                
            }
        ?>
        <div class="contenido" id="container">
            <br>
            <div class="col-md-12">
               	<div class="row">
                <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">NIVEL DE ALERTAS</div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    
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
                                        foreach ($tablaLevel->getLevelLocality($locality,$alert) as $value) { ?>
                                        <tr>
                                            <?php 
                                            $localidad = explode('.', $value['nombre']);
                                            $provincia = $localidad[0];
                                            if(count($localidad) == 2 ){
                                                $distrito = $localidad[1];
                                            }else{
                                                $distrito = '';
                                            }
                                            
                                            ?>
                                            <td><?php echo $provincia; ?></td>
                                            <td><?php echo $distrito; ?></td>                                            
                                            <?php
                                            if($value['nivel1']=='Nivel 1'){
                                                echo '<td style="background-color: #f5f5f5;"></td>';
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
                                <a href="alerta.php" class="btn btn-info">Volver a Alertas</i></a>
                               
                                </div>  
                            <div class="col-md-4">
                                
                                <img src="public/image/nivel_alertas.gif">
                                
                                
                            </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>            
        </div>        
    </body> 
</html>

                      

