<?php
	Include('system_load.php');
	//This loads system.
	
	//user Authentication.
	authenticate_user('admin');
	
	//Delete user level.
	if(isset($_POST['delete_level']) && $_POST['delete_level'] != '') { 
		$message = $new_level->delete_level($_SESSION['user_type'], $_POST['delete_level']);
	}//delete level ends here.
	
	$page_title = $language["manage_user_levels"]; //You can edit this to change your page title.
	$sub_title = "Manage user levels";
	require_once("Includes/header.php"); //including header file.

	//display message if exist.
	if(isset($message) && $message != '') { 
		echo '<div class="alert alert-success">';
		echo $message;
		echo '</div>';
	}
?>
    <p><a href="manage_user_level.php" class="btn btn-primary btn-default"><?php echo $language["add_new"]; ?></a></p>
                    <table cellpadding="0" cellspacing="0" border="0" class="table-responsive table-hover table display table-bordered" id="wc_table" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo $language["id"]; ?></th>
                                <th><?php echo $language["level_name"]; ?></th>
                                <th><?php echo $language["level_description"]; ?></th>
                                <th><?php echo $language["level_page_name"]; ?></th>
                                <th><?php echo $language["message"]; ?></th>
                                <th class="sorting_disabled"><?php echo $language["edit"]; ?></th>
                                <th><?php echo $language["delete"]; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td>0</td>
                                <td>admin</td>
                                <td><?php echo $language["default_level_for_admins"]; ?></td>
                                <td>dashboard.php</td>
                                <td><button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_admin">
  							<?php echo $language["message"]; ?>
							</button></td>
<script type="text/javascript">
$(function(){
$("#message_form_admin").on("submit", function(e){
  e.preventDefault();
  tinyMCE.triggerSave();
  $.post("Includes/messageprocess.php", 
	 $("#message_form_admin").serialize(), 
	 function(data, status, xhr){
	   $("#success_message_admin").html("<div class='alert alert-success'>"+data+"</div>");
	 });
});
});
</script>				
<div class="modal fade" id="modal_admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="message_form_admin" method="post" name="send_message">
	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $language["send_message"]; ?></h4>
      </div>
	  
      <div class="modal-body">
      		<div id="success_message_admin"></div>
	   		<div class="form-group">
				<label class="control-label"><?php echo $language["message_to"]; ?></label>
				<input type="text" class="form-control" name="message_to" value="<?php echo $language["all_admin_users"]; ?>" readonly="readonly" />
			</div>
			
			<div class="form-group">
				<label class="control-label"><?php echo $language["subject"]; ?></label>
				<input type="text" class="form-control" name="subject" value="" />
			</div>
			
			<div class="form-group">
				<label class="control-label"><?php echo $language["message"]; ?></label>
				<textarea class="form-control tinyst" name="message"></textarea>
			</div>
      </div>
      <input type="hidden" name="level_name" value="admin" />
	  <input type="hidden" name="level_form" value="1" />
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $language["close"]; ?></button>
		<input type="submit" value="<?php echo $language["send_message"]; ?>" class="btn btn-primary" />
      </div>
    </div><!-- /.modal-content -->
   </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <?php $new_level->list_levels($_SESSION['user_type']); ?>
                        </tbody>
                    </table>
                     
<?php
	require_once("Includes/footer.php");
?>