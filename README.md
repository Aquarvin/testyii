# Yii 1.1.16 — Docker Demo

Тестовий проект: Yii 1.1.16 на PHP 5.6 + MySQL 5.7, розгорнутий у Docker. Демонструє сторінку профілю ріелтора з оголошеннями, прочитаними з бази даних.

---

## Стек

| Компонент | Версія |
|-----------|--------|
| PHP       | 5.6.40 |
| Apache    | 2.4    |
| Yii       | 1.1.16 |
| MySQL     | 5.7    |
| Xdebug    | 2.5.5  |

---

## Структура проекту

```
.
├── app/                        # Код застосунку (volume → /var/www/html)
│   ├── index.php               # Точка входу
│   ├── .htaccess               # URL rewrite
│   └── protected/
│       ├── config/main.php     # Конфігурація Yii
│       ├── controllers/
│       │   ├── SiteController.php
│       │   └── RealtorController.php
│       ├── models/
│       │   ├── Realtor.php     # AR-модель таблиці realtors
│       │   └── Advert.php      # AR-модель таблиці adverts
│       └── views/
│           ├── site/
│           └── realtor/        # Профіль ріелтора (partials)
├── docker/
│   ├── web/
│   │   ├── Dockerfile          # PHP 5.6 + Apache + Xdebug
│   │   ├── apache.conf
│   │   ├── php.ini
│   │   └── xdebug.ini
│   └── mysql/
│       └── init.sql            # Схема БД + seed-дані
└── docker-compose.yml
```

---

## Розгортання

### Вимоги

- Docker Engine 20+
- Docker Compose v2

### Запуск

```bash
git clone <repo-url>
cd testyii

docker compose up -d
```

Перша збірка займе ~3 хвилини (завантаження образів, компіляція PHP-розширень).

### Перевірка

```bash
docker compose ps
```

Обидва контейнери мають бути `Up (healthy)`:

```
NAME      IMAGE         PORTS
yii_web   testyii-web   0.0.0.0:8080->80/tcp
yii_db    mysql:5.7     0.0.0.0:3307->3306/tcp
```

---

## Сторінки

| URL                              | Опис |
|----------------------------------|------|
| `http://localhost:8080`          | Статус-сторінка: PHP, Yii, DB, Xdebug |
| `http://localhost:8080/realtor/view` | Профіль ріелтора + плитка оголошень |

---

## База даних

### Схема

```sql
realtors  (id, name, photo, phone, email, experience, properties_sold, rating, description)
adverts   (id, realtor_id, title, image, description, price, currency, city, type)
```

`adverts.realtor_id` — зовнішній ключ до `realtors.id` (CASCADE DELETE).

### Seed-дані

`docker/mysql/init.sql` автоматично виконується при першому старті контейнера `db` (через `docker-entrypoint-initdb.d`).

Якщо контейнер вже запущений і таблиці не створились — виконати вручну:

```bash
docker exec -i yii_db mysql --default-character-set=utf8mb4 -uroot -proot_password yii_db < docker/mysql/init.sql
```

> **Важливо:** завжди передавати `--default-character-set=utf8mb4` при роботі з кирилицею, інакше відбудеться подвійне кодування.

### Підключення з IDE (PHPStorm / DBeaver)

| Параметр | Значення       |
|----------|----------------|
| Host     | `localhost`    |
| Port     | `3307`         |
| Database | `yii_db`       |
| User     | `yii_user`     |
| Password | `yii_password` |

---

## Xdebug

Xdebug 2.5.5 налаштований на remote debugging (DBGp, port `9000`).

### VS Code — `.vscode/launch.json`

```json
{
  "version": "0.2.0",
  "configurations": [
    {
      "name": "Listen for Xdebug",
      "type": "php",
      "request": "launch",
      "port": 9000,
      "pathMappings": {
        "/var/www/html": "${workspaceFolder}/app"
      }
    }
  ]
}
```

### PHPStorm

`Run → Edit Configurations → PHP Remote Debug`

| Параметр    | Значення       |
|-------------|----------------|
| IDE key     | `PHPSTORM`     |
| Host        | `localhost`    |
| Port        | `9000`         |
| Path mapping | `/var/www/html` → `app/` |

---

## Зупинка та очищення

```bash
# Зупинити контейнери
docker compose down

# Зупинити та видалити дані БД
docker compose down -v
```
