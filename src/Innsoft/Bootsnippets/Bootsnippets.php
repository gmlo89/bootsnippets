<?php namespace Innsoft\Bootsnippets;

use Illuminate\Html\HtmlBuilder;

class Bootsnippets extends HtmlBuilder {

	public function alert($mensaje, $type='success', $close=true) {
		$html = '<div class="alert alert-'.$type.'">';
		if($close)
			$html.=	'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		$html.=	$mensaje;
		$html.=	'</div>';


		return $html;
	}
}