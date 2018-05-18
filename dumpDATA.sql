
INSERT INTO `groups` (`id`, `label`) VALUES
(1, 'admin'),
(2, 'LP SIO'),
(3, 'LP CDAISI'),
(4, 'Test1'),
(5, 'test2'),
(6, 'test3'),
(7, 'test4'),
(8, 'DUT Informatique');


INSERT INTO `modules` (`id`, `label`, `group_id`) VALUES
(1, 'COURS DE MERDE', 2),
(2, 'test', 2),
(3, 'Anglais', 8);

INSERT INTO `users` (`id`, `nom`, `prenom`, `username`, `email`, `password`, `role`, `group_id`, `created`, `modified`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$zH6SYrhSFbVn58YRBGaGm.ZFUyQGbpapGiK22aNjYZX2d/j8Q34S6', 'admin', 1, '2018-03-15 20:30:37', '2018-03-15 20:30:37'),
(2, 'Ameziane', 'Jordan', 'Jordan.Ameziane', 'jordan.ameziane@gmail.com', '$2y$10$0sfvMhA8WnPXkufBVl61Z.FYlvVcqiFYilseMgjl4Wnbqd945x6ba', 'admin', 1, '2018-03-16 08:50:57', '2018-03-16 08:50:57'),
(6, 'test', 'test', 't.test', 'test@gmail.com', '$2y$10$0vmlnr/dLAA9ngRTkzhuk.GvoMEJWyD9z4P3rFAXnbes6biNHrlDm', 'eleve', 2, '2018-03-16 09:01:04', '2018-03-16 09:01:04'),
(5, 'Requillart', 'Paul', 'p.requillart', 'req@gmail.com', '$2y$10$3etcrA/1eKolMdWGsQ87D.q3vhTauwW6.zqwJN6uHke/FEMunBEg2', 'eleve', 2, '2018-03-16 08:55:49', '2018-03-16 08:55:49'),
(8, 'testes', 'test', 't.testes', 'test@e.fr', NULL, 'admin', 1, '2018-04-25 12:14:00', '2018-04-25 12:14:00'),
(9, 'testests', 'test', 't.testests', 'test@fr.fr', NULL, 'admin', 1, '2018-04-25 12:14:46', '2018-04-25 12:14:46'),
(10, 'aze', 'qzsed', 'q.aze', 'qsd@s.fr', NULL, 'admin', 1, '2018-04-25 12:15:23', '2018-04-25 12:15:23');


INSERT INTO `marks` (`id`, `value`, `label`, `user_id`, `module_id`) VALUES
(1, 15, 'test', 5, 1),
(2, 20, 'test2', 5, 1),
(3, 7, 'test nom module', 5, 2),
(4, 7, 'f', 1, 1);





