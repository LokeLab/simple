CREATE TABLE activities_detail_model (
   id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
   partner INT(11) NOT NULL,
   title VARCHAR(1000),
   deleted TINYINT(1) NOT NULL,
   typeindicator int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE = innodb ROW_FORMAT = DEFAULT;

insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Preparatory activities'    ,0 , 1);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Working meetings'    ,0 , 1);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Partners networking activities'    ,0 , 1);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Other'    ,0 , 1);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Artistic residencies'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Creative activities'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Coproduction'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Touring'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Concerts'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Performances'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Translation'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Publishing'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Festivals'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Rehearsals'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Exhibitions'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Fairs'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Literary translation'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Other'    ,0 , 2);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Research/studies/Policy analysis/Evaluations'    ,0 , 3);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Conferences/seminars'    ,0 , 3);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Branding/labeling activities'    ,0 , 3);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Networking activities'    ,0 , 3);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Communication activities'    ,0 , 3);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Other'    ,0 , 3);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Study(ies)'    ,0 , 4);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Evaluation (s)'    ,0 , 4);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Policy analysis'    ,0 , 4);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Artists'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Cultural workers (technicians, etc.)'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Artists representatives'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Art agents'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Administrative staff (from the partners\' organisations)'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Culture & specialist experts'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Staff from educational institutions'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Students in the field of cultural & creative industries'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Staff from local, regional and national institutions'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Other'    ,0 , 5);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Profit making cultural organisations'    ,0 , 6);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Non-Profit making cultural organisations'    ,0 , 6);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Publicly funded cultural organisations'    ,0 , 6);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Non-publicly funded cultural organisations'    ,0 , 6);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Schools/universities in the field of cultural & creative industries'    ,0 , 6);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Local, regional and national institutions'    ,0 , 6);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Other'    ,0 , 6);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'General public'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Youth'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Students'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Senior citizens'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Students in the field of cultural and creative industries'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Artists'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Cultural & specialist experts'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Cultural workers (technicians, etc.)'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Staff from educational institutions'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Staff from local, regional and national institutions'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Other'    ,0 , 7);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Roma'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Disadvantaged groups'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Gender M'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Gender W'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Migrant'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Racial & ethnic origin'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Religion /belief'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Disability and special needs'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Sexual orientation'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Ageing'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'Other Minorities'    ,0 , 8);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'number of artists/creators that have been promoted '    ,0 , 9);
insert into activities_detail_model (  partner  ,title  ,deleted  ,typeindicator) VALUES (   0   ,'number of emerging artists/creators that have been promoted'    ,0 , 9);
