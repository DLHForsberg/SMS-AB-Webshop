CREATE TABLE helikopter(
	name varchar(30),
	decription varchar(255),
	pricelist char(5),
	weigh int,
	isstocked varchar(3),
	PRIMARY KEY (name)
)ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE accessoarer(
	name varchar(30),
	decription varchar(255),
	pricelist char(5),
	weigh int,
	isstocked varchar(3),
	PRIMARY KEY (name)
)ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE reservdelar(
	name varchar(30),
	decription varchar(255),
	pricelist char(5),
	weigh int,
	isstocked varchar(3),
	PRIMARY KEY (name)
)ENGINE=innodb DEFAULT CHARSET=utf8;

INSERT INTO helikopter (name,decription,pricelist,weigh,isstocked)
VALUES ('Jr vigor CS', 'En helikopter designad av den tvåfaldige världsmästaren Curtis Youngblood. Stommen använder sig av kolfiber för att få ner vikten vilket resulterar i att motorn inte behöver jobba lika hårt.', '9000','5','Y');

INSERT INTO helikopter (name,decription,pricelist,weigh,isstocked)
VALUES ('F1 Carbon','F1 Carbon är konstruerad enligt den allra senaste teknologin. F1 är den naturliga utvecklingen från en 30-50 klass sport helikopter utan att priset blir lika högt som hos andra 60 klass modeller. Låga reservdelspriser och svensk byggbeskrivning.','6000','3','Y');

INSERT INTO reservdelar (name,decription,pricelist,weigh,isstocked)
VALUES ('Raptor','Tillverkad för hand i rostfritt stål, ger en mycket fin gång, motverkar överhettning tack vare rätt volym. Oerhört lång livslängd. Balansdämpare låg ljudnivå bra drag i motorn. Vi har även denna dämpare för utlopp höger.','1500','2','Y');

INSERT INTO reservdelar (name,decription,pricelist,weigh,isstocked)
VALUES ('Ergo 46','Tillverkad för hand i rostfritt stål, ger en mycket fin gång, motverkar överhettning tack vare rätt volym. Oerhört lång livslängd.','349','5','Y');





INSERT INTO reservdelar (name,decription,pricelist,weigh,isstocked)
VALUES ('Quick 30 pro','Tillverkad för hand i rostfritt stål, ger en mycket fin gång, motverkar överhettning tack vare rätt volym. Oerhört lång livslängd.  Balansdämpare låg ljudnivå bra drag i motorn.','2990','5','Y');

INSERT INTO reservdelar (name,decription,pricelist,weigh,isstocked)
VALUES ('3 kammars dämpare','3 kammars ljuddämpare. Finns i 6.5 till 18 kubik. Alla har samma pris och är i rostfritt stål. Otroligt tyst, ger ett ordentligt effekt tillskott. Ange storlek på pipan vid beställning. Passar även fint till flygplan.','600','1','Y');

INSERT INTO reservdelar (name,decription,pricelist,weigh,isstocked)
VALUES ('concept 46R','Kolla vad smart justeringen får tomgången är låst med ett hål genom dämparen.','800','5','Y');

INSERT INTO reservdelar (name,decription,pricelist,weigh,isstocked)
VALUES ('Manifolder','Manifolder i rostfritt stål. Går aldrig sönder, rätt hål anpassat till motorns utlopp. Rostfritt stål för höga temperaturer och har många gånger en längre livslängd än aluminium. Klart för OS men kan modifieras för de allra flesta motorerna.','299','1','Y');

INSERT INTO reservdelar (name,decription,pricelist,weigh,isstocked)
VALUES ('Klämmor','Klämmorna har en teflonkoppling vilket går att klämmorna är bland de bästa som går att köpa.','199','1','Y');

INSERT INTO accessoarer (name,decription,pricelist,weigh,isstocked)
VALUES ('Keps','Köp en snygg keps från SMS AB med vår snygga logga på. Kepsen är gjord i slitstarkt material för att hålla får dina äventyr med våra produkter.','149','1','Y');

INSERT INTO accessoarer (name,decription,pricelist,weigh,isstocked)
VALUES ('T-shirt','En snygg T-shirt med loggan från SMS AB gjord i 100% bomull får en bra komfort.','199','1','Y');

select * from users;