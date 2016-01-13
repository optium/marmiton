<?php
abstract class DAL_DB
{
	private $_DEBUG = false;
	private $_INFOS_GLOBAL = array(
		'host' => 'localhost',
		'login' => 'root',
		'pass' => '',
		'port' => '8889',
		'database' => 'global');
	private $_HANDLE = NULL;

	protected function connectToGlobal()
	{
		if ($this->_HANDLE == NULL)
			return $this->connectToDB($this->_INFOS_GLOBAL['host'], $this->_INFOS_GLOBAL['login'],
				$this->_INFOS_GLOBAL['pass'], $this->_INFOS_GLOBAL['port'],
				$this->_INFOS_GLOBAL['database']);
		return $this->_HANDLE;
	}
	
	protected function connectTo($db){
		if ($db == 'airman_web')
			return $this->connectToAirmanWeb();
		if ($db == 'global')
			return $this->connectToGlobal();
		if ($db == 'airfase')
			return $this->connectToAirfase();
		if ($db == 'deliveries')
			return $this->connectToDeliveries();
		if ($db == 'services')
			return $this->connectToServices();
		return false;
	}

	protected function connectToDB($host, $login, $pass, $port, $db)
	{
		try {
			$this->_HANDLE = new PDO('mysql:dbname='.$db.';host=' . $host, $login, $pass);
            $this->_HANDLE->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'error database connection' . $e;
			return false;
			/* TODO: maybe send a mail or something
			*/
		}
		return $this->_HANDLE;
	}

	/* Hack to connect same DAL to mutliple db */
	protected function resetHandler() { $this->_HANDLE = NULL; }
	protected function sqlError()
	{
		/* TODO: maybe send a mail or something
		*/
		return false;
	}

    protected function getInfos()
    {
        return $this->_INFOS;
	}

	/*
     * Exemple : format_name('pierre-yves') renvoie 'Pierre-Yves'
     */
    protected function format_name($str)
    {
        return str_replace('- ', '-', ucwords(str_replace('-', '- ', $str)));
    }
}
?>