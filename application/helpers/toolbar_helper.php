<?php

/**
 * Helper pour la gestion des menus toolbar des démo sous form d'object
 */
function toolbar($menu) {
	
		foreach($menu as $item) {
			$tmp = new stdClass();
			$tmp->title = $item['title'];
			$tmp->src = $item['src'];
			$toolBar[] = $tmp;	
		}
		
		return $toolBar;
		
}