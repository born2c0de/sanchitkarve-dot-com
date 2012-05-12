<?php session_start(); ?>
<?php
	include("includes/constants.php");
	include("includes/commonFunctions.php");
	
	if(!isset($_SESSION['username']))
		header("Location: " . APP_WEB_ADDRESS . "/login.php");
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
.styleTable {
	border: 1px solid #000000;
    border-style: solid;
    border-width: 1px;
	text-align: center;
}
</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 class="style1">To-Do Items</h2>
	<p>&nbsp;</p>
    <?php  
        $conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
        $db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
        $username = $_SESSION['username'];        

        $query="SELECT * FROM ToDoEntries WHERE username LIKE '" . $username . "'";
        $result = mysql_query($query) or die("Query Failed");
        //echo "Number of Rows : " . mysql_num_rows($result);
        if(mysql_num_rows($result) == 0)
        {
            print "<p>No To-Do Entries Present.</p>";
        }
        else
        {
            // Display Labels on Table
            print "<table class=\"styleTable\">";
            print "<tr>";
            print "<td><b>Summary</b></td>";
            print "<td><b>Completed</b></td>";
            print "<td><b>Due Date</b></td>";
            print "<td><b>Priority</b></td>";
            print "<td><b>Note</b></td>";
            print "<td><b>Completion Date</b></td>";
            print "<td><b>Revision</b></td>";
            print "<td><b>Class</b></td>";
            print "<td><b>Device</b></td>";
            print "<td><b>Ops</b></td>";
            print "</tr>";
            
            while($row = mysql_fetch_array($result))
            {
                //Pass entryid as parameter to a php file (as image href for edit)
                //to edit todo item on another page.
                $entryid = $row['entryid'];
                $summary = $row['summary'];
                $completed = $row['completed'];
                $due = $row['due'];
                $priority = $row['priority'];
                $note = $row['note'];
                $completion_date = $row['completion_date'];
                $revision = $row['revision'];
                $class = $row['class'];                
                $deviceID = $row['deviceID'];
                
                print "<tr>";
                print "<td>$summary</td>";
                print "<td>$completed</td>";
                print "<td>$due</td>";
                print "<td>$priority</td>";
                print "<td>$note</td>";
                print "<td>$completion_date</td>";
                print "<td>$revision</td>";
                print "<td>$class</td>";
                print "<td>$deviceID</td>";
                print "<td>";                
                print "<a href=\"todo_edit.php?entryid=$entryid\"><img alt=\"\" height=\"20\" src=\"images/edit-icon.gif\" width=\"17\" ></a>";
                print "</td>";
                print "</tr>";           
            
                //print "<p>";
                //print "<img alt=\"\" height=\"18\" src=\"images/mobile-icon.gif\" width=\"12\">";
                //print $deviceName . " [" . $deviceID . "] ";
                //if($status === "paired")
                //    print "<a href=\"devices_action.php?deviceID=$deviceID\"><img alt=\"\" height=\"16\" src=\"images/delete_icon.png\" width=\"14\" class=\"style2\"></a>";
                //else
                //    print "<img alt=\"\" height=\"15\" src=\"images/exclamation-icon.gif\" width=\"15\">";
                //        
                //print "</p>";
            }
            print "</table>";
        }        
        mysql_close($conn);    
    ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>