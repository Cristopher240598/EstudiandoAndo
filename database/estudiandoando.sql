--
-- Estructura de tabla para la tabla `actividades_tutor`
--

DROP TABLE IF EXISTS `actividades_tutor`;
CREATE TABLE IF NOT EXISTS `actividades_tutor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `objetivo` mediumtext,
  `instrucciones` mediumtext,
  `especialista` varchar(255) NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `enlace` mediumtext,
  `mes` int(11) NOT NULL,
  `id_gradoEscolar` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_acttutores_gradoesc` (`id_gradoEscolar`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_tutorado`
--

DROP TABLE IF EXISTS `actividades_tutorado`;
CREATE TABLE IF NOT EXISTS `actividades_tutorado` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_gradoEscolar` int(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `objetivo` mediumtext,
  `instrucciones` mediumtext,
  `especialista` varchar(255) NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `enlace` mediumtext,
  `semana` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_acttutorado_gradoesc` (`id_gradoEscolar`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones_tutor`
--

DROP TABLE IF EXISTS `asignaciones_tutor`;
CREATE TABLE IF NOT EXISTS `asignaciones_tutor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_tutor` int(255) DEFAULT NULL,
  `id_actividadTutor` int(255) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_asigtutor_tutor` (`id_tutor`),
  KEY `fk_asigtutor_acttutor` (`id_actividadTutor`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones_tutorado`
--

DROP TABLE IF EXISTS `asignaciones_tutorado`;
CREATE TABLE IF NOT EXISTS `asignaciones_tutorado` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_tutorado` int(255) DEFAULT NULL,
  `id_actividadTutorado` int(255) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL,
  `fechaHora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_asigtutorado_tutorado` (`id_tutorado`),
  KEY `fk_asigtutorado_acttutorado` (`id_actividadTutorado`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_tutor` int(255) DEFAULT NULL,
  `id_tema` int(255) DEFAULT NULL,
  `comentario` mediumtext,
  `fechaHora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comentario_tutor` (`id_tutor`),
  KEY `fk_comentario_tema` (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados_escolares`
--

DROP TABLE IF EXISTS `grados_escolares`;
CREATE TABLE IF NOT EXISTS `grados_escolares` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `grado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_tutor`
--

DROP TABLE IF EXISTS `preguntas_tutor`;
CREATE TABLE IF NOT EXISTS `preguntas_tutor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_actividadTutor` int(255) DEFAULT NULL,
  `pregunta` mediumtext,
  `respuesta` mediumtext,
  PRIMARY KEY (`id`),
  KEY `fk_pregtutor_acttutor` (`id_actividadTutor`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_tutorado`
--

DROP TABLE IF EXISTS `preguntas_tutorado`;
CREATE TABLE IF NOT EXISTS `preguntas_tutorado` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_actividadTutorado` int(255) DEFAULT NULL,
  `pregunta` mediumtext,
  `respuesta` mediumtext,
  PRIMARY KEY (`id`),
  KEY `fk_pregtutorado_acttutorado` (`id_actividadTutorado`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_tutor`
--

DROP TABLE IF EXISTS `respuestas_tutor`;
CREATE TABLE IF NOT EXISTS `respuestas_tutor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_preguntaTutor` int(255) DEFAULT NULL,
  `id_tutor` int(255) DEFAULT NULL,
  `respuesta` mediumtext,
  PRIMARY KEY (`id`),
  KEY `fk_resptutor_pregtutor` (`id_preguntaTutor`),
  KEY `fk_resptutor_tutor` (`id_tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_tutorado`
--

DROP TABLE IF EXISTS `respuestas_tutorado`;
CREATE TABLE IF NOT EXISTS `respuestas_tutorado` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_preguntaTutorado` int(255) DEFAULT NULL,
  `id_tutorado` int(255) DEFAULT NULL,
  `respuesta` mediumtext,
  PRIMARY KEY (`id`),
  KEY `fk_resptutorado_pregtutorado` (`id_preguntaTutorado`),
  KEY `fk_resptutorado_tutorado` (`id_tutorado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias_comentarios`
--

DROP TABLE IF EXISTS `sugerencias_comentarios`;
CREATE TABLE IF NOT EXISTS `sugerencias_comentarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_tutor` int(255) DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `texto` mediumtext,
  PRIMARY KEY (`id`),
  KEY `fk_sugcom_tutor` (`id_tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

DROP TABLE IF EXISTS `temas`;
CREATE TABLE IF NOT EXISTS `temas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_tutor` int(255) DEFAULT NULL,
  `tema` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descripcion` mediumtext,
  `fechaHora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tema_tutor` (`id_tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorados`
--

DROP TABLE IF EXISTS `tutorados`;
CREATE TABLE IF NOT EXISTS `tutorados` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_tutor` int(255) DEFAULT NULL,
  `id_usuario` int(255) DEFAULT NULL,
  `id_gradoEscolar` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tutorado_tutor` (`id_tutor`),
  KEY `fk_tutorado_usuario` (`id_usuario`),
  KEY `fk_tutorado_gradoEsc` (`id_gradoEscolar`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

DROP TABLE IF EXISTS `tutores`;
CREATE TABLE IF NOT EXISTS `tutores` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(255) DEFAULT NULL,
  `id_gradoEscolar` int(255) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tutor_usuario` (`id_usuario`),
  KEY `fk_tutores_gradoesc` (`id_gradoEscolar`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(30) DEFAULT NULL,
  `apellidoMaterno` varchar(30) DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rol` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_usuario` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades_tutor`
--
ALTER TABLE `actividades_tutor`
  ADD CONSTRAINT `fk_acttutores_gradoesc` FOREIGN KEY (`id_gradoEscolar`) REFERENCES `grados_escolares` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `actividades_tutorado`
--
ALTER TABLE `actividades_tutorado`
  ADD CONSTRAINT `fk_acttutorado_gradoesc` FOREIGN KEY (`id_gradoEscolar`) REFERENCES `grados_escolares` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `asignaciones_tutor`
--
ALTER TABLE `asignaciones_tutor`
  ADD CONSTRAINT `fk_asigtutor_acttutor` FOREIGN KEY (`id_actividadTutor`) REFERENCES `actividades_tutor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_asigtutor_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `asignaciones_tutorado`
--
ALTER TABLE `asignaciones_tutorado`
  ADD CONSTRAINT `fk_asigtutorado_acttutorado` FOREIGN KEY (`id_actividadTutorado`) REFERENCES `actividades_tutorado` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_asigtutorado_tutorado` FOREIGN KEY (`id_tutorado`) REFERENCES `tutorados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentario_tema` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comentario_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas_tutor`
--
ALTER TABLE `preguntas_tutor`
  ADD CONSTRAINT `fk_pregtutor_acttutor` FOREIGN KEY (`id_actividadTutor`) REFERENCES `actividades_tutor` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas_tutorado`
--
ALTER TABLE `preguntas_tutorado`
  ADD CONSTRAINT `fk_pregtutorado_acttutorado` FOREIGN KEY (`id_actividadTutorado`) REFERENCES `actividades_tutorado` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestas_tutor`
--
ALTER TABLE `respuestas_tutor`
  ADD CONSTRAINT `fk_resptutor_pregtutor` FOREIGN KEY (`id_preguntaTutor`) REFERENCES `preguntas_tutor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_resptutor_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestas_tutorado`
--
ALTER TABLE `respuestas_tutorado`
  ADD CONSTRAINT `fk_resptutorado_pregtutorado` FOREIGN KEY (`id_preguntaTutorado`) REFERENCES `preguntas_tutorado` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_resptutorado_tutorado` FOREIGN KEY (`id_tutorado`) REFERENCES `tutorados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sugerencias_comentarios`
--
ALTER TABLE `sugerencias_comentarios`
  ADD CONSTRAINT `fk_sugcom_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `fk_tema_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tutorados`
--
ALTER TABLE `tutorados`
  ADD CONSTRAINT `fk_tutorado_gradoEsc` FOREIGN KEY (`id_gradoEscolar`) REFERENCES `grados_escolares` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tutorado_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tutorado_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD CONSTRAINT `fk_tutor_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tutores_gradoesc` FOREIGN KEY (`id_gradoEscolar`) REFERENCES `grados_escolares` (`id`) ON DELETE CASCADE;
COMMIT;