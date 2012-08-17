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
 * Sets the class for proper validation based on JQuery Validators
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Leandro Sales <leandroasp@gmail.com>
 */
class Twitter_Bootstrap_Form_Decorator_JQueryValidators extends Zend_Form_Decorator_Abstract
{
    /**
     * @param string $content
     * @return mixed
     */
    public function render($content)
    {
        $element = $this->getElement();

        // Only apply this decorator to the Inputs, Selects or Textareas
        if (false !== ($jvalidators = $element->getAttrib('jvalidators'))) {
            $classes = explode(' ', $element->getAttrib('class'));
            if (!is_array($jvalidators)) {
                $jvalidators = explode(' ', $jvalidators);
            }
            $classes = array_unique(array_merge($classes,$jvalidators));

            $element->setAttrib('class', implode(' ', $classes));
            $element->setAttrib('jvalidators', null);
        }

        return $content;
    }
}
