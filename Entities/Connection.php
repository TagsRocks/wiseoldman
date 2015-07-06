<?php

class Connection {

	private $username = 'root';
	private $database = 'rsquest';
	private $password = '';
	private $host     = 'localhost';
	private $connection;

	function __construct() {
		$this->connection = new mysqli
		(
			$this->host,
			$this->username,
			$this->password,
			$this->database
		);
	}

	public function get_connection() {
		return $this->connection;
	}

}
