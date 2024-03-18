<?php
defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:rssnews/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_rssnews_domain_model_rssnews',
        'description' => 'description',
        'label' => 'news',
        'label_alt' => '',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'versioningWS' => true,
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'news',
        'iconfile' => 'EXT:rssnews/Resources/Public/Icons/tx_rssnews_domain_model_rssnews.gif',

    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid,
								 l10n_parent,
								 l10n_diffsource,
								 hidden, news',
	],
	'types' => [
		'1' => [
            'showitem' =>
                'sys_language_uid,
                l10n_parent,
                l10n_diffsource,
                hidden,--palette--;;1,
                news,
                --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
                starttime,
                endtime'
        ],
	],
	'palettes' => [
		'1' => ['showitem' => ''],
	],
	'columns' => [
		'sys_language_uid' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => [
				'type' => 'select',
                'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => [
					['LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1],
					['LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0]
				],
			],
		],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
                'renderType' => 'selectSingle',
				'items' => [
					['', 0],
				],
				'foreign_table' => 'tx_rssnews_domain_model_rssnews',
				'foreign_table_where' => 'AND tx_rssnews_domain_model_rssnews.pid=###CURRENT_PID### 
				   						  AND tx_rssnews_domain_model_rssnews.sys_language_uid IN (-1,0)',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
		't3ver_label' => [
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			]
		],
		'hidden' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => [
				'type' => 'check',
			],
		],
		'starttime' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => [
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ],
				'type' => 'input',
				'size' => 13,
                'renderType' => 'inputDateTime',
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => [
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				],
			],
		],
		'endtime' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => [
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ],
				'type' => 'input',
				'size' => 13,
                'renderType' => 'inputDateTime',
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => [
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				],
			],
		],
		'news' => [
			'exclude' => 0,
			'label' => $ll . 'tx_rssnews_domain_model_rssnews.news',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			],
		],
	],
];

