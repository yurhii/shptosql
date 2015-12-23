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
    
        <script>
            $(document).ready(function (e) {
            $("#form-tmain").on('submit',(function(e) {
                e.preventDefault();
                $("#message").empty();
                $('#loading').show();
            $.ajax({
                url: "tmainloc.php",
                type: "POST",             
                data: new FormData(this),
                contentType:false,
                cache: false,
                processData:false,
                success: function(data)   
                {
                $('#loading').hide();
                $("#message").html(data);
                }
            });
            }));
        });
        </script>
        
        
        
        
    </head>
    <body style="margin-bottom: 0; padding: 0;">
        <?php
            require_once("class/queryalert.php");
            $tablaLevelMain = new Queryalert();            
        ?>
        <div class="contenido" id="container">
            <br>
            <div class="col-md-12">
                
            
            <div class="row">
                <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="tmain.php">Alerta General</a></li>
                        <li role="presentation"><a href="alerta.php">Historial de alerta</a></li>
                        
                      </ul>
                </div>
                <div class="col-md-10">
                
               	<div class="row">
                <div class="col-md-12 col-md-offset-0">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <center>
                                NIVEL DE ALERTAS GENERAL
                                </center>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                <div class="col-md-8">
                                    
                            <form id="form-tmain" method="post" action="" class="form-inline">
                                <div class="form-group">
                                    <div class="radio">
                                    <label>
                                      <input type="radio" name="rbtnLocality" id="rbtnLocality" value="Provincia" checked>
                                      Provincial
                                    </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="rbtnLocality" id="rbtnLocality" value="Distrital">
                                        Distrital
                                      </label>
                                    </div>
                                </div>
                                    <input type="submit" value="Ver" class="btn btn-link" />
                            </form>
                                    
                                    <center>
                                    <h4 id='loading' style="display: none;" >
                                        <img src="public/image/loading.GIF">
                                        Procesando Consulta, espere por favor.
                                    </h4>
                                    </center>
                                    <br>
                                    <div id="message">
                                       
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
        foreach ($tablaLevelMain->getLevelMain() as $value) { ?>
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
            <td>                
                <?php echo $provincia; ?>
            </td>
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
                                        
                                        
                                    </div>                           
                               
                                </div>
                                <div class="col-md-4">
                                    <img src="public/image/nivel_alertas.jpg">
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

                      



