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
            'placeholder'   => 'E-mail',
            'prepend'       => '@',
            'class'         => 'focused'
        );

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

// Navigation bar search form
$searchForm = new Twitter_Bootstrap_Form_Search(array(
    'renderInNavBar' => true,
    'pullItRight'    => true
    'inputName'      => 'q',
    'submitLabel'    => 'Search!'
));
```