<?php //netteCache[01]000413a:2:{s:4:"time";s:21:"0.92637800 1374834490";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:91:"/var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Sign/@layout.latte";i:2;i:1374834116;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: /var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Sign/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'us1lz0ltnt')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbb2eb5840c0_title')) { function _lbb2eb5840c0_title($_l, $_args) { extract($_args)
?>Helpdesk<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbf0d23a9cea_head')) { function _lbf0d23a9cea_head($_l, $_args) { extract($_args)
;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbe4085514ec_content')) { function _lbe4085514ec_content($_l, $_args) { extract($_args)
?></div>
</body><?php
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
<?php if (isset($robots)): ?>    <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>
  
    <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?></title>

    <link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />
    <link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />
    <?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>
<body>
<div id="logo"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/logo.jpg" draggable="false" />
<?php $iterations = 0; foreach ($flashes as $flash): ?><div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ;call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 