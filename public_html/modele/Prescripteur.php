<?php
class Prescripteur{
	private $id;
	private $nom;
	private $tel;
        private $email;
	private $descrip;
        private $categ;
	
	function __construct($id,$nom,$tel,$email,$descrip,$categ){
		$this->id = $id;
		$this->nom = $nom;
		$this->tel = $tel;
                $this->email = $email;
		$this->descrip = $descrip;		
                $this->categ = $categ;

	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getNom(){
		return $this->nom;
	}
	
	public function getTel(){
		return $this->tel;
	}
        public function getEmail(){
               return $this->email;
	}
	
	public function getDescription(){
		return $this->descrip;
	}
        
        public function getCategPrescripteur(){
		return $this->$categ;
	}
        
        public function setName($name){
            $this->nom = $name;
        }
        
        public function setTel($tel){
            $this->tel = $tel;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        
        public function setDescrip($decrip){
            $this->descrip = $decrip;
        }
        

}
?>