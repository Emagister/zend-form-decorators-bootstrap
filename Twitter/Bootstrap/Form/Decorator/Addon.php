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
    const GROUP_CLASS = 'input-group';
    const ADDON_CLASS = 'input-group-addon';

    /**
     *
     * @param string $content
     * @return string
     */
    public function render ($content)
    {
        $prepend = $this->getElement()->getAttrib('prepend');
        $append = $this->getElement()->getAttrib('append');

        if (null === $prepend && null === $append) {
            return $content;
        }

        // Prepare the prepend
        if (null !== $prepend) {
            $this->_prepareAddon($prepend);
        }

        // Prepare the append
        if (null !== $append) {
            $this->_prepareAddon($append);
        }

        // Unset the prepend and append data
        $this->getElement()->setAttrib('prepend', null);
        $this->getElement()->setAttrib('append', null);

        // Return the rendered input field
        return '<div class="' . self::GROUP_CLASS . '">' .
                 ((null !== $prepend) ? $prepend : '') . trim($content) .
                 ((null !== $append) ? $append : '') . '</div>';
    }

    /**
     * Prepares and renders the item to be appended or prepended
     *
     * @param mixed $addon
     */
    protected function _prepareAddon (&$addon)
    {
        $addonClass = self::ADDON_CLASS;

        // Convert into a Zend_Config object if we recieved an array
        if (is_array($addon)) {
            $addon = new Zend_Config($addon, true);
        }

        if ($addon instanceof Zend_Config) {
            if (isset($addon->active) && true === $addon->active) {
                $addonClass .= ' active';
                unset($addon->active);
            }

            $addonElement = new Zend_Form_Element_Checkbox($addon);
            $addon = $this->_renderElement($addonElement);
        }

        // Check to see if we recieved a button
        if ($addon instanceof Zend_Form_Element_Submit) {
            $addon = $this->_renderElement($addon);
        } else {
            $addon = '<span class="' . $addonClass . '">' . $addon . '</span>';
        }
    }

    /**
     * Renders an element with only the view helper decorator
     *
     * @param Zend_Form_Element $element
     * @return string
     */
    protected function _renderElement (Zend_Form_Element $element)
    {
        $element->setDecorators(array('ViewHelper'));
        return trim($element->render($this->getElement()->getView()));
    }
}
