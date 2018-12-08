	CREATE TABLE usuario(
		id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
		nombre VARCHAR(50) NOT NULL,
		alias VARCHAR(15) NOT NULL,
		password VARCHAR(25) NOT NULL
	);

	CREATE TABLE imc_usuario(
		id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
		id_imc INTEGER NOT NULL,
		id_usuario INTEGER NOT NULL,
		creado_el DATETIME NOT NULL,
		FOREIGN KEY (id_imc) REFERENCES imc(id),
		FOREIGN KEY (id_usuario) REFERENCES usuario(id)
	);

	CREATE TABLE imc(
		id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
		min_value DECIMAL(4,2),
		max_value DECIMAL(4,2),
		clasificacion VARCHAR(45) NOT NULL,
		grado INTEGER NOT NULL
	);

	CREATE TABLE tmb(
		id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
		factor DECIMAL(4,3) NOT NULL,
		nombre VARCHAR(30) NOT NULL,
		descripcion VARCHAR(45),
		UNIQUE(nombre)
	);

	CREATE TABLE sexo(
		id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
		nombre VARCHAR(10) NOT NULL
	);

	CREATE TABLE tmb_formula(
		id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
		id_sexo INTEGER NOT NULL,
		factor_1 INTEGER NOT NULL,
		factor_2 DECIMAL(3,2) NOT NULL,
		factor_3 INTEGER NOT NULL,
		factor_4 INTEGER NOT NULL,
		FOREIGN KEY (id_sexo) REFERENCES sexo(id)
	);

	INSERT INTO usuario (nombre,alias,password) VALUES
	('Usuario 1','user1','user1'),
	('Usuario 2','user2','user2');

	INSERT INTO imc(min_value,max_value,clasificacion,grado) VALUES
	(null,16.00,'Delgadez severa',1),
	(16.00,16.99,'Delgadez moderada',1),
	(17.00,18.49,'Delgadez aceptable',1),
	(18.50,24.99,'Normal',2),
	(25.00,29.99, 'Pre-obeso',3),
	(30.00,34.99, 'Obeso tipo I',4),
	(35.00,39.99, 'Obeso tipo II',4),
	(40,null,'Obeso tipo III',4);

	INSERT INTO tmb(factor,nombre,descripcion) VALUES
	(1.2,'Poco o ningún ejercicio',''),
	(1.375,'Ejercicio ligero','1-3 días a la semana'),
	(1.55,'Ejercicio moderado','3-5 días a la semana'),
	(1.725,'Ejercicio fuerte','6-7 días a la semana'),
	(1.9,'Ejercicio muy fuerte','(dos veces al día, entrenamientos muy duros');

	INSERT INTO sexo(nombre) VALUES
	('Femenino'),
	('Masculino');

	INSERT INTO tmb_formula (id_sexo,factor_1,factor_2,factor_3,factor_4) VALUES
	(1,10,6.25,5,-161),
	(2,10,6.25,5,5);