<?php

/**
 * Form field definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Element
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Twitter's Bootstrap radio buttons
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Element
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Element_Radio extends Zend_Form_Element_Radio
{
    /**
     * The default separator (Changed to be nothing for bootstrap)
     *
     * @var string
     */
    protected $_separator = '';

    /**
     * Remove all the default decorator for this element
     *
     * @return Twitter_Bootstrap_Form_Element_Radio
     */
    public function loadDefaultDecorators ()
    {
        return $this;
    }
}
