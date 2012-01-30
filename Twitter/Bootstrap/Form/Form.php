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
abstract class Twitter_Bootstrap_Form extends Zend_Form
{
    public function __construct($options = null)
    {
        $this->addElementPrefixPath(
            'Twitter_Bootstrap_Form_Decorator',
            '/Twitter/Bootstrap/Form/Decorator',
            'decorator'
        );

        $this->addDisplayGroupPrefixPath(
            'Twitter_Bootstrap_Form_Decorator',
            '/Twitter/Bootstrap/Form/Decorator'
        );

        $this->setElementDecorators(array(
            array('ViewHelper'),
            array('PrependedText'),
            array('ElementErrors'),
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            array('FieldSize'),
            array('HtmlTag', array('tag' => 'div', 'class' => 'input')),
            array('Label'),
            array('Wrapper')
        ));

        $this->setDecorators(array(
            'FormElements',
            'Form'
        ));

        parent::__construct($options);
    }
}
