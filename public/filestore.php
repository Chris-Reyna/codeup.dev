<?php
class Filestore{
	public $filename ='';
	private $is_csv = FALSE;

	public function __construct($filename= ''){
		$this->filename = $filename;
		if(substr($filename, -3) == 'csv'){
			$this->is_csv = TRUE;
		}
	}

	public function read() {
		if($this->is_csv == TRUE){
			return $this->read_csv();
		}else{
			return $this->read_lines();
		}
	}

	public function write($array){
		if($this->is_csv == TRUE){
			$this->write_csv($array);
		}else{
			$this->write_lines($array);
		}
	}

	//return array of lines in $this->filename
	private function read_lines(){
		if (filesize($this->filename) == 0){
			return [];
		}
		$handle = fopen($this->filename, "r");
    	$content = fread($handle, filesize($this->filename));
    	fclose($handle);
    	return explode("\n", $content);
	}
	//write each element in $array to a new line in this->filename
	private function write_lines($array){
		$itemStr = implode("\n", $array);
    	$handle = fopen($this->filename, "w");
    	fwrite($handle, $itemStr);
    	fclose($handle);
	}
	//Reads content of csv $this->filename, returns an array
	private function read_csv(){
		$content=[];
    	$handle = fopen($this->filename, "r");
    	while(($data = fgetcsv($handle)) !== FALSE){
    		$content[] = $data;
    	}
    	fclose($handle);
    	return $content;
	}
	//Writes contents of $array to csv $this->filename
	private function write_csv($array){
		$handle = fopen($this->filename, 'w');
		foreach ($array as $item) {
			fputcsv($handle, $item);
		}
		fclose($handle);
	}
}