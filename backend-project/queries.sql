CREATE DATABASE mini_store;
use mini_store;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255),
    price Decimal(12,2)
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    CONSTRAINT FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (product_name,price)
VALUES
('laptop' , 200.88), ('phone' , 99.11), ('keyboard', 20.33);

INSERT INTO orders (product_id)
VALUES
(1), (2), (1), (2), (2), (1), (1), (1), (2), (1), (2), (1), (1), (1), (1), (2), (1), (1), (1), (1), (1), (1), (1), (1), (1),(3);