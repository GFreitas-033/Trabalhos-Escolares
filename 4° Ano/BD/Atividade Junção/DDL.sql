CREATE DATABASE beleza_ltda;

USE beleza_ltda;

CREATE TABLE regiao(
	id_regiao int not null auto_increment,
    nome_regiao varchar(50) not null,
    Primary Key(id_regiao)
);

CREATE TABLE clientes(
	id_cliente int not null auto_increment,
    nome_cliente varchar(50) not null,
    Primary Key(id_cliente)
);

CREATE TABLE produtos(
	id_produto int not null auto_increment,
    nome_produto varchar(50) not null,
    preco decimal(6,2) not null,
    Primary Key(id_produto)
);

CREATE TABLE veiculos(
	id_veiculo int not null auto_increment,
    modelo varchar(50) not null,
    placa varchar(9) not null,
    Primary Key(id_veiculo)
);

CREATE TABLE pontos_estrategicos(
	id_pe int not null auto_increment,
    nome_pe varchar(50) not null,
    id_regiao int not null,
    Primary Key(id_pe),
    Foreign Key(id_regiao) References regiao(id_regiao)
);

CREATE TABLE vendedor(
	id_vendedor int not null auto_increment,
    nome_vendedor varchar(50) not null,
    id_regiao int not null,
    Primary Key(id_vendedor),
    Foreign Key(id_regiao) References regiao(id_regiao)
);

CREATE TABLE vendedor_has_veiculo(
	id_vend_vei int not null auto_increment,
	dt_vend_vei date not null,
    id_veiculo int not null,
	id_vendedor int not null,
    Primary Key(id_vend_vei),
    Foreign Key(id_veiculo) References veiculos(id_veiculo),
    Foreign Key(id_vendedor) References vendedor(id_vendedor)
);

CREATE TABLE nota_fiscal(
	id_nf int not null auto_increment,
	dt_Emisao date NOT NULL,
    id_vendedor int not null,
    id_cliente int not null,
    Primary Key(id_nf),
    Foreign Key(id_vendedor) References vendedor(id_vendedor),
    Foreign Key(id_cliente) References clientes(id_cliente)
);

CREATE TABLE produtos_has_nf(
	id_produto_nf int not null auto_increment,
    qtdVenda int not null,
    id_produto int not null,
    id_nf int not null,
    Primary Key(id_produto_nf),
    Foreign Key(id_produto) References produtos(id_produto),
    Foreign Key(id_nf) References nota_fiscal(id_nf)
);