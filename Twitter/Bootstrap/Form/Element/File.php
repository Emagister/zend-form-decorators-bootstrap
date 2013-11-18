<?php
/**
 * A form file definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Element
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * A form file element
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Element
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Element_File extends Zend_Form_Element_File
{
    /**
     * Adds a file decorator if no one found
     */
    public function loadDefaultDecorators()
    {
        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return $this;
        }

        if (!$this->_existsFileDecorator()) {
            // Add the file decorator to the beginning
            $decorators = array_merge(array('File'), $this->getDecorators());
            $this->setDecorators($decorators);
            $this->removeDecorator('ViewHelper');
        }

        return $this;
    }

    /**
     * Checks if a file decorator has been added to the decorators
     * stack
     */
    protected function _existsFileDecorator()
    {
        foreach ($this->getDecorators() as $decorator) {
            if ($decorator instanceof Zend_Form_Decorator_Marker_File_Interface) {
                return true;
            }
        }

        return false;
    }
}
