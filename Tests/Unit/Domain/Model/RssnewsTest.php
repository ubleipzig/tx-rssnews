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
 *  the Free Software Foundation; either version 2 of the License, or
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

namespace Ubl\Rssnews\Tests\Unit\Domain\Model;

use Ubl\Rssnews\Domain\Model\Rssnews;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case for class Rssnews Mode
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage RSS News Feed
 *
 * @author Arun Chandran <arun.c@pitsolutions.com>
 * @author Frank Morgner <morgnerf@ub.uni-leipzig.de>
 */
class RssnewsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var Rssnews
     */
    protected $subject = null;

    public function setUp()
    {
        $this->subject = new Rssnews();
    }

    public function tearDown()
    {
        unset($this->subject);
    }

	/**
	 * @test
	 */
	public function getNewsInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getNews()
        );
    }

	/**
	 * @test
	 */
	public function setNewsForStringSetsNews()
    {
		$this->subject->setNews('Conceived at T3CON10');

		self::assertSame(
			'Conceived at T3CON10',
			$this->subject->getNews()
		);
	}
	
}
