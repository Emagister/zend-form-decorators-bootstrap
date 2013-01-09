<?php
/**
 * Form decorator definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Sets the class to its appropiate size (span1, span2, ...)
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Decorator_FieldSize extends Zend_Form_Decorator_Abstract
{
    /**
     * @param  string $content
     * @return mixed
     */
    public function render($content)
    {
        $element = $this->getElement();

        // Only apply this decorator to the Inputs, Selects or Textareas
        if (false !== ($size = $element->getAttrib('dimension'))) {
            $classes = explode(' ', $element->getAttrib('class'));
            if ((int) $size > 0) {
                $classes[] = 'span' . $size;
            }

            $element->setAttrib('class', trim(implode(' ', $classes)));
            $element->setAttrib('dimension', null);
        }

        return $content;
    }
}
