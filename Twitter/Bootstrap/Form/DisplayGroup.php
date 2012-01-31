<?php
/**
 * A custom display group definition for Twitter's Bootstrap forms
 *
 * @category Forms
 * @package Emagister_Twitter_Bootstrap
 * @subpackage Form
 */

/**
 * Displays the fieldsets the Bootstrap's way
 *
 * @category Forms
 * @package Emagister_Twitter_Bootstrap
 * @subpackage Form
 */
class Twitter_Bootstrap_Form_DisplayGroup extends Zend_Form_DisplayGroup
{
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
