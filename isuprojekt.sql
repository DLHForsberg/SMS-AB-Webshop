DROP DATABASE IF EXISTS isuprojekt;
CREATE DATABASE isuprojekt DEFAULT CHARACTER SET 'utf8';
USE isuprojekt;

CREATE TABLE users(
    userid VARCHAR(30) UNIQUE,
    pas CHAR (255),
	PRIMARY KEY (userid)
    )ENGINE=innodb DEFAULT CHARSET=utf8;


CREATE TABLE Kund(
    Kundnr INT auto_increment,
    Fornamn VARCHAR(30) not null,
	Efternamn VARCHAR(30) not null,
	Gatuadress VARCHAR (30) not null,
	Postadress VARCHAR (20) not null,
	Personnummer CHAR (12),
	Email VARCHAR (100) not null,
	Telefonnummer VARCHAR (12),
	Kon VARCHAR (6),
	userid VARCHAR (30) UNIQUE,
	PRIMARY KEY (Kundnr),
	FOREIGN KEY (userid) REFERENCES users (userid)
	)ENGINE=innodb DEFAULT CHARSET=utf8;
    
CREATE TABLE Produkt(
    Produktnamn VARCHAR (20),
	Artikelnr char(35),
	Kategori VARCHAR (20),
	Marke VARCHAR (20),
	Pris INT,
	Beskrivning VARCHAR (255),
	Vikt VARCHAR (10),
	PRIMARY KEY (Artikelnr)
    )ENGINE=innodb DEFAULT CHARSET=utf8;
    
CREATE TABLE Kop(
	Ordernr int not null auto_increment,
    userid VARCHAR(30) not null,
    artikelnr char(35),
    prodnamn varchar(20),
    pris int,
    datum DATE,
	PRIMARY KEY (Ordernr, userid),
	FOREIGN KEY (userid) REFERENCES Kund (userid)
	)ENGINE=innodb DEFAULT CHARSET=utf8;



CREATE TABLE kundkorg(
    korgid int not null auto_increment,
    userid varchar (30) not null,
    artikelnr char(35),
    prodnamn varchar(20),
    pris int,
    datum DATE,
    PRIMARY KEY (korgid, userid),
    FOREIGN KEY (userid) REFERENCES Kund (userid)
    )ENGINE=INNODB DEFAULT CHARSET=utf8;
    
					-- Totalsumman används för att skriva ut totalsumma av produkter i kundkorg
DELIMITER //	

  CREATE PROCEDURE totalsumman()                                                                                                                         
  BEGIN                                                                                                                                                 
      SELECT SUM(pris) FROM kundkorg;                                                                                                                   END;                                                                                                                                                  
//                                                                                                                                                  
  
                                                                                                                                                        
DELIMITER ;                                        

call totalsumman();     
					-- View som används för att få fram data att presentera på kvittot på webbsidan
create view betalning as
select Kund.userid,Kund.Fornamn,Kund.Efternamn,Kund.Gatuadress,Kund.Postadress,Kop.Prodnamn,Kop.pris,Kop.datum
from Kund,Kop
where Kund.userid = Kop.userid;

SELECT * FROM helikopter;