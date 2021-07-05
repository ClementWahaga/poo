<?php
class PersonnagesTableManager {
    /*
     * Attributs
     */
    private $_db;
    
    public function __construct($db) {
        $this->setDb($db);
    }
    /*
     * Méthode de construction
     */
    
    
    public function setDb(PDO $db) {
        $this->_db = $db;
    }
    /*
     * Methodes CRUD
     */
     
    /*  Methode d'insertion d'un personnage dans la BDD
     *  Pour éviter le message d'erreur Strict Standards: Only variables should be passed by reference
     *  il faut utiliser bindValue et non bind Param
     */
    public function addPersonnage(personnages $perso) {
        $req = $this->_bdd->prepare('INSERT INTO personnages
                                             SET nom        = :nom,
                                                 forcePerso = :forcePerso,
                                                 degats     = :degats,
                                                 level     = :level,
                                                 xp = :xp
                                    ');
        
        $req->bindValue(':nom',         $perso->_Nom(),           PDO::PARAM_STR);
        $req->bindValue(':forcePerso',  $perso->_ForcePerso(),    PDO::PARAM_INT);
        $req->bindValue(':degats',      $perso->_Degats(),        PDO::PARAM_INT);
        $req->bindValue(':level',       $perso->_level(),        PDO::PARAM_INT);
        $req->bindValue(':xp',          $perso->_xp(),    PDO::PARAM_INT);
        
        $req->execute();
        
        $req->closeCursor();
    }


    public function deletePersonnage(Personnages $perso) {
        $this->_bdd->exec('DELETE FROM Personnages WHERE id = ' . $perso->getId());
    }
    
    //Methode de selection d'un personnage avec clause WHERE
    public function getPersonnage($id) {
        $id = (int) $id;
        
        $req = $this->_bdd->query('SELECT id, nom, forcePerso, degats, level, xp 
                                    FROM Personnages
                                   WHERE id = '. $id);
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($datas);
        return new Personnages($datas);
        
        $req->closeCursor();
    }   
    
    // Methode de selection de toute la liste des personnages
    public function getListPersonnages() {
        $persos = [];
        
        $req = $this->_bdd->query('SELECT id, nom, forcePerso, degats, level, xp 
                                    FROM Personnages
                                   ORDER BY nom');
        
        while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {
            $persos[] = new Personnages($datas);
        }
        //var_dump($persos);
        return $persos;
        
        $req->closeCursor();
    }
    
    // Methode de mise à jour d'un personnage dans la BDD
    public function updatePersonnage(Personnages $perso) {
        $req = $this->_bdd->prepare('UPDATE Personnages
                                        SET forcePerso = :forcePerso,
                                            degats     = :degats,
                                            level     = :level,
                                            xp = :xp
                                      WHERE id         = :id
                                    ');
        
        $req->bindValue(':forcePerso',  $perso->_ForcePerso(),    PDO::PARAM_INT);
        $req->bindValue(':degats',      $perso->_Degats(),        PDO::PARAM_INT);
        $req->bindValue(':level',       $perso->_level(),         PDO::PARAM_INT);
        $req->bindValue(':xp',          $perso->_xp(),            PDO::PARAM_INT);
        $req->bindValue(':id',          $perso->_Id(),            PDO::PARAM_INT);
        
        $req->execute();
        
        $req->closeCursor();
    }




}

