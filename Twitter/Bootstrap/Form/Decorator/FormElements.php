<?php
/**
 * Form decorator definition
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form_Decorator
 * @subpackage FormElements
 * @author Christian Soronellas <csoronellas@emagister.com>
 */

/**
 * Renders the form body
 *
 * @category Forms
 * @package Twitter_Bootstrap_Form_Decorator
 * @subpackage FormElements
 * @author Christian Soronellas <csoronellas@emagister.com>
 */
class Twitter_Bootstrap_Form_Decorator_FormElements extends Zend_Form_Decorator_FormElements
{
    /**
     * Render form elements
     *
     * @param  string $content
     * @return string
     */
    public function render($content)
    {
        $form    = $this->getElement();
        if ((!$form instanceof Zend_Form) && (!$form instanceof Zend_Form_DisplayGroup)) {
            return $content;
        }

        $belongsTo      = ($form instanceof Zend_Form) ? $form->getElementsBelongTo() : null;
        $displayGroups  = ($form instanceof Zend_Form) ? $form->getDisplayGroups() : array();
        $separator      = $this->getSeparator();
        $translator     = $form->getTranslator();
        $items          = array();
        $view           = $form->getView();
        foreach ($form as $item) {
            $item->setView($view)
                 ->setTranslator($translator);
            if ($item instanceof Zend_Form_Element) {
                foreach ($displayGroups as $group) {
                    $elementName = $item->getName();
                    $element     = $group->getElement($elementName);
                    if ($element) {
                        // Element belongs to display group; only render in that
                        // context.
                        continue 2;
                    }
                }
                $item->setBelongsTo($belongsTo);
            } elseif (!empty($belongsTo) && ($item instanceof Zend_Form)) {
                if ($item->isArray()) {
                    $name = $this->mergeBelongsTo($belongsTo, $item->getElementsBelongTo());
                    $item->setElementsBelongTo($name, true);
                } else {
                    $item->setElementsBelongTo($belongsTo, true);
                }
            } elseif (!empty($belongsTo) && ($item instanceof Zend_Form_DisplayGroup)) {
                foreach ($item as $element) {
                    $element->setBelongsTo($belongsTo);
                }
            }

            // Check if has errors
            if ($item instanceof Zend_Form_Element && $item->hasErrors()) {
                $class = $item->getAttrib('class');
                $item->setAttrib('class', $class . ' has-error');
            }

            // Check if the element is disabled
            if ($item instanceof Zend_Form_Element && null !== $item->getAttrib('disabled')) {
                $class = $item->getAttrib('class');
                $item->setAttrib('class', $class . ' disabled');
            }

            // Check if the element is required
            if ($item instanceof Zend_Form_Element && $item->isRequired()) {
                $item->setAttrib('required', 'required');
            }

            $items[] = $item->render();

            if (($item instanceof Zend_Form_Element_File)
                || (($item instanceof Zend_Form)
                    && (Zend_Form::ENCTYPE_MULTIPART == $item->getEnctype()))
                || (($item instanceof Zend_Form_DisplayGroup)
                    && (Zend_Form::ENCTYPE_MULTIPART == $item->getAttrib('enctype')))
            ) {
                if ($form instanceof Zend_Form) {
                    $form->setEnctype(Zend_Form::ENCTYPE_MULTIPART);
                } elseif ($form instanceof Zend_Form_DisplayGroup) {
                    $form->setAttrib('enctype', Zend_Form::ENCTYPE_MULTIPART);
                }
            }
        }
        $elementContent = implode($separator, $items);

        switch ($this->getPlacement()) {
            case self::PREPEND:
                return $elementContent . $separator . $content;
            case self::APPEND:
            default:
                return $content . $separator . $elementContent;
        }
    }
}
