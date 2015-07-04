<?php
	include('system_load.php');
	//This loads system.
	authenticate_user('subscriber');
	
	$page_title = 'Dashboard';
	$sub_title = "Page for subscribers.";
	require_once('includes/header.php');	
?>
<p>In sidebar menu Dashboard would be linked to level page automatically. This is subscriber page and dashboard link in sidebar is linked to subscriber.php from database. You can create more user levels as per your needs and create pages like this which are only accessible by admin users and their level access holders. Non loged in users would be redirected to login page.</p>
<p><?php echo $language["sub_page_des_1"]; ?></p>

<h3><?php echo $language['page_title_4']; ?></h3>
<p><?php echo $language['all_page_des_3']; ?></p>
<pre>
&lt;?php
	include('system_load.php');
	<?php echo $language['home_comment_2']; ?>
	
	authenticate_user('subscriber');
?&gt;		
</pre>

<h3><?php echo $language['all_page_title_3']; ?></h3>
<p><?php echo $language['all_page_des_2']; ?></p>
<pre>
&lt;?php
	include('system_load.php');
	<?php echo $language['home_comment_2']; ?>
	
	authenticate_user('all');
?&gt;		
</pre>

<h2><?php echo $language['home_heading_4']; ?></h2>
<pre>
&lt;?php if(partial_access('admin')): ?&gt;	
	&lt;p&gt;<?php echo $language['home_comment_3']; ?>&lt;/p&gt;
&lt;?php elseif(partial_access('subscriber')): ?&gt;
	&lt;p&gt;<?php echo $language['home_comment_4']; ?>&lt;/p&gt;
&lt;?php elseif(partial_access('all')): ?&gt;
	&lt;p&gt;<?php echo $language['home_comment_5']; ?>&lt;/p&gt;
&lt;?php else: ?&gt; 
	&lt;p&gt;<?php echo $language['home_comment_6']; ?>&lt;/p&gt;
&lt;?php endif; ?&gt;
</pre>

<h2><?php echo $language['home_heading_5']; ?></h2>
<?php if(partial_access('admin')): ?>	
	<h3><?php echo $language['home_comment_3']; ?></h3>
<?php elseif(partial_access('subscriber')): ?>
	<h3><?php echo $language['home_comment_4']; ?></h3>
<?php elseif(partial_access('all')): ?>
	<h3><?php echo $language['home_comment_5']; ?></h3>
<?php else: ?> 
	<h3><?php echo $language['home_comment_6']; ?></h3>
<?php endif; ?>

<!--footer-->
<?php require_once('includes/footer.php'); ?>