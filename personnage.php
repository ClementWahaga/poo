<?php
class personnage  {

    private $_id;
    private $_nom ;
    private $_forcePerso;
    private $_degats;
    private $_xp ;
    private $_level ;
 
    //mutateur------------------------------------------->
    public function setId($id) {
        if (!is_int($id)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('id du personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        if ($id > 00)
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
        if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])) {
            $this->_force = $force;
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

        $this->_xp = $exp;
    }

    public function setDegats($degats) {
        if (!is_int($degats)) { // S'il ne s'agit pas d'un nombre entier.
            trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }

        $this->_degats = $degats;
    }
















}    
    


