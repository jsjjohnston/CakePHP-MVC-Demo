/*
    Script used to create the tables that will be used in the beer recipe website
    Author: Jay Johnston
    Created: 15-03-2018
*/

DROP DATABASE accla;
CREATE DATABASE accla;
USE accla;

/*
    A simple users system to begin with
*/

/*
    Test again
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

INSERT INTO users (user_name, email, password, role, created, modified)
VALUES
    ('Admin', 'admin@accla.com', '$2y$10$R9AGThHy2FjOzxweoVcVUuVI88m5hktj/.nSG1ljNbdXVMvJ7T1AW', 'Admin', NOW(), NOW()),
    ('Tom', 'Tom@accla.com', '$2y$10$wQv/hsnk4qFpNas02kGf0elSPYXyU5Ec6fn18ht3YDbtNdzO3bHL6', 'Author', NOW(), NOW());

CREATE TABLE hops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hop_name VARCHAR(255) NOT NULL,
    type ENUM('Pellet', 'Leaf'),
    alpha_acid DECIMAL(4,2)
);

INSERT INTO hops (hop_name, type, alpha_acid)
VALUES
    ('Cascade', 'Pellet', 8.40),
    ('Galaxy', 'Pellet', 16.50),
    ('Pride of Ringwood', 'Leaf', 9.10),
    ('Vic Secret', 'Pellet', 15.50);

CREATE TABLE malt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    malt_name VARCHAR(255) NOT NULL,
    type ENUM('Grain', 'Extract'),
    specific_gravity DECIMAL(4,3)
);

INSERT INTO malt (malt_name, type, specific_gravity)
VALUES
    ('Pale', 'Grain', 1.038),
    ('Vienna', 'Grain', 1.037),
    ('Pilser', 'Extract', 1.037),
    ('Munich', 'Grain', 1.038);

CREATE TABLE yeast (
    id INT AUTO_INCREMENT PRIMARY KEY,
    yeast_name VARCHAR(255) NOT NULL,
    type ENUM('Lager', 'Ale'),
    attenuation_min DECIMAL(4,2),
    attenuation_max DECIMAL(4,2),
    temperature_min DECIMAL(3,1),
    temperature_max DECIMAL(3,1)
);

INSERT INTO yeast (yeast_name, type, attenuation_min, attenuation_max, temperature_min, temperature_max)
VALUES
    ('Australian Ale', 'Ale', 70.00, 75.00, 18.3, 21.1),
    ('Belgian Ale', 'Ale', 78.00, 85.00, 20.0, 25.6),
    ('California Ale', 'Ale', 73.00, 80.00, 20.0, 22.8),
    ('German Lager', 'Lager', 74.00, 79.00, 10.0, 12.8),
    ('German Bock Lager', 'Lager', 70.00, 76.00, 8.9, 12.8),
    ('Mexican Lager', 'Lager', 70.00, 78.00, 10.0, 12.8);

CREATE TABLE style (
    id INT AUTO_INCREMENT PRIMARY KEY,
    style_name VARCHAR(255) NOT NULL,
    type ENUM('Lager', 'Ale')
);

CREATE TABLE recipe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_name VARCHAR(255) NOT NULL,
    batch_size DECIMAL(2,1),
    user_id INT NOT NULL,
    FOREIGN KEY user_key(user_id) REFERENCES users(id)
);

CREATE TABLE recipe_yeast(
    recipe_id INT NOT NULL,
    yeast_id INT NOT NULL,
    PRIMARY KEY (recipe_id,yeast_id),
    FOREIGN KEY recipe_key(recipe_id) REFERENCES recipe(id),
    FOREIGN KEY yeast_key(yeast_id) REFERENCES yeast(id)
);

CREATE TABLE recipe_hops(
    recipe_id INT NOT NULL,
    hop_id INT NOT NULL,
    PRIMARY KEY (recipe_id,hop_id),
    FOREIGN KEY recipe_key(recipe_id) REFERENCES recipe(id),
    FOREIGN KEY hop_key(hop_id) REFERENCES hops(id)
);

CREATE TABLE recipe_malt(
    recipe_id INT NOT NULL,
    malt_id INT NOT NULL,
    PRIMARY KEY (recipe_id,malt_id),
    FOREIGN KEY recipe_key(recipe_id) REFERENCES recipe(id),
    FOREIGN KEY malt_key(malt_id) REFERENCES malt(id)
);

CREATE TABLE recipe_style(
    recipe_id INT NOT NULL,
    style_id INT NOT NULL,
    PRIMARY KEY (recipe_id,style_id),
    FOREIGN KEY recipe_key(recipe_id) REFERENCES recipe(id),
    FOREIGN KEY style_key(style_id) REFERENCES style(id)
);



