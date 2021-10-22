DROP DATABASE IF EXISTS pizza;

CREATE DATABASE pizza DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE pizza;

DROP USER IF EXISTS 'admpizza'@'localhost';

CREATE USER 'admpizza'@'localhost' IDENTIFIED BY '12345'; 

GRANT SELECT, INSERT, UPDATE, DELETE ON pizza.* TO 'admpizza'@'localhost';

CREATE TABLE client (
  code INTEGER AUTO_INCREMENT PRIMARY KEY,    
  name VARCHAR(50) NOT NULL, 
  email VARCHAR(50) NOT NULL,
  phone VARCHAR(14) NOT NULL,
  birthDate DATE NOT NULL,
  password VARCHAR(72) NOT NULL,
  state VARCHAR(30) NOT NULL,
  city VARCHAR(50) NOT NULL,
  address VARCHAR(100) NOT NULL,
  district VARCHAR(30) NOT NULL,
  howMeet BOOLEAN,
  pizzaPromo BOOLEAN,
  partnersPromo BOOLEAN,
  comments TEXT
);

CREATE TABLE sizePizza (
  code INTEGER AUTO_INCREMENT PRIMARY KEY,
  initials varchar(2),
  name VARCHAR(20),
  flavorsAmount tinyint,
  price real  
);

CREATE TABLE flavorPizza (
  code INTEGER AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20),
  ingredients VARCHAR(100),
  nameImage VARCHAR(50)  
);

CREATE TABLE orderPizza (
  code INTEGER AUTO_INCREMENT PRIMARY KEY,  
  codClient INTEGER,
  deliveryFee REAL,
  deliveryType tinyint(1),
  dateOrder DATETIME,
  status tinyint(1),
  FOREIGN KEY (codClient) REFERENCES client(code)
);

CREATE TABLE itemOrder (
  codItem INTEGER AUTO_INCREMENT PRIMARY KEY,
  codOrder INTEGER,
  codSize INTEGER,
  flavor1 INTEGER,
  flavor2 INTEGER,
  flavor3 INTEGER,
  flavor4 INTEGER,
  flavor5 INTEGER,
  edge INTEGER,
  value REAL,
  FOREIGN KEY (codOrder) REFERENCES orderPizza(code),
  FOREIGN KEY (codSize) REFERENCES sizePizza(code),
  FOREIGN KEY (flavor1) REFERENCES flavorPizza(code),
  FOREIGN KEY (flavor2) REFERENCES flavorPizza(code),
  FOREIGN KEY (flavor3) REFERENCES flavorPizza(code),
  FOREIGN KEY (flavor4) REFERENCES flavorPizza(code),
  FOREIGN KEY (flavor5) REFERENCES flavorPizza(code)
);

INSERT INTO flavorPizza values (NULL, "Chicken", "Sauce, chicken, cream cheese and mozzarella", "chicken.jpg");
INSERT INTO flavorPizza values (NULL, "Corn", "Sauce, corn and mozzarella", "corn.jpg");
INSERT INTO flavorPizza values (NULL, "Garlic and oil", "Sauce, garlic, oil and mozzarella", "garlic.jpg");
INSERT INTO flavorPizza values (NULL, "Margherita", "Sauce, mozzarella, basil, tomato", "margherita.jpg");
INSERT INTO flavorPizza values (NULL, "Mozzarella", "Sauce, mozzarella and oregano", "mozzarella.jpg");
INSERT INTO flavorPizza values (NULL, "Pepperoni", "Sauce, pepperoni and mozzarella", "pepperoni.jpg");
INSERT INTO flavorPizza values (NULL, "Stroganoff", "Sauce, stroganoff and potato chips", "stroganoff.jpg");
INSERT INTO flavorPizza values (NULL, "Tuna", "Sauce, tuna, onion and mozzarella", "tuna.jpg");
INSERT INTO flavorPizza values (NULL, "Vegetarian", "Sauce, arugula, sun-dried tomatoes and mozzarella", "vegetarian.jpg");

INSERT INTO sizePizza values (NULL, "es", "Extra Small", 1, 4);
INSERT INTO sizePizza values (NULL, "s", "Small", 2, 7);
INSERT INTO sizePizza values (NULL, "m", "Medium", 3, 10);
INSERT INTO sizePizza values (NULL, "l", "Large", 4, 13);
INSERT INTO sizePizza values (NULL, "el", "Extra Large", 5, 16);

/* inserindo clientes com senha cli123 */
INSERT INTO client VALUES (NULL, "Jane Doe", "janedoe@gmail.com", "49111111111", "2000-02-01", "$2y$10$L.AfIDkigTTNjCJL7i6wZ.288kMqc1Byz.kcfOVaPok2JfsN6wgtC", "SC", "Chapecó", "Rua Marajó, 222", "Bela Vista", 1, 0, 0, NULL);
INSERT INTO client VALUES (NULL, "Vanessa Giandra", "vanessagiandra@gmail.com", "49222222222", "1999-11-09", "$2y$10$L.AfIDkigTTNjCJL7i6wZ.288kMqc1Byz.kcfOVaPok2JfsN6wgtC", "PR", "Curitiba", "Avenida Visconde de Guarapuava, 1024", "Pinheirinho", 2, 1, 1, NULL); 
INSERT INTO client VALUES (NULL, "Chelsey Brown", "chelseybrown@gmail.com", "49333333333", "1980-07-25", "$2y$10$L.AfIDkigTTNjCJL7i6wZ.288kMqc1Byz.kcfOVaPok2JfsN6wgtC", "RS", "Porto Alegre", "Avenida Mauá, 986", "Centro", 3, 1, 0, NULL); 
INSERT INTO client VALUES (NULL, "Helena Cavalcanti", "helenacavalcanti@gmail.com", "49444444444", "1993-05-12", "$2y$10$L.AfIDkigTTNjCJL7i6wZ.288kMqc1Byz.kcfOVaPok2JfsN6wgtC", "SC", "Florianópolis", "Travessa A, 45", "José Mendes", 4, 0, 1, NULL);  

/* inserindo pedidos para a cliente Jane Doe */
INSERT INTO orderPizza VALUES (NULL, 1, 0, 2, "2021-10-20 03:59:03", 0);
INSERT INTO itemOrder VALUES (NULL, 1, 5, 4, 5, 6, 7, 8, 2, 16);
INSERT INTO itemOrder VALUES (NULL, 1, 1, 9, NULL, NULL, NULL, NULL, 4, 4);
INSERT INTO itemOrder VALUES (NULL, 1, 3, 1, 2, 3, NULL, NULL, 3, 10);
INSERT INTO itemOrder VALUES (NULL, 1, 2, 5, 9, NULL, NULL, NULL, 1, 7);

INSERT INTO orderPizza VALUES (NULL, 1, 0, 1, "2021-10-21 00:45:31", 0);
INSERT INTO itemOrder VALUES (NULL, 2, 1, 1, NULL, NULL, NULL, NULL, 4, 4);
INSERT INTO itemOrder VALUES (NULL, 2, 2, 8, NULL, NULL, NULL, NULL, 2, 7);

INSERT INTO orderPizza VALUES (NULL, 1, 0, 1, "2021-10-22 00:55:03", 0);
INSERT INTO itemOrder VALUES (NULL, 3, 1, 4, NULL, NULL, NULL, NULL, 1, 4);