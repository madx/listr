<?php
 // listr!, directory browser
 // Copyright MadX <madx@irrealia.org>
 // Copyright Irrealia Developpement Group
 // Licence: CeCILL (view : http://trac.irrealia.org/trac/Irrealia/licence)
 // http://trac.irrealia.org/trac/wiki/PHP/listr
 
    require_once('./.conf/geshi/geshi.php');
    
    $path = $_GET['cat'];
    
    $ext = get_ext($path);
    $source = @file_get_contents($path);
    
    $geshi =& new GeSHi($source, $ext);
    $geshi->set_header_type(GESHI_HEADER_PRE);
    $geshi->enable_strict_mode(false);
    $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
    $geshi->set_line_style('background:'.MY_GESHI_BACKGROUND);
    
    echo '<div class="wrapper">'.$geshi->parse_code().'</div>';
    
?>
