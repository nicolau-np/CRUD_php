create database crud_php default character set utf8;

use crud_php;

create table
    pessoas (
        id bigint(22) primary key auto_increment,
        nome varchar(100),
        genero varchar(2),
        idade int(3)
    );