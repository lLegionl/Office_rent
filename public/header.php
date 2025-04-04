<?php 
session_start();
?>
    
<style>
            :root {
            --primary-color: #1a3e72;
            --secondary-color: #ff6b35;
            --accent-color: #004e89;
            --light-color: #f7f9fc;
            --dark-color: #2d3436;
        }
        
        body {
            font-family: 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        header {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .container {
            width: 85%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;

            flex-direction: column;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;

        }
        
        nav ul li {
            margin-left: 2rem;
            box-sizing: border-box;
        }
        nav li {
            display: flex;
            align-items: center;
        }
        nav ul li a {
            color: var(--dark-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            font-size: 1.05rem;
            
        }
        
        nav ul li a:hover {
            color: var(--secondary-color);
        }
        .btn_header {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 0.9rem 2rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn_header:hover {
            background-color: #e05a2a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }


</style>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="index.php" class="logo">PrimeOffice</a>
                <nav>
                    <ul>
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="offices.php">Помещения</a></li>
                        <li><a href="index.php#contacts">Контакты</a></li>
                        <?php if (empty($_SESSION['login'])) {
                            echo '<li><a href="login.php" class="btn_header">Войти</a></li>';
                        } else {
                            echo '<li><a href="account.php" class="btn_header">Личный кабинет</a></li>';
                        }?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
