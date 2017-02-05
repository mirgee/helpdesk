<?php //netteCache[01]000418a:2:{s:4:"time";s:21:"0.97750700 1374834634";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:96:"/var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Dashboard/default.latte";i:2;i:1374834116;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: /var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Dashboard/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'royuo5dkn3')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block heading
//
if (!function_exists($_l->blocks['heading'][] = '_lb0db42c9c92_heading')) { function _lb0db42c9c92_heading($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()) ; 
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbba48f4ee3f_title')) { function _lbba48f4ee3f_title($_l, $_args) { extract($_args)
?><h1>Dashboard</h1><?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbd522d7cbda_content')) { function _lbd522d7cbda_content($_l, $_args) { extract($_args)
;$_ctrl = $_control->getComponent("dashboard"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

<div id="<?php echo $_control->getSnippetId('middle') ?>"><?php call_user_func(reset($_l->blocks['_middle']), $_l, $template->getParameters()) ?>
</div>
<?php
}}

//
// block _middle
//
if (!function_exists($_l->blocks['_middle'][] = '_lb954f871b4a__middle')) { function _lb954f871b4a__middle($_l, $_args) { extract($_args); $_control->validateControl('middle')
;extract(array('showNotesList' => FALSE), EXTR_SKIP) ;if ($showNotesList): $_ctrl = $_control->getComponent("notesList"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ;endif ;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['heading']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars())  ?>

