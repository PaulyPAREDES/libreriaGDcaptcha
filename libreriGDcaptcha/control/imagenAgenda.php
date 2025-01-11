<?php

// Creamos una nueva imagen de 200 x 70 píxeles
$imagen = imagecreatetruecolor(220, 80);

// Establecemos el color de fondo
$color_fondo = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $color_fondo);

// Generamos el gráfico de cuadraditos
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
      // Calculamos el color del cuadradito
      $color = imagecolorallocate($imagen, rand(0, 255), rand(0, 255), rand(0, 255));
  
      // Dibujamos el cuadradito
      imagefilledrectangle($imagen, $i * 20, $j * 20, ($i + 1) * 20, ($j + 1) * 20, $color);
    }
  }

// Guardamos la imagen
imagejpeg($imagen);


?>