<?php

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

                //Peticion a rest API
                $pago = Payment::get($paymentId, $apiContext);
                $execution = new PaymentExecution();
                $execution->setPayerId($_GET["PayerID"]);

                //Resutado tiene toda la informacion de la transaccion
                $resultado = $pago->execute($execution, $apiContext);

                $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;
            ?>

            <?php if ($respuesta === "completed") { ?>

            
                    <img src="img/pagoExito.png" alt="" class="img-finalizado">
                    <div class="text-finalizado">
                        <p>Gracias por tu compra!</p>
                    </div>

                    <!-- /* require_once("inc/functions/db_connection.php");
                    $stmt = $connection->prepare("UPDATE registrados SET pagado =? WHERE ID_registrado =?");
                    $pagado = 1;
                    $stmt->bind_param("ii",$pagado, $id_pago);
                    $stmt->execute();
                    $stmt->close();
                    $connection->close(); */ -->

                <?php }else{ ?>

                    <img src="img/pagoError.png" alt="" class="img-finalizado">
                    <div class="text-finalizado">
                        <p>Hubo un error al realiza el pago :&#40; </p>
                    </div>   

                <?php } ?>
        
        </div>   
    </div>


<?php require "inc/templates/footer.php"; ?>