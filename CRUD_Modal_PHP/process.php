<?php
require_once 'modal.php';
$db = new Datbase();
//creer
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    extract($_POST);
    $returned = (int) $received - (int) $amount;
    $db->create($customer, $cashier, (int) $amount, (int) $received, (int) $returned, $state);
    echo 'prefect';
}
?>