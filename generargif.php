<?php
    header('content-type:image/gif');
    include('gifencoder.class.php');
    $text = "Hola mamá, Salgo en la tele";
    
//abrir el primer recurso de imagen y añadir texto
    
    $image= imagecreatefrompng("soucer01.png");
    $text_color = imagecolorallocate($image,400,400,400);
    imagestring($image, 6, 6, 6, $text, $text_color);
    
//generar GIF de la imagen
    ob_start();
    imagegif($image);
    $frames[]=ob_get_contents();
    $framed[]=40;
    
//retraso de la ianimacion

    ob_end_clean();
//de nuevo
    $image = imagecreatefrompng('source02.png');
    $text_color = imagecolorallocate($image, 400, 400, 400);
    imagestring($image, 5, 20, 20,  $text, $text_color);
    
    ob_start();
    imagegif($image);
    $frames[]=ob_get_contents();
    $framed[]=40;

    ob_end_clean();
    
    //grnerar el gif animado y mostras en pantalla
    
    $gif = new GIFEncoder($frames,$framed,0,2,0,0,0,'bin');
    echo $gif->GetAnimation();
    
    $fp = fopen ( 'animegif.gif' , 'w' ) ; 
    fwrite ( $fp , $gif -> GetAnimation ( ) ) ; 
    fclose ( $fp ) ;
    
?>