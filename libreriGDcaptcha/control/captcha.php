<?php

// Define que la imagen va a hacer PNG
header ("Content-type: image/png");

// usos de funciones de GD 

/* Indicar anchura y altura de la imagen a crear  */ 

// Crear una imagen de 200 x 200
$imagen = imagecreatetruecolor(190, 190);
$colorTexto = imagecolorallocate ($imagen, 255,255, 255 );
$font= "../fuentes/Nabla-Regular.ttf";

// Asignar colores randon 
$color1 = imagecolorallocate($imagen, random_int(150,255),random_int(0,100),random_int(0,90));
$color2 = imagecolorallocate($imagen, random_int(150,227),random_int(0,20),random_int(200,255));
$color3 = imagecolorallocate($imagen, random_int(10,88),random_int(120,239),random_int(200,255));

// Dibujar tres rectángulos, cada uno color
imagefilledrectangle($imagen, 10, 30, random_int(50,180), random_int(80,180), $color1);
imagefilledrectangle($imagen, 20, 100, random_int(120,180), random_int(120,180), $color2);
imagefilledrectangle($imagen, 90, 70, random_int(80,180), random_int(90,180), $color3);

/*Generar un codigo aleatorio para que aparesca en la imagen creando la siguiente funcion*/ 
function generaCaptcha ($caracters, $length){
    $captcha = null;
    for ($x = 0; $x < $length; $x++ ){
        $rand = rand(0, count($caracters)-1);
        $captcha .= $caracters[$rand];
    }
    return $captcha;
}
 

/*Se crea el captcha utilizando la funcion, definir el arreglo y la cantidad de cara caracter*/ 
$captcha =  generaCaptcha (array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "H", "m", "F", "q","r", "A", "u","b"), 4);

/*crear la cooki para almacenar el codigo captcha y enciptar con la funcion sha1() y endicarle un tiempo*/

 setcookie ('captcha', sha1($captcha), time()+60*1);

 /*ingresar el texto de la imagen */ 

 //imagestring($imagen , 5 , 60, 70, $captcha, $colorTexto);
 imagettftext($imagen, 50,0,random_int(10,35),random_int(70,150), $colorTexto, $font, $captcha );

 /*Imprimir la imagen*/ 
 /*imagefilter($imagen, IMG_FILTER_MEAN_REMOVAL);*/
 imagepng ($imagen);

 ?>