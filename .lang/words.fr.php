<?php

 // listr!, directory browser
 // $Id: words.fr.php 51 2006-12-10 23:18:32Z madx $
 // Copyright MadX <madx@irrealia.org>
 // Copyright Irrealia Developpement Group
 // Licence: CeCILL (view : http://trac.irrealia.org/trac/Irrealia/licence)
 // http://trac.irrealia.org/trac/wiki/PHP/listr

	$LANG['title'] = 'Index de';
	$LANG['show_src_title'] = 'Source de';
	$LANG['go_parent'] = 'Aller au répertoire parent';
	$LANG['go_return'] = 'Retourner au répertoire';
	$LANG['go_root'] = 'Aller à la racine';
	$LANG['go_wget'] = 'Afficher les liens absolus (pour wget)';
	$LANG['go_folder'] = 'Aller au répertoire';
	$LANG['previous'] = 'Précédent';	
	$LANG['root'] = 'Racine';
	$LANG['wget'] = 'Wget ça !';
	$LANG['wget_info'] = 'Copiez-collez les liens ci-dessous dans un fichier et faites un <kbd>wget -i &lt;nom du fichier&gt;</kbd> pour tout t&eacute;l&eacute;charger d\'un coup !<br />
Vous pouvez aussi faire wget -r sur l\'adresse de ce document.';
    $LANG['wget_mode'] = 'Mode wget';
	
	$LANG['t_type'] = 'Type';
	$LANG['t_name'] = 'Nom';
	$LANG['t_size'] = 'Taille';
	$LANG['t_lastmod'] = 'Dernière modification';
	$LANG['t_perms'] = 'Permissions';
	$LANG['t_dl'] = 'Télécharger';
	
	$LANG['op_not_permitted'] = '<h1>Opération interdite</h1> <p> <a href="./" title="'.$LANG['go_root'].'">'.$LANG['go_return'].'</a></p>';	
	
	$LANG['folder'] = 'Répertoire';
	$LANG['filetype'] = 'Fichier %e';
	$LANG['date_format'] = 'd/m/Y à H:i';

	$LANG['server_str'] = 'Serveur %s sur %h port %p';
	$LANG['unknown_serv'] = 'inconnu';
	$LANG['powered_by'] = 'Propulsé par';
	$LANG['changelog_view'] = 'Voir le changelog';
	$LANG['license_view'] = 'Voir la licence';
	$LANG['license'] = 'licence';

    $LANG['help_title'] = 'Aide de listr!';
    
    $LANG['help'] = '
        <h1>Aide de listr!</h1>
        <p><a href="#" title="Fermer la fenêtre" onclick="window.close(); return false;">Fermer</a></p>
        <hr />
        <p>
            list<strong>r</strong>! permet de lister le contenu des répertoires et d\'afficher et/ou
            télécharger les fichiers que vous y trouvez !
        </p>
        <h2>Comportement</h2>
        <p>
            Cliquez simplement sur un fichier pour l\'afficher et sur un répertoire pour afficher son contenu.<br />
            Lorsque vous affichez des images, elles peuvent s\'ouvrir en temps réel dans une pseudo fenêtre, il vous suffit
            de cliquer sur le bouton CLOSE en bas ou d\'appuyer sur la touche X de votre clavier pour la fermer.<br />
            De façon analogue, les codes sources s\'affichent directement dans list<strong>r</strong>!, qui 
            rajoute en plus la coloration syntaxique de votre code !<br />
            L\'action sur d\'autres fichiers (archives, son, vidéo) dépend de votre navigateur. Le plus souvent
            il vous propose de télécharger le fichier. <br />
            Pour télécharger images et codes, faites un clic droit dessus puis "Enregistrer la cible du lien sous..." ou
            une option équivalente, selon votre navigateur.
        </p>
        <h2>Raccourcis clavier</h2>
        <ul>
            <li>ALT-P : retour au répertoire parent</li>
            <li>ALT-R : retour à la racine </li>
            <li>X : ferme les fenêtres de prévisualisation.</li>
        </ul>
        <p> Notez que sur certains navigateur la touche des raccouris clavier n\'est pas ALT </p>
        <h2>A propos</h2>
        <p>
            list<strong>r</strong>! est codé et maintenu par <br />
            MadX &lt;<a href="mailto:root@yapok.org?subject=[listr!]" title="Ecrire à MadX">root@yapok.org</a>&gt;<br />
            <strong>Contributeurs</strong><br />
            webs: implémentation de la LightBox pour les images<br />
            Tito: script get.php <a href="http://irrealia.org/trac/browser/php/titexplorer/get.php" title="Voir le script">http://irrealia.org/trac/browser/php/titexplorer/get.php</a><br />
            list<strong>r</strong>! est un logiciel libre !
        </p>
        <p>
            Visitez la page dédiée au projet :<br />
            <a href="http://irrealia.org/trac/wiki/PHP/listr" title="Page sur listr!">http://irrealia.org/trac/wiki/PHP/listr</a>
        </p>
        <hr />
        <p><a href="#" title="Fermer la fenêtre" onclick="window.close(); return false;">Fermer</a></p>
        ';
?>
