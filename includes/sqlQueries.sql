CREATE TABLE users(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	Username VARCHAR(255) NOT NULL,
    Pwd VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE ,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- For users table data
INSERT INTO users (Username,Pwd,Email) values ("Max","max332","max224@gmail.com");

INSERT INTO users (Username, Pwd, Email) VALUES
('liam',   'liam4521',   'liam.carter@gmail.com'),
('emma',   'emma8876',   'emma.wilson91@gmail.com'),
('noah',   'noah1290',   'noah.brown07@gmail.com'),
('olivia', 'olivia5543', 'olivia.davis22@gmail.com'),
('ethan',  'ethan7712',  'ethan.miller88@gmail.com'),
('sophia', 'sophia3098', 'sophia.moore15@gmail.com'),
('mason',  'mason6624',  'mason.clark33@gmail.com'),
('ava',    'ava9981',    'ava.lewis46@gmail.com'),
('lucas',  'lucas2257',  'lucas.young59@gmail.com'),
('mia',    'mia4410',    'mia.hall72@gmail.com');



--For comment table data

CREATE TABLE comments (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    comment_text TEXT NOT NULL,
    users_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE SET NULL
);


INSERT INTO comments(username, comment_text, users_id) VALUES("liam","That mountain is beautiful",2 );

