<?php
/**
 * Form decorator definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Defines a decorator to wrap all the Bootstrap form elements
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Decorator_Wrapper extends Zend_Form_Decorator_HtmlTag
{
    /**
     * Renders a form element decorating it with the Twitter's Bootstrap markup
     *
     * @param $content
     *
     * @return string
     */
    public function render($content)
    {
        $class = $this->getOption('class');

        if (null === $class) {
            $class = '';
        }
        $hasErrors = $this->getElement()->hasErrors() ? 'has-error' : '';
        $class .= " form-group $hasErrors";

        $this->setOption('class', $class);

        return parent::render($content);
    }
}
