DROP DATABASE IF EXISTS smsab;
CREATE DATABASE smsab DEFAULT CHARACTER SET 'utf8';
USE smsab;
drop table kundkorg;
drop table Kop;

CREATE TABLE users(
    userid VARCHAR(30) UNIQUE,
    pas CHAR (255),
	PRIMARY KEY (userid)
    );


CREATE TABLE Kund(
    Kundnr INT IDENTITY(1,1),
    Fornamn VARCHAR(30) not null,
	Efternamn VARCHAR(30) not null,
	Gatuadress VARCHAR (30) not null,
	Postadress VARCHAR (20) not null,
	Personnummer CHAR (12),
	Email VARCHAR (20) not null,
	Telefonnummer VARCHAR (12),
	Kon VARCHAR (6),
	userid VARCHAR (30) UNIQUE,
	PRIMARY KEY (Kundnr),
	FOREIGN KEY (userid) REFERENCES users (userid)
	);
    
CREATE TABLE Produkt(
    Produktnamn VARCHAR (20),
	Artikelnr char(35),
	Kategori VARCHAR (20),
	Marke VARCHAR (20),
	Pris INT,
	Beskrivning VARCHAR (255),
	Vikt VARCHAR (10),
	PRIMARY KEY (Artikelnr)
    );
    
CREATE TABLE Kop(
	Ordernr int not null IDENTITY(1,1),
    userid VARCHAR(30) not null,
    artikelnr char(35),
    prodnamn varchar(20),
    pris int,
    datum DATE,
	PRIMARY KEY (Ordernr, userid),
	FOREIGN KEY (userid) REFERENCES Kund (userid)
	);



CREATE TABLE kundkorg(
    korgid int not null IDENTITY(1,1),
    userid varchar (30) not null,
    artikelnr char(35),
    prodnamn varchar(20),
    pris int,
    datum DATE,
	totalpris int,
    PRIMARY KEY (korgid, userid),
    FOREIGN KEY (userid) REFERENCES Kund (userid)
    );
    


  CREATE PROCEDURE totalsumman()                                                                                                                         
  BEGIN                                                                                                                                                 
      SELECT SUM(pris) FROM kundkorg;                                                                                                                   END;                                                                                                                                                  
                                                                                                                                                
  
                                                                                                                                                        
DELIMITER ;                                        

call totalsumman();     
                                    
create view betalning as
select Kund.userid,Kund.Fornamn,Kund.Efternamn,Kund.Gatuadress,Kund.Postadress,Kop.Prodnamn,Kop.pris,Kop.datum
from Kund,Kop
where Kund.userid = Kop.userid;


