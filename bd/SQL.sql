DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda;
USE tienda;

CREATE TABLE tblProductos (
  ID int NOT NULL auto_increment,
  Nombre varchar(50) NOT NULL,
  Autor varchar(50) NOT NULL,
  Precio decimal(5,2) NOT NULL,
  Descripcion text NOT NULL,
  Imagen varchar(100) NOT NULL,
  CONSTRAINT PK_PRODUCTOS_ID PRIMARY KEY (ID)
);

INSERT INTO tblProductos VALUES
(1, 'Learn PHP 7', 'Steve Prettyman', '30.95', 'This new book on PHP 7 introduces writing solid, secure, object-oriented code in the new PHP 7: you will create a complete three-tier application using a natural process of building and testing modules within each tier. This practical approach teaches you about app development and introduces PHP features when they are actually needed rather than providing you with abstract theory and contrived examples.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4842/9781484217290.jpg'),
(2, 'Professional ASP.NET MVC 5 ', 'Jon Galloway', '42.00', 'MVC 5 is the newest update to the popular Microsoft technology that enables you to build dynamic, data-driven websites. Like previous versions, this guide shows you step-by-step techniques on using MVC to best advantage, with plenty of practical tutorials to illustrate the concepts. It covers controllers, views, and models; forms and HTML helpers; data annotation and validation; membership, authorization, and security.', 'https://images-na.ssl-images-amazon.com/images/I/51u-ERS1W8L._SX396_BO1,204,203,200_.jpg'),
(3, 'Learning Vue.js 2', 'Olga Filipova', '105.35', 'Learn how to propagate DOM changes across the website without writing extensive jQuery callbacks code.\r\n\r\nLearn how to achieve reactivity and easily compose views with Vue.js and understand what it does behind the scenes.\r\n\r\nExplore the core features of Vue.js with small examples, learn how to build dynamic content into preexisting web applications, and build Vue.js applications from scratch.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7864/9781786469946.jpg'),
(4, 'SAPIENS ', 'YUVAL NOAH HARARI', '19.90', 'El libro de no ficción del AÑO\r\n\r\nUn best seller internacional con más de un millón de ejemplares vendidos\r\n\r\nLúcido e iluminador: la historia de la humanidad en un solo volumen.\r\n\r\nEste es el fascinante relato de nuestra extraordinaria historia: de simios sin importancia a amos del mundo.\r\n\r\n¿Cómo logró nuestra especie imponerse en la lucha por la existencia? ¿Por qué nuestros ancestros recolectores se unieron para crear ciudades y reinos? ¿Cómo llegamos a creer en dioses, en naciones o en los derechos humanos; a confiar en el dinero, en los libros o en las leyes? ¿Cómo acabamos sometidos a la burocracia, a los horarios y al consumismo? ¿Y cómo será el mundo en los milenios venideros?\r\n\r\nEn De animales a dioses, Yuval Noah Harari traza una breve historia de la humanidad, desde los primeros humanos que caminaron sobre la Tierra hasta los radicales y a veces devastadores avances de las tres grandes revoluciones que nuestra especie ha protagonizado: la cognitiva, la agrícola y la científica. A partir de hallazgos de disciplinas tan diversas como la biología, la antropología, la paleontología o la economía, Harari explora cómo las grandes corrientes de la historia.', 'https://imagessl3.casadellibro.com/a/l/t5/23/9788499926223.jpg'),
(5, 'Y JULIA RETÓ A LOS DIOSES', 'SANTIAGO POSTEGUILLO', '22.90', 'Cuando el enemigo es tu propio hijo…, ¿existe la victoria?\r\n\r\nMantenerse en lo alto es mucho más difícil que llegar. Julia está en la cúspide de su poder, pero la traición y la división familiar amenazan con echarlo todo a perder. Para colmo de males, el médico Galeno diagnostica que la emperatriz padece lo que él, en griego, llama karkinos, y que los romanos, en latín, denominan cáncer. El enfrentamiento brutal entre sus dos hijos aboca la dinastía de Julia al colapso. En medio del dolor físico y moral que padece la augusta, cualquiera se hubiera rendido. Se acumulan tantos desastres que Julia siente que es como si luchara contra los dioses de Roma. Pero, en medio del caos, una historia de amor más fuerte que la muerte, una pasión capaz de superar pruebas imposibles emerge al rescate de Julia. Nada está perdido. La partida por el control del imperio continúa.', 'https://imagessl3.casadellibro.com/a/l/t5/93/9788408224693.jpg'),
(6, 'PRINCIPITO', 'ANTOINE DE SAINT-EXUPERY', '5.65', 'Fábula mítica y relato filosófico que interroga acerca de la relación del ser humano con su prójimo y con el mundo,El Principito concentra, con maravillosa simplicidad, la constante reflexión de Saint-Exupéry sobre la amistad, el amor, la responsabilidad y el sentido de la vida.', 'https://imagessl8.casadellibro.com/a/l/t5/98/9788498381498.jpg'),
(7, 'LA CIUDAD DE LOS PRODIGIOS', 'CLAUDIO STASSI', '23.75', 'En el período comprendido entre las dos Exposiciones Universales de Barcelona de 1888 y 1929, con el telón de fondo de una ciudad tumultuosa, agitada y pintoresca, real y ficticia, asistimos a las andanzas de Onofre Bouvila, inmigrante paupérrimo, repartidor de propaganda anarquista y vendedor ambulante de crecepelo, y su ascensión a la cima del poder financiero y delictivo. Mendoza, en la novela original, nos propone un singularísimo avatar de la novela picaresca y un brillante carrusel imaginativo de los mitos y fastos locales. Una fantasía satírica y lúdica cuyo sólido soporte realista inicial no excluye la fabulación libérrima.', 'https://imagessl6.casadellibro.com/a/l/t5/76/9788413410876.jpg'),
(8, 'EL MONJE QUE VENDIO SU FERRARI', 'ROBIN SHARMA', '8.50', 'El monje que vendió su Ferrari es la sugerente y emotiva historia de Julian Mantle, un super abogado cuya vida estresante, desequilibrada y obsesionada con el dinero acaba provocándole un infarto. Ese desastre provoca en Julian una crisis espiritual que le lleva a enfrentarse a las grandes cuestiones de la vida. Esperando descubrir los secretos de la felicidad y el esclarecimiento, emprende un extraordinario viaje por el Himalaya para conocer una antiquísima cultura de hombres sabios. Y allí descubre un modo de vida más gozoso, así como un método que le permite liberar todo su potencial y vivir con pasión, determinación y paz. Escrito a modo de fábula, este libro contiene una serie de sencillas y eficaces lecciones para mejorar nuestra manera de vivir. Vigorosa fusión de la sabiduría espiritual de Oriente con los principios del éxito occidentales, muestra paso a paso cómo vivir con más coraje, alegría, equilibrio y satisfacción. «Una cautivadora historia que enseña y deleita al mismo tiempo.» Paolo Coelho', 'https://imagessl2.casadellibro.com/a/l/t5/22/9788499087122.jpg');

CREATE TABLE tblRoles (
  COD_ROL varchar(10) NOT NULL,
  Descripccion varchar(500) NOT NULL,
  CONSTRAINT PK_COD_ROL PRIMARY KEY (COD_ROL)  
);

INSERT INTO tblRoles VALUES
('Admin0', 'Administrador pagina web'),
('Usu1', 'Usuario registrado');

CREATE TABLE tblUsuarios (
  UID int NOT NULL auto_increment,
  Email varchar(30) NOT NULL,
  Username varchar(30) NOT NULL,
  Contrasena varchar(30) NOT NULL,
  Direccion varchar(300) NOT NULL,
  Telefono int NOT NULL,
  Fecha_Nacimiento varchar(10) NOT NULL,
  Rol varchar(10) DEFAULT 'Usu1',
  CONSTRAINT PK_USUARIOS_UID PRIMARY KEY (UID),
  CONSTRAINT FK_COD_ROL FOREIGN KEY (Rol) REFERENCES tblRoles(COD_ROL) ON DELETE CASCADE 
); 

INSERT INTO tblUsuarios VALUES
('', 'adimin@admin.es', 'Administrador', '11XuUpKqRNeIPg7SDJIjrQ==', '', '', '', 'Admin0'),
('', 'user@gmail.com', 'USER', 'o2mg6F1tNQw/MdgOTest6w==', 'PL. 0', 0, '0', 'Usu1');

CREATE TABLE tblPedidos (
  PID int NOT NULL auto_increment,
  Total decimal(10,2) NOT NULL,
  Estado text NOT NULL,
  direccionP varchar(50) NOT NULL,
  CONSTRAINT PK_PEDIDOS_PID PRIMARY KEY (PID)
);

CREATE TABLE hacePedido (
  PID int NOT NULL auto_increment,
  UID int NOT NULL, 
  CODP varchar(50) NOT NULL, 
  Fecha datetime NOT NULL,
  Pago text NOT NULL,
  CONSTRAINT PK_HACEPEDIDO PRIMARY KEY(PID,UID),
  CONSTRAINT FK_PEDIDOS FOREIGN KEY (PID) REFERENCES tblPedidos(PID) ON DELETE CASCADE, 
  CONSTRAINT FK_USUARIOS FOREIGN KEY (UID) REFERENCES tblUsuarios(UID) ON DELETE CASCADE 
);

CREATE TABLE lineaPedido (
  ID int NOT NULL,
  PID int NOT NULL,
  Cantidad int NOT NULL,
  CONSTRAINT PK_LINEAPEDIDO PRIMARY KEY(PID,ID),
  CONSTRAINT FK_PEDIDOS_PID FOREIGN KEY (PID) REFERENCES tblPedidos(PID) ON DELETE CASCADE, 
  CONSTRAINT FK_PRODUCTOS_ID FOREIGN KEY (ID) REFERENCES tblProductos(ID) ON DELETE CASCADE 
);


