<?php
/**
 * Plugin Name: De Praktijk Index
 * Plugin URI: http://www.depraktijkindex.nl
 * Description: Plugin for De Praktijk Index, Bilthoven.
 * Version: 0.3.1
 * Author: Leon Hooijer
 * Author URI: http://www.leonhooijer.nl
 * License: GPL2
 */
 /*  Copyright 2013  Leon Hooijer  (email : leonhooijer@hotmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Add sortable Last Modified column */
function last_modified_sort($columns) {
		$columns['column-modified'] = 'modified';
		return $columns;
}

add_filter("manage_edit-home_slider_sortable_columns", 'last_modified_sort');
add_filter("manage_edit-portfolio_sortable_columns", 'last_modified_sort');
add_filter("manage_edit-nectar_slider_sortable_columns", 'last_modified_sort');

$args = array(
   'public'   => true,
);
$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'
$post_types = get_post_types( $args, $output, $operator ); 
foreach ( $post_types as $post_type ) {
   add_filter("manage_edit-".$post_type."_sortable_columns", 'last_modified_sort');
}
/* End Of: Add sortable Last Modified column */

/* Extend Bogo types */
$salient_post_types = array('portfolio', 'home_slider', 'nectar_slider' );
add_filter('bogo_localizable_post_types', $salient_post_types, 10, 1);
/* End Of: Extend Bogo types */