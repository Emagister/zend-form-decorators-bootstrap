<?php
/**
 * Form definition
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Base class for default form style
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
abstract class Twitter_Bootstrap_Form_Vertical extends Twitter_Bootstrap_Form
{
	/**
	 * Initialize form
	 *
	 * @return void
	 */
	public function init()
	{
		$this->setElementDecorators(array(
		    array('FieldSize'),
		    array('ViewHelper'),
		    array('ElementErrors'),
		    array('Description', array('tag' => 'p', 'class' => 'help-block')),
		    array('Addon')
		));

		$this->setDisableLoadDefaultDecorators(true);
		$this->setDecorators(array(
		    'FormElements',
		    'Form'
		));
	}
}
