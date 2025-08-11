# DigitalGPT E-commerce MVP

## Requisitos
- PHP 8.x
- Composer
- MySQL 8

## Instalación
1. `composer install`
2. Copiar `.env.example` a `.env` y completar DB/MP/SMTP/APP_URL
3. Importar `database/migrations/001_create_core_tables.sql`
4. Verificar tabla `productos` con campos: id, nombre, descripcion, imagen_url, precio_venta, stock, categoria, marca, proveedor
5. Configurar `public/` como raíz pública del servidor

## Flujo de prueba
1. Agregar productos al carrito → `/cart/view.php`
2. Checkout → `/cart/checkout.php` → redirección a Mercado Pago
3. Simular pago → webhook → revisar `/checkout/success.php` y base de datos
4. Ver email de confirmación

## Variables `.env`
`DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`, `APP_URL`, `MP_ACCESS_TOKEN`, `MP_PUBLIC_KEY`, `SMTP_HOST`, `SMTP_USER`, `SMTP_PASS`, `SMTP_PORT`, `SMTP_SECURE`

Las cabeceras de seguridad y protección CSRF ya están incluidas.
