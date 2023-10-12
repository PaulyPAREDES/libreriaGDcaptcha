<?php
if (isset ($_POST)){

  $email =$_POST["email"];
  $contrasenia =$_POST["password"];
  $captcha = sha1($_POST["captcha"]);
  $cookieCapcha = $_COOKIE["captcha"];
  $validaEmail= "/^(([^<>()\[\]\.,;:\s@\”]+(\.[^<>()\[\]\.,;: \s@\”]+)*)|(\”.+\”))@(([^<>()[\]\.,;:\s@\”]+\.)+[^ <>()[\]\.,;:\s@\”]{2,})$/";
  $validaContra= "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";

  if (!preg_match($validaEmail, $email)){
    echo "<p style='color: red'>Ingrese un email correcto</p>";
  }
  else if (!preg_match( $validaContra, $contrasenia)){
    echo "<p style='color: red'>  La contraseña debe tener al entre 8 y 16 caracteres, </br>
    al menos un dígito, al menos una minúscula y al menos una mayúscula.</p>";
  }
     else if ($captcha != $cookieCapcha ){
      echo "<p style='color: red'>Ingres un c&oacute;digo captcha correcto</p>";
  }
  else{

    echo "<p style= 'color: green'>Ación exitosa </p>"; 
    /*Destruir el captcha*/
    setcookie("captcha",'', time()-3600);

  }
}
?>
