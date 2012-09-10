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
        $this->setElementsBelongTo('bootstrap');

        $this->_addClassNames('well');

        $this->addElement('text', array(
            'placeholder'   => 'E-mail',
            'prepend'       => '@',
            'class'         => 'focused'
        ));

        $this->addElement('password', array(
            'placeholder' => 'Password'
        ));

        $this->addElement('button', 'submit', array(
            'label'         => 'Login',
            'type'          => 'submit',
            'buttonType'    => 'success',
            'icon'          => 'ok',
            'escape'        => false
        ));
    }
}
```

## API Documentation ##

### Forms ###

#### Vertical forms (default style) ####

```php
<?php
class My_Vertical_Form extends Twitter_Bootstrap_Form_Vertical
{
    public function init()
    {
        // Do your stuff here
    }
}
```

#### Horizontal forms ####

```php
<?php
class My_Horizontal_Form extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        // Do your stuff here
    }
}
```

#### Inline forms ####

```php
<?php
class My_Inline_Form extends Twitter_Bootstrap_Form_Inline
{
    public function init()
    {
        // Do your stuff here
    }
}
```

#### Search form ####

Search forms can be rendered in a [navigation bar](http://twitter.github.com/bootstrap/components.html#navbar) or as a normal
forms. Search forms are ```@final``` classes that cannot be extended. Instead it supports several option in order to configure
the look and feel of the form.

* __renderInNavBar__ (*boolean*)
  Renders the form for displaying it in a navigation bar. In this mode no submit button will be rendered. _(defaults to **false**)_

* __pullItRight__ (*boolean*)
  This option only takes effect if the **renderInNavBar** option has been set to _true_, and its purpose is to align the search
  form at the right of the navigation bar. _(defaults to **false**)_

* __inputName__ (*string*)
  This option specifies a custom name for the search input. _(defaults to **searchQuery**)_

* __submitLabel__ (*string*)
  If the submit button will be rendered the label can be customized by passing the **submitLabel** option. _(defaults to **Submit**)_

```php
<?php

// Normal search form
$searchForm = new Twitter_Bootstrap_Form_Search(array(
    'renderInNavBar' => false,
    'inputName'      => 'q',
    'submitLabel'    => 'Search!'
));

echo $searchForm;

// Navigation bar search form
$mavbarSearchForm = new Twitter_Bootstrap_Form_Search(array(
    'renderInNavBar' => true,
    'pullItRight'    => true
    'inputName'      => 'q',
    'submitLabel'    => 'Search!'
));

echo $navbarSearchForm;
```

### DisplayGroups ###

The base class ```Twitter_Bootstrap_Form``` (so inherently, all its subclasses) sets the custom class ```Twitter_Bootstrap_Form_DisplayGroup```
as a base class for handling virtual field groups. So there is no need for special coding here.

```php
<?php
class My_Bootstrap_Form extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addElement('text', 'email', array(
            'label' => 'E-mail'
        ));

        $this->addElement('text', 'password', array(
            'label' => 'Password'
        ));

        $this->addDisplayGroup(
            array('email', 'password'),
            'login',
            array(
                'legend' => 'Account info'
            )
        );
    }
}
```

### New form elements ###

In order to leverage the astonishing look and feel of Twitter Bootstrap buttons, a new special form element has been created in
order to set all the appropiate *class* names.

#### Submit button ####

To configure the look and feel of a submit button there are several options supported

* __buttonType__ (*string*)
  This option specifies the button type that will be rendered. Twitter Bootstrap 2.0.0 supports six button types out of the box
  * __default__ (obviously, the default button style)
  * __primary__
  * __info__
  * __success__
  * __warning__
  * __danger__

* __disabled__ (*boolean*)
  If _true_, the submit button will be rendered as disabled.

```php
<?php
class My_Bootstrap_Form extends Twitter_Bootstrap_Form_Vertical
{
    public function init()
    {
        // All the other form stuff

        $this->addElement('submit', 'submit', array(
            'buttonType' => Twitter_Bootstrap_Form_Element_Submit::BUTTON_SUCCESS,
            'disabled'   => true,
            'label'      => 'Send e-mail!'
        ));
    }
}
```

#### Button ####

This form element is an extension of the submit button in order to provide a way to render HTML inside the button. So it's
providing the same features as the submit button plus the hability to render a [glyphicon](http://twitter.github.com/bootstrap/base-css.html#icons)
as a button label. Let's see it.

* __icon__ (*string*)
  This option specify the icon used inside the button.

* __whiteIcon__ (*boolean*)
  This option specify whether the icon should be rendered in white color. _(default **false**)_

```php
<?php
class My_Bootstrap_Form extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        // All the other form stuff

        $this->addElement('button', 'submit', array(
            'label'      => 'Send e-mail!',
            'buttonType' => Twitter_Bootstrap_Form_Element_Submit::BUTTON_SUCCESS,
            'icon'       => 'ok',
            'whiteIcon'  => true,
            'iconPosition' => Twitter_Bootstrap_Form_Element_Button::ICON_POSITION_RIGHT
        ));
    }
}
```

### Decorators ###

#### Actions decorator ####

The purpose of this decorator is to set the appropiate markup to render the form's submit buttons.

```php
<?php
class My_Bootstrap_Form extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addElement('button', 'submit', array(
            'label'         => 'Submit!',
            'type'          => 'submit'
        ));

        $this->addElement('button', 'reset', array(
            'label'         => 'Reset',
            'type'          => 'reset'
        ));

        $this->addDisplayGroup(
            array('submit', 'reset'),
            'actions',
            array(
                'disableLoadDefaultDecorators' => true,
                'decorators' => array('Actions')
            )
        );
    }
}
```

#### Addon decorator ####

This decorator allows specify some content that will be *appended* or *prepended* to the given input. It can render text,
a glyphicon or a checkbox. To accomplish this it supports several options that will be set to the form element itself. If 
you pass an element that is a Zend_Form_Element_Submit element, it will put it there without the span.

* __prepend__ (*string*)
  Prepends the content of the option to the generated field form.

* __append__ (*string*)
  Appends the content of the option to the generated field form.

The content of the both options could be a string containing some text, an array or an instance of the class ```Zend_Config```
or a glyphicon. When

* 'Text' specified, it will render as is.

* Zend_Config or array specified, it will generate a checkbox. **Note** that if the key "_active_" is passed inside the array or
  inside the Zend_Config instance, it will render the prepended or appended box with green background.

```php
<?php
class My_Bootstrap_Form extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        // Some text
        $this->addElement('text', 'input1', array(
            'label'   => 'E-mail',
            'prepend' => '@'
        ));

        // A checkbox
        $this->addElement('text', 'input2', array(
            'label' => '2nd E-mail',
            'prepend' => array(
                'name' => 'internalCheckbox1',
                'active' => true
            )
        ));

        // A glyphicon
        $this->addElement('text', 'input2', array(
            'label' => '2nd E-mail',
            'prepend' => '<i class="icon-envelope"></i>'
        ));
        
        // A submit button
        $submitButton = $this->createElement('button', 'addButton', array(
            'label' => 'Add'
        );
        
        $this->addElement('text', 'input2', array(
            'label' => '2nd E-mail',
            'prepend' => $submitButton
        ));
    }
}
```

#### Fieldsize decorator ####

In order to specify a size of an input a special decorator is executed at the very begining of the decorator chain to set the
appropiate class name. The size of an input can be set by the element's attribute **size**.

```php
<?php
class My_Bootstrap_Form extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        // Some text
        $this->addElement('text', 'input1', array(
            'label'     => 'E-mail',
            'dimension' => 5
        ));
    }
}
```

## Installation ##

In order to use Bootstrap 2.0.0, the needed assets need to be installed in your assets directory. Make sure to install also the
glyphicons properly. Once all this stuff has been installed, create/modify a layout view script and add a reference to the
Bootstrap CSS.

```php
<!-- /application/layouts/scripts/default.phtml -->
<?php $this->headLink()->appendStylesheet('/css/bootstrap.css'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <?php echo $this->headLink(); ?>
    </head>

    <body>
        <!-- All your HTML stuff -->
    </body>
</html>
```

So that's it. Now you can start creating forms and rendering them the way shown before and you will get nice forms!

## Contributors ##

* __adepretis__ <ad@25th-floor.com>
* __rafalgalka__ <http://blog.modernweb.pl>
* __lrobert__
