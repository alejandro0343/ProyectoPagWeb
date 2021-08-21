<?php
function formatoImg($archivo,$nombrearchivo){
    $ruta = '../imagenes';
    $extension = '';
    $info = pathinfo($nombrearchivo);
    if ($archivo != '' ) {
        $extension = $info['extension'];
        if ($extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG') {
            $nombreFile = rand(0000,9999).'.'.$extension;
            move_uploaded_file($archivo,'../imagenes/'.$nombreFile);
            $ruta = $ruta.'/'.$nombreFile;
        } else {
            echo "Error";
            exit;
        }
        echo  $ruta;
    } else {
        $ruta = '../imagenes/logo.jpg';
    }
    return $ruta;
}
?>