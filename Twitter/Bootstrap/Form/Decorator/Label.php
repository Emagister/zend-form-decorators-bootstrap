<?php

/**
 * Description of Label
 *
 * @author David Weinraub <david@papayasoft.com>
 */
class Twitter_Bootstrap_Form_Decorator_Label extends Zend_Form_Decorator_Label
{
    public function render($content)
    {
        $element = $this->getElement();
        if ($element instanceof Zend_Form_Element_Submit){
            return $content;
        } else {
            return parent::render($content);
        }
    }
}
