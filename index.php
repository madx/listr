<?php
    
 // listr!, directory browser
 // $Id: index.php 54 2006-12-11 10:50:20Z webs $
 // Copyright MadX <madx@irrealia.org>
 // Copyright Irrealia Developpement Group
 // Licence: CeCILL (view : http://trac.irrealia.org/trac/Irrealia/licence)
 // http://trac.irrealia.org/trac/wiki/PHP/listr

    // Important includes
    require_once('./.conf/associations.php');         // Extension/icon associations
    require_once('./.conf/functions.php');            // Global functions
    
    if(file_exists('./.conf/conf.override.php')) {    
        require_once('./.conf/conf.override.php');    // Configuration override
    } else require_once('./.conf/conf.php');          // Else, standard config
    
    if(file_exists('./.css/'.STYLE.'.php')) {         // Includes the style
        require_once('./.css/'.STYLE.'.php');
    } else require_once('./.css/classic.php');        // Else classic style
    
    $dictionnary = './.lang/words.'.LANG.'.php';      // Includes dictionnary
    require_once($dictionnary);

    
    // Get target path and securize it
    if(!empty($_GET['path'])) {
        $path = $_GET['path'];
        $header = $LANG['title'];
    // If we have a source file to hilght / or just view :)
    } else if (!empty($_GET['cat']) && CAT) {
        $header = $LANG['show_src_title'];
        $path = $_GET['cat'];
    }
    // In other case (Index ?)
    else {
        $path = './';
        $header = $LANG['title'];
    }
    
    if(DOWNLOAD || FORCEGET) {
        require_once('./.conf/get.php');
    }
    
    $path = preg_replace('/\.+\//', './', preg_replace('/^\//', './', $path));
    
    $dpath = preg_replace('/^\.\//', '/', $path);
    
    // --------------------------- END
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title><?php echo $LANG['title'].' '.$dpath; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" title="<?php echo STYLENAME; ?>" href="./.css/<?php echo STYLESHEET; ?>" />
        <?
        // 
        if(LIGHTBOX && empty($_GET['wget'])) {
            echo '
        <script type="text/javascript" src="./.js/prototype.js"></script>
        <script type="text/javascript" src="./.js/scriptaculous.js?load=effects"></script>
        <script type="text/javascript" src="./.js/lightbox.js"></script>';
        }
        ?>

    </head>
    
    <body>
        <?php
        // Brutal security fix :P
        if(preg_match('/\/\.htaccess$|\/\.htpasswd$/', $path)) die ($LANG['op_not_permitted']);
        echo '</body></html>';
        ?>
        <h1><?php echo $header.' <strong>'. $dpath .'</strong>'; ?></h1>
        
        <hr />
        
        <?php
        if(!empty($_GET['wget']) && $_GET['wget'] == 1 && WGET) {
        ?>
        <div id="navBox">
        :: <?php echo $LANG['wget_mode']; ?> ::
        <?php } 
        else { 
        ?>
        <div id="navBox">
        
            <a href="./?path=<?php if(!empty($_GET['cat']) && CAT) { 
                  echo get_file_dir($path); 
                 $prev_text = $LANG['go_parent']; 
                }
                else {
                    echo get_previous($path); 
                }?>" 
                title="<?php echo $prev_text; ?> [ALT-P]"
                accesskey="P">
                <img src="./.icons/go-previous.png" alt="<?php echo $LANG['previous']; ?>" />
            </a>
            
            <a href="./" accesskey="R"
                title="<?php echo $LANG['go_root']; ?> [ALT-R]">
                <img src="./.icons/go-home.png" alt="<?php echo $LANG['root']; ?>" />
            </a>
            <?php }

                if(WGET && (empty($_GET['wget']) || (!empty($_GET['wget']) && $_GET['wget'] != 1)) && empty($_GET['cat'])) {
                    echo '<a href="?path='.$path.'&amp;wget=1" accesskey="D"
                title="'.$LANG['go_wget'].' [ALT-D]">
                <img src="./.icons/go-wget.png" alt="'.$LANG['wget'].'" />
            </a>';
                }
            ?>
            
        </div>            
        <?php
            
            if(!empty($_GET['cat']) && CAT) {
                require_once('.conf/colorizer.php');
            } else if (!empty($_GET['wget']) && $_GET['wget'] == 1 && WGET) {
                echo '<div class="wrapper">
                
            <p> '.$LANG['wget_info'].' </p>
            <p><kbd> ----------------- </kbd></p>
            ';
                $content = glob($path.'*');
                foreach ($content as $id => $fn) {
                    if(!is_save($fn)) {
                        echo '<a href="'.get_abs_addr($path, $fn).'" title="'.get_abs_addr($path, $fn).'">'.get_abs_addr($path, $fn).'</a><br />
            ';
                    }
                }
                echo '
            <p><kbd> ----------------- </kbd></p>
        </div>';
            }
            else {
            
        ?>    
        <table>    
        
            <thead>
                <tr>
                    <? 
                    // Display table headers
                    if(TYPE) echo '<th>'.$LANG['t_type'].'</th>'; 
                    ?>
                    <th class="swapAlign"><?php echo $LANG['t_name']; ?></th>
                    <? 
                    if(SIZE) echo '<th>'.$LANG['t_size'].'</th>'; 
                    ?>
                    <? 
                    if(LMOD) echo '<th>'.$LANG['t_lastmod'].'</th>'; 
                    ?>
                    <? 
                    if(PERM) echo '<th>'.$LANG['t_perms'].'</th>';
                    ?>
                    <? 
                    if(DOWNLOAD) echo '<th>'.$LANG['t_dl'].'</th>'; 
                    // ----------------- END
                    ?>
                </tr>
            </thead>
            
            <tbody>  
              
                <?php
                // If we aren't on the index, show an additional textual
                // "previous directory" link
                if($path != './') {
                    $i = 1;
                    $type = (TYPE) ? '<td><img src="./.icons/icon-folder.png" alt="[DIR]" title="Répertoire" /></td>' : '' ;
                    $size = (SIZE) ? '<td>-</td>' : '' ;
                    $lmod = (LMOD) ? '<td>'.date($LANG['date_format'], filemtime(get_previous($path))).'</td>' : '' ;
                    $perm = (PERM) ? '<td><kbd>'.show_perms(fileperms(get_previous($path))).'</kbd></td>' : '' ;
                    $dl = (DOWNLOAD) ? '<td>-</td>' : '' ;
                    echo '<tr>
                    '.$type.'
                     <td class="swapAlign"><kbd><a href="./?path='.get_previous($path).'" title="'.$LANG['go_parent'].'" tabindex="'.$i.'">../</a></kbd></td>
                    '.$size.'
                    '.$lmod.'
                    '.$perm.'  
                    '.$dl.'              
                </tr>
                ';
                }
                // Getting all files in the target directory
                $content = glob($path.'*');
                
                foreach($content as $id => $url) {
                
                if(empty($i)) $i = 1;
                
                if($url != './index.php') {
                    // If file is a folder :
                    if(is_dir($url)) {
                    
                    $type = (TYPE) ? '<td><img src="./.icons/icon-folder.png" alt="[DIR]" title="'.$LANG['folder'].'" /></td>' : '' ;
                    $size = (SIZE) ? '<td>-</td>' : '' ;
                    $lmod = (LMOD) ? '<td>'.@date('d/m/Y à H:i', @filemtime($url)).'</td>' : '' ;
                    $perm = (PERM) ? '<td><kbd>'.@show_perms(@fileperms($url)).'</kbd></td>' : '' ;
                    $dl = (DOWNLOAD) ? '<td>-</td>' : '' ;
                    
                        echo '<tr>
                    '.$type.'
                    <td class="swapAlign"><kbd><a href="./?path='.$url.'/" title="'.$LANG['go_folder'].'" tabindex="'.$i.'">'.str_replace($path, '', $url).'/</a></kbd></td>
                    '.$size.'
                    '.$lmod.'
                    '.$perm.' 
                    '.$dl.'               
                </tr>
                ';
                    
                    } 
                    
                    // Else, if it isn't a save file (terminating by a ~)
                    else if(!is_save($url)) {
                    
                    $ext = get_ext($url);
                    $imgtype = (array_key_exists($ext, $exts)) ? $exts[$ext] : 'unknown';
                    
                    $type = (TYPE) ? '<td><img src="./.icons/icon-'.$imgtype.'.png" alt="['.strtoupper($ext).']" title="'.ucfirst(str_replace('%e', $ext, $LANG['filetype'])).'" /></td>' : '';
                    $size = (SIZE) ? '<td class="rightAlign">'.humansize($url).'</td>' : '';
                    $lmod = (LMOD) ? '<td>'.date('d/m/Y à H:i', filemtime($url)).'</td>' : '';
                    $perm = (PERM) ? '<td><kbd>'.show_perms(fileperms($url)).'</kbd></td>' : '';
                    $dl = (DOWNLOAD) ? '<td>
                        <a href="?get='.$url.'" title="'.$LANG['t_dl'].'">
                            <img src="./.icons/go-wget.png" alt="'.$LANG['t_dl'].'" />
                        </a>
                    </td>' : '' ;

                    // Lightbox or not lightbox.
                    // TODO: Resizer les images trop grosses
                    if($imgtype == "image" && LIGHTBOX) {
                        $lightbox = "rel=\"lightbox\"";
                    } else {
                        $lightbox = "";
                    }
                    
                    // Text previewer
                    if($imgtype == "script" && CAT && !FORCEGET) {
                        $name = $url;
                        $url = '?cat='.$url;
                    } else {
                        $name = $url;
                    }
                    if(FORCEGET) {
                        $url = '?get='.$url;
                    }

                   echo '<tr>
                    '.$type.'
                    <td class="swapAlign"><kbd><a href="'.$url.'" '.$lightbox.' title="'. str_replace($path, '', $name) .'" tabindex="'.$i.'">'.str_replace($path, '', $name).'</a></kbd></td> 
                    '.$size.'
                    '.$lmod.'
                    '.$perm.'
                    '.$dl.'
                </tr>
                ';

                    }
                }
                // Tabindex counter incrementation
                $i++;
            }
                
            ?>
            
            </tbody>
        
        </table>
        
        <?php
            }
        ?>
        
        <hr />

     
        <?php
        if(!empty($_GET['wget']) && $_GET['wget'] == 1 && WGET) {
        ?>
        <p id="footerBox">
            <span><?php echo serv_format($LANG['server_str']) ?></span><br />
            <?php echo $LANG['powered_by']; ?> list<strong>r</strong>!</a> <?php echo VERSION; ?> -- wget mode
        </p>
        <?php 
        } 
        else {
            if (CAT) {
               $changelog_url = "./?cat=./.conf/CHANGELOG";
               $license_url = "./?cat=./.conf/LICENSE";
            } else {
               $changelog_url = "./.conf/CHANGELOG";
               $license_url = "./.conf/LICENSE";
            }
 ?>        
        <p id="footerBox">
            <span><?php echo serv_format($LANG['server_str']) ?></span><br />
            <?php echo $LANG['powered_by']; ?> <a href="http://trac.irrealia.org/trac/wiki/PHP/listr" title="<?php echo $LANG['listr_goto']; ?>">list<strong>r</strong>!</a> <?php echo VERSION; ?>
            (<a href="<?php echo $changelog_url; ?>" title="<?php echo $LANG['changelog_view']; ?>">changelog</a> - 
            <a href="<?php echo $license_url; ?>" title="<?php echo $LANG['license_view']; ?>"><?php echo $LANG['license']; ?></a>)
            <a id="helpr" href="#" title="Voir l'aide" 
            onclick="window.open('.conf/popup.php', 'listrHelp', 'status=1,toolbar=0,location=0,height=550,width=300,scrollbars=1');return false;">?</a>
        </p>
        <?php 
        } 
        ?>
        
    </body>
    
</html>
