<?php

/**
 * Plugin Name: GMT Disable MIME Checking
 * Plugin URI: https://github.com/cferdinandi/gmt-disable-mime-checking/
 * GitHub Plugin URI: https://github.com/cferdinandi/gmt-disable-mime-checking/
 * Description: PATCH FIX: Disable MIME checking, which is currently preventing certain previously allowed file types from being uploaded.
 * Version: 1.0.0
 * Author: Chris Ferdinandi
 * Author URI: http://gomakethings.com
 * Text Domain: gmt
 * License: GPLv3
 */


function gmt_disable_real_mime_check($data,$file,$filename,$mimes){
	$wp_filetype		=	wp_check_filetype($filename,$mimes);
	$ext				=	$wp_filetype['ext'];
	$type				=	$wp_filetype['type'];
	$proper_filename	=	$data['proper_filename'];
	return compact('ext','type','proper_filename');
}
add_filter( 'wp_check_filetype_and_ext', 'gmt_disable_real_mime_check', 10, 4 );