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

        $placement = 'prepend';
        $addOn = $prepend;
        if (null !== $append) {
            $placement = 'append';
            $addOn = $append;
        }

        if (is_array($addOn)) {
            $addOn = new Zend_Config($addOn, true);
        }

        $addOnClass = 'add-on';
        if ($addOn instanceof Zend_Config) {
            if (isset($addOn->active) && true === $addOn->active) {
                $addOnClass .= ' active';
                unset($addOn->active);
            }

            $prependedElement = new Zend_Form_Element_Checkbox($addOn);
            $prependedElement->setDecorators(array(array('ViewHelper')));
            $addOn = $prependedElement->render($this->getElement()->getView());
        }

        $this->getElement()->setAttrib('prepend', null);
        $this->getElement()->setAttrib('append', null);
        $span = '<span class="' . $addOnClass . '">' . $addOn . '</span>';

        return '<div class="input-' . $placement . '">
                    ' . (('prepend' == $placement) ? $span : '') . trim($content) . (('append' == $placement) ? $span : '') . '
                </div>';
    }
}
