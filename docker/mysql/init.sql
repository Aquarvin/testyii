CREATE DATABASE IF NOT EXISTS `yii_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
GRANT ALL PRIVILEGES ON `yii_db`.* TO 'yii_user'@'%';
FLUSH PRIVILEGES;

USE `yii_db`;

CREATE TABLE IF NOT EXISTS `realtors` (
  `id`               INT UNSIGNED     AUTO_INCREMENT PRIMARY KEY,
  `name`             VARCHAR(100)     NOT NULL,
  `photo`            VARCHAR(255)     DEFAULT NULL,
  `phone`            VARCHAR(30)      DEFAULT NULL,
  `email`            VARCHAR(100)     DEFAULT NULL,
  `experience`       TINYINT UNSIGNED DEFAULT 0,
  `properties_sold`  SMALLINT UNSIGNED DEFAULT 0,
  `rating`           DECIMAL(3,1)     DEFAULT 0.0,
  `description`      TEXT             DEFAULT NULL,
  `created_at`       TIMESTAMP        DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `adverts` (
  `id`          INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
  `realtor_id`  INT UNSIGNED  NOT NULL,
  `title`       VARCHAR(255)  NOT NULL,
  `image`       VARCHAR(500)  DEFAULT NULL,
  `description` TEXT          DEFAULT NULL,
  `price`       DECIMAL(12,2) DEFAULT 0,
  `currency`    VARCHAR(20)   DEFAULT NULL,
  `city`        VARCHAR(100)  DEFAULT NULL,
  `type`        VARCHAR(20)   DEFAULT NULL,
  `created_at`  TIMESTAMP     DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT `fk_adverts_realtor`
    FOREIGN KEY (`realtor_id`) REFERENCES `realtors`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `realtors` (`name`, `photo`, `phone`, `email`, `experience`, `properties_sold`, `rating`, `description`)
VALUES (
  'Анна Петрова',
  '/images/realtor-placeholder.jpg',
  '+380 (50) 123-45-67',
  'anna@example.com',
  7,
  42,
  4.8,
  'Професійний ріелтор з багаторічним досвідом роботи на ринку нерухомості Києва та передмістя. Спеціалізуюся на житловій нерухомості преміум-класу, супроводжую угоди від підбору об\'єкта до реєстрації права власності. Мої клієнти отримують прозорий сервіс та чесні умови співпраці.'
);

INSERT INTO `adverts` (`realtor_id`, `title`, `image`, `description`, `price`, `currency`, `city`, `type`) VALUES
(1, '2-кімнатна квартира в центрі',              'https://picsum.photos/seed/flat1/480/300',   'Простора квартира з євроремонтом, поруч метро Хрещатик. Вся необхідна техніка та меблі включені.',         15000,  'грн/міс', 'Київ',  'Здам'),
(1, 'Студія в новобудові ЖК «Французький квартал»','https://picsum.photos/seed/studio2/480/300','Затишна студія 32 м², сучасне оздоблення, підземний паркінг, охорона 24/7.',                              65000,  '$',       'Київ',  'Продам'),
(1, 'Котедж із ділянкою 10 соток',               'https://picsum.photos/seed/house3/480/300',  'Двоповерховий котедж 180 м², гараж на 2 авто, баня, плодовий сад, свердловина.',                          120000, '$',       'Буча',  'Продам'),
(1, '1-кімнатна квартира поблизу парку',          'https://picsum.photos/seed/apt4/480/300',    'Шукаю 1-кімнатну квартиру в тихому районі, бажано з балконом, не вище 5 поверху.',                       10000,  'грн/міс', 'Львів', 'Зніму'),
(1, 'Офіс у бізнес-центрі класу А',              'https://picsum.photos/seed/office5/480/300', 'Відкрите планування, 120 м², 5-й поверх, панорамні вікна, паркінг для клієнтів.',                         45000,  'грн/міс', 'Київ',  'Здам'),
(1, 'Пентхаус із видом на Дніпро',               'https://picsum.photos/seed/pent6/480/300',   '3 кімнати, 180 м², 25 поверх, дизайнерський ремонт, тераса 40 м², консьєрж.',                             85000,  'грн/міс', 'Київ',  'Здам');
