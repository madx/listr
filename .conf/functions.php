<?php

 // listr!, directory browser
 // $Id: functions.php 33 2006-12-08 01:31:49Z madx $
 // Copyright MadX <madx@irrealia.org>
 // Copyright Irrealia Developpement Group
 // Licence: CeCILL (view : http://trac.irrealia.org/trac/Irrealia/licence)
 // http://trac.irrealia.org/trac/wiki/PHP/listr

	function sanitize($s) {
		return str_replace('./', '', $s);
	}
	
	function get_ext($f) {
		return substr($f, strrpos($f, '.')+1, strlen($f)-strrpos($f, '.'));
 	}
	
	function is_save($f) {
		if(preg_match('/~$/', $f)) return true;
		else return false;
	}
	
	function humansize($f) {
	
		$size = filesize($f);
		$units = array ('o', 'ko', 'Mo', 'Go', 'To');
		$k = 0;
		
		while($size > 1024) {
			$size = $size / 1024;
			$k++;
		}
		if($k > 1) {
			return round($size, 1).' '.$units[$k];
		} else {
			return round($size).' '.$units[$k];
		}
	}

	function get_previous($h) {
		return preg_replace('/(.+\/)[^\/]+\//', '$1', $h);
	}
	
	function get_file_dir($h) {
		return substr($h, 0, strrpos($h, '/')+1);
	}
	
	function get_abs_addr($path, $fn) {
	    return 'http://'.$_SERVER['HTTP_HOST'].preg_replace('/index\.php$/', ''.preg_replace('/^\.\//', '', $path), $_SERVER['PHP_SELF']).basename($fn);
	}
	
	function show_perms($dec) {
		switch (PERM_TYPE) {
			case 'octal':
				return substr(sprintf('%o', $dec), -4);
			break;
			
			case 'unix':
				$str = preg_replace('/([0-9])/', '$1:', substr(sprintf('%o', $dec), -3));
				$digits = explode(':', $str);
				return oct2nix($digits[0]).oct2nix($digits[1]).oct2nix($digits[2]);
			break;
			
			case 'human':	
				$str = preg_replace('/([0-9])/', '$1:', substr(sprintf('%o', $dec), -3));
				$digits = explode(':', $str);
				return oct2usr($digits[0]).'|'.oct2usr($digits[1]).'|'.oct2usr($digits[2]);
			break;
			
			default:
				return substr(sprintf('%o', $dec), -4);
			break;
		}
	}
	
	function oct2nix($bit) {
	
		$out = '';
	
		// read
		if(($bit - 4) >= 0)
			$out .= 'r';
		else $out .= '-';
		
		// write
		if($bit >= 4 && ($bit -2 ) >= 4)
			$out .= 'w';
		else if ($bit < 4 && ($bit -2 ) >= 0 )
			$out .= 'w';
		else $out .= '-';
		
		// execute
		if(($bit % 2) != 0)
			$out .= 'x';
		else $out .= '-';
	
		return $out;
	
	}
	
	function oct2usr($bit) {
		$out = '';
	
		// read
		if(($bit - 4) >= 0)
			$out .= '<img src="./.icons/rights-read.png" alt="Lecture, " title="Lecture" />';
		else $out .= '<img src="./.icons/rights-no-read.png" alt="Lecture interdite, " title="Lecture interdite" />';
		
		// write
		if($bit >= 4 && ($bit -2 ) >= 4)
			$out .= '<img src="./.icons/rights-write.png" alt="Écriture, " title="Écriture" />';
		else if ($bit < 4 && ($bit -2 ) >= 0 )
			$out .= '<img src="./.icons/rights-write.png" alt="Écriture, " title="Écriture" />';
		else $out .= '<img src="./.icons/rights-no-write.png" alt="Écriture interdite" title="Écriture interdite" />';
		
		// execute
		if(($bit % 2) != 0)
			$out .= '<img src="./.icons/rights-execute.png" alt="Exécution" title="Exécution" />';
		else $out .= '<img src="./.icons/rights-no-execute.png" alt="Exécution interdite" title="Exécution interdite" />';
	
		return $out;
	}
	
	function serv_format($str) {
		$serv = $_SERVER['SERVER_SOFTWARE'];
	
		if(preg_match('/apache/i', $serv))
			$shown_serv = 'Apache';
		else if(preg_match('/lighttpd/i', $serv))
			$shown_serv = 'Lighttpd';
		else
			$shown_serv = $LANG['unknown_serv'];
			
	return str_replace('%s', $shown_serv,
		     str_replace('%h', $_SERVER['SERVER_NAME'],
			   str_replace('%p', $_SERVER['SERVER_PORT'], $str)));
	}
	
?>
