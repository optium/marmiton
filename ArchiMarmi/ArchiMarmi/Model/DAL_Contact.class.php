<?php

Class DAL_Contact extends DAL_DB {

	public function add_contact($db, $table, $infos, $tab_log){
		if (false === ($handler = $this->connectTo($db)))
            return false;
		$stmt = $handler->prepare("INSERT INTO ".$table." (name, surname, function, aw_login, email, phone, icao)
			VALUES ( :name, :surname, :function, :aw_login, :email, :phone, :icao)");
		$affect = $stmt->execute(array(
            ':name' => $infos['name'],
			':surname' => $infos['surname'],
			':function' => $infos['function'],
			':aw_login' => $infos['aw_login'],
			':email' => $infos['email'],
			':phone' => $infos['phone'],
			':icao' => $infos['icao']
			));
		
		$log = $handler->prepare("INSERT INTO ".$tab_log." (login, date, content) VALUES (?, ?, ?)");
		if (false === $affect){
			$sentence = "The insertion of the contact ".$infos['name']." ".$infos['surname']." of ".$infos['icao']." failed.";
			$log->execute(array(Login::getInstance()->getLog(), date("m-d-Y H:i:s"), $sentence));
			return false;
		}
		else {
			$sentence = "The insertion of the contact ".$infos['name']." ".$infos['surname']." of ".$infos['icao']." succeed.";
			$log->execute(array(Login::getInstance()->getLog(), date("m-d-Y H:i:s"), $sentence));
		}
		return $handler->lastInsertId();
	}
	
	public function update_contact($db, $table, $infos, $tab_log){
		if (false === ($handler = $this->connectTo($db)))
            return false;
		$stmt = $handler->prepare("UPDATE ".$table." 
					SET name = :name, surname = :surname, function = :function, aw_login = :aw_login, email = :email, phone = :phone, icao = :icao 
					WHERE id_contact = :id_contact");
		$affect = $stmt->execute(array(
            ':name' => $infos['name'],
			':surname' => $infos['surname'],
			':function' => $infos['function'],
			':aw_login' => $infos['aw_login'],
			':email' => $infos['email'],
			':phone' => $infos['phone'],
			':icao' => $infos['icao'],
			':id_contact' => $infos['id_contact']));
			
		$log = $handler->prepare("INSERT INTO ".$tab_log." (login, date, content) VALUES (?, ?, ?)");
		if (false === $affect){
			$sentence = "The update of the contact ".$infos['name']." ".$infos['surname']." of ".$infos['icao']." failed.";
			$log->execute(array(Login::getInstance()->getLog(), date("m-d-Y H:i:s"), $sentence));
			return false;
		}
		else {
			$sentence = "The update of the contact ".$infos['name']." ".$infos['surname']." of ".$infos['icao']." succeed.";
			$log->execute(array(Login::getInstance()->getLog(), date("m-d-Y H:i:s"), $sentence));
		}
		return true;
	}
	
	public function delete_contact($db, $table, $infos, $tab_log){
		if (false === ($handler = $this->connectTo($db)))
            return false;
		$stmt = $handler->prepare("DELETE FROM ".$table." 
					WHERE id_contact = ?");
		$affect = $stmt->execute(array($infos['id_contact']));
			
		$log = $handler->prepare("INSERT INTO ".$tab_log." (login, date, content) VALUES (?, ?, ?)");
		if (false === $affect){
			$sentence = "The delete of the contact ".$infos['name']." ".$infos['surname']." of ".$infos['icao']." failed.";
			$log->execute(array(Login::getInstance()->getLog(), date("m-d-Y H:i:s"), $sentence));
			return false;
		}
		else {
			$sentence = "The update of the contact ".$infos['name']." ".$infos['surname']." of ".$infos['icao']." succeed.";
			$log->execute(array(Login::getInstance()->getLog(), date("m-d-Y H:i:s"), $sentence));
		}
		return true;
	}
	
	public function get_contacts($db, $table, $icao){
		if (false === ($handler = $this->connectTo($db)))
            return false;
		$stmt = $handler->prepare("SELECT * FROM ".$table." WHERE icao LIKE ?");
		$stmt->execute(array($icao));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>