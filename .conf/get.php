<?php
####################################################################
## TITEXPLORER #####################################################
####################################################################
## Développé par Christophe De Wolf                               ##
## Développé sous nano et Linux                                   ##
## Contact: tito@webtito.be                                       ##
##                                                                ##
## Logiciel sous license GNU/GPL                                  ##
## http://www.gnu.org/licenses/gpl.txt                            ##
####################################################################
 	
if(!empty($_GET['get'])) {
    $f = $_GET['get'];
    
    $f = preg_replace('/\.+\//', './', preg_replace('/^\//', './', $f));
    if(preg_match('/\/\.htaccess$|\/\.htpasswd$/', $f)) die ('<html><head><link rel="stylesheet" type="text/css" media="screen" title="'. STYLENAME.'" href="./.css/'. STYLESHEET.'" /><title></title><body>'.$LANG['op_not_permitted']);
    $f = dirname(__FILE__).$f;
    header("Content-disposition: attachment; filename=".basename($f));
    header("Content-Type: application/force-download");
    //      header("Content-Transfer-Encoding: application/octet-stream\n");
    header("Content-Length: ".filesize($f));
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
    header("Expires: 0");
    readfile($f);
}
?>
