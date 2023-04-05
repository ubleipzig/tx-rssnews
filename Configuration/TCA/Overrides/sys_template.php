<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Register static typoscript.
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'rssnews',
    'Configuration/TypoScript',
    'RSS News Feed'
);