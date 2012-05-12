<?php
    if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['deviceID']) || !isset($_POST['todo']))
    {
        print "Error";
    }
    else
    {
        include("includes/constants.php");
        include("includes/commonFunctions.php");
        // Phone is right - Conflict Resolution
        $username = $_POST['username'];
        $password = $_POST['password'];
        $deviceID = $_POST['deviceID'];
        $todoData = $_POST['todo'];
        //*) Set all todonotes to have tag = 0
        //1) Split string into individual todo note strings
        //2) Split individual todo notes into individual fields.
        //3) Find Entry in DB.
        //4) If it doesn't exist, add todo note to DB.
        //5) If it exists, update fields from phone to DB. (UPDATE ... SET xyz = WHERE ...)
        //6) Whenever added or modified, set tag=1
        //7) After operations done on all todonotes, search db for all notes where tag = 0
        //8) Delete all notes on server with tag = 0.
        // Note Format:          summary|note|class|priority|completion_date|due|revision|completed#NextRecord#NextRecord
        // Index of $todoItem ->   0    | 1  |   2 |   3    |       4       | 5 |   6    |    7    #


        $conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
        $db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
        //*) Set all todonotes in DB to have tag = 0           
        $query = "UPDATE ToDoEntries SET tag = 0 WHERE username LIKE '" . $username . "'";        
        $result = mysql_query($query) or die("ToDoTag Update Failed");
        //echo "Number of Rows : " . mysql_num_rows($result);      
        //mysql_close($conn);       
        
        //1) Split String into individual todo notes
        $todoNotes = explode("#",$todoData);
        //2) Split indiv. todo notes into indiv fields
        for($i=0; $i < count($todoNotes) ; $i++)
        {
            $todoItem = explode("|",$todoNotes[$i]);
            //3) Find entry in DB.
            $query = "SELECT * FROM ToDoEntries WHERE username LIKE '$username' AND summary LIKE '" . $todoItem[0] . "'";
            $result = mysql_query($query) or die("ToDoNote duplicate detection fail");
            $numRows = mysql_num_rows($result);
            //4) If it doesnt exist, add todo note to db. 6) tag = 1
            
            //if fields empty, set them to zero
            /*
            for($x=2;$x<=7;$x++)
            {
            	if(is_null($todoItem[$x]))
            		$todoItem[$x]=0;
            }*/
            
            if($numRows == 0)
            {
                //$query = "INSERT INTO ToDoEntries (entryid,username, deviceID, summary, note, class, priority, completion_date, due, revision, completed, tag) VALUES ('" . getUniqueCode(20) . "', '$username', '$deviceID', '$todoItem[0]', '$todoItem[1]', $todoItem[2], $todoItem[3], $todoItem[4], $todoItem[5], $todoItem[6], $todoItem[7], 1)";
                $query = "INSERT INTO ToDoEntries (username, deviceID, summary, note, class, priority, completion_date, due, revision, completed, tag) VALUES ('$username', '$deviceID', '$todoItem[0]', '$todoItem[1]', $todoItem[2], $todoItem[3], $todoItem[4], $todoItem[5], $todoItem[6], $todoItem[7], 1)";
                $result = mysql_query($query) or die("ToDoNote Insert fail. Error : " . mysql_error());
            }
            //5) If it does exist, update stuff from phone to server. 6) tag = 1
            if($numRows == 1)
            {
                $query = "UPDATE ToDoEntries SET note = '$todoItem[1]', class = $todoItem[2], priority = $todoItem[3], completion_date = $todoItem[4], due = $todoItem[5], revision = $todoItem[6], completed = $todoItem[7], tag = 1, deviceID = '$deviceID' WHERE username LIKE '$username' AND summary LIKE '$todoItem[0]'";
                $result = mysql_query($query) or die("ToDoNote update fail");
            }
            if($numRows > 1)
            {
                print "";
                // Handle wtf duplication situation here.
            }
            // 7) and 8) Delete all notes where tag = 0
            $query = "DELETE FROM ToDoEntries WHERE username LIKE '$username' AND tag = 0";
            $result = mysql_query($query) or die("ToDoNote delete fail");
        }
        print "Success";
    }
?>