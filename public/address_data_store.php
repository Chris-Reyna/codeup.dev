<?php

require_once('filestore.php');

class AddressDataStore extends Filestore {

    function read_address_book(){
        return $this-> read_csv();
    }
    
    function write_address_book($array) {
        return $this-> write_csv($array);
    }
}
?>