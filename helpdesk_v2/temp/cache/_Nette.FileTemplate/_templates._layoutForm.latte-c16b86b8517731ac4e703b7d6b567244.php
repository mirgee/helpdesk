<?php //netteCache[01]000374a:2:{s:4:"time";s:21:"0.46021400 1374760502";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:52:"C:\wamp\www\helpdesk\app\templates\@layoutForm.latte";i:2;i:1374760495;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: C:\wamp\www\helpdesk\app\templates\@layoutForm.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '5pw5fa8z09')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/styles/jquery-ui-timepicker-addon.css" />
    <link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/ui-darkness/jquery-ui.min.css" />
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.min.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/nette.ajax.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/main.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-ui-timepicker-addon.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/dateInput.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/script.js"></script>
</head>
<body>
<?php extract(array('close' => false), EXTR_SKIP) ;$iterations = 0; foreach ($flashes as $flash): ?>
<div class="flash <?php echo htmlSpecialChars($flash->type) ?>"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ;Nette\Latte\Macros\UIMacros::callBlock($_l, 'form', $template->getParameters()) ?>
</body>
</html>