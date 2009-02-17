<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 
    if(file_exists('./conf.override.php')) {	
        require_once('./conf.override.php');	// Configuration override
    } else require_once('./conf.php');		// Else, standard config
	    
    $dictionnary = '../.lang/words.'.LANG.'.php';
    require_once($dictionnary);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            body {
            	color: #555;
            	font: normal 1em sans-serif;
            }
            h1 {
	            color: #aaa;
            }
            h2 {
                color: #ccc;
            }
            a, a:visited {
            	color: #002299;
            	text-decoration: none;
            }

            a:active, a:hover, a:focus {
            	color: #0022ff;
            	background-color: white;
            	text-decoration: underline;
            }
        </style>
        <title><?php echo $LANG['help_title']; ?></title>
    </head>
	
    <body>
	    <?php
	    echo $LANG['help'];
	    ?>
	    
    </body>
	
</html>
