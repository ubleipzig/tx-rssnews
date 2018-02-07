<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Pits.' .$_EXTKEY,
	'Pitsrssnews',
	array(
		'Pitsrssnews' => 'list',
		
	),

/**
 * non-cacheable actions
 */	
	array(
		'Pitsrssnews' => 'list',
		
	)
);

?>
