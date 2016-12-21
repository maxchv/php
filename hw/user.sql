-- create database Users DEFAULT CHAR SET utf8;
-- use Users;
# CREATE TABLE IF NOT EXISTS Users
# (
#     id int PRIMARY KEY AUTO_INCREMENT,
#     first_name VARCHAR(40) NOT NULL,
#     last_name VARCHAR(40) NOT NULL,
#     login VARCHAR(40) NOT NULL,
#     password VARCHAR(40) NOT NULL,
#     email VARCHAR(40) NOT NULL,
#     gender SET('MALE', 'FEMALE', 'UNKNOWN') NULL,
#     date_birth DATE NULL,
#     register_date TIMESTAMP
# );

# INSERT INTO Users(first_name, last_name, login, password, email, gender, date_birth)
# VALUES ('Jack', 'Nicolson', 'jack56', 'qwerty', 'jack@holiwood.com', 'MALE', '1945/12/01');

# INSERT INTO Users(first_name, last_name, login, password, email, gender, date_birth)
# VALUES ('Danila', 'Bogrov', 'danja', '12345', 'danila@killer.com', 'MALE', '1973/11/04');

# SELECT * FROM Users;

# DELETE FROM Users WHERE id=2;