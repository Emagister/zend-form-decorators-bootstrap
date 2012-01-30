# Zend_Form decorators for Twitter's Bootstrap #

This is a set of Zend_Form decorators and helpers that help to render the markup needed to display
any Zend_Form as a Twitter Bootstrap's form.

## Cool, but how ? ##

Here is an example. First of all you will need to download/clone this repository into your
"library" folder, inside your application root. Then to use the decorators, follow this example

```php
<?php

class My_Bootstrap_Form extends Twitter_Bootstrap_Form
{
    public function init()
    {
        // Add all your elements

        // Special cases are buttons and display groups
        $this->addElement('submit', 'submit', array(
            'label' => 'Submit',
            'class' => 'btn default' // At least "btn" class must be specified
        ));

        $this->addDisplayGroup(
            array('submit'),
            'actions',
            array(
                'disableLoadDefaultDecorators' => true,
                'decorators' => array('Actions')
            )
        );
    }
}
```