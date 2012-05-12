<?php session_start(); ?>
<?php
	include("includes/constants.php");
	include("includes/commonFunctions.php");
	
	if(!isset($_SESSION['username']))
		header("Location: " . APP_WEB_ADDRESS . "/login.php");
?>
<?php
    if(!isset($_POST['txtEntryID']))
    {
        print "Error";
    }
    else
    {
    	$username = $_SESSION['username'];
    	$entryid = $_POST['txtEntryID'];
        $summary = $_POST['txtSummary'];
        $completed = $_POST['txtCompleted'];
        $due = $_POST['txtDue'];
        $priority = $_POST['txtPriority'];
        $note = $_POST['txtNote'];
        $completion_date = $_POST['txtCompletionDate'];
        $revision = $_POST['txtRevision'];
        $class = $_POST['txtClass'];       
        

        $conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
        $db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
        //*) Set all todonotes in DB to have tag = 0           
        $query = "UPDATE ToDoEntries SET summary = '$summary' , completed = $completed , due = $due , priority = $priority , note = '$note' , completion_date = $completion_date , revision = $revision , class = $class WHERE username LIKE '" . $username . "' AND entryid = $entryid";        
        $result = mysql_query($query) or die("ToDo Note Update Failed");
        mysql_close();

		header("Location: " . APP_WEB_ADDRESS . "/todos.php");
    }
?>