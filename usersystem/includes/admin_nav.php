    <div class="sidebar-menu">
    	<nav class="navbar navbar-default" role="navigation">
  		<!-- Brand and toggle get grouped for better mobile display -->
  		<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
    			<a class="navbar-brand" href="dashboard.php"><?php echo get_option('site_name'); ?></a>
                        <!--collapse user info box opner-->
                        <div class="settings-icon">
						<a href="#collapseExample" data-toggle="collapse" title="View user detail" data-animate="true">
							<i class="glyphicon glyphicon-triangle-bottom"></i>
						</a>
						</div>
		
  	</div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
	    <li><a href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> <?php echo $language['dashboard']; ?></a>
        	<ul>
	        	<li><a href="general_settings.php">General Settings</a></li>
                <li><a href="dashboard.php?logout=1">Logout</a></li>
    	    </ul>
        </li>
        <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> <?php echo $language['users']; ?></a>
        	<ul>
                <li><a href="manage_users.php">Add user</a></li>
    	    </ul>
        </li>
        <li><a href="user_levels.php"><span class="glyphicon glyphicon-folder-open"></span>  <?php echo $language['user_levels']; ?></a>
        	<ul>
                <li><a href="manage_user_level.php">Add user level</a></li>
    	    </ul>
        </li>
        <li><a href="notes.php"><i class="glyphicon glyphicon-calendar"></i> <?php echo $language['my_notes']; ?></a>
        	<ul>
                <li><a href="manage_notes.php">Add note</a></li>
    	    </ul>
        </li>
        <li><a href="announcements.php"><span class="glyphicon glyphicon-bullhorn"></span> Announcements</a>
        	<ul>
                <li><a href="manage_announcement.php">Add announcement</a></li>
    	    </ul>
        </li>
        <li><a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> <?php echo $language['messages']; ?> <span class="badge"><?php $message_obj->unread_count(); ?></span></a>
        	<ul>
                <li><a href="messages.php">Inbox</a></li>
                <li><a href="messages.php?type=sent">Sent Items</a></li>
    	    </ul>
        </li>
    </ul>
    
  </div><!-- /.navbar-collapse -->
</nav>
</div>
<!--==================Sidebar Ends Here===========================-->

