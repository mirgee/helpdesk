<?php //netteCache[01]000408a:2:{s:4:"time";s:21:"0.06700700 1374834635";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:86:"/var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/@layout.latte";i:2;i:1374834114;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: /var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'jorpqhvxql')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb2b0ecec749_title')) { function _lb2b0ecec749_title($_l, $_args) { extract($_args)
?>Helpdesk<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbb394063f90_head')) { function _lbb394063f90_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbca81294445_scripts')) { function _lbca81294445_scripts($_l, $_args) { extract($_args)
?>    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.min.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/nette.ajax.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/main.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-ui-timepicker-addon.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/dateInput.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/script.js"></script>
    <script>
$('#container').on('click', '#notesTable tbody tr',
    function(){
        var idnote = $(this).children('td.grid-cell-idnote').text().replace(/\s/g, '');
        $.ajax({
            url: <?php echo Nette\Templating\Helpers::escapeJs($_control->link("showbody!")) ?>,
            type: 'GET',
            data: { 'idnote' : idnote },
            success: function(payload){
                $('#ajaxtext').html(payload.body);
            }
         });
    }
);

$('table#dashboard tbody tr').click(function(){
    var idticket = $(this).children('td.grid-cell-idticket').text().replace(/\s/g, '');
    $.nette.ajax({
        url: <?php echo Nette\Templating\Helpers::escapeJs($_control->link("details!")) ?>,
        type: 'GET',
        data: { 'idticket' : idticket }
     });
});

    </script>
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
<?php if (isset($robots)): ?>    <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>
  
    <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/styles/jquery-ui-timepicker-addon.css" />
    <link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/ui-darkness/jquery-ui.min.css" />
    <link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />

    <?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
    <div id="header">
            <div class="title"><a href="<?php echo htmlSpecialChars($_control->link("Dashboard:")) ?>"></a></div>
<?php if ($user->isLoggedIn()): ?>
            <div class="user">
                <span class="avatar"> Jste přihlášen jako <strong><span style="color:orange;"><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->agent_name, ENT_NOQUOTES) ?></span></strong></span>
                <a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásit se</a>
            </div>
<?php endif ?>
    </div>
    <table id="navigation">
        <tr>
                <td <?php try { $_presenter->link("Dashboard:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Dashboard:")) ?>">Dashboard</a></td>
                <td <?php try { $_presenter->link("Customers:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Customers:")) ?>">Zákazníci</a></td>
                <td <?php try { $_presenter->link("Services:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Services:")) ?>">Služby</a></td>
                <td <?php try { $_presenter->link("Config:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Config:")) ?>">Konfigurace</a></td>
                <td <?php try { $_presenter->link("Dashboard:NewTicket"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>><a href="<?php echo htmlSpecialChars($_control->link("Dashboard:NewTicket")) ?>">Nový ticket</a></td>
        </tr>
    </table>
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'heading', $template->getParameters()) ;$_ctrl = $_control->getComponent("upcoming"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
    <div id="container">
<?php $iterations = 0; foreach ($flashes as $flash): ?>            <div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ;Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
    </div>
<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>
</html>
