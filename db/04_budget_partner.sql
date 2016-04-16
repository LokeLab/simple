

create view  v_budget_partner as 
select  partner, sum(amountbudget) ,
sum(amountinserted) as amountinserted
, sum(amountspent) as amountspent ,
sum(amountverified) as amountverified 
from   v_budget_spent group by partner;


ALTER  VIEW `partner_view` AS 
select `partner`.`id` AS `id`,`partner`.`description` AS `description`,
`partner`.`budget` AS `budget`,amountinserted AS `inserted`, amountspent AS `spent`,amountverified AS `verified` from `partner` join v_budget_partner
on partner.id = v_budget_partner.partner;
;


ALTER TABLE budget
 ADD kind INT AFTER partner;
