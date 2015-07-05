<?php
 
require_once "SkillRequirement.php";

class Quest {

	private $id;
	private $title;
	private $skill_requirements;
	private $quest_requirements;
	private $difficulty;
	private $length;
	private $type;

	function __construct($id) {
		$this->new_mysqli();
		$this->id = $id;
		$this->title = $this->query_var('quest_name');
		$this->difficulty = $this->query_var('quest_difficulty');
		$this->length = $this->query_var('quest_length');
		$this->points = $this->query_var('quest_points');
		$this->type = $this->query_var('quest_type');

		$this->skill_requirements = $this->prepare_skill_requirements();
		$this->quest_requirements = $this->prepare_quest_requirements();
	}

	private function query_var($query) {
		$result = $this->mysqli->query(
			"SELECT $query FROM quests WHERE id=$this->id"
			);
		while($row = $result->fetch_assoc()) {
			return $row[$query];
		}
	}

	private function prepare_skill_requirements() {
		$requirements = [];
		$result = $this->mysqli->query(
			"SELECT * FROM quests_to_requirements WHERE
			quest_id = $this->id"
			);

		while($row = $result->fetch_assoc()) {
			$requirements[] = new SkillRequirement($row['requirements_id']);
		}

		return $requirements;
	}

	private function prepare_quest_requirements() {
		$requirements = [];
		$result = $this->mysqli->query(
			"SELECT * FROM quest_to_quest_requirement 
			WHERE quest_id = $this->id"
			);
		while($row = $result->fetch_assoc()) {
			$requirements[] = new Quest($row['quest_requirement_quest']);
		}

		return $requirements;
	}

	public function get_id() {
		return $this->id;
	}

	public function get_title() {
		return $this->title;
	}

	public function get_skill_requirements() {
		return $this->skill_requirements;
	}

	public function get_quest_requirements() {
		return $this->quest_requirements;
	}

	public function get_difficulty() {
		return $this->difficulty;
	}

	public function get_length() {
		return $this->length;
	}

	public function get_type() {
		return $this->type;
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