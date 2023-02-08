create table user(
    idUser int primary key not null auto_increment,
    username varchar(30),
    mail varchar(60),
    password varchar(60),
    isAdmin int default 0
);

insert into user values (null,'Admin','admin@admin.com','root',1);

create table categorie(
    idCat int primary key not null auto_increment,
    nom varchar(30),
    etat int
);
insert into categorie values (null,'sport',10);
insert into categorie values (null,'vetement',10);