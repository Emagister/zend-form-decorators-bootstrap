<?php
/**
 * Form definition
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * An "horizontal" Twitter Bootstrap's UI form
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Horizontal extends Twitter_Bootstrap_Form
{
    public function __construct($options = null)
    {
        $this->_initializePrefixes();
        
        $this->setDisposition(self::DISPOSITION_HORIZONTAL);

        parent::__construct($options);

    }

    /**
     * Load the default decorators
     *
     * @return Zend_Form
     */
    public function loadDefaultDecorators()
    {
        $elementObjs = $this->getElements();
        /** @var $element Zend_Form_Element */
        foreach ($elementObjs as $element) {
            if ($element->loadDefaultDecoratorsIsDisabled()) {
                continue;
            }

            $element->addDecorators(array(
                array('FieldSize'),
                array('ViewHelper'),
                array('Addon'),
                array('ElementErrors'),
                array('Description', array('tag' => 'p', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'controls')),
                array('Label', array('class' => 'control-label')),
                array('Wrapper')
            ));

            $this->_sortFieldSizeFirst($element);
        }
        
        return parent::loadDefaultDecorators();
    }

    /**
     * We need to sort the fieldsize decorator first or it will be ignored if the viewhelper has already been called
     *
     * @param $element
     */
    protected function _sortFieldSizeFirst($element)
    {
        $decorators = $element->getDecorators();
        $i= 0;
        foreach ($decorators as $decorator) {
            if ($decorator instanceof Twitter_Bootstrap_Form_Decorator_FieldSize) {
                $fieldsize = array_slice($decorators, $i);
                array_unshift($decorators, $fieldsize);
                break;
            }
            $i++;
        }
        $element->setDecorators(array_values($decorators));
    }
}
