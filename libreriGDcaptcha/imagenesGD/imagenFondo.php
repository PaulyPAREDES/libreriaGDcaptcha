<?php

// Define que la imagen va a hacer PNG
header ("Content-type: image/png");

// usos de funciones de GD 
$imagen = imagecreate(1500, 1200);

$colorFondo = imagecolorallocate ($imagen, 255, 255, 255);

// Asignar colores
$rosa = imagecolorallocate($imagen, 255, 105, 180);
$negro = imagecolorallocate($imagen, 0, 0, 0);
$verde = imagecolorallocate($imagen, 132, 135, 28);


// Dibujar tres rectángulos, cada uno con su color
imagerectangle($imagen, 100, 30, 900, 500, $rosa);
imagerectangle($imagen, 30, 60, 200, 600, $negro);
imagerectangle($imagen, 50, 120, 1200, 300, $verde);


 imagepng ($imagen);

 ?>