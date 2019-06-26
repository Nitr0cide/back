<?php

/*
 * Test du template liste hotels
 */


include "lib/init.php";

$hotel1 = new hotel();
$hotel1->loadById(1);
$hotel2 = new hotel();
$hotel2->loadById(3);
$hotel3 = new hotel();
$hotel3->loadById(4);

$hotels = [ $hotel1, $hotel2, $hotel3 ];

include "templates/pages/liste_hotels.php";
