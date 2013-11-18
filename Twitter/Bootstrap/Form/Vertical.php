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
 * Base class for default form style
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Vertical extends Twitter_Bootstrap_Form
{
    /**
     * Class constructor override.
     *
     * @param null $options
     */
    public function __construct($options = null)
    {
        $this->_initializePrefixes();

        $this->setElementDecorators(array(
            array('FieldSize'),
            array('ViewHelper'),
            array('Addon'),
            array('ElementErrors'),
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            array('Label'),
            array('Wrapper')
        ));

        parent::__construct($options);
    }
}
