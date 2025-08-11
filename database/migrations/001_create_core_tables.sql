CREATE TABLE pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  nombre VARCHAR(255) NOT NULL,
  subtotal DECIMAL(12,2) NOT NULL,
  descuentos DECIMAL(12,2) NOT NULL DEFAULT 0,
  envio DECIMAL(12,2) NOT NULL DEFAULT 0,
  impuestos DECIMAL(12,2) NOT NULL DEFAULT 0,
  total DECIMAL(12,2) NOT NULL,
  moneda CHAR(3) NOT NULL DEFAULT 'COP',
  estado ENUM('pending','paid','canceled','refunded','chargeback') NOT NULL DEFAULT 'pending',
  canal VARCHAR(16) DEFAULT 'web',
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE detalle_pedido (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pedido_id INT NOT NULL,
  producto_id INT NOT NULL,
  nombre_snapshot VARCHAR(255) NOT NULL,
  precio_unitario DECIMAL(12,2) NOT NULL,
  cantidad INT NOT NULL,
  subtotal DECIMAL(12,2) NOT NULL,
  impuestos DECIMAL(12,2) NOT NULL DEFAULT 0,
  total DECIMAL(12,2) NOT NULL,
  FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE pagos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pedido_id INT NOT NULL,
  provider VARCHAR(32) NOT NULL DEFAULT 'mercadopago',
  provider_payment_id VARCHAR(64) UNIQUE,
  status ENUM('approved','in_process','rejected','refunded','charged_back') NOT NULL DEFAULT 'in_process',
  monto DECIMAL(12,2) NOT NULL,
  moneda CHAR(3) NOT NULL DEFAULT 'COP',
  raw_payload JSON,
  reconciled_at DATETIME NULL,
  created_at DATETIME NOT NULL,
  FOREIGN KEY (pedido_id) REFERENCES pedidos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE cupones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  codigo VARCHAR(64) UNIQUE NOT NULL,
  tipo ENUM('percent','fixed') NOT NULL,
  valor DECIMAL(12,2) NOT NULL,
  minimo_compra DECIMAL(12,2) DEFAULT 0,
  max_uso_total INT NULL,
  vence_at DATETIME NULL,
  activo TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
