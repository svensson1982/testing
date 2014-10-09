<?php
class tpl {
	private $tpl_file;
	private $vars = array();
    
	public function __construct($tpl_file) {
		$this->tpl_file = "tpl/$tpl_file.tpl.php";
	}
    
	public function __toString() {
		if (file_exists($this->tpl_file)) {
			ob_clean();
			extract($this->vars);
			require($this->tpl_file);
			$output = ob_get_contents();
			ob_clean();
		}
		return $output;
		header('Content-type: text/html; charset=UTF-8', true);
	}
}
?>