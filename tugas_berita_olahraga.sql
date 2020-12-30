CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- Username : admin
-- password : admin