<?php

/**
 * Label decorator definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form_Decorator
 * @subpackage Label
 * @author David Weinraub <david@papyasoft.com>
 */

/**
 * Renders the label for an element
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form_Decorator
 * @subpackage Label
 * @author David Weinraub <david@papyasoft.com>
 */
class Twitter_Bootstrap_Form_Decorator_Label extends Zend_Form_Decorator_Label
{
    /**
     * Render the label. Suppress label rendering for submit buttons.
     * 
     * @param string $content 
     * @return string
     */
    public function render($content)
    {
        $element = $this->getElement();
        if ($element instanceof Zend_Form_Element_Submit) {
            return $content;
        } else {
            return parent::render($content);
        }
    }
}
