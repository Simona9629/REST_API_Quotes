CREATE DATABASE daily_quotes;
USE daily_quotes;

CREATE TABLE quote(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    quote TEXT NOT NULL,
    domain VARCHAR(50) NOT NULL
);

INSERT INTO quote VALUES
(NULL, 'I always wanted to be somebody, but now I realize I should have been more specific.', 'Funny'),
(NULL, 'Behind every great man is a woman rolling her eyes.', 'Funny'),
(NULL, 'It always seems impossible until it is done.', 'Motivational'),
(NULL, 'Yesterday is not ours to recover, but tomorrow is ours to win or lose.', 'Positive'),
(NULL, 'Success is not final, failure is not fatal: it is the courage to continue that counts.', 'Success');

SELECT * FROM quote;

SELECT * FROM quote ORDER BY RAND() LIMIT 1;
SELECT * FROM quote WHERE domain = 'Funny';


