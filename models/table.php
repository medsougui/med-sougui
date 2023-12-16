<?php

class table {
private $num,$mode;
function __construct($num="",$mode="") {
	
    $this->num=$num;
    $this->mode=$mode;
    
}

public function getnum(){
	return $this->num;
}

public function getmode(){
	return $this->mode;
}

public function setmode($mode){
        $this->mode = $mode;
    }

public function setnum($num){
        $this->num = $num;
    }
}?>