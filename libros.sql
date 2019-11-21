CREATE database biblioteca
	CREATE TABLE libros (
    codigo_libro varchar(10) primary key,
    nombre_libro varchar(30) not null,
    autor_libro varchar(30) not null,
    tipo_de_libro varchar(30) not null,
    estado_del_libro varchar(12) not null
		)

	CREATE TABLE personal (
    id int (10) primary key,
    nombre varchar(30) not null,
    apellido varchar(30) not null,
    usuario varchar(10) not null,
    password varchar(10) not null,
    tipo_de_usuario varchar(15) not null
		)
