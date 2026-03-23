# 🛒 E-commerce PHP + MySQL

Aplicação de e-commerce desenvolvida com PHP e MySQL, com deploy em produção utilizando Railway e containerização com Docker.

🔗 **Live Demo:**  
https://e-commerce-production-4b87.up.railway.app

---

## 🧩 Arquitetura
Usuário

↓

Railway (HTTP)

↓

PHP Server (Docker)

↓

MySQL Service (Railway)

---

## 🚀 Funcionalidades

- Listagem dinâmica de produtos via banco de dados
- Página de detalhes do produto
- Organização por categorias
- Interface responsiva
- Integração completa com MySQL

---

## 🛠️ Stack utilizada

**Backend**
- PHP 8
- MySQL

**Frontend**
- HTML5
- CSS3
- JavaScript

**Infraestrutura**
- Docker
- Railway (deploy)
- Variáveis de ambiente (segurança)

---

## 🔐 Conexão com banco (produção)

A aplicação utiliza variável de ambiente para conexão segura com o banco:

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

✔ Evita hardcode de credenciais
✔ Padrão utilizado em ambientes reais

---

🧪 Estratégia de testes

Durante o desenvolvimento foram criados endpoints para validar cada camada:

ping.html → valida servidor web
health.php → valida execução PHP
index.php → valida aplicação completa + banco

---

🐳 Deploy com Docker

A aplicação foi containerizada utilizando PHP CLI server:

FROM php:8.2-cli

WORKDIR /app

COPY . .

RUN docker-php-ext-install mysqli

CMD ["php", "-S", "0.0.0.0:8080"]

---

🧠 Principais aprendizados
Deploy real de aplicação web
Separação entre aplicação e banco de dados
Uso de variáveis de ambiente em produção
Debug de infraestrutura (logs de build/runtime)
Resolução de conflitos de servidor (Apache → PHP CLI)
Integração completa PHP + MySQL

---

📦 Estrutura do projeto

/e-commerce
│
├── index.php
├── produto.php
├── conecta.php
│
├── /css
├── /img
├── /js
├── /fonts
│
├── Dockerfile
└── dados.sql

---

⚠️ Observações
Projeto desenvolvido com foco em aprendizado prático
Algumas melhorias futuras:
autenticação de usuários
carrinho persistente
painel administrativo

---

👨‍💻 Autor

Wellington Américo
https://www.linkedin.com/in/wellington-am%C3%A9rico/