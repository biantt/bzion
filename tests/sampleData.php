<?php

include("../bzion-load.php");

$header = new Header("Home");
$header->draw();

$page = Page::getHomePage();

if (!DEVELOPMENT) {
    echo "Populating the database with sample data isn't allowed in Production mode.";
    $footer = new Footer();
    $footer->draw();
    die();
}

$testPlayer = Player::getFromBZID(55976);
if ($testPlayer->isValid()) {
    echo "Please clean your current data in the database, or you might end up with unwanted results.";
    $footer = new Footer();
    $footer->draw();
    die();
}


$db = Database::getInstance();

$alezakos   = Player::newPlayer(49434, "alezakos", 0, "active", 0, "", "Sample description");
$allejo     = Player::newPlayer(31098, "allejo");
$ashvala    = Player::newPlayer(34353, "ashvala");
$autoreport = Player::newPlayer(55976, "AutoReport");
$blast      = Player::newPlayer(180, "blast");
$kierra     = Player::newPlayer(2229, "kierra");
$mdskpr     = Player::newPlayer(8312, "mdskpr");
$snake      = Player::newPlayer(54497, "Snake12534");
$tw1sted    = Player::newPlayer(9736, "tw1sted");

$olfm     = Team::createTeam("OpenLeague FM?", $kierra->getId(), "", "");
$reptiles = Team::createTeam("Reptitles", $snake->getId(), "", "");
$fflood   = Team::createTeam("Formal Flood", $allejo->getId(), "", "");
$lweak    = Team::createTeam("[LakeWeakness]", $mdskpr->getId(), "", "");
$gsepar   = Team::createTeam("Good Separation", $tw1sted->getId(), "", "");
$fradis   = Team::createTeam("Fractious disinclination", $ashvala->getId(), "", "");

Match::enterMatch($reptiles->getId(), $gsepar->getId(), 1, 9000, 17, $kierra->getId());
Match::enterMatch($olfm->getId(), $lweak->getId(), 0, 0, 20, $blast->getId());

$lweak->addMember($autoreport->getId());
$fflood->addMember($blast->getId());
$fradis->addMember($alezakos->getId());

$reptiles->update("activity", 9000, "i");
$fflood->update("activity", -18, "i");
$fradis->update("activity", 3.14159265358979323846, "d");

Server::addServer("BZPro Public HiX FFA", "bzpro.net:5154", $tw1sted->getId());
Server::addServer("BZPro Public HiX Rabbit Chase", "bzpro.net:5155", $tw1sted->getId());

$group_to = Group::createGroup("New blog", array(
	$alezakos->getId(),
    $allejo->getId(),
    $ashvala->getId(),
    $autoreport->getId(),
    $blast->getId(),
    $kierra->getId(),
    $mdskpr->getId(),
    $snake->getId(),
    $tw1sted->getId()
));
Message::sendMessage($group_to->getId(), $snake->getId(), "Check out my new blog!");

// We don't have any methods to create these objects yet, so just access the database directly for the time being
$db->query("INSERT INTO `bans` (`id`, `player`, `ip_address`, `expiration`, `reason`, `created`, `updated`, `author`)
    VALUES (NULL, '{$snake->getId()}', '256.512.1024.1', '16384-02-20', 'Snarke 12534 has been barned again, expiration in 14370 years', NOW(), NOW(), '{$alezakos->getId()}')");
$db->query("INSERT INTO `bans` (`id`, `player`, `ip_address`, `expiration`, `reason`, `created`, `updated`, `author`)
    VALUES (NULL, '{$snake->getId()}', '256.512.1024.1', '8192-02-20', 'Snarke 12534 has been barned.', NOW(), NOW(), '{$alezakos->getId()}')");
$db->query("INSERT INTO `bans` (`id`, `player`, `ip_address`, `expiration`, `reason`, `created`, `updated`, `author`)
    VALUES (NULL, '{$tw1sted->getId()}', '256.512.1024.2', '2014-02-20', 'tw1sted banned for being too awesome', NOW(), NOW(), '{$tw1sted->getId()}')");
$db->query("INSERT INTO `bans` (`id`, `player`, `ip_address`, `expiration`, `reason`, `created`, `updated`, `author`)
    VALUES (NULL, '{$alezakos->getId()}', '256.512.1024.3', '2014-02-20', 'alezakos banned for breaking the build', NOW(), NOW(), '{$allejo->getId()}')");

$db->query("INSERT INTO `pages` (`id`, `name`, `alias`, `content`, `created`, `updated`, `author`, `home`, `status`)
    VALUES (NULL, 'Home page', NULL, '<p>Welcome to BZiON. <b>This website is still under heavy construction.</b></p>', NOW(), NOW(), '{$kierra->getId()}', '1', 'live'); ");
$db->query("INSERT INTO `pages` (`id`, `name`, `alias`, `content`, `created`, `updated`, `author`, `home`, `status`)
    VALUES (NULL, 'Rules', 'rules', '<p>This is a test page.</p>\n<p>Lets hope this works!</p>', NOW(), NOW(), '{$tw1sted->getId()}', '0', 'live'); ");
$db->query("INSERT INTO `pages` (`id`, `name`, `alias`, `content`, `created`, `updated`, `author`, `home`, `status`)
    VALUES (NULL, 'Contact', 'contact', '<p>If you find anything wrong, please stop by irc.freenode.net channel #sujevo and let a developer know.<br /><br />Thanks', NOW(), NOW(), '{$tw1sted->getId()}', '0', 'live'); ");

$db->query("INSERT INTO `news` (`id`, `subject`, `content`, `created`, `updated`, `author`, `status`) VALUES
    (NULL, 'Announcement',
    'Very important Announcement', NOW(), NOW(), '{$mdskpr->getId()}', 'live')");
$db->query("INSERT INTO .`news` (`id`, `subject`, `content`, `created`, `updated`, `author`, `status`) VALUES
    (NULL, 'Cats think we are bigger cats',
    'In order for your indess recognizes where this whole mistake has come, and why one accuses the pleasure and praise the pain , and I will open to you all and set apart, what those founders of the truth and, as builders of the happy life himself has said about it. No one , he says, despise , or hate , or flee the desire as such , but because great pain to follow, if you do not pursue pleasure rationally . Similarly, the pain was loved as such by no one or pursues or desires , but because occasionally circumstances occur that one means of toil and pain can procure him some great pleasure to look verschaften be . To stay here are a trivial , so none of us would ever undertakes laborious physical exercise, except to obtain some advantage from it. But who is probably the blame , which requires an appetite , has no annoying consequences , or one who avoids a pain , which shows no desire ? In contrast, blames and you hate with the law , which can soften and seduced by the allurements of present pleasure , without seeing in his blind desire which pain and inconvenience wait his reason . Same debt meet Those who from mental weakness , ie to escape the work and the pain , neglect their duties. A person can easily and quickly make the real difference , to a quiet time where the choice of the decision is completely free and nothing prevents them from doing what we like best , you have to grasp every pleasure and every pain avoided , but to times it hits in succession of duties or guilty of factual necessity that you reject the desire and complaints must not reject . Why then the way will make a selection so that it Achieve a greater rejection by a desire for it or by taking over some pains to spare larger .'
    , NOW(), NOW(), '{$alezakos->getId()}', 'live')");


$footer = new Footer();
$footer->draw();

?>