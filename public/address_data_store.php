<?php

require_once('filestore.php');

class AddressDataStore extends Filestore {

   public function __construct($filename=''){
        $filename= strtolower($filename);
        parent::__construct($filename);
    }
    public function read_address_book(){
        return $this->read();
    }

    public function write_address_book($array) {
        return $this->write($array);
    }
    //set character limit to 125 for input
    public function char_limit($array) {
        foreach($array as $key=>$value){
            if(strlen($value) > 125){
                throw new Exception("Content exceeds 125 characters");
            }
        }
    }
} 
?>