CREATE SCHEMA "task1";

CREATE TABLE "task1"."books" (
  	id SERIAL NOT NULL,
  	name VARCHAR(255) NOT NULL,
  	PRIMARY KEY (id)
);

INSERT INTO "task1"."books" ("name") VALUES ('book 1'),('book 2'),('book 3'),('book 4');

CREATE TABLE "task1"."authors" (
  	id SERIAL NOT NULL,
  	name VARCHAR(255) NOT NULL,
  	PRIMARY KEY (id)
);

INSERT INTO "task1"."authors" ("name") VALUES ('author 1'),('author 2'),('author 3'),('author 4'),('author 5'),('author 6'),('author 7'),('author 8'),('author 9'),('author 10');

CREATE TABLE "task1"."books_authors" (
  	book_id INT4 NOT NULL  references "task1"."books"("id"),
  	author_id INT4 NOT NULL  references "task1"."authors"("id"),
  	PRIMARY KEY (book_id,author_id)
);


INSERT INTO "task1"."books_authors" ("book_id","author_id") VALUES (1,1),(2,2),(2,3),(3,4),(3,5),(3,6),(4,7),(4,8),(4,9),(4,10);