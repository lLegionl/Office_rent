<?php 
session_start();
include "db.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimeOffice | Аренда офисных помещений</title>
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
        .hero {
            background: url('https://images.unsplash.com/photo-1497366811353-6870744d04b2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 8rem 0;
            position: relative;
            text-align: center;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(26, 62, 114, 0.85);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
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
        
        .advantages {
            padding: 5rem 0;
            background-color: var(--light-color);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2.2rem;
            color: var(--primary-color);
            position: relative;
        }
        
        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--secondary-color);
            margin: 1rem auto 0;
        }
        
        .advantages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .advantage-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .advantage-card:hover {
            transform: translateY(-10px);
        }
        
        .advantage-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            display: inline-block;
        }
        
        .advantage-card h3 {
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .spaces {
            padding: 5rem 0;
        }
        
        .spaces-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .space-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .space-card:hover {
            transform: translateY(-10px);
        }
        
        .space-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        
        .space-info {
            padding: 1.5rem;
            background: white;
        }
        
        .space-info h3 {
            margin: 0 0 0.5rem;
            color: var(--primary-color);
        }
        
        .space-location {
            color: #666;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .space-location svg {
            margin-right: 0.5rem;
        }
        
        .space-features {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .space-features span {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .space-price {
            font-weight: 700;
            color: var(--secondary-color);
            font-size: 1.2rem;
        }
        
        .contacts {
            padding: 5rem 0;
            background-color: var(--primary-color);
            color: white;
        }
        
        .contacts .section-title {
            color: white;
        }
        
        .contacts .section-title::after {
            background: var(--secondary-color);
        }
        
        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .contact-card {
            background: rgba(255,255,255,0.1);
            padding: 2rem;
            border-radius: 8px;
        }
        
        .contact-card h3 {
            margin-top: 0;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .contact-item i {
            margin-right: 1rem;
            width: 20px;
            text-align: center;
        }
        
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <section class="hero">
        <div class="hero-content">
            <h1>Найдите идеальный офис для вашего бизнеса</h1>
            <p>Более 150 офисных помещений в лучших бизнес-центрах города. Гибкие условия аренды и полный сервис.</p>
            <a href="offices.php" class="btn">Смотреть все помещения</a>
        </div>
    </section>
    
    <section class="advantages">
        <div class="container">
            <h2 class="section-title">Почему выбирают нас</h2>
            <div class="advantages-grid">
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Лучшие локации</h3>
                    <p>Офисы в престижных бизнес-центрах с отличной транспортной доступностью</p>
                </div>
                
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-euro-sign"></i>
                    </div>
                    <h3>Гибкие условия</h3>
                    <p>Аренда от 1 месяца с возможностью изменения площади по мере роста бизнеса</p>
                </div>
                
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Безопасность</h3>
                    <p>Круглосуточная охрана и системы контроля доступа для вашего спокойствия</p>
                </div>
                
                <div class="advantage-card">
                    <div class="advantage-icon">
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                    <h3>Полный сервис</h3>
                    <p>Уборка, IT-поддержка и другие услуги для комфортной работы</p>
                </div>
            </div>
        </div>
    </section>

     

    <section class="spaces" id="spaces">
        <div class="container">
            <h2 class="section-title">Популярные помещения</h2>
            <div class="spaces-grid">
            <?php $stm=$pdo->query('SELECT * FROM `offices` ORDER BY RAND() LIMIT 3');
            $offices=$stm->fetchAll();?>
            <?php foreach ($offices as $office){?>
                <div class="space-card">
                    <img src=".\images\office\<?=$office['image_path']?>" alt="Офис в <?=$office['business_center']?>" class="space-img">
                    <div class="space-info">
                        <h3><?=$office['business_center']?></h3>
                        <div class="space-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <?=$office['office_area'].' '.$office['office_addres']?>
                        </div>
                        <div class="space-features">
                            <span><i class="fas fa-expand"></i><?=$office['office_square']?> м²</span>
                            <span><i class="fas fa-users"></i> до <?=$office['office_capacity']?> человек</span>
                        </div>
                        <div class="space-price"><?=$office['office_rent']?> ₽/мес</div>
                    </div>
                </div>
                <?}?>            
            </div>
    </section>
    
    <section class="contacts" id="contacts">
        <div class="container">
            <h2 class="section-title">Контакты</h2>
            <div class="contact-info">
                <div class="contact-card">
                    <h3>Наши офисы</h3>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>г. Москва, ул. Бизнесовая, 15</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <span>Пн-Пт: 9:00 - 19:00</span>
                    </div>
                </div>
                
                <div class="contact-card">
                    <h3>Свяжитесь с нами</h3>
                    <div class="contact-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>+7 (800) 123-45-67</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@primeoffice.ru</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "footer.php"; ?>
</body>
</html>