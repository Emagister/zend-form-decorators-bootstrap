<?php
/**
 * Zend_Form decorator definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */

/**
 * Renders the prepended text box to the form element field.
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */
class Twitter_Bootstrap_Form_Decorator_PrependedText extends Zend_Form_Decorator_Abstract
{
    public function render($content)
    {
        $prependedText = $this->getElement()->getAttrib('prependedText');

        return '<div class="input-prepended">
                    <span class="add-on">' . $prependedText . '</span>
                    ' . $content . '
                </div>';
    }
}
