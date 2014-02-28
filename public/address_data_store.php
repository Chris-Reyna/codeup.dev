<?php

require_once('filestore.php');

class AddressDataStore extends Filestore {

   // public $filename = '';

    //function __construct($file = ''){
    // 	$this->filename = $file;

    // }

    function read_address_book(){
        return $this-> read_csv();
    }

    // $content=[];
    // $handle = fopen($this->filename, "r");
    // while(($data = fgetcsv($handle)) !== FALSE){
    // 	$content[] = $data;
    // }
    // fclose($handle);
    // return $content;
    

    function write_address_book($array) {
        return $this-> write_csv($array);
    }
  //     $handle = fopen($this->filename, 'w');
		// foreach ($addresses_array as $array) {
		// 	fputcsv($handle, $array);
		// }
		// fclose($handle);
  //   }

}
?>