<?php 
session_start();
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
            justify-content: space-between;
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
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }
            
            nav ul {
                margin-top: 1.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0.5rem 1rem;
            }
            
            .offices-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
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
                <!-- Офис 1 -->
                <div class="office-card">
                    <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Офис в БЦ Легенда" class="office-img">
                    <div class="office-info">
                        <h3>БЦ "Легенда"</h3>
                        <div class="office-location">
                            <i class="fas fa-map-marker-alt"></i> Центр города, ул. Центральная, 15
                        </div>
                        <div class="office-features">
                            <div class="feature-item">
                                <span class="feature-name">Площадь:</span>
                                <span class="feature-value">120 м²</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Вместимость:</span>
                                <span class="feature-value">до 15 человек</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Этаж:</span>
                                <span class="feature-value">7</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Ремонт:</span>
                                <span class="feature-value">евро</span>
                            </div>
                        </div>
                        <div class="office-price">85 000 ₽/мес</div>
                        <div class="office-actions">
                            <button class="favorite-btn" title="Добавить в избранное">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="#" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
                
                <!-- Офис 2 -->
                <div class="office-card">
                    <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Офис в БЦ Высота" class="office-img">
                    <div class="office-info">
                        <h3>БЦ "Высота"</h3>
                        <div class="office-location">
                            <i class="fas fa-map-marker-alt"></i> Деловой район, пр. Бизнесовый, 42
                        </div>
                        <div class="office-features">
                            <div class="feature-item">
                                <span class="feature-name">Площадь:</span>
                                <span class="feature-value">65 м²</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Вместимость:</span>
                                <span class="feature-value">до 8 человек</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Этаж:</span>
                                <span class="feature-value">3</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Ремонт:</span>
                                <span class="feature-value">стандарт</span>
                            </div>
                        </div>
                        <div class="office-price">45 000 ₽/мес</div>
                        <div class="office-actions">
                            <button class="favorite-btn" title="Добавить в избранное">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="#" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
                
                <!-- Офис 3 -->
                <div class="office-card">
                    <img src="https://images.unsplash.com/photo-1560448204-603b3fc33ddc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Офис в БЦ Галактика" class="office-img">
                    <div class="office-info">
                        <h3>БЦ "Галактика"</h3>
                        <div class="office-location">
                            <i class="fas fa-map-marker-alt"></i> Северный район, ул. Звездная, 7
                        </div>
                        <div class="office-features">
                            <div class="feature-item">
                                <span class="feature-name">Площадь:</span>
                                <span class="feature-value">250 м²</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Вместимость:</span>
                                <span class="feature-value">до 30 человек</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Этаж:</span>
                                <span class="feature-value">5</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Ремонт:</span>
                                <span class="feature-value">бизнес-класс</span>
                            </div>
                        </div>
                        <div class="office-price">150 000 ₽/мес</div>
                        <div class="office-actions">
                            <button class="favorite-btn" title="Добавить в избранное">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="#" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
                
                <!-- Офис 4 -->
                <div class="office-card">
                    <img src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Офис в БЦ Плаза" class="office-img">
                    <div class="office-info">
                        <h3>БЦ "Плаза"</h3>
                        <div class="office-location">
                            <i class="fas fa-map-marker-alt"></i> Центр города, ул. Главная, 10
                        </div>
                        <div class="office-features">
                            <div class="feature-item">
                                <span class="feature-name">Площадь:</span>
                                <span class="feature-value">90 м²</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Вместимость:</span>
                                <span class="feature-value">до 12 человек</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Этаж:</span>
                                <span class="feature-value">2</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Ремонт:</span>
                                <span class="feature-value">евро</span>
                            </div>
                        </div>
                        <div class="office-price">75 000 ₽/мес</div>
                        <div class="office-actions">
                            <button class="favorite-btn" title="Добавить в избранное">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="#" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
                
                <!-- Офис 5 -->
                <div class="office-card">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Офис в БЦ Триумф" class="office-img">
                    <div class="office-info">
                        <h3>БЦ "Триумф"</h3>
                        <div class="office-location">
                            <i class="fas fa-map-marker-alt"></i> Деловой район, пр. Победителей, 25
                        </div>
                        <div class="office-features">
                            <div class="feature-item">
                                <span class="feature-name">Площадь:</span>
                                <span class="feature-value">180 м²</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Вместимость:</span>
                                <span class="feature-value">до 22 человек</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Этаж:</span>
                                <span class="feature-value">4</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Ремонт:</span>
                                <span class="feature-value">бизнес-класс</span>
                            </div>
                        </div>
                        <div class="office-price">120 000 ₽/мес</div>
                        <div class="office-actions">
                            <button class="favorite-btn" title="Добавить в избранное">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="#" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
                
                <!-- Офис 6 -->
                <div class="office-card">
                    <img src="https://images.unsplash.com/photo-1521747116042-5a810fda9664?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Офис в БЦ Сфера" class="office-img">
                    <div class="office-info">
                        <h3>БЦ "Сфера"</h3>
                        <div class="office-location">
                            <i class="fas fa-map-marker-alt"></i> Западный район, ул. Инновационная, 3
                        </div>
                        <div class="office-features">
                            <div class="feature-item">
                                <span class="feature-name">Площадь:</span>
                                <span class="feature-value">300 м²</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Вместимость:</span>
                                <span class="feature-value">до 35 человек</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Этаж:</span>
                                <span class="feature-value">6</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-name">Ремонт:</span>
                                <span class="feature-value">премиум</span>
                            </div>
                        </div>
                        <div class="office-price">200 000 ₽/мес</div>
                        <div class="office-actions">
                            <button class="favorite-btn" title="Добавить в избранное">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="#" class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
    <?php include "footer.php"; ?>
</body>
</html>