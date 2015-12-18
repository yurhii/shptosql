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
            $("#form-shpsql").on('submit',(function(e) {
                e.preventDefault();
                $("#message").empty();
                $('#loading').show();
            $.ajax({
                url: "class/shpsql.php",
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
       
        <div class="contenido" id="container">            
            <div class="col-md-12">
               	<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Convertir Shape a Sql</div>
                            <div class="panel-body">
                            <form  id="form-shpsql" action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                  <label for="fileShape" class="col-sm-2 control-label">Seleccionar archivos </label>
                                  <div class="col-sm-10">
                                    <!--<input type="file" id="fileShape" name="fileShape" class="form-control" webkitdirectory directory multiple>-->
                                      <input type="file" id="fileShape" accept=".shp, .dbf, .shx" name="fileShape[]" class="form-control" multiple>
                                      <p class="help-block">Nota: seleccionar 3 archivos con extensión <b>(*.shp) , (*.dbf) , (*.shx)</b></p>
                                  </div>
                                </div> 
                                
                                <div class="form-group">
                                  <label for="txtFechaInicio" class="col-sm-2 control-label">Fecha Inicio (dia/mes/año)</label>
                                  <div class="col-sm-10">
                                      <div class="form-control">
                                    <select name="fi_dia" id="fi_dia">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>                                        
                                    </select>
                                 
                                    <select name="fi_mes" id="fi_mes">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>                                                                            
                                    </select>
                                    
                                    <select name="fi_anio" id="fi_anio">
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                    </select>
                                          
                                      </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="txtFechaFin" class="col-sm-2 control-label">Fecha Fin (dia/mes/año)</label>
                                  <div class="col-sm-10">
                                      <div class="form-control">
                                    <select name="ff_dia" id="ff_dia">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>                                        
                                    </select>
                                 
                                    <select name="ff_mes" id="ff_mes">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>                                                                            
                                    </select>

                                    <select name="ff_anio" id="ff_anio">
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                    </select>
                                          
                                      </div>
                                  </div>
                                </div>
                                
                                
                                <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" value="Procesar Shape" class="btn btn-default" />
                                  </div>
                                </div>
                             </form>
                               <center>
                                <h4 id='loading' style="display: none;" >
                                    <img src="public/image/loading.GIF">
                                    Procesando shape
                                </h4>
                                <div id="message">
                                       
                                </div>
                                </center>
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