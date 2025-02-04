create database campionato;
use campionato;

create table colori(
	colore varchar(60) primary key
);
-- drop table colori;

create table nazionalita(
	nazionalita varchar(60) primary key
);
-- drop table nazionalita;

create table case_automobilistiche(
	nome varchar(200) primary key,
	colore_livrea varchar(60) not null,
	foreign key (colore_livrea) references colori(colore)
);
-- drop table case_automobilistiche;

create table piloti(
	numero int primary key,
	nome varchar(100) not null,
	cognome varchar(100) not null,
	nazionalita varchar(60) not null,
	casa_automobilistica varchar(200) not null,
	foreign key (nazionalita) references nazionalita(nazionalita),
	foreign key (casa_automobilistica) references case_automobilistiche(nome)
);
-- drop table piloti;

create table gare(
	luogo varchar(60) not null,
	data date not null,
	primary key (luogo, data)
);
drop table gare;

create table partecipazioni(
	pilota int not null,
	luogo_gara varchar(60) not null,
	data_gara date not null,
	tempo time(6) not null,
	primary key (pilota, luogo_gara, data_gara),
	foreign key (pilota) references piloti(numero),
	foreign key (luogo_gara, data_gara) references gare(luogo, data)
);
drop table partecipazioni;

INSERT INTO colori (colore) VALUES 
('Arancione')
('Rosso'),
('Blu'),
('Giallo'),
('Verde'),
('Nero'),
('Bianco');
select * from colori;

INSERT INTO nazionalita (nazionalita) VALUES 
('Monegasca'),
('Messicana'),
('Australiana'),
('Italiana'),
('Tedesca'),
('Francese'),
('Spagnola'),
('Britannica'),
('Olandese');
select * from nazionalita;

INSERT INTO case_automobilistiche (nome, colore_livrea) VALUES 
('Ferrari', 'Rosso'),
('Mercedes', 'Nero'),
('Red Bull', 'Blu'),
('McLaren', 'Arancione'),
('Aston Martin', 'Verde'),
('Alpine', 'Blu');
select * from case_automobilistiche;

INSERT INTO piloti (numero, nome, cognome, nazionalita, casa_automobilistica) VALUES 
(16, 'Charles', 'Leclerc', 'Monegasca', 'Ferrari'),
(55, 'Carlos', 'Sainz', 'Spagnola', 'Ferrari'),
(44, 'Lewis', 'Hamilton', 'Britannica', 'Mercedes'),
(63, 'George', 'Russell', 'Britannica', 'Mercedes'),
(1, 'Max', 'Verstappen', 'Olandese', 'Red Bull'),
(11, 'Sergio', 'Perez', 'Messicana', 'Red Bull'),
(4, 'Lando', 'Norris', 'Britannica', 'McLaren'),
(81, 'Oscar', 'Piastri', 'Australiana', 'McLaren');
select * from piloti;

INSERT INTO gare (luogo, data) VALUES 
('Monza', '2024-09-08'),
('Monte Carlo', '2024-05-26'),
('Silverstone', '2024-07-07'),
('Spa-Francorchamps', '2024-08-25');
select * from gare;

INSERT INTO partecipazioni (pilota, luogo_gara, data_gara, tempo) VALUES
(16, 'Monza', '2024-09-08', '01:15:23.123456'),
(55, 'Monza', '2024-09-08', '01:15:45.987654'),
(44, 'Monza', '2024-09-08', '01:14:56.234567'),
(63, 'Monza', '2024-09-08', '01:16:01.000000'),
(1, 'Monza', '2024-09-08', '01:13:40.111111'),
(11, 'Monza', '2024-09-08', '01:14:12.222222'),
(4, 'Monza', '2024-09-08', '01:16:10.333333'),
(81, 'Monza', '2024-09-08', '01:17:25.444444'),
(16, 'Monte Carlo', '2024-05-26', '01:09:10.111111'),
(55, 'Monte Carlo', '2024-05-26', '01:09:22.222222'),
(44, 'Monte Carlo', '2024-05-26', '01:08:30.333333'),
(63, 'Monte Carlo', '2024-05-26', '01:10:40.444444'),
(1, 'Monte Carlo', '2024-05-26', '01:08:00.555555'),
(11, 'Monte Carlo', '2024-05-26', '01:09:55.666666'),
(4, 'Monte Carlo', '2024-05-26', '01:11:00.777777'),
(81, 'Monte Carlo', '2024-05-26', '01:12:30.888888'),
(16, 'Silverstone', '2024-07-07', '01:30:50.123456'),
(55, 'Silverstone', '2024-07-07', '01:31:20.234567'),
(44, 'Silverstone', '2024-07-07', '01:29:40.345678'),
(63, 'Silverstone', '2024-07-07', '01:32:10.456789'),
(1, 'Silverstone', '2024-07-07', '01:28:50.567890'),
(11, 'Silverstone', '2024-07-07', '01:30:00.678901'),
(4, 'Silverstone', '2024-07-07', '01:33:00.789012'),
(81, 'Silverstone', '2024-07-07', '01:34:10.890123'),
(16, 'Spa-Francorchamps', '2024-08-25', '01:45:23.987654'),
(55, 'Spa-Francorchamps', '2024-08-25', '01:46:00.876543'),
(44, 'Spa-Francorchamps', '2024-08-25', '01:44:12.765432'),
(63, 'Spa-Francorchamps', '2024-08-25', '01:47:01.654321'),
(1, 'Spa-Francorchamps', '2024-08-25', '01:42:55.543210'),
(11, 'Spa-Francorchamps', '2024-08-25', '01:44:40.432109'),
(4, 'Spa-Francorchamps', '2024-08-25', '01:48:20.321098'),
(81, 'Spa-Francorchamps', '2024-08-25', '01:49:00.210987');
select * from partecipazioni;

select p2.numero, p2.nome, p2.cognome, p2.casa_automobilistica, p.tempo, p.luogo_gara, p.data_gara from partecipazioni as p
join piloti p2 on p2.numero = p.pilota
order by p.tempo;

select p2.casa_automobilistica, min(p.tempo), p.luogo_gara, p.data_gara from partecipazioni as p
join piloti p2 on p2.numero = p.pilota
group by p2.casa_automobilistica, p.luogo_gara, p.data_gara
order by p.tempo;

select p2.numero, p2.nome, p2.cognome, p2.casa_automobilistica, p.tempo from partecipazioni as p
join piloti p2 on p2.numero = p.pilota
where p.luogo_gara = 'Monza' and p.data_gara = "2024-09-08"
order by p.tempo;