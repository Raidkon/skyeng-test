SELECT
	b.name,
    count(*) as cnt_authors
FROM
	task1.books b
	inner join task1.books_authors ba on ba.book_id = b.id
GROUP BY
	b.id
HAVING
	count(*) = 3