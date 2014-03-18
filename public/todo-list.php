<?php
require_once('todo_mysql.php');
require_once('filestore.php');


?>
<!DOCTYPE>
<html>
	<head>
		<title>TODO List</title>
        
                <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        
        <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        
        <!-- Latest compiled and minified JavaScript -->
        <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
        <!-- <link rel="stylesheet" href="/css/todo_css_ext.css"> !-->
	</head>
	<body>
        <? if (!empty($successMessage)): ?>
        <div class="alert alert-success"><?= $successMessage; ?></div>
        <? endif; ?>
        <? if (!empty($errorMessage)): ?>
            <div class="alert alert-danger"><?= $errorMessage; ?></div>
        <? endif; ?>
        
        <div class=container>
		  <h1 id="main" class="header">TODO List</h1>
		  <h2 class="header">LIST of Tasks</h2>
		  	<ul class="list-group">
                <? foreach ($rows as $row) { ?>
                        <div class="panel panel-success">    
                            <li class="list-group-item">
                                <?=$row['item']?>
                                <a href="?remove=<?= $row['id']; ?>">Delete</a>
                            </li>
                        </div>
                <? } ?>
                </ul>
            </div>
        <div class="well">    
		    <h3 class="header">Add Tasks to list</h3>
		        <form class="form-inline"method="POST" enctype="multipart/form-data" action="todo-list.php">
	             	<div class="form-group" > 
                          <p>
	                     	<input type="text" id="TASK" name="TASK" autofocus= "autofocus"	value="">
	             	   
	                     	<button type="submit">ADD</button>
	             	    </p>	
                      </div>
		        </form>
            <h3 id="three" class="header">Upload File</h3>
                <form method="POST" enctype="multipart/form-data" action="todo-list.php">
                    <p>
                        <label for="upload_file">File to add to list</label>
                        <input type="file" id="upload_file" name="upload_file">
                    </p>
                    <p>
                        <input type="submit" value="Upload">
                    </p>
                </form>
        </div>        
        <div>
            <?if($page > 1): ?>
                <? $page_no = $page - 1; ?>
                <a href = "?page=<?=$page_no?>">Previous</a>
            <?endif;?>
            <?if($page < $num_pages): ?>
               <? $page_no = $page +1; ?>
                <a href = "?page=<?=$page_no?>">Next</a>
            <?endif;?>
        </div>
	</body>
    
</html>