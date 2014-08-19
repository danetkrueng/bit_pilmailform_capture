<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pil_mailform/pi1/class.tx_pilmailform_pi1.php'] = t3lib_extMgm::extPath('bit_pilmailform_capture') . 'pi1/class.ux_tx_pilmailform_pi1.php';
require_once(t3lib_extmgm::extPath('bit_pilmailform_capture') . 'pi1/class.ux_tx_pilmailform_pi1.php');
?>