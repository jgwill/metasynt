<?php
/** Function to output MetaSynt Content that are related to a post
 * By : GUillaume D.-Isabelle, 2019
 */
//metasynt.config.php
require_once (__DIR__ . '/metasynt.config.php');
require_once (__DIR__ . '/php-markdown/Michelf/MarkdownExtra.inc.php');

use Michelf\Markdown;




//echo __DIR__ . '/metasynt.config.php';

/* Read field data and convert markdown to HTML
* */
function mes__field_as_markdown_if($field_name,$prehtml="",$posthtml="")
{
    
$style_bg_col = get_option( 'style_bg_col');

$metasynt_field_html_tag = get_option( 'metasynt_field_html_tag');

	dbgw("entering mes__field_as_markdown_if: " . $field_name );

try {
 	dbgw("Getting field: " . $field_name ); 
        if( get_field($field_name)) :

                //the whole section of Synt is printed if content
                echo '<div class="ab-notice-text metasynt-content-box">';

	$my_text = get_field($field_name) ; //get text content of the field
	dbgw("Got field data: " . $my_text );
	dbgw("Getting field object: " . $field_name);
	$fieldo = get_field_object($field_name);
	dbgw("Got field object:" . $field_name);

		dbgw("Converting to markdown...");
                $my_html = Markdown::defaultTransform($my_text); //convert text content from Markdown to HTML
                //$my_html = '<hr>' . $my_text; //convert text content from Markdown to HTML
		dbgw("Markdown created : " . $my_html); //@STCIssue This is where we do not pass thru 

                        echo '<!-- jgwill:metasynt -->
                                <!-- jgwill:metasynt:content
                                        '.$my_text .'
                                /jgwill:metasynt:content
                        /jgwill:metasynt
			-->';
dbgw("Getting Instructions and labels...");
                        $instructions = $fieldo['instructions'];
                        $label = $fieldo['label'];
                        //Titel with tooltip TODO
dbgw("Got label and instruction: " . $label . "<br>" . $instructions );
                echo ""
                        .'<div class="tooltip"><h1>'
                        //      .ucfirst(str_replace("_"," ",$field_name))
                        .$label
                        .'</h1>'
                        .'<span class="tooltiptext">'. $instructions.'</span>'
                        .'</div>'
                        . "";
                        echo $prehtml;

                        echo $my_html;

                        echo $posthtml;
                        //echo "<hr>" . $fieldo['instructions'] . "</div>";

                echo '</div>';
                endif;

} catch (Exception $e) {
    echo '<hr>ERROR<hr>Caught exception: ',  $e->getMessage(), "\n<hr>";
}

}




