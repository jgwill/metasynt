<?php
/**
 * MetaSynt
 *
 * Plugin Name: MetaSynt
 * Plugin URI:  http://guillaumeisabelle.com/r/metasynt/plugin
 * Description: MetaSynthesis display
 * Version:     0.0.2
 * Author:      Guillaume D.-Isabelle
 * Author URI:  http://guillaumeisabelle.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: metasynt
 */
 /*
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */
//generate_after_entry_content
//generate_after_content

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


require_once (__DIR__ . '/metasynt.func.php');

add_action( 'generate_after_content','mes__mainview' );  
//@a add this before the title generate_before_content
//add_action( ('generate_before_content'), 'mes__headerview' );

function mes__mainview() { 
    $dbg = get_option( 'dbg' );
    
    //-----------------------------------------
    //WP Get Options
    
    $metasyntfields = get_option( ('metasyntfields'));
    $metasynt_title = get_option( 'metasynt_title');
    $metasynticonhtml = get_option( 'metasynticonhtml' );
    
    $noaccesshtml = get_option( 'noaccesshtml' );
    //------------------------------------
    
    ?> 
    <!-- MetaSynt HTML MainView Segment starting -->
  <hr>
<a name="metasynt">&nbsp; </a>


<?php global $current_user;
      get_currentuserinfo();

      
      if ($dbg >0 ) print_r($metasyntfields );
      
      
//$debug = true;  ;
// All that just if logged in
if ($current_user->ID != 0 ) {
    if ($debug) echo '<h6>----------:) YOU ARE AUTHORIZED TO ACCESS META-SYSTEMIC DATA -----------</h6>';

    ms__display_content();
}
else 
{
    ms__display_content();
    //HERE STUFF TO NOT LOGGED USER
    //
   // echo $noaccesshtml;
    //echo '<hr><h6>---- :( SORRY META-SYSTEMIC DATA IS NOT PUBLIC ----</h6><hr>';
}
?>

<?php }

function ms__display_content()
{    
    echo '<div 
    class="wp-block-atomic-blocks-ab-notice ab-font-size-18 ab-block-notice metasynt-block" >
    <div class="ab-notice-title metasynt-title">
    '.$metasynticonhtml.'
    <p>'.$metasynt_title .'</p>
    </div>
';
    try {
	    if ( sizeof($metasyntfields) != 0 ) {
    foreach ($metasyntfields as $f )
    { 
            mes__field_as_markdown_if($f);

    }
	    }
       }

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
} 
    echo '</div>';
    //-------
    //-----------------------------------------
}

function mes__headerview() { ?> 
    <hr> This is the METASYNT HeaderView plugin initialized and ready for migrating the code in.
    <hr>

<?php 
mes__field_as_markdown_if("questions","","<hr>");

}
//---------------------------------------------------------------------------------
//@STCGoal Feature displaying the Excerpt of the post - Simplify writting an abstract at one place
add_action('excerpt_edit_pre','ms__inform__editing_excerpt'); //display to editor
add_action('generate_after_entry_header','mes__b4content');

function mes__b4content()
{   
    echo "<hr>";
    echo "<style>
    .ms-excerpt-table{ max-width:755px;}
    </style>";
    echo '<table class="ms-excerpt-table"><tr class="ms-excerpt-tr"><td class="ms-excerpt-td">';
    echo "<!-- Except insert Start -->
    ".the_excerpt()."
    <!-- Except insert Ends --> ";//Display the Excerpt
    echo "</td></tr></table>";
    echo "<hr>";
}
function ms__inform__editing_excerpt()
{
    echo "<hr>You can hook in a plugin using :<b>excerpt_edit_pre</b> <hr>";
}


/* mes__field_as_markdown_if("questions","","<hr>"); */
