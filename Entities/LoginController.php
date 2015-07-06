<?php

session_start();
require "User.php";

class LoginController {

    private $user_id;
    private $email;
    private $password;
    private $referer;

    private $user;

    function __construct($email, $password, $referer) {
        $this->email = $email;
        $this->password = $password;
        $this->referer = $referer;
        $this->set_user_id();

        $this->user = new User($this->user_id);
        $this->check_user_password($this->user, $this->password);
    }

    private function get_user_id($email) {
        $connection = new Connection;
        $result = $connection->get_connection()->query(
            "SELECT * FROM users WHERE email='$email'"
        );
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row['user_id'];
            }
        }
    }

    private function check_user_password($user_obj, $user_pass) {
        $retrieved_password = $user_obj->get_password();

        if($retrieved_password == md5($user_pass)) {
            $this->handle_correct_password();
        }
    }

    private function set_user_id() {
        $this->user_id = $this->get_user_id($this->email);
    }

    private function handle_correct_password() {
        $_SESSION['user'] = $this->email;
        header("location: $this->referer.php");
    }

    private function handle_incorrect_password() {

    }
}
