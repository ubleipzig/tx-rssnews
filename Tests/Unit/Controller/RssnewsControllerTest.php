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

namespace Ubl\Rssnews\Tests\Unit\Controller;

/**
 * Test case for class RssnewsController
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
class RssnewsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var object $subject
     */
    protected $subject = null;

    /**
     * rssnewsRepository
     *
     * @var \Ubl\Rssnews\Domain\Repository\RssnewsRepository
     */
    protected $rssnewsRepository;

    /**
     * @var ViewInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $view = null;

    public function setUp()
    {
        $this->subject = $this->getMock(
            'Ubl\\Rssnews\\Controller\\RssnewsController',
            ['redirect', 'forward', 'addFlashMessage'],
            [],
            '',
            false
        );
        $this->rssnewsRepository = $this->getMock(
            'Ubl\\Rssnews\\Domain\\Repository\\RsssnewsRepository',
            [],
            [],
            '',
            false
        );
        $this->inject($this->subject, 'rssnewsRepository', $this->rssnewsRepository);
        $this->view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $this->view);
	}

	public function tearDown()
    {
        unset($this->subject);
	}

	/**
	 * @test
	 */
	public function dummyMethod()
    {
		$this->markTestIncomplete();
	}
}