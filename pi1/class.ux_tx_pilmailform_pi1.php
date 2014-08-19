<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2008 Niels Behrendt (info@make-it-typo3.de)
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
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Creates a pilmailform with CAPTCHA prevention.

 *
 * @author	Niels Behrendt <info@make-it-typo3.de>
 */


if (!defined('PATH_tslib')) {
        if (@is_dir(PATH_site.'typo3/sysext/cms/tslib/')) {
                define('PATH_tslib', PATH_site.'typo3/sysext/cms/tslib/');
        } elseif (@is_dir(PATH_site.'tslib/')) {
                define('PATH_tslib', PATH_site.'tslib/');
        }
}


require_once(t3lib_extmgm::extPath('pil_mailform') . 'pi1/class.tx_pilmailform_pi1.php');
/**
 * Creates a pilmailform with CAPTCHA prevention form based on an HTML template.
 *
 * @author	Niels Behrendt <info@make-it-typo3.de>
 * @package TYPO3
 * @subpackage ux_tx_pilmailform
 */
class ux_tx_pilmailform_pi1 extends tx_pilmailform_pi1 {
	
	/**
	 * init function.
	 *
	 */
	function init()	{
		$x=parent::init();
		$this->missingCap=false;
		if (t3lib_extMgm::isLoaded('sr_freecap') ) {
			require_once(t3lib_extMgm::extPath('sr_freecap').'pi2/class.tx_srfreecap_pi2.php');
			$this->freeCap = t3lib_div::makeInstance('tx_srfreecap_pi2');
			}
		return ($x);
	}


	/**
	 * [load_static_markers]
	 *
	 * @param	array		$markers 
	 * @return	array		$markers with capture
	 */
	
	function load_static_markers(&$markers)	{
		parent::load_static_markers($markers);
		if ($this->missingCap || !isset($this->piVars['submit'])){
		
		if (is_object($this->freeCap)) {
			$markers = array_merge($markers, $this->freeCap->makeCaptcha());
		} else {
			$markers['###CAPTCHA_INSERT###'] = '';
			}
		}

		
	}
	
	/**
	 * [sendmail]
	 *
	 * if all checks by pilmail are correct, sendmail will be started - now its time to validate the capture
	 */
	
	function sendmail(){
		#validate
			if (is_object($this->freeCap) && !$this->freeCap->checkWord($this->piVars['captcha_response'])) {
				$this->errForm=1;
				$this->missingCap=true;
				$content = $this->get_mailform();
				
				}
			else{
				$content=parent::sendmail();
				}
			return($content);;
		}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bit_pilmailform_capture/pi1/class.ux_tx_pilmailform_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bit_pilmailform_capture/pi1/class.ux_tx_pilmailform_pi1.php']);
}

?>
