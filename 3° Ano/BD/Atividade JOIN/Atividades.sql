-- Atividade 1
SELECT nome, SUM(quantity) as total
FROM orders
INNER JOIN order_items
	ON orders.order_id = order_items.order_id
INNER JOIN customers
	ON orders.customer_id = customers.customer_id
GROUP BY nome
ORDER BY quantity DESC;
    
-- Atividade 2
SELECT product_name,SUM(quantity) AS total
FROM order_items
INNER JOIN products
	ON products.product_id = order_items.product_id
GROUP BY product_name
ORDER BY total DESC;

-- Atividade 3
SELECT nome
FROM orders
INNER JOIN customers
	ON customers.customer_id = orders.customer_id
GROUP BY nome
HAVING COUNT(*) > 5;

-- Atividade 4
SELECT category_name AS Categoria,AVG(price) AS media
FROM products
INNER JOIN product_category_mapping 
	ON products.product_id = product_category_mapping.product_id
INNER JOIN product_categories
	ON product_categories.category_id = product_category_mapping.category_id
GROUP BY category_name
ORDER BY AVG(price) DESC;

-- Atividade 5
SELECT product_name, SUM(quantity) AS total
FROM products
INNER JOIN product_category_mapping
    ON products.product_id = product_category_mapping.product_id
INNER JOIN product_categories
    ON product_category_mapping.category_id = product_categories.category_id
INNER JOIN order_items
    ON products.product_id = order_items.product_id
INNER JOIN (
    SELECT product_category_mapping.category_id,SUM(order_items.quantity) AS total_soma
    FROM order_items
    INNER JOIN products 
        ON order_items.product_id = products.product_id
    INNER JOIN product_category_mapping 
        ON products.product_id = product_category_mapping.product_id
    GROUP BY product_category_mapping.category_id
    HAVING SUM(order_items.quantity) > 500
) AS total_categoria
    ON product_category_mapping.category_id = total_categoria.category_id
GROUP BY products.product_name, product_categories.category_name
ORDER BY product_categories.category_name, products.product_name;
