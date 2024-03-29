<?php
	Include('system_load.php');
	//This loads system.
	
	//user Authentication.
	authenticate_user('all');
	
	//updating Notes
	if(isset($_POST['update_note'])) { 
		extract($_POST);
		$message = $notes_obj->update_note($edit_note, $note_title, $note_detail);
	}//update ends here.
	
	//setting level data if updating or editing.
	if(isset($_POST['edit_note'])) {
		$notes_obj->set_note($_POST['edit_note']);	
	} //level set ends here
	
	//add user processing.
	if(isset($_POST['add_note']) && $_POST['add_note'] == '1') { 
		extract($_POST);
		if($note_title == '') { 
			$message = $language["note_title_required"];
		} else if($note_detail == '') { 
			$message = $language["note_detail_required"];
		}  else {
		$message = $notes_obj->add_note($note_title, $note_detail);
		}
	}//add user processing ends here.
	
	if(isset($_POST['edit_note'])){ $page_title = $language['edit_note']; } else { $page_title = $language['add_note'];} //page title set.
	$sub_title = "Add or Edit your notes.";
	require_once("Includes/header.php"); //including header file.
	
	//display message if exist.
        if(isset($message) && $message != '') { 
            echo '<div class="alert alert-success">';
            echo $message;
            echo '</div>';
        }
    ?>
                    <div class="col-sm-8">
                    <form action="<?php $_SERVER['PHP_SELF']?>" id="add_user" name="user" method="post" enctype="multipart/form-data" role="form">
                     <div class="form-group">
                     <label class="control-label"><?php echo $language["note_title"]; ?>*</label>
                     <input type="text" class="form-control" name="note_title" required="required" placeholder="<?php echo $language["note_title"]; ?>" value="<?php echo $notes_obj->note_title; ?>" />
                     </div>
                        
                        <div class="form-group">
                        	<label class="control-label"><?php echo $language["note_detail"]; ?>*</label>
                            <textarea name="note_detail" class="tinyst form-control" placeholder="<?php echo $language["note_detail"]; ?>"><?php echo $notes_obj->note_detail; ?></textarea>
                        </div>

					  <?php 
						if(isset($_POST['edit_note'])){ 
							echo '<input type="hidden" name="edit_note" value="'.$_POST['edit_note'].'" />';
							echo '<input type="hidden" name="update_note" value="1" />'; 
						} else { 
							echo '<input type="hidden" name="add_note" value="1" />';
						} ?>
                        <div class="form-group">
                        	<input type="submit" value="<?php if(isset($_POST['edit_note'])){ echo $language["edit_note"]; } else { echo $language["add_note"];} ?>" class="btn btn-primary" />
                        </div>
                    </form>
                    <script type="text/javascript">
						$(document).ready(function() {
						// validate the register form
					$("#add_user").validate();
						});
                    </script>
                   </div><!--left-side-form ends here.-->
<?php
	require_once('Includes/sidebar.php');
?>                        
<?php
	require_once("Includes/footer.php");
?>