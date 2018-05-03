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
    ('Admin', 'admin@accla.com', 'qwerty321', 'Admin', NOW(), NOW()),
    ('Tom', 'Tom@accla.com', 'qwerty321', 'Author', NOW(), NOW());

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
    attenuation_min DECIMAL(2,1),
    attenuation_max DECIMAL(2,1),
    temperature_min DECIMAL(2,1),
    temperature_max DECIMAL(2,1)
);

CREATE TABLE style (
    id INT AUTO_INCREMENT PRIMARY KEY,
    yeast_name VARCHAR(255) NOT NULL,
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
    hops_id INT NOT NULL,
    PRIMARY KEY (recipe_id,hops_id),
    FOREIGN KEY recipe_key(hops_id) REFERENCES recipe(id),
    FOREIGN KEY hops_key(hops_id) REFERENCES hops(id)
);

CREATE TABLE recipe_malt(
    recipe_id INT NOT NULL,
    malt_id INT NOT NULL,
    PRIMARY KEY (recipe_id,malt_id),
    FOREIGN KEY recipe_key(malt_id) REFERENCES recipe(id),
    FOREIGN KEY hops_key(malt_id) REFERENCES malt(id)
);

CREATE TABLE recipe_style(
    recipe_id INT NOT NULL,
    style_id INT NOT NULL,
    PRIMARY KEY (recipe_id,style_id),
    FOREIGN KEY recipe_key(style_id) REFERENCES recipe(id),
    FOREIGN KEY style_key(style_id) REFERENCES style(id)
);



