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
    const DISPOSITION_VERTICAL   = 'vertical';
    const DISPOSITION_HORIZONTAL = 'horizontal';
    const DISPOSITION_INLINE     = 'inline';
    const DISPOSTION_SEARCH      = 'search';

    /**
     * @var string
     */
    private $_disposition;

    /**
     * Override the base form constructor.
     *
     * @param null $options
     */
    public function __construct($options = null)
    {
        $this->getView()->addHelperPath(
            ROOT_PATH . '/library/Emagister/Twitter/Bootstrap/View/Helper',
            'Twitter_Bootstrap_View_Helper'
        );

        $this->addPrefixPath(
            'Twitter_Bootstrap_Form_Element',
            ROOT_PATH . '/library/Emagister/Twitter/Bootstrap/Form/Element',
            'element'
        );

        $this->addElementPrefixPath(
            'Twitter_Bootstrap_Form_Decorator',
            ROOT_PATH . '/library/Emagister/Twitter/Bootstrap/Form/Decorator',
            'decorator'
        );

        $this->addDisplayGroupPrefixPath(
            'Twitter_Bootstrap_Form_Decorator',
            ROOT_PATH . '/library/Emagister/Twitter/Bootstrap/Form/Decorator'
        );

        $this->setDefaultDisplayGroupClass('Twitter_Bootstrap_Form_DisplayGroup');

        // Form disposition
        if (
            array_key_exists('disposition', $options)
            && in_array($options['disposition'], array(self::DISPOSITION_VERTICAL, self::DISPOSITION_HORIZONTAL, self::DISPOSITION_INLINE, self::DISPOSTION_SEARCH))
            && self::DISPOSITION_VERTICAL != $options['disposition']
        ) {
            $this->setDisposition($options['disposition']);
            $this->_addClassNames('form-' . $options['disposition']);
            unset($options['disposition']);
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
                    self::DISPOSITION_VERTICAL,
                    self::DISPOSITION_HORIZONTAL,
                    self::DISPOSITION_INLINE,
                    self::DISPOSTION_SEARCH
                )
            )
        ) {
            $this->_disposition = $disposition;
        }
    }

    /**
     * @return string
     */
    public function getDisposition()
    {
        return $this->_disposition;
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
