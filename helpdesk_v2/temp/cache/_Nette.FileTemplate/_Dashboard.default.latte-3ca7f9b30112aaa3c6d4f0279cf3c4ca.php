<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.67368400 1374680863";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:58:"C:\wamp\www\helpdesk\app\templates\Dashboard\default.latte";i:2;i:1374680743;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: C:\wamp\www\helpdesk\app\templates\Dashboard\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'z12gkga86u')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block heading
//
if (!function_exists($_l->blocks['heading'][] = '_lbf34c3f4592_heading')) { function _lbf34c3f4592_heading($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()) ; 
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb7bbb7710a2_title')) { function _lb7bbb7710a2_title($_l, $_args) { extract($_args)
?><h1>Dashboard</h1><?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb2af449c0b7_content')) { function _lb2af449c0b7_content($_l, $_args) { extract($_args)
;$_ctrl = $_control->getComponent("dashboard"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

<div id="<?php echo $_control->getSnippetId('middle') ?>"><?php call_user_func(reset($_l->blocks['_middle']), $_l, $template->getParameters()) ?>
</div>
<?php
}}

//
// block _middle
//
if (!function_exists($_l->blocks['_middle'][] = '_lb9ad4b99b2e__middle')) { function _lb9ad4b99b2e__middle($_l, $_args) { extract($_args); $_control->validateControl('middle')
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

