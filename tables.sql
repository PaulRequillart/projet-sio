DROP TABLE IF EXISTS classes CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS marks CASCADE;
DROP TABLE IF EXISTS modules CASCADE;
DROP TABLE IF EXISTS groups CASCADE;

CREATE TABLE groups(
    id int AUTO_INCREMENT PRIMARY KEY,
    label text NOT NULL
);


CREATE TABLE users(
    id int AUTO_INCREMENT PRIMARY KEY,
    nom text NOT NULL,
    prenom text NOT NULL,
    email text NOT NULL,
    mdp text NOT NULL,
    group_id int NOT NULL REFERENCES groups(id)
);

CREATE TABLE modules(
    id int AUTO_INCREMENT PRIMARY KEY,
    label text NOT NULL
);

CREATE TABLE marks(
    id int AUTO_INCREMENT PRIMARY KEY,
    value int NOT NULL,
    user_id int NOT NULL REFERENCES users(id),
    module_id int NOT NULL REFERENCES modules(id)
);
