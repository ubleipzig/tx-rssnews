# CHANGELOG

## [2.3.0](https://github.com/ubleipzig/tx-rssnews/tree/2.3.0)
[Changelog](https://github.com/ubleipzig/tx-rssnews/compare/2.2.0...2.3.0)

* adds support for Typo3 v11 and removes it for v9
* adds _Service.yaml_ at Configuration folder 

## [2.2.0](https://github.com/ubleipzig/tx-rssnews/tree/2.2.0)
[Changelog](https://github.com/ubleipzig/tx-rssnews/compare/2.1.4...2.2.0)

* extends support to typo3 version 10
* removes autoplay support due to decision to avoid effort to maintain javascript libraries for the future 
* marked as deprecated method _initializeView_ at _RssnewsController_  
  * contains only calling "content data object" which seems not have any use in the further process of the extension
* adds own _de.locallang_rssnews.xlf_ for German translations of flexform settings
* removes _ext_tables.php_ with uncommented code

## [2.1.4](https://github.com/ubleipzig/tx-rssnews/tree/2.1.4)
[Changelog](https://github.com/ubleipzig/tx-rssnews/compare/2.1.3...2.1.4)

* fixes config variables 
  * subparameter _value_ isn't longer in use; value of config variable is now saved directly at config parameter name 
* deletes support for typo3 version 8

## [2.1.3](https://github.com/ubleipzig/tx-rssnews/tree/2.1.3)
[Changelog](https://github.com/ubleipzig/tx-rssnews/compare/2.1.2...2.1.3)

* fixes minor TCA outdated parameters

## [2.1.2](https://github.com/ubleipzig/tx-rssnews/tree/2.1.2)
[Changelog](https://github.com/ubleipzig/tx-rssnews/compare/2.1.1...2.1.2)

* fixin' deprecated @validate annotation cmp. [83167](https://docs.typo3.org/c/typo3/cms-core/main/en-us/Changelog/9.3/Deprecation-83167-ReplaceValidateWithTYPO3CMSExtbaseAnnotationValidate.html)

## [2.1.1](https://github.com/ubleipzig/tx-rssnews/tree/2.1.1)
[Changelog](https://github.com/ubleipzig/tx-rssnews/compare/2.1.0...2.1.1)

* fixin' dependencies at _composer.json_ and _ext_localconf.php_

## [2.1.0](https://github.com/ubleipzig/tx-rssnews/tree/2.1.0)
[Changelog](https://github.com/ubleipzig/tx-rssnews/compare/2.0.0...2.1.0)

* removes support of typo3 v7
* fixes initializing extension configuration by new class _\TYPO3\CMS\Core\Configuration\ExtensionConfiguration_
* migrate TypoScript definitions to _/Configuration/TCA/Overrides_

## [2.0.0](https://github.com/ubleipzig/tx-rssnews/tree/2.0.0)

* renames extension to **Rssnews** and changes namespace to **Ubl** to continue fork as autonomous extension
* moves loading configuration of ConfigurationUtility to _initializeAction()_ of RssnewsController 
* adds support for typo3 v9

## [1.1.2](https://github.com/ubleipzig/tx-rssnews-deprecated/tree/1.1.2)

* removes sorting parameters due to false column at Configuration/TCA/tx_pitsrssnews_domain_model_pitsrssnews.php

## [1.1.1](https://github.com/ubleipzig/tx-rssnews-deprecated/tree/1.1.1)

* adjusts all deprecated warnings at TCA settings
* adds ext_tables.sql
    * lack of file leads on uncompleted install of table at typo3 v8

## [1.1.0](https://github.com/ubleipzig/tx-rssnews-deprecated/tree/1.1.0)

* removes support for Typo3 v6
* removes support for PHP v5
* transfer of language files to XLIFF  
* adjusts arrays to new PHP typology
* adds translations in German

## [1.0.2](https://github.com/ubleipzig/tx-rssnews-deprecated/tree/1.0.2)

* adds CHANGELOG
* adds composer.json

## 1.0.1

* adjusts displaying error responses of rss feeds
* does not displaing the external blog rss feed container if service is not available

## 1.0.0

* forking original project 'pits_rssnews' at release tag 8.0.0
* adds proxy and timeout settings to extension configuration 
