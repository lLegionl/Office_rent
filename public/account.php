<?php 
session_start();
include "header.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimeOffice | Личный кабинет</title>
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
        
        .page-header {
            background-color: var(--primary-color);
            color: white;
            padding: 3rem 0;
            text-align: center;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            margin: 0;
        }
        
        .breadcrumbs {
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        
        .breadcrumbs a {
            color: white;
            text-decoration: none;
        }
        
        .breadcrumbs a:hover {
            text-decoration: underline;
        }
        
        .account-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
            padding: 3rem 0;
        }
        
        .account-sidebar {
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 2rem;
            height: fit-content;
        }
        
        .account-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .account-menu li {
            margin-bottom: 1rem;
        }
        
        .account-menu a {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--dark-color);
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .account-menu a:hover,
        .account-menu a.active {
            background-color: rgba(26, 62, 114, 0.1);
            color: var(--primary-color);
        }
        
        .account-menu a.active {
            font-weight: 600;
        }
        
        .logout-btn {
            display: block;
            width: 100%;
            background-color: #f8f9fa;
            color: var(--secondary-color);
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 4px;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            text-align: left;
            margin-top: 2rem;
            transition: all 0.3s;

            text-decoration: none;
            box-sizing: border-box;
        }
        
        .logout-btn:hover {
            background-color: #f1f3f5;
            color: #e05a2a;
        }
        
        .account-content {
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 2rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            margin-top: 0;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }
        
        .profile-form .form-group {
            margin-bottom: 1.5rem;
        }
        
        .profile-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .profile-form input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
            font-size: 1rem;
        }
        
        .btn {
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
        
        .btn:hover {
            background-color: #e05a2a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .rentals-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .rental-item {
            border-bottom: 1px solid #eee;
            padding: 1.5rem 0;
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 1.5rem;
        }
        
        .rental-item:last-child {
            border-bottom: none;
        }
        
        .rental-img {
            width: 120px;
            height: 90px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        .rental-info h3 {
            margin: 0 0 0.5rem;
            color: var(--primary-color);
        }
        
        .rental-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }
        
        .rental-meta span {
            display: flex;
            align-items: center;
        }
        
        .rental-meta i {
            margin-right: 0.5rem;
        }
        
        .rental-status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-top: 0.5rem;
        }
        
        .status-active {
            background-color: #e3f7e8;
            color: #2e7d32;
        }
        
        .status-pending {
            background-color: #fff8e1;
            color: #ff8f00;
        }
        
        .status-completed {
            background-color: #f5f5f5;
            color: #616161;
        }
        
        .no-rentals {
            text-align: center;
            padding: 2rem;
            color: #666;
        }
        
        @media (max-width: 768px) {
            .account-container {
                grid-template-columns: 1fr;
            }
            
            .account-sidebar {
                margin-bottom: 2rem;
            }
            
            .rental-item {
                grid-template-columns: 1fr;
            }
            
            .rental-img {
                width: 100%;
                height: auto;
                max-height: 200px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <section class="page-header">
        <div class="container">
            <h1>Личный кабинет</h1>
            <div class="breadcrumbs">
                <a href="index.php">Главная</a> / <span>Личный кабинет</span>
            </div>
        </div>
    </section>
    
    <div class="container">
        <div class="account-container">
            <div class="account-sidebar">
                <div class="user-info">
                    <h3>Иван Петров</h3>
                    <p>ivan.petrov@example.com</p>
                </div>
                
                <ul class="account-menu">
                    <li><a href="#profile" class="active"><i class="fas fa-user-circle"></i> Профиль</a></li>
                    <li><a href="#rentals"><i class="fas fa-building"></i> Мои аренды</a></li>
                </ul>
                
                <a class="logout-btn" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i> Выйти
                </a>
            </div>
            
            <div class="account-content">
                <div id="profile-section">
                    <h2 class="section-title">Мой профиль</h2>
                    <form class="profile-form" action="auth.php?do=update" method="POST">
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" name="login" value="<?=$_SESSION['user_data']['login']?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="lastname">Имя</label>
                            <input type="text" name="name" value="<?=$_SESSION['user_data']['name']?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?=$_SESSION['user_data']['email']?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="tel" name="phone" value="<?=$_SESSION['user_data']['phone']?>">
                        </div>

                        <div class="form-group">
                            <label for="phone">Пароль</label>
                            <input type="tel" name="password" value="<?=$_SESSION['user_data']['password']?>">
                        </div>                        
                        
                        <button type="submit" class="btn">Сохранить изменения</button>
                    </form>
                </div>
                
                <!-- Секция аренд (изначально скрыта) -->
                <div id="rentals-section" style="display: none;">
                    <h2 class="section-title">Мои аренды</h2>
                    
                    <ul class="rentals-list">
                        <li class="rental-item">
                            <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="БЦ Легенда" class="rental-img">
                            <div class="rental-info">
                                <h3>БЦ "Легенда"</h3>
                                <div class="rental-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> Центр города</span>
                                    <span><i class="fas fa-expand"></i> 120 м²</span>
                                    <span><i class="fas fa-calendar-alt"></i> 01.06.2023 - 31.05.2024</span>
                                    <span><i class="fas fa-ruble-sign"></i> 85 000 ₽/мес</span>
                                </div>
                                <span class="rental-status status-active"><i class="fas fa-check-circle"></i> Активна</span>
                            </div>
                        </li>
                        
                        <li class="rental-item">
                            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="БЦ Высота" class="rental-img">
                            <div class="rental-info">
                                <h3>БЦ "Высота"</h3>
                                <div class="rental-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> Деловой район</span>
                                    <span><i class="fas fa-expand"></i> 65 м²</span>
                                    <span><i class="fas fa-calendar-alt"></i> 15.03.2022 - 14.03.2023</span>
                                    <span><i class="fas fa-ruble-sign"></i> 45 000 ₽/мес</span>
                                </div>
                                <span class="rental-status status-completed"><i class="fas fa-history"></i> Завершена</span>
                            </div>
                        </li>
                        
                        <li class="rental-item">
                            <img src="https://images.unsplash.com/photo-1560448204-603b3fc33ddc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="БЦ Галактика" class="rental-img">
                            <div class="rental-info">
                                <h3>БЦ "Галактика"</h3>
                                <div class="rental-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> Северный район</span>
                                    <span><i class="fas fa-expand"></i> 250 м²</span>
                                    <span><i class="fas fa-calendar-alt"></i> 01.09.2023 - 31.08.2024</span>
                                    <span><i class="fas fa-ruble-sign"></i> 150 000 ₽/мес</span>
                                </div>
                                <span class="rental-status status-pending"><i class="fas fa-clock"></i> Ожидает подтверждения</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <?php include "footer.php"; ?>

    <script>        
        // Простая навигация между разделами
        document.querySelectorAll('.account-menu a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Удаляем активный класс у всех ссылок
                document.querySelectorAll('.account-menu a').forEach(item => {
                    item.classList.remove('active');
                });
                
                // Добавляем активный класс текущей ссылке
                this.classList.add('active');
                
                // Скрываем все секции
                document.getElementById('profile-section').style.display = 'none';
                document.getElementById('rentals-section').style.display = 'none';
                
                // Показываем нужную секцию
                if(this.getAttribute('href') === '#profile') {
                    document.getElementById('profile-section').style.display = 'block';
                } else if(this.getAttribute('href') === '#rentals') {
                    document.getElementById('rentals-section').style.display = 'block';
                }
            });
        });
    </script>
</body>
</html>