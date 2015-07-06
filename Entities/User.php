<?php

require_once "Connection.php";

class User {

	private $id;
	private $firstname;
	private $lastname;
	private $username;
	private $email;
	private $password;
	private $date_birth;
	private $mobile;
	private $status;
	private $type;
	private $date_register;
	private $activation_key;
	private $connection;

	function __construct($id) {
		$this->connection = new Connection();

		$user = $this->connection->get_connection()->query(
			"SELECT * FROM users WHERE user_id='$id'"
		);
		if($user->num_rows > 0) {
			while($row = $user->fetch_assoc()) {
				$this->id = $row['user_id'];
				$this->firstname = $row['first_name'];
				$this->lastname = $row['last_name'];
				$this->username = $row['username'];
				$this->email = $row['email'];
				$this->password = $row['password'];
				$this->date_birth = $row['date_of_birth'];
				$this->mobile = $row['mobile'];
				$this->status = $row['status'];
				$this->type = $row['user_type'];
				$this->date_register = $row['date_register'];
				$this->activation_key = $row['activation_key'];
				break;
			}
		} else {

		}
	}

	public function get_id() {
		return $this->id;
	}

	public function get_firstname() {
		return $this->firstname;
	}

	public function get_lastname() {
		return $this->lastname;
	}

	public function get_username() {
		return $this->username;
	}

	public function get_email() {
		return $this->email;
	}

	public function get_password() {
		return $this->password;
	}

	public function get_date_birth() {
		return $this->date_birth;
	}

	public function get_mobile() {
		return $this->mobile;
	}

	public function get_status() {
		return $this->status;
	}

	public function get_type() {
		return $this->type;
	}

	public function get_date_register() {
		return $this->date_register;
	}

	public function get_activation_key() {
		return $this->get_activation_key;
	}
}

?>
