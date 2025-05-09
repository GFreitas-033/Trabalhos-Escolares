CREATE TABLE Endereco(
  idEndereco INT NOT NULL AUTO_INCREMENT,
  estado VARCHAR(255) NOT NULL,
  cidade VARCHAR(255) NOT NULL,
  bairro VARCHAR(255) NOT NULL,
  rua VARCHAR(255) NOT NULL,
  numero VARCHAR(255) NOT NULL,
  PRIMARY KEY (idEndereco)
) ENGINE = InnoDB;

CREATE TABLE Clientes(
  idClientes INT NOT NULL AUTO_INCREMENT,
  nome_clientes VARCHAR(255) NOT NULL,
  email_clientes VARCHAR(255) NOT NULL,
  senha_clientes VARCHAR(45) NOT NULL,
  Endereco_idEndereco INT NOT NULL,
  PRIMARY KEY (idClientes),
  FOREIGN KEY (Endereco_idEndereco) REFERENCES Endereco(idEndereco)
) ENGINE = InnoDB;

CREATE TABLE Administracao(
  idAdministracao INT NOT NULL,
  nome_adm VARCHAR(255) NOT NULL,
  email_adm VARCHAR(255) NOT NULL,
  senha_adm VARCHAR(255) NOT NULL,
  PRIMARY KEY (idAdministracao)
) ENGINE = InnoDB;

CREATE TABLE Produtos(
  idProdutos INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  descricao LONGTEXT NOT NULL,
  preco DECIMAL(6,2) NOT NULL,
  categoria VARCHAR(255) NOT NULL,
  qtd_estoque VARCHAR(255) NOT NULL,
  Administracao_idAdministracao INT NOT NULL,
  PRIMARY KEY (idProdutos),
  FOREIGN KEY (Administracao_idAdministracao) REFERENCES Administracao(idAdministracao)
) ENGINE = InnoDB;

CREATE TABLE Pedidos(
  idPedidos INT NOT NULL AUTO_INCREMENT,
  status_pedidos VARCHAR(255) NOT NULL,
  dt_pedidos DATE NOT NULL,
  dt_ultima_update DATE NULL,
  Clientes_idClientes INT NOT NULL,
  Administracao_idAdministracao INT NOT NULL,
  PRIMARY KEY (idPedidos),
  FOREIGN KEY (Clientes_idClientes) REFERENCES Clientes (idClientes),
  FOREIGN KEY (Administracao_idAdministracao) REFERENCES Administracao (idAdministracao)
) ENGINE = InnoDB;

CREATE TABLE Pagamento (
  idPagamento INT NOT NULL,
  tipo_pagamento VARCHAR(255) NOT NULL,
  status_pagamento VARCHAR(45) NOT NULL,
  Pedidos_idPedidos INT NOT NULL,
  Administracao_idAdministracao INT NOT NULL,
  PRIMARY KEY (idPagamento),
  FOREIGN KEY (Pedidos_idPedidos) REFERENCES Pedidos (idPedidos),
  FOREIGN KEY (Administracao_idAdministracao) REFERENCES Administracao (idAdministracao)
) ENGINE = InnoDB;

CREATE TABLE pedidos_has_produtos (
  Pedidos_idPedidos INT NOT NULL,
  Produtos_idProdutos INT NOT NULL,
  FOREIGN KEY (Pedidos_idPedidos) REFERENCES Pedidos (idPedidos),
  FOREIGN KEY (Produtos_idProdutos) REFERENCES Produtos (idProdutos)
) ENGINE = InnoDB;