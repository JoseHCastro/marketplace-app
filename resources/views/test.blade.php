<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .hero {
            background-color: #f2f2f2;
            padding: 100px 0;
            text-align: center;
        }

        .hero h2 {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #555;
        }

        .featured-products {
            padding: 50px 0;
        }

        .product-list {
            display: flex;
            justify-content: space-between;
        }

        .product {
            flex: 0 1 30%;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .product img {
            width: 100%;
            height: auto;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Marketplace</h1>
            <nav>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Categorías</a></li>
                    <li><a href="#">Mi Cuenta</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h2>Bienvenido a nuestro Marketplace</h2>
            <p>Encuentra los mejores productos y servicios aquí.</p>
            <a href="#" class="btn">Explorar</a>
        </div>
    </section>

    <section class="featured-products">
        <div class="container">
            <h2>Productos Destacados</h2>
            <div class="product-list">
                <div class="product">
                    <img src="product1.jpg" alt="Product 1">
                    <h3>Producto 1</h3>
                    <p>$100</p>
                </div>
                <div class="product">
                    <img src="product2.jpg" alt="Product 2">
                    <h3>Producto 2</h3>
                    <p>$120</p>
                </div>
                <!-- Agregar más productos aquí -->
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Marketplace. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
