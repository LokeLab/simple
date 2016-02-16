alter   VIEW `partner_view` AS 
select `partner`.`id` AS `id`,`partner`.`description` AS `description`,`partner`.`budget` AS `budget`,0 AS `spent`,0 AS `verified` from `partner`;

alter   VIEW `v_budget_spent` AS select `visit`.`partner` AS `partner`,`visit`.`budgetrow` AS `row`,`budget`.`macro1` AS `macro1`,`budget`.`codedest` AS `codedest`,(sum(coalesce(`visit`.`netamount`*rate,0)) + sum(coalesce(`visit`.`vatamount`*rate,0))) AS `amountspent` from (`visit` join `budget` on((`visit`.`budgetrow` = `budget`.`id`))) 
join currency on currency.description = visit.currency
group by `visit`.`partner`,`visit`.`budgetrow`;

alter   VIEW `view_visit` AS 
select `visit`.`id` AS `id`,`visit`.`created_at` AS `created_at`,`partner`.`short` AS `short`,`visit`.`budgetrow` AS `row`,`visit`.`currency` AS `currency`,`visit`.`netamount` AS `netamount`,`visit`.`vatamount` AS `vatamount`,`visit`.`euronetamount` AS `euronetamount`,`visit`.`eurovatamount` AS `eurovatamount`,(`visit`.`euronetamount` + `visit`.`eurovatamount`) AS `eurototal`,`visit`.`partner` AS `partner` from (`visit` join `partner` on((`visit`.`partner` = `partner`.`id`)));


alter   VIEW `v_budget_macro` AS select `budget`.`partner` AS `partner`,`budget`.`macro1` AS `macro1`,`budgetmacro`.`description` AS `description`,sum(`budget`.`amount`) AS `amount`,coalesce(`v_budget_spent_macro`.`amountspent`,0) AS `amountspent` from ((`budget` join `budgetmacro` on((`budget`.`macro1` = `budgetmacro`.`id`))) left join `v_budget_spent_macro` on(((`v_budget_spent_macro`.`macro1` = `budget`.`macro1`) and (`v_budget_spent_macro`.`partner` = `budget`.`partner`)))) group by `budget`.`partner`,`budget`.`macro1`,`budgetmacro`.`description`;







alter   VIEW `v_budget_spent_macro` AS select `v_budget_spent`.`partner` AS `partner`,`v_budget_spent`.`macro1` AS `macro1`,sum(`v_budget_spent`.`amountspent`) AS `amountspent` from `v_budget_spent` group by `v_budget_spent`.`partner`,`v_budget_spent`.`macro1`;
