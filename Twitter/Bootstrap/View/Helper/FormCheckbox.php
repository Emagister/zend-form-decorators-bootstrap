<?php
/**
 * View helper definition
 *
 * @category Helpers
 * @package Twitter_Bootstrap_View
 * @subpackage Helper
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Helper to generate a set of checkbox elements
 *
 * @category Helpers
 * @package Twitter_Bootstrap_View
 * @subpackage Helper
 * @author Christian Soronellas <csoronellas@emagister.com>
 * @author Mkuh <github@mkuh.de>
 */
class Twitter_Bootstrap_View_Helper_FormCheckbox extends Twitter_Bootstrap_View_Helper_FormRadio
{
    /**
     * Input type to use
     * @var string
     */
    protected $_inputType = 'checkbox';

    /**
     * Generates a set of checkbox elements.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are extracted in place of added parameters.
     *
     * @param mixed $value The radio value to mark as 'checked'.
     *
     * @param array $options An array of key-value pairs where the array
     * key is the radio value, and the array value is the radio text.
     *
     * @param array|string $attribs Attributes added to each radio.
     *
     * @return string The checkboxs XHTML.
     */
    public function formCheckbox($name, $value = null, $attribs = null, $options = null, $listsep = '')
    {
        return $this->formRadio($name, $value, $attribs, $options, $listsep);
    }
}
