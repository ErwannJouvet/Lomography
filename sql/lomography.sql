drop database if exists lomography;
create database lomography;
use lomography;

create table produit(
    idproduit int not null auto_increment,
    img varchar(50),
    nom varchar(50),
    quantite int,
    prix float(5,2),
    primary key (idproduit)
);

create table pellicule(
    idproduit int not null,
    typeFilm varchar(50),
    developpement varchar(50),
    sensibilite varchar(50),
    format int,
    primary key (idproduit),
    foreign key (idproduit) references produit(idproduit)
);

create table appareil(
    idproduit int not null,
    formatPellicule int(10),
    nbPoses int(10),
    focale int(10),
    alimentation varchar(50),
    dimension varchar(50),
    primary key(idproduit),
    foreign key (idproduit) references produit(idproduit)
);

create table objectif(
    idproduit int not null,
    poids float(10),
    diametreMaxAndLongueur float(10),
    diametreFiltre float(10),
    moteurAutoFocus varchar(50),
    agrandissement varchar(50),
    primary key (idproduit),
    foreign key (idproduit) references produit(idproduit)
);

create table media(
    idmedia int not null auto_increment,
    description varchar(50),
    url varchar(50),
    idproduit int,
    primary key (idmedia),
    foreign key (idproduit) references produit (idproduit)
);

create table user(
    iduser int not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    adresse varchar(50),
    email varchar(50),
    mdp varchar(50),
    droit enum ("admin", "user"),
    primary key (iduser)
);

create table livraison(
    idlivraison int not null auto_increment,
    dateExpedition date,
    datePrevu date,
    prix float(3,2),
    entreprise enum("DPD","Chronopost","Mondial Relay"),
    adresse varchar(50),
    typeLivraison enum("Point relais", "Maison"),
    primary key (idlivraison)
);

create table pointRelais(
    idlivraison int not null,
    nom varchar(50),
    horaire varchar(50),
    primary key (idlivraison),
    foreign key (idlivraison) references livraison(idlivraison)
);

create table adressePerso(
    idlivraison int not null,
    primary key (idlivraison),
    foreign key (idlivraison) references livraison(idlivraison)
);

--Table créer pour faire la transition entre la table produit et panier
create table contenir(
    qte int,
    idproduit int,
    idpanier int,
    primary key (idproduit, idpanier)
);
--FIN

--Table créer pour faire la transition entre panier livraison et user
create table choisir(
    idlivraison int,
    iduser int,
    idpanier int,
    primary key (idlivraison, iduser, idpanier)
);
--FIN

create table panier(
    idpanier int not null auto_increment,
    prix float(11.2) default 0, 
    primary key (idpanier)
);
----------------------------------------------------------------------Procédures stockés------------------------------------------------------------------------------------
--Procédure stocker pour insérer un appareil
delimiter $
create procedure insertAppareil (IN p_img varchar(50), IN p_nom varchar(50), IN p_quantite int, IN p_prix float(5,2), IN p_formatPellicule int, IN p_nbPoses int, IN p_focale int, IN p_alimentation varchar(50), IN p_dimension varchar(50))
begin 
       declare p_idproduit int ;
       insert into produit values (null, p_img, p_nom, p_quantite, p_prix ); 

       select idproduit into p_idproduit from produit
       where img = p_img and nom = p_nom and quantite = p_quantite and prix=p_prix ; 

       insert into appareil values (p_idproduit, p_formatPellicule, p_nbPoses, p_focale, p_alimentation, p_dimension); 
end $
delimiter ;
--FIN de la procédure

--Procédure stocker pour modifier un appareil
delimiter $
create procedure updateAppareil (IN p_idproduit int, IN p_img varchar(50), IN p_nom varchar(50), IN p_quantite int, IN p_prix float(5,2), IN p_formatPellicule int, IN p_nbPoses int, IN p_focale int, IN p_alimentation varchar(50), IN p_dimension varchar(50))
begin 
        UPDATE produit SET idproduit = p_idproduit, img = p_img, nom = p_nom, quantite = p_quantite, prix = p_prix WHERE idproduit = p_idproduit;
        UPDATE appareil SET idproduit = p_idproduit, formatPellicule = p_formatPellicule, nbPoses = p_nbPoses, focale = p_focale, alimentation = p_alimentation, dimension = p_dimension WHERE idproduit = p_idproduit;
end $
delimiter ;
--FIN
--Procédure stocker pour modifier une pellicule
delimiter $
create procedure updatePellicule (IN p_idproduit int, IN p_img varchar(50), IN p_nom varchar(50), IN p_quantite int, IN p_prix float(5,2), IN p_typeFilm varchar(50), IN p_developpement varchar(50), IN p_sensibilite varchar(50), IN p_format int)
begin 
        UPDATE produit SET idproduit = p_idproduit, img = p_img, nom = p_nom, quantite = p_quantite, prix = p_prix WHERE idproduit = p_idproduit;
        UPDATE pellicule SET idproduit = p_idproduit, typeFilm = p_typeFilm, developpement = p_developpement, sensibilite = p_sensibilite, format = p_format WHERE idproduit = p_idproduit;
end $
delimiter ;
--FIN
--Procédure stocker pour modifier un objectif
delimiter $
create procedure updateObjectif (IN p_idproduit int, IN p_img varchar(50), IN p_nom varchar(50), IN p_quantite int, IN p_prix float(5,2), IN p_poids float, IN p_diametreMaxAndLongueur int, IN p_diametreFiltre int, IN p_moteurAutoFocus varchar(50), IN p_agrandissement varchar(50))
begin 
        UPDATE produit SET idproduit = p_idproduit, img = p_img, nom = p_nom, quantite = p_quantite, prix = p_prix WHERE idproduit = p_idproduit;
        UPDATE objectif SET idproduit = p_idproduit, poids = p_poids, diametreMaxAndLongueur = p_diametreMaxAndLongueur, diametreFiltre = p_diametreFiltre, moteurAutoFocus = p_moteurAutoFocus, agrandissement = p_agrandissement WHERE idproduit = p_idproduit;
end $
delimiter ;
--FIN

--Procédure stocker pour supprimer un appareil
delimiter  $
create procedure deleteAppareil(IN p_idproduit int)
begin
        delete from appareil where idproduit = p_idproduit;
        delete from produit where idproduit = p_idproduit;
end  $
delimiter ;
--FIN

--Procédure stocker pour afficher l'appareil dans son entiereté
delimiter $
create procedure selectEntireAppareil(IN p_idproduit int)
begin
    select p.idproduit, p.img, p.nom, p.quantite, p.prix, a.formatPellicule, a.nbPoses, a.focale, a.alimentation, a.dimension
    from appareil a, produit p
    where a.idproduit = p_idproduit
    and p.idproduit = p_idproduit;
end $
delimiter ; 
--FIN

--Procédure stocker pour insérer une pellicule
delimiter $
create procedure insertPellicule (IN p_img varchar(50), IN p_nom varchar(50), IN p_quantite int, IN p_prix float(5,2), IN p_typeFilm varchar(50), IN p_developpement varchar(50), IN p_sensibilite varchar(50),IN p_format int)
begin 
       declare p_idproduit int ;
       insert into produit values (null, p_img, p_nom, p_quantite, p_prix ); 

       select idproduit into p_idproduit from produit
       where img = p_img and nom = p_nom and quantite = p_quantite and prix = p_prix ; 

       insert into pellicule values (p_idproduit, p_typeFilm, p_developpement, p_sensibilite, p_format); 
end $
delimiter ;
--FIN de la procédure

--Procédure stocker pour supprimer une pellicule
delimiter  $
create procedure deletePellicule(IN p_idproduit int)
begin
        delete from pellicule where idproduit = p_idproduit;
        delete from produit where idproduit = p_idproduit;
end  $
delimiter ;
--FIN

--Procédure stocker pour afficher la pellicule dans son entiereté
delimiter $
create procedure selectEntirePellicule(IN p_idproduit int)
begin
    select p.idproduit, p.nom, p.quantite, p.prix, pell.typeFilm, pell.developpement, pell.sensibilite, pell.format
    from pellicule pell, produit p
    where pell.idproduit = p_idproduit
    and p.idproduit = p_idproduit;
end $
delimiter ; 
--FIN

--Procédure stocker pour insérer un objectif
delimiter $
create procedure insertObjectif (IN p_img varchar(50), IN p_nom varchar(50), IN p_quantite int, IN p_prix float(5,2), IN p_poids float, IN p_diametreMaxAndLongueur float, IN p_diametreFiltre float, IN p_moteurAutoFocus varchar(50), IN p_agrandissement varchar(50))
begin 
       declare p_idproduit int ;
       insert into produit values (null, p_img, p_nom, p_quantite, p_prix ); 

       select idproduit into p_idproduit from produit
       where img = p_img and nom = p_nom and quantite = p_quantite and prix=p_prix ; 

       insert into objectif values (p_idproduit, p_poids, p_diametreMaxAndLongueur, p_diametreFiltre, p_moteurAutoFocus, p_agrandissement); 
end $
delimiter ;
--FIN de la procédure

--Procédure stocker pour supprimer un objectif
delimiter  $
create procedure deleteObjectif(IN p_idproduit int)
begin
        delete from objectif where idproduit = p_idproduit;
        delete from produit where idproduit = p_idproduit;
end  $
delimiter ;
--FIN

--Procédure stocker pour afficher l'objectif dans son entiereté
delimiter $
create procedure selectEntireObjectif(IN p_idproduit int)
begin
    select p.idproduit, p.nom, p.quantite, p.prix, o.poids, o.diametreMaxAndLongueur, o.diametreFiltre, o.moteurAutoFocus, o.agrandissement
    from produit p, objectif o
    where o.idproduit = p_idproduit
    and p.idproduit = p_idproduit;
end $
delimiter ; 
--FIN
--Procedure d'insertion panier
delimiter $
create procedure insertPanier (IN p_idproduit int(3))
begin
    declare p_idpanier int(3) ;
    insert into panier value (null, 0);
    select distinct LAST_INSERT_ID() into p_idpanier from panier ; 
    insert into contenir values (1, p_idproduit, p_idpanier);
end $
delimiter ;
--FIN
--Prcédure update contenir (classe liaison entre panier et produit)
delimiter $
create procedure updateContenir (IN p_idproduit int(3), IN p_idpanier int(3))
begin
   update contenir set qte = qte + 1 where idproduit = p_idproduit and idpanier = p_idpanier; 
end $
delimiter ;
--FIN
---------------------------------------------------------------------Fin procédures stockés---------------------------------------------------------------------------------

---------------------------------------------------------------------Insertions---------------------------------------------------------------------------------------------
call insertAppareil ('images/photoAppareil.jpg','NOKIA-33', 50, 449.99, 10, 5, 15, 'USB', '15x40x50');
call insertAppareil ('images/photoAppareil2.jpg','Lomo LC-A 120 Camera', 50, 449.99, 10, 5, 15, 'USB', '15x40x50');

call insertPellicule ('images/photoAppareil.jpg','NomPellicule', 20, 24.99,'Jsp', 'Jsp2', 'Jsp3', 5);

call insertObjectif ('images/photoAppareil.jpg','NomObjectif', 100, 144.99, 0.500, 15.50, 8.00, 'Blabla', '50 metre');

insert into user values
    (null, "Jouvet", "Erwann", "1 rue de Gentilly", "erwann.j@gmail.com", "erwann", "user"), (null, "Rencontre", "Hermann", "1 rue d'Ivry", "hermann.r@gmail.com", "hermann", "admin");
-- call updateAppareil (1, "images/photoAppareil.jpg", "NOKIA-35", 55, 445.99, 155, 145, 135, "USB-C", "15x40x50");
-- call updatePellicule(3, "images/photoAppareil2.jpg", "test", "test", "test", "test", "test", "test", "test");
---------------------------------------------------------------------Fin insertions-----------------------------------------------------------------------------------------

---------------------------------------------------------------------Triggers-----------------------------------------------------------------------------------------------
--TRIGGER POUR INSERER LE PRIX DANS LE PANIER QUAND L'UTILISATEUR ACHETE UN PRODUIT AVEC UNE CERTAINE QUANTITE
delimiter $
create trigger insertContenir after insert on contenir
for each row 
begin
    declare p_prix float;
    select prix into p_prix from produit where idproduit = new.idproduit;
    update panier set prix = prix + p_prix * new.qte where idpanier = new.idpanier;
end $
delimiter ;
--FIN DU TRIGGER

--TRIGGER POUR MODIFIER LE PRIX QUAND L'UTILISATEUR MODIFIE LA QUANTITE D'UN PRODUIT DANS SON PANIER
delimiter $
create trigger updateContenir after update on contenir
for each row 
begin
    declare p_prix float;
    select prix into p_prix from produit where idproduit = new.idproduit;
    update panier set prix = prix - p_prix * old.qte where idpanier = new.idpanier;
    update panier set prix = prix + p_prix * new.qte where idpanier = new.idpanier;
end $
delimiter ;
--FIN DU TRIGGER
---------------------------------------------------------------------Fin Triggers-------------------------------------------------------------------------------------------

---------------------------------------------------------------------Debut vues---------------------------------------------------------------------------------------------
create view viewAppareil as (
    select p.idproduit, p.img, p.nom, p.quantite, p.prix, a.formatPellicule, a.nbPoses, a.focale, a.alimentation, a.dimension
    from appareil a, produit p
    where a.idproduit = p.idproduit
);
create view viewPellicule as (
    select p.idproduit, p.img, p.nom, p.quantite, p.prix, pell.typeFilm, pell.developpement, pell.sensibilite, pell.format
    from pellicule pell, produit p
    where pell.idproduit = p.idproduit
);
create view viewObjectif as (
    select p.idproduit, p.img, p.nom, p.quantite, p.prix, o.poids, o.diametreMaxAndLongueur, o.diametreFiltre, o.moteurAutoFocus, o.agrandissement
    from objectif o, produit p
    where o.idproduit = p.idproduit
);
create view viewSumPanier as(
    select sum(c.idproduit)
    from contenir c, panier p
    where c.idpanier=p.idpanier
);
-----------------------------------------------------------------Fin vues---------------------------------------------------------------------------------------------------