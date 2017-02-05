<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.88829100 1374760690";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:58:"C:\wamp\www\helpdesk\app\templates\Dashboard\success.latte";i:2;i:1374760529;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: C:\wamp\www\helpdesk\app\templates\Dashboard\success.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'wfl01vzobc')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block form
//
if (!function_exists($_l->blocks['form'][] = '_lbad70f6b7ac_form')) { function _lbad70f6b7ac_form($_l, $_args) { extract($_args)
;if ($close): ?><script type="text/javascript">setTimeout("window.close();", 1000);</script><?php endif ;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = "../@layoutForm.latte"; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
 if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['form']), $_l, get_defined_vars()) ; 