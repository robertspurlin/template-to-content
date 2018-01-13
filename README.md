# Template To Content
A script that places the contents of page templates in WordPress to the content box, and changes the page template to "Default".

Made for WordPress theme developers that prefer to code in their page templates for custom websites, and always seem to forget to paste the code into the WordPress dashboard and change the page template to "default". 
_Note: this is usually best practice for custom made websites for ease of changing the HTML post launch._

This script copies the content of the page templates and places it in the "page" in the WordPress dashboard while changing the page template of the page to "Default". 

# How To Use
1. Change the database variables at the top of the file. 
2. Change the directory of the `$templates` variable to the directory of the page templates in question (leave the /*.php at the end). 
3. Run the script. For Mac users, the easiest way to run the script is to open up Terminal/iTerm, go into the directory where the script is stored, and run `php script.php`. 

# Notes
I am not responsible for any damages that this script may cause to your Database/WordPress site. Please use at your own risk! This script is directly editing the contents of the WordPress Database. 

This script will NOT filter out the php calls in your page templates. If there is more php than the standard `<?php get_header(); ?>` and `<?php get_footer(); ?>`, this script will most likely fail. Again, USE AT YOUR OWN RISK!

Plans for the future:

1. Filter the content of the page templates to remove all php scripts (example: `<?php get_header(); ?>`)
2. Prompt user for the variables needed in the program at start
3. Make into WordPress plugin 
