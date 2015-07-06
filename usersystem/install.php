<?php
	//Page display settings.
	$page_title = "Installation!"; //You can edit this to change your page title.
	require_once("Includes/functions.php"); //option functions file.
	require_once("Includes/db_connect.php"); //Database connection file.
	
	global $db; //creating database object.
	
	if($db->query('SELECT 1 from user_meta') == FALSE) { 
		$query = 'CREATE TABLE user_meta (
			`user_meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`user_id` bigint(20) NOT NULL,
			`message_email` varchar(50) NOT NULL,
			`last_login_time` datetime NOT NULL,
			`last_login_ip` varchar(120) NOT NULL,
  			`login_attempt` bigint(20) NOT NULL,
			`login_lock` varchar(50) NOT NULL,
			PRIMARY KEY (`user_meta_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'User Meta Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from message_meta') == FALSE) { 
		$query = 'CREATE TABLE message_meta (
			`msg_meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`message_id` bigint(20) NOT NULL,
			`status` varchar(100) NOT NULL,
			`from_id` bigint(20) NOT NULL,
			`to_id` bigint(20) NOT NULL,
  			`subject_id` bigint(20) NOT NULL,
			PRIMARY KEY (`msg_meta_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Message Meta Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from messages') == FALSE) { 
		$query = 'CREATE TABLE messages (
			`message_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`message_datetime` datetime NOT NULL,
			`message_detail` varchar(1000) NOT NULL,
			PRIMARY KEY (`message_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Messages Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from subjects') == FALSE) { 
		$query = 'CREATE TABLE subjects (
			`subject_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`subject_title` varchar(600) NOT NULL,
  			PRIMARY KEY (`subject_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Subjects Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from notes') == FALSE) { 
		$query = 'CREATE TABLE notes (
			`note_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`note_date` date NOT NULL,
			`note_title` varchar(200) NOT NULL,
			`note_detail` varchar(600) NOT NULL,
			`user_id` bigint(20) NOT NULL,
  			PRIMARY KEY (`note_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Notes Table created.<br>';
	}  //Creating user notes table ends here.
	
	if($db->query('SELECT 1 from announcements') == FALSE) { 
		$query = 'CREATE TABLE announcements (
			`announcement_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`announcement_date` date NOT NULL,
			`announcement_title` varchar(200) NOT NULL,
			`announcement_detail` varchar(1000) NOT NULL,
			`user_type` varchar(100) NOT NULL,
			`announcement_status` varchar(50) NOT NULL,
  			PRIMARY KEY (`announcement_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Notes Table created.<br>';
	}  //Creating user notes table ends here.
	
	//if database tables does not exist already create them.
	if($db->query('SELECT 1 from options') == FALSE) {
		$query = 'CREATE TABLE options (
			`option_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`option_name` varchar(500) NOT NULL,
			`option_value` varchar(500) NOT NULL,
  			PRIMARY KEY (`option_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Options Table created.<br>';
	} //creating options table.
	
	if($db->query('SELECT 1 from users') == FALSE) { 
		$query = 'CREATE TABLE users (
			`user_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`first_name` varchar(100) NOT NULL,
			`last_name` varchar(100) NOT NULL,
			`gender` varchar(50) NOT NULL,
			`date_of_birth` date NOT NULL,
			`address1` varchar(200) NOT NULL,
			`address2` varchar(200) NOT NULL,
			`city` varchar(100) NOT NULL,
			`state` varchar(100) NOT NULL,
			`country` varchar(100) NOT NULL,
			`zip_code` varchar(100) NOT NULL,
			`mobile` varchar(200) NOT NULL,
			`phone` varchar(200) NOT NULL,
			`username` varchar(100) NOT NULL,
			`email` varchar(200) NOT NULL,
			`password` varchar(200) NOT NULL,
			`profile_image` varchar(500) NOT NULL,
			`description` varchar(600) NOT NULL,
			`status` varchar(100) NOT NULL,
			`activation_key` varchar(100) NOT NULL,
			`date_register` date NOT NULL,
			`user_type` varchar(100) NOT NULL,
  			PRIMARY KEY (`user_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Users Table created.<br>';
	}  //Creating users table ends here.
	
	//if database tables does not exist already create them.
	if($db->query('SELECT 1 from user_level') == FALSE) {
		$query = 'CREATE TABLE user_level (
			`level_id` bigint(20) NOT NULL AUTO_INCREMENT,
			`level_name` varchar(200) NOT NULL,
			`level_description` varchar(600) NOT NULL,
			`level_page` varchar(100) NOT NULL,
  			PRIMARY KEY (`level_id`)
		)';	
		$result = $db->query($query) or die($db->error);
		echo 'Options Table created.<br>';
	} //creating user level table ends.
	
	//Check if installation is already complete.
	$installation = get_option('installation');
	if($installation == 'Yes') { 
		HEADER('LOCATION: index.php');
		exit();
	}
	//installation form processing when submits.
	if(isset($_POST['install_submit']) && $_POST['install_submit'] == 'Yes') {
		extract($_POST);
		//validation to check if fields are empty!
		if($site_url == '') { 
			echo 'Site url cannot be empty!';
		} else if($email_from == '') { 
			echo 'Email from cannot be empty!';
		} else if($email_to == '') { 
			echo 'Reply to cannot be empty!';
		} else if($email == '') { 
			echo 'Admin email cannot be empty!';
		} else if($password == '') { 
			echo 'Admin Password cannot be empty!';
		} else {
			//adding site url
			set_option('site_url', $site_url);
			set_option('site_name', $site_name);
			set_option('email_from', $email_from);
			set_option('email_to', $email_to);
			set_option('installation', 'Yes');
			set_option('skin', 'default');
			set_option('version', '3.0');
			set_option('language', $language);
			install_admin($first_name, $last_name, $username, $email, $password);
			HEADER('LOCATION: index.php');
		}//form validations
	}//form processing.
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $page_title; ?></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
    	<!-- you can copy following form in your registration page!-->
        	<h2><?php echo $page_title; ?></h2>
            <hr />
            <h3>Note: You can delete install.php once your installation is complete and working fine.</h3><br /><br />
            <p>Here you can setup basic values for this login script. Please make sure you give correct values cause you could not edit them later without using PHPmyADMIn options table.</p>
            
            <form name="set_install" id="set_install" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                	<div class="form-group">
                    	<label class="control-label">Site URL*:</label>
                        <input type="text" class="form-control" name="site_url" required /><small>Please Include / at end of site url e.g http://localhost/</small>
                    </div>
                    
                    <div class="form-group">
                    	<label class="control-label">Site Name:</label>
                        <input class="form-control" type="text" name="site_name" />
                    </div>
                    
                    <div class="form-group">
                    	<label class="control-label">Language:</label>
                        <select name="language" class="form-control">
                        	<option value="english">English</option>
                            <option value="french">French</option>
                            <option value="dutch">Dutch</option>
                            <option value="german">German</option>
                            <option value="italian">Italian</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    	<p>
                        	Email settings used for the system will send Emails to users.
                    	</p>
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Email From*:</label>
                        <input class="form-control" type="text" name="email_from" required />
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Reply To*:</label>
                        <input class="form-control" type="text" name="email_to" required />
                    </div>
                     <div class="form-group">
                    	<p>
                        	Administrator Settings this user will able to handle all users their levels their status active/ban.
                        </p>
                        <hr />
                    </div>
                    <div class="form-group">
                    	<label class="control-label">First Name:</label>
                        <input class="form-control" type="text" name="first_name" />
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Last Name:</label>
                        <input class="form-control" type="text" name="last_name" />
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Username*:</label>
                        <input class="form-control" type="text" name="username" required />
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Email*:</label>
                        <input class="form-control" type="text" name="email" required />
                    </div>
                    <div class="form-group">
                    	<label class="control-label">Password*:</label>
                        <input class="form-control" type="password" name="password" required />
                    </div>
                    <input type="hidden" name="install_submit" value="Yes" />
                    <input type="submit" value="Submit" class="btn btn-primary" />
            </form>
            <script>
				$(document).ready(function() {
					// validate the Installation form
					$("#set_install").validate();
				});
            </script>
    </div><!--//wc_wrapper--> 
</body>
</html>