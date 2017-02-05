<?php //netteCache[01]000413a:2:{s:4:"time";s:21:"0.05212000 1374834734";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:91:"/var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Services/sla.latte";i:2;i:1374834116;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: /var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Services/sla.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '6v57mza58v')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb929abc8201_content')) { function _lb929abc8201_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['heading']), $_l, get_defined_vars())  ?>

<?php $_ctrl = $_control->getComponent("slaTable"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

<a href="<?php echo htmlSpecialChars($_control->link("Services:newSla", array($idservice))) ?>
"><button>Přidat SLA</button></a><?php
}}

//
// block heading
//
if (!function_exists($_l->blocks['heading'][] = '_lbac95f4b185_heading')) { function _lbac95f4b185_heading($_l, $_args) { extract($_args)
?><h1>Služba <?php echo Nette\Templating\Helpers::escapeHtml(lcfirst($service_name), ENT_NOQUOTES) ?></h1>
<?php
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

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 