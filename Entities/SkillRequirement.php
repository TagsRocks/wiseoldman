<?php

class SkillRequirement {

	private $id;
	private $skill_id;
	private $skill_level;
	private $explanation;
	private $mysqli;

	function __construct($id) {
		$this->new_mysqli();
		$this->id = $id;
		$this->skill_id = $this->query_var("skill_id");
		$this->skill_level = $this->query_var("skill_level");
		$this->explanation = $this->query_var("explanation");
	}

	private function query_var($query) {
		$result = $this->mysqli->query(
			"SELECT $query FROM requirements WHERE id=$this->id"
			);
		while($row = $result->fetch_assoc()) {
			return $row[$query];
		}
	}

	public function get_id() {
		return $this->id;
	}

	public function get_skill_id() {
		return $this->skill_id;
	}

	public function get_skill_level() {
		return $this->skill_level;
	}

	public function get_explanation() {
		return $this->explanation;
	}

	public function new_mysqli() {
		$this->mysqli = new mysqli(
			'localhost',
			'root',
			'',
			'rsquest'
		);
	}
}