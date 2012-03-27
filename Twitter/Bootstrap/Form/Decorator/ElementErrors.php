<?php
/**
 * Defines a decorator to handle form field errors
 *
 * @category Form
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * A decorator to render the form element errors
 *
 * @category Form
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Decorator_ElementErrors extends Zend_Form_Decorator_Abstract
{
    /**
     * @param string $content
     * @return string
     */
    public function render($content)
    {
        if (!$this->getElement()->hasErrors()) {
            return $content;
        }

        $errors = implode('. ', $this->getElement()->getMessages());

        return $content . '<span class="help-inline">' . $errors . '</span>';
    }
}