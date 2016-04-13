<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "pits_rssnews".
 *
 * Auto generated 06-04-2016 11:21
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'RSS News Feed',
	'description' => 'This extension imports rss news items from external rss feeds. This extension builds using extbase and fluid. It does not import anything into the database and it only displays the rss news articles in front end.',
	'category' => 'plugin',
	'version' => '7.0.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Arun Chandran',
	'author_email' => 'arun.c@pitsolutions.com',
	'author_company' => 'PIT Solutions Pvt Ltd.',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.0 - 7.6.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

