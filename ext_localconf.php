<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function() {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Ubl.' . $_EXTKEY,
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
    }
);



