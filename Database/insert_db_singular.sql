use db_singular;

INSERT INTO animals (id_animal, name_animal) VALUES 
(1, 'admis'),
(2, 'non-admis');

INSERT INTO accomodations (id_accomodation, name_accomodation, description_accomodation,icon_accomodation) VALUES
(1, 'Wifi','Une connexion Wi-Fi est disponible dans tout l\'établissement gratuitement. ', 'fa-solid fa-wifi'),
(2, 'Petit déjeuners','Petit-déjeuner inclus dans l\'offre','fa-solid fa-mug-saucer'),
(3, 'Serviettes','Serviettes fournis dans le logement', 'fa-solid fa-bath'),
(4, 'Piscine','Installation aménagée pour la baignade', 'fa-solid fa-water-ladder'),
(5, 'Spa','Massage et soin du corp disponible', 'fa-solid fa-spa'),
(6, 'Climatisation','Climatiseur disponible dans le logement', 'fa-solid fa-temperature-arrow-down'),
(7, 'Parking','Un parking gratuit et privé est disponible sur place (sans réservation préalable). ', 'fa-solid fa-square-parking');

INSERT INTO categories (id_category, name_category,description_category,img_category,icon_category) VALUES
(1, 'Troglodytes','Découvrez le charme d\’un hébergement au cœur d’un monde souterrain.','uploads/hobbit1.jpg','fa-solid fa-dungeon'),
(2, 'Bulles',' Une nouvelle forme de vie sauvage avec le confort moderne.','uploads/b1.jpg','fa-solid fa-igloo'),
(3, 'Cabanes',' Dans les forêts, au beau milieu des montagnes ou au-dessus d’un lac.','uploads/c1.jpg','fa-solid fa-house-flood-water'),
(4, 'Roulottes',' Elle ouvrira votre imagination et vous fera voyager aux quatre coins du monde.','uploads/r1.jpg','fa-solid fa-caravan'),
(5, 'Bateaux','  Laissez-vous aller, tranquillement, au fil de l’eau.','uploads/boat1.jpg','fa-solid fa-sailboat');

INSERT INTO beddings(id_bedding, name_bedding) values 
(1, 'Lit simple'),
(2, 'Lit  double'),
(3, 'Cannapé lit'),
(4, 'Lit superposé');

INSERT INTO rooms (id_room, id_category,id_animal, description_room, price_room, img_room, img2_room, img3_room, slug, name_room, id_bedding, persons,address_room,zip_room,city_room, date_open, date_close, hour_checkin, hour_checkout, area_room) values

(1, 1, 1, 'La maison du couple \"Tirquiet\" est une petite maison sous terre de 28m2, le deuxième habitat du futur village des Semi Hommes.\nCaché dans les fourrées, proche du lac et à l\'orée du bois, ce refuge ne peut être découvert que si l\'on sait où il se situe.\nCette maison, petite par sa taille est grande de confort, se distingue par son atmosphère unique.. chaleureuse et magique.\nElle dispose d\'un espace salon avec une grande ouverture en demi cercle, de nombreuses bougies, de nombreux livres et tout ce qu\'il est entendu de trouver pour vivre une belle soirée de détente comme ces petits êtres savent le faire. Un joli lit en bois sculpté avec une malle en bout, puis une magnifique baignoire aux pieds d\'aigle et en fonte émaillée vous permettra de vous délasser jusqu\'au bout de la nuit. A la lueur des bougies et sous les hululements de nos nombreuses chouettes qui veillent à la tranquillité des lieux, la magie du fantastique vous attend.', 150, 'uploads/hobbit1.jpg', 'uploads/hobbit2.jpg', 'uploads/hobbit3.jpg', 'layenie-sous-les-etoiles', 'Layénie
sous les étoiles', 1, 4, 'Fouysset', '47480 ','Bajamont', '2022-05-01','2022-01-01', '09:30:00','17:30:00', '70'),

(2, 2, 1, 'A Allauch, dans les Bouches-du-Rhône on attrapes vos rêves et on les réalise ! Ils sont 5, comme les doigts d’une main, tous dans la famille, chacun avec sa spécialité, pour vous satisfaire. Depuis plus de dix ans, le domaine, une pinède de 15 000 m², offre une palette d’hébergements insolites tous aussi craquants les uns que les autres. Une « Aqua\'Room», reposante à souhait avec sa déco planante faite de poissons multicolores qui s’ébattent dans deux aquariums géants, une cabane tahitienne entourée de bambous où ne manque que le yukulele, un Lov\'nid, une cabane « écureuil » et des bulles transparentes ou semi-transparentes pour admirer en toute quiétude les nuits étoilées. Chacune a sa « personnalité », à choisir selon votre humeur. Toutes sont équipées confortablement. Vous croiserez peut-être Geoffrey ou Bruno sur le domaine. Ce dernier, professionnel de l’hôtellerie, vous concoctera vos petits déjeuners « maison ». Vous pouvez également commander des plateaux-repas à déguster sur la terrasse à côté de votre bulle ou dans un chalet « ad hoc ». Sur place, piscine (seulement à Allauch) et jacuzzi assorti de massages (sur réservation) sont à la disposition des hôtes.\r\nChaque hébergement dispose de son chemin d’accès propre, afin de préserver l’intimité des hôtes. Une parenthèse à vivre à deux (éventuellement accompagnés d’un enfant de plus de 6 ans). Le site est ouvert toute l’année. La presse et notamment la presse étrangère, ne tarit pas d’éloges sur ce lieu à part, loin du tourisme de masse aseptisé. A tester d’urgence ! ', 149, 'uploads/b1.jpg', 'uploads/b2.jpg', 'uploads/b3.jpg', 'attrap-reves', 'Attrap\'Rêves', 2, 2, 'Chemin de la ribassière', '13190','Allauch', '2022-05-01','2022-01-01', '09:30:00','17:30:00', '100'),

(3, 3, 2, 'Fondées en 2009 dans l’objectif de valoriser les richesses naturelles de la Franche-Comté et de son terroir, les cabanes Coucoo Grands Lacs se déploient sur 70 hectares de forêt et 80 hectares de lacs. Un domaine naturel exceptionnel et unique qui invite ses cabaneurs à vivre un séjour unique au cœur de la nature. Cet éco-domaine compte 25 cabanes, 13 dans les arbres, 2 sur pilotis et 10 sur l\’eau, qui maîtrisent à la perfection l\’art de se fondre dans le décor. Sans eau ni électricité mais certaines avec un bain nordique privatif sur leur terrasse, elles offrent un doux mélange entre vie sauvage et confort pour une déconnexion à 100% !', 205, 'uploads/w1.jpg', 'uploads/w2.jpg', 'uploads/w3.jpg', 'coucoo-grands-lacs', 'Coucoo Grands Lacs', 2, 2, 'Forge de Bonnal', '70230','Chassey-lès-Montbozon', '2022-05-01','2022-01-01', '09:30:00','17:30:00', '40'),

(4, 4, 2, 'Venez découvrir cette authentique roulotte en bois pouvant accueillir 2 à 4 personnes, accessible personne à mobilité réduite.
La roulotte dispose d\'une salle de bains équipée de toilettes sèches, d\'un espace kitchenette, d\'un lit double en 160 et d\'une banquette transformable en 2 petits lits.
Vous profiterez également d\'une terrasse, dans le jardin, équipée d\'une table, de chaises, de transats et d\'un barbecue. Vous pourrez admirer la vue sur les montagnes et le parc des chevaux !
Pour votre confort, vous aurez accès au lave-linge et un sèche-linge, au jardin et aux jeux d\'extérieur.
Durant tout votre séjour, vous pourrez profiter du bassin naturel pour des moments de repos ou de baignade. Au départ de l\'établissement, vous pourrez également découvrir des chemins de randonnées, accessibles à tous sur plusieurs kilomètres. Pour les plus petits, des ateliers "découverte du poney à la ferme" ont également lieu sur place.
Tout est réuni pour un agréable séjour en roulotte !', 105, 'uploads/r1.jpg', 'uploads/r2.jpg', 'uploads/r3.jpg', 'la-roulotte-des-lutins', 'La Roulotte des Lutins', 2, 4, 'La Balme De Thuy', '74230','Haute-Savoie', '2022-05-01','2022-01-01', '09:30:00','17:30:00', '32'),

(5, 1, 2, 'Escapade nature et bien-être à deux ou en famille !
Un séjour à deux ou familial qui vous immergera réellement dans la nature !
Vous dormirez dans une maison sous terre, fabriquée avec des matériaux naturels.
Levez les yeux, et découvrez un joli toit couvert de thym et d\'herbes de garrigue... 
Pour la partie confort, rendez-vous sur la terrasse, dans le spa privatif avec vue sur les Pyrénées ! ', 288, 'uploads/r4.jpg', 'uploads/r5.jpg', 'uploads/r6.jpg', 'cabanes-tresors-de-campagne', 'Cabanes Trésors de Campagne', 2, 4, ' Villarzel Du Razès ', '11300 ','Aude', '2022-05-01','2022-01-01', '09:30:00','11:00:00', '45'),

(6, 1, 2, 'Vous rêvez de dépaysement, de nature et de bien-être ? La Cabane-Spa Hobbit est faite pour vous ! 
Tout droit venus de l’univers fantastique de Tolkien, les  éléments architecturaux et la décoration soignée raviront les inconditionnels de Bilbo, Frodon ou Gandalf tout comme les amateurs de belles constructions originales. 
Vous découvrirez chaque pièce de cette belle cabane toute en rondeur : sa pièce principale avec une baie vitrée ronde , la chambre avec son puits de lumière qui vous permettra de vous endormir la tête dans les étoiles , sa salle de bains très originale, son jacuzzi, son jardin privé donnant sur une vue complètement naturelle.', 200, 'uploads/h4.jpg', 'uploads/h5.jpg', 'uploads/h6.jpg', 'les-insolites-du-perigord', 'Les Insolites du Périgord', 2, 5, 'Salignac-Eyvigues', '24590','Dordogne', '2022-01-01','2022-01-12', '16:00:00','11:30:00', '48');
 
INSERT INTO avoir(id_room,id_accomodation) values
(1, 1),
(1, 2),
(1, 3),
(1, 6),
(1, 7),
(2, 1),
(2, 6),
(3, 1),
(3, 2),
(3, 3),
(3, 6),
(4, 1),
(4, 2),
(4, 3),
(4, 6),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7);

INSERT INTO users (id_user, url_user, name_user, firstname_user, email_user, phone_user, password_user,birthday_user, date_user, rank_user) VALUES
(1, '1TfOsxX4EoSahcxtrUdmSLm88hEA8vEnWA6NNyQ9gVwatL2sTQve4fH4', 'Leo', 'Johan', 'cynocephales@gmail.com', '0627890254', '7c4a8d09ca3762af61e59520943dc26494f8941b','1992-09-29','2022-07-27 14:34:42', 'admin');

INSERT INTO sliders (id_slider, title, message, link, img) VALUES
(1, 'Singular', ' Vivez l\'expérience d\'une nuit insolite ', 'http://localhost/Singular/public/rooms' , 'assets/img/sliders/Jw2cnexmBYR7QOreh1lyFMgrendj1R.jpg'),
(2,'Un endroit unique','Un endroit parfait pour vous','http://localhost/Singular/public/rooms ','assets/img/sliders/f5ngP8VocQ308RoSwzOysh5tQTjL8N.jpg' );

INSERT INTO socials (id_social, name, value) VALUES
(1, 'Téléphone','0627890254' ),
(2, 'Email','contact.singular.jv@gmail.com'),
(3, 'Facebook','https://www.instagram.com/singular.jv'),
(4, 'Instagram','https://www.facebook.com/singular.jv'),
(5, 'Github','https://www.github.com/johan-valero'),
(6, 'Adresse','11 avenue de l\'Europe, 31520 Ramonville-Saint-Agne '),
(7, 'Vidéo Youtube','https://youtu.be/gbbLm5qgWU8');

INSERT INTO partners (id_partner, name_partner, link_partner, img_partner) VALUES
(1, 'Todolist', 'https://todolist.com', 'assets/img/partners/todo.png') 