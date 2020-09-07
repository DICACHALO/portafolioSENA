-- Fecha: 14 de diciembre de 2016
-- Servidor: linux centos 7
-- Versión de PHP: 5.4.16 (CLI) (BUILT:JUNIO 23 DE 2015)
-- Base de datos: PostgreSQL version 9.4.7 nombre=portafolio
-- Programadores: Wilmer Arley Castillo Rodriguez - Diana Carolina Chacón López

-- *********************************************************************************
--INSERCIONES PARAR INICIALIZAR EL PROGRAMA ****************************************
-- *********************************************************************************

INSERT INTO tab_perfil (nom_rol,descripcion) VALUES ('SUPERUSUARIO','Tiene acceso a todas las opciones del sistema');
INSERT INTO tab_perfil (nom_rol) VALUES ('CALIDAD');
INSERT INTO tab_perfil (nom_rol) VALUES ('COORDINADOR');
INSERT INTO tab_perfil (nom_rol) VALUES ('INSTRUCTOR');
INSERT INTO tab_perfil (nom_rol) VALUES ('APRENDIZ');

INSERT INTO tab_tipo_tramite (nom_tramite) VALUES ('ACTA');	
INSERT INTO tab_tipo_tramite (nom_tramite) VALUES ('ACTA DE CIERRE');
INSERT INTO tab_tipo_tramite (nom_tramite) VALUES ('APLAZAMIENTO');
INSERT INTO tab_tipo_tramite (nom_tramite) VALUES ('CANCELACION');
INSERT INTO tab_tipo_tramite (nom_tramite) VALUES ('DESERCION');
INSERT INTO tab_tipo_tramite (nom_tramite) VALUES ('PLAN DE MEJORAMIENTO');
INSERT INTO tab_tipo_tramite (nom_tramite) VALUES ('RETIRO VOLUNTARIO');
INSERT INTO tab_tipo_tramite (nom_tramite) VALUES ('TRASLADO');

INSERT INTO tab_red (nom_red) VALUES ('No aplica');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de la información, diseño y desarrollo de software');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de la información y las comunicaciones');
INSERT INTO tab_red (nom_red) VALUES ('Diseño de joyas y objetos artesanales');
INSERT INTO tab_red (nom_red) VALUES ('Diseño de modas y confecciones');
INSERT INTO tab_red (nom_red) VALUES ('Diseño de producto');
INSERT INTO tab_red (nom_red) VALUES ('Diseño de máquinas y equipos automatizados');
INSERT INTO tab_red (nom_red) VALUES ('Explotación y transformación de minerales');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías agrícolas');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de mantenimiento predictivo, preventivo y correctivo');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de producción industrial');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de producción limpia');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías pecuarias');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías agroindustriales');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de producción acuícola');
INSERT INTO tab_red (nom_red) VALUES ('Biotecnología animal');
INSERT INTO tab_red (nom_red) VALUES ('Biotecnología industrial');
INSERT INTO tab_red (nom_red) VALUES ('Biotecnología vegetal');
INSERT INTO tab_red (nom_red) VALUES ('Materiales para la construcción');
INSERT INTO tab_red (nom_red) VALUES ('Materiales para la industria');
INSERT INTO tab_red (nom_red) VALUES ('Ventas y comercialización');
INSERT INTO tab_red (nom_red) VALUES ('Logística y transporte');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de servicios turísticos');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de servicios de salud');
INSERT INTO tab_red (nom_red) VALUES ('Tecnologías de gestión administrativa de servicios financieros');

INSERT INTO tab_accion (nom_accion,descripcion,url,imagen,ordenamiento)   
	        VALUES ('Editar','Modifica elementos','editar.php','assets/img/editar.png', 1);
INSERT INTO tab_accion (nom_accion,descripcion,url,imagen,ordenamiento)   
	        VALUES ('Eliminar','Borra elementos','eliminar.php','assets/img/eliminar.png', 1);
INSERT INTO tab_accion (nom_accion,descripcion,url,imagen,ordenamiento)   
	        VALUES ('Permisos', 'Asignar Permisos a Perfiles','permiso.php', 'assets/img/icon_permisos.png', 1);

INSERT INTO tab_regional (id_regional, nom_regional) VALUES (5,'Regional Antioquía');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (8,'Regional Atlántico');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (11,'Regional Distrito Capital - Bogotá');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (13,'Regional Bolívar');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (15,'Regional Boyacá');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (17,'Regional Caldas');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (18,'Regional Caquetá');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (19,'Regional Cauca');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (20,'Regional Cesar');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (23,'Regional Córdoba');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (25,'Regional Cundinamarca');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (27,'Regional Chocó');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (41,'Regional Huila');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (44,'Regional Guajira');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (47,'Regional Magdalena');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (50,'Regional Meta');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (52,'Regional Nariño');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (54,'Regional Norte de Santander');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (63,'Regional Quindio');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (66,'Regional Risaralda');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (68,'Regional Santander');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (70,'Regional Sucre');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (73,'Regional Tolima');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (76,'Regional Valle');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (81,'Regional Arauca');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (85,'Regional Casanare');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (86,'Regional Putumayo');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (88,'Regional San Andres');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (91,'Regional Amazonas');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (94,'Regional Guainia');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (95,'Regional Guaviare');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (97,'Regional Vaupés');
INSERT INTO tab_regional (id_regional, nom_regional) VALUES (99,'Regional Vichada');

INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9517,'Centro para la Biodiversidad y el Turísmo del Amazonas', 91);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9501,'Complejo Tecnológico para la Gestión Agroempresarial', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9201,'Centro de Diseño y Manufactura del Cuero', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9205,'Centro Tecnológico del Mobiliario', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9502,'Complejo Tecnológico Minero Agroempresarial', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9503,'Centro de la Innovación la Agroindustria y el Turísmo', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9504,'Complejo Tecnológico Agroindustrial, Pecuario y Turístico', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9549,'Complejo Tecnológico Turístico y Agroindustrial del Occidente Antioqueño', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9202,'Centro de Formación en Diseño, Confección y Moda', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9203,'Centro para el Desarrollo del Habitad y la Construcción', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9301,'Centro de Comercio', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9206,'Centro Tecnológico de Gestión Industrial', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9401,'Centro de Servicios de Salud', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9402,'Centro de Servicios y Gestión Empresarial', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9101,'Centro de los Recursos Naturales Renovables La Salada', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9204,'Centro de Tecnología de la Manufactura Avanzada', 5);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9530,'Centro de Gestión y Desarrollo Agroindustrial de Arauca', 81);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9103,'Centro  para el Desarrollo Agroecologico y Agroindustrial', 8);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9207,'Centro Nacional Colombo Aleman', 8);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9302,'Centro de Comercio y Servicios', 8);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9208,'Centro Industrial y de Aviación', 8);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9104,'Centro Agroempresarial y Minero', 13);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9105,'Centro Internacional Naútico Fluvial y Portuario', 13);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9304,'Centro de Comercio y Servicios', 13);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9218,'Centro para la Industria Petroquimica', 13);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9110,'Centro de Desarrollo Agropecuario y Agroindustrial', 15);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9111,'Centro  Minero', 15); 
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9305,'Centro de Gestión Administrativa y Fortalecimiento Empresarial', 15);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9514,'Centro Industrial de Mantenimiento y Manufactura', 15);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9112,'Centro para la formacion cafetera', 17);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9515,'Centro Pecuario y Agroempresarial', 17);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9219,'Centro de Automatización Industrial', 17);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9306,'Centro de Comercio y Servicios', 17);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9220,'Centro de Procesos Industriales', 17);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9516,'Centro Tecnológico de la Amazonía', 18);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9519,'Centro Agroindustrial y Fortalecimiento  Empresarial de Casanare', 85);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9113,'Centro Agropecuario', 19);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9307,'Centro de Comercio y Servicios Cauca', 19);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9221,'Centro de Teleinformática y Producción Industrial', 19);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9520,'Centro Agroempresarial', 20);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9114,'Centro Biotecnológico del Caribe', 20);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9521,'Centro de Operación y Mantenimiento Minero', 20);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9522,'Centro de Recursos Naturales Industria y Biodiversidad', 27);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9523,'Centro de Comercio Industria y Turísmo de Córdoba', 23);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9115,'Centro Agropecuario  y de Biotecnología El Porvenir', 23);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9511,'Centro de la Tecnología del Diseño y la Productividad Empresarial', 25);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9513,'Centro de Desarrollo Agropempresarial', 25);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9509,'Centro de Desarrollo Agroindustrial y Empresarial de Villeta', 25);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9510,'Centro Agroecológico y Empresarial', 25);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9232,'Centro Industrial y Desarrollo Empresarial de Soacha', 25);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9512,'Centro de Biotecnología Agropecuaria', 25);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9216,'Centro de Diseño y Metrología', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9217,'Centro para la Industria de la Comunicación Gráfica', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9404,'Centro de Gestión Administrativa', 11); 
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9405,'Centro de Servicios Financieros', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9406,'Centro Nacional de Hotelería Turísmo y Alimentos', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9209,'Centro de Tecnologías para la Construcción y la Madera', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9212,'Centro de Manufactura en Textiles y Cuero', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9403,'Centro de Formación de Talento Humano en Salud', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9508,'Centro de Gestión y Fortalecimiento Socio Empresarial', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9210,'Centro de Electricidad Electrónica y Telecomunicaciones', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9213,'Centro de Tecnologías del Transporte', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9214,'Centro Metalmecánico', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9215,'Centro de Materiales y Ensayos', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9211,'Centro de Gestión Industrial', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9303,'Centro de Gestión de Mercados, Logística y Tecnologías de la Información', 11);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9547,'Centro Ambiental y Ecoturístico del Nororiente Amazónico', 94);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9524,'Centro Agroempresarial y Acúicola', 44);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9222,'Centro Industrial y de Energías Alternativas', 44);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9533,'Centro de Desarrollo Agroindustrial Turístico y Tecnológico del Guaviare', 95);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9116,'Centro de Formación Agroindustrial la Angostura', 41);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9525,'Centro Agroempresarial y Desarrollo  Pecuario del Huila', 41);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9526,'Centro de Desarrollo Agroempresarial y Turístico del Huila', 41);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9528,'Centro de Gestión y Desarrollo Sostenible Surcolombiano', 41);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9527,'Centro de la Industria la Empresa y los Servicios', 41);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9529,'Centro de Logística y Promoción Ecoturística', 47);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9118,'Centro Acuícola y Agroindustrial de Gaira', 47);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9117,'Centro  Agroindustrial del Meta', 50);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9532,'Centro de Industria y Servicios del Meta', 50);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9535,'Centro Agroindustrial y Pesquero de la Costa Pacífica', 52);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9534,'Centro Surcolombiano de logística Internacional', 52);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9536,'Centro Internacional de Producción Limpia LOPE', 52);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9119,'Centro Atención Sector Agropecuario CASA', 54);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9537,'Centro de la Industria la Empresa y los Servicios', 54);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9518,'Centro Agroforestal y Acuícola Arapaima', 86);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9120,'Centro Agroindustrial', 63);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9231,'Centro para el Desarrollo Tecnológico de la Construcción y la industria', 63);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9538,'Centro de Comercio y Turísmo', 63);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9121,'Centro Atención Sector Agropecuario', 66);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9308,'Centro de Comercio y Servicios', 66);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9223,'Centro de Diseño e Innovación Tecnológica Industrial', 66);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9539,'Centro de Formación Turística Gente de Mar y de Servicios', 88);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9546,'Centro de Gestión Agroempresarial del Oriente', 68);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9122,'Centro Atención Sector Agropecuario', 68);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9541,'Centro Agroturístico', 68); 
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9545,'Centro Agroempresarial y Turístico de los Andes', 68);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9309,'Centro de Servicios Empresariales y Turísticos', 68);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9225,'Centro Industrial del Diseño y la Manufactura', 68);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9224,'Centro Industrial de Mantenimiento Integral', 68);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9540,'Centro Industrial y del Desarrollo Tecnológico', 68);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9542,'Centro de la Innovación la Tecnología y los Servicios', 70);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9123,'Centro Agropecuario la Granja', 73);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9226,'Centro de Industria y Construcción', 73);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9310,'Centro de Comercio y Servicios', 73);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9124,'Centro Agropecuario de Buga', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9126,'Centro nautico pesquero de buenaventura', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9543,'Centro de Tecnologías Agroindustriales de Cartago', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9544,'Centro de Biotecnología Industrial', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9125,'Centro Latinoamericano de Especies Menores', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9227,'Centro de Electricidad y Automatización Industrial - CEAI', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9228,'Centro de la Construcción', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9230,'Centro Nacional de Asistencia Técnica a la Industria - ASTIN', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9311,'Centro de Gestión Tecnológica de Servicios', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9229,'Centro de Diseño Tecnológico Industrial', 76);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9548,'Centro Agropecuario y de Servicios Ambientales Jiri – Jirimo', 97);
INSERT INTO tab_centro (id_centro, nom_centro, id_regional) VALUES (9531,'Centro de Producción y Transformación Agroindustrial de la Orinoquia', 99);

INSERT INTO tab_jornada (nom_jornada) VALUES ('MAÑANA');
INSERT INTO tab_jornada (nom_jornada) VALUES ('TARDE');
INSERT INTO tab_jornada (nom_jornada) VALUES ('NOCTURNA');

INSERT INTO tab_tipo_formacion (tipo_formacion) VALUES ('Técnico Profesional');
INSERT INTO tab_tipo_formacion (tipo_formacion) VALUES ('Tecnología');
INSERT INTO tab_tipo_formacion (tipo_formacion) VALUES ('Articulación con la media');
INSERT INTO tab_tipo_formacion (tipo_formacion) VALUES ('Complementaria'); 
INSERT INTO tab_tipo_formacion (tipo_formacion) VALUES ('Operarios y auxiliares');

INSERT INTO tab_programa_formacion (id_programa,nom_programa) VALUES (621127,'TECNÓLOGO EN GESTIÓN COMERCIAL DE SERVICIOS');
INSERT INTO tab_programa_formacion (id_programa,nom_programa) VALUES (2111,'TECNOLOGÍA EN SISTEMAS');
INSERT INTO tab_programa_formacion (id_programa,nom_programa) VALUES (228106,'ADSI');
INSERT INTO tab_programa_formacion (id_programa,nom_programa) VALUES (0,'NO APLICA');

INSERT INTO tab_ficha (codigo_ficha,fecha_inicio,fecha_fin,id_jornada,id_tipo_formacion,id_programa,id_centro) VALUES 
(0,'01-01-2000','01-01-2000',2,2,0,9309);
INSERT INTO tab_ficha (codigo_ficha,fecha_inicio,fecha_fin,id_jornada,id_tipo_formacion,id_programa,id_centro) VALUES 
(864269,'17-01-2015','17-01-2017',1,2,228106,9309);
INSERT INTO tab_ficha (codigo_ficha,fecha_inicio,fecha_fin,id_jornada,id_tipo_formacion,id_programa,id_centro) VALUES 
(864270,'17-01-2015','17-01-2017',2,2,228106,9309);

INSERT INTO tab_usuario (id_usuario,nom_usuario,apell_usuario,celular,correo_electronico,clave) VALUES (1234,'USUARIO ROOT','DEL SISTEMA',0,'usuario@usuario.com','MTIzNA==');
INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha,ind_estado) VALUES (1234,1,1,9309,864269,TRUE);
INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha,ind_estado) VALUES (1230,2,1,9309,864269,TRUE);
INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha,ind_estado) VALUES (1231,3,1,9309,864269,TRUE);
INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha,ind_estado) VALUES (1232,4,1,9309,864269,TRUE);
INSERT INTO tab_usuario_perfil (id_usuario,id_rol,id_red,id_centro,codigo_ficha,ind_estado) VALUES (1233,5,1,9309,864269,TRUE);

--SQL PARA VER TABLAS
SELECT a.id_usuario, b.nom_rol FROM tab_usuario_perfil a, tab_perfil b WHERE a.id_usuario=1234 AND a.id_rol=b.id_rol;
SELECT (id_usuario,nom_usuario,apell_usuario,celular,correo_electronico,clave) FROM tab_usuario;
SELECT (nom_rol,descripcion) FROM tab_perfil;
SELECT (id_usuario,id_rol) FROM tab_usuario_perfil;
SELECT id_regional, nom_regional FROM tab_regional;
