INSERT INTO customers(customer_id, nome, email)
VALUES 
(1, 'Alice Johnson', 'alice.johnson@example.com'),
(2, 'Bob Smith', 'bob.smith@example.com'),
(3, 'Carol White', 'carol.white@example.com');
SELECT * FROM customers;

INSERT INTO products(product_id, product_name, price)
VALUES 
(1, 'Laptop', 1200.00),
(2, 'Smartphone', 800.00),
(3, 'Headphones', 150.00);
SELECT * FROM products;

INSERT INTO orders(order_id, customer_id, order_date)
VALUES 
(1, 1, '2024-07-01'),
(2, 2, '2024-07-02'),
(3, 3, '2024-07-03');
SELECT * FROM orders;

INSERT INTO order_items(order_item_id, order_id, product_id, quantity)
VALUES 
(1, 1, 1, 1),
(2, 1, 3, 2),
(3, 2, 2, 1),
(4, 3, 1, 1);
SELECT * FROM order_items;

INSERT INTO product_categories(category_id, category_name)
VALUES
(1, 'Electronics'),
(2, 'Accessories');
SELECT * FROM product_categories;

INSERT INTO product_category_mapping(product_id, category_id)
VALUES
(1, 1),
(2, 1),
(3, 2);
SELECT * FROM product_category_mapping;