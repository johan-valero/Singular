drop database db_singular;
create database db_singular;
use db_singular;

create table animals(
id_animal int primary key auto_increment,
name_animal varchar(15) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table accomodations(
id_accomodation int primary key auto_increment,
name_accomodation varchar(60) not null,
description_accomodation text not null,
icon_accomodation varchar(500) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table categories(
id_category int primary key auto_increment,
name_category varchar(30) not null,
description_category text null,
img_category varchar(500) null,
icon_category varchar(100) null
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table contact(
  id_contact int primary key auto_increment, 
  name_contact varchar(20) not null,
  email_contact varchar(100) not null,
  phone_contact varchar(20) not null,
  subject_contact varchar(30) not null,
  message_contact text not null,
  date_contact datetime not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table partners(
  id_partner int primary key auto_increment,
  name_partner varchar(100) not null,
  link_partner varchar(200) not null,
  img_partner varchar(500) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table beddings(
	id_bedding int primary key auto_increment,
    name_bedding varchar(50) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table rooms(
  id_room int primary key auto_increment,
  name_room varchar(100) not null,
  id_category int,
  foreign key(id_category) references categories(id_category),
  id_animal int,
  foreign key (id_animal) references animals(id_animal),
  description_room text not null,
  price_room double not null,
  img_room varchar(500) not null,
  img2_room varchar(500) default null,
  img3_room varchar(500) default null,
  slug varchar(250) not null,
  id_bedding int,
  foreign key(id_bedding) references beddings(id_bedding),
  persons int not null default 1,
  address_room varchar(500) not null,
  zip_room varchar(20) not null,
  city_room varchar(50) not null,
  date_open date not null,
  date_close date not null,
  hour_checkin time not null,
  hour_checkout time not null,
  area_room bigint not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table avoir(
	id_room int,
    id_accomodation int,
    primary key(id_room, id_accomodation),
    foreign key (id_room) references rooms(id_room),
    foreign key(id_accomodation) references accomodations(id_accomodation)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE socials (
  id_social int primary key auto_increment,
  name varchar(30) not null,
  value varchar(2048) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE sliders (
  id_slider int primary key auto_increment,
  title varchar(100) not null,
  message varchar(500) not null,
  link varchar(200) not null,
  img varchar(500) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE users (
  id_user int primary key auto_increment,
  url_user varchar(60) not null,
  name_user varchar(100) not null,
  firstname_user varchar(100) not null,
  email_user varchar(100) not null,
  phone_user varchar(10) not null,
  password_user varchar(64) not null,
  birthday_user date not null,
  date_user datetime not null,
  rank_user varchar(10) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE booking (
  id_booking bigint primary key auto_increment,
  name_user varchar(30) not null,
  firstname_user varchar(30) not null,
  email_user varchar(150) not null,
  birthday date not null,
  date_booking datetime not null,
  phone_user varchar(20) not null,
  check_in date not null,
  check_out date not null,
  persons int not null,
  days int not null,
  id_room int,
  foreign key(id_room) references rooms(id_room),
  total_booking double not null,
  id_user int,
  foreign key(id_user) references users(id_user),
  demand text default null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
