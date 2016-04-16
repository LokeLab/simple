CREATE TABLE activities (
   id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
   d_document_start DATETIME,
   d_document_stop DATETIME,
   partner INT(11) NOT NULL,
   activity VARCHAR(1000),
   typeactivity VARCHAR(1000) NOT NULL,
   place VARCHAR(2000) NOT NULL,
   summary TEXT ASCII,
   from_nation VARCHAR(5),
   from_city VARCHAR(200),
   created_at DATETIME NOT NULL,
   updated_at DATETIME,
   deleted_at DATETIME,
   user_created INT(11) NOT NULL,
   user_updated INT(11),
   user_deleted INT(11),
   active TINYINT(1) NOT NULL,
   closed TINYINT(1) NOT NULL,
   deleted TINYINT(1) NOT NULL,
   verified INT(11) NOT NULL DEFAULT '0',
   
   
   
  PRIMARY KEY (id)
) ENGINE = innodb ROW_FORMAT = DEFAULT;


CREATE TABLE typeactivity (
   id INT(11) NOT NULL,
   description VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE = innodb ROW_FORMAT = DEFAULT;

ALTER TABLE typeactivity
 CHANGE id id INT(11) AUTO_INCREMENT NOT NULL;

ALTER TABLE partner
 ADD staffpermbefore INT AFTER short,
 ADD stafftempbefore INT,
 ADD staffpermafter INT,
 ADD stafftempafter INT;