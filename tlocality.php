
<?php
require_once("class/queryalert.php");
$tablaLevelMain = new Queryalert();
$loc = $_POST['txtLocality'];

?>
  <table class="table table-bordered">
    <thead style="background-color: #D9EDF7">                                    
    <th>Distrito</th>
    <th>Nivel 1</th>
    <th>Nivel 2</th>
    <th>Nivel 3</th>
    <th>Nivel 4</th>
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
