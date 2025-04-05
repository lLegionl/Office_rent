<?php 
session_start();
include "db.php";

var_dump($_POST);

if (!empty($_SESSION['user_id'])){
    if (!empty($_POST['period']) && !empty($_POST['start_date']) && !empty($_GET['office'])) {

        $start_date = $_POST['start_date'];
        var_dump($start_date);
        $end_date = new DateTime($start_date);
        $end_date->add(new DateInterval('P' . $_POST['period'] . 'M'));
        

        echo $end_date->format('Y-m-d');
        
        $stm = $pdo->prepare('INSERT INTO `rent_request`(`office_id`, `user_id`, `start_date`, `end_date`) 
        VALUES (?,?,?,?)');
        
        $stm->execute([
            $_GET['office'],
            $_SESSION['user_id'],
            $_POST['start_date'],
            $end_date->format('Y-m-d') 
        ]);
        header('Location:account.php?book_request_create');
    }
    else {     header('Location:offices.php?book_error_get');    }
} else {
    header('Location:login.php?need_auth');
}
?>