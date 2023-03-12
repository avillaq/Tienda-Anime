<?php
if (!isset($_POST["submit"])) {
    header("Location:index.php");
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require "inc/paypal.php";


if(isset($_POST["submit"])){
    $id_usuario = htmlspecialchars($_POST["id_usuario"]);

    $total = (float) htmlspecialchars($_POST["total_usuario"]);  

}

$compra = new Payer();
$compra->setPaymentMethod("paypal");

try {
    require "inc/funciones/conexionbd.php";
    
    /*Consulta para los carritos*/
    $sql = "SELECT * FROM carritos WHERE id_usuario = $id_usuario";
    $respuesta = $conn->query($sql);

        
    $i = 0;
    $arreglo_pedido = array();
    
    while($carrito = $respuesta->fetch_assoc()){
        $producto = json_decode($carrito["producto_carrito"]);

        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
		${"articulo$i"}->setName($producto->nombre_producto)
        	->setCurrency("USD")
        	->setQuantity($producto->cantidad)
        	->setPrice($producto->precio_producto);

	$i++;
    }

} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}


$listaArticulos = new ItemList(); 
$listaArticulos->setItems($arreglo_pedido);


$cantidad = new Amount();
$cantidad->setCurrency("USD")
        ->setTotal($total); 


$id_registro = uniqid();

$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
        ->setItemList($listaArticulos)
        ->setDescription("Pago Tienda Anime")
        ->setInvoiceNumber($id_registro);
        

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO."/pago-finalizado.php?id_pago={$id_registro}")
                ->setCancelUrl(URL_SITIO."/pago-finalizado.php?id_pago={$id_registro}");


$pago = new Payment();
$pago->setIntent("sale")
        ->setPayer($compra)
        ->setRedirectUrls($redireccionar)
        ->setTransactions(array($transaccion));

try {
     $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
        echo '<pre>';
        print_r(json_decode($pce->getData()));
        exit;
        echo '</pre>';
}
$aprobado = $pago->getApprovalLink();

header("Location:{$aprobado}");
exit;

?>