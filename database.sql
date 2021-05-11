CREATE DATABASE IF NOT EXISTS estudiandoando;

USE estudiandoando;

CREATE TABLE IF NOT EXISTS usuarios(
id                  int(255) auto_increment not null, 
nombre              varchar(50),
apellidoPaterno     varchar(30),
apellidoMaterno     varchar(30),
usuario             varchar(150),
contrasenia         varchar(255),
rol                 varchar(30),
CONSTRAINT pk_usuarios PRIMARY KEY(id)
)ENGINE=InnoDb;

ALTER TABLE usuarios ADD CONSTRAINT uq_usuario UNIQUE (usuario);

CREATE TABLE IF NOT EXISTS tutores(
id                  int(255) auto_increment not null, 
id_usuario          int(255),
estatus             boolean,
CONSTRAINT pk_tutores PRIMARY KEY(id),
CONSTRAINT fk_tutor_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS sugerencias_comentarios(
id                  int(255) auto_increment not null, 
id_tutor            int(255),
tema                varchar(255),
texto               mediumtext,
CONSTRAINT pk_sugcom PRIMARY KEY(id),
CONSTRAINT fk_sugcom_tutor FOREIGN KEY(id_tutor) REFERENCES tutores(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS temas(
id                  int(255) auto_increment not null, 
id_tutor            int(255),
titulo              varchar(255),
descripcion         mediumtext,
fecha               date,
hora                time,
CONSTRAINT pk_tema PRIMARY KEY(id),
CONSTRAINT fk_tema_tutor FOREIGN KEY(id_tutor) REFERENCES tutores(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS comentarios(
id                  int(255) auto_increment not null, 
id_tutor            int(255),
id_tema             int(255),
comentario          mediumtext,
fecha               date,
hora                time,
CONSTRAINT pk_comentario PRIMARY KEY(id),
CONSTRAINT fk_comentario_tutor FOREIGN KEY(id_tutor) REFERENCES tutores(id) ON DELETE CASCADE,
CONSTRAINT fk_comentario_tema FOREIGN KEY(id_tema) REFERENCES temas(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS grados_escolares(
id                  int(255) auto_increment not null, 
grado               varchar(255),
CONSTRAINT pk_gradoEsc PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS tutorados(
id                  int(255) auto_increment not null, 
id_tutor            int(255),
id_usuario          int(255),
id_gradoEscolar     int(255),
CONSTRAINT pk_tutorado PRIMARY KEY(id),
CONSTRAINT fk_tutorado_tutor FOREIGN KEY(id_tutor) REFERENCES tutores(id) ON DELETE CASCADE,
CONSTRAINT fk_tutorado_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
CONSTRAINT fk_tutorado_gradoEsc FOREIGN KEY(id_gradoEscolar) REFERENCES grados_escolares(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS actividades_tutorado(
id                      int(255) auto_increment not null, 
id_gradoEscolar         int(255),
nombre                  varchar(255),
imagen                  varchar(255),
objetivo                mediumtext,
instrucciones           mediumtext,
estatus                 boolean,
archivo                 varchar(255),
enlace                  mediumtext,
fechaRealizacion        date,
hora                    time,
CONSTRAINT pk_acttutorado PRIMARY KEY(id),
CONSTRAINT fk_acttutorado_gradoesc FOREIGN KEY(id_gradoEscolar) REFERENCES grados_escolares(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS asignaciones_tutorado(
id                      int(255) auto_increment not null, 
id_tutorado             int(255),
id_actividadTutorado  int(255),
semana                  int(10),
CONSTRAINT pk_asigtutorado PRIMARY KEY(id),
CONSTRAINT fk_asigtutorado_tutorado FOREIGN KEY(id_tutorado) REFERENCES tutorados(id) ON DELETE CASCADE,
CONSTRAINT fk_asigtutorado_acttutorado FOREIGN KEY(id_actividadTutorado) REFERENCES actividades_tutorado(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS preguntas_tutorado(
id                      int(255) auto_increment not null, 
id_actividadTutorado    int(255),
pregunta                mediumtext,
respuesta               mediumtext,
CONSTRAINT pk_pregtutorado PRIMARY KEY(id),
CONSTRAINT fk_pregtutorado_acttutorado FOREIGN KEY(id_actividadTutorado) REFERENCES actividades_tutorado(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS actividades_tutor(
id                      int(255) auto_increment not null, 
nombre                  varchar(255),
imagen                  varchar(255),
objetivo                mediumtext,
instrucciones           mediumtext,
estatus                 boolean,
archivo                 varchar(255),
enlace                  mediumtext,
CONSTRAINT pk_acttutor PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS asignaciones_tutor(
id                      int(255) auto_increment not null, 
id_tutor                int(255),
id_actividadTutor       int(255),
mes                     int(10),
CONSTRAINT pk_asigtutor PRIMARY KEY(id),
CONSTRAINT fk_asigtutor_tutor FOREIGN KEY(id_tutor) REFERENCES tutores(id) ON DELETE CASCADE,
CONSTRAINT fk_asigtutor_acttutor FOREIGN KEY(id_actividadTutor) REFERENCES actividades_tutor(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS preguntas_tutor(
id                      int(255) auto_increment not null, 
id_actividadTutor       int(255),
pregunta                mediumtext,
respuesta               mediumtext,
CONSTRAINT pk_pregtutor PRIMARY KEY(id),
CONSTRAINT fk_pregtutor_acttutor FOREIGN KEY(id_actividadTutor) REFERENCES actividades_tutor(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS respuestas_tutor(
id                      int(255) auto_increment not null, 
id_preguntaTutor        int(255),
id_tutor                int(255),
respuesta               mediumtext,
CONSTRAINT pk_resptutor PRIMARY KEY(id),
CONSTRAINT fk_resptutor_pregtutor FOREIGN KEY(id_preguntaTutor) REFERENCES preguntas_tutor(id) ON DELETE CASCADE
CONSTRAINT fk_resptutor_tutor FOREIGN KEY(id_tutor) REFERENCES tutores(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS respuestas_tutorado(
id                      int(255) auto_increment not null, 
id_preguntaTutorado     int(255),
id_tutorado             int(255),
respuesta               mediumtext,
CONSTRAINT pk_resptutorado PRIMARY KEY(id),
CONSTRAINT fk_resptutorado_pregtutorado FOREIGN KEY(id_preguntaTutorado) REFERENCES preguntas_tutorado(id) ON DELETE CASCADE
CONSTRAINT fk_resptutorado_tutorado FOREIGN KEY(id_tutorado) REFERENCES tutorados(id) ON DELETE CASCADE
)ENGINE=InnoDb;

ALTER TABLE tutores ADD CONSTRAINT fk_tutores_gradoesc FOREIGN KEY(id_gradoEscolar) REFERENCES grados_escolares(id) ON DELETE CASCADE;
ALTER TABLE actividades_tutor ADD CONSTRAINT fk_acttutores_gradoesc FOREIGN KEY(id_gradoEscolar) REFERENCES grados_escolares(id) ON DELETE CASCADE;