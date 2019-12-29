<?php

add_option( 'metasynt_title',"Meta Synthesis Content" , false, true );
$metasyntfields = array("context","issues","concepts","questions","hypothesis","methodology","results","research_use","limitations","contributions","references","goal","dtdue","current_reality","mmotacceptable","mmotanalyze","mmotplan","mmotfeedback","notes");
$metasynturlinfo = 'http://guillaumeisabelle.com/r/metasynt/info' ; //@STCGoal Send not-logged in to that page for more info when ready...
$metasynticon = '/ico/structural-24.png';
$noaccessmsg = 'To access MetaSyst data, you must be logged in.';

//debug
$dbg = 0;



//made from Variable HTML Content
$metasynticonhtml = '<img src="'.$metasynticon.'">';

$noaccesshtml = '<hr>'.$metasynticonhtml.'&nbsp;&nbsp;'.$noaccessmsg.'<hr>';

//----------------------------------------

//--------------------------------------
//Adding options to WP Config

add_option( 'metasynt_field_html_tag', 'h1', false, true );
add_option( 'style_bg_col', 'b20486', false, true );

add_option( 'metasynticonhtml',$metasynticonhtml, false, true );
add_option( 'noaccesshtml ',$noaccesshtml  , false, true );
add_option('metasyntfields', $metasyntfields, false, true);


add_option( 'dbg', $dbg, false,true );




function dbgw($msg) { if ($dbg> 0) { echo '<hr>' . $msg . '<hr>'; } }
$metasyntid = '1077'; //A group is a post
