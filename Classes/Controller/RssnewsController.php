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

namespace Ubl\Rssnews\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility as Localization;


/**
 * RssnewsController
 *
 * @package rssnews
 * @license http://www.gnu.org/licenses/gpl.html GNU
 * General Public License, version 3 or later
 */
class RssnewsController extends ActionController
{
    /**
     * @var context
     */
    private $context;

    /**
     * Initializes the controller before invoking an action method.
     *
     * Override this method to solve tasks which all actions have in
     * common.
     *
     */
    public function initializeAction()
    {
        /**
         * @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager
         * @var \TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility $configurationUtility
         */
        $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $configurationUtility = $objectManager->get('TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility');
        $config = $configurationUtility->getCurrentConfiguration('rssnews');
        $this->setContext($config);
    }

    /**
     * Initializes the view before invoking an action method.
     * Add content object data to view.
     *
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view The view to be initialized
     */
    protected function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view)
    {
        $view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
        parent::initializeView($view);
    }

    /**
     * Set context for connection via proxy
     *
     * @param null $config
     *
     * @return void
     * @access private
     */
    private function setContext($config = null)
    {
        $options = [];
        if ($config['proxy_host']) {
            $options['http']['proxy'] = $config['proxy_host']['value'];
            $options['http']['request_fulluri'] = true;
        }

        if ($config['connection_timeout']) {
            $options['http']['timeout'] = $config['connection_timeout']['value'];
        }

        $this->context = \stream_context_create($options);
    }

    /**
     * Get context of proxy connection
     *
     * @return \stream_context_create $context
     * @access private
     */
    private function getContext()
    {
        if (!$this->context) $this->setContext();

        return $this->context;
    }

    /**
     * List action.
     *
     * @return void
     * @access public
     */
    public function listAction()
    {
        // Fetch flexform content
        $array = $this->settings['flexform'];
        $invalidurl = 0;

        // Fetch contents from the external url
        $feedUrl = ($array['url']) ? $array['url'] : $this->settings['feedURL'];
        if (!empty($feedUrl)) {
            try {
                $rss_feed = file_get_contents($feedUrl, false, $this->getContext());

                if ($rss_feed) {
                    $enc = mb_detect_encoding($rss_feed);
                    $data = mb_convert_encoding($rss_feed, 'UTF-8', $enc);

                    // Generate simple xml array from the fetched page content
                    $xml = new \SimpleXmlElement($data, LIBXML_NOCDATA);
                    $xml_new = $this->simplexml2array($xml);

                    // Fetching input datas
                    $rssData = [];
                    $rssData['feedhead'] = ($array['feedheader']) ? intval($array['feedheader']) : $this->settings['rssfeedHead'];
                    $rssData['rss_head'] = $xml_new['channel']['title'];
                    $rssData['cnt'] = ($array['count']) ? intval($array['count'] - 1) : $this->settings['newsCount'] - 1;
                    $rssData['hbar'] = ($array['contentdiv']) ? intval($array['contentdiv']) : $this->settings['newsDivider'];
                    $rssData['desc'] = ($array['crop_desc']) ? intval($array['crop_desc']) : $this->settings['cropDesc'];
                    $rssData['croptitle'] = ($array['crop_title']) ? intval($array['crop_title']) : $this->settings['cropTitle'];
                    $rssData['autoplay'] = ($array['autoplay']) ? $array['autoplay'] : $this->settings['autoplay'];
                    $rssData['includeJSlib'] = $this->settings['includeJSlib'];
                    $rssData['main_head'] = $xml_new['channel'];
                    $rssData['xml_array'] = $xml_new['channel']['item'];
                    $rssData['defaultCSS'] = $this->settings['defaultCSS'];

                    // Assign datas to template view
                    $this->view->assign('rssData', $rssData);
                } else {
                    $invalidurl = 1;
                    $locallangURL = Localization::translate('url_contents_notavail', $this->request->getControllerExtensionName(), $arguments = null);

                    $this->addFlashMessage($locallangURL);
                    $this->view->assign('validurl', $invalidurl);
                }
            } catch (Exception $e) {
                $invalidurl = 1;

                $locallangURL = Localization::translate('url_contents_notavail', $this->request->getControllerExtensionName(), $arguments = null);

                $this->addFlashMessage($locallangURL);
                $this->view->assign('validurl', $invalidurl);
            }
        } else {
            $invalidurl = 1;
            $locallangURL = Localization::translate('invalid_url', $this->request->getControllerExtensionName(), $arguments = null);
            $this->addFlashMessage($locallangURL);
            $this->view->assign('validurl', $invalidurl);
        }
    }

    /**
     * Function for parsing XML array.
     *
     * @param string $xml
     *
     * @return mixed
     * @access public
     */
    public function simplexml2array($xml)
    {
        if ($xml instanceof \SimpleXMLElement) {
            $attributes = $xml->attributes();
            foreach ($attributes as $k => $v) {
                if ($v) {
                    $a[$k] = (string) $v;
                }
            }
            $x = $xml;
            $xml = get_object_vars($xml);
        }
        if (is_array($xml)) {
            if (count($xml) == 0) {
                return (string) $x;
            }
            foreach ($xml as $key => $value) {
                $r[$key] = $this->simplexml2array($value);
            }
            if (isset($a)) {
                $r['@attributes'] = $a;
            }
            return $r;
        }
        return (string) $xml;
    }
}
