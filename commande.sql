use literie3000;
create table matelas
(
	id smallint primary key auto_increment,
	fabricant varchar(50) not null,
	modele varchar(70) not null,
	dimension varchar(10) not null,
	prix smallint not null,
	image varchar(200) not null

)

insert into matelas (fabricant, modele, dimension,prix,image)
values
("EPEDA","Matelas Transition", "90x190",759,"https://cdn.laredoute.com/products/8/2/c/82c8e797b3c783ff2f96dd22b31b9b34.jpg?width=800&dpr=1"),
("DREAMWAY","Matelas Stan","90x190",809,"https://matelasenligne.com/wp-content/uploads/2022/06/Matelas-Evea.jpg"),
("BULTEX","Matelas Teamasse","140x190",529,"https://cdnimage.camif.fr/m/279f4f753fa51d7c/Web_JPG-1A_ENSEMBLE_MATELAS_SOMMIER_BULTEX_TOKYO-crop.jpg?twic=v1/contain=500x500"),
("EPEDA","Matelas Coup de boule","160x200",509,"https://cdn.laredoute.com/products/e/8/e/e8e243cb4ed7729ec479bf7031d25f8d.jpg?width=800&dpr=1")
