<?php
/**
 * Zend_Form decorator definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 */

/**
 * An abstract form to render Twitter's Bootstrap UI forms
 *
 * @category Forms
 * @package Twitter
 * @subpackage Bootstrap
 */
abstract class Emagister_Twitter_Bootstrap_Form extends Zend_Form
{
    /**
     * Whether the form is stacked or not (false by default)
     *
     * @var bool
     */
    private $_isStacked = false;

    public function __construct($options = null)
    {
        $this->getView()->addHelperPath(
            APPLICATION_PATH . '/../library/Twitter/Bootstrap/View/Helper',
            'Twitter_Bootstrap_View_Helper'
        );

        $this->addElementPrefixPath(
            'Twitter_Bootstrap_Form_Decorator',
            APPLICATION_PATH . '/../library/Twitter/Bootstrap/Form/Decorator',
            'decorator'
        );

        $this->addDisplayGroupPrefixPath(
            'Twitter_Bootstrap_Form_Decorator',
            APPLICATION_PATH . '/../library/Twitter/Bootstrap/Form/Decorator'
        );

        $this->setDefaultDisplayGroupClass('Twitter_Bootstrap_Form_DisplayGroup');

        $this->setElementDecorators(array(
            array('FieldSize'),
            array('ViewHelper'),
            array('ElementErrors'),
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            array('Addon'),
            array('HtmlTag', array('tag' => 'div', 'class' => 'input')),
            array('Label'),
            array('Wrapper')
        ));

        $this->setDecorators(array(
            'FormElements',
            'Stacked',
            'Form'
        ));

        // Check if the form is a stacked form
        if (isset($options['isStacked']) && true === $options['isStacked']) {
            $this->setIsStacked(true);
        }

        parent::__construct($options);
    }

    /**
     * @param boolean $isStacked
     */
    public function setIsStacked($isStacked)
    {
        $this->_isStacked = (boolean) $isStacked;
    }

    /**
     * @return boolean
     */
    public function getIsStacked()
    {
        return $this->_isStacked;
    }
}