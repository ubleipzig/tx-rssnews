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

/**
 *
 *
 * @package pits_rssnews
 * @license http://www.gnu.org/licenses/gpl.html GNU
 * General Public License, version 3 or later
 *
 */

class Tx_PitsRssnews_Controller_PitsrssnewsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		// Fetch flexform content
		$array = $this->settings['flexform'];
		$invalidurl = 0;

		// Fetch contents from the external url
		$feedUrl = ( $array['url'] ) ? $array['url'] : $this->settings['feedURL'];
		if ( !empty( $feedUrl ) ) {
			$rss_feed = file_get_contents( $feedUrl );
			if( $rss_feed !== FALSE ){
				$enc = mb_detect_encoding( $rss_feed );
				$data = mb_convert_encoding( $rss_feed, 'UTF-8', $enc );
				
				// Generate simple xml array from the fetched page content
				$xml = new SimpleXmlElement( $data, LIBXML_NOCDATA );
				$xml_new = $this->simplexml2array( $xml );

				// Fetching input datas
				$rssData = array();
				$rssData['feedhead'] = ( $array['feedheader'] ) ? intval( $array['feedheader'] ) : $this->settings['rssfeedHead'];
				$rssData['rss_head'] = $xml_new['channel']['title'];
				$rssData['cnt'] = ( $array['count'] ) ? intval( $array['count']-1 ) : $this->settings['newsCount']-1;
				$rssData['hbar'] = ( $array['contentdiv'] ) ? intval( $array['contentdiv'] ) : $this->settings['newsDivider'];
				$rssData['desc'] = ( $array['crop_desc'] ) ? intval( $array['crop_desc'] ) : $this->settings['cropDesc'];
				$rssData['croptitle'] = ( $array['crop_title'] ) ? intval( $array['crop_title'] ) : $this->settings['cropTitle'];
				$rssData['autoplay'] = ( $array['autoplay'] ) ? $array['autoplay'] : $this->settings['autoplay'];
				$rssData['includeJSlib'] = $this->settings['includeJSlib'];
				$rssData['main_head'] = $xml_new['channel'];
				$rssData['xml_array'] = $xml_new['channel']['item'];
				$rssData['defaultCSS'] = $this->settings['defaultCSS'];
				
				// Assign datas to template view
				$this->view->assign( 'rssData', $rssData );
			}else{
				$invalidurl = 1;
				$locallangURL = Tx_Extbase_Utility_Localization::translate( 'url_contents_notavail', 
																	$this->request->getControllerExtensionName(), $arguments = NULL );
				$this->flashMessageContainer->add( $locallangURL );
				$this->view->assign( 'validurl', $invalidurl );
			}
		} else {
			$invalidurl = 1;
			$locallangURL = Tx_Extbase_Utility_Localization::translate( 'invalid_url', 
																$this->request->getControllerExtensionName(), $arguments = NULL );
			$this->flashMessageContainer->add( $locallangURL );
			$this->view->assign( 'validurl', $invalidurl );
		}
	}
	
   /**
	* Function for parsing XML array
    */		
	public function simplexml2array($xml) {
		if ( $xml instanceof SimpleXMLElement ) {
			$attributes = $xml->attributes();
			foreach($attributes as $k=>$v) {
				if ($v){
					$a[$k] = (string) $v;
				}
			}
			$x = $xml;
			$xml = get_object_vars($xml);
		}
		if (is_array($xml)) {
			if (count($xml) == 0){
				return (string) $x;
			}
			foreach($xml as $key=>$value) {
				$r[$key] = $this->simplexml2array($value);
			}
			if (isset($a)){
				$r['@attributes'] = $a;
			}
			return $r;
		}
		return (string) $xml;
	}
}
?>