<?php
class Data implements iterator, arrayaccess {
    //The class name always begin with uppercase.
	private $vars = array();
	private $sum = 0;
	public function __construct($data) {
		if (is_array($data)) {
			foreach ($data as $key => $val) {
				$this->$key = $val;
			}
		}
	}
	public function __set($key, $val) {
		if (is_numeric($val)) {
			$this->vars[$key] = $val;
			$this->sum += (real)$val;
		}
	}
	public function __get($key) {
		if (!isset($this->vars[$key])) return false;
		return $this->vars[$key].' ('.number_format(($this->vars[$key] / $this->sum) * 100, 2).'%)';
	}

	public function offsetSet($offset, $val) {
		$this->$offset = $val;
	}
	public function offsetExists($offset) {
		return isset($this->$offset);
	}
	public function offsetUnset($offset) {
		unset($this->$offset);
	}
	public function offsetGet($offset) {
		return $this->$offset;
	}

	public function rewind() {
		reset($this->vars);
	}
	public function current() {
		return $this->{key($this->vars)};
	}
	public function key() {
		return key($this->vars);
	}
	public function next() {
		return next($this->vars);
	}
	public function valid() {
		return ($this->current() !== false);
	}
}

?>