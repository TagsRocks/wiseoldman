<?php
	include('system_load.php');
	//This loads system.
	//user Authentication.
	authenticate_user('admin');


	if(isset($_POST['update_level'])) { 
		extract($_POST);
		$message = $new_level->update_user_level($edit_level,$level_name, $level_description, $level_page);
	}//update ends here.
	//setting level data if updating or editing.
	if(isset($_POST['edit_level'])) {
		$new_level->set_level($_POST['edit_level']);	
	} //level set ends here
	if(isset($_POST['add_level'])) {
		$add_level = $_POST['add_level'];
		if($add_level == '1') { 
			extract($_POST);
			$message = $new_level->add_user_level($level_name, $level_description, $level_page);
		}
	}//isset add level
	if(isset($_POST['edit_level'])){ $page_title = $language["edit_user_level"]; } else { $page_title = $language["add_new_user_level"];}; //You can edit this to change your page title.
	$sub_title = "Add or update user levels";
	require_once("includes/header.php"); //including header file.

        //display message if exist.
            if(isset($message) && $message != '') { 
                echo '<div class="alert alert-success">';
                echo $message;
                echo '</div>';
            }
        ?>
                    <div class="col-sm-8">
                    <form action="<?php $_SERVER['PHP_SELF']?>" id="add_level" name="level" method="post">
                    <div class="form-group">
                        	<label class="control-label"><?php echo $language["level_name"]; ?>*</label>
                            <input type="text" class="form-control" name="level_name" placeholder="<?php echo $language["level_name"]; ?>" value="<?php echo $new_level->level_name; ?>" required="required" />
                      </div>
                      
                     <div class="form-group">
                        	<label class="control-label"><?php echo $language["level_description"]; ?></label>
                            <textarea class="form-control" placeholder="<?php echo $language["level_description"]; ?>" name="level_description"><?php echo $new_level->level_description; ?></textarea>
                      </div>
                      
                      <div class="form-group">
                        	<label class="control-label"><?php echo $language["page_name"]; ?>*</label>
                            <small><?php echo $language["level_des_1"]; ?></small><input type="text" name="level_page" class="form-control" value="<?php echo $new_level->level_page; ?>" placeholder="<?php echo $language["user_level_page"]; ?>" required="required" /><br /><small><?php echo $language["level_des_2"]; ?></small>
                       </div>
                        <div class="form-group">
                        <small><?php echo $language["level_des_3"]; ?> 
<pre>
&lt;?php
	include('system_load.php'); //<?php echo $language["load_properly"]; ?>
	
    <?php echo $language["home_comment_1"]; ?>
    
    authenticate_user('manager');
?&gt;		
</pre>
<?php echo $language["level_des_4"]; ?></small>
                        </div>
						<?php 
						if(isset($_POST['edit_level'])){ 
							echo '<input type="hidden" name="edit_level" value="'.$_POST['edit_level'].'" />';
							echo '<input type="hidden" name="update_level" value="1" />'; 
						} else { 
							echo '<input type="hidden" name="add_level" value="1" />';
						} ?>
                        <input type="submit" class="btn btn-primary" value="<?php if(isset($_POST['edit_level'])){ echo $language['update_level']; } else { echo $language['add_level'];} ?>" />
                    </form>
                    <script>
						$(document).ready(function() {
							// validate the register form
							$("#add_level").validate();
						});
                    </script>
                   </div><!--left-side-form ends here.-->
                   
<?php
	require_once('includes/sidebar.php');
?>                        
<?php
	require_once("includes/footer.php");
?>