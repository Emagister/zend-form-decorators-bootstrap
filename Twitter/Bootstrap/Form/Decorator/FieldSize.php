<?php
/**
 * Zend_Form decorator definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */

/**
 * Adds the size of a form element to the class attribute
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */
class Twitter_Bootstrap_Form_Decorator_FieldSize extends Zend_Form_Decorator_Abstract
{
    public function render($content)
    {
        $element = $this->getElement();

        // Only apply this decorator to the Inputs, Selects or Textareas
        if (($element instanceof Zend_Form_Element_Password
            || $element instanceof Zend_Form_Element_Select
            || $element instanceof Zend_Form_Element_Text
            || $element instanceof Zend_Form_Element_Textarea)
            && false !== ($size = $element->getAttrib('size'))
        ) {
            $element->setAttrib('class', $element->getAttrib('class') . ' ' . (((int) $size > 1 && (int) $size < 12) ? 'span' . $size : ''));
        }
    }
}
