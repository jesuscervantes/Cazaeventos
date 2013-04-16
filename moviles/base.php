<?
	
	include 'Conexion.php';

	$conexion=new Conexion("marker","localhost","root","6374");

	$sql[0]="CREATE TABLE Cliente(
		IdCliente Int(15) not null auto_increment,
		Nombre Varchar(250) not null,
		Mail varchar(150) not null,
		Fecha date not null,
		Primary key(IdCliente))ENGINE=INNODB;";

	$sql[1]="CREATE TABLE Servicios( 
      
		IdServicios int(4) not null auto_increment,
		Nombre varchar(150) not null,
		Datos varchar(250) not null,
		Estado int (1) not null default 1,
		primary key(IdServicios))ENGINE=INNODB;";

     $sql[2]="CREATE TABLE Servicios_Cliente(
     		Id int(20) not null auto_increment,
     		Servicio int(4) not null,
     		Cliente int(15) not null,
     		Primary key(Id), 
     		FOREIGN KEY (Servicio) REFERENCES Servicios(IdServicios) ON DELETE CASCADE,
     		FOREIGN kEY(Cliente)REFERENCES Cliente(IdCliente) ON DELETE CASCADE
			)ENGINE=INNODB";

	$sql[3]="CREATE TABLE  Usuarios(
		Id int(20) not null auto_increment,
		Servicio int(4) not null,
		Fecha date not null,
		Primary key(Id), 
     	FOREIGN KEY (Servicio) REFERENCES Servicios(IdServicios) ON DELETE CASCADE
     	)ENGINE=INNODB";
	
	$sql[4]="CREATE TABLE  Vigencia(
		Id int(10) not null auto_increment,
		Fecha date not null,
		Fecha_inicial date not null,
		Fecha_final date not null,
		Primary key(Id))ENGINE=INNODB";


	$sql[5]="CREATE TABLE Horario(
	Id int(20) not null auto_increment,
	Inicio Time not null,
	Cierre time not null,
	Descanso time not null,
	Apertura time not null,
	Primary key(Id)
	)ENGINE=INNODB";

	$sql[6]="CREATE TABLE Titular(
		Id int(20) not null auto_increment,
		Nombre varchar(150) not null,
		Mail varchar(120) not null,
		pass varchar(32) not null,
		Estado Bit not null,
		Fecha Date not null,
		Primary key(Id)
		)ENGINE=INNODB";

	$sql[7]="CREATE TABLE Imagenes(
     		Id int(20) not null auto_increment,
     		Nombre varchar(150) not null,
     		Archivo varchar(150) not null,
     		Fecha date not null,
     		Tipo varchar(30) not null,
     		Primary key(Id)
			)ENGINE=INNODB";

	$sql[8]="CREATE TABLE  Categoria(
		Nombre varchar(150) not null,
		Descripcion varchar(250) not null,
		Fecha date not null,
		Estado Bit not null default 1,
		Icono int(20) not null,
		FOREIGN KEY (Icono) REFERENCES Imagenes(Id),
		Primary key(Nombre))ENGINE=INNODB";
	
	$sql[9]="CREATE TABLE  Tipo(
		Nombre varchar(150) not null,
		Descripcion varchar(250) not null,
		Fecha date not null,
		Categoria varchar(150) not null,
		Estado Bit not null default 1,
		FOREIGN KEY (Categoria) REFERENCES Categoria(Nombre) ON DELETE CASCADE,
		Primary key(Nombre))ENGINE=INNODB";


	
	$sql[10]="CREATE TABLE Ubicacion(
	Id int(20) not null auto_increment,
	Latitud Float( 10, 6 ) NOT NULL,
	Longitud Float( 10, 6 ) NOT NULL,
	Estado char(20) not null,
	Municipio char(20) not null,
	Calle varchar(50) not null,
	Numero int(5) not null,
	Letra char(1),
	Colonia char(20) not null,
	Primary key(Id)
	)ENGINE=INNODB";

	$sql[11]="CREATE TABLE Negocio(
		Id int(20) not null auto_increment,
		Nombre varchar(150) not null,
		Vigencia int(10) not null,
		Estado Bit not null,
		Logo varchar(100)not null,
		Tipo varchar(150) not null,
		Descripcion varchar (150) not null,
		Telefono varchar(50) not null,
		Web varchar(150)not null,
		Fecha Date not null,
		Titular int(20) not null,
		Ubicacion int(20) not null,
		Horario int(20) not null,
		Primary key(Id),
		FOREIGN KEY (Horario) REFERENCES Horario(Id) ON DELETE CASCADE,
     	FOREIGN kEY(Titular)REFERENCES Titular(Id) ON DELETE CASCADE,
     	FOREIGN kEY(Vigencia)REFERENCES Vigencia(Id) ON DELETE CASCADE,
     	FOREIGN KEY (Tipo) REFERENCES Tipo(Nombre),
     	FOREIGN KEY (Ubicacion) REFERENCES Ubicacion(Id)
		)ENGINE=INNODB";




	
$sql[12]="CREATE TABLE Galeria(
	Id int(20) not null auto_increment,
	Nombre varchar(50) not null,
	Fecha date not null,
	Estado bit(1) not null,
	Negocio int(20) not null,
	Primary key(Id),
	FOREIGN KEY (Negocio) REFERENCES Negocio(Id) ON DELETE CASCADE
	)ENGINE=INNODB";

$sql[13]="CREATE TABLE Galeria_imagenes(
	Id int(20) not null auto_increment,
	Galeria int(20) not null,
	Imagen int(20) not null,
	Primary key(Id),
	FOREIGN KEY (Galeria) REFERENCES Galeria(Id) ON DELETE CASCADE,
	FOREIGN KEY (Imagen) REFERENCES Imagenes(Id) ON DELETE CASCADE
	)ENGINE=INNODB";

$sql[14]="CREATE TABLE Anuncio(
	Id int(20) not null auto_increment,
	Nombre varchar(100) not null,
	Negocio int(20) not null,
	Fecha_inicial date not null,
	Fecha_final date not null,
	Imagen int(20) not null,
	Tipo varchar(20) not null,
	Estado bit(1) not null,
	Primary key(Id),
	FOREIGN KEY (Negocio) REFERENCES Negocio(Id) ON DELETE CASCADE,
	FOREIGN KEY (Imagen) REFERENCES Imagenes(Id) ON DELETE CASCADE
	)ENGINE=INNODB";



$sql[15]="CREATE TABLE Evento(
	Id int(20) not null auto_increment,
	Nombre varchar(100) not null,
	Negocio int(20) not null,
	Fecha_inicio date not null,
	Fecha_termino date not null,
	Horario int(20) not null,
	Imagen int(20) not null,
	Tipo varchar(20) not null,
	Descripcion varchar(150) not null,
	Ubicacion int(20) not null,
	Estado bit(1) not null,
	Primary key(Id),
	FOREIGN KEY (Ubicacion) REFERENCES Ubicacion(Id),
	FOREIGN KEY (Imagen) REFERENCES Imagenes(Id) ON DELETE CASCADE,
	FOREIGN KEY (Horario) REFERENCES Horario(Id) ON DELETE CASCADE,
    FOREIGN KEY (Negocio) REFERENCES Negocio(Id)ON DELETE CASCADE

	)ENGINE=INNODB";

$sql[16]="CREATE TABLE Promocion(
	Id int(20) not null auto_increment,
	Fecha_inicio date not null,
	Fecha_final date not null,
	Evento int(20) not null,
	Estado bit(1) not null,
	Primary key(Id),
	FOREIGN KEY (Evento) REFERENCES Evento(Id)
	
	)ENGINE=INNODB";














 	//$conectar->Query("create database Xamay");
$contador=0;
 	foreach ($sql as $key ) 
 	{
 		

 		$conexion->tabla($key);
 	}













	


	

     	

		


	

?>