<?php
require('customexception.php');
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
    public function validation($array) {
        foreach($array as $key=>$value){
                if (empty($value)){
                    throw new InvalidInputException("$key required field is empty");
                }elseif(strlen($value) > 125){
                    throw new InvalidInputException("$key exceeds 125 characters");
                }
        }
    }
} 
?>