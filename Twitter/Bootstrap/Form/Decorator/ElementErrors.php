<?php
/**
 * Zend_Form decorator definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */

/**
 * Renders a single element error
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */
class Twitter_Bootstrap_Form_Decorator_ElementErrors extends Zend_Form_Decorator_Abstract
{
    public function render($content)
    {
        if (!$this->getElement()->hasErrors()) {
            return $content;
        }

        $errors = implode('. ', $this->getElement()->getMessages());

        return $content . '<span class="help-inline">' . $errors . '</span>';
    }
}
