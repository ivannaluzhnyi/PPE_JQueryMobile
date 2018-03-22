<?php 

class Visiteur {
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $login;
    private $password;
    
    function __construct($id,$nom,$prenom,$adresse,$login,$password){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->login = $login;
        $this->password = $password;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function getLogin(){
        return $this->login;
    }
    
    public function getPassword(){
        return $this->password;
    }
}