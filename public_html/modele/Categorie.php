<?php
class Categorie {
    private $id;
    private $nameCateg;
    
    function __construct($id, $nameCateg){
        $this->id = $id;
        $this->nameCateg = $nameCateg;
    }
    
    function getId(){
        return $this->id;
    }
    
    function getNameCateg(){
        return $this->nameCateg;
    }
}