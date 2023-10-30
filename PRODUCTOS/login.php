<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require_once "scripts.php";  ?>
    <link rel="stylesheet" href="css/sb-admin-2.min.css">
    
</head>

<body>
    <div class="pt-2 mt-3 modal-content text-center bg-dark">
        <h1 class= "text text-white">PRODUCTOS PHP - Clase 26</h1>
    </div>

    <div class="modal-dialog text-center p-5 ">

        <div class="modal-content">
            <div class="card-group justify-content-center">
                <form id="formLogin" action="" method="post" class="p-3 my-lg-0">
                    <a>LOGIN</a>
                    <input type="text" name="usuario" id="usuario" class="form-control p-2 mt-3" placeholder="Usuario">
                    <input type="email" name="email" id="email" class="form-control p-2 mt-3" placeholder="Email">
                    <input type="password" name="password" id="password" class="form-control p-2 mt-3" placeholder="Contraseña">
                    <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">INGRESAR</button>
                </form>
                
            </div>
            <div class="mb-3">
                No tiene usuario y/o olvido su contraseña? <a href="#">Comuniquese con Servicio Técnico</a>
            </div>
        </div>
    </div>

 
     
    <script src="jquery.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
  
    

  
    
</body>



</html>