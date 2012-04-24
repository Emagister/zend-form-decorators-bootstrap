<?php
/**
 * Base form class definition
 *
 * @category Forms
 * @package Twitter
 * @subpackage Bootstrap
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * This is the base abstract form for the Twitter's Bootstrap UI
 *
 * @category Forms
 * @package Twitter
 * @subpackage Bootstrap
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
abstract class Twitter_Bootstrap_Form extends Zend_Form
{
    /**
     * Class constants
     */
    const DISPOSITION_VERTICAL 		= 'vertical';
    const DISPOSITION_HORIZONTAL 	= 'horizontal';
    const DISPOSITION_INLINE     	= 'inline';
    const DISPOSTION_SEARCH      	= 'search';

    protected $_disposition = self::DISPOSITION_VERTICAL;

    /**
     * Override the base form constructor.
     *
     * @param null $options
     */
    public function __construct($options = null)
    {
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

        $this->setDefaultDisplayGroupClass('Twitter_Bootstrap_Form_DisplayGroup');

        $this->setDecorators(array(
            'FormElements',
            'Form'
        ));
        
	//set the decorators based on what's set in the child form's $_disposition variable
	switch($this->_disposition) {
		case self::DISPOSITION_HORIZONTAL:
			$this->setDisposition(self::DISPOSITION_HORIZONTAL);
			$options['bootstrapDecorators'] = Twitter_Bootstrap_Form_Horizontal::$defaultElementDecorators;
			break;
		case self::DISPOSITION_INLINE:
			$this->setDisposition(self::DISPOSITION_INLINE);
			$options['bootstrapDecorators'] = Twitter_Bootstrap_Form_Inline::$defaultElementDecorators;
			break;
		case self::DISPOSTION_SEARCH:
			$this->setDisposition(self::DISPOSTION_SEARCH);
			break;
		case self::DISPOSITION_VERTICAL:
		default:
			$this->setDisposition(self::DISPOSITION_VERTICAL);
			$options['bootstrapDecorators'] = Twitter_Bootstrap_Form_Vertical::$defaultElementDecorators;
			break;			
	}

        parent::__construct($options);
    }

    /**
     * @param string $disposition
     */
    public function setDisposition($disposition)
    {
        if (
            in_array(
                $disposition,
                array(
                    self::DISPOSITION_HORIZONTAL,
                    self::DISPOSITION_INLINE,
                    self::DISPOSTION_SEARCH
                )
            )
        ) {
            $this->_addClassNames('form-' . $disposition);
        }
    }

    /**
     * Sets form decorators
     *
     * @param array $decorators
     */
    public function setBootstrapDecorators($decorators) {
    	$this->setElementDecorators($decorators);
    }

    /**
     * Adds a class name
     *
     * @param string $classNames
     */
    protected function _addClassNames($classNames)
    {
        $classes = $this->_getClassNames();

        foreach ((array) $classNames as $className) {
            $classes[] = $className;
        }

        $this->setAttrib('class', implode(' ', $classes));
    }

    /**
     * Removes a class name
     *
     * @param string $classNames
     */
    protected function _removeClassNames($classNames)
    {
        $classes = $this->getAttrib('class');

        foreach ((array) $classNames as $className) {
            if (false !== strpos($classes, $className)) {
                str_replace($className . ' ', '', $classes);
            }
        }
    }

    /**
     * Extract the class names from a Zend_Form_Element if given or from the
     * base form
     *
     * @param Zend_Form_Element $element
     * @return array
     */
    protected function _getClassNames(Zend_Form_Element $element = null)
    {
        if (null !== $element) {
            return explode(' ', $element->getAttrib('class'));
        }

        return explode(' ', $this->getAttrib('class'));
    }
}
