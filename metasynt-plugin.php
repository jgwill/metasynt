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
add_action( 'generate_after_entry_content','mes__generate_after_entry_content' );  

function mes__generate_after_entry_content() { ?> 
    <hr> This is the METASYNT Base plugin initialized and ready for migrating the code in.
    <hr>

<?php }