drop database if exists cnc;
create database cnc;
use cnc;

create table produit(
    id int auto_increment primary key,
    image varchar(255),
    nom varchar(255),
    description varchar(255),
    prix float,
    mp3 varchar(255)
);

create table information(
    id int auto_increment primary key,
    adresse varchar(255) not null,
    telephone varchar(255) not null,
    horaire varchar(255) not null
);

INSERT INTO information (adresse, telephone, horaire) VALUES 
(
 '23 rue de la musique, 11000 Carcassonne','06.06.06.06.06.', 'Du Lundi au Vendredi, de 09:00 à 17:00'
);

create table commande(
    id int auto_increment primary key,
    id_client int,
    etat enum('panier', 'validée', 'prete', 'collectée') default 'panier'
);

create table produit_commande(
    id_commande int,
    id_produit int,
    primary key (id_commande, id_produit)
);

create table client(
    id int auto_increment primary key,
    mail varchar(255),
    nom varchar(255),
    tel varchar(255)
);

create table admin_info(
    id int auto_increment primary key,
    name varchar(255),
    password varchar(255)
);

drop user if exists toto@'127.0.0.1';
create user toto@'127.0.0.1' identified by 'salut';
grant all privileges on cnc.* to toto@'127.0.0.1';
