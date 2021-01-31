CREATE DATABASE IF NOT EXISTS php_mvc;
USE php_mvc;
CREATE TABLE IF NOT EXISTS mvc_fruit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    category ENUM('Ácida', 'Semiácida', 'Dulce', 'Neutra') NOT NULL,
    image VARCHAR(100)
) ENGINE InnoDB;
INSERT INTO mvc_fruit (name, category, image)
VALUES ('Papaya', 'Dulce', 'papaya.jpg'),
    ('Fresa', 'Semiácida', 'fresa.jpg'),
    ('Manzana', 'Ácida', 'manzana.jpg'),
    ('Aguacate', 'Neutra', 'aguacate.jpg');