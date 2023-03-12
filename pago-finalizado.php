<?php
    require "inc/funciones/sesiones.php";

    if (!isset($_GET["paymentId"]) || !isset($_GET["id_pago"]) || !isset($_GET["total_usuario"])) {
        header("Location:index.php");
        exit;
    }

	require "inc/templates/header.php";

    use PayPal\Rest\ApiContext;
    use PayPal\Api\PaymentExecution;
    use PayPal\Api\Payment;
    require "inc/paypal.php";
?>

    <div class="wrapper">

        <div class="pago-finalizado">

            <?php
                $id_pago = (int)$_GET["id_pago"];

                $paymentId = $_GET["paymentId"];

                $total_usuario = (float)$_GET["total_usuario"];

                /**Total usuario que tiene en la base de datos */
                $total_usuario_bd = (float)$_SESSION["total_actual_usuario"];
                
                /**Aumentamos su Total usuario */
                $total_usuario = $total_usuario + $total_usuario_bd;

                //Peticion a rest API
                $pago = Payment::get($paymentId, $apiContext);
                $execution = new PaymentExecution();
                $execution->setPayerId($_GET["PayerID"]);

                //Resutado tiene toda la informacion de la transaccion
                $resultado = $pago->execute($execution, $apiContext);

                $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;
            ?>

            <?php if ($respuesta === "completed") { ?>

                <?php
                    require "inc/funciones/conexionbd.php";
                    $stmt = $conn->prepare("DELETE FROM carritos WHERE id_usuario =?");
                    $stmt->bind_param("i",$_SESSION["id_usuario"]);
                    $stmt->execute();

                    $stmt = $conn->prepare("UPDATE usuarios SET total_usuario = ?, editado=NOW() WHERE id_usuario = ?");
                    $stmt->bind_param("di",$total_usuario,$_SESSION["id_usuario"]);
                    $stmt->execute();

                    $stmt->close();
                    $conn->close();
                ?>
                    <img src="img/pagoExito.png" alt="" class="img-finalizado">
                    <div class="text-finalizado">
                        <p>Gracias por tu compra!</p>
                    </div>

                <?php }else{ ?>

                    <img src="img/pagoError.png" alt="" class="img-finalizado">
                    <div class="text-finalizado">
                        <p>Hubo un error al realiza el pago :&#40; </p>
                    </div>   

                <?php } ?>
        
        </div>   
    </div>


<?php require "inc/templates/footer.php"; ?>