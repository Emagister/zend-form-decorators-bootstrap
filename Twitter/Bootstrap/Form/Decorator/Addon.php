<?php
/**
 * Defines a decorator to render the form field addons
 *
 * @category Form
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Renders an form field with an add on (appended or prepended)
 *
 * @category Form
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @see http://twitter.github.com/bootstrap/base-css.html#forms
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Decorator_Addon extends Zend_Form_Decorator_Abstract
{
    /**
     * @param string $content
     * @return string
     */
    public function render($content)
    {
        $prepend = $this->getElement()->getAttrib('prepend');
        $append = $this->getElement()->getAttrib('append');

        if(
            null === $prepend
            && null === $append
        ) {
            return $content;
        }

        $placement = '';

        // Prepare the prepend
        if (null !== $prepend) {
            $placement .= 'input-prepend ';
            
            // Convert into a Zend_Config object if we recieved an array
            if (is_array($prepend)) {
                $prepend = new Zend_Config($prepend, true);
            }
            
            $prependAddOnClass = 'add-on';
            if ($prepend instanceof Zend_Config) {
                if (isset($prepend->active) && true === $prepend->active) {
                    $prependAddOnClass .= ' active';
                    unset($prepend->active);
                }
            
                $prependedElement = new Zend_Form_Element_Checkbox($prepend);
                $prependedElement->setDecorators(array(array('ViewHelper')));
                $prepend = $prependedElement->render($this->getElement()->getView());
            }
            
            $prepend = '<span class="' . $prependAddOnClass . '">' . $prepend . '</span>';
        }
        
        // Prepare the append
        if (null !== $append) {
            $placement .= 'input-append ';
        
            // Convert into a Zend_Config object if we recieved an array
            if (is_array($append)) {
                $append = new Zend_Config($append, true);
            }
        
            $appendAddOnClass = 'add-on';
            if ($append instanceof Zend_Config) {
                if (isset($append->active) && true === $append->active) {
                    $appendAddOnClass .= ' active';
                    unset($append->active);
                }
        
                $appendedElement = new Zend_Form_Element_Checkbox($append);
                $appendedElement->setDecorators(array(array('ViewHelper')));
                $append = $appendedElement->render($this->getElement()->getView());
            }
            
            $append = '<span class="' . $appendAddOnClass . '">' . $append . '</span>';
        }

        // Unset the prepend and append data
        $this->getElement()->setAttrib('prepend', null);
        $this->getElement()->setAttrib('append', null);

        // Return the rendered input field
        return '<div class="' . $placement . '">
                    ' . ((null !== $prepend) ? $prepend : '') . trim($content) . ((null !== $append) ? $append : '') . '
                </div>';
    }
}
