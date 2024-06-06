-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 28 2024 г., 15:14
-- Версия сервера: 8.3.0
-- Версия PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_prolans`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Applications`
--

CREATE TABLE `Applications` (
  `ID` int NOT NULL,
  `stName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `stSurname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `stPatronym` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `stBirthyear` int DEFAULT NULL,
  `stNumber` bigint DEFAULT NULL,
  `prName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prSurname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prPatronym` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prNumber` bigint DEFAULT NULL,
  `prEmail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Applications`
--

INSERT INTO `Applications` (`ID`, `stName`, `stSurname`, `stPatronym`, `stBirthyear`, `stNumber`, `prName`, `prSurname`, `prPatronym`, `prNumber`, `prEmail`, `date`) VALUES
(1, 'Денис', 'Денисов', 'Денисович', 2016, 79651234567, 'Мария', 'Дмитриева', 'Дмитриевна', 79651234567, 'maria@mail.ru', '2024-05-06 18:40:00'),
(2, 'Иван', 'Иванов', 'Иванович', 2012, 9601234567, 'Иван', 'Дмитриев', 'Дмитриевич', 9601234567, 'ivan@mail.ru', '2024-05-10 03:56:52'),
(3, 'Иван', 'Иванов', 'Иванович', 2016, 81234567890, 'Дмитрий', 'Дмитриев', 'Дмитриевич', 81234567890, 'ivan@mail.ru', '2024-05-28 16:45:56');

-- --------------------------------------------------------

--
-- Структура таблицы `Courses`
--

CREATE TABLE `Courses` (
  `ID` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aboutShort` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `age` int DEFAULT NULL,
  `duration` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `blockBG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bannerImage` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `blockImage` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `showOrder` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Courses`
--

INSERT INTO `Courses` (`ID`, `name`, `code`, `category`, `subject`, `aboutShort`, `age`, `duration`, `price`, `about`, `blockBG`, `bannerImage`, `blockImage`, `showOrder`) VALUES
(1, 'Введение в компьютерную графику', 'BV', 'Вводные', '2D и 3D графика', '[BV]\r\n</br>\r\nКурс по компьютерной графике с изучением различных типов графики и созданием анимаций', 9, '96 ак. часов (1 учебный год)', 6600, '<h4>Курс предназначен для школьников с 9 лет, желающих познакомиться с различными направлениями компьютерной графики:</h4>\r\n<ul>\r\n<li>иллюстративная, презентационная, креативная графика;</li>\r\n<li>графика 2D - мультипликации и компьютерных игр;</li>\r\n<li>трехмерная графика.</li>\r\n</ul>\r\n<h4>Учащиеся научатся:</h4>\r\n<ul>\r\n<li>работать с векторной и растровой графикой на базовом уровне,</li>\r\n<li>создавать визуальные графические эффекты,</li>\r\n<li>делать иллюстрации к тексту и презентациям,</li>\r\n<li>рисовать и анимировать стилизованные изображения,</li>\r\n<li>создавать небольшие программы для управления графическими объектами.</li>\r\n</ul>\r\nВ течение всего курса учащиеся будут учиться грамотно работать с операционной и файловой системой, совершенствовать навыки работы с текстом.', './images/courses/blockBGs/blockBG_BV.png', './images/courses/bannerImages/bannerImage_BV.png', './images/courses/blockImages/blockImage_BV.png', 1),
(2, 'Введение в интернет-технологии и презентационную графику', 'BS', 'Вводные', 'Интернет и сети', '[BS]\r\n</br>\r\nКурс по изучению базовых навыков работы в офисных программах, использованию интернет-технологий, и основ работы с графикой.', 10, '96 ак. часов (1 учебный год)', 6600, '<h4>Курсы предназначены для школьников с 10-11 лет, желающих познакомиться с применением офисных и интернет технологий для обеспечения:</h4>\r\n<ul>\r\n<li>Коммуникациий;\r\n<li>Документооборота;\r\n<li>Рекламы и презентаций.\r\n<h4>Учащиеся научатся:</h4>\r\n<ul>\r\n<li>работать с офисными и интернет-приложениями на базовом уровне (создание, редактирование, форматирование),</li>\r\n<li>создавать сетевые и офисные документы различного типа (записки, отчеты, сайты-визитки),</li>\r\n<li>использовать сетевые и офисные технологии для коммуникаций (официальная и неофициальная переписка, обсуждения),</li>\r\n<li>создавать небольшие программы для интерактивных приложений типа игр и презентаций.</li>\r\n</ul>\r\nВ течение всего курса учащиеся будут учиться грамотно работать с операционной системой, сетевым окружением, облачными сервисами, закреплять умения работы с векторной и растровой графикой.', './images/courses/blockBGs/blockBG_BS.png', './images/courses/bannerImages/bannerImage_BS.png', './images/courses/blockImages/blockImage_BS.png', 2),
(3, 'Введение в программное и аппаратное обеспечение компьютера\r\n', 'BM', 'Вводные', 'Программирование', '[BM]\r\n</br>\r\nКурс по изучению архитектуры компьютера, операционных систем, программированию контроллеров. Работа с различными устройствами и программами.', 11, '96 ак. часов (1 учебный год)', 6600, '<h4>Курс предназначен для школьников с 11 лет, желающих познакомиться с</h4>\r\n<ul>\r\n<li>архитектурой компьютера, устройством и работой его основных блоков;</li>\r\n<li>принципами организации операционных систем и их функциями;</li>\r\n<li>принципами функционирования и программированием контроллеров внешних устройств;</li>\r\n<li>принципами организации \"умного дома\".</li>\r\n</ul>\r\n<h4>Учащиеся научатся (на начальном уровне):</h4>\r\n<ul>\r\n<li>познакомятся с двоичной и шестнадцатеричной системой счисления (в контексте кодирования информации);</li>\r\n<li>подбирать аппаратные конфигурации компьютера в соответствии с типовыми задачами;</li>\r\n<li>работать с сервисами операционной системы и использовать их для решения задач;</li>\r\n<li>создавать управляемые внешние устройства на основе программирования контроллеров;</li>\r\n</ul>\r\nВ течение всего курса учащиеся будут совершенствовать и закреплять умения работы с прикладными компьютерными программами (в том числе с офисными приложениями).', './images/courses/blockBGs/blockBG_BM.png', './images/courses/bannerImages/bannerImage_BM.png', './images/courses/blockImages/blockImage_BM.png', 3),
(4, 'Компьютерный дизайн и мультипликация', 'D', 'Основные', '2D и 3D графика', NULL, 11, '96 ак. часов (1 учебный год)', 6900, NULL, './images/courses/blockBGs/blockBG_D.png', './images/courses/bannerImages/bannerImage_D.png', './images/courses/blockImages/blockImage_D.png', 4),
(5, 'Основы трехмерного моделирования', 'M', 'Основные', '2D и 3D графика', NULL, 12, '96 ак. часов (1 учебный год)', 6900, NULL, './images/courses/blockBGs/blockBG_M.png', './images/courses/bannerImages/bannerImage_M.png', './images/courses/blockImages/blockImage_M.png', 5),
(6, 'Сети и Web-проектирование (HTML, CSS, JavaScript)', 'N', 'Основные', 'Интернет и сети', NULL, 12, '96 ак. часов (1 учебный год)', 6900, NULL, './images/courses/blockBGs/blockBG_N.png', './images/courses/bannerImages/bannerImage_N.png', './images/courses/blockImages/blockImage_N.png', 6),
(7, 'Основы программирования (Паскаль)\r\n', 'P', 'Основные', 'Программирование', NULL, 13, '96 ак. часов (1 учебный год)', 6900, NULL, './images/courses/blockBGs/blockBG_P.png', './images/courses/bannerImages/bannerImage_P.png', './images/courses/blockImages/blockImage_P.png', 7),
(8, 'Визуальные коммуникации и иллюстративная графика\r\n', 'VC', 'Специализированные', '2D и 3D графика', NULL, 12, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_VC.png', './images/courses/bannerImages/bannerImage_VC.png', './images/courses/blockImages/blockImage_VC.png', 8),
(9, 'Введение в разработку 3D-игр', 'GM', 'Специализированные', '2D и 3D графика', NULL, 12, '96 ак. часов (1 учебный год)', 7200, 'Курс предназначен для школьников с 12 лет, имеющих общее представление об программах 3D - графики, желающих изучить общие принципы создания компьютерных игр с помощью специализированных инструментальных средств, а также познакомиться с возможностью использования для этих целей скриптового языка. В результате изучения курса учащиеся научатся создавать игры с помощью инструментов игрового движка Unity, 3D-пакета Blender, и языка C#.\r\n</br></br>\r\nЗа время обучения учащиеся должны получить знания и умения по следующим темам:\r\n</br>\r\n<ul>\r\n<li>Основные особенности работы в оболочке Blender 3d.</li>\r\n<li>Геометрические примитивы, создание форм на основе примитивов, их комбинаций и преобразований.</li>\r\n<li>Основы работы с Unity.</li>\r\n<li>Настройка взаимодействия объектов.</li>\r\n<li>Особенности создания и оптимизации моделей под Game Development.</li>\r\n<li>Текстурирование объектов под Game Development.</li>\r\n<li>Постановка сцены.</li>\r\n<li>Работа с камерами.</li>\r\n<li>Основы анимации.</li>\r\n<li>Основы С# в Unity Engine.</li>\r\n<li>Типы объектов Blender.</li>\r\n<li>Инструменты дублирования, выравнивания, преобразования</li>\r\n<li>Создание LOD (LOD - уровень детализации) моделей для Game Development.</li>\r\n<li>Использование инструментов Blender при создании органических и неорганических объектов с использованием различных уровней детализации.</li>\r\n<li>Основные способы контроля взаимодействий в Unity:</li>\r\n</ul>\r\n<ul>\r\n<li>Интерфейс записи алгоритмов.</li>\r\n<li>Ввод и вывод данных.</li>\r\n<li>Реализация задач, использующих типы </li><li>данных и взаимодействие.</li>\r\n<li>Использование С# в Unity Engine.</li>\r\n</ul>', './images/courses/blockBGs/blockBG_GM.png', './images/courses/bannerImages/bannerImage_GM.png', './images/courses/blockImages/blockImage_GM.png', 9),
(10, 'Основы информационной безопасности', 'IS', 'Специализированные', 'Интернет и сети', NULL, 12, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_IS.png', './images/courses/bannerImages/bannerImage_IS.png', './images/courses/blockImages/blockImage_IS.png', 10),
(11, 'WEB-технологии (PHP, Apache, MySQL)', 'W', 'Специализированные', 'Интернет и сети', NULL, 13, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_W.png', './images/courses/bannerImages/bannerImage_W.png', './images/courses/blockImages/blockImage_W.png', 11),
(12, 'Основы программирования, 2 год', 'C', 'Специализированные', 'Программирование', NULL, 14, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_C.png', './images/courses/bannerImages/bannerImage_C.png', './images/courses/blockImages/blockImage_C.png', 12),
(13, 'Компьютерное искусство (Digital Art)', 'DA', 'Специализированные', '2D и 3D графика', NULL, 12, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_DA.png', './images/courses/bannerImages/bannerImage_DA.png', './images/courses/blockImages/blockImage_DA.png', 13),
(14, 'Студия разработки компьютерных игр', 'GS', 'Специализированные', '2D и 3D графика', NULL, 13, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_GS.png', './images/courses/bannerImages/bannerImage_GS.png', './images/courses/blockImages/blockImage_GS.png', 14),
(15, 'Студия компьютерных комиксов и карикатур', 'CO', 'Специализированные', '2D и 3D графика', NULL, 12, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_CO.png', './images/courses/bannerImages/bannerImage_CO.png', './images/courses/blockImages/blockImage_CO.png', 15),
(16, 'Студия робототехники', 'R', 'Специализированные', 'Программирование', NULL, 12, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_R.png', './images/courses/bannerImages/bannerImage_R.png', './images/courses/blockImages/blockImage_R.png', 16),
(17, 'Технологии искусственного интеллекта', 'AI', 'Специализированные', 'Программирование', NULL, 13, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_AI.png', './images/courses/bannerImages/bannerImage_AI.png', './images/courses/blockImages/blockImage_AI.png', 17),
(18, 'Дизайн web-сайтов', 'FT', 'Специализированные', 'Интернет и сети', NULL, 12, '96 ак. часов (1 учебный год)', 7200, NULL, './images/courses/blockBGs/blockBG_FT.png', './images/courses/bannerImages/bannerImage_FT.png', './images/courses/blockImages/blockImage_FT.png', 18);

-- --------------------------------------------------------

--
-- Структура таблицы `CoursesApplications`
--

CREATE TABLE `CoursesApplications` (
  `courseID` int NOT NULL,
  `applicationID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `CoursesApplications`
--

INSERT INTO `CoursesApplications` (`courseID`, `applicationID`) VALUES
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `CoursesPrograms`
--

CREATE TABLE `CoursesPrograms` (
  `courseID` int NOT NULL,
  `programID` int NOT NULL,
  `showOrder` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `CoursesPrograms`
--

INSERT INTO `CoursesPrograms` (`courseID`, `programID`, `showOrder`) VALUES
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(1, 6, 6),
(1, 7, 7),
(1, 8, 8),
(1, 9, 9),
(1, 10, 10),
(2, 11, 1),
(2, 12, 2),
(2, 13, 3),
(2, 14, 4),
(2, 15, 5),
(2, 5, 6),
(2, 9, 7),
(3, 16, 1),
(3, 17, 2),
(3, 18, 3),
(3, 19, 4),
(3, 20, 5),
(3, 21, 6),
(3, 22, 7),
(3, 13, 8),
(1, 1, 1),
(1, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `FAQ`
--

CREATE TABLE `FAQ` (
  `ID` int NOT NULL,
  `heading` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `showOrder` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `FAQ`
--

INSERT INTO `FAQ` (`ID`, `heading`, `about`, `showOrder`) VALUES
(1, 'Как осуществляется прием?', 'Прием Учащегося в ту или иную группу осуществляется с учетом его личного желания и уровня его подготовки. Сначала учащийся подает <span style=\"font-weight:bold\">предварительную</span> электронную заявку (онлайн). Регистрирующийся впервые учащийся получает регистрационный номер, который сохраняется за ним при условии прохождения полного курса и теряется, если учащийся не был зачислен в группу или прекратил обучение до окончания курса. Затем по результатам очного (на орг. собрании) или дистанционного собеседования с учащимся или заказчиком определяется направление обучения (курс). После этого Учащийся <span style=\"font-weight:bold\">заполняет анкету</span>: либо бумажную (непосредственно на  очном орг. собрании), либо заполняет электронную анкету по предоставленной ему ссылке.\r\nНа основании анкет происходит распределения по группам. В анкете учащийся может указать свои ограничения по времени посещения занятий, а также - желаемую форму обучения (очную или дистанционную).', 1),
(2, 'Как происходит распределение по группам?', 'После сбора и обработки анкет учащихся происходит распределение учащихся по группам (как правило, в конце сентября), при этом с ними согласовываются дни и время занятий с учетом возможностей центра. Зачисление в конкретную группу происходит только после одобрения этой группы заказчиком или учащимся. Зачисление в группы ведется строго в порядке возрастания регистрационных номеров.', 2),
(3, 'Когда выдаются договор и квитанции?', 'На первом занятии (как правило первая или вторая неделя октября) учащимся выдается договор и квитанция об оплате. Договор заключается с Частным лицом, заказывающим образовательные услуги.', 3),
(4, 'Как заполнить договор и квитанцию?', '<a style=\"font-weight:bold;\" href=\"index.php?page=instructions\">Инструкция по заполнению договора\r\nИнструкция по заполнению и оплате квитанции</a>\r\n</br>\r\nПо всем орг.вопросам (заполнение договора, квитанции; оплата и т.п.) обращайтесь по тел: 903-70-24 (с 12.00) - Климов Игорь Викторович', 4),
(5, 'На какой срок заключается договор?', 'Договор заключается на весь курс — 8 месяцев обучения (32 занятия).', 5),
(6, 'Как происходит оплата?', 'Оплата за занятия осуществляется по квитанциям, которые учащийся должен заблаговременно взять у преподавателя либо распечатать электронный вариант. Оплата вносится ежемесячно равными долями (не позднее 5-го числа текущего месяца) и не зависит от числа занятий в конкретном месяце. Квитанции оплачиваются в отделениях банка, обслуживающего курсы. В случае оплаты через другой банк (в т. ч. СБЕРБАНК), банк принимающий деньги, может удержать процент за перевод. Оплаченная квитанция за занятия в текущем месяце приносится не позднее первого занятия оплачиваемого месяца. Допускается предоплата нескольких месяцев.', 6),
(7, 'Как и когда можно получить пропуск?', 'Пропуск выдается только после подписания договора и предоплаты первого месяца занятий. Для оформления пропуска необходима фотография. Вид фотографии сообщается при собеседовании с учащимся.', 7),
(8, 'Как часто проходят занятия и в какое время?', 'Учащийся посещает занятия один раз в неделю. Время начала занятий устанавливается по согласованному с учащимися расписанию. Обычно это 15–45 или 16–15 — для дневных групп и 18–45 — для вечерних. По согласованию с группой допускается разовое или постоянное смещение указанного времени. Дни занятий определяются расписанием учебной группы. Для дистанционных групп может быть установлено особое расписание в соответствии с индивидуальными особенностями учащихся', 8),
(9, 'Как проводятся дистанционные занятия?', 'Дистанционные занятия максимально приближены к очным занятиям. Учащиеся по расписанию входят в систему дистанционного обучения и присоединяются к он-лайн веб-конференции, на которой они видят преподавателя, слушают объяснения, выполняют задания в реальном времени. Преподаватель наблюдает за действиями учащихся (транслируются рабочие столы учащихся), а также их реакциями с помощью web-камеры, помогает им выполнять задания. Выполненные работы выкладываются в систему дистанционного обучения. В этой же системе учащиеся получают достум к разнообразным методическим материалам по урокам.', 9),
(10, 'Сколько длится занятие?', 'Продолжительность занятий 3 академических часа (40 мин) с перерывом (примерно 15 минут). Один раз в неделю.', 10),
(11, 'Могут ли измениться дата и время занятий по инициативе Центра?', 'Изменение дня и времени занятий по инициативе Центра происходит только по согласованию со всеми учащимися группы, при этом гарантируется продолжение обучения. Возможен разовый перенос занятий, связанный с особенностями работы Центра в праздничные дни. Если учащегося не устраивает день и время разового переноса, то ему предоставляется возможность изучить материал пропущенного занятия в факультативной, заочной, дистанционной или иной форме. Аналогичный подход распространяется на случаи непредвиденной отмены занятий при форс-мажорных обстоятельствах, таких как стихийные бедствия, неожиданные технические неисправности различного рода, и пр.', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `Messages`
--

CREATE TABLE `Messages` (
  `ID` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `surname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `number` bigint DEFAULT NULL,
  `theme` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `messageText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Messages`
--

INSERT INTO `Messages` (`ID`, `name`, `surname`, `email`, `number`, `theme`, `messageText`, `date`) VALUES
(1, 'Иван', 'Иванов', 'kid@gmail.com', 1234567890, 'Приветствие', 'Здравствуйте!', '2024-05-28 16:32:05'),
(2, 'Анель', 'Бикибаева', 'anel@gmail.com', 1234567890, 'Поболтать', 'Как дела?', '2024-05-28 16:32:05');

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `ID` int NOT NULL,
  `heading` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`ID`, `heading`, `about`, `image`, `date`) VALUES
(1, 'Проведение занятий во время каникул', 'Уважаемые учащиеся школы Prolans!\r\n<br/><br/>\r\nШкольные каникулы - время заслуженного отдыха и развлечений! \r\nОднако мы хотим напомнить вам, что во время этого периода занятия в нашей школе <span class = \'bold\'>продолжаются по обычному расписанию.</span> Это значит, что вы можете продолжать свое обучение и развитие, несмотря на каникулярные дни.\r\n<br/><br/>\r\nНаши преподаватели всегда готовы помочь вам и ответить на все ваши вопросы. Не стесняйтесь обращаться к ним по любым вопросам, связанным с учебным процессом или программой курсов. Ваше обучение и успехи для нас важны, и мы стремимся обеспечить вам максимальное комфортное и продуктивное обучение.', './images/news/news_post_1.jpg', '2023-03-23'),
(2, 'Первые звонки и приглашения на занятия', 'Здравствуйте, уважаемые родители и наши будущие ученики!\r\n</br></br>\r\nНа этой неделе мы начинаем звонить вам и приглашать на первое занятие. Позвоним каждому до 6 октября.\r\n</br></br>\r\nЕсли вам не позвонили до 6/10, тогда можно волноваться и срочно звонить нам - выяснять почему вдруг вам не позвонили. Такое редко случается: например, когда вы ошибочно указали телефон в анкете.\r\n</br></br>\r\nНапоминаем, что мы звоним в порядке возрастания регистрационных номеров и предлагаем вам доступные на момент звонка варианты. Чем позже вы подали заявку, тем позже мы вам позвоним.\r\n</br></br>\r\nЗанятия в группах начинаются на следующей неделе.', './images/news/news_post_2.jpg', '2023-09-26'),
(3, 'Набор на 2023/2024 учебный год открыт!', NULL, './images/news/news_post_3.jpg', '2023-09-01'),
(4, 'Подача заявок на курсы!', NULL, './images/news/news_post_4.jpg', '2023-07-17'),
(5, 'Запуск летних курсов!', 'ЛОВИТЕ ЛЕТНИЙ ЭКСКЛЮЗИВ 2023\r\n</br></br>\r\nОнлайн школа Prolans приглашает школьников на летние онлайн компьютерные курсы в июне и июле: </br>\r\n🔥 Введение в искусственный интеллект (с 13 лет)</br>\r\n🔥 Креативная песочная анимация (с 11 лет)</br>\r\n🔥 Гибридные 2D и 3D технологии в среде Blender (с 12 лет)</br>\r\n🔥 Студия 2D анимации (с 11 лет)</br>\r\n🔥 Видеосъёмка и монтаж</br>\r\n🔥 Студия разработки визуальных новелл (с 13 лет)\r\n</br></br>\r\nЗаписывайтесь скорее!', './images/news/news_post_5.jpg', '2023-05-23'),
(6, 'Встреча для молодежи: \"IT - выбор нового поколения\"', NULL, './images/news/news_post_6.jpg', '2023-03-14');

-- --------------------------------------------------------

--
-- Структура таблицы `Pages`
--

CREATE TABLE `Pages` (
  `ID` int NOT NULL,
  `engTitle` varchar(50) NOT NULL,
  `rusTitle` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `showOrder` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Pages`
--

INSERT INTO `Pages` (`ID`, `engTitle`, `rusTitle`, `content`, `showOrder`) VALUES
(1, 'home', 'Главная', './php/home.php', -1),
(2, 'courses', 'Курсы', './php/courses.php', 1),
(3, 'about_us', 'О нас', './php/about_us.php', 2),
(4, 'news', 'Новости', './php/news.php', 3),
(5, 'faq', 'Правила', './php/faq.php', 4),
(6, 'contacts', 'Контакты', './php/contacts.php', 5),
(9, 'registration_form', 'Форма регистрации', './php/registration_form.php', -2),
(10, 'instructions', 'Инструкции', './php/instructions.php', -2),
(11, 'applications', 'Заявки', './php/applications.php', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `Programs`
--

CREATE TABLE `Programs` (
  `ID` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Programs`
--

INSERT INTO `Programs` (`ID`, `name`, `about`, `image`) VALUES
(1, 'Paint', 'Программа для создания и редактирования  растровых графики', './images/programs/programImage_1.png'),
(2, 'GIMP', 'Графическое приложение для создания и редактирования  растровой графики', './images/programs/programImage_2.png'),
(3, 'Pixlr', 'Программа для редактирования фотографий', './images/programs/programImage_3.png'),
(4, 'ArtRage', 'Программа для рисования и создания растровых изображений', './images/programs/programImage_4.png'),
(5, 'Scratch', 'Платформа для обучения программированию', './images/programs/programImage_5.png'),
(6, 'InkScape', 'Графический редактор для работы с векторной графикой', './images/programs/programImage_6.png'),
(7, 'Solid Works', 'ПО для 3D-проектирования и моделирования', './images/programs/programImage_7.png'),
(8, 'SketchUp', 'Программа для 3D-моделирования', './images/programs/programImage_8.png'),
(9, 'MS Power Point', 'Программа для создания и редактирования презентаций', './images/programs/programImage_9.png'),
(10, 'WordPad', 'Программа для работы с текстовыми документами', './images/programs/programImage_10.png'),
(11, 'MS Word', 'Программа для создания и редактирования текстовых документов.', './images/programs/programImage_11.png'),
(12, 'MS Excel', 'Программа для создания и редактирования электронных таблиц', './images/programs/programImage_12.png'),
(13, 'Google Workspace', 'Набор онлайн-приложений: Google Docs, Google Slides  и Google Sheets', './images/programs/programImage_13.png\r\n'),
(14, 'WIX', 'Платформа для создания веб-сайтов', './images/programs/programImage_14.png\r\n'),
(15, 'Adobe Photoshop', 'ПО для редактирования и обработки изображений', './images/programs/programImage_15.png'),
(16, 'Windows 7, 10', 'Операционная система, разработая Microsoft', './images/programs/programImage_16.png'),
(17, 'Linux', 'Операционная система, сравнительное изучение', './images/programs/programImage_17.png'),
(18, 'Контроллеры', 'Устройства типа Arduino и(или) аналогов, для управления другими устройствами', './images/programs/programImage_18.png'),
(19, 'Компоненты компьютера', 'Процессоры, материнские платы, ОЗУ, накопители (SSD и HDD), карты расширения, блоки питания', './images/programs/programImage_19.png'),
(20, 'Устройства ввода-вывод', 'Датчики, манипуляторы, клавиатуры, дисплеи, принтеры', './images/programs/programImage_20.png'),
(21, 'Microsoft Office', 'Облачные приложения', './images/programs/programImage_21.png'),
(22, 'Arduino', 'Среда разработки IDE Arduino, язык программирования устройств  Arduino ', './images/programs/programImage_22.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Applications`
--
ALTER TABLE `Applications`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `CoursesApplications`
--
ALTER TABLE `CoursesApplications`
  ADD KEY `applicationID` (`applicationID`),
  ADD KEY `courseID` (`courseID`);

--
-- Индексы таблицы `CoursesPrograms`
--
ALTER TABLE `CoursesPrograms`
  ADD KEY `courseID` (`courseID`) USING BTREE,
  ADD KEY `programID` (`programID`) USING BTREE;

--
-- Индексы таблицы `FAQ`
--
ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Pages`
--
ALTER TABLE `Pages`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Programs`
--
ALTER TABLE `Programs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Applications`
--
ALTER TABLE `Applications`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT для таблицы `Courses`
--
ALTER TABLE `Courses`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `FAQ`
--
ALTER TABLE `FAQ`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `Messages`
--
ALTER TABLE `Messages`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `Pages`
--
ALTER TABLE `Pages`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `Programs`
--
ALTER TABLE `Programs`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `CoursesApplications`
--
ALTER TABLE `CoursesApplications`
  ADD CONSTRAINT `coursesapplications_ibfk_1` FOREIGN KEY (`applicationID`) REFERENCES `Applications` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursesapplications_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `Courses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `CoursesPrograms`
--
ALTER TABLE `CoursesPrograms`
  ADD CONSTRAINT `fk_CoursesPrograms_courseID` FOREIGN KEY (`courseID`) REFERENCES `Courses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_CoursesPrograms_programID` FOREIGN KEY (`programID`) REFERENCES `Programs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
