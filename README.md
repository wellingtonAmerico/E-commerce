# E-commerce — PHP, SQLite & Docker

Full stack e-commerce application developed with **PHP 8.2, SQLite and Docker**, deployed as a live demo on **Render**.

The project was created to practice backend development, database integration, containerization, cloud deployment and continuous delivery using GitHub.

---

## Live Demo

🌐 https://e-commerce-7laf.onrender.com/

---

## Technologies Used

### Backend
- PHP 8.2
- SQLite (PDO)

### Frontend
- HTML5
- CSS3
- JavaScript

### Infrastructure
- Docker
- Apache
- Render
- GitHub

---

## Architecture

```text
User
  ↓
Render HTTPS
  ↓
Apache + PHP 8.2 (Docker)
  ↓
SQLite Database
```

---

## Features

- Dynamic product listing
- Product details page
- Database-driven product data
- SQLite database integration
- PDO-based database connection
- Exception-based database error handling
- Responsive interface
- Dockerized application
- Automatic deployment from GitHub
- HTTPS enabled

---

## Running Locally

### Clone the repository

```bash
git clone https://github.com/wellingtonAmerico/E-commerce.git
cd E-commerce
```

### Start with Docker

```bash
docker-compose up --build
```

### Access the application

```text
http://localhost:8080
```

---

## Docker Configuration

### Dockerfile

```dockerfile
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    sqlite3 \
    && docker-php-ext-install pdo_sqlite

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html/database

EXPOSE 80
```

---

## Project Structure

```text
e-commerce/
│
├── config/
│   └── database.php
│
├── database/
│   └── ecommerce.sqlite
│
├── css/
├── img/
├── js/
│
├── index.php
├── produto.php
├── checkout.php
├── sobre.php
├── cabecalho.php
├── rodape.php
│
├── Dockerfile
├── docker-compose.yml
└── README.md
```

---

## Database Connection

The application uses **PDO with SQLite**:

```php
$databasePath = __DIR__ . '/../database/ecommerce.sqlite';

$conexao = new PDO('sqlite:' . $databasePath);
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

---

## Deployment

The application is deployed on **Render** using the repository Dockerfile.

### Deployment flow

```text
Git Push
   ↓
GitHub
   ↓
Render Auto Deploy
   ↓
Live Application
```

---

## What Was Practiced

- Full stack web development
- PHP backend development
- PDO and SQLite integration
- Database-driven application development
- Docker containerization
- Apache configuration
- Cloud deployment
- HTTPS configuration
- Automatic deployment from GitHub
- Infrastructure troubleshooting
- Git version control

---

## Future Improvements

- User authentication
- Persistent shopping cart
- Checkout flow
- Administrative dashboard
- Product management panel
- Search functionality
- Mobile-first redesign

---

## Author

**Wellington Américo**

- LinkedIn: https://www.linkedin.com/in/wellington-am%C3%A9rico/
- GitHub: https://github.com/wellingtonAmerico

---

## License

This project is for educational and portfolio purposes.
