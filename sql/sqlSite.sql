select * from controle
select * from professor
select * from materia
select * from oferta

insert into oferta values(1, 3, 1, "extra", "2015", 2)

insert into controle values (1, "admin", "admin")
insert into controle values (2, "tiemi", "tiemi")
insert into controle values (3, "jose", "jose")
INSERT INTO controle (usuario, senha, adm) VALUES ("jose", "jose", 0)

delete from controle where id = 3

insert into horario values (1, "Segunda-feira", "8:00", "10:00", "AT107")

insert into professor (nome, foto, paginaPessoal, area, codUsuario) values("Tiemi Christine Sakata", "Tiemitiemi.jpg", "sites.google.com/site/tisakata", "Mineração de Dados/ Aprendizado de Máquina Meta-aprendizado/ Algoritmos distribuídos/ Tolerância a falhas/", 5)
insert into professor (nome, foto, paginaPessoal, area, codUsuario) values("José de Oliveira Guimarães", null, "www.cyan-lang.org/jose/", "Linguagens de Programação, Orientação a Objetos, Computabilidade", 6)

insert into materia values(1, "Algoritmos e Programação 1", "bla bla", "bla bla", 2, 2, "ALG1", "ALG1", 0, 1)

delete from controle where id = 1

SELECT senha FROM controle WHERE usuario = 'Gustavo Eda'

SELECT foto FROM professor WHERE codUsuario = 2

select * from professor where codUsuario = 2

UPDATE materia set nome = "Algoritmos e Programação 1", codigoEscolar = "ALG1", abrev = "ALG1" WHERE cod = 1
