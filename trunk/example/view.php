<?php
	// Connect to the database and the table
	require_once("_dbConfig.php");
	
	// Get data from database
	$sql = "SELECT * FROM users";
	$result = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>pdftk-php - List of submitted forms</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="top">
      <h1>pdftk-php Example</h1>
      <p class="navigation"><a href="index.php">Back to main page &raquo;</a></p>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis ligula lorem, consequat eget, tristique nec, auctor quis, purus. Vivamus ut sem. Fusce aliquam nunc vitae purus. Aenean viverra malesuada libero. Fusce ac quam. Donec neque. Nunc venenatis enim nec quam. Cras faucibus, justo vel accumsan aliquam, tellus dui fringilla quam, in condimentum augue lorem non tellus.</p>
  </div>
  <div id="list">
  	<h2>Submitted forms</h2>
        <table>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail Address</th>
            <th>Download PDF</th>
          </tr>
        <?php
		// Start row counter
		$iRow = 0;
		
		// Loop through all the rows in the database
        while ($user = mysql_fetch_array($result)) {
			$iRow++; // Increase counter
			$rowColor = ($iRow % 2) ? "" : "class=\"even\""; // If the row is even, put a CSS class on it
        ?>
          <tr <?php echo $rowColor; // actually put the rowColor class name ?>>
            <td><?php echo $user["firstname"]; ?></td>
            <td><?php echo $user["lastname"]; ?></td>
            <td><?php echo $user["email"]; ?></td>
            <td><a href="download.php?id=<?php echo $user['id']; //Download page in this case uses the primary key of the row to select the data to create the pdf. ?>">Download</a></td>
          </tr>
        <?php
        // Close loop
        }
        ?>
        </table>
  </div>
  <div id="footer">
  	<p>Simple working example of pdftk-php, created by <a href="http://www.andrewheiss.com">Andrew Heiss</a>, September 2008. <br />Licensed under a <a href="http://www.opensource.org/licenses/bsd-license.php">new BSD license</a>.</p>
  	<ul>
    	<li><a href="http://code.google.com/p/pdftk-php/">Project home</a></li>
        <li><a href="http://code.google.com/p/pdftk-php/issues/list">Report an issue</a></li>
        <li><a href="http://groups.google.com/group/pdftk-php">Support</a></li>
    </ul>
  </div>
</div>
</body>
</html>