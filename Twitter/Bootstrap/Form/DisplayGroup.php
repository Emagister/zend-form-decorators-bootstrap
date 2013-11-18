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
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_DisplayGroup extends Zend_Form_DisplayGroup
{
    /**
     * Override the default decorators
     *
     * @return Twitter_Bootstrap_Form_DisplayGroup
     */
    public function loadDefaultDecorators()
    {
        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return $this;
        }

        $decorators = $this->getDecorators();
        if (empty($decorators)) {
            $this->addDecorator('FormElements')
                 ->addDecorator('Fieldset');
        }

        return $this;
    }

}
