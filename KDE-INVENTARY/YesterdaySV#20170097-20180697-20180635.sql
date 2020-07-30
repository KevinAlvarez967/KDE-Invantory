CREATE TABLE Proveedor (
  id_proveedor SERIAL PRIMARY KEY,
  Nombre varchar(30),
  Apellido varchar(40),
  Correo varchar(60),
  Telefono varchar(9),
  Direccion varchar(150)
);


SELECT  id_compra, fecha_compra, proveedor.nombre, proveedor.apellido from compra
INNER JOIN proveedor USING(id_proveedor) 



Select * from compra
Select * from Det_compra


/*
Select id_proveedor, Nombre, Apellido, Correo, Telefono, Direccion from Proveedor ORDER BY Nombre

DELETE FROM Proveedor where id_proveedor = 6
UPDATE Proveedor SET Nombre = 'Douglas elyn',  Apellido = 'Cortez orellana',   Correo = 'Cortez@hotmail.com',  Telefono = '7598-7451',   Direccion = 'Av monte video, colonia monte verde casa z-10' WHERE id_proveedor = 4


INSERT INTO  Proveedor (Nombre, Apellido, Correo, Telefono, Direccion) 
    VALUES ('Douglas elyn', 'adkndjasasdas', 'dogy@hotmail.com', '7152-6989', 'ansdnasndjakndasndkansdas')

ALTER TABLE Proveedor ALTER COLUMN Direccion Type varchar(150)

 alter table Proveedor
  add constraint UQ_Correo_proveedor
  unique (Correo);

 alter table Proveedor
  add constraint UQ_Direccion_proveedor
  unique (Direccion);

 alter table Proveedor
  drop constraint UQ_Direccion_proveedor;
*/

CREATE TABLE Categoria (
  id_categorias SERIAL PRIMARY KEY,
  Categoria varchar(25)
);

CREATE TABLE Estado_u_Geren (
  id_estado SERIAL PRIMARY KEY,
  estadoGeren varchar(15)
);

CREATE TABLE Tipo_u_Geren (
  id_tipo SERIAL PRIMARY KEY,
  tipoGeren varchar(15)
);

CREATE TABLE Estado_usuario (
  id_estado SERIAL PRIMARY KEY,
  Estado varchar(15)
);

CREATE TABLE Tipo_usuario (
  id_tipo SERIAL PRIMARY KEY,
  Tipo varchar(15)
);

CREATE TABLE Mesa (
  id_mesa SERIAL PRIMARY KEY,
  Numero_mesa numeric(3),
  Estado varchar(20),
  Tamaño numeric(3)
);
/*
SELECT id_mesa, Numero_mesa, Estado from Mesa WHERE Estado = 'Disponible'
Select id_mesa, Numero_mesa from Mesa
*/

CREATE TABLE Promociones (
  id_promociones SERIAL PRIMARY KEY,
  Descripcion varchar(40),
  Codigo numeric(10),
  Descuento numeric(5,2),
  Estado_prom varchar(10)
);

CREATE TABLE Sucursal (
  id_sucursal SERIAL PRIMARY KEY,
  Nombre varchar(15),
  Direccion varchar(100),
  Telefono varchar(9)
);




CREATE TABLE Usuarios_Gere (
  id_usuario_Geren SERIAL PRIMARY KEY,
  Nombres varchar(30),
  Apellidos varchar(40),
  Usuario varchar(35),
  Pass varchar(9),
  Correo varchar(60),
  telefono varchar(9),
  id_tipo int,
  id_estado int,
  id_sucursal int
);

/*
UPDATE Usuarios_Gere SET Nombres = 'Juan Antonio', Apellidos = 'Anaya Perez', Correo = 'Juan@gmail.com', Usuario = 'Juan', telefono = '71307863' WHERE id_usuario_Geren = 31

Select * from Usuarios_Gere
*/



CREATE TABLE Sub_categoria (
  id_Subcategoria SERIAL PRIMARY KEY,
  sub_categoria varchar(15),
  id_categorias int
);

/*
Select sub_categoria, categoria from Sub_categoria INNER JOIN Categoria USING (id_categorias)
*/
CREATE TABLE Producto (
  id_producto SERIAL PRIMARY KEY,
  producto varchar(40),
  Precio numeric(5,2),
  id_Subcategoria int
);
/*
Select * from producto
*/
CREATE TABLE Inventario (
  id_inventario SERIAL PRIMARY KEY,
  stock numeric(5,2),
  Peso varchar(15),
  id_sucursal int,
  id_producto int
);

CREATE TABLE Compra (
  id_compra SERIAL PRIMARY KEY,
  Fecha_compra varchar(25),
  Total_compra numeric(5,2),
  id_proveedor int
);
/*
ALTER TABLE Compra ADD COLUMN estado varchar(50)


SELECT id_compra, fecha_compra, Total_compra, proveedor.nombre, proveedor.apellido from Compra INNER JOIN
     proveedor USING(id_proveedor)
     WHERE id_compra = 1




SELECT id_compra, fecha_compra, Total_compra, proveedor.nombre, proveedor.apellido from Compra INNER JOIN
        proveedor USING(id_proveedor) WHERE fecha_compra ILIKE '05/16/2020' OR proveedor.nombre ILIKE 'Guillermo' OR proveedor.apellido ILIKE 'Cartagena'






Select * from Compra
*/

CREATE TABLE Det_compra (
  id_Det_compra SERIAL PRIMARY KEY,
  Cantidad numeric(5,2),
  Precio numeric(5,2),
  id_producto int,
  id_compra int
);


/*
Select id_Det_compra, Cantidad, Precio, id_producto, id_compra FROM Det_compra where id_compra = 3


SELECT SUM(Precio) FROM Det_compra where id_compra = 3


SELECT SUM (Det_compra.Precio) as Total, id_compra, fecha_compra, proveedor.nombre, proveedor.apellido from Det_compra INNER JOIN
       compra USING (id_compra) INNER JOIN proveedor USING(id_proveedor) GROUP BY  id_compra, fecha_compra, proveedor.nombre, proveedor.apellido 





Select * from producto
Select * from Sub_categoria

Select producto, producto.precio, Sub_categoria.sub_categoria, Det_compra.cantidad FROM Det_compra INNER JOIN Producto USING(id_producto)
INNER JOIN Sub_categoria USING (id_subcategoria) Where id_compra = 12

Select * FROM Det_compra




Select * from tipo_Usuario
*/
CREATE TABLE Usuario (
  id_usuario SERIAL PRIMARY KEY,
  nombre varchar(50),
  apellido varchar(55),
  Usuario varchar(40),
  Clave varchar(9),
  Correo varchar(60),
  telefono varchar(9),
  id_tipo int,
  id_estado int
);
/*
Delete from Usuario

ALTER TABLE Usuario Alter column Clave Type varchar(100)
Select * from Usuario

Select * from tipo_Usuario
Select * from Estado_usuario

Select id_usuario, nombre, apellido, Usuario, Correo, telefono, tipo_Usuario.tipo, Estado_usuario.estado FROM Usuario 
INNER JOIN tipo_Usuario USING (id_tipo) INNER JOIN Estado_usuario USING(id_estado)

*/
CREATE TABLE Pedidos (
  id_pedido SERIAL PRIMARY KEY,
  Estado varchar(15),
  Fecha varchar(15),
  id_usuario int,
  id_mesa int
);
/*
Select id_pedido, pedidos.Estado, Fecha, usuario.nombre, usuario.apellido, numero_mesa , id_mesa from Pedidos INNER JOIN usuario USING (id_usuario)
            INNER JOIN mesa USING(id_mesa)

Select * from usuario
SELECT  id_det_pedido, producto.producto, id_pedido, fecha , pedidos.Estado, numero_mesa FROM pedidos
            INNER JOIN det_pedido USING(id_pedido) INNER JOIN usuario USING (id_usuario)
            INNER JOIN mesa USING(id_mesa) INNER JOIN producto USING (id_producto)
			
CREATE TABLE Det_pedido (
  id_det_pedido SERIAL PRIMARY KEY,
  detalles varchar(100),
  Precio numeric(5,2),
  Cantidad numeric(5,2),
  id_pedido int,
  id_producto int,
  id_promociones int
);


SELECT SUM (producto.precio) as precio,  id_pedido, pedidos.Estado , Fecha, usuario.nombre, usuario.apellido, numero_mesa , id_mesa from Det_pedido 
INNER JOIN pedidos USING (id_pedido) INNER JOIN usuario USING (id_usuario)
            INNER JOIN mesa USING(id_mesa) INNER JOIN producto  USING(id_producto) 
			GROUP BY id_pedido, pedidos.Estado , Fecha, usuario.nombre, usuario.apellido, numero_mesa , id_mesa



SELECT Cantidad, producto, producto.precio FROM det_pedido INNER JOIN producto USING(id_producto) WHERE id_pedido = 27 ?


SELECT  id_det_pedido , producto.producto, id_pedido, pedidos.Estado, numero_mesa FROM det_pedido
            INNER JOIN pedidos USING(id_pedido) INNER JOIN usuario USING (id_usuario)
            INNER JOIN mesa USING(id_mesa) INNER JOIN producto USING (id_producto)

Delete from Det_pedido where id_producto = 15 AND id_pedido = 27
Delete from Pedidos
Delete from Usuario
DELETE from Det_pedido where id_producto = 8 AND id_det_pedido = 10

	Select * from Det_pedido
SELECT Cantidad, producto, producto.precio FROM det_pedido INNER JOIN producto USING(id_producto) WHERE id_det_pedido = 1

SELECT MAX (producto.precio) as precio,  id_pedido, numero_mesa, fecha, pedidos.estado, usuario.nombre, usuario.apellido  FROM det_pedido
        INNER JOIN pedidos USING(id_pedido) INNER JOIN usuario USING (id_usuario)
		INNER JOIN mesa USING(id_mesa) INNER JOIN producto USING (id_producto) GROUP BY id_pedido, numero_mesa, fecha, pedidos.estado, usuario.nombre, usuario.apellido


SELECT id_pedido, numero_mesa, fecha, pedidos.estado, usuario.nombre, usuario.apellido, det_pedido.precio FROM det_pedido
        INNER JOIN pedidos USING(id_pedido) INNER JOIN usuario USING (id_usuario) INNER JOIN mesa USING(id_mesa)  
        WHERE fecha ILIKE '10/20/2021' 




Select id_pedido, numero_mesa, fecha, pedidos.estado, usuario.nombre, usuario.apellido, det_pedido.precio FROM det_pedido
 INNER JOIN pedidos USING(id_pedido) INNER JOIN usuario USING (id_usuario) INNER JOIN mesa USING(id_mesa)
*/

ALTER TABLE Usuarios_Gere ADD FOREIGN KEY (id_tipoGeren) REFERENCES Tipo_u_Geren (id_tipo);
ALTER TABLE Usuarios_Gere ADD FOREIGN KEY (id_estadoGeren) REFERENCES Estado_u_Geren (id_estado);
ALTER TABLE Sub_categoria ADD FOREIGN KEY (id_categorias) REFERENCES Categoria (id_categorias);
ALTER TABLE Producto ADD FOREIGN KEY (id_Subcategoria) REFERENCES Sub_categoria (id_Subcategoria);
ALTER TABLE Usuarios_Gere ADD FOREIGN KEY (id_sucursal) REFERENCES Sucursal (id_sucursal);
ALTER TABLE Inventario ADD FOREIGN KEY (id_sucursal) REFERENCES Sucursal (id_sucursal);
ALTER TABLE Inventario ADD FOREIGN KEY (id_producto) REFERENCES Producto (id_producto);
ALTER TABLE Compra ADD FOREIGN KEY (id_proveedor) REFERENCES Proveedor (id_proveedor);
ALTER TABLE Det_compra ADD FOREIGN KEY (id_producto) REFERENCES Producto (id_producto);
ALTER TABLE Det_compra ADD FOREIGN KEY (id_compra) REFERENCES Compra (id_compra);
ALTER TABLE Usuario ADD FOREIGN KEY (id_tipo) REFERENCES Tipo_usuario (id_tipo);
ALTER TABLE Usuario ADD FOREIGN KEY (id_estado) REFERENCES Estado_usuario (id_estado);
ALTER TABLE Pedidos ADD FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario);
ALTER TABLE Pedidos ADD FOREIGN KEY (id_mesa) REFERENCES Mesa (id_mesa);
ALTER TABLE Det_pedido ADD FOREIGN KEY (id_pedido) REFERENCES Pedidos (id_pedido);
ALTER TABLE Det_pedido ADD FOREIGN KEY (id_producto) REFERENCES Producto (id_producto);
ALTER TABLE Det_pedido ADD FOREIGN KEY (id_promociones) REFERENCES Promociones (id_promociones);



/*Area de insert*/

Insert into Proveedor (Nombre, Apellido, Correo, Telefono, Direccion)
Values ('Kevin Oswaldo', 'Alvarez Rosales', 'Kevin.1234@gmail.com', '7130-7929',
	   'Av monte video, colonia monte verde casa h-1'),
	   ('Guillermo Salvador', 'Cartagena Mejia', 'Grabiela12@gmail.com', '6130-8562',
	   'Av monte video, colonia Plaza Lorem casa r-11'),
	   ('Jimena Vanessa', 'Escobar Palacios', 'shimi12@gmail.com', '7583-8412',
	   'Av monte video, colonia monte verde casa z-10'),
	   ('Douglas Elian', 'Cortez Rosales', 'Cor-Rosales@gmail.com', '7115-7335',
	   'Av monte video, colonia Plaza verde casa g-10'),
	   ('Fatima jeanette', 'Orellana Rodriguez', 'Fatimita@gmail.com', '6531-8475',
	   'Av monte video, colonia Travesía azul casa j-13');					  					  


Insert into Categoria (Categoria)
Values ('Plato Fuerte'),
	   ('Entrada'),
	   ('Ensalada'),
	   ('Sopas'),
	   ('Postre'),
	   ('Bebidas'),
	   ('Acompañamientos'),
	   ('Ingredientes');



Insert into Estado_u_Geren (estadoGeren)
Values ('Activo'),
	   ('Inactivo');
	   
	   
insert into Tipo_u_Geren (tipoGeren)
Values ('Administrador'),
	   ('Inventariado'),
	   ('Gestion Compra');
	   

Insert into Estado_usuario (Estado)
Values ('Activo'),
	   ('Inactivo');
	   

Insert into Tipo_usuario (Tipo)
Values ('Mesero'),
	   ('Cocina'),
	   ('Caja');


Insert into Mesa (numero_mesa, Estado, Tamaño)
Values (1,'Disponible',5),
	   (2,'Ocupada',2),
	   (3,'Fuera de servicio',10),
	   (4,'Disponible',5),
	   (5,'Ocupada',4),
	   (6,'Fuera de servicio',3),
	   (7,'Ocupada',4);
	   
/*
Alter table Promociones alter column descripcion SET DATA TYPE varchar(75);
Alter table Promociones alter column Estado_prom SET DATA TYPE varchar(15);
*/
Insert into promociones (Descripcion, Codigo, Descuento, Estado_prom)
Values ('Descuento en la compra de una coca-cola',0000000001, 0.50, 'Disponible'),
		('Descuento en la compra de un plato fuerte',0000000002, 1.50, 'Disponible'),
		('Descuento en la compra de una entreda',0000000003, 2.50, 'Disponible'),
		('Descuento en la compra de una sopa',0000000004, 0.75, 'No Disponible'),
		('Descuento en la compra de una ensalada',0000000005, 1.20, 'No Disponible'),
		('Descuento en la compra de un postre',0000000006, 0.50, 'No Disponible');	  
	   
insert into Sucursal (nombre, direccion,telefono)
Values ('YesterdaySV','Mercado Cuscatlan','2274-8469');	

Insert into Usuarios_Gere (nombres, apellidos, Usuario, pass, Correo, telefono, id_tipo, id_estado, id_sucursal)
Values ('Kevin Oswaldo','Alvarez Rosales','Kev','Figury16','Kevin12.34@gmail.com','7130-7929',1,1,1),
	   ('Guillermo Salvador','Cartagena Mejia','Memin','Mam123','Guillermo12@gmail.com','6125-4578',1,1,1),
	   ('Jimena Vanessa','Escobar Palacios','Jimenita','Jimena16','Kevin12.34@gmail.com','7121-7785',2,1,1),
	   ('Gabriela Sofia','Ramirez Cartagena','Grabi','Grab16','sipirryffahi-9266@yopmail.com','6335-7845',3,1,1),
	   ('Rosa Guadalupe','Rosales Torres','Ros','Roxy16','onnokurru-0808@yopmail.com','6851-2513',2,1,1),
	   ('Ernesto Jose','Torres Ramos','Neto','Ramitos16','xeddoqollut-0653@yopmail.com','7215-4582',3,1,1),
	   ('Maria Elba','Rosales','Mary','MaryE16','zettodera-3572@yopmail.com','7365-1254',2,1,1),
	   ('Daniel Stanley','Carranza Miguel','Miguel','Migi16','ipossiven-0915@yopmail.com','6258-3652',3,1,1),
	   ('Erika Alejandra','Bonilla Castillo','Erikita','Erika16','awufodarr-5235@yopmail.com','6587-7929',2,1,1),
	   ('Adriana Sofia','Aguilar Marroquin','Sofy','Shofy','ujexuxoddi-4319@yopmail.com','6842-8742',3,1,1),
	   ('Silvia Carolina','Andasol','shilvi','Shilvi12','ommivemop-7743@yopmail.com','7058-3652',2,1,1),
	   ('Jose Ricardo','Cruz Rodriguez','Chepe','Ricardito','vuzyrrekix-1224@yopmail.com','7478-3621',3,1,1),
	   ('Ana Laura','Navas','Lawis','Ana12','omuhunytt-2963@yopmail.com','6935-9452',2,1,1),
	   ('Fatima Jeannette','Orellana Gonsalez','beibi','Fati16','lygemenav-7623@yopmail.com','7465-7854',3,1,1),
	   ('Luis Salvador','Alavarez Montañana','Luisillo','Monta16','fepuwukal-8190@yopmail.com','6284-3621',2,1,1),
	   ('Juan Fernando','Alinares Castillo','Fer','Fer6','yllobellynn-1276@yopmail.com','6984-1254',3,1,1),
	   ('Francisco Sales','Miguel Miguel','Sales','Sales16','udytumepu-8118@yopmail.com','7842-5412',2,2,1),
	   ('Antonio Carlos','Mendoza Gonsalez','Tony','Tony16','womigogalle-9933@yopmail.com','7435-9543',3,2,1),
	   ('Dana Michelle','Alvarez Escobar','Dana','Dana16','edydujesa-5498@yopmail.com','6236-7216',2,2,1),
	   ('Miguel Pedro','Gonsalez Palacios','Pedro','Pedro16','ivammoku-0626@yopmail.com','6754-3156',3,2,1),
	   ('Gregorio Antonio','Mendoza Martinez','Gregory','Gremory16','cofemittic-1446@yopmail.com','6321-8478',2,2,1),
	   ('Hector Josue','Hernandez Mendoza','ChocoHector','vector16','liqunnohah-7633@yopmail.com','6951-2122',3,2,1),
	   ('Ariel Alberto','Sol','Sol','Alvert','pasorrewi-2611@yopmail.com','7845-6489',2,2,1),
	   ('Karina Michelle','Gonsalez Cortez','Kary','Cortez12','geddemmodde-4319@yopmail.com','7921-1654',3,2,1),
	   ('Douglas Elian','Cortez Ventura','Elian','Cortez13','effydappeve-9525@yopmail.com','7654-8745',2,2,1),
	   ('Fernando Pablo','Alvarez Rosales','Pablo','Pablo16','birressawul-9690@yopmail.com','7362-3126',3,2,1),
	   ('Pablo Jose','Burgos Cruz','Cruz','burgos16','jappavefyfu-0953@yopmail.com','7265-4748',2,2,1),
	   ('Pedro Enrique','Martinez de sol','Enrique','Quique16','fottejedda-9639@yopmail.com','7314-6462',3,2,1),
	   ('Pedro Fermin','Gonsalez Martinez','Fermin','Gonsa16','exajataj-5734@yopmail.com','7974-8465',2,2,1),
	   ('Kathya Michelle','Palacios Alvarez','Kathy','Michi16','effeffazuk-6011@yopmail.com','7235-7315',3,2,1);
	   
	   
Insert into Sub_categoria (sub_categoria, id_categorias)
Values ('Carnes', 1),
	   ('Pastas', 1),
	   ('Pollo', 1),
	   ('Pescado', 1),
	   ('Mariscos', 1),
	   ('Mexicano', 1),
	   ('Hamburguesas', 1),
	   ('Alitas', 2),
	   ('Boneless', 2),
	   ('Aros de cebolla', 2),
	   ('Nachos', 2),
	   ('Natural', 3),
	   ('Con especias', 3),
	   ('Mixta', 3),
	   ('Caldos', 4),
	   ('Cremas', 4),
	   ('Helados', 5),
	   ('Tipicos', 5),
	   ('Dulces', 5),
	   ('Bebidas', 5),
	   ('Cervezas', 6),
	   ('Gaseosas', 6),
	   ('Naturales',6 ),
	   ('Agua', 6),
	   ('Papas', 7),
	   ('Guacamole', 7),	   
	   ('Salsas', 7),	   
	   ('Verduras', 8);
	   

Insert into Producto (producto, precio, id_subcategoria)
Values 
	   ('Coca-cola', 0.55, 22 ),
	   ('7up', 0.50, 22 ),
	   ('DrPepper', 0.60, 22 ),
	   ('Pepsi', 0.50, 22 ),
	   ('Uva', 0.45, 22 ),
	   ('Fanta', 0.45, 22 ),
	   ('Raptor', 1.00, 22 ),
	   ('Red bull', 0.60, 22 ),
	   ('Tomates', 0.50, 28),
	   ('Papas', 0.75, 28),
	   ('Lechuga', 1.25, 28),
	   ('Pepinos', 0.35, 28),
	   ('Guisquil', 0.60, 28),
	   ('Cebolla', 0.55, 28),
	   ('Pimiento verde', 0.50, 28),
	   ('Esparragos', 0.15, 28),
	   ('Pimiento rojo', 0.50, 28);
	   
	   
	   
	   
   

/*
ALTER TABLE inventario ALTER COLUMN stock SET DATA TYPE numeric(5);*/
Insert into inventario(stock, peso, id_sucursal, id_producto)
values (15, '4 libras', 1, 1),
	   (20, '5 libras', 1, 2),
	   (25, '6 libras', 1, 3),
	   (30, '4 libras', 1, 4),
	   (10, '3 libras', 1, 5),
	   (5, '1 libras', 1, 6),
	   (20, '3 libras', 1, 7),
	   (30, '5 libras', 1, 8),
	   (45, '5 libras', 1, 9),
	   (15,'', 1, 10),
	   (20,'', 1, 11),
	   (15,'',1, 12),
	   (10,'', 1, 13),
	   (30,'', 1, 14),
	   (5, '',1, 15),
	   (35,'', 1, 16),
	   (15,'', 1, 17);



Insert into Compra (fecha_compra, total_compra, id_proveedor)
Values ('12/15/2020', 15.25, 1),
	   ('05/16/2020', 5.25, 2),
	   ('06/17/2020', 30.25, 3),
	   ('07/20/2020', 25.25, 4),
	   ('08/21/2020', 10.25, 5),
	   ('09/15/2020', 9.25, 1),
	   ('10/20/2020', 7.25, 2),
	   ('11/21/2020', 15.25, 3),
	   ('01/22/2020', 20.25, 4),
	   ('02/23/2020', 15.25, 5),
	   ('03/24/2020', 20.25, 1);
	   
	   

Insert into Det_compra (Cantidad, precio, id_producto, id_compra)
Values (15,12.50,1,1),
	   (11,25.21,2,2),
	   (10,11.20,3,3),
	   (15,12.30,4,4),
	   (20,15.00,5,5),
	   (25,16.00,6,6),
	   (12,17.00,3,7),
	   (11,18.00,2,8),
	   (10,23.00,3,9),
	   (9,25.00,4,10);
	   	   
Insert into Usuario (nombre, apellido, Usuario, Clave, Correo, telefono, id_tipo, id_estado)
Values ('Kevin Oswaldo','Alvarez Rosales','Kev','Figury16','Kevin12.34@gmail.com','7130-7929',1,1),
	   ('Guillermo Salvador','Cartagena Mejia','Memin','Mam123','Guillermo12@gmail.com','6125-4578',2,1),
	   ('Jimena Vanessa','Escobar Palacios','Jimenita','Jimena16','Kevin12.34@gmail.com','7121-7785',3,1),
	   ('Margarita Sofia','Ramirez Cartagena','Marga','Grab16','nebuppari-1004@yopmail.com','6335-7845',2,1),
	   ('Fatima Guadalupe','Rosales Torres','Ros','Roxy16','robixatoc-6261@yopmail.com','6851-2513',3,1),
	   ('Alberto Ernesto','Torres Ramos','Neto','Ramitos16','ysacazim-8987@yopmail.com','7215-4582',1,1),
	   ('Maria Elba','Rosales','Mary','MaryE16','hederryreq-8516@yopmail.com','7365-1254',1,1),
	   ('Jose miguel','Carranza Castillo','Josesito','Migi16','bufennahuso-2957@yopmail.com','6258-3652',2,1),
	   ('Erik alejandro','Bonilla Castillo','Erik','Erika16','qennirymama-8781@yopmail.com','6587-7929',3,1),
	   ('Adrian Jose','Andasol Marroquin','Sofy','Shofy','sallaffowe-5802@yopmail.com','6842-8742',1,1),
	   ('Rafael Alejandro','Rodriguez Andasol','shilvi','Shilvi12','ajepoditti-3439@yopmail.com','7058-3652',2,1),
	   ('Jose Ricardo','Cruz Rodriguez','Chepe','Ricardito','xusaddaffapp-7927@yopmail.com','7478-3621',3,1),
	   ('Laura Michelle','Navas Alinares','Lawis','Ana12','rellasselli-7220@yopmail.com','6321-1234',1,1),
	   ('Fatima Jeannette','Alinares Gonsalez','beibi','Fati16','elarruddyddu-3201@yopmail.com','7641-7215',2,1),
	   ('Erik Jose','Alavarez Montañana','Luisillo','Monta16','allitteviw-6686@yopmail.com','6321-3654',3,1),
	   ('Fernando Jose','Alinares Castillo','Fer','Fer6','zossecuqu-8480@yopmail.com','6254-3125',1,1),
	   ('Francisco Alberto','Miguel Miguel','Sales','Sales16','berrettaqyq-1505@yopmail.com','7945-2134',2,2),
	   ('Carlos Rodrigo','Alinares Alvarez','Tony','Tony16','kidaqasaff-9323@yopmail.com','7321-5468',3,2),
	   ('Dana Michelle','Alvarez Escobar','Dana','Dana16','ynicomex-7335@yopmail.com','6545-2316',1,2),
	   ('Guillermo Jose','Gonsalez Escobar','Pedro','Pedro16','busocigi-2099@yopmail.com','6651-3215',2,2),
	   ('Walter Daniel','Palacios Martinez','Gregory','Gremory16','qonyjezidd-0916@yopmail.com','6484-8655',3,2),
	   ('Hector Josue','Hernandez Mendoza','ChocoHector','vector16','agukexuff-5927@yopmail.com','6123-1561',1,2),
	   ('Ariel Alberto','Sol','Sol','Alvert','ottapokyll-4570@yopmail.com','7325-9845',2,2),
	   ('Michelle Lucia','Gonsalez Cortez','Kary','Cortez12','exoddifew-4707@yopmail.com','7351-1654',3,2),
	   ('Douglas Elian','Cortez Ventura','Elian','Cortez13','oturrizis-0496@yopmail.com','7324-8235',1,2),
	   ('Pablo Fernando','Alvarez Rosales','Pablo','Pablo16','gufyppexa-8344@yopmail.com','7652-3126',2,2),
	   ('Pablo Jose','Burgos Cruz','Cruz','burgos16','efunasaja-5866@yopmail.com','7265-6358',3,2),
	   ('Rodrigo Enrique','Martinez de sol','Enrique','Quique16','ommaruva-9204@yopmail.com','7323-6462',1,2),
	   ('Pedro Fermin','Gonsalez Martinez','Fermin','Gonsa16','rehemmifamma-1041@yopmail.com','7323-8665',2,2),
	   ('Kathya Michelle','Palacios Alvarez','Kathy','Michi16','effeffazuk-6011@yopmail.com','7655-2115',3,2);	   
	   /*
Select * from usuario	   
   */
Insert into Pedidos (estado, fecha, id_usuario, id_mesa)
Values ('En espera','11/23/2020',34,1),
	   ('Cobro', '10/20/2021',35,2),
	   ('Finalizada', '12/19/2020',36,3),
	   ('En espera', '10/20/2020',37,4),
	   ('Cobro', '09/19/2020',38,5),
	   ('Finalizada', '11/20/2019',39,5),
	   ('En espera', '09/21/2019',40,6),
	   ('Cobro', '12/22/2019',41,7),
	   ('Finalizada', '10/15/2019',42,2),
	   ('En espera', '11/14/2018',43,2),
	   ('Cobro', '10/13/2018',44,3),
	   ('Finalizada', '09/12/2018',45,4),
	   ('En espera', '11/11/2018',46,5);
	   /*
	   Select * from Pedidos	 
*/
Insert into Det_pedido (detalles, precio, cantidad, id_pedido, id_producto, id_promociones) 
values ('Compra de Coca-cola', 15.20, 1, 27,1,1),
	   ('Compra de 7up', 20.20, 2, 28,2,2),
	   ('Compra de DrPepper', 25.15, 3, 29,3,3),
	   ('Compra de Pepsi', 30.35, 4, 30,4,4);
	   /*
	   TRUNCATE TABLE Det_pedido RESTART IDENTITY
	   */
/*Area de select*/
Select * from Proveedor
Select * from Categoria	   
Select * from Estado_u_Geren	   
Select * from Tipo_u_Geren
Select * from Estado_usuario
Select * from Tipo_usuario
Select * from Mesa
Select *  FROM Promociones 
Select * from Usuarios_Gere
Select * from Sub_categoria
Select * from Producto
Select * from Sucursal
Select * from inventario
Select * from Compra
Select * from Det_compra
Select * from Usuario
Select * from Pedidos	
Select * from Det_pedido 

/*Area de update*/	   
Update Det_pedido  set detalles = 'Compra de una lata de coca-cola' where id_det_pedido = 1
Update Usuario set 	 apellido = 'Guinea cornejo' where  id_usuario = 1
Update inventario set peso ='2 libras' where id_inventario = 24
Update compra set fecha_compra ='12/25/2020' where id_compra = 1
Update Promociones set descripcion = 'Ingreso de productos' where id_promociones = 3


/*Area de consultas parametrizadas*/   
Select * from Det_pedido det inner join Pedidos p on det.id_pedido =  p.id_pedido where det.cantidad between 1 and 15
Select p.estado, p.fecha, u.usuario, u.apellido from Pedidos p inner join usuario u on p.id_usuario = u.id_usuario where p.fecha between '09/19/2020' and '10/20/2020'
Select p.producto, p.precio, sc.sub_categoria from producto p inner join Sub_categoria sc on p.id_subcategoria = sc.id_subcategoria where sc.sub_categoria = 'Gaseosas'
Select p.descuento, dp.detalles, dp.precio, dp.cantidad from Det_pedido dp inner join Promociones p on p.id_promociones = dp.id_promociones where p.descuento between 0.50 and 1.50




/*Area de consultas con fechas*/
Select p.estado, p.fecha, u.usuario, u.apellido from Pedidos p inner join usuario u on p.id_usuario = u.id_usuario where fecha between '09/19/2020' AND '11/23/2020'
Select dtc.cantidad, producto.producto, c.fecha_compra, c total_compra  from Det_compra dtc inner join compra c on dtc.id_compra = c.id_compra inner join producto on dtc.id_producto = producto.id_producto where c.fecha_compra between '02/23/2020'  and '10/20/2020'
Select dtc.cantidad, producto.producto, c.fecha_compra, c total_compra, proveedor.nombre, proveedor.apellido, proveedor.correo, proveedor.direccion, proveedor.telefono from Det_compra dtc inner join compra c on dtc.id_compra = c.id_compra inner join producto on dtc.id_producto = producto.id_producto 
 inner join proveedor on c.id_proveedor = proveedor.id_proveedor where c.fecha_compra between '02/23/2020'  and '10/20/2020'

/*Area de consultas para graficos*/
SELECT COUNT(estado) as Cantidad, pedidos.estado AS TIPO FROM pedidos GROUP BY estado
SELECT COUNT(id_pedido) as Cantidad, pedidos.fecha AS fecha FROM pedidos GROUP BY fecha
SELECT MAX(total_compra) as Mayor_compra FROM compra WHERE compra.fecha_compra BETWEEN '05/16/2020' AND '06/17/2020'
SELECT MAX(id_det_pedido) AS Mayor_pedido_unidad FROM det_pedido
SELECT COUNT(estado_prom) AS CANTIDAD, promociones.estado_prom AS Tipo_estado FROM promociones GROUP BY estado_prom