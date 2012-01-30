<?php
/**
 * Zend_Form decorator definition
 * 
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */

/**
 * A decorator to render the form submission buttons
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */
class Twitter_Bootstrap_Form_Decorator_Actions extends Zend_Form_Decorator_Abstract
{
    /**
     * Build the internal buttons
     *
     * @return string
     */
    public function buildButtons()
    {
        $output = '';
        foreach ($this->getElement() as $element) {
            $element->setDecorators(array(
                array('ViewHelper')
            ));

            $output .= $element->render();
        }

        return $output;
    }

    /**
     * Renders the actions div
     *
     * @param $content
     * @return string
     */
    public function render($content)
    {
        return '<div class="actions">
                    ' . $this->buildButtons() . '
                </div>';
    }
}