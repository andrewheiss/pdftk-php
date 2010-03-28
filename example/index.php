<?php
	
	// Main page logic: If the firstname field was submitted, process the form, otherwise show the page.
	
	// This works both if the data is submitted from the browser or from the submittable PDF. Just make sure you set the submit URL in the PDF to this page.
		
	// In real life you'd want to validate the data better - remember, this is only an example
	
	if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
		process_form();
	} else {
		show_form();
	}
	
	
#############################################################################
#
#	Function name: process_form
#
#	Purpose: Insert cleaned user data into the database
#
#	Other called functions: cleanText() - found in _dbConfig.php
#
#############################################################################
	
	function process_form() {
	
		// Connect to database
		require_once("_dbConfig.php");
	
		// Save data from the submitted variables as shorter variables
		$firstname = cleanText($_POST['firstname']);
		$lastname = cleanText($_POST['lastname']);
		
		// Insert all the data from above into the table in the database
		$sql = "INSERT INTO users (firstname, lastname) VALUES ('$firstname', '$lastname')";
		$result = mysql_query($sql);
		
		// If it worked, say so...
		if ($result) {
			$message = "Successfully inserted";
		} else {
			$message = "There was an error";
		}
		
		// If the form was submitted with a PDF, just show a clean confirmation page. Otherwise, show page with message
		if ($_POST['submitted'] == "pdf") {
			echo $message . "! Thanks!";
		} else {
			show_form($message);
		}
	}
	
	
#############################################################################
#
#	Function name: show_form
#
#	Purpose: Display HTML page
#
#	Incoming parameters: 
#		$message - Message to be displayed after some other process is complete
#
#############################################################################
	
	function show_form($message = "") {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>pdftk-php</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="top">
      <h1>pdftk-php Example</h1>
      <p>See <a href="../README.txt">/README.txt</a> for detailed information about how to install this example application.</p>
      <p>This application collects data from users via a web form or through a submittable PDF form. It stores the data in a MySQL database. The data can then be retrieved, forged into an FDF file, and injected in an empty PDF form, creating a custom PDF file on the fly.</p>
  </div>
  <div class="col">
  	<h2>View stored data</h2>
    <p>If you want to see a list of all the submitted data and download the individual PDFs, <a href="view.php">click here</a>.</p>
  </div>
  <div class="col">
  	<h2>Download PDF form</h2>
    <p>If you want to insert data in the database from a PDF, download the <a href="example-submittable.pdf">submittable PDF</a>.</p> 
    <p>Make sure you edit the PDF in Acrobat first and set the submission URL to this page, otherwise the data won't get transmitted correctly.</p>
  </div>
  <div class="form last col">
    <h2>Fill in web form</h2>
    <?php echo !empty($message) ? "<p class=\"message\">$message</p>" : ""; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; //Submit form to this page ?>">
      <p>
        <label for="firstname">First Name: </label>
        <input class="wide" type="text" name="firstname" id="firstname" />
      </p>
      <p>
        <label for="lastname">Last Name: </label>
        <input class="wide" type="text" name="lastname" id="lastname" />
      </p>
      <p>
      	<label></label>
        <input class="button" type="submit" name="submit" value="Submit form" />
      </p>
    </form>
  </div>
  <div id="footer">
  	<p>Simple working example of pdftk-php, created by <a href="http://www.andrewheiss.com">Andrew Heiss</a>, September 2008. <br />Licensed under a <a href="http://www.opensource.org/licenses/bsd-license.php">new BSD license</a>.</p>
  	<ul>
    	<li><a href="http://www.andrewheiss.com/projects/pdftk-php/">Project home</a></li>
        <li><a href="http://github.com/andrewheiss/pdftk-php/issues">Report an issue</a></li>
        <li><a href="http://wiki.github.com/andrewheiss/pdftk-php">Support</a></li>
    </ul>
  </div>
</div>
</body>
</html>
<?php } // end of show_form() ?>