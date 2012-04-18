<?php
/**
 * Form definition
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Base form class for search forms.
 *
 * @category Forms
 * @package Twitter_Bootstrap
 * @subpackage Form
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
final class Twitter_Bootstrap_Form_Search extends Twitter_Bootstrap_Form_Inline
{
    protected $_disposition = Twitter_Bootstrap_Form::DISPOSTION_SEARCH;

    public function __construct($options = null)
    {
        $this->setDisposition(self::DISPOSTION_SEARCH);

        $renderButton = true;
        if (isset($options['renderInNavBar']) && true === $options['renderInNavBar']) {
            $this->_removeClassNames('form-search');
            $classes = array('navbar-search');
            if (isset($options['pullItRight']) && true === $options['pullItRight']) {
                $classes[] = 'pull-right';
                unset($options['pull-right']);
            }

            $this->_addClassNames($classes);
            unset($options['renderInNavBar']);
            $renderButton = false;
        }

        // Add the search input
        $inputName = isset($options['inputName']) ? $options['inputName'] : 'searchQuery';
        $this->addElement('text', $inputName, array(
            'class' => 'search-query'
        ));

        if ($renderButton) {
            $buttonLabel = isset($options['submitLabel']) ? $options['submitLabel'] : 'Submit';
            $this->addElement('submit', 'submit', array(
                'class' => 'btn',
                'label' => $buttonLabel
            ));
        }
        
        parent::__construct($options);
    }
}
