<?php
$break = '<br>'.'<hr>'.'<br>';
//$trees = array("Maple", "Oak", "Dogwood", "Birch", "Cedar", "Walnut", "Pecan");

$trees[0] = "Maple";
$trees[1] = "Oak";
$trees[2] = "Dogwood";
$trees[3] = "Birch";
$trees[4] = "Cedar";
$trees[5] = "Walnut";
$trees[6] = "Poplar";

$states = array(	"NC"=>"North Carolina",
					"SC"=>"South Carolina",
					"GA"=> "Georgia"
				);

foreach ($states as $key => $value) {
	echo "The state code $key is for the state $value</p>";	
}

echo $trees[5];


echo "<ul>";
for($i = 0; $i < sizeof($trees); $i++) {
	echo("<li>$trees[$i]</li>");
}
echo "</ul>";


print "<p></p>";
echo "<ul>";

foreach ($trees as $key => $value) {
	if($key == 0 || $key <=2) {
		echo("<li>$value</li>");
	}
}

echo "</ul>";

# cards project practice
echo $break;


?>