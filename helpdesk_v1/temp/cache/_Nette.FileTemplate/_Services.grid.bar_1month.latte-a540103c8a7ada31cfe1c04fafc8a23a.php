<?php //netteCache[01]000387a:2:{s:4:"time";s:21:"0.38626400 1374681387";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:65:"C:\wamp\www\helpdesk\app\templates\Services\grid.bar_1month.latte";i:2;i:1374263435;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: C:\wamp\www\helpdesk\app\templates\Services\grid.bar_1month.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'fe525zar7t')
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
<style>
#progressbar<?php echo Nette\Templating\Helpers::escapeCss($item['idservice']) ?> {
  background-color: black;
  border-radius: 13px; /* (height of inner div) / 2 + padding */
  padding: 3px;
}

#progressbar<?php echo Nette\Templating\Helpers::escapeCss($item['idservice']) ?> div {
   background-color: orange;
   width: <?php echo Nette\Templating\Helpers::escapeCss($item['downtime_1month_percent']) ?>%;
   height: 20px;
   border-radius: 10px;
   color: white;
}
</style>

<div id="progressbar<?php echo htmlSpecialChars($item['idservice']) ?>">
  <div><?php echo Nette\Templating\Helpers::escapeHtml($item['downtime_1month_percent'], ENT_NOQUOTES) ?>%</div>
</div>