<?php

########################################################################
# Extension Manager/Repository config file for ext: "bit_pilmailform_capture"
#
# Auto generated 26-04-2008 12:56
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'b.it pilmailform with capture',
	'description' => 'Extends tmail with sr_freecap',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.0.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'alpha',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Niels Behrendt',
	'author_email' => 'info@make-it-typo3.de',
	'author_company' => 'b.it Dienstleistungen [www.bit-dienstleistungen.de]',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'sr_freecap' => '',
			'pil_mailform' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:5:{s:23:"exampl_template_de.html";s:4:"c637";s:12:"ext_icon.gif";s:4:"1ac9";s:17:"ext_localconf.php";s:4:"9761";s:14:"doc/manual.sxw";s:4:"e9ae";s:35:"pi1/class.ux_tx_pilmailform_pi1.php";s:4:"3345";}',
);

?>