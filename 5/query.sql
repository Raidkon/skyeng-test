with t as(
  select row_number() OVER () as rnum,
  t.*
  from test t
  order by t.id ASC
)

select
	t1.id as "from",
    t.id as "to"
from
	t
    left join t t1 on t1.rnum = t.rnum - 1
WHERE
	t.id - 1 <> t1.id