<?php session_start(); ?>
<?php
	include("includes/constants.php");
	include("includes/validationFunctions.php");
	
	if(!isset($_SESSION['username']))
		header("Location: " . APP_WEB_ADDRESS . "/login.php");
		
	if(!isset($_GET['entryid']))
		header("Location: " . APP_WEB_ADDRESS . "/todos.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php print APP_NAME; ?></title>
<link href="css/style1.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {
	text-align: center;
}
.style2 {
	text-align: left;
}
</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 class="style1">Edit To-Do Note</h2>
	<p>&nbsp;</p>
	<?php
	
	// Code for ToDo Note Edit
		$conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
        $db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
        $username = $_SESSION['username'];
        $entryid = $_GET['entryid'];

        $query="SELECT * FROM ToDoEntries WHERE username LIKE '" . $username . "' AND entryid = $entryid";
        $result = mysql_query($query) or die("Query Failed");
        //echo "Number of Rows : " . mysql_num_rows($result);
        $rowFound = false;
        if(mysql_num_rows($result) == 1)
        {
        	$row = mysql_fetch_array($result);
            $summary = $row['summary'];
            $completed = $row['completed'];
            $due = $row['due'];
            $priority = $row['priority'];
            $note = $row['note'];
            $completion_date = $row['completion_date'];
            $revision = $row['revision'];
            $class = $row['class'];                
            $deviceID = $row['deviceID'];
            $rowFound = true;
        }
        
        if($rowFound == true)
        {
?>
<form method="post" action="todo_edit_save.php">
	<div class="style2">
	Summary :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="txtSummary" type="text" style="width: 300px" value = <?php print "\"$summary\""; ?> ><br>Completed 
		:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		<input name="txtCompleted" type="text" style="width: 300px" value = <?php print "\"$completed\""; ?> ><br>Due:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="txtDue" type="text" style="width: 300px" value = <?php print "\"$due\""; ?> ><br>Priority:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="txtPriority" type="text" style="width: 300px" value = <?php print "\"$priority\""; ?> ><br>Note:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="txtNote" type="text" style="width: 300px" value = <?php print "\"$note\""; ?> ><br>Completion 
		Date: <input name="txtCompletionDate" type="text" style="width: 300px" value = <?php print "\"$completion_date\""; ?> ><br>
		Revision :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="txtRevision" type="text" style="width: 300px" value = <?php print "\"$revision\""; ?> ><br>Class :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="txtClass" type="text" style="width: 300px" value = <?php print "\"$class\""; ?> ><br><br>&nbsp;<input name="cmdSave" type="submit" value="Save">
		<input type="hidden" name="txtEntryID" value = <?php print "\"$entryid\""; ?> ></div>
	</form>
<?php
		}
		else
		{
			print "<p>Incorrect ToDo Item Selected.</p>";
			print "<p>Click <a href=\"todos.php\">here</a> to try again.</p>";
			print "<p>&nbsp;</p>";
			print "<p>&nbsp;</p>";
			print "<p>&nbsp;</p>";
			print "<p>&nbsp;</p>";
			print "<p>&nbsp;</p>";
			print "<p>&nbsp;</p>";
			print "<p>&nbsp;</p>";
			print "<p>&nbsp;</p>";
		}
?>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>