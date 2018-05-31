/*
    Script used to create the tables that will be used in the beer recipe website
    Author: Jay Johnston
    Created: 15-03-2018
*/

DROP DATABASE IF EXISTS accla;
CREATE DATABASE IF NOT EXISTS accla;
CREATE USER IF NOT EXISTS 'acclaAdmin'@'localhost' IDENTIFIED BY 'hGlTogXK05WcmXAN';
GRANT ALL PRIVILEGES ON * . * TO 'acclaAdmin'@'localhost';
USE accla;

/*
    A simple users system to begin with
*/
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

/*
    Create Users For Test Case

    Email               Password    Level   Name    
    Admin@accla.com     admin       Admin   Admin       
    jack@accla.com      jack        Author  Jack        
    tom@accla.com       tom         Author  Tom         

*/
INSERT INTO users (user_name, email, password, role, created, modified)
VALUES
    ('Admin', 'admin@accla.com', '$2y$10$R9AGThHy2FjOzxweoVcVUuVI88m5hktj/.nSG1ljNbdXVMvJ7T1AW', 'Admin', NOW(), NOW()),
    ('Jack', 'Jack@accla.com', '$2y$10$SHV/jKrsni6Tyy2Ll2IrJOdAOZAKrbMGAtbrF7kh/Yx1YK.XPAVom', 'Author', NOW(), NOW()),
    ('Tom', 'Tom@accla.com', '$2y$10$wQv/hsnk4qFpNas02kGf0elSPYXyU5Ec6fn18ht3YDbtNdzO3bHL6', 'Author', NOW(), NOW());

/*
    Create Hops Table
*/
CREATE TABLE hops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hop_name VARCHAR(255) NOT NULL,
    type ENUM('Pellet', 'Leaf'),
    alpha_acid DECIMAL(4,2)
);

/*
    Insert Sample Hops
*/
INSERT INTO hops (hop_name, type, alpha_acid)
VALUES
    ('Cascade', 'Pellet', 8.40),
    ('Galaxy', 'Pellet', 16.50),
    ('Pride of Ringwood', 'Leaf', 9.10),
    ('Vic Secret', 'Pellet', 15.50);

/*
    Create Hops Table
*/
CREATE TABLE malt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    malt_name VARCHAR(255) NOT NULL,
    type ENUM('Grain', 'Extract'),
    specific_gravity DECIMAL(4,3)
);

/*
    Insert Sample Malt
*/
INSERT INTO malt (malt_name, type, specific_gravity)
VALUES
    ('Pale', 'Grain', 1.038),
    ('Vienna', 'Grain', 1.037),
    ('Pilser', 'Extract', 1.037),
    ('Munich', 'Grain', 1.038),
    ('Super fancy 1', 'Grain', 1.038);

/*
    Create Yeast Table
*/
CREATE TABLE yeast (
    id INT AUTO_INCREMENT PRIMARY KEY,
    yeast_name VARCHAR(255) NOT NULL,
    type ENUM('Lager', 'Ale'),
    attenuation_min DECIMAL(4,2),
    attenuation_max DECIMAL(4,2),
    temperature_min DECIMAL(3,1),
    temperature_max DECIMAL(3,1)
);

/*
    Create Sample Yeast
*/
INSERT INTO yeast (yeast_name, type, attenuation_min, attenuation_max, temperature_min, temperature_max)
VALUES
    ('Australian Ale', 'Ale', 70.00, 75.00, 18.3, 21.1),
    ('Belgian Ale', 'Ale', 78.00, 85.00, 20.0, 25.6),
    ('California Ale', 'Ale', 73.00, 80.00, 20.0, 22.8),
    ('German Lager', 'Lager', 74.00, 79.00, 10.0, 12.8),
    ('German Bock Lager', 'Lager', 70.00, 76.00, 8.9, 12.8),
    ('Mexican Lager', 'Lager', 70.00, 78.00, 10.0, 12.8);

/*
    Create Style Table
*/
CREATE TABLE style (
    id INT AUTO_INCREMENT PRIMARY KEY,
    style_name VARCHAR(255) NOT NULL,
    type ENUM('Lager', 'Ale')
);

/*
    Create Sample Styles
*/
INSERT INTO style (style_name, type)
VALUES
    ("Pale Ale", "Ale"),
    ("Extra Pale", "Lager");;

/*
    Create Recipe Table
*/
CREATE TABLE recipe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_name VARCHAR(255) NOT NULL,
    batch_size DECIMAL(5,1),
    user_id INT NOT NULL,
    FOREIGN KEY user_key(user_id) REFERENCES users(id)
);

/*
    Create Recipe Yeast association
*/
CREATE TABLE recipe_yeast(
    recipe_id INT NOT NULL,
    yeast_id INT NOT NULL,
    PRIMARY KEY (recipe_id,yeast_id),
    FOREIGN KEY recipe_key(recipe_id) REFERENCES recipe(id),
    FOREIGN KEY yeast_key(yeast_id) REFERENCES yeast(id)
);

/*
    Create Recipe Hops association
*/
CREATE TABLE recipe_hops(
    recipe_id INT NOT NULL,
    hop_id INT NOT NULL,
    PRIMARY KEY (recipe_id,hop_id),
    FOREIGN KEY recipe_key(recipe_id) REFERENCES recipe(id),
    FOREIGN KEY hop_key(hop_id) REFERENCES hops(id)
);

/*
    Create Recipe Malt association
*/
CREATE TABLE recipe_malt(
    recipe_id INT NOT NULL,
    malt_id INT NOT NULL,
    PRIMARY KEY (recipe_id,malt_id),
    FOREIGN KEY recipe_key(recipe_id) REFERENCES recipe(id),
    FOREIGN KEY malt_key(malt_id) REFERENCES malt(id)
);

/*
    Create Recipe Style association
*/
CREATE TABLE recipe_style(
    recipe_id INT NOT NULL,
    style_id INT NOT NULL,
    PRIMARY KEY (recipe_id,style_id),
    FOREIGN KEY recipe_key(recipe_id) REFERENCES recipe(id),
    FOREIGN KEY style_key(style_id) REFERENCES style(id)
);


/*
    Sample Recipes!
*/

/*
    Jacks Super Awesome Ale Recipe
*/
INSERT INTO recipe (recipe_name, batch_size, user_id)
VALUES
    ('Jacks Super Awesome Ale', 19, 2);

INSERT INTO recipe_style (recipe_id, style_id)
VALUES
    (1,1);

INSERT INTO recipe_malt (recipe_id, malt_id)
VALUES
    (1,1),
    (1,3);

INSERT INTO recipe_hops (recipe_id, hop_id)
VALUES
    (1,2),
    (1,4);

INSERT INTO recipe_yeast (recipe_id, yeast_id)
VALUES
    (1,6);

/*
    Toms extra Pale Lager Recipe
*/
INSERT INTO recipe (recipe_name, batch_size, user_id)
VALUES
    ('Toms extra Pale Lager', 19, 3);

INSERT INTO recipe_style (recipe_id, style_id)
VALUES
    (2,2);

INSERT INTO recipe_malt (recipe_id, malt_id)
VALUES
    (2,1),
    (2,3);

INSERT INTO recipe_hops (recipe_id, hop_id)
VALUES
    (2,2),
    (2,4);

INSERT INTO recipe_yeast (recipe_id, yeast_id)
VALUES
    (2,5);


