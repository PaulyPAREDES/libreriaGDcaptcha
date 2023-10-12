<?php

// Define que la imagen va a hacer PNG
header ("Content-type: image/png");

// usos de funciones de GD 

/* Indicar anchura y altura de la imagen a crear  */ 

// Crear una imagen de 200 x 200
$imagen = imagecreatetruecolor(190, 190);
$colorTexto = imagecolorallocate ($imagen, 255,255, 255 );

// Asignar colores
$rosa = imagecolorallocate($imagen, 255, 105, 180);
$blanco = imagecolorallocate($imagen, 255, 255, 255);
$verde = imagecolorallocate($imagen, 132, 135, 28);

// Dibujar tres rectángulos, cada uno con su color
imagerectangle($imagen, 40, 30, 150, 150, $rosa);
imagerectangle($imagen, 30, 60, 120, 100, $blanco);
imagerectangle($imagen, 100, 120, 75, 160, $verde);

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

 imagestring($imagen , 5 , 60, 70, $captcha, $colorTexto);

 /*Imprimir la imagen*/ 
 /*imagefilter($imagen, IMG_FILTER_MEAN_REMOVAL);*/
 imagepng ($imagen);

 ?>