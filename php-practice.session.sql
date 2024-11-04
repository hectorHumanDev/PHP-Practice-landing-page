create TABLE notes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    body VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
--@block 
INSERT INTO notes(body, user_id)
values ('10 reasons why CSS is awesome', 1),
    ('building a saas with React', 3),
    ('handling promises in React', 2) --@block 
SELECT *
FROM notes;
--@block