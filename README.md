[![No Maintenance Intended](http://unmaintained.tech/badge.svg)](http://unmaintained.tech/)

```
##################################################################################################################
#
#	Example of pdftk-php Class
#	http://code.google.com/p/pdftk-php/
#	http://www.pdfhacks.com/forge_fdf/
#
#	License: Released under New BSD license - http://www.opensource.org/licenses/bsd-license.php
#
#	Purpose: Show a working example of pdftk-php in action
#
#	Author: Andrew Heiss (www.andrewheiss.com)
#
##################################################################################################################

#############################
# INSTALLATION INSTRUCTIONS	#
#############################

1. Unzip folder on your server.
2. Change the absolute path to pdftk in pdftk-php.php near line 71
	a. If you don't know what it is, type "whereis pdftk" or "which pdftk" at the console.
3. Set up the database.
	a. Run the sql commands found in /example/database.sql to create the basic database structure.
	b. Change the credentials in /example/_dbConfig.php to correspond with the new database.
4. Navigate to the site on your server and start playing with the site.

* If you want to experiment with submitting data from a PDF to the server, open /example/example-submittable.pdf in Acrobat Professional and change the submit URL in the properties of the submit button to /example/index.php on your server.
```
