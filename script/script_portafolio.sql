-- Fecha: 17 de diciembre de 2016
-- Servidor: LINUX CENTOS 7
-- Versión de PHP: 5.4.16 (CLI) (BUILT:JUNIO 23 DE 2015)
-- Base de datos: PostgreSQL version 9.4.7 nombre=portafolio
-- Programadores: Diana Carolina Chacón López - Wilmer Arley Castillo Rodriguez

-- *******************************************************
-- INSTRUCCIONES PARA BORRAR TABLAS             *
-- *******************************************************

DROP TABLE tab_usuario_perfil;
DROP TABLE tab_perfil;
DROP TABLE tab_red;
DROP TABLE tab_tramite;
DROP TABLE tab_ficha;
DROP TABLE tab_centro;
DROP TABLE tab_regional;
DROP TABLE tab_programa_formacion;
DROP TABLE tab_tipo_tramite;
DROP TABLE tab_usuario;
DROP TABLE tab_jornada;
DROP TABLE tab_tipo_formacion;
DROP TABLE tab_p_aprendiz;
DROP TABLE tab_p_instructor;
DROP TABLE tab_respaldo;


-- *******************************************************
-- INSTRUCCIONES PARA BORRAR LAS FUNCIONES  			 *
-- *******************************************************

DROP FUNCTION fun_auditoria() CASCADE;
DROP FUNCTION fun_id_rol() CASCADE;
DROP FUNCTION fun_id_tipo_formacion() CASCADE;
DROP FUNCTION fun_id_tipo_tramite() CASCADE;
DROP FUNCTION fun_id_tramite() CASCADE;
DROP FUNCTION fun_id_jornada() CASCADE;
DROP FUNCTION fun_id_red() CASCADE;
DROP FUNCTION fun_insert_p_aprendiz() CASCADE;
DROP FUNCTION fun_insert_p_instructor() CASCADE;

-- *******************************************************
-- INSTRUCCIONES PARA CREAR LAS TABLAS DEL SISTEMA 		 *
-- *******************************************************

CREATE TABLE tab_red (												--Esta tabla agrega las diferentes redes a las que se puede pertenencer según clasificación del SENA
 id_red  				SMALLINT					NOT NULL, 		--Número identificador asignado por el sistema
 nom_red				VARCHAR(100)				NOT NULL,		--Nombre de la red
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_red)
);

CREATE TABLE tab_regional(
 id_regional			SMALLINT					NOT NULL, 		--Número identificador de la regional proporcionado por el SENA
 nom_regional			VARCHAR(100)				NOT NULL, 		--Nombre de la regional del SENA
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_regional)
);

CREATE TABLE tab_centro(
 id_centro				SMALLINT					NOT NULL,		--Código del centro de formación asignado por el SENA
 nom_centro				VARCHAR(100)				NOT NULL,		--Nombre del centro de formación
 id_regional			SMALLINT					NOT NULL, 		--Número identificador de la regional proporcionado por el SENA			
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_centro),
 FOREIGN KEY (id_regional) REFERENCES tab_regional (id_regional)
);

CREATE TABLE tab_perfil(											--Los perfiles son los roles que se le asignarán o negarán a un usuario para conceder privilegios en el sistema
 id_rol  				SMALLINT					NOT NULL, 		--Número identificador asignado por el sistema
 nom_rol				VARCHAR(20)					NOT NULL,		--Nombre del rol
 descripcion			VARCHAR(100)					NULL,		--Más detalles acerca del rol
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_rol)
);

CREATE TABLE tab_usuario(  											--Un usuario es el que interactúa con el sistema, al cual debemos controlar para validar qué puede o no hacer
 id_usuario 			BIGINT						NOT NULL,	 	--cedula del usuario
 foto 					VARCHAR(100) NULL DEFAULT 'uploads/fotoperfil.jpg',		--Espacio para guardar directorio de la foto del usuario
 nom_usuario			VARCHAR(30)					NOT NULL,	 	--nombre del usuario
 apell_usuario			VARCHAR(30)					NOT NULL,		--Apellido del usuario
 celular				BIGINT							NULL,		--Número de celular del usuario
 correo_electronico		VARCHAR(50)					NOT NULL,		--Correo electrónico del usuario
 clave					VARCHAR(100)				NOT NULL,		--Contraseña de ingreso al sistema
 pregunta				VARCHAR(100)					NULL,		--Pregunta de seguridad para recuperar contraseña
 respuesta				VARCHAR(100)					NULL,		--Respuesta de seguridad para recuperar contraseña
 ind_estado				BOOLEAN		DEFAULT TRUE 	NOT NULL,		--Indicador para señalar si el usuario se encuentra activo (TRUE) o inactivo en el sistema (FALSE).
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_usuario)
);

CREATE TABLE tab_jornada(											--Tabla para almacenar el horario en que transcurre la formación: mañana, tarde, noche
 id_jornada				SMALLINT					NOT NULL,		--Número identificador de la jornada asignado por el sistema automáticamente
 nom_jornada			VARCHAR(10)					NOT NULL,		--Nombre de la jornada
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_jornada)
 );

CREATE TABLE tab_tipo_formacion(									--Tipo de formación: técnica, tecnológica, media
 id_tipo_formacion		SMALLINT					NOT NULL,		--Número identificador asignado automáticamente por el sistema
 tipo_formacion			VARCHAR(30)					NOT NULL,		--Nombre asignado para el tipo de formación
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_tipo_formacion)
 );

CREATE TABLE tab_programa_formacion(
 id_programa			INTEGER						NOT NULL,		--Código del programa de formación asignado por el SENA
 nom_programa			VARCHAR(100)				NOT NULL,		--Nombre del programa de formación
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_programa)
 );

CREATE TABLE tab_ficha(
 codigo_ficha			INTEGER						NOT NULL,		--Código de la ficha asignado por el SENA
 fecha_inicio			DATE	  					NOT NULL,		--Fecha de inicio de la formación
 fecha_fin				DATE	  					NOT NULL,		--Fecha de finalización de la formación
 id_jornada				SMALLINT					NOT NULL,		--Número identificador de la jornada asignado por el sistema automáticamente
 id_tipo_formacion		SMALLINT					NOT NULL,		--Número identificador asignado automáticamente por el sistema
 id_programa			INTEGER						NOT NULL,		--Código del programa de formación asignado por el SENA
 id_centro				SMALLINT					NOT NULL,		--Código del centro de formación asignado por el SENA
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (codigo_ficha),
 FOREIGN KEY (id_jornada) REFERENCES tab_jornada(id_jornada),
 FOREIGN KEY (id_tipo_formacion) REFERENCES tab_tipo_formacion (id_tipo_formacion),
 FOREIGN KEY (id_centro) REFERENCES tab_centro (id_centro)
 );

CREATE TABLE tab_tipo_tramite(										--Tabla para caracterizar los trámites que se gestionan
 id_tipo_tramite		SMALLINT					NOT NULL,		--Número identificador del trámite asignado automáticamente por el sistema
 nom_tramite 			VARCHAR(50)					NOT NULL,		--Nombre del trámite
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_tipo_tramite)
 );

CREATE TABLE tab_tramite(											--Tabla para organizar los tramites que debe hacer seguimiento un coordinadar de un centro de formación
 id_tramite				BIGINT						NOT NULL,		--Consecutivo asignado automáticamente por el sistema
 id_usuario				INTEGER						NOT NULL,		--Número de identificación del usuario				
 id_tipo_tramite		SMALLINT					NOT NULL,		--Número identificador del trámite asignado automáticamente por el sistema
 descripcion			VARCHAR(200)				NOT NULL,		--Detalle del trámite en cuestión
 fecha 					TIMESTAMP 					NOT NULL,		--Fecha en la que inicia el trámite
 ind_estado  			BOOLEAN						NOT NULL,		--TRUE Para ACTIVO FALSE para FINALIZADO
 codigo_ficha			INTEGER						NOT NULL,		--Código de la ficha asignado por el SENA
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_tramite,id_usuario),
 FOREIGN KEY (id_usuario) REFERENCES tab_usuario (id_usuario),
 FOREIGN KEY (id_tipo_tramite) REFERENCES tab_tipo_tramite (id_tipo_tramite),
 FOREIGN KEY (codigo_ficha) REFERENCES tab_ficha (codigo_ficha)
);

CREATE TABLE tab_usuario_perfil(
 id_usuario 			BIGINT						NOT NULL,	 	--cedula del usuario
 id_rol  				SMALLINT					NOT NULL, 		--Número identificador asignado por el sistema
 id_red  				SMALLINT					NOT NULL,		--Red tecnológica según clasificación del SENA
 id_centro				SMALLINT					NOT NULL,		--Código del centro de formación asignado por el SENA
 codigo_ficha			INTEGER						NOT NULL,		--Código de la ficha asignado por el SENA
 ind_estado				BOOLEAN		DEFAULT FALSE 	NOT NULL,		--Indicador para señalar si se encuentra activo (TRUE) o inactivo en el sistema (FALSE).
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_usuario, id_rol, codigo_ficha),
 FOREIGN KEY (id_usuario) 		REFERENCES tab_usuario (id_usuario),
 FOREIGN KEY (id_rol) 			REFERENCES tab_perfil (id_rol),
 FOREIGN KEY (id_red) 			REFERENCES tab_red (id_red),
 FOREIGN KEY (id_centro) 		REFERENCES tab_centro (id_centro),
 FOREIGN KEY (codigo_ficha) 	REFERENCES tab_ficha (codigo_ficha)
);

CREATE TABLE tab_p_aprendiz(										--Tabla para el portafolio del aprendiz
 id_usuario 			BIGINT 						NOT NULL, 		--Número de identificación del usuario
 codigo_ficha			INTEGER						NOT NULL,		--Código de la ficha asignado por el SENA
 hoja_vida 				VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 programa_formacion     VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 proyecto_formativo     VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 planeacion_pedagogica  VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 guias_aprendizaje      VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 plan_lectiva           VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 evidencias_aprendizaje VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 planeacion_productiva  VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 plan_mejoramiento      VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 comentarios			VARCHAR(200)					NULL,		--Espacio que muestra los comentarios realizados por una persona con perfil de calidad
 ind_estado				BOOLEAN		DEFAULT TRUE 	NOT NULL,		--Indicador para señalar si se encuentra activo (TRUE) o inactivo en el sistema (FALSE).
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_usuario,codigo_ficha)
 );

CREATE TABLE tab_p_instructor(										--Tabla para el portafolio del instructor
 id_usuario		 		BIGINT						NOT NULL,		--Número de identificación del usuario
 codigo_ficha			INTEGER						NOT NULL,		--Código de la ficha asignado por el SENA
 programa_formacion     VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 listado_aprendices		VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 horario_instructor		VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 proyecto_formativo		VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 planeacion_pedagogica	VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 guias_aprendizaje		VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 instrum_evaluacion 	VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 plan_lectiva 			VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 planeacion_productiva  VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 plan_mejoramiento 		VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 reg_inasistencias 		VARCHAR(200) 					NULL,		--Espacio para el hipervínculo donde se aloja la carpeta
 comentarios			VARCHAR(200)					NULL,		--Espacio que muestra los comentarios realizados por una persona con perfil de calidad
 ind_estado				BOOLEAN		DEFAULT TRUE 	NOT NULL,		--Indicador para señalar si se encuentra activo (TRUE) o inactivo en el sistema (FALSE).
 usr_insert         	VARCHAR(30)                 NOT NULL,	 	--Aquí comienza la sección de auditoría //Usuario que inserta nuevo dato
 fec_insert         	TIMESTAMP WITHOUT TIME ZONE NOT NULL,    	--Fecha de inserción
 usr_update         	VARCHAR(30),  							 	--Usuario que actualiza
 fec_update         	TIMESTAMP WITHOUT TIME ZONE,   			 	--Fecha de actualización
 PRIMARY KEY (id_usuario, codigo_ficha)
 );

-- **********************************************************************************
-- TABLA PARA TENER INFORMACIÓN DEL USUARIO QUE BORRA ALGUN DATO DE CUALQUIER TABLA *
--  *********************************************************************************

CREATE TABLE tab_respaldo
(
 id_respaldo				INTEGER						NOT NULL,	--Identificador de la tabla respaldo 
 nom_tabla					VARCHAR						NOT NULL,	--Nombre de la tabla que fue eliminada
 usr_delete             	VARCHAR(30) 				NOT NULL,	--Nombre del usuario que elimina el registro
 fec_delete             	TIMESTAMP WITHOUT TIME ZONE NOT NULL,   --Fecha en la cual se ha eliminado el registro
PRIMARY KEY (id_respaldo)
);

-- ******************************************************************************************************
-- FUNCIÓN AUDITORIA PARA TENER INFORMACION DE LAS ACTUALIZACIONES E INSERCIONES DE DATOS EN LAS TABLAS *
-- ******************************************************************************************************

CREATE FUNCTION fun_auditoria() RETURNS "trigger"
 AS $$
 DECLARE wid_respaldo tab_respaldo.id_respaldo%TYPE; --Variable para guardar numeración automática en la tabla respaldo
 BEGIN
	 IF TG_OP = 'INSERT' THEN
	     NEW.usr_insert = CURRENT_USER;		 --Identifica el usuario que usa la aplicación en el momento de la inserción
	     NEW.fec_insert = CURRENT_TIMESTAMP; --Identifica la fecha y hora del sistema en el momento de la inserción
	    RETURN NEW;
	 END IF;
	  
	 IF TG_OP = 'UPDATE' THEN
	     NEW.usr_update = CURRENT_USER;		 --Identifica el usuario que usa la aplicación en el momento de la actualización
	     NEW.fec_update = CURRENT_TIMESTAMP; --Identifica la fecha y hora del sistema en el momento de la actualización
	       RETURN NEW;
	 END IF;
	  	  
	 IF TG_OP = 'DELETE' THEN
	    SELECT MAX(id_respaldo) INTO wid_respaldo FROM tab_respaldo;
	    IF wid_respaldo IS NULL OR wid_respaldo = 0 THEN wid_respaldo = 1;
	    ELSE
	    wid_respaldo = wid_respaldo + 1; --Para llevar un número consecutivo automático sin usar AUTOINCREMENT
	    END IF;
	    INSERT INTO tab_respaldo VALUES (wid_respaldo, tg_table_name, CURRENT_USER, CURRENT_TIMESTAMP); --Tg_table_name identifica la tabla del registro que fue eliminado
	    RETURN OLD;
	 END IF;
    RETURN NULL;
 END;
$$ LANGUAGE plpgsql;


-- ******************************************************************************************************
-- FUNCIONES PARA HACER NÚMEROS CONSECUTIVOS SIN NECESIDAD DEL CAMPO SERIAL *****************************
-- ******************************************************************************************************

CREATE FUNCTION fun_id_rol() RETURNS "trigger"
 AS $$
 DECLARE wid SMALLINT;
 BEGIN
	SELECT MAX(id_rol) FROM tab_perfil INTO wid;
	IF wid IS NULL OR wid = 0 THEN wid =1;
	NEW.id_rol=wid;
	RETURN NEW;
	ELSE
	wid=wid+1;
	NEW.id_rol=wid;
	RETURN NEW;
	END IF;
 RETURN NULL;
 END;
$$ LANGUAGE plpgsql;

CREATE FUNCTION fun_id_jornada() RETURNS "trigger"
 AS $$
 DECLARE wid SMALLINT;
 BEGIN
	SELECT MAX(id_jornada) FROM tab_jornada INTO wid;
	IF wid IS NULL OR wid = 0 THEN wid =1;
	NEW.id_jornada=wid;
	RETURN NEW;
	ELSE
	wid=wid+1;
	NEW.id_jornada=wid;
	RETURN NEW;
	END IF;
 RETURN NULL;
 END;
$$ LANGUAGE plpgsql;

CREATE FUNCTION fun_id_tipo_formacion() RETURNS "trigger"
 AS $$
 DECLARE wid SMALLINT;
 BEGIN
	SELECT MAX(id_tipo_formacion) FROM tab_tipo_formacion INTO wid;
	IF wid IS NULL OR wid = 0 THEN wid =1;
	NEW.id_tipo_formacion=wid;
	RETURN NEW;
	ELSE
	wid=wid+1;
	NEW.id_tipo_formacion=wid;
	RETURN NEW;
	END IF;
 RETURN NULL;
 END;
$$ LANGUAGE plpgsql;

CREATE FUNCTION fun_id_tipo_tramite() RETURNS "trigger"
 AS $$
 DECLARE wid SMALLINT;
 BEGIN
	SELECT MAX(id_tipo_tramite) FROM tab_tipo_tramite INTO wid;
	IF wid IS NULL OR wid = 0 THEN wid =1;
	NEW.id_tipo_tramite=wid;
	RETURN NEW;
	ELSE
	wid=wid+1;
	NEW.id_tipo_tramite=wid;
	RETURN NEW;
	END IF;
 RETURN NULL;
 END;
$$ LANGUAGE plpgsql;

CREATE FUNCTION fun_id_tramite() RETURNS "trigger"
 AS $$
 DECLARE wid SMALLINT;
 BEGIN
	SELECT MAX(id_tramite) FROM tab_tramite INTO wid;
	IF wid IS NULL OR wid = 0 THEN wid =1;
	NEW.id_tramite=wid;
	RETURN NEW;
	ELSE
	wid=wid+1;
	NEW.id_tramite=wid;
	RETURN NEW;
	END IF;
 RETURN NULL;
 END;
$$ LANGUAGE plpgsql;

CREATE FUNCTION fun_id_red() RETURNS "trigger"
 AS $$
 DECLARE wid SMALLINT;
 BEGIN
	SELECT MAX(id_red) FROM tab_red INTO wid;
	IF wid IS NULL OR wid = 0 THEN wid =1;
	NEW.id_red=wid;
	RETURN NEW;
	ELSE
	wid=wid+1;
	NEW.id_red=wid;
	RETURN NEW;
	END IF;
 RETURN NULL;
 END;
$$ LANGUAGE plpgsql;

--Funcion y disparador para el llenado de la tablas portafolio instructor a partir de la creación del perfil instructor
-- *******************************************************************************************************************

CREATE FUNCTION fun_insert_p_instructor() RETURNS "trigger"
AS $$

BEGIN

   IF NEW.id_rol=4 THEN
	INSERT INTO tab_p_instructor (id_usuario, codigo_ficha) VALUES (NEW.id_usuario, NEW.codigo_ficha);
	ELSE NULL;
END IF;	
RETURN NEW;

END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER tri_insert_p_instructor
AFTER INSERT ON tab_usuario_perfil
FOR EACH ROW EXECUTE PROCEDURE fun_insert_p_instructor();

--Funcion y disparador para el llenado de la tablas portafolio aprendiz a partir de la creación del perfil aprendiz
-- *******************************************************************************************************************

CREATE FUNCTION fun_insert_p_aprendiz() RETURNS "trigger"
AS $$

BEGIN

   IF NEW.id_rol=5 THEN
	INSERT INTO tab_p_aprendiz (id_usuario, codigo_ficha) VALUES (NEW.id_usuario, NEW.codigo_ficha);
	ELSE NULL;
END IF;	
RETURN NEW;

END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER tri_insert_p_aprendiz
AFTER INSERT ON tab_usuario_perfil
FOR EACH ROW EXECUTE PROCEDURE fun_insert_p_aprendiz();


-- *********************************************************************  
-- DISPARADORES PARA LAS ACTUALIZACIONES Y LAS INSERCION DE LAS TABLAS *
-- *********************************************************************

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_perfil
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_usuario
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_usuario_perfil
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_regional
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_centro
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_jornada
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_tipo_formacion
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_programa_formacion
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_ficha
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_tipo_tramite
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_tramite
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_p_aprendiz
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_p_instructor
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria(); 

CREATE TRIGGER tri_auditoria
 BEFORE INSERT OR UPDATE ON tab_red
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria(); 


-- *******************************************************************************
-- DISPARADORES DE LA FUNCION RESPALDO PARA LOS REGISTROS QUE HAN SIDO BORRADOS *
-- *******************************************************************************

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_perfil
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_usuario
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_usuario_perfil
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_regional
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_centro
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_jornada
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_tipo_formacion
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_programa_formacion
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_ficha
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_tipo_tramite
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_tramite
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_p_aprendiz
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_p_instructor
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria(); 

CREATE TRIGGER tri_auditoriadelete
 AFTER DELETE ON tab_red
 FOR EACH ROW EXECUTE PROCEDURE fun_auditoria();

-- ***************************************************************************************
-- DISPARADORES PARA GENERAR NÚMEROS DE IDENTIFICACIÓN DE TABLAS DE FORMA AUTOMÁTICA *****
-- ***************************************************************************************

CREATE TRIGGER tri_id_rol
	BEFORE INSERT ON tab_perfil
	FOR EACH ROW EXECUTE PROCEDURE fun_id_rol();

CREATE TRIGGER tri_id_jornada
	BEFORE INSERT ON tab_jornada
	FOR EACH ROW EXECUTE PROCEDURE fun_id_jornada();

CREATE TRIGGER tri_id_tipo_formacion
	BEFORE INSERT ON tab_tipo_formacion
	FOR EACH ROW EXECUTE PROCEDURE fun_id_tipo_formacion();

CREATE TRIGGER tri_id_tipo_tramite
	BEFORE INSERT ON tab_tipo_tramite
	FOR EACH ROW EXECUTE PROCEDURE fun_id_tipo_tramite();

CREATE TRIGGER tri_id_tramite
	BEFORE INSERT ON tab_tramite
	FOR EACH ROW EXECUTE PROCEDURE fun_id_tramite();

CREATE TRIGGER tri_id_red
	BEFORE INSERT ON tab_red
	FOR EACH ROW EXECUTE PROCEDURE fun_id_red();
