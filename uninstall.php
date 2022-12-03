<?php

/**
 * Trigeer this file on Plugin unistal
 * 
 * @package myPlugin 
 */

if (!defined('WP_UNINSTALL_PLUGIN'))
    die;

//Clear Database stored Data
/*
$books = get_post(array('post_type' => 'book', 'numberposts' => -1));

foreach($books as $book)
    wp_delete_post($book->ID, true);
*/

//Acces the  database via SQL
global $wpdb;



$wpdb->query("DELETE FROM {$wpdb->prefix}posts WHERE post_type = 'book'");
$wpdb->query("DELETE FROM {$wpdb->prefix}postmeta WHERE post_id NOT IN(SELECT ID FROM wp_posts)");
$wpdb->query("DELETE FROM {$wpdb->prefix}term-relationship WHERE object_id NOT IN (SELECT id FROM wp_posts)");
