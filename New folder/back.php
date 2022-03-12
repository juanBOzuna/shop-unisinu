<?php
 $total =0;
 $ammount = $_REQUEST['ammount'];
 $price = $_REQUEST['price'];
 $iva = $_REQUEST['iva'];
 $discount = $_REQUEST['discount'];


$sub_total = intval($ammount) * floatval($price);

$amount_iva = $sub_total * floatval($iva) /100;
$ammount_disccount = $sub_total * floatval($discount)/100;
$total = $sub_total + floatval($amount_iva) - floatval($ammount_disccount) ;
// var_dump($total);
header('Location: '."index.php?isResp=1&name=".$_REQUEST['name']."&price=$price&ammount=$ammount&iva=$amount_iva&discount=$ammount_disccount&subtotal=$sub_total&total=$total");