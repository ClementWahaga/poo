<?php
class perso  {

    private $_id;
    private $_nom ;
    private $_forcePerso;
    private $_degats;
    private $_xp ;
    private $_level ;



    //construtor--------------------------------------->
    public function __construct($nom,$forcePerso,$xp,$degats/*array $data*/)
    {   
        $this->setNom($nom);
        $this->setForce($forcePerso);
        $this->setXp($xp);
        $this->setDegats($degats);
        $this->_level ++;
        /*$this->hydrate($data);*/
        
    }
 
    //setter------------------------------------------->


    
    public function setId($id) {
        if (!is_int($id)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('id du personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        if ($id >= 00)
        { //On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
            trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }

        $this->_id = $id;
    }


    public function setNom($nom) {
        if (!is_string($nom)) { // S'il ne s'agit pas d'une chaine de caractere.
            trigger_error('Le nom du personnage doit être chaine de caractere ', E_USER_WARNING);
            return;
        }

        $this->_nom = $nom;
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
       /* if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])) {
            $this->_force = $force;
        }*/    
        $this->_forcePerso = $force;
    }

    public function setXp($xp) {
        if (!is_int($xp)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }

        if ($xp > 100) { // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
            trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }

        $this->_xp = $xp;
    }

    public function setDegats($degats) {
        if (!is_int($degats)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }

        $this->_degats = $degats;
    }

    public function setlevel($level) {
        if (!is_int($level)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        if ($level >= 1) { // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
            trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }

        $this->_level = $level;
    }
    //getter----------------------------------------------------------------->
    public function id()
    {
        return $this -> _id ;
    }

    public function nom()
    {
        return $this -> _nom ;
    }

    public function forcePerso()
    {
        return $this -> _forcePerso ;
    }

    public function xp()
    {
        return $this -> _xp ;
    }

    public function degats()
    {
        return $this -> _degats ;
    }

    public function level()
    {
        return $this -> _level ;
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }    




    }

}    
    


