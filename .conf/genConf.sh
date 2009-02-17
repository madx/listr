#! /bin/sh
# listr!, directory browser - make a configuration file!
# $Id: $
# Copyright Jordan 'webs' Bracco <webs@irrealia.org>
# Copyright Irrealia Developpement Group
# Licence: CeCILL (view : http://trac.irrealia.org/trac/Irrealia/licence)
# http://trac.irrealia.org/trac/wiki/PHP/listr

PERM_TYPE="unix"
DEBUG="0"
TYPE="1"
SIZE="1"
LMOD="1"
PERM="1"
LANG="fr"
LIGHTBOX="1"
CAT="1"
WGET="1"
DOWNLOAD="1"
FORCEGET="0"
STYLE="classic"

echo "
         _ _     _        _ 
        | (_)___| |_ _ __| |
        | | / __| __| '__| |
        | | \__ \ |_| |  |_|
        |_|_|___/\__|_|  (_)
  --- listr! - conf generator ---

Welcome to the interactive configuration generator
of listr! :)

"
# INTERACTIVE MODE

cp conf.php backup.conf.php
echo "Make a backup of the configuration file ... done.

"


echo "Now, what is the debug level ?
This can be :
 - E_ALL to display all errors,
 - E_WARNING to display all warnings,
 - 0 to disable the debug mode.
 - View http://php.net/error_reporting for other possibilites.
"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$DEBUG] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$DEBUG
    ok=1
  else
    ok=1
  fi
done
DEBUG=$INPUT
echo " "
echo " "

echo "Do you want to display icons ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$TYPE] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$TYPE
    ok=1
  else
    ok=1
  fi
done
TYPE=$INPUT
echo " "
echo " "

echo "Do you want to display the files sizes ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$SIZE] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$SIZE
    ok=1
  else
    ok=1
  fi
done
SIZE=$INPUT
echo " "
echo " "

echo "Do you want to display the last modification date ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$LMOD] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$LMOD
    ok=1
  else
    ok=1
  fi
done
LMOD=$INPUT
echo " "
echo " "

echo "Do you want to display permissions ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$PERM] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$PERM
    ok=1
  else
    ok=1
  fi
done
PERM=$INPUT
echo " "
echo " "


function TPERM {
echo "How would you like to display the rights ?
 - octal : display numbers, eg. 0644
 - unix : display rwx form, eg. rw-r--r--
 - human : display small icons instead of unix mode's letters
"

 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$PERM_TYPE] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$PERM_TYPE
    ok=1
  else
    ok=1
  fi
done
PERM_TYPE=$INPUT
echo " "
echo " "
}

if [ $PERM = "1" ]
then
TPERM
else
PERM_TYPE="unix"
fi 


echo "What is your language ?
 - fr: Français
 - en: English"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$LANG] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$LANG
    ok=1
  else
    ok=1
  fi
done
LANG=$INPUT
echo " "
echo " "

echo "Do you want to display a lightbox for the images ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$LIGHTBOX] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$LIGHTBOX
    ok=1
  else
    ok=1
  fi
done
LIGHTBOX=$INPUT
echo " "
echo " "

echo "Do you want to display somes files (.c, .php, .txt, .conf, ...) in listr! and highlight it with GeSHI (cat option) ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$CAT] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$CAT
    ok=1
  else
    ok=1
  fi
done
CAT=$INPUT
echo " "
echo " "

echo "Do you want to add the WGET fonction ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$WGET] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$WGET
    ok=1
  else
    ok=1
  fi
done
WGET=$INPUT
echo " "
echo " "

echo "Do you want to add the small Download icon ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$DOWNLOAD] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$DOWNLOAD
    ok=1
  else
    ok=1
  fi
done
DOWNLOAD=$INPUT
echo " "
echo " "

echo "Do you want to add the Forceget fonction ?
 - 1: yes
 - 0: no"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$FORCEGET] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$FORCEGET
    ok=1
  else
    ok=1
  fi
done
FORCEGET=$INPUT
echo " "
echo " "


echo "What style you want ?
 - classic: the default stylesheet
 - dark: the dark version of the default stylesheet
 - or your personnal CSS, in .css"
 ok=0
 while [ $ok -eq 0 ] ; do
    echo -n "[$STYLE] "
    if read INPUT ; then : ; else echo "" ; exit 1 ; fi
    if [ ! "$INPUT" ] ; then
    INPUT=$STYLE
    ok=1
  else
    ok=1
  fi
done
STYLE=$INPUT
echo " "
echo " "

# WRITING OF THE CONFIGURATION

echo "<?php

 // listr!, directory browser - configuration file
 // Copyright MadX <madx@irrealia.org>
 // Copyright Irrealia Developpement Group
 // Licence: CeCILL (view : http://trac.irrealia.org/trac/Irrealia/licence)
 // http://trac.irrealia.org/trac/wiki/PHP/listr
 // File written by the conf Generator
    
    define('VERSION', '0.8');
    
    // This constant defines how rights are displayed
    // octal : display numbers, eg. 0644
    // unix : display rwx form, eg. rw-r--r--
    // human : display small icons instead of unix mode's letters
    define('PERM_TYPE', '$PERM_TYPE');

    // Debug -- Values for error_reporting
    error_reporting($DEBUG);             // values for error_reporting, can be :
                                        // - E_ALL
                                        // - E_WARNING
                                        // - E_NOTICE
                                        // - 0 for disable the debug mode.
                                        // Others possibilites: view http://php.net/error_reporting
    // Change those constants to 0 if you want to disable a feature
    define('STYLE',    '$STYLE');      // what style you want ?
                                        // - classic
                                        // - dark
                                        // or you personal CSS in .css/ 
    define('TYPE',     $TYPE);              // display icons
    define('SIZE',     $SIZE);              // display file size
    define('LMOD',     $LMOD);              // display last modification date
    define('PERM',     $PERM);              // display permissions
    define('LANG',     '$LANG');           // language
    define('LIGHTBOX', $LIGHTBOX);              // use lightbox (or not !)
    define('CAT',      $CAT);              // enable the cat= option and coloration of the files with GeSHI
    define('WGET',     $WGET);              // enables wget-ing of folders
    define('DOWNLOAD', $DOWNLOAD);              // enables the little download icon
    define('FORCEGET', $FORCEGET);              // forces download of every file


?>
" > conf.php.lol

clear

echo "DONE ! 'njoy listr!"
echo "-- The irrealia team."

#EOF
