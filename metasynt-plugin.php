<?php
/**
 * MetaSynt
 *
 * Plugin Name: MetaSynt
 * Plugin URI:  http://guillaumeisabelle.com/r/metasynt/plugin
 * Description: MetaSynthesis display
 * Version:     0.0.1
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


require_once (__DIR__ . '/metasynt.func.php');

add_action( 'generate_after_content','mes__mainview' );  
//@a add this before the title generate_before_content
//add_action( ('generate_before_content'), 'mes__headerview' );

function mes__mainview() { ?> 
    <hr> This is the METASYNT MainView plugin initialized and ready for migrating the code in.
    <hr>
    <hr>
<a name="metasynt">&nbsp; </a>


<?php global $current_user;
      get_currentuserinfo();

      $my_text = get_field("questions") ;
echo $my_text . '<hr>';

//-----------------------------------------
//WP Get Options

$metasyntfields = get_option( ('metasyntfields'));
$metasynt_title = get_option( 'metasynt_title');
$metasynticonhtml = get_option( 'metasynticonhtml' );

$noaccesshtml = get_option( 'noaccesshtml' );
//-----------------------------------------

//print_r($metasyntfields );
//echo '<hr>';

//$debug = true;  ;
// All that just if logged in
if ($current_user->ID != 0 ) {
    if ($debug) echo '<h6>----------:) YOU ARE AUTHORIZED TO ACCESS META-SYSTEMIC DATA -----------</h6>';
echo '<div 
class="wp-block-atomic-blocks-ab-notice ab-font-size-18 ab-block-notice metasynt-block" >
<div class="ab-notice-title metasynt-title">
'.$metasynticonhtml.'
<p>'.$metasynt_title .'</p>
</div>
';
    foreach ($metasyntfields as $f )
    { 
        mes__field_as_markdown_if($f);

    }

echo '</div>';
//----------------------- End model to PRINT OUT CONCEPT Field -----------------------------------------
//-------------------------------------------------------------------------------------------------------
}
else 
{
    //HERE STUFF TO NOT LOGGED USER
    //
    echo $noaccesshtml;
    //echo '<hr><h6>---- :( SORRY META-SYSTEMIC DATA IS NOT PUBLIC ----</h6><hr>';
}
?>

<?php }


function mes__headerview() { ?> 
    <hr> This is the METASYNT HeaderView plugin initialized and ready for migrating the code in.
    <hr>

<?php 
mes__field_as_markdown_if("questions","","<hr>");
}
/* mes__field_as_markdown_if("questions","","<hr>"); */
