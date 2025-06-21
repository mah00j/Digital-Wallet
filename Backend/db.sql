
CREATE TABLE users (
    id INT  PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(30),
    balance DECIMAL(12,2) NOT NULL DEFAULT 0.00
);

CREATE TABLE transactions (
    id INT  PRIMARY KEY,
    user_id INT NOT NULL,
    type NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    description VARCHAR(255),
    created_at DATE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
); 