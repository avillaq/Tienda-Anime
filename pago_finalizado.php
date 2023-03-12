<?php

	require "inc/templates/header.php";


    use PayPal\Rest\ApiContext;
    use PayPal\Api\PaymentExecution;
    use PayPal\Api\Payment;
    require "inc/paypal.php";
?>

    <div class="wrapper">

        <div class="productos">

            <h2>Resumen Registro</h2>
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

            <?php if ($respuesta === "completed") {

                    echo "<div class='resultado correcto'>";

                    echo "El pago se realizo correctamente <br>";
                    echo "El ID es $paymentId";

                    echo "</div>";

                    /* require_once("inc/functions/db_connection.php");
                    $stmt = $connection->prepare("UPDATE registrados SET pagado =? WHERE ID_registrado =?");
                    $pagado = 1;
                    $stmt->bind_param("ii",$pagado, $id_pago);
                    $stmt->execute();
                    $stmt->close();
                    $connection->close(); */

                }else{
                    echo "<div class='resultado error'>";

                    echo "El pago no se realizo<br>";  

                    echo "</div>";            
                }
            ?>
        
        </div>   
    </div>


<?php require "inc/templates/footer.php"; ?>