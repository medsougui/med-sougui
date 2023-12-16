<?php

class ingredient {
private $code,$name,$qte,$location;
function __construct($code="",$name="",$qte="",$location="") {
	
    $this->code=$code;
    $this->name=$name;
    $this->qte=$qte;
    $this->location=$location;
}

public function getcode(){
	return $this->code;
}

public function getname(){
	return $this->name;
}

public function getqte(){
	return $this->qte;
}

public function getlocation(){
	return $this->location;
}


public function setFirstName($name){
        $this->name = $name;
    }

public function setCode($code){
        $this->code = $code;
    }

public function setqte($qte){
        $this->qte = $qte;
    }

 public function setlocation($location){
        $this->location = $location	;
    }
	
}?>