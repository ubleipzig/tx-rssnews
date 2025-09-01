<?php
// all use statements must come first
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die('Access denied.');

(function () {
    ExtensionUtility::configurePlugin(
        'Rssnews',
        'rssnews',
        [
            \Ubl\Rssnews\Controller\RssnewsController::class => 'list'
        ],
        // non cache actions
        [
            \Ubl\Rssnews\Controller\RssnewsController::class => 'list'
        ]
    );
})();




