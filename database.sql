create database campionato;
use campionato;
create table nazionalita(
    nazionalita varchar(100) primary key
);
-- drop table nazionalita;
create table circuiti(
    luogo varchar(100) primary key
);
-- drop table circuiti;
create table livree(
    colore varchar(50) primary key
);
-- drop table livree;
create table case_automobilistiche(
    nome varchar(100) primary key,
    livrea varchar(50) not null,
    foreign key (livrea) references livree(colore)
);
-- drop table case_automobilistiche;
create table gare(
    id int primary key auto_increment,
    data date not null,
    circuito varchar(100) not null,
    tempo_migliore time(3),
    foreign key (circuito) references circuiti(luogo)
);
-- drop table gare;

create table piloti(
    numero int primary key,
    nome varchar(100) not null,
    cognome varchar(100) not null,
    nazionalita varchar(100) not null,
    casa_automobilistica varchar(100) not null,
    foreign key (nazionalita) references nazionalita(nazionalita),
    foreign key (casa_automobilistica) references case_automobilistiche(nome)
);
-- drop table piloti;
create table partecipazioni(
    pilota int,
    gara int,
    punteggio int,
    primary key(pilota, gara),
    foreign key (pilota) references piloti(numero),
    foreign key (gara) references gare(id)
);
-- drop table partecipazioni;

-- Inserting data into nazionalita
INSERT INTO nazionalita (nazionalita)
values
    ('Olanda'),
    ('Italia'),
    ('Germania'),
    ('Francia'),
    ('Inghilterra'),
    ('Spagna');
-- Inserting data into circuiti
INSERT INTO circuiti (luogo)
VALUES
    ('Monza'),
    ('Silverstone'),
    ('Monaco'),
    ('Spa-Francorchamps'),
    ('Barcelona');
-- Inserting data into livree
INSERT INTO livree (colore)
VALUES
    ('Rosso'),
    ('Blu'),
    ('Verde'),
    ('Giallo'),
    ('Nero');
-- Inserting data into case_automobilistiche
INSERT INTO case_automobilistiche (nome, livrea)
VALUES
    ('Ferrari', 'Rosso'),
    ('Mercedes', 'Blu'),
    ('Red Bull Racing', 'Verde'),
    ('McLaren', 'Giallo'),
    ('Alfa Romeo', 'Nero');
-- Inserting data into gare
INSERT INTO gare (data, circuito, tempo_migliore)
VALUES
    ('2025-03-15', 'Monza', '01:23:45.676'),
    ('2025-03-22', 'Silverstone', '01:25:17.876'),
    ('2025-04-05', 'Monaco', '01:15:48.755'),
    ('2025-04-12', 'Spa-Francorchamps', '01:17:32.132'),
    ('2025-05-03', 'Barcelona', '01:20:55.423');
-- Inserting data into piloti
INSERT INTO piloti (numero, nome, cognome, nazionalita, casa_automobilistica)
VALUES
    (1, 'Sebastian', 'Vettel', 'Germania', 'Ferrari'),
    (2, 'Lewis', 'Hamilton', 'Inghilterra', 'Mercedes'),
    (3, 'Charles', 'Leclerc', 'Italia', 'Ferrari'),
    (4, 'Max', 'Verstappen', 'Olanda', 'Red Bull Racing'),
    (5, 'Lando', 'Norris', 'Inghilterra', 'McLaren');
-- Inserting data into partecipazioni
INSERT INTO partecipazioni (pilota, gara, punteggio)
values
    (1, 1, 25),
    (2, 1, 18),
    (3, 1, 15),
    (4, 1, 10),
    (5, 1, 8),
    (1, 2, 25),
    (2, 2, 18),
    (3, 2, 15),
    (4, 2, 10),
    (5, 2, 8),
    (1, 3, 25),
    (2, 3, 18),
    (3, 3, 15),
    (4, 3, 10),
    (5, 3, 8),
    (1, 4, 25),
    (2, 4, 18),
    (3, 4, 15),
    (4, 4, 10),
    (5, 4, 8),
    (1, 5, 25),
    (2, 5, 18),
    (3, 5, 15),
    (4, 5, 10),
    (5, 5, 8);