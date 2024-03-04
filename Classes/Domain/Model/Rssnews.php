<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Arun Chandran <arun.c@pitsolutions.com>, PIT Solutions Pvt Ltd.
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace Ubl\Rssnews\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;

/**
 * Class Rssnews Model
 *
 * @package Rssnews
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 *
 */
class Rssnews extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * news
	 *
     * @var string $news
	 * @Extbase\Validate("NotEmpty")
	 */
	protected $news = '';

	/**
	 * Returns the news
	 *
	 * @return string $news
	 */
	public function getNews()
    {
		return $this->news;
	}

	/**
	 * Sets the news
	 *
	 * @param string $news
	 * @return void
	 */
	public function setNews($news)
    {
		$this->news = $news;
	}

}
