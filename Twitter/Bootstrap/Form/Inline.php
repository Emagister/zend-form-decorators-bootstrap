<?php
/**
 * Base form class definition for inline forms
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Base form class for inline forms. The inline form displays the form elements as
 * "inline-blocks", and there is no wrapper for themselves.
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
abstract class Twitter_Bootstrap_Form_Inline extends Twitter_Bootstrap_Form
{
	
	public static $defaultElementDecorators = array(
		array('FieldSize'),
		array('ViewHelper'),
		array('Description', array('tag' => 'p', 'class' => 'help-block')),
		array('Addon')
	);
	
	protected $_disposition = Twitter_Bootstrap_Form::DISPOSITION_INLINE;
	
}

