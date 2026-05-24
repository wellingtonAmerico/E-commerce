# E-commerce PHP + MySQL

Full stack e-commerce application developed with PHP and MySQL, deployed in production using Railway and Docker.

The project was created to practice backend development, database integration, containerization and production deployment.

---

## Deploy

https://e-commerce-production-4b87.up.railway.app

---

## Technologies Used

### Backend
- PHP 8
- MySQL

### Frontend
- HTML5
- CSS3
- JavaScript

### Infrastructure
- Docker
- Railway
- Environment Variables

---

## Architecture

```text
User
  ↓
Railway HTTP
  ↓
PHP Server (Docker)
  ↓
MySQL Database
```

---

## Features

- Dynamic product listing
- Product details page
- MySQL database integration
- Responsive interface
- Production deployment with Docker

---

## Environment Variables

The application uses environment variables for secure database connection:

```php
$url = getenv("MYSQL_URL");

$db = parse_url($url);

$conexao = mysqli_connect(
    $db["host"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
);
```

---

## Testing Strategy

During development, isolated endpoints were created to validate each application layer:

- ping.html → web server validation
- health.php → PHP execution validation
- index.php → full application + database validation

---

## Docker Deployment

```dockerfile
FROM php:8.2-cli

WORKDIR /app

COPY . .

RUN docker-php-ext-install mysqli

CMD ["php", "-S", "0.0.0.0:8080"]
```

---

## Project Structure

```bash
e-commerce/
│
├── index.php
├── produto.php
├── conecta.php
│
├── css/
├── img/
├── js/
├── fonts/
│
├── Dockerfile
└── dados.sql
```

---

## What Was Practiced

- Full stack web development
- PHP and MySQL integration
- Production deployment
- Docker containerization
- Environment variables
- Infrastructure debugging
- Build and runtime logs analysis
- Git version control

---

## Future Improvements

- User authentication
- Persistent shopping cart
- Administrative dashboard
- Product management panel

---

## Author

Wellington Américo

LinkedIn:
https://www.linkedin.com/in/wellington-am%C3%A9rico/

GitHub:
https://github.com/wellingtonAmerico
