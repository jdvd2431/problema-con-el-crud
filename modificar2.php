<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
   $id=$_POST['id'];
   $id_cuenta = $_POST['cuenta'];
   $fecha_pago = $_POST['fecha'];
   $fecha_vencimiento = $_POST['fechavencimieto'];
   $valor_pagar = $_POST['valorpagar'];
   $periodo_cuenta = $_POST['periodocuenta'];
   $estado_cuenta = $_POST['estadocuenta'];
   $registro_residente = $_POST['registroresidente'];

   $errores = '';
   $succes ='';

   if (empty($id_cuenta) or empty($fecha_pago) or empty($fecha_vencimiento) or empty($valor_pagar) or empty($periodo_cuenta) or empty($estado_cuenta) or empty($registro_residente)) {
       $errores .='Por favor llenas todos los espacios';
   }elseif (!empty($id_cuenta) or !empty($fecha_pago) or !empty($fecha_vencimiento) or !empty($valor_pagar) or !empty($periodo_cuenta) or !empty($estado_cuenta) or !empty($registro_residente)){

       $succes .='Enviado Corectamente';
   

       if ($errores == '') {
        $sentencia = $conexion ->prepare ("UPDATE  cuenta SET id_cuenta=:id_de_cuenta,
         fecha_de_pago=:fecha_de_pago, 
         fecha_de_vencimiento de pago=:fecha_de_vencimiento,
         valor_a_pagar=:valor_a_pagar,
         periodo_de_cuenta=:periodo_de_cuenta, 
         estado_de_cuenta=:estado_de_cuenta, 
         registro_de_residente=:registro_de_residente 
          WHERE id=:id");
         

        $sentencia->execute(array(
            ':id' => $id,
            ':id_de_cuenta' => $id_cuenta ,      
            ':fecha_de_pago' => $fecha_pago,
            ':fecha_de_vencimiento' => $fecha_vencimiento,
            ':valor_a_pagar' => $valor_pagar,
            ':periodo_de_cuenta'=> $periodo_cuenta,
            ':estado_de_cuenta' => $estado_cuenta,
            ':registro_de_residente' => $registro_residente
        ));

        $resultado = $sentencia->fetch();
        if ($resultado != false) {
            echo 'error de la base de datos';
        }else { 
            echo '<script type="text/javascript">
            alert("Datos modificados"); 
           window.location.href="gestionar.php"
        </script>;';
         }

       }
   }
}
require 'modificar.php';
 ?>
