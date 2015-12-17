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
                    <!--<div class="col-md-12">-->
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Seleccione la alerta
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
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
                                    <th>Título</th>
                                    <th>Fecha</th>                                    
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($queryAlert->getAlertas() as $value) { ?>
                                        <tr>                                            
                                            <td>                                                
                                                <input type="radio" name="rbtnAlert" id="rbtnAlert" value="<?php echo $value['ale_nombre'];?>">
                                                <?php echo $value['ale_nombre'];?>                                                
                                            </td>
                                            <td><?php echo $value['ale_fecha']?></td>
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
                            <?php
                            if(!empty($_GET['msj'])){
                                $messageError = "<div id='success' class=\"alert alert-danger alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
  <strong>Error!</strong>".$_GET['msj']." 
</div>";
                                echo $messageError;
                            }                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        
    </body>
</html>