# tx-rssnews

RssNews is a Typo3 extension importing items of external RSS feeds for displaying at t3 frontend. Forked extension of Pits_Rssnews which will not be longer maintained. Rssnews has been continued with an own UBL namespace since version 2.0.0.

## Requirements
* Typo3 > 7.0 < 9.5.99
* PHP >= 7.2

There haven't been tests with higher versions of typo3 but the codebase should be sufficient.

## Installation
### Using Composer
The recommended way to install the extension is by using (Composer)[1]. In your Composer based TYPO3 project root, just do `composer require ubl/booking-api`.

### As extension from TYPO3 Extension Repository (TER)
Download and install the extension with the extension manager module.

## Usage
This extension provides a plugin which has to be assign to the designated page.

[1]: https://getcomposer.org/