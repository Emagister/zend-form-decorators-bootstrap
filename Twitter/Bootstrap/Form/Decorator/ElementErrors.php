<?php
/**
 * Defines a decorator to handle form field errors
 *
 * @category Form
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * A decorator to render the form element errors
 *
 * @category Form
 * @package Twitter_Bootstrap_Form
 * @subpackage Decorator
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Decorator_ElementErrors extends Zend_Form_Decorator_Abstract
{
    /**
     * @param  string $content
     * @return string
     */
    public function render($content)
    {
        if (!$this->getElement()->hasErrors()) {
            return $content;
        }

        $options = $this->getOptions();
        $escape = true;
        if (isset($options['escape'])) {
            $escape = (bool) $options['escape'];
        }

        $errors = $this->getElement()->getMessages();
        if ($escape) {
            $view = $this->getElement()->getView();
            foreach ($errors as $key => $message) {
                $errors[$key] = $view->escape($message);
            }
        }

        $errormessage = trim(implode('. ', $errors));

        return $content . '<span class="help-inline">' . $errormessage . '</span>';
    }
}
