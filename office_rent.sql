-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Апр 05 2025 г., 19:47
-- Версия сервера: 8.2.0
-- Версия PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `office_rent`
--

-- --------------------------------------------------------

--
-- Структура таблицы `offices`
--

CREATE TABLE `offices` (
  `id` int NOT NULL,
  `business_center` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `office_addres` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `office_area` varchar(32) NOT NULL,
  `office_square` varchar(32) NOT NULL,
  `office_repair` varchar(32) NOT NULL,
  `office_floor` int NOT NULL,
  `office_capacity` int NOT NULL,
  `office_rent` varchar(32) NOT NULL,
  `image_path` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `offices`
--

INSERT INTO `offices` (`id`, `business_center`, `office_addres`, `office_area`, `office_square`, `office_repair`, `office_floor`, `office_capacity`, `office_rent`, `image_path`) VALUES
(1, 'Легенда', 'ул. Центральная, 15', 'Центр города', '120 ', 'евро', 7, 15, '85 000', 'office_бц_легенда1.avif'),
(4, ' Империя', 'Пресненская набережная, 6 стр 2\r\n', 'Пресненский', '226', 'евро', 48, 8, '810 000', 'Imperia.png'),
(5, 'Федерация', 'Пресненская набережная, д. 12\r\n', 'Пресненский', '418,1', 'бизнес-класс', 53, 14, '2 370 000', 'RF.png'),
(6, 'Федерация Восток', 'Пресненская набережная, д. 12\r\n', 'Пресненский', '214', 'стандарт', 59, 14, '1 800 000', 'Vostok.png'),
(7, 'Федерация Восток', 'Пресненская набережная, д. 12\r\n', 'Пресненский', '191', 'евро', 52, 10, '1 100 000', 'Vostok2.png'),
(8, 'ТЦ на Варшавском шоссе', 'Чертаново Южное, Варшавское ш., 170Г\r\n', 'Чертаново Южное', '401', 'бизнес-класс', 1, 24, '3 200 000', 'Madam.png'),
(9, 'Офисное здание', 'Тверской, ул. Малая Дмитровка\r\n', 'ЦАО', '279', 'стандарт', 4, 14, '730 400', 'jennifers body.png'),
(10, 'Трехгорная мануфактура', 'Рочдельская ул., 15С13\r\n', 'ЦАО', '303', 'стандарт', 3, 20, '1 400 000', 'angelmycry.png');

-- --------------------------------------------------------

--
-- Структура таблицы `rent_request`
--

CREATE TABLE `rent_request` (
  `id` int NOT NULL,
  `office_id` int NOT NULL,
  `user_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'Ожидает подтверждения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rent_request`
--

INSERT INTO `rent_request` (`id`, `office_id`, `user_id`, `start_date`, `end_date`, `status`) VALUES
(1, 4, 1, '2025-04-22', '2025-10-22', 'Ожидает подтверждения'),
(3, 5, 1, '2025-04-02', '2027-04-02', 'Ожидает подтверждения');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `phone`, `email`) VALUES
(1, '123', '123', 'zdgffzdgdfzg', 'ersdfrdfgevdfg', '123@email.ru'),
(2, '456', '456', '456', '456', '456@234');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rent_request`
--
ALTER TABLE `rent_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_id` (`office_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `rent_request`
--
ALTER TABLE `rent_request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `rent_request`
--
ALTER TABLE `rent_request`
  ADD CONSTRAINT `rent_request_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_request_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
