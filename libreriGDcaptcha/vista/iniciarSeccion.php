
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Generador de captcha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
      
    $(function(){
  
      $("#btn").on("click", function(){
        var formData = $("#formCaptcha").serialize();
        var ruta = "../control/ajax.php";
        $.ajax({
          url: ruta,
          type: "POST",
          data: formData,

          success: function(datos){
            $("#respuesta").html(datos);
          }
          });
        });
      $("#actualizarCaptcha").on("click", function(){
        $("#imgcaptcha").attr("src","../control/captcha.php?r=" + Math.random());
       }); 
    });
  </script>
</head>
<body>

<div class="container d-flex justify-content-center">
<div class="m-3  w-50 p-3 " style="background-color: #E7E5E4;">

<form name="formCaptcha" id="formCaptcha" method="POST">
     <h3 class="text-center">Ingrese a su cuenta</h3>
     <div class="mb-3">
       <label for="email" class="form-label">Email</label>
       <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" >
     </div>
     <div class="mb-3">
       <label for="password" class="form-label">Contraseña</label>
       <input type="password" class="form-control" id="password" name="password">
     </div>
     <div class="mb-3">
       <label for="captcha" class="form-label">Captcha</label>
       <input type="text" class="form-control" id="captcha" name="captcha" >
     </div>
     <div id="respuesta"></div>
     <div class="mb-3">
    <!-- <img src="captchaSimple.php" alt="Imagen de captcha"> -->
     <img src="../control/captcha.php" id="imgcaptcha" alt="Imagen de captcha">
     <button type="button"  id="actualizarCaptcha" name="actualizarCaptcha" class="btn btn-secondary" >Actualizar</button>
     </div>
     <div class="d-grid mb-3 gap-2">
     <button type="button" id="btn" class="btn btn-primary" name="btn">Login</button>
     </div>
     <div class="d-grid gap-2 col-6 mx-auto">
     <a class="btn  btn-outline-info" href="../index.php">Inicio</a>
     </div>
    
 </form>  
</div>
</div>
    
</body>

</html>