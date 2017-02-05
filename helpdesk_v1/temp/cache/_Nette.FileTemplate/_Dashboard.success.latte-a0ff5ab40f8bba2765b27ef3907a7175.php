<?php //netteCache[01]000418a:2:{s:4:"time";s:21:"0.57522700 1374834698";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:96:"/var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Dashboard/success.latte";i:2;i:1374834116;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: /var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Dashboard/success.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'l6k5ytsmte')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block form
//
if (!function_exists($_l->blocks['form'][] = '_lba899c3afb2_form')) { function _lba899c3afb2_form($_l, $_args) { extract($_args)
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