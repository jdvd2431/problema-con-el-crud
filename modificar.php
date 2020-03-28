<?php
require_once 'conexion.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $consulta=$conexion->prepare("SELECT * FROM cuenta WHERE id=:id");
    $consulta->bindParam(":id",$id);
    $consulta->execute();

    if ($consulta->rowCount()>=1) {
        $fila =$consulta->fetch();
        
    }else {
        echo "Error tonto";
    }
}else {
    echo "Error no se  pudo procesar la peticion";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/806eeb58d6.js" crossorigin="anonymous"></script>
   <!-- <link rel="stylesheet" type="text/css" href="C:\Users\Estudiante\Desktop\login proyecto\css\cuentas.css">-->
   <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/cuentas.css">
   <link rel="shorcut icon" type="image/x-icon" href="favicon.ico">
    <title>Cuentas de Cobro</title>
</head>
<body>
    <form action="modificar2.php" method="POST">
        <div class"regresar">
            <a class="btn" href="gestionar.php"><i class="icono fas fa-angle-left"></i></a > 
            <header>
			
			 
		</header>
        </div>
       
    <div>
        <h4>Cuenta de Cobro</h4>

    <?php if (!empty($errores)):  ?>
         <div class="alert error">
         <?php echo $errores; ?>	
     </div>
           <?php endif ?>

    </div>                     
      <?php if (!empty($succes)):?>
      <div class="alert succes">
      <?php echo $succes;?>
      </div>
        <?php endif ?>
        
 <input type="text" id="id" name="id" value="<?php echo $fila['id']; ?>">
    <div>
        Id de Cuenta<input type="text" name="cuenta" value="<?php echo $fila['id_cuenta']; ?>"  placeholder="id de cuenta">
        </div>
        <div>
            Fecha de Pago<input type="date" name="fecha" value="<?php echo $fila['fecha_de_pago']; ?>"   placeholder="fecha de pago">
            </div>
           
            <div>
                Fecha de Vencimiento de Pago<input type="date" name="fechavencimieto" value="<?php echo $fila['fecha_de_vencimiento de pago']; ?>" placeholder="Fecha de Vencimiento" >
                </div>
                <div>
                    Valor a Pagar<input type="text"name="valorpagar" value="<?php echo $fila['valor_a_pagar']; ?>" placeholder="Valor a Pagar" >
                    </div>
                    <div>
                        Periodo de Cuenta<input type="text" name="periodocuenta"value=" <?php echo $fila['periodo_de_cuenta']; ?>" placeholder="Periodo de Cuenta">
                        </div>
                        <div>
                            Estado Cuenta<select name="estadocuenta"  id="">
                                <option value="activo"><?php echo $fila['estado_de_cuenta']; ?></option>
                                <option value="inactivo">inactivo</option>
                            </select>
                            </div>
                            <div>
                                Registro de Residente<input type="search"name="registroresidente" value="<?php echo $fila['registro_de_residente']; ?>" placeholder=" Registro de Residente">
                                </div>
                                
                                <input type="submit" name="Enviar" value="Modificar">
                             

    </form>
</body>
</html>
