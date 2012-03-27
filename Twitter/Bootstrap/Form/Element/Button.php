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
class Twitter_Bootstrap_Form_Element_Button extends Twitter_Bootstrap_Form_Element_Submit
{
    /**
     * Use formButton view helper by default
     * @var string
     */
    public $helper = 'formButton';

    /**
     * The icon class, that will be added if needed
     * @var string
     */
    private $_icon;

    public function __construct($spec, $options = null)
    {
        if (isset($options['icon'])) {
            // Disable automatic label escaping
            $options['escape'] = false;

            $this->_icon = 'icon-' . $options['icon'];

            if (isset($options['whiteIcon']) && true === $options['whiteIcon']) {
                $this->_icon .= ' icon-white';
                unset($options['whiteIcon']);
            }

            unset($options['icon']);
        }

        parent::__construct($spec, $options);
    }

    /**
     * Renders the icon tag
     * @return string
     */
    private function _renderIcon()
    {
        return '<i class="' . $this->_icon . '"></i>';
    }

    /**
     * Gets the button label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->_renderIcon() . PHP_EOL .parent::getLabel();
    }
}
