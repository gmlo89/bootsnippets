<?php namespace Innsoft\Bootsnippets;

class Bootsnippets {

	/**
	 * Get a bootstrap alert
	 *
	 * @param string 	$message 	Message to show
	 * @param string 	$type 		Alert type (For example, if you want a "alert-danger", you need put only "danger")
	 * @param bool 	 	$close 		Define if you want a close button
	 *
	 * @return string 	Html string with the element
	 */
	public function alert($message, $type='success', $close=true) {
		$html = '<div class="alert alert-'.$type.'">';
		if($close)
			$html.=	'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		$html.=	$message;
		$html.=	'</div>';
		return $html;
	}


	/**
	 * Get a boostrap label
	 * @param  string $text
	 * @param  string $type
	 * @return string
	 */
	public function label($text, $type = 'default')
	{
		return '<span class="label label-'.$type.'">'.$text.'</span>';
	}


	/**
	 * Handle dynamic method calls into the method.
	 * @param  string $name
	 * @param  array  $arguments
	 * @return mixed
	 */
	public function __call($name, $arguments) {
		
		if(starts_with($name, 'alert'))
		{
			/**
			 * It is understood that attempts to create an alert
			 */

			$message 	= '';
			if(isset($arguments[0]))
				$message = $arguments[0];

			$type		= strtolower(substr($name, 5));

			$close 		= true;
			if(isset($arguments[1]) && is_bool($arguments[1]))
				$close = $arguments[1];

			return $this->alert($message, $type, $close);
		}
		else if(starts_with($name, 'label') && count($arguments) == 1)
		{
			$text = '';
			if(isset($arguments[0]))
				$text = $arguments[0];

			$type = strtolower(substr($name, 5));
			
			return $this->label($text, $type);

		}
	}
}