<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cards Project</title>

<style type="text/css">
	body {background-color: green; color: #ccc}
	h2 {color: red}
	.image {width:50px;height:75px; margin: 5px;
	box-shadow: 3px 3px 5px black}
</style>
</head>

<body>

<h1>Card Project</h1>

<?php


// cards
$break = '<br>'.'<hr>';
$deck = array 
(
'c01.png','c02.png','c03.png','c04.png','c05.png','c06.png','c07.png','c08.png','c09.png','c10.png','c11.png','c12.png','c13.png','d01.png','d02.png','d03.png','d04.png','d05.png','d06.png','d07.png','d08.png','d09.png','d10.png','d11.png','d12.png','d13.png','h01.png','h02.png','h03.png','h04.png','h05.png','h06.png','h07.png','h08.png','h09.png','h10.png','h11.png',
'h12.png','h13.png','s01.png','s02.png','s03.png','s04.png','s05.png','s06.png','s07.png','s08.png','s09.png','s10.png','s11.png','s12.png','s13.png');
# print_r($deck);	


// show the deck
echo 'The deck:'.'<br>';
foreach($deck as $card)
{
	echo "<img class='image' src='$card'>";
}
# echo '<br>';print_r($deck);
echo $break;


// sort the deck
ksort($deck);
echo 'The deck sorted by key:'.'<br>';
foreach($deck as $card)
{
	echo "<img class='image' src='$card'>";
}
# echo '<br>';print_r($deck);
echo $break;


// display only the spades
echo 'Sort the spades cards:'.'<br>';
foreach($deck as $card)
{
	if (strpos($card, 's') !== false)
	{
		echo "<img class='image' src='$card'>";	
	}
}
echo $break;

// shuffle the deck
echo 'Shuffled deck:'.'<br>';
shuffle($deck);

foreach($deck as $card)
{
	echo "<img class='image' src='$card'>";
}
echo $break;

// deal 5 cards randomly
echo 'Random hand:'.'<br>';
shuffle($deck);
$hand = array_slice($deck, 0,5);
foreach($hand as $card)
{
	echo "<img class='image' src='$card'>";
}
echo $break;

// display odd numbered images
echo 'Odd numbered cards:'.'<br>';
shuffle($deck);

foreach($deck as $card)
	{
	$value = intval(substr($card, 1));
		if($value % 2 != false)
		{
		echo "<img class='image' src='$card'>";		
		}	
	}

echo $break;


// display a random quad (poker)
echo 'A random quad (poker):'.'<br>';

$quad[0] = $deck[array_rand($deck)]; #pick a random card
$card1 = $quad[0];
$deck = array_diff($deck, $quad); #remove it from the deck

$i = 1;
foreach($deck as $card) #fill in the next 3 cards
{
	if (intval(substr($card, 1)) == intval(substr($card1, 1)))	
	{
	$quad[$i] = $card;
	$deck = array_diff($deck, $quad);	
	$i++;
	}
}
$quad[4] = $deck[array_rand($deck)]; #add the last card


shuffle($quad); # shuffle and display the complete hand
foreach($quad as $card) 
	{
	echo "<img class='image' src='$card'>";
	}

echo $break;

?>

</body>
</html>