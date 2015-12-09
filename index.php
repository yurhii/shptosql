<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">                
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shape to sql</title>
        <link href="public/css/micss.css" rel="stylesheet" media="screen">
        <link href="public/css/bootstrap.css" rel="stylesheet" media="screen">
    </head>
    <body style="margin-bottom: 0; padding: 0;">
        <div class="contenido" id="container">            
            <div class="col-md-12">
               	<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Convertir Shape a Sql</div>
                            <div class="panel-body">                              
                                                            
                                <a href="../shptosql/class/shpsql.php">ir</a>
                            <form method="POST" action="../shptosql/class/shpsql.php" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="fileShape" class="col-sm-2 control-label">Seleccione archivo Shape</label>
                                  <div class="col-sm-10">
                                    <!--<input type="file" id="fileShape" name="fileShape" class="form-control" webkitdirectory directory multiple>-->
                                      <input type="file" id="fileShape" name="fileShape" class="form-control">
                                    <p class="help-block">Nota: Ruta del directorio donde se encuentra el shape</p>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="txtFechaInicio" class="col-sm-2 control-label">Fecha Inicio (dia/mes/año)</label>
                                  <div class="col-sm-10">
                                      <div class="form-control">
                                    <select name="fi_dia" id="fi_dia">
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>                                        
                                    </select>
                                 
                                    <select name="fi_mes" id="fi_mes">
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>                                                                            
                                    </select>
                                    
                                    <select name="fi_anio" id="fi_anio">
                                        <option>2001</option>
                                        <option>2002</option>
                                        <option>2003</option>
                                        <option>2004</option>
                                        <option>2005</option>
                                        <option>2006</option>
                                        <option>2007</option>
                                        <option>2008</option>
                                        <option>2009</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>                                                                             
                                    </select>
                                          
                                      </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="txtFechaFin" class="col-sm-2 control-label">Fecha Fin (dia/mes/año)</label>
                                  <div class="col-sm-10">
                                      <div class="form-control">
                                    <select name="ff_dia" id="ff_dia">
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>                                        
                                    </select>
                                 
                                    <select name="ff_mes" id="ff_mes">
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>                                                                            
                                    </select>

                                    <select name="ff_anio" id="ff_anio">
                                        <option>2001</option>
                                        <option>2002</option>
                                        <option>2003</option>
                                        <option>2004</option>
                                        <option>2005</option>
                                        <option>2006</option>
                                        <option>2007</option>
                                        <option>2008</option>
                                        <option>2009</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>                                                                             
                                    </select>
                                          
                                      </div>
                                  </div>
                                </div>
                                    
                                <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Exportar Shape</button>
                                  </div>
                                </div>
                             </form>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                      80%
                                    </div>
                                </div>
                                
                                
                                
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
