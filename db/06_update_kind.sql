update budget set kind = 2 where macro1 in (1,2);

update budget set kind = 1 where macro1 in (4);

update budget set kind = 5 where macro1 = 3 and macro2 = 1;

update budget set kind = 4 where macro1 = 3 and macro2 = 2;

update budget set kind = 6 where  macro1 = 3 and macro2 = 3 and description not like '%travel%';


update budget set kind = 4 where    description  like '%hotel%';

update budget set kind = 5 where    description  like '%travel%';


