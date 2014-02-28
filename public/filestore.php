<?php
class Filestore{
	public $filename ='';

	function __construct($filename= ''){
		$this->filename = $filename;
	}
	//return array of lines in $this->filename
	function read_lines(){
		$handle = fopen($this->filename, "r");
    	$content = fread($handle, filesize($this->filename));
    	fclose($handle);
    	return explode("\n", $content);
	}
	//write each element in $array to a new line in this->filename
	function write_lines($array){
		$itemStr = implode("\n", $array);
    	$handle = fopen($this->filename, "w");
    	fwrite($handle, $itemStr);
    	fclose($handle);
	}
	//Reads content of csv $this->filename, returns an array
	function read_csv(){
		$content=[];
    	$handle = fopen($this->filename, "r");
    	while(($data = fgetcsv($handle)) !== FALSE){
    		$content[] = $data;
    	}
    	fclose($handle);
    	return $content;
	}
	//Writes contents of $array to csv $this->filename
	function write_csv($array){
		$handle = fopen($this->filename, 'w');
		foreach ($array as $item) {
			fputcsv($handle, $item);
		}
		fclose($handle);
	}
}