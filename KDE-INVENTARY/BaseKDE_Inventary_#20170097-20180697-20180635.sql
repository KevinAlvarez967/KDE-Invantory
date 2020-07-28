/*Tablas padre*/
CREATE TABLE Proveedor (
  id_proveedor SERIAL PRIMARY KEY,
  Nombre varchar(50),
  Apellido varchar(55),
  Correo varchar(60),
  Telefono varchar(9),
  Direccion varchar(75),
  razon_social varchar(15),
  Sector_comercial varchar(20),
  Pais varchar(15),
  Ciudad varchar(20)
);



CREATE TABLE Tipo_u_Geren (
  id_tipo SERIAL PRIMARY KEY,
  tipo varchar(15)
);





CREATE TABLE Estado_u_Geren (
  id_estado SERIAL PRIMARY KEY,
  Estado varchar(15)
);



CREATE TABLE Tipo_usuario (
  id_tipo SERIAL PRIMARY KEY,
  tipo varchar(15)
);




CREATE TABLE Estado_usuario (
  id_estado SERIAL PRIMARY KEY,
  Estado varchar(15)
);


	   
	   
CREATE TABLE Categorias (
  id_categorias SERIAL PRIMARY KEY,
  Categoria varchar(25)
);





CREATE TABLE Promociones (
  id_promociones SERIAL PRIMARY KEY,
  Descripcion varchar(60),
  Codigo numeric(10),
  Descuento numeric(5,2),
  Estado_prom varchar(15)
);

Alter table Promociones ALTER column Descripcion type varchar(60)
Alter table Promociones ALTER column Estado_prom type varchar(15)






/*Tablas hijas*/
CREATE TABLE Sub_categorias (
  id_subcategoria SERIAL PRIMARY KEY,
  sub_categoria varchar(15),
  id_categorias  int
);


CREATE TABLE Usuarios_Gere (
  id_usuario_Geren SERIAL PRIMARY KEY,
  nombre varchar(50),
  apellido varchar(55),
  Usuario varchar(40),
  Clave varchar(9),
  Correo varchar(60),
  telefono varchar(9),
  id_tipo int,
  id_estado int
);


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





CREATE TABLE Sucursal (
  id_sucursal SERIAL PRIMARY KEY,
  Sucursal varchar(30),
  id_usuario int
);


/*Desde aqui debes llenar, desde la tabla compra para abajo*/


	  


CREATE TABLE Compra (
  id_compra SERIAL PRIMARY KEY,
  Cantidad numeric(5,2),
  Precio numeric(5,2),
  compra varchar(15),
  Fecha_compra varchar(25),
  Total_compra numeric(5,2),
  id_proveedor int
);


/*El campo precio se refiere al precio de cada elemento*/
Insert into Compra (Cantidad, Precio, compra, Fecha_compra, Total_compra, id_proveedor)
Values (12, 5, 'Pollos', '12-12-2019', 60, 1 )




CREATE TABLE Producto (
  id_producto SERIAL PRIMARY KEY,
  producto varchar(40),
  Fecha_vencimiento varchar(20),
  stock_min numeric(5,2),
  stock numeric(5,2),
  id_subcategoria int,
  id_compra int
);

Insert into Producto (producto, Fecha_vencimiento, stock_min, stock, id_subcategoria, id_compra)
Values ('Plato de pollo y arroz', '12-12-2019', 5, 15, 1, 1)



CREATE TABLE Inventario (
  id_inventario SERIAL PRIMARY KEY,
  id_sucursal int,
  id_producto int
);

Insert into Inventario (id_sucursal, id_producto)
Values (1,1)


CREATE TABLE Pedidos (
  id_pedido SERIAL PRIMARY KEY,
  Cantidad numeric(5,2),
  id_usuario int,
  id_producto int
);

Insert into Pedidos (Cantidad, id_usuario, id_producto)
Values (12, 1, 1)



CREATE TABLE Det_pedido (
  id_det_pedido SERIAL PRIMARY KEY,
  detalles varchar(100),
  Precio numeric(5,2),
  id_pedido int
);

CREATE TABLE Det_factura (
  id_det_factura SERIAL PRIMARY KEY,
  Total numeric(5,2),
  id_detalle_ped int,
  id_promociones int
);

CREATE TABLE Factura (
  id_factura SERIAL PRIMARY KEY,
  Total_facturado numeric(5,2),
  id_det_factura int
);

ALTER TABLE Usuarios_Gere ADD FOREIGN KEY (id_tipo) REFERENCES Tipo_u_Geren (id_tipo);

ALTER TABLE Usuarios_Gere ADD FOREIGN KEY (id_estado) REFERENCES Estado_u_Geren (id_estado);

ALTER TABLE Usuario ADD FOREIGN KEY (id_tipo) REFERENCES Tipo_usuario (id_tipo);


ALTER TABLE Usuario ADD FOREIGN KEY (id_estado) REFERENCES Estado_usuario (id_estado);

ALTER TABLE Sucursal ADD FOREIGN KEY (id_usuario) REFERENCES Usuarios_Gere (id_usuario_Geren);


ALTER TABLE Compra ADD FOREIGN KEY (id_proveedor) REFERENCES Proveedor (id_proveedor);

Alter Table Sub_categorias ADD FOREIGN KEY (id_categorias) REFERENCES Categorias (id_categorias);

ALTER TABLE Producto ADD FOREIGN KEY (id_subcategoria) REFERENCES Sub_categorias (id_subcategoria);


ALTER TABLE Producto ADD FOREIGN KEY (id_compra) REFERENCES Compra (id_compra);


ALTER TABLE Inventario ADD FOREIGN KEY (id_sucursal) REFERENCES Sucursal (id_sucursal);

ALTER TABLE Inventario ADD FOREIGN KEY (id_producto) REFERENCES Producto (id_producto);


ALTER TABLE Pedidos ADD FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario);


ALTER TABLE Pedidos ADD FOREIGN KEY (id_producto) REFERENCES Producto (id_producto);


ALTER TABLE Det_pedido ADD FOREIGN KEY (id_pedido) REFERENCES Pedidos (id_pedido);


ALTER TABLE Det_factura ADD FOREIGN KEY (id_detalle_ped) REFERENCES Det_pedido (id_det_pedido);


ALTER TABLE Det_factura ADD FOREIGN KEY (id_promociones) REFERENCES Promociones (id_promociones);


ALTER TABLE Factura ADD FOREIGN KEY (id_det_factura) REFERENCES Det_factura (id_det_factura);





/*Insert*/

Select * from Proveedor
Insert into Proveedor (Nombre, Apellido, Correo, Telefono, Direccion, 
					   razon_social, Sector_comercial, Pais, Ciudad)
Values ('Kevin Oswaldo', 'Alvarez Rosales', 'Kevin.1234@gmail.com', '7130-7929',
	   'Av monte video, colonia monte verde casa h-1', 'Grupo Modesto', 'comercio', 'Honduras', 'Tegucigalpa'),
	   ('Guillermo Salvador', 'Cartagena Mejia', 'Grabiela12@gmail.com', '6130-8562',
	   'Av monte video, colonia Plaza Lorem casa r-11', 'Grupo Alcatraz', 'comercio', 'El Salvador', 'San Salvador'),
	   ('Jimena Vanessa', 'Escobar Palacios', 'shimi12@gmail.com', '7583-8412',
	   'Av monte video, colonia monte verde casa z-10', 'Coorporacion Mejia', 'comercio', 'El Salvador', 'Santa Tecla'),
	   ('Douglas Elian', 'Cortez Rosales', 'Cor-Rosales@gmail.com', '7115-7335',
	   'Av monte video, colonia Plaza verde casa g-10', 'Coorporacion pegue', 'comercio', 'Honduras', 'San pedro sula'),
	   ('Fatima jeanette', 'Orellana Rodriguez', 'Fatimita@gmail.com', '6531-8475',
	   'Av monte video, colonia Travesía azul casa j-13', 'Grupo hobbie', 'comercio', 'El Salvador', 'Soyapango')					  					  



insert into Tipo_u_Geren (tipo)
Values ('Administrador'),
	   ('Inventariado'),
	   ('Gestion Compra')
	   


Insert into Estado_u_Geren (Estado)
Values ('Activo'),
	   ('Inactivo')


Insert into Tipo_usuario (Tipo)
Values ('Mesero'),
	   ('Cocina'),
	   ('Caja')
	   
	   
Insert into Estado_usuario (Estado)
Values ('Activo'),
	   ('Inactivo')	  
	   
	   
Insert into Categorias (Categoria)
Values ('Plato Fuerte'),
	   ('Entrada'),
	   ('Ensalada'),
	   ('Sopas'),
	   ('Postre'),
	   ('Bebidas'),
	   ('Acompañamientos')	   
	   
Select *  FROM Promociones 

Insert into promociones (Descripcion, Codigo, Descuento, Estado_prom)
Values ('Descuento en la compra de una coca-cola', 0000000001, 0.50, 'Disponible'),
		('Descuento en la compra de un plato fuerte', 0000000002, 1.50, 'Disponible'),
		('Descuento en la compra de una entreda', 0000000003, 2.50, 'Disponible'),
		('Descuento en la compra de una sopa', 0000000004, 0.75, 'No Disponible'),
		('Descuento en la compra de una ensalada', 0000000005, 1.20, 'No Disponible'),
		('Descuento en la compra de un postre', 0000000006, 0.50, 'No Disponible')	   
		
		
Insert into Sub_categorias (sub_categoria, id_categorias)
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
	   ('Verduras', 7),
	   ('Salsas', 7)


Insert into Usuarios_Gere (nombre, apellido, Usuario, Clave, Correo, telefono, id_tipo, id_estado)
Values ('Kevin Oswaldo','Alvarez Rosales','Kev','Figury16','Kevin12.34@gmail.com','7130-7929',1,1),
	   ('Guillermo Salvador','Cartagena Mejia','Memin','Mam123','Guillermo12@gmail.com','6125-4578',1,1),
	   ('Jimena Vanessa','Escobar Palacios','Jimenita','Jimena16','Kevin12.34@gmail.com','7121-7785',2,1),
	   ('Gabriela Sofia','Ramirez Cartagena','Grabi','Grab16','sipirryffahi-9266@yopmail.com','6335-7845',3,1),
	   ('Rosa Guadalupe','Rosales Torres','Ros','Roxy16','onnokurru-0808@yopmail.com','6851-2513',2,1),
	   ('Ernesto Jose','Torres Ramos','Neto','Ramitos16','xeddoqollut-0653@yopmail.com','7215-4582',3,1),
	   ('Maria Elba','Rosales','Mary','MaryE16','zettodera-3572@yopmail.com','7365-1254',2,1),
	   ('Daniel Stanley','Carranza Miguel','Miguel','Migi16','ipossiven-0915@yopmail.com','6258-3652',3,1),
	   ('Erika Alejandra','Bonilla Castillo','Erikita','Erika16','awufodarr-5235@yopmail.com','6587-7929',2,1),
	   ('Adriana Sofia','Aguilar Marroquin','Sofy','Shofy','ujexuxoddi-4319@yopmail.com','6842-8742',3,1),
	   ('Silvia Carolina','Andasol','shilvi','Shilvi12','ommivemop-7743@yopmail.com','7058-3652',2,1),
	   ('Jose Ricardo','Cruz Rodriguez','Chepe','Ricardito','vuzyrrekix-1224@yopmail.com','7478-3621',3,1),
	   ('Ana Laura','Navas','Lawis','Ana12','omuhunytt-2963@yopmail.com','6935-9452',2,1),
	   ('Fatima Jeannette','Orellana Gonsalez','beibi','Fati16','lygemenav-7623@yopmail.com','7465-7854',3,1),
	   ('Luis Salvador','Alavarez Montañana','Luisillo','Monta16','fepuwukal-8190@yopmail.com','6284-3621',2,1),
	   ('Juan Fernando','Alinares Castillo','Fer','Fer6','yllobellynn-1276@yopmail.com','6984-1254',3,1),
	   ('Francisco Sales','Miguel Miguel','Sales','Sales16','udytumepu-8118@yopmail.com','7842-5412',2,2),
	   ('Antonio Carlos','Mendoza Gonsalez','Tony','Tony16','womigogalle-9933@yopmail.com','7435-9543',3,2),
	   ('Dana Michelle','Alvarez Escobar','Dana','Dana16','edydujesa-5498@yopmail.com','6236-7216',2,2),
	   ('Miguel Pedro','Gonsalez Palacios','Pedro','Pedro16','ivammoku-0626@yopmail.com','6754-3156',3,2),
	   ('Gregorio Antonio','Mendoza Martinez','Gregory','Gremory16','cofemittic-1446@yopmail.com','6321-8478',2,2),
	   ('Hector Josue','Hernandez Mendoza','ChocoHector','vector16','liqunnohah-7633@yopmail.com','6951-2122',3,2),
	   ('Ariel Alberto','Sol','Sol','Alvert','pasorrewi-2611@yopmail.com','7845-6489',2,2),
	   ('Karina Michelle','Gonsalez Cortez','Kary','Cortez12','geddemmodde-4319@yopmail.com','7921-1654',3,2),
	   ('Douglas Elian','Cortez Ventura','Elian','Cortez13','effydappeve-9525@yopmail.com','7654-8745',2,2),
	   ('Fernando Pablo','Alvarez Rosales','Pablo','Pablo16','birressawul-9690@yopmail.com','7362-3126',3,2),
	   ('Pablo Jose','Burgos Cruz','Cruz','burgos16','jappavefyfu-0953@yopmail.com','7265-4748',2,2),
	   ('Pedro Enrique','Martinez de sol','Enrique','Quique16','fottejedda-9639@yopmail.com','7314-6462',3,2),
	   ('Pedro Fermin','Gonsalez Martinez','Fermin','Gonsa16','exajataj-5734@yopmail.com','7974-8465',2,2),
	   ('Kathya Michelle','Palacios Alvarez','Kathy','Michi16','effeffazuk-6011@yopmail.com','7235-7315',3,2)
	   
	   
	   
	   
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
	   ('Kathya Michelle','Palacios Alvarez','Kathy','Michi16','effeffazuk-6011@yopmail.com','7655-2115',3,2)	   
	   
	   
/*Recordar id_usuario es el id de gerencia*/
insert into Sucursal (Sucursal, id_usuario)
Values ('Mercado Cuscatlan', 1 )	   