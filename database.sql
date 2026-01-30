CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       pseudo VARCHAR(50),
                       email VARCHAR(100),
                       password VARCHAR(255),
                       role VARCHAR(20)
);

CREATE TABLE products (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(100),
                          price FLOAT,
                          description TEXT,
                          category VARCHAR(50)
);
