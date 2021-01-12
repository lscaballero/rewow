CREATE DATABASE IF NOT EXISTS rewow;
USE rewow;

CREATE TABLE IF NOT EXISTS users(
id              int(255) auto_increment not null,
role            varchar(20),
name            varchar(100),
surname         varchar(200),
email           varchar(255),
password        varchar(255),
created_at      datetime,
updated_at      datetime,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, 'user', 'Luis', 'Caballero', 'luis@luis.com', 'pass', CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES(NULL, 'user', 'Alfredo', 'Vega', 'alfredo@alfredo.com', 'pass', CURTIME(), CURTIME(), NULL);

CREATE TABLE IF NOT EXISTS type_pet(
id              int(255) auto_increment not null,
type_pet_value  varchar(100),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_type_pet PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO type_pet VALUES(NULL, 'cat', CURTIME(), CURTIME() );
INSERT INTO type_pet VALUES(NULL, 'dog', CURTIME(), CURTIME() );
INSERT INTO type_pet VALUES(NULL, 'fish', CURTIME(), CURTIME() );
INSERT INTO type_pet VALUES(NULL, 'other', CURTIME(), CURTIME() );


CREATE TABLE IF NOT EXISTS size_pet(
id              int(255) auto_increment not null,
size_pet_value  varchar(100),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_size_pet PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO size_pet VALUES(NULL, 'small', CURTIME(), CURTIME() );
INSERT INTO size_pet VALUES(NULL, 'meidum', CURTIME(), CURTIME() );
INSERT INTO size_pet VALUES(NULL, 'big', CURTIME(), CURTIME() );


CREATE TABLE IF NOT EXISTS pets(
id              int(255) auto_increment not null,
user_id         int(255),
type_pet_id     int(255),
size_pet_id     int(255),
name            varchar(100),
race            varchar(100),
age             int(10),
description     text,
image           varchar(255),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_pets PRIMARY KEY(id),
CONSTRAINT fk_pets_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_pets_type_pet FOREIGN KEY(type_pet_id) REFERENCES type_pet(id),
CONSTRAINT fk_pets_size_pet FOREIGN KEY(size_pet_id) REFERENCES size_pet(id)
)ENGINE=InnoDb;

INSERT INTO pets VALUES(NULL, 1, 2, 2, 'Piccolo', 'Golden', '2', 'Perro muy verde', 'piccolo.jpg', CURTIME(), CURTIME());
INSERT INTO pets VALUES(NULL, 2, 2, 2, 'Trunks', 'Husky', '3', 'Perro con pelo blanco, a veces cambia a amarillo', 'trunks.jpg', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS list_vaccinations(
id              int(255) auto_increment not null,
pet_id          int(255),
number          int(255),
type            varchar(100),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_list_vaccinations PRIMARY KEY(id),
CONSTRAINT fk_list_vaccinations_pets FOREIGN KEY(pet_id) REFERENCES pets(id)
)ENGINE=InnoDb;

INSERT INTO list_vaccinations VALUES(NULL, 1, 1, 'rabia', CURTIME(), CURTIME());
INSERT INTO list_vaccinations VALUES(NULL, 2, 1, 'moquillo', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS category_appointments(
id                             int(255) auto_increment not null,
category_appointments_value    varchar(100),
created_at                     datetime,
updated_at                     datetime,
CONSTRAINT pk_category_appointments PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO category_appointments VALUES(NULL, 'Sevicios Médicos', CURTIME(), CURTIME());
INSERT INTO category_appointments VALUES(NULL, 'SPA', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS list_appointments(
id                             int(255) auto_increment not null,
category_appointments_id       int(255),
list_appointments_value        varchar(100),
created_at                     datetime,
updated_at                     datetime,
CONSTRAINT pk_list_appointments PRIMARY KEY(id),
CONSTRAINT fk_list_appointments_category_appointments FOREIGN KEY(category_appointments_id) REFERENCES category_appointments(id)
)ENGINE=InnoDb;

INSERT INTO list_appointments VALUES(NULL, 1, 'Cita Médica', CURTIME(), CURTIME());
INSERT INTO list_appointments VALUES(NULL, 1, 'Cita de Vacunación', CURTIME(), CURTIME());
INSERT INTO list_appointments VALUES(NULL, 1, 'Cita de Desparasitación', CURTIME(), CURTIME());
INSERT INTO list_appointments VALUES(NULL, 2, 'Cita de baño', CURTIME(), CURTIME());
INSERT INTO list_appointments VALUES(NULL, 2, 'Corte de Pelo', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS appointments(
id                      int(255) auto_increment not null,
pet_id                  int(255),
list_appointments_id    int(255),
value                   varchar(255),
schedule                date,
created_at              datetime,
updated_at              datetime,
CONSTRAINT pk_appointments PRIMARY KEY(id),
CONSTRAINT fk_appointments_pets FOREIGN KEY(pet_id) REFERENCES pets(id),
CONSTRAINT fk_appointments_list_appointments FOREIGN KEY(list_appointments_id) REFERENCES list_appointments(id)
)ENGINE=InnoDb;

INSERT INTO appointments VALUES(NULL, 1, 4, 'baño de todos los miercoles', CURDATE(), CURTIME(), CURTIME());
INSERT INTO appointments VALUES(NULL, 2, 1, 'revisión de mi bebe', CURDATE(), CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS category_products(
id                             int(255) auto_increment not null,
category_products_value        varchar(100),
created_at                     datetime,
updated_at                     datetime,
CONSTRAINT pk_category_products PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO category_products VALUES(NULL, 'juguetes', CURTIME(), CURTIME());
INSERT INTO category_products VALUES(NULL, 'ropa', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS products(
id                             int(255) auto_increment not null,
category_product_id            int(255),
product_value                  varchar(100),
created_at                     datetime,
updated_at                     datetime,
CONSTRAINT pk_products PRIMARY KEY(id),
CONSTRAINT fk_products_category_products FOREIGN KEY(category_product_id) REFERENCES category_products(id)
)ENGINE=InnoDb;

INSERT INTO products VALUES(NULL, 1, 'hueso', CURTIME(), CURTIME());
INSERT INTO products VALUES(NULL, 2, 'gorro azul', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS buy_products(
id                            int(255) auto_increment not null,
pet_id                        int(255),
product_id                    int(255),
number                        int(255),
created_at                    datetime,
updated_at                    datetime,
CONSTRAINT pk_buy_products PRIMARY KEY(id),
CONSTRAINT fk_buy_products_pets FOREIGN key(pet_id) REFERENCES pets(id),
CONSTRAINT fk_buy_products_products FOREIGN KEY(product_id) REFERENCES products(id)
)ENGINE=InnoDb;

INSERT INTO buy_products VALUES(NULL, 1, 1, 2, CURTIME(), CURTIME());
INSERT INTO buy_products VALUES(NULL, 1, 2, 1, CURTIME(), CURTIME());
INSERT INTO buy_products VALUES(NULL, 2, 1, 1, CURTIME(), CURTIME());
