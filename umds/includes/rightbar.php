<div id="right">
<h2>User CP</h2>
	<p><a href="index.php">Home</a></p>
	<?php
		if(isset($_SESSION['username']))
		{
	?>
	<p><a href="index.php">Contacts</a></p>
	<p><a href="index.php">Calendar</a></p>
	<p><a href="todos.php">To-Do Notes</a></p>
	<p><a href="index.php">Settings</a></p>
	<p><a href="registerDevice.php">Register Devices</a></p>
	<p><a href="viewDevices.php">View Devices</a></p>
	<p><a href="logout.php">Logout</a></p>
	<?php
		}
	?>
</div>