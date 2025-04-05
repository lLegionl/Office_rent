<?php 
session_start();
include "db.php";

    switch ($_GET['do'])
    {
        case 'login':
            if (!empty($_POST['login']) && !empty($_POST['password']))
            {
                $stm = $pdo->prepare("SELECT * FROM users WHERE login=?");
                $stm->execute([
                    $_POST['login'],
                ]);
                $user = $stm->fetch();
                if ($user['password']==$_POST['password'])
                {
                    $_SESSION['login']=$user['login'];
                    $_SESSION['user_id']=$user['id'];
                    $_SESSION['user_data']=$user;
                    header('location:account.php?message=login_ok');
                } else header('location:login.php?message=error_login');
            }
            else header('location:login.php?message=error_login');
            break;
        case 'registration':
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']))
            {
            $stm = $pdo->prepare('INSERT INTO `users`(`login`, `password`, `name`, `phone`, `email`) 
            VALUES (?,?,?,?,?)');
            $stm->execute([
                $_POST['login'],
                $_POST['password'],
                $_POST['name'],
                $_POST['phone'],
                $_POST['email']
            ]);
            header('location:login.php?message=registration_ok');
        }
        else header('location:login.php?message=registration_error');
            break;
        case 'update':
            $user_id = $_SESSION['user_id'];

            $stm = $pdo->prepare("UPDATE `users` SET 
            `login` = :login,
            `password` = :password,
            `name` = :name,
            `phone` = :phone,
            `email` = :email 
            WHERE id = :user_id");

            $stm->execute([
                ':login' => $_POST['login'],
                ':password' => $_POST['password'],
                ':name' => $_POST['name'],
                ':phone' => $_POST['phone'],
                ':email' => $_POST['email'],
                ':user_id' => $user_id
            ]);     
            $user_update = $stm->fetch();  

            $stm = $pdo->prepare("SELECT * FROM users WHERE id=?");
            $stm->execute([
                $user_id,
            ]);
            $user_update = $stm->fetch();
            $_SESSION['user_data']=$user_update;
            header('location:account.php?message=edit_ok');  
            break;
    }
?>