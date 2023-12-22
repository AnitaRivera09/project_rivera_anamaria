INSERT INTO `address` (`street_name`, `street_nb`, `city`, `province`, `zip_code`, `country`) VALUES
('default', 123, 'Montréal', 'Quebec', '123456', 'Canadá'),
('Mercier', 3229, 'Montréal', 'Quebec', 'H1L5J5', 'Canadá'),
('Sherbrook', 4556, 'Montreal', 'Quebec', 'H6T789', 'Canadá'),
('Radisson', 7654, 'Québec', 'Québec', 'H1L7J5', 'Canadá'),
('Jean-Talon', 7654, 'Toronto', 'Ontario', 'hgf54d', 'Canadá'),
('Cartier-Chinois', 7000, 'Otawwa', 'Ontario', 'hg4944', 'Canadá');

INSERT INTO `product` (`name`, `quantity`, `price`, `img_url`, `description`) VALUES
('Crayon des yeux Tren', 40, '8.50', '../Images/Produits/EY15.jpg', 'Excellente pigmentation. Texture gel à séchage rapide. Résistant à l\'eau et aux transferts. Il est rétractable. Glisse facilement.'),
('Rouges à lèvres magi', 86, '17.79', '../Images/Produits/LABIALES.JPG', 'Des rouges à lèvres magiques de différentes couleurs, pour tous types de femmes.'),
('Blush Stick Trendy B', 29, '15.00', '../Images/Produits/RUBOR.jpg', 'Il se décline en 2 teintes universelles qui vous sont proposées assorties, mais les deux sont magnifiques. Le packaging est trop mignon et fonctionnel, vous pouvez toujours l\'emporter avec vous ! Sa texture est crémeuse, vous pouvez l\'appliquer au pinceau ou si vous préférez directement sur le visage. Étant une crème, elle dure plus longtemps sur le visage, mais un avantage est de la sceller avec de la poudre pour qu\'elle reste intacte.'),
('Lisseur à cheveux te', 6, '28.00', '../Images/ProduitsPlancha.jpg', 'Grâce à son écran, vous pouvez régler la température. Le câble est rotatif, ce qui vous permettra de le déplacer de manière pratique et simple. Les plaques Mirror Titanium garantissent un standard de qualité élevé.'),
('Trendy Magic Conceal', 108, '4.00', '../Images/ProduitsCorrector.jpg', 'Couverture moyenne/élevée. Texture IDÉALE pour tous les types de peau, elle n\'est pas très mate, ni très hydratante, elle est intermédiaire et assez universelle. MEILLEUR vendeur dans notre magasin. De petite taille mais TRÈS pigmenté, un peu de produit suffit. Il se mélange de façon spectaculaire, on a l\'impression qu\'il s\'agit d\'un correcteur haut de gamme, sa couleur est facile à travailler et une fois sèche, elle dure TOUTE la journée. Imperméable longue durée. Variété de tons.'),
('Kit Lèvres Roberta R', 13, '22.00', '../Images/Produitslabios_rebelde.jpeg', 'Un duo parfait pour des lèvres percutantes. Stick et rouge à lèvres liquide pour des lèvres rouges audacieuses. Ils ont une excellente pigmentation. Cela ne dessèche pas vos lèvres. Pour lui donner un plus, dessinez le contour de vos lèvres avec des crayons Trendy.'),
('Miroir Gatico Tendan', 3, '16.00', '../Images/ProduitsEspejo.jpg', 'Notre Miroir Tendance est tout ce dont vous avez besoin pour organiser votre coiffeuse ! Miroir rotatif de haute qualité. L\'angle du miroir peut être ajusté en fonction du mouvement. Comprend un organiseur de bijoux qui vous permet d\'accrocher vos colliers, bracelets, boucles d\'oreilles et bagues. Couleur rose avec oreilles blanches. Trendy ne teste pas sur les animaux.'),
('Brosse Poignet Tenda', 67, '23.00', '../Images/ProduitsCepillo.jpg', 'Présentoir x12 unités. Modèle assorti à vendre. C\'est une mini brosse à cheveux aux poils doux et flexibles qui deviendra votre préférée pour démêler les cheveux. Empêche la fibre capillaire de se casser. Il a une forme ovale qui permet de tenir le pinceau très facilement. Disponible en 4 designs tendance exclusifs.');

INSERT INTO `role` (`name`, `description`) VALUES
('superadmin', 'superadmin'),
('admin', 'admin'),
('client', 'client');


INSERT INTO `user` (`user_name`, `email`, `pwd`, `fname`, `lname`, `billing_address_id`, `shipping_address_id`, `token`, `role_id`) VALUES
('Jen', 'jen@gmail.com', '$2y$10$1qhT6V867nOS1YzXP7jNNOgHV.lfoHK6SKaQGvAELoUmYkpoQPwJi', 'Gomez', 'Jenny', 2, 2, '486', 2),
('Meli', 'meli@gmail.com', '$2y$10$MxvqSpyKx1JTDzStVQUtJegFRMojqg3rDsTOPYB5XNKdSRK9I5ahS', 'Rodriguez', 'Melissa', 1, 1, '755508d6c3c7d08c52e9da2c871ea912c3f414c83b6dc792d5f11f1acea6f09e', 3),
('Anita', 'ana@gmail.com', '$2y$10$pb87XtLB0mAbf7QJ0WBQH.hir87nazsxoU5sMi/R1RHXYp9jvoY.y', 'Rivera', 'Anamaria', 1, 1, '5f90033ae7909156239a45232386b409805a73d6a68fb257be9fc15e1c107067', 1),
('Alexita022', 'alexa@gmail.com', '$2y$10$5EwAOGdmGSqbGmsPIv1v5OUmNtg5SDKGWYzCgvnhIjf4MY1vy7jha', 'Molina', 'Jeimy', 1, 1, '37650dcee0fb2687872fb9239701f5531dfefab4a10d29474e926afee88aa946', 2),
('Juli09', 'juliana@gmail.com', '$2y$10$BNJME44XrH0XXiI045Y9W.LCLIoeaWv6NrxTOsQ10gWelqWynQa8u', 'Ramirez', 'Juliana', 7, 7, '8403ac899c8b5e0e855d38243bf8607d26491a6d400ef2cafe25fa0ca7f7a2be', 3);
