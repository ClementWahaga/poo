<?php
// call files --------------------------------------------------------------------
require 'poo.php';
require 'compteur.php';

// instanciation----------------------------------------------------------

$aragorne = new personnage(personnage::FORCE_MOYENNE,2);
$legolas = new personnage(personnage::FORCE_GRANDE,0);

//$aragorne-> setForce(10);
//$aragorne->setExp(2);
//$legolas -> setForce(20);
//$legolas->setExp(2);

echo '<strong>Avant le combat :</strong><br>';
echo ' aragorne a ' . $aragorne->exp() . ' d\'expérience<br>';
echo ' legolas  a ' . $legolas->exp() . ' d\'expérience<br>';
echo ' aragorne a ' . $aragorne->force() . ' de force et legolas a ' . $legolas->force() . ' de force.<br>';

                    
$aragorne-> frapper($legolas);
$aragorne-> gagnerExp();
$legolas-> frapper($aragorne);
$legolas-> gagnerExp();
$legolas->parler();

$compta=new compteur();

?>

<!--check data--------------------------------------------------------------->
<pre>
<?php print_r($aragorne) ?>
<?php print_r($legolas) ?>
<?php print_r($compta) ?>
</pre>


