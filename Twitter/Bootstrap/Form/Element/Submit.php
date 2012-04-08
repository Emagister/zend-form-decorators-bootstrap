<?php
/**
 * A form button submit definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Element
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * A form submit button
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Element
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Element_Submit extends Zend_Form_Element_Submit
{
    const BUTTON_PRIMARY = 'primary';
    const BUTTON_INFO = 'info';
    const BUTTON_SUCCESS = 'success';
    const BUTTON_WARNING = 'warning';
    const BUTTON_DANGER = 'danger';

    /**
     * Class constructor
     *
     * @param $spec
     * @param array $options
     */
    public function __construct($spec, $options = null)
    {
        $classes = array('btn');

        if (
            isset($options['buttonType'])
            && in_array(
                $options['buttonType'],
                array(
                    self::BUTTON_DANGER,
                    self::BUTTON_INFO,
                    self::BUTTON_PRIMARY,
                    self::BUTTON_SUCCESS,
                    self::BUTTON_WARNING
                )
            )
        ) {
            $classes[] = 'btn-' . $options['buttonType'];
            unset($options['buttonType']);
        }

        if (isset($options['disabled'])) {
            $classes[] = 'disabled';
        }

        $this->setAttrib('class', implode(' ', $classes));

        parent::__construct($spec, $options);
    }
}
