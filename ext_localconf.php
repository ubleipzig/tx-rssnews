<?php
defined('TYPO3_MODE') || die('Access denied.');

(function () {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Ubl.Rssnews',
        'Rssnews',
        [
            'Rssnews' => 'list',

        ],

        /**
         * non-cacheable actions
         */
        [
            'Rssnews' => 'list',

        ]
    );

})();


