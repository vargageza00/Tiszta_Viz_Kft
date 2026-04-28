<?php

class Kilepes_Model
{
	public function get_data()
	{
		$retData['eredmény'] = "OK";
		$retData['uzenet'] = "Visszontlátásra kedves ".$_SESSION['userlastname']." ".$_SESSION['userfirstname']."!";
		session_unset();
        session_destroy();
		Menu::setMenu();
		return $retData;
	}
}

?>