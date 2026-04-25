<?php

class Teszt_Model
{
	private $data = array
	('new' => array('title' => 'New Website', 'content' => 'Welcome to the site!'),
	 'mvc' => array('title' => 'PHP MVC Framework', 'content' => 'works good'));
	
	public function get_data($title)
	{
		if(array_key_exists($title, $this->data))
			$retData = $this->data[$title];
		else
			$retData = array('title' => "ERROR", 'content' => "A kért adat nem található");
		return $retData;
	}
}

?>