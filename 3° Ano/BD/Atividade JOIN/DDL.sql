CREATE DATABASE atividade;

use atividade;

CREATE TABLE customers(
	customer_id int not null,
    nome varchar(255) not null,
    email varchar(255) not null,
    PRIMARY KEY(customer_id)
);

CREATE TABLE products(
	product_id int not null,
    product_name varchar(255) not null,
    price decimal(10 ,2) not null,
    PRIMARY KEY(product_id)
);

CREATE TABLE orders(
	order_id int not null,
    customer_id int not null,
    order_date date not null,
    PRIMARY KEY(order_id),
    FOREIGN KEY(customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE order_items(
	order_item_id int not null,
    order_id int not null,
    product_id int not null,
    quantity int not null,
    PRIMARY KEY(order_item_id),
    FOREIGN KEY(order_id) REFERENCES orders(order_id),
    FOREIGN KEY(product_id) REFERENCES products(product_id) 
);

CREATE TABLE product_categories(
	category_id int not null,
    category_name varchar(255) not null,
    PRIMARY KEY(category_id)
);

CREATE TABLE product_category_mapping(
	product_id int not null,
    category_id int not null,
    PRIMARY KEY(product_id, category_id),
    FOREIGN KEY(product_id) REFERENCES products(product_id),
    FOREIGN KEY(category_id) REFERENCES product_categories(category_id)
);