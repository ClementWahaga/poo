<?php
// call files --------------------------------------------------------------------
require 'poo.php';
require 'compteur.php';
require 'db.php';
$dbh = pdo_connect_mysql();
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
echo ' aragorne a frapper legolas avec '.$aragorne-> force().' de force <br>';
$legolas-> frapper($aragorne);
$legolas-> gagnerExp();
echo ' legolas a frapper legolas avec '.$legolas-> force().' de force <br>';

echo ' legolas crie '.$legolas->parler().'je suis le meilleur <br>';

$compta=new compteur();

$req= $dbh->query('SELECT * FROM personnages');
while ($perso = $req ->fetch(PDO::FETCH_ASSOC)){
    echo $perso['nom'].' a '
    .$perso['forcePerso'].' de force <br>'
    .$perso['degats'].' de degats <br>'
    .$perso['level'].' de niveau <br>'
    .$perso['xp'].' experience';

}
?>

<!--check data--------------------------------------------------------------->
<pre>
<?php print_r($aragorne) ?>
<?php print_r($legolas) ?>
<?php print_r($compta) ?>
</pre>


