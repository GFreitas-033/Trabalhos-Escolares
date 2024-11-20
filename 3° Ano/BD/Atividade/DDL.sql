create database loja;
drop database loja;

create table produto(
	id_produto int not null auto_increment,
	nome_produto varchar(255) not null,
	descricao_produto text not null,
	valor_produto decimal(10,2) not null,
    categoria enum('Vestiário', 'Calçados', 'Acessórios'),
    Primary Key(id_produto)
) ENGINE=InnoDB;

create table cliente(
	id_cliente int not null auto_increment,
    nome_cliente varchar(255) not null,
    email_cliente varchar(255) not null,
    cidade_cliente varchar(255) not null,
    Primary Key(id_cliente)
) ENGINE=InnoDB;

create table venda(
	id_venda int not null auto_increment,
    dt_venda date not null,
    valor_total decimal(10,2) not null,
    id_cliente int not null,
    id_produto int not null,
    Primary Key(id_venda),
    Foreign Key(id_cliente) references cliente(id_cliente),
    Foreign Key(id_produto) references produto(id_produto)
) ENGINE=InnoDB;