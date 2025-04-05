<?php 
session_start();
include "db.php";


if (!empty($_GET['rent']))
{
    $rent = $_GET['rent'];
    $stm = $pdo->query("DELETE FROM `rent_request` WHERE id=$rent");
    $result = $stm->fetch();
    header('Location:account.php?rent_del');
} 
else     header('Location:account.php?rent_del_error');

?>