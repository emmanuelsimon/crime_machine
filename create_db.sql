/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  manu
 * Created: 17 oct. 2016
 */

create database criminalite;

use criminalite;

create table departement (
    id_dep int not null auto_increment primary key,
    label_dep varchar(100) not null,
    num_dep varchar(3) not null
)engine=innodb default character set=utf8;

create table type_infraction(
    id_type int not null primary key,
    label_type_infra varchar(200) not null,
    unite_id int not null
)engine=innodb default character set=utf8;

create table unite_compte(
    id_unite int not null auto_increment primary key,
    label_unite varchar(100) not null
)engine=innodb default character set=utf8;

create table ensemble_infraction(
    dep_id int not null,
    type_id int not null,
    valeur_intra int not null,
    date_infra date not null
)engine=innodb default character set=utf8;

alter table ensemble_infraction
    add constraint iddep foreign key(dep_id) references departement(id_dep),
    add constraint idinfra foreign key(type_id) references type_infraction(id_type),
    add constraint primary key(dep_id, type_id);

alter table type_infraction
    add constraint iduc foreign key(unite_id) references unite_compte(id_unite);

create table evenement(
    id_eve int auto_increment not null primary key,
    type_eve_id int not null,
    label_eve varchar(200),
    detail varchar(5000),
    date_debut date,
    date_fin date not null
)engine=innodb default character set=utf8;

create table type_evenement(
    id_type_eve int auto_increment not null primary key,
    label_type_eve varchar(200)
)engine=innodb default character set=utf8;

alter table evenement
    add constraint typeeven foreign key(type_eve_id) references type_evenement(id_type_eve);