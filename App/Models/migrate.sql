drop table if exists notes;
create table notes(
                      id int auto_increment primary key ,
                      title varchar(255),
                      body varchar(255),
                      created_at timestamp default current_timestamp
);

insert into notes(title, body)
values('Handla','Glöm inte handla mjölk'),
      ('Borsta tänderna', 'Det är bra. Gör det.')