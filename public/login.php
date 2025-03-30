<?php 
session_start();
include "header.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimeOffice | Вход и регистрация</title>
    <style>
        :root {
            --primary-color: #1a3e72;
            --secondary-color: #ff6b35;
            --light-color: #f7f9fc;
            --dark-color: #2d3436;
        }
        
        body {
            font-family: 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: var(--dark-color);
            line-height: 1.6;
            background-color: var(--light-color);
        }
        
        .auth-container {
            display: flex;
            min-height: 100vh;
        }
        
        .auth-left {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
            display: none;
        }
        
        .auth-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(26, 62, 114, 0.85);
        }
        
        .auth-left-content {
            position: relative;
            z-index: 1;
            color: white;
            padding: 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .auth-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .auth-form {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .form-title {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
            font-size: 1rem;
        }
        
        .btn {
            display: block;
            width: 100%;
            background-color: var(--secondary-color);
            color: white;
            padding: 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            text-align: center;
        }
        
        .btn:hover {
            background-color: #e05a2a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
                
        .form-switch {
            text-align: center;
            margin-top: 1rem;
        }
        
        .form-switch-btn {
            background: none;
            border: none;
            color: var(--secondary-color);
            font-weight: 600;
            cursor: pointer;
            font-size: 1rem;
            padding: 0.5rem;
        }
        
        .form-switch-btn:hover {
            text-decoration: underline;
        }
        
        @media (min-width: 768px) {
            .auth-left {
                display: block;
            }
            
            .auth-right {
                padding: 4rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-left">
            <div class="auth-left-content">
                <h1>PrimeOffice</h1>
                <p>Аренда премиальных офисных помещений в бизнес-центрах</p>
            </div>
        </div>
        
        <div class="auth-right">
            <a href="index.php" class="logo">PrimeOffice</a>
            
            <div class="auth-form" id="login-form">
                <h2 class="form-title">Вход в аккаунт</h2>
                <form action="auth.php?do=login" method="post">
                    <div class="form-group">
                        <label for="login-username">Логин</label>
                        <input type="text" name="login" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="login-password">Пароль</label>
                        <input type="password" name="password" required>
                    </div>
                    
                    <button type="submit" class="btn">Войти</button>
                    
                </form>
                
                <div class="form-switch">
                    <span>Нет аккаунта? </span>
                    <button class="form-switch-btn" onclick="showRegisterForm()">Зарегистрироваться</button>
                </div>
            </div>
            
            <div class="auth-form" id="register-form" style="display: none;">
                <h2 class="form-title">Регистрация</h2>
                <form action="auth.php?do=registration" method="post">
                    <div class="form-group">
                        <label for="register-username">Логин</label>
                        <input type="text" name="login" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-name">Имя</label>
                        <input type="text" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-phone">Телефон</label>
                        <input type="tel" name="phone" required>
                    </div>
                    
                    <button type="submit" class="btn">Зарегистрироваться</button>
                </form>
                
                <div class="form-switch">
                    <span>Уже есть аккаунт? </span>
                    <button class="form-switch-btn" onclick="showLoginForm()">Войти</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showRegisterForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        }
        
        function showLoginForm() {
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
        }
    </script>
        <?php include "footer.php"; ?>

</body>
</html>