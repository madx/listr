<?php

 // listr!, directory browser
 // $Id: words.en.php 51 2006-12-10 23:18:32Z madx $
 // Copyright MadX <madx@irrealia.org>
 // Copyright Irrealia Developpement Group
 // Licence: CeCILL (view : http://trac.irrealia.org/trac/Irrealia/licence)
 // http://trac.irrealia.org/trac/wiki/PHP/listr

	$LANG['title'] = 'Index of';
	$LANG['show_src_title'] = 'Viewing source of';
	$LANG['go_parent'] = 'Go to parent directory';
	$LANG['go_return'] = 'Return to the directory';
	$LANG['go_root'] = 'Go to root';
	$LANG['go_wget'] = 'Display absolute links (wget-able)';
	$LANG['go_folder'] = 'Move in the folder';
	$LANG['previous'] = 'Previous';	
	$LANG['root'] = 'Root';
	$LANG['wget'] = 'Wget this !';
	$LANG['wget_info'] = 'Copy/paste those links into a file and do a  <kbd>wget -i &lt;file name&gt;</kbd> to download everything !<br />
You can also make a wget -r !';
    $LANG['wget_mode'] = 'Wget mode';
	
	$LANG['t_type'] = 'Type';
	$LANG['t_name'] = 'Name';
	$LANG['t_size'] = 'Size';
	$LANG['t_lastmod'] = 'Last modification';
	$LANG['t_perms'] = 'Permissions';
	$LANG['t_dl'] = 'Download';
	
	$LANG['op_not_permitted'] = '<h1>Forbidden operation</h1> <p> <a href="./" title="'.$LANG['go_root'].'">'.$LANG['go_return'].'</a></p>';
	
	$LANG['folder'] = 'Folder';
	$LANG['filetype'] = '%e file';
	$LANG['date_format'] = 'm-d-Y at H:i';

	$LANG['server_str'] = '%s server at %h port %p';
	$LANG['unknown_serv'] = 'Unknown';
	$LANG['powered_by'] = 'Powered by';
	$LANG['changelog_view'] = 'view the changelog';
	$LANG['license_view'] = 'View the license';
	$LANG['license'] = 'license';
	
	$LANG['help_title'] = 'listr! help';
	$LANG['help'] = '
        <h1>listr! help</h1>
        <p><a href="#" title="Close window" onclick="window.close(); return false;">Close</a></p>
        <hr />
        <p>
            list<strong>r</strong>! allow you to list folders and to display and/or download the files you can find
            in them !
        </p>
        <h2>Behaviour</h2>
        <p>
            Simply click on a file to display it and on a folder to view its contents.<br />
            When you display images, they can open in a pseudo-window in real-time. You just have to click
            on the CLOSE button in the bottom or press the X key on your keyboard to close it.<br />
            On a similay way, source codes are displayed inside list<strong>r</strong>!, which adds
            syntaxical colorization on the code !<br />
            The action on other files (archives, sound, videos) depends on your browser. Most of the time, it
            asks you if you want to download the file. <br />
            To download images and codes, right click on them and select "Save file as..." or any other
            similar options, according to your browser.
        </p>
        <h2>Keyboard shortcuts</h2>
        <ul>
            <li>ALT-P : go to the parent directory</li>
            <li>ALT-R : return to the root folder </li>
            <li>X : closes preview windows.</li>
        </ul>
        <p> Be aware that on certain browser, the keyboard shortcuts are not made using the ALT key</p>
        <h2>About</h2>
        <p>
            list<strong>r</strong>! is coded and maintained <br />
            MadX &lt;<a href="mailto:root@yapok.org?subject=[listr!-en]" title="Write to MadX">root@yapok.org</a>&gt;<br />
            <strong>Contributors</strong><br />
            webs: lightbox (for the images), skins<br />
            Tito: get.php script <a href="http://irrealia.org/trac/browser/php/titexplorer/get.php" title="Voir le script">http://irrealia.org/trac/browser/php/titexplorer/get.php</a>
            list<strong>r</strong>! is free software !
        </p>
        <p>
            Visit the project page :<br />
            <a href="http://irrealia.org/trac/wiki/PHP/listr" title="Page about listr!">http://irrealia.org/trac/wiki/PHP/listr</a>
        </p>
        <hr />
        <p><a href="#" title="Close window" onclick="window.close(); return false;">Close</a></p>
        ';

?>
