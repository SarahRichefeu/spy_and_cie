-- Active: 1677751582920@@127.0.0.1@3306@spy_and_cie

CREATE TABLE admin (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    creation_date DATETIME NOT NULL
) engine=InnoDB;

CREATE TABLE country (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
) engine=InnoDB;

CREATE TABLE mission_status (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
) engine=InnoDB;

CREATE TABLE mission_type (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
) engine=InnoDB;

CREATE TABLE mission (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    code_name VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    speciality VARCHAR(100) NOT NULL,
    country_id INT NOT NULL,
    mission_status_id INT NOT NULL,
    mission_type_id INT NOT NULL,
    FOREIGN KEY (country_id) REFERENCES country(id),
    FOREIGN KEY (mission_status_id) REFERENCES mission_status(id),
    FOREIGN KEY (mission_type_id) REFERENCES mission_type(id)
) engine=InnoDB;

CREATE TABLE stash (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    adress VARCHAR(255) NOT NULL,
    type VARCHAR(100),
    country_id INT NOT NULL,
    mission_id INT NOT NULL,
    FOREIGN KEY (country_id) REFERENCES country(id),
    FOREIGN KEY (mission_id) REFERENCES mission(id)
) engine=InnoDB;

CREATE TABLE target (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    code_name VARCHAR(200),
    nationality_id INT NOT NULL,
    mission_id INT NOT NULL,
    Foreign Key (nationality_id) REFERENCES country(id),
    Foreign Key (mission_id) REFERENCES mission(id)
) engine=InnoDB;

CREATE TABLE contact (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    code_name VARCHAR(200) NOT NULL,
    birthdate DATE NOT NULL,
    nationality_id INT NOT NULL,
    mission_id INT NULL,
    FOREIGN KEY (nationality_id) REFERENCES country(id),
    FOREIGN KEY (mission_id) REFERENCES mission(id)
) engine=InnoDB;

CREATE TABLE agent (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    bitrhdate DATE NOT NULL,
    code_name VARCHAR(200) NOT NULL,
    nationality_id INT NOT NULL,
    mission_id INT NULL,
    FOREIGN KEY (nationality_id) REFERENCES country(id),
    FOREIGN KEY (mission_id) REFERENCES mission(id)
) engine=InnoDB; 

CREATE TABLE speciality (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    agent_id INT NOT NULL,
    FOREIGN KEY (agent_id) REFERENCES agent(id)
) engine=InnoDB;


-- Data insertion --

INSERT INTO admin (lastname, firstname, email, password, creation_date) VALUES 
('Sharplin', 'Mélia', 'esharplin0@msn.com', '$2y$10$lcLkLnaO35j46SYDZ15YGOH.uyt2HRl1LuJoDPK4hxiWjarCon6iq', '2022-11-26');

INSERT INTO country (name) VALUES
("Peru"),
("Austria"),
("Pakistan"),
("Sweden"),
("United States"),
("Chile"),
("New Zealand"),
("Ukraine"),
("India");

INSERT INTO mission_status (name) VALUES
("In progress"),
("Completed"),
("Canceled");

INSERT INTO mission_type (name) VALUES
("Assassination"),
("Kidnapping"),
("Espionage"),
("Sabotage"),
("Rescue"),
("Reconnaissance"),
("Surveillance");

INSERT INTO mission (name, description, code_name, start_date, end_date, speciality, country_id, mission_status_id, mission_type_id) VALUES
("Prince rescue", "The Prince of Austria has been kidnapped by a non known organization at the end of February 2023.", "Glitter Operation", "2023-02-27", "2024-05-27", "Hunting", 2, 1, 5),
("Sex trafficker disposal", "Assassination of the newly found head of a skin trade ring in Sweden", "Dabi Dubi", "2020-04-16", "2022-07-16", "Invisible", 4, 2, 1);

INSERT INTO stash (adress, type, country_id, mission_id) VALUES
("Oskar Kokoschka-Platz 2, 1010 Wien", "University", 2, 1),
("AB Liljeholmens Stadshotell, Nybohovsbacken 50, 117 64 Stockholm", "Hotel", 4, 2);

INSERT INTO target (lastname, firstname, birthdate, code_name, nationality_id, mission_id) VALUES 
("Windsor", "Prince", "2000-01-01", "Prince", 2, 1),
("Khan", "Sajid", "1970-01-01", "Sajid", 3, 2);

INSERT INTO contact (lastname, firstname, code_name, birthdate, nationality_id, mission_id) VALUES
("Smith", "John", "John", "1980-01-01", 5, 1),
("Doe", "Jane", "Jane", "1980-01-01", 5, 2),
("Doe", "John", "John", "1980-01-01", 5, null);

INSERT INTO agent (lastname, firstname, bitrhdate, code_name, nationality_id, mission_id) VALUES
("Snyder","Delilah","2022-10-02","TaShya Wilcox",8, null),
("Bridges","Lisandra","2022-12-10","Brady Owen",9, null),
("Cross","Paul","2022-05-12","Wynne Cortez",4, 1),
("Villarreal","Leah","2022-08-01","May Watson",8, null),
("Galloway","Libby","2022-06-14","Barbara Trevino",4, 1),
("Durham","Carter","2022-08-01","Cheyenne Huffman",5, null),
("Warner","Rosalyn","2023-04-08","Imogene Fischer",8, null),
("Gross","Jaden","2023-03-23","Xavier Welch",2, null),
("Dean","Arthur","2022-10-13","Amena Carroll",8, null);

INSERT INTO speciality (name, agent_id) VALUES
("Hacking", 7), 
("Escaping", 4), 
("Swimming", 8),
("Contorsion", 1),
("Multilingual", 2),
("Hunting", 3),
("Invisible", 5),
("Martial arts", 6),
("Poison", 9),
("Driving", 5),
("Torture", 2),
("Seduction", 4);

INSERT INTO contact (lastname, firstname, code_name, birthdate, nationality_id, mission_id) VALUES
("Richmond","Rachel","Raven Reed","2022-03-22",4, null),
("Hughes","Julie","Tamara Martin","2023-07-15",6, 1),
("Eaton","Rebekah","Micah Dejesus","2023-05-22",9, null),
("Clements","Mannix","Michael Henry","2022-12-21",5, null),
("Randolph","Leroy","William Alvarez","2022-12-20",8, null),
("Pollard","Griffin","Isadora Vasquez","2022-09-16",2, null),
("Dunlap","Kelsey","Jesse Carney","2022-08-09",4, null),
("Cooley","Isaac","Deacon Rowland","2022-08-18",3, null);