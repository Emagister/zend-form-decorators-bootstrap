<?php
/**
 * View helper definition
 *
 * @category Helpers
 * @package Twitter_Bootstrap_View
 * @subpackage Helper
 * @author Marcel Araujo <admin@marcelaraujo.me>
 */

/**
 * Helper to generate a message alert
 *
 * @category Helpers
 * @package Twitter_Bootstrap_View
 * @subpackage Helper
 * @author Marcel Araujo <admin@marcelaraujo.me>
 */
class Application_View_Helper_ShowAlert extends Zend_View_Helper_Abstract
{
	/**
	 * Type of alert messages
	 * @var array
	 */
	protected $types = array('info', 'success', 'error' );

	/**
	 *
	 * @param string $message
	 * @param string $type
	 * @return string
	 */
	public function showAlert( $messages = NULL, $type = 'info' )
	{
		if ( empty( $message ) ) {
			return '';
		}

		$type = strtolower($type);
		$type = in_array($type, $this->types) ? $type : 'info';

		$content = "<div class=\"alert alert-{$type} fade in\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";

		if ( $messages instanceof Zend_Exception ) {
			$content .= "<p class=\"nomargin\">" . $messages->getMessage() . "</p>";
		} elseif ( is_array( $messages ) && count( $messages ) > 0 ) {
			foreach ($messages as $message) {
				$content .= "<p class=\"nomargin\">{$message}</p>";
			}
		} else {
			$content .= "<p class=\"nomargin\">{$messages}</p>";
		}

		return $content . '</div>';
	}

}
