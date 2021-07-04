<?php
require 'poo.php';

$aragorne = new personnage(50,2);
$legolas = new personnage(20,0);

//$aragorne-> setForce(10);
//$aragorne->setExp(2);


//$legolas -> setForce(20);
//$legolas->setExp(2);

echo '<strong>Avant le combat :</strong><br>';
echo ' aragorne a ' . $aragorne->exp() . ' d\'expérience<br>';
echo ' legolas  a ' . $legolas->exp() . ' d\'expérience<br>';
echo ' aragorne a ' . $aragorne->force() . ' de force et le legolas 2 a ' . $legolas->force() . ' de force.<br>';

                    
$aragorne-> frapper($legolas);
$aragorne-> gagnerExperience();
$legolas-> frapper($aragorne);
$legolas-> gagnerExperience();


?>
<pre>
<?php print_r($aragorne) ?>
<?php print_r($legolas) ?>
</pre>


