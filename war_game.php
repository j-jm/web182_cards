<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game of War</title>

<style type="text/css">
	body {background-color: green; color: #ccc}
	.image {width:50px;height:75px; margin: 5px;
	box-shadow: 3px 3px 5px black}
</style>
</head>

<body>

<h1>Game of War</h1>
<h3>(The first player to have no card left looses).</h3>

<?php

// game of war

$break = '<br>'.'<hr>';
$deck = array 
			(
			'd01.png','d09.png','d10.png','d11.png','d12.png','d13.png','d02.png','d03.png',
			'd04.png','d05.png','d06.png','d07.png','d08.png',
			's01.png','s09.png','s10.png','s11.png','s12.png','s13.png','s02.png','s03.png',
			's04.png','s05.png','s06.png','s07.png','s08.png',
			);
$i = 0;
$score = array(0,0);
$stack = array();

shuffle($deck);							// split deck between players
$player1 = array_slice($deck, 0, count($deck)/2);
$player2 = array_slice($deck, count($deck)/2, count($deck)/2);

		// split between 2 players

		echo 'Player 1:'.'<br>';
		foreach($player1 as $card)
		{
			echo "<img class='image' src='$card'>";
		}
		echo '<br>';
		echo 'Player 2:'.'<br>';	
		foreach($player2 as $card)
		{
			echo "<img class='image' src='$card'>";
		}
		echo $break;


	// do until one player has no card left
	while(count($player1) > 0 and count($player2) > 0 and $i < 100) 
	{

		$card1 = array_shift($player1);				// pull one card from each player
		$value1 = intval(substr($card1, 1));
		$card2 = array_shift($player2);
		$value2 = intval(substr($card2, 1));
		if($value1 == 1){$value1 = 14;}				// change value of aces to highest	
		if($value2 == 1){$value2 = 14;}

		if($value1 == $value2)						// if pair - save cards on stack
			{
				echo '------War: each player puts down 2 extra cards or looses------'.'<br>';
				if (count($player1) > 1 and count($player2) > 1)
				{
				$stack[] = array_shift($player1);
				$stack[] = array_shift($player2);			
				}

				echo $break;				
			}

		if($value1 > $value2)						// player 1 wins
			{ 				
				array_push($player1, $card1);array_push($player1, $card2);
				while (count($stack) > 0 )
					{
						array_push($player1, array_shift($stack)); // add extra cards from tie
					}
			}
								
		else 
			{
				array_push($player2, $card1);array_push($player2, $card2);
				while (count($stack) > 0 )
				{
					array_push($player2, array_shift($stack));
				}
			}
				
				echo '<h3>Battle '.($i + 1).'</h3>';echo'<br>';		// show details of each battle				
					
				echo 'Player 1:'.'<br>';
					foreach($player1 as $card)
						{
							echo "<img class='image' src='$card'>";	
						}
						echo'<br>';

				echo 'Player 2:'.'<br>';
					foreach($player2 as $card)
						{
							echo "<img class='image' src='$card'>";	
						}
						echo'<br>';
				echo $break;
				$i ++;			
	}
	if ($i+1 >= 100)
		{
			echo 'End of game (this game was ended prematuraly for us to have a snack...)';
		}
		else
		{
			echo 'End of game.';
		}
echo $break;
?>

</body>
</html>