<?php

/* class will return a collection of all rows from a table */

class Collection {

	private $collection;

	function __construct($table_to_get) {
		$mysqli = new Connection();
		$result = $mysqli->get_connection()->query("SELECT * FROM $table_to_get");
		while($row = $result->fetch_assoc()) {
			$collection[] = $row;
		}
		$this->collection = $collection;
	}

	public function get_collection() {
		return $this->collection;
	}
}