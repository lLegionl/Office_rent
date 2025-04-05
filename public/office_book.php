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
    <title>PrimeOffice | Бронирование офиса</title>
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
        
        .container {
            width: 85%;
            max-width: 1200px;
            margin: 0 auto;
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
        
        .booking-container {
            padding: 3rem 0;
        }
        
        .office-gallery {
            position: relative;
        }
        
        .main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }        
        .office-block {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: fit-content;

            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;        
        }        
        .office-title {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-top: 0;
        }
        
        .office-location {
            display: flex;
            align-items: center;
            margin: 1rem 0;
            color: #666;
        }
        
        .office-features {
            margin: 1.5rem 0;
        }
        
        .feature-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #eee;
        }
        
        .feature-name {
            color: #666;
        }
        
        .feature-value {
            font-weight: 500;
        }
        
        .office-price {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin: 1.5rem 0;
            text-align: right;
        }
        
        .booking-form {
            display: flex;
            align-content: center;
            flex-wrap: wrap;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-group input,
        .form-group select {
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
            font-size: 1.1rem;
            text-align: center;
        }
        
        .btn:hover {
            background-color: #e05a2a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>  
    <section class="page-header">
        <div class="container">
            <h1>Бронирование офиса</h1>
            <div class="breadcrumbs">
                <a href="index.php">Главная</a> / 
                <a href="offices.php">Помещения</a> / 
                <span>Бронирование</span>
            </div>
        </div>
    </section>
    
    <div class="container">
        <?php 
            $id = $_GET['office'];
                $stm=$pdo->query("SELECT * FROM `offices` WHERE id='$id'");
                $office=$stm->fetch();?>
        <div class="booking-container">
            <div class="office-gallery">
                <img src=".\images\office\<?=$office['image_path']?>" alt="Офис в <?=$office['business_center']?>" 
                     class="main-image">
            </div>
            <div class="office-block">
                <div class="office-details">
                <h2 class="office-title"><?='БЦ "'.$office['business_center'].'"'?></h2>
                <div class="office-location">
                    <i class="fas fa-map-marker-alt"></i><?=$office['office_area'].' '.$office['office_addres']?>
                </div>
                <div class="office-features">
                    <div class="feature-item">
                        <span class="feature-name">Площадь:</span>
                        <span class="feature-value"><?=$office['office_square']?> м²</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-name">Вместимость:</span>
                        <span class="feature-value">до <?=$office['office_capacity']?> человек</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-name">Этаж:</span>
                        <span class="feature-value"><?=$office['office_floor']?></span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-name">Ремонт:</span>
                        <span class="feature-value"><?=$office['office_repair']?></span>
                    </div>
                </div>
                <div class="office-price"><?=$office['office_rent']?> ₽/мес</div>
                </div>
                <div class="booking-form">
                    <form method="post" action="book_action.php?office=<?=$id?>">
                        <div class="form-group">
                            <label for="startDate">Дата начала аренды</label>
                            <input type="date" name="start_date" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="period">Срок аренды</label>
                            <select name="period" required>
                                <option value="">Выберите срок</option>
                                <option value="3">3 месяца</option>
                                <option value="6">6 месяцев</option>
                                <option value="12">1 год</option>
                                <option value="24">2 года</option>
                            </select>
                        </div>
                        
                        <input type="submit" class="btn" value="Забронировать 📅">
                            
                        </input>
                    </form>                   
                </div>
            </div>
        </div>
    </div>   
    <?php include "footer.php"; ?>
</body>
</html>