<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $rightSingleQuote = chr(38)."rsaquo;">
<VAR $form_ClassID = intval($form_ClassID)>
<VAR $form_Sport = intval($form_Sport)>

<IFEMPTY $form_Sport>
<IFEMPTY $form_ClassID>
### Class Index view ###
### This template displays when we don't have a ClassID or a SportID ###
### If we don't have a ClassID, that means we should publish an index of all our Classes. ###
<QUERY name=Classes>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
</div>
<h1>Colorado Prep Sport Classes</h1>
<h2>
<RESULTS list=Classes_rows prefix=Class>
<a href="{$externalURL}site=default&tpl=Class&ClassID={$Class_ClassID}" title="Colorado {$Class_ClassName} Class">{$Class_ClassName}</a> � 
</RESULTS>
</h2>

<hr>

<ELSE>
### Class Detail view ###
### This template displays when we've got a ClassID but no SportID ###
<QUERY name=Class prefix=Class CLASSID=$form_ClassID>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Class&ClassID">Classes</a>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Sport&Sport={$form_Sport}">{$Sport_SportName}</a>
</div>

<h1>Class {$Class_ClassName} Colorado Sports</h1>
<QUERY name=SportsForClass CLASSID=$form_ClassID>
<IFNOTEMPTY $form_debug>
SportsForClass query: {$SportsForClass_query}
</IFNOTEMPTY>
<RESULTS list=SportsForClass_rows prefix=Sport>
<h2 class="list"><a href="{$externalURL}site=default&tpl=Class&ClassID={$Class_ClassID}&Sport={$Sport_SportID}" title="{$Class_ClassName} Prep {$Sport_SportName} leaders"><span>{$Class_ClassName} Prep</span> {$Sport_SportName} leaders</a></h2>


</RESULTS>
</IFEMPTY>
<ELSE>
### ClassForSport Detail view ###
### This template displays when we've got a ClassID and a SportID ###

<QUERY name=Class prefix=Class CLASSID=$form_ClassID>
<QUERY name=Sport prefix=Sport SPORTID=$form_Sport>

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Class&ClassID">Classes</a>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Class&ClassID={$form_ClassID}">{$Class_ClassName}</a>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Sport&Sport={$form_Sport}">{$Sport_SportName}</a>
</div>
<IFEQUAL $Sport_SportName "Ice Hockey">
<h1>Colorado ###Class {$Class_ClassName}### Prep {$Sport_SportName} Leaders</h1>
<ELSE>
<h1>Colorado Class {$Class_ClassName} Prep {$Sport_SportName} Leaders</h1>
</IFEQUAL>
<INCLUDE site=default tpl=Leaders>
</IFEMPTY>