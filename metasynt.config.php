<?php
$dbg = 1;
function dbgw($msg) { if ($dbg> 0) { echo '<hr>' . $msg . '<hr>'; } }

$metasyntid = '1077'; //A group is a post

add_option( 'metasynt_title',"Meta Synthesis Content" , false, true );


$metasynticon = '/ico/structural-24.png';
$metasynturlinfo = 'http://guillaumeisabelle.com/r/metasynt/info' ; //@STCGoal Send not-logged in to that page for more info when ready...

$noaccessmsg = 'To access MetaSyst data, you must be logged in.';


//made from Variable HTML Content
$metasynticonhtml = '<img src="'.$metasynticon.'">';
add_option( 'metasynticonhtml',$metasynticonhtml, false, true );

$noaccesshtml = '<hr>'.$metasynticonhtml.'&nbsp;&nbsp;'.$noaccessmsg.'<hr>';
add_option( 'noaccesshtml ',$noaccesshtml  , false, true );

//--------------------------- Custom Fields that are extracted --------------------
//-------------------------------and displayed in the MetaSynt section  -----------
//@DEFINITION MetaSynt.Array - Also order them on the page
$metasyntfields = array("context","issues","concepts","questions","hypothesis","methodology","results","research_use","contributions","references","goal","dtdue","current_reality","mmotacceptable","mmotanalyze","mmotplan","mmotfeedback","notes");

add_option('metasyntfields', $metasyntfields, false, true);

add_option( 'metasynt_field_html_tag', 'h1', false, true );
add_option( 'style_bg_col', 'b20486', false, true );
