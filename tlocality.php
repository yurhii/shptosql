
<?php
require_once("class/queryalert.php");
$tablaLevelMain = new Queryalert();
$loc = $_POST['txtLocality'];

?>
<div style="overflow: auto; height: 475px;">
    
  <table class="table table-bordered">
    <thead style="background-color: #D9EDF7">                                    
    <th><center>Distrito</center></th>
    <th><center>Nivel 1</center></th>
    <th><center>Nivel 2</center></th>
    <th><center>Nivel 3</center></th>
    <th><center>Nivel 4</center></th>
    </thead>
    <tbody>

        <?php
        foreach ($tablaLevelMain->levelProvincia($loc) as $value) { ?>
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

