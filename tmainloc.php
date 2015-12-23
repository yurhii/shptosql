<script>
    for(var i = 0; i < 7 ; i++){
            $(document).ready(function (e) {
            $("#form-tlocality"+i).click(function(e) {
                e.preventDefault();
                $("#message").empty();
                $('#loading').show();
            $.ajax({
                url: "tlocality.php",
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
            });
        });
    }
        </script>
<?php

require_once("class/queryalert.php");
$tablaLevelMain = new Queryalert();
$locality = $_POST['rbtnLocality'];
?>
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
        $contado = 0;
        foreach ($tablaLevelMain->getLevelLoc($locality) as $value) { ?>
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
                <?php if($locality == 'Provincia'){ ?>
                <form id="form-tlocality<?php echo $contado; ?>" method="post" action="" class="form-inline">
                    <input type="hidden" name="txtLocality" value="<?php echo $provincia; ?>">
                    <input type="submit" value="<?php echo $provincia; ?>" class="btn btn-link" />
                </form>                
                
                <?php } else{
                    echo $provincia;
                } ?>
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
    <?php 
        $contado++;
            }

        ?>
    </tbody>
</table> 
