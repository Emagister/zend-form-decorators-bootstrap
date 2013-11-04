<?php

/**
 * A form button submit definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Element
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * A form submit button
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Element
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Element_UneditableTextfield extends Zend_Form_Element_Text
{
    /**
     * Use formButton view helper by default
     *
     * @var string
     */
    public $helper = 'formUneditableTextfield';
}
