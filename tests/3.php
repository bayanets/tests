<?php
ini_set('display_errors',1);
$protocol = explode('/', $_SERVER['SERVER_PROTOCOL']);
if(isset($_FILES['pic'])){
   	if ($_FILES['pic']['size'] == 0){
   		echo "Please choose not so big images...<hr />";
   		echo "<a href='" . $protocol[0] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "'><button>Reload page</button></a>";
   	} else { 
   		$url = $_FILES['pic']['tmp_name'] . "/" . $_FILES['pic']['name'];
   		echo "<img src='" . $url . "'>";
   	}
} else {
	echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'" . 'enctype="multipart/form-data"' . ">";
	echo "<fieldset><legend>Load images</legend>";
	echo '<input type="file" name="pic" accept="image/*"><br /><br />';
	echo '<input value="Submit" type="submit">';
	}