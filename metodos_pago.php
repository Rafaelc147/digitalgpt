<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital RP | Métodos de Pago</title>
    <link rel="icon" type="image/png" href="imagenes/logo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            line-height: 1.6;
        }

        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo h1 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
        }

        nav a:hover {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            transform: translateY(-2px);
        }

        .active {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white !important;
        }

        .search-container {
            display: flex;
            justify-content: center;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.95);
        }

        #search-bar {
            width: 50%;
            padding: 0.8rem 1.5rem;
            border-radius: 25px 0 0 25px;
            border: 1px solid #ddd;
            border-right: none;
            font-size: 1rem;
        }

        .search-btn {
            padding: 0.8rem 1.5rem;
            border-radius: 0 25px 25px 0;
            border: 1px solid #ddd;
            background: #f8f8f8;
            cursor: pointer;
            font-size: 1rem;
        }

        .payments {
            margin-top: 150px;
            padding: 4rem 2rem;
        }

        .payments-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: white;
        }

        .payments-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
        }

        .payment-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 2rem;
            width: 280px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .payment-card img {
            width: 120px;
            margin-bottom: 1rem;
        }

        .payment-card p {
            margin-bottom: 1rem;
        }

        .pay-btn {
            display: inline-block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
        }

        footer {
            background: #111;
            color: #ccc;
            padding: 4rem 2rem;
            text-align: center;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #667eea;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <a href="index.php" style="text-decoration: none; color: inherit;">
                    <h1>DIGITAL RP</h1>
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="componentes.php">Componentes</a></li>
                    <li><a href="audio.php">Audio</a></li>
                    <li><a href="cableado.php">Cableado</a></li>
                    <li><a href="gaming.php">Gaming</a></li>
                    <li><a href="electronica.php">Electrónica</a></li>
                    <li><a href="varios.php">Varios</a></li>
                    <li><a href="metodos_pago.php" class="active">Métodos de Pago</a></li>
                </ul>
            </nav>
        </div>
        <form class="search-container" action="buscar.php" method="GET">
            <input type="text" id="search-bar" name="q" placeholder="Buscar productos...">
            <button class="search-btn" type="submit">🔍</button>
        </form>
    </header>

    <section class="payments">
        <div class="payments-container">
            <h2 class="section-title">Métodos de Pago</h2>
            <div class="payments-grid">
                <div class="payment-card">
                    <img src="https://static.wompi.co/assets/images/logos/wompi-logo.png" alt="Wompi">
                    <p>Paga de forma rápida y segura usando Wompi.</p>
                    <a href="https://checkout.wompi.co" target="_blank" class="pay-btn">Pagar con Wompi</a>
                </div>
                <div class="payment-card">
                    <img src="https://www.pse.com.co/sites/pse/files/pse-logo.png" alt="PSE">
                    <p>Realiza tu pago desde tu banco con PSE.</p>
                    <a href="https://www.pse.com.co" target="_blank" class="pay-btn">Pagar con PSE</a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">Términos y Condiciones</a>
                <a href="#">Política de Privacidad</a>
                <a href="#">Contacto</a>
                <a href="#">Soporte</a>
            </div>
            <p>&copy; 2025 Digital RP - Todos los derechos reservados</p>
            <p>Visítanos en: <strong>digitalrp.store</strong></p>
            <p>📱 WhatsApp: +57 300 123 4567 | ✉️ info@digitalrp.store</p>
        </div>
    </footer>
</body>
</html>

