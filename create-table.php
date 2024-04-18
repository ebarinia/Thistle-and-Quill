<?php
$query_users = "
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` char(50) NOT NULL UNIQUE,
  `name` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);";

$query_books = "
CREATE TABLE IF NOT EXISTS `books` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `author` char(50) NOT NULL,
  `publisher` char(50) NOT NULL,
  `price` float NOT NULL,
  `synopsis` text NOT NULL,
  `image` char(255) NOT NULL,
  PRIMARY KEY (`id`)
);";

mysqli_query($connect, $query_users);

mysqli_query($connect, $query_books);

$result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM `books`");
$data = mysqli_fetch_assoc($result);

if ($data['total'] == 0) {
    $seed_books = "
    INSERT INTO `books` (`id`, `name`, `author`, `publisher`, `price`, `synopsis`, `image`) VALUES
    (1, 'Nothing Left To Fear From Hell', 'Alan Warner', 'Polygon', 12.99, 'A battle lost. A daring escape. A long walk into obscurity. The ultimate failure…\n\nIn the aftermath of the disastrous Battle of Culloden, a lonely figure takes flight with a small band of companions through the islands and mountains of the Hebrides. His name is Charles Edward Stuart: better known today as Bonnie Prince Charlie. He had come to the country to take the throne. Now he is leaving in exile and abject defeat.\n\nIn prose that is by turns poetic, comic, macabre, haunting and humane, multi- award-winning author Alan Warner traces the frantic last journey through Scotland of a man who history will come to define for his failure.', 'https://m.media-amazon.com/images/I/71Pm3iIvmbL._SL1500_.jpg'),
    (2, 'River Spirit', 'Leila Aboulela', 'Saqi Books', 14.5, '1880s Sudan. When Akuany and her brother are orphaned in a village raid, they are taken in by Yaseen, a young merchant whose vow to care for them will tether him to Akuany throughout their lives. As revolution brews, Sudan begins to prise itself from its Ottoman rulers, and everyone must choose sides.\n\n\n\nYaseen feels beholden to stand against the self-proclaimed Mahdi, a decision that threatens to splinter his family. Meanwhile, Akuany grows into womanhood and travels alone across the fractured country, sold and traded from house to house, with only Yaseen as her intermittent lifeline. Their struggle will mirror the increasingly bloody struggle for Sudan itself: for freedom, safety and the possibility of love.\n\n\n\nRiver Spirit is a powerful tale of corruption and unshakeable devotion – to a cause, to one’s faith and to the people who become family.', 'https://m.media-amazon.com/images/I/61KNm9AF-dL.jpg'),
    (3, 'Our Hideous Progeny', 'C.E McGill', 'Penguin', 14.39, 'Mary is the great-niece of Victor Frankenstein. She knows her great uncle disappeared in mysterious circumstances in the Arctic but she doesn\'t know why or how...  The 1850s is a time of discovery and London is ablaze with the latest scientific theories and debates, especially when a spectacular new exhibition of dinosaur sculptures opens at the Crystal Palace. Mary, with a sharp mind and a sharper tongue, is keen to make her name in this world of science, alongside her geologist husband Henry, but without wealth and connections, their options are limited.  But when Mary discovers some old family papers that allude to the shocking truth behind her great-uncle\'s past, she thinks she may have found the key to securing their future... Their quest takes them to the wilds of Scotland, to Henry\'s intriguing but reclusive sister Maisie, and to a deadly chase with a rival who is out to steal their secret...', 'https://m.media-amazon.com/images/I/81VuJmz5zHL._SL1500_.jpg'),
    (4, 'Because I Don\'t Know What You Mean And What You Don\'t', 'Josie Long', 'Canongate Books', 9.19, 'Three teenagers believe they are witches.\r\nA woman defaces a local billboard.\r\nA bored landlord tries to influence his son\'s best friend.\r\nA cul-de-sac WhatsApp group discusses eggs at length.\r\nA heavily pregnant woman finds a way to time travel and a girl discovers joy on a stolen bicycle . . .\r\n\r\nEach tale paints a life in miniature and offers an escape chute from the mayhem of modern life.', 'https://m.media-amazon.com/images/I/71nLQSMcf2L._SL1500_.jpg'),
    (5, 'The Wolf Den: the stunning first novel reimagining the lives of the women of Pompeii', 'Elodie Harper', 'Apollo', 8.27, 'Sold by her mother. Enslaved in Pompeii\'s brothel. Determined to survive. Herel. Determined to survive. Her name is Amara. Welcome to the Wolf Den...\r\n\r\nAmara was once a beloved daughter, until her father\'s death plunged her family into penury. Now, she is owned by a man she despises and lives as a slave in Pompeii\'s infamous brothel, her only value the desire she can stir in others.\r\n\r\nBut Amara\'s spirit is far from broken. Sharp, resourceful and surrounded by women whose humour and dreams she shares, Amara comes to realise that everything in this city has its price. But how much will her freedom cost?', 'https://m.media-amazon.com/images/I/71TpVLv4R5L._SL1500_.jpg'),
    (8, 'Thirsty Animals', 'Rachelle Atalla', 'Hodder Paperbacks', 9.19, 'Suspense', 'https://m.media-amazon.com/images/I/81WXBukE+UL._SL1500_.jpg'),
    (9, 'The Grief Nurse', 'Angie Spoto', 'Sandstone Press Ltd', 7, 'Imagine you could be rid of your sadness, your anxiety, your heartache, your fear.\r\n\r\nImagine you could take those feelings from others and turn them into something beautiful.\r\n\r\nLynx is a Grief Nurse. Kept by the Asters, a wealthy, influential family, to ensure they\'re never troubled by negative emotions, she knows no other life.\r\n\r\nWhen news arrives that the Asters\' eldest son is dead, Lynx does what she can to alleviate their Sorrow. As guests flock to the Asters\' private island for the wake, bringing their own secrets, lies and grief, tensions rise.\r\n\r\nThen the bodies start to pile up.\r\n\r\nWith romance, intrigue and spectacular gothic world-building, this spellbinding debut novel is immersive and unforgettable', 'https://m.media-amazon.com/images/I/81j1m9nz-5L._SL1500_.jpg'),
    (10, 'Keep Moving And No Questions', 'James Kelman', 'PM Press', 12.99, 'James Kelman\'s inimitable voice brings the stories of lost men to light in these twenty one tales of down on their luck antiheroes who wander, drink, hatch plans, ponder existence, and survive in an unwelcoming and often comic world. Keep Moving and No Questions is a collection of the finest examples of Kelman\'s facility with dialog, stream of conscious narrative, and sharp cultural observation. Class is always central in these brief glimpses of men abiding the hands they\'ve been dealt. An ideal introduction to Kelman\'s work and a wonderful edition for fans and Kelman completionists, this lovely vollume will make clear why James Kelman is known as the greatest living modernist writer.', 'https://m.media-amazon.com/images/I/61z2cPSqm3L._SL1500_.jpg'),
    (11, 'All the Hidden Truths: one shocking crime: three women need answers', 'Claire Askew', 'Hodder Paperbacks', 9.19, 'In the aftermath of a tragedy, the world needs an explanation.\r\n\r\nIn Edinburgh, after the Three Rivers College shooting, some things are clear.\r\n\r\nThey know who. They know when.\r\n\r\nNo one can say why.\r\n\r\nFor three women the lack of answers is unbearable: DI Helen Birch, the detective charged with solving the case. Ishbel, the mother of the first victim, struggling to cope with her grief. And Moira, mother of the killer, who needs to understand what happened to her son.\r\n\r\nBut as people search for someone to blame, the truth seems to vanish...', 'https://m.media-amazon.com/images/I/81g8qpopXQL._SL1500_.jpg'),
    (12, 'What You Pay For', 'Claire Askew', 'Hodder Paperbacks', 8.27, 'DI Birch joined the police to find her little brother, who walked out of his life one day and was never seen again. She stayed to help others, determined to seek justice where she could.\r\n\r\nOn the fourteenth anniversary of Charlie\'s disappearance, Birch takes part in a raid on one of Scotland\'s most feared criminal organisations. It\'s a good day\'s work - a chance to get a dangerous man off the streets.\r\n\r\nTwo days later, Charlie comes back. It\'s not a coincidence. When Birch finds out exactly what he\'ch finds out exactly what he\'s been doing all those years, she faces a terrible choice: save the case, or save her brother. But how can you do the right thing when all the consequences are bad?\r\n\r\nAs she interrogates Charlie, he tells his story: of how one wrong turn leads to a world in which the normal rules no longer apply, and you do what you must to survive.\r\n\r\nFrom one of the most acclaimed new voices in crime fiction, What You Pay For is a brilliantly tense and moving novel about the terrible disruption caused by violence and the lines people will cross to protect those they love..', 'https://m.media-amazon.com/images/I/8125YmBllxL._SL1500_.jpg');
      ";
  
      mysqli_query($connect, $seed_books);
  }
?>
