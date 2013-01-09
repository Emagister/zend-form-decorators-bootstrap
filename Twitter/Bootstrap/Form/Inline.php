<?php
/**
 * Base form class definition for inline forms
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Base form class for inline forms. The inline form displays the form elements as
 * "inline-blocks", and there is no wrapper for themselves.
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Inline extends Twitter_Bootstrap_Form
{
    public function __construct($options = null)
    {
        $this->_initializePrefixes();

        $this->setDisposition(self::DISPOSITION_INLINE);

        $this->setElementDecorators(array(
            array('FieldSize'),
            array('ViewHelper'),
            array('Description', array('tag' => 'p', 'class' => 'help-block')),
            array('Addon')
        ));

        parent::__construct($options);
    }
}
