CREATE SCHEMA team05;

CREATE TABLE team05.scriptures (
    id serial PRIMARY KEY,
    book    varchar(256),
    chapter int,
    verse   int,
    content text
);

INSERT INTO team05.scriptures(book, chapter, verse, content)
    VALUES ('John', '1', '5', 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO team05.scriptures(book, chapter, verse, content)
    VALUES ('Doctrine and Covenants', '88', '49', 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO team05.scriptures(book, chapter, verse, content)
    VALUES ('Doctrine and Covenants', '93', '28', 'Man was also in the beginning with God. Intelligence, or the light of truth, was not created or made, neither indeed can be.');

INSERT INTO team05.scriptures(book, chapter, verse, content)
    VALUES ('Mosiah', '16', '9', 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');