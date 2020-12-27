INSERT INTO trainee VALUES(1111,'Lukas','m',183,80,75,2);
INSERT INTO trainee(svnr, zielgewicht, erfahrung, sp_name) VALUES(1112, 86, 3, 'Alex');
INSERT INTO trainee VALUES(1113, 'Simon','m',186,71,72,4);

INSERT INTO trainer(svnr,sp_name,geschlecht,groesse,gewicht,t_kosten,schwerpunkt) VALUES(1113, 'Simon','m',186,71,1000,'Ernährung');
INSERT INTO trainer(svnr,sp_name,geschlecht,groesse,gewicht,t_kosten,schwerpunkt) VALUES(1114, 'Ulli','m',186,71,1000,'Ernährung');

INSERT INTO studio VALUES(4621, 'Sitzbergstrasse 28', 'Österreich', 'Ecksis Pumperbude', 30, 400);
INSERT INTO studio VALUES(1150, 'Märzstraße 79', 'Österreich', 'Pepis PPP ', 20, 72);

INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Sitting Triceps Extension', 500, 4621, 'Sitzbergstrasse 28', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Leg Curl', 700, 4621, 'Sitzbergstrasse 28', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Scott Bench', 200, 4621, 'Sitzbergstrasse 28', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Leg Extension', 600, 4621, 'Sitzbergstrasse 28', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Glute Raise', 300, 4621, 'Sitzbergstrasse 28', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Kabelturm', 1200, 4621, 'Sitzbergstrasse 28', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Ruder breit abgestützt', 600, 4621, 'Sitzbergstrasse 28', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Glute Raise', 300, 1150, 'Märzstraße 79', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Kabelturm', 1200, 1150, 'Märzstraße 79', 'Österreich');
INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Ruder breit abgestützt', 600, 1150, 'Märzstraße 79', 'Österreich');



--INSERT INTO VALUES();



SELECT * FROM user_tables;

SELECT * FROM trainee;
SELECT * FROM trainer;
SELECT * FROM studio;
SELECT * FROM geraet;

SELECT * FROM counter;
SELECT * FROM geraeteanzahl_oe;

