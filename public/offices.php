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
    <title>PrimeOffice | Все офисные помещения</title>
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
        
        .btn-secondary {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .btn-secondary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .offices {
            padding: 3rem 0;
        }
        
        .section-title {
            margin-bottom: 2rem;
            font-size: 1.8rem;
            color: var(--primary-color);
        }
        
        .offices-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }
        
        .office-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }
        
        .office-card:hover {
            transform: translateY(-10px);
        }
        
        .office-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        
        .office-info {
            padding: 1.5rem;
            background: white;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .office-info h3 {
            margin: 0 0 0.5rem;
            color: var(--primary-color);
        }
        
        .office-location {
            color: #666;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .office-features {
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }
        
        .feature-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .feature-name {
            color: #666;
        }
        
        .feature-value {
            font-weight: 500;
        }
        
        .office-price {
            font-weight: 700;
            color: var(--secondary-color);
            font-size: 1.3rem;
            margin-bottom: 1rem;
            text-align: right;
        }
        
        .office-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        
        .favorite-btn {
            background: none;
            border: none;
            color: #ccc;
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .favorite-btn:hover {
            color: var(--secondary-color);
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 2rem 0;
            font-size: 0.9rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>    
    <section class="page-header">
        <div class="container">
            <h1>Все офисные помещения</h1>
            <div class="breadcrumbs">
                <a href="index.php">Главная</a> / <span>Помещения</span>
            </div>
        </div>
    </section>
    
    <section class="offices">
        <div class="container">
            <h2 class="section-title">Доступные офисы</h2>
            
            <div class="offices-grid">
                <?php 
                $stm=$pdo->query('SELECT * FROM `offices`');
                $offices=$stm->fetchAll();?>
                <?php foreach ($offices as $office){?>
                
                <div class="office-card">
                    <img src=".\images\office\<?=$office['image_path']?>" alt="Офис в <?=$office['business_center']?>" class="office-img">
                    <div class="office-info">
                        <h3><?='БЦ "'.$office['business_center'].'"'?></h3>
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
                        <div class="office-actions">
                            <a href="office_book.php?office=<?=$office['id']?>" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
                <?}?>            
        </div>
    </section>
    
    <?php include "footer.php"; ?>
</body>
</html>