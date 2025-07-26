<?php

require_once('conexion.libreria.php');
require_once('mp3data.php');

$database = new Conexion();
$cnx = $database->getConexion();

if(!is_null($cnx)){
    $sql = "SELECT * FROM track";   
    $st = $cnx->prepare($sql);
    $st->execute();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReproductoraBp</title>
    <link rel="stylesheet" href="hoja_estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="player-container">
        <div class="text-center"><h3>Mi Música</h3></div>
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th class="lead text-muted text-left" colspan="4" scope="col">Titulo</th>
                        <!-- <th class="lead text-muted text-left" colspan="2" scope="col">Artista</th> -->
                    <th class="lead text-muted text-left" colspan="2" scope="col">Genero</th>
                        <th class="lead text-muted text-center" colspan="4" scope="col">Reproducción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!is_null($st)){
                            $data = null;
                            foreach ($st->fetchAll() as $row) {
                                $mp3  = new Mp3Tag();
                                $data = $mp3->Get($row['url_track']);
                                // print_r( $data );
                    ?>
                     
                        <tr id="playlist">
                            <td>
                                <?php

                                if(isset($data['tag']['picture'])){
                                    foreach ( $data['tag']['picture'] as $image ) {   
                                        echo '<img src="data:' . $image['mime'] . ';charset=utf-8;base64,' . $image['data'] . '" style="height: 60px; width: 60px;" />';	
                                    }                               
                                }else
                                    echo "<img src=".$row['url_imagen_track']." title='".$row['titulo_track']."' style='height: 60px; width: estilos;'>";
                                ?>
                            </td>
                            <!-- <td class="text-primary">
                                ?php 
                                if(isset($data['tag']['artist']))
                                    echo $data['tag']['artist'];
                                else
                                    echo $row['autor_track'];
                                ?>
                            </td> -->
                            <!-- <td> | </td> -->
                    
                            <td class="text-success" style="font-size: 12px;">
                                <?php 
                                if(isset($data['tag']['song_title']))
                                    echo $data['tag']['song_title'];
                                else
                                    echo $row['titulo_track'];
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td style="font-size: 10px;"> | </td>
                            <td style="font-size: 10px;">
                                <?php 
                                if(isset($data['tag']['content_type']))
                                    echo $data['tag']['content_type'];
                                else
                                    echo $row['genero_track'];
                                ?>
                            </td>
                            <td> </td>
                            
                            <td class="reproductor-abp text-right">
                                <audio controls class="reproductor-abp" style="width: 200px; height: 40px;">
                                    <source src="<?php echo $row['url_track']; ?>" type="audio/mp3">
                                </audio>   
                            </td>
                            <td> </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>











                                                            
                                                    
