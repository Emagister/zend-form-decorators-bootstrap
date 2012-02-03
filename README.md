# Zend_Form decorators for Twitter's Bootstrap #

This is a set of Zend_Form decorators and helpers that help to render the markup needed to display any Zend_Form as a
[Twitter's Bootstrap](https://twitter.github.com/bootstrap) form.

## This is cool stuff, but how? ##

Here is an example form with some form fields

```php
<?php

class My_Bootstrap_Form extends Twitter_Bootstrap_Form_Inline
{
    public function init()
    {
        $this->setIsArray(true);
        $this->setElementsBelongsTo('bootstrap');

        $this->_addClassNames('well');

        $this->addElement('text', array(
            'placeholder' => 'E-mail',
            'prepend' => '@',
            'class' => 'focused'
        );

        $this->addElement('password', array(
            'placeholder' => 'Password'
        ));

        $this->addElement('button', 'submit', array(
            'label' => 'Login',
            'type'  => 'submit',
            'buttonType' => 'success',
            'icon' => 'ok',
            'escape' => false
        ));
    }
}
```