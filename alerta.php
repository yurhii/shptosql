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
            $queryAlert = new Queryalert();
        ?>
        <div class="contenido" id="container">
            <br>
            <div class="col-md-12">
                
            
            <div class="row">
                <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        
                        <li role="presentation" class="active"><a href="#"><center>MENU</center></a></li>
                        <li role="presentation"><a href="tmain.php"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Alerta General</a></li>
                        <li role="presentation"><a href="alerta.php"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Historial de alerta</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-10">
                
               	<div class="row">
                <div class="col-md-12 col-md-offset-0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                HISTORIAL DE ALERTAS
                                </center>
                            </div>
                            <div class="panel-body">
                                <?php
                                    if(!empty($_GET['msj'])){
                                $messageError = "<div id='success' class=\"alert alert-danger alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
  <strong>Error!</strong>".$_GET['msj']." 
</div>";
                                echo $messageError;
                            }
                                    
                                    ?>
                                <div class="row">
                                <div class="col-md-8">
                                    
                                  <form method="post" action="/shptosql/tablelevel.php" class="form-inline">                                    
                                    
                                    <div class="radio">
                                    <label>
                                      <input type="radio" name="rbtnLocality" id="rbtnLocality" value="1" checked>
                                      Provincial
                                    </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="rbtnLocality" id="rbtnLocality" value="2">
                                        Distrital
                                      </label>
                                    </div>
                                    <br>
                                    <br>
                                    
                                        
                                <table class="table table-bordered">
                                    
                                    <thead style="background-color: #D9EDF7">                                    
                                        <th><center>Título</center></th>                                    
                                        <th><center>Fecha Inicio</center></th>
                                        <th><center>Fecha Fin</center></th>                                    
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        foreach ($queryAlert->getAlertas() as $value) { ?>
                                        <tr>                                            
                                            <td>                                                
                                                <input type="radio" name="rbtnAlert" id="rbtnAlert" value="<?php echo $value['ale_id'];?>">
                                                <?php echo $value['ale_nombre'];?>                                                
                                            </td>
                                            <td><center><?php echo $value['ale_fecha_inicio']?></center></td>
                                            <td><center><?php echo $value['ale_fecha_fin']?></center></td>
                                        </tr>
                                        <?php                                     
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                        
                                    <button type="submit" class="btn btn-success">Ver Nivel de alertas </button>
                                </form>                            
                               
                                </div>
                                
                                    
                                </div>
                                
                            </div>
                        </div>
                </div>
                </div>
                </div> 
            </div>
            </div>           
        </div>        
    </body> 
</html>

                      



