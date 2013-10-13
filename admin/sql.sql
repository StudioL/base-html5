CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(10) NOT NULL auto_increment,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `permiso` tinyint(1) NOT NULL COMMENT 'Flag> 0:eliminado, 1:normal, 2:dios',
  `ultimo_login` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `administradores` (`id`, `usuario`, `password`, `nombre`, `email`, `permiso`, `ultimo_login`) VALUES
(1, 'user1', 'pass1', 'user 1', 'user1@gmail.com', 2, '0000-00-00 00:00:00');