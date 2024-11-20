create table departamento(
	id_departamento int not null,
    nome varchar(15) not null,
    uf char(2) not null,
    Primary Key(id_departamento)
);

create table if not exists empregado(
	id_emprgado int not null,
    primeiro_nome varchar(20) not null,
    familia_nome varchar(20) not null,
    salario float null default null,
    id_departamento int null,
    Primary Key(id_emprgado),
    Constraint fk_empregado_departamento
    Foreign Key(id_departamento) references departamento(id_departamento)
);