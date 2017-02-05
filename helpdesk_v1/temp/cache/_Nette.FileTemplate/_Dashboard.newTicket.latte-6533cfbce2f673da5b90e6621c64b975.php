<?php //netteCache[01]000420a:2:{s:4:"time";s:21:"0.77212400 1374834739";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:98:"/var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Dashboard/newTicket.latte";i:2;i:1374834116;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: /var/www/clients/client0/web44/web/helpdesk_nette/helpdesk/app/templates/Dashboard/newTicket.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'gw5pdg9ot8')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb016e140342_content')) { function _lb016e140342_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['heading']), $_l, get_defined_vars())  ?>

<div class="form ticketForm">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("newTicketForm") ? "newTicketForm" : $_control["newTicketForm"]), array()) ?>
<table>
<tr>
    <td>
        <fieldset>
        <legend><?php $_input = is_object("idcustomer") ? "idcustomer" : $_form["idcustomer"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></legend>
<?php $_input = (is_object("idcustomer") ? "idcustomer" : $_form["idcustomer"]); echo $_input->getControl()->addAttributes(array('autofocus' => true)) ?>
        </fieldset>
    </td>
    <td>
        <fieldset>
        <legend><?php $_input = is_object("idagent") ? "idagent" : $_form["idagent"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></legend>
<?php $_input = (is_object("idagent") ? "idagent" : $_form["idagent"]); echo $_input->getControl()->addAttributes(array()) ?>
        </fieldset>
    </td>
    <td>
        <fieldset>
        <legend><?php $_input = is_object("idservice") ? "idservice" : $_form["idservice"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></legend>
<?php $_input = (is_object("idservice") ? "idservice" : $_form["idservice"]); echo $_input->getControl()->addAttributes(array()) ?>
        </fieldset>
    </td>
</tr>
<tr>
    <td>
        <fieldset>
        <legend><?php $_input = is_object("idqueue") ? "idqueue" : $_form["idqueue"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></legend>
<?php $_input = (is_object("idqueue") ? "idqueue" : $_form["idqueue"]); echo $_input->getControl()->addAttributes(array()) ?>
        </fieldset>
    </td>
    <td>
        <fieldset>
        <legend><?php $_input = is_object("note_priority") ? "note_priority" : $_form["note_priority"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></legend>
<?php $_input = (is_object("note_priority") ? "note_priority" : $_form["note_priority"]); echo $_input->getControl()->addAttributes(array()) ?>
        </fieldset> 
    </td>
    <td>
        <fieldset>
        <legend><?php $_input = is_object("note_delivery") ? "note_delivery" : $_form["note_delivery"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></legend>
<?php $_input = (is_object("note_delivery") ? "note_delivery" : $_form["note_delivery"]); echo $_input->getControl()->addAttributes(array()) ?>
        </fieldset>
    </td>
</tr>
<tr>
    <td colspan="3">
        <fieldset>
        <?php $_input = is_object("note_subject") ? "note_subject" : $_form["note_subject"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?><br />
<?php $_input = (is_object("note_subject") ? "note_subject" : $_form["note_subject"]); echo $_input->getControl()->addAttributes(array()) ?>
        <p><?php $_input = (is_object("note_body") ? "note_body" : $_form["note_body"]); echo $_input->getControl()->addAttributes(array()) ?></p>
<?php $_input = (is_object("submit") ? "submit" : $_form["submit"]); echo $_input->getControl()->addAttributes(array()) ?>
        </fieldset>
    </td>
</tr>
</table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</div><?php
}}

//
// block heading
//
if (!function_exists($_l->blocks['heading'][] = '_lb0749796d2a_heading')) { function _lb0749796d2a_heading($_l, $_args) { extract($_args)
?><h1>Nový ticket</h1>
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