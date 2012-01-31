<?php
/**
 * Form decorator definition
 *
 * @category Forms
 * @package Emagister_Form_Decorator_Twitter
 * @subpackage Bootstrap
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Defines a decorator to set if the form should be stacked or not
 *
 * @category Forms
 * @package Emagister_Form_Decorator_Twitter
 * @subpackage Bootstrap
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Emagister_Twitter_Bootstrap_Form_Decorator_Stacked extends Zend_Form_Decorator_Abstract
{
    /**
     * Renders a form checking if it should be stacked or not
     *
     * @param $content
     *
     * @return string
     */
    public function render($content)
    {
        if ($this->getElement()->getIsStacked()) {
            $class = $this->getElement()->getAttrib('class');
            $this->getElement()->setAttrib('class', $class . ' form-stacked');
        }

        return $content;
    }
}
