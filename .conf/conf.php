<?php

 // listr!, directory browser - configuration file
 // $Id: conf.php 15 2006-11-30 00:24:36Z webs $
 // Copyright MadX <madx@irrealia.org>
 // Copyright Irrealia Developpement Group
 // Licence: CeCILL (view : http://trac.irrealia.org/trac/Irrealia/licence)
 // http://trac.irrealia.org/trac/wiki/PHP/listr
    
    define('VERSION', '0.8');
    
    // This constant defines how rights are displayed
    // octal : display numbers, eg. 0644
    // unix : display rwx form, eg. rw-r--r--
    // human : display small icons instead of unix mode's letters
    define('PERM_TYPE', 'unix');

    // Debug -- Values for error_reporting
    error_reporting(0);             // values for error_reporting, can be :
                                        // - E_ALL
                                        // - E_WARNING
                                        // - E_NOTICE
                                        // - 0 for disable the debug mode.
                                        // Others possibilites: view http://php.net/error_reporting
    
    // Change those constants to 0 if you want to disable a feature
    define('STYLE',    'classic');      // what style you want ?
                                        // - classic
                                        // - dark
                                        // or you personal CSS in .css/ 
    define('TYPE',     1);              // display icons
    define('SIZE',     1);              // display file size
    define('LMOD',     1);              // display last modification date
    define('PERM',     1);              // display permissions
    define('LANG',     'fr');           // language
    define('LIGHTBOX', 1);              // use lightbox (or not !)
    define('CAT',      1);              // enable the cat= option and coloration of the files with GeSHI
    define('WGET',     1);              // enables wget-ing of folders
    define('DOWNLOAD', 1);              // enables the little download icon
    define('FORCEGET', 0);              // forces download of every file
    
    // Please be aware that if you enable FORCEGET, LIGHTBOX and CAT options will be USELESS
        
?>
