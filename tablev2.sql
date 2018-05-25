DROP TABLE IF EXISTS classes CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS marks CASCADE;
DROP TABLE IF EXISTS modules CASCADE;
DROP TABLE IF EXISTS groups CASCADE;

CREATE TABLE groups(
    id int AUTO_INCREMENT PRIMARY KEY,
    label text NOT NULL,
    teacher_id int NOT NULL REFERENCES teachers(id)
);

CREATE TABLE users(
    id int AUTO_INCREMENT PRIMARY KEY,
    nom text NOT NULL,
    prenom text NOT NULL,
    username text NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE teachers(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int NOT NULL REFERENCES users(id)
);

CREATE TABLE Students(
    id int AUTO_INCREMENT PRIMARY KEY,
    group_id int NOT NULL REFERENCES groups(id),
    user_id int NOT NULL REFERENCES users(id)
);

CREATE TABLE modules(
    id int AUTO_INCREMENT PRIMARY KEY,
    label text NOT NULL,
    group_id int NOT NULL REFERENCES groups(id)
);

CREATE TABLE marks(
    id int AUTO_INCREMENT PRIMARY KEY,
    value int NOT NULL,
    label text NOT NULL,
    student_id int NOT NULL REFERENCES students(id),
    module_id int NOT NULL REFERENCES modules(id)
);
