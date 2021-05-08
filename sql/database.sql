CREATE TABLE users (
    id INT AUTO_INCREMENT,
    user_id INT NOT NULL UNIQUE,
    nick_name varchar(255),
    email varchar(255),
    password varchar(255),
    api_token varchar(12),
    image_url varchar(255),
    status boolean DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

INSERT INTO users (user_id, nick_name, email, password, api_token) VALUES ('123123', 'test', 'test@email.com', 'password', 'token');