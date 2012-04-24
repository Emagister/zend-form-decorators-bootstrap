<?php
/**
 * A custom display group definition for Twitter's Bootstrap forms
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Displays the fieldsets the Bootstrap's way
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 */
class Twitter_Bootstrap_Form_SubForm extends Zend_Form_SubForm
{
	
    protected $_decorators = array(
	array(
		'decorator' => 'FormElements',
		'options' => array()
	),
	array(
		'decorator' => 'HtmlTag',
		'options' => array('tag' => 'div', 'class' => 'control-group')
	),
	array(
		'decorator' => 'Fieldset',
		'options' => array()
	),
    );
	
    protected $_elementDecorators = array(
    	'FieldSize',
    	'ViewHelper',
    	'Addon',
        'ElementErrors',
        array('Description', array('tag' => 'p', 'class' => 'description')),
        array('HtmlTag',     array('tag' => 'div', 'class' => 'controls')),
        array('Label',       array('class' => 'control-label')),
        'Wrapper',
    );
	
    
    public function __construct($options = null) {
        $this->getView()->addHelperPath(
            'Twitter/Bootstrap/View/Helper',
            'Twitter_Bootstrap_View_Helper'
        );

        $this->addPrefixPath(
            'Twitter_Bootstrap_Form_Element',
            'Twitter/Bootstrap/Form/Element',
            'element'
        );

        $this->addElementPrefixPath(
            'Twitter_Bootstrap_Form_Decorator',
            'Twitter/Bootstrap/Form/Decorator',
            'decorator'
        );

        $this->addDisplayGroupPrefixPath(
            'Twitter_Bootstrap_Form_Decorator',
            'Twitter/Bootstrap/Form/Decorator'
        );
        
        parent::__construct($options);
    }

}

