<?php
class personnage  {
   
    private $_force = 50;
    private $_exp = 1;
    private $_degats = 0;


    const FORCE_PETITE  = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE  = 80;
    
    public function __construct($initforce, $degats)
    {  $this->setForce($initforce);        // initalise la force 
        $this->setDegats($degats);          //initialise les degats
        $this->_experience = 1;             //initialise  les exp
    }

    public function parler()
    {
        echo "je suis un personnage";
    }


    public function frapper(personnage $persoAFrapper)
    {
       echo $persoAFrapper->_degats += $this->_force;
    }

    public function affExperience()
    {
        $this ->_exp = $this ->_exp +1;
        return  $this ->_exp +1 ;
    }

    public function gagnerExperience()
    {
        $this->_experience ++; // Incrémente l'expérience
    }
    
    public function degats()
    {
        return $this -> _degats  ;
        
    }

    public function force()
    {
        return $this -> _force ;
    }


    public function exp()
    {
        return $this -> _exp ;
    }

    public  function setForce($force) 
    {
        if (!is_int($force))
        { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
       
        if ($force > 100)
        { //On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
            trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }
                
        $this->_force = $force;
    }

    public function setExp($exp) {
        if (!is_int($exp)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }

        if ($exp > 100) { // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
            trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }

        $this->_exp = $exp;
    }

    public function setDegats($degats) {
        if (!is_int($degats)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }

        $this->_degats = $degats;
    }




}



