# Zend_Form decorators for Twitter's Bootstrap #

This is a set of Zend_Form decorators and helpers that help to render the markup needed to display
any Zend_Form as a Twitter Bootstrap's form.

## Cool, but how? ##

Here is an example. First of all you will need to download/clone this repository into your
"library" folder, inside your application root. Then to use the decorators, follow this example

```php
<?php

class My_Bootstrap_Form extends Twitter_Bootstrap_Form
{
    public function init()
    {
        // Add all your elements

        // Special cases are buttons and display groups that need to show
        // a set of buttons at the end of the form

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

Define a layout that include the Twitter's Bootstrap UI

```php
<?php
// File /application/layouts/scripts/default.phtml
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
    </head>

    <body>
        <?php echo $this->layout()->content; ?>
    </body>
</html>
```

Now from some controller

```php
<?php
class IndexController extends Zend_Controller_Action
{
    public function init()
    {

    }

    public function indexAction()
    {
        $this->view->assign('form', new My_Bootstrap_Form(array(
            'action' => '/index',
            'method' => 'post'
        ));
    }
}
```

And finally from the view layer

```php
<!-- /application/views/scripts/index/index.phtml -->
<?php echo $this->form; ?>
```