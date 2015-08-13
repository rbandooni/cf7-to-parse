<?php
/*
Plugin Name: Contact Form 7 to Parse Database
Plugin URI: http://rohitbandooni.com/
Description: 
Author: Rohit Bandooni
Version: 0.1b
Author URI: http://rohitbandooni.com/
*/
/*
  Copyright 2015  mixorg.com 
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
add_action( 'admin_enqueue_scripts', 'safely_add_stylesheet' );
add_action('admin_menu', 'cf7toparse_plugin_settings');
add_action('admin_enqueue_scripts', 'cf7toparse_load_scripts');

/*
* Add Scripts to the page
*
*/

function cf7toparse_load_scripts(){
		if(isset($_GET['page'])=='cf7-to-parse-settings'){
	wp_enqueue_script( 'custom-js', plugins_url( 'js/custom.js' , __FILE__) );
		}
}

/**
     * Add stylesheet to the page
     */
    function safely_add_stylesheet() {

		if(isset($_GET['page'])=='cf7-to-parse-settings'){
			
        wp_enqueue_style( 'prefix-style', plugins_url('css/forms.css', __FILE__) );
		}
    }


function cf7toparse_plugin_settings() {

   // add_menu_page('Contact Form 7 To Parse Database', 'CF7 To Parse', 'administrator', 'cf7-to-parse-settings', 'cf7_to_parse_page');

}

function cf7_to_parse_page()
	{
	?>

<div class="wrap">
	<h1>Contact Form To Parse</h1><hr>

		<h2>
			Fill in your Parse Details
		</h2>
		<small>First you need to create a Parse Application, If not done already, <a href="//parse.com/apps" target="_blank">Click Here</a></small>
<br/><br/><br/>
		<div id="dashboard-widgets">
		
			<div class="postbox-container">
			<form class="form-horizontal" method="post" action="#" id="parseform">
  				<label><div>Class Name</div>
    		<input type="text" placeholder="Enter Your Parse Class Name" tabindex="1" name="parseclass">
  </label>
  <label>
   <div>
	   Application ID
	  </div>
    <input type="text" placeholder="Parse Application ID" tabindex="1" name="appid">
  </label>
  <label>
    <div>
		REST API Key
	  </div>
   <input type="text" placeholder="Parse REST API Key" tabindex="1" name="restid">
  </label>
	<label>
	<div>
		Master Key
		</div>
 <input type="text" placeholder="Parse Master Key" tabindex="1" name="masterid">
	</label>
	<button type="submit" class="button primary">Save</button>
</form>
			</div>
		
		</div>


</div>
	
<script>
jQuery(function(){
	
})
</script>


<?php
}


require 'autoload.php';
use Parse\ParseClient;
 use Parse\ParseObject;
ParseClient::initialize('dWbqkYkJqw950JcbmuJhNYwuzpUsrpnxTfLJON8n', 'AQWvppQ0VOlVvgxB7gk4CV4tf6JGxuYqVmffxtGH', 'sniDpl6UTZsUf504UBWIleAJEsPUQ6SFS0nZHvRe');

add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' ); 
 
function your_wpcf7_mail_sent_function( $contact_form ) {
    $title = $contact_form->title;
    $submission = WPCF7_Submission::get_instance();
  
    if ( $submission ) {
        $posted_data = $submission->get_posted_data();
    }            
/*    if ( 'myTestForm' == $title ) { */
     
        $name = $posted_data['your-name'];
        $email = $posted_data['your-email'];
		$query = $posted_data['your-message'];
 
$testObject = ParseObject::create("cf7_data");
$testObject->set("name", $name);
$testObject->set("email", $email);
	$testObject->set("query", $query);
$testObject->save();

        /* Put your code here to manipulate the data - simples ;) */
/*    } */
}


?>
