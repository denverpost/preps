<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<INCLUDE site=default tpl=SportSeasons>
<VAR $rightSingleQuote = chr(38)."rsaquo;">
<VAR $form_ClassID = intval($form_ClassID)>
<VAR $form_Sport = intval($form_Sport)>
<?PHP
if ( isset($form_class_slug) ) $form_ClassID = class_id($form_class_slug, TRUE);
if ( isset($form_sportslug) ) $form_SportID = sport_id($form_sportslug, TRUE);
?>

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
<a href="{$externalURL}site=default&tpl=Class&ClassID={$Class_ClassID}" title="Colorado {$Class_ClassName} Class">{$Class_ClassName}</a> {$rightSingleQuote} 
</RESULTS>
</h2>

<hr>

<ELSE>
### Class Detail view ###
### This template displays when we've got a ClassID but no SportID ###
<QUERY name=Class prefix=Class CLASSID=$form_ClassID>
<?PHP $sportslug = sport_id($form_Sport); ?>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$domainURL}/classes/">Classes</a>
    {$rightSingleQuote} <a href="{$domainURL}/sports/{$sportslug}/">{$Sport_SportName}</a>
</div>

<h1>Class {$Class_ClassName} Colorado High School Sports</h1>
<QUERY name=SportsForClass CLASSID=$form_ClassID>
<IFNOTEMPTY $form_debug>
SportsForClass query: {$SportsForClass_query}
</IFNOTEMPTY>
<RESULTS list=SportsForClass_rows prefix=Sport>
<?PHP
$sportslug = sport_id($Sport_SportID);
$class_slug = class_id($Class_ClassID);
?>
<h2 class="list"><a href="{$domainURL}/classes/{$class_slug}/{$sportslug}/" title="{$Class_ClassName} Prep {$Sport_SportName} leaders"><span>{$Class_ClassName} Prep</span> {$Sport_SportName} leaders</a></h2>


</RESULTS>
</IFEMPTY>
<ELSE>
### ClassForSport Detail view ###
### This template displays when we've got a ClassID and a SportID ###

<QUERY name=Class prefix=Class CLASSID=$form_ClassID>
<QUERY name=Sport prefix=Sport SPORTID=$form_Sport>

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$domainURL}/classes/">Classes</a>
    {$rightSingleQuote} <a href="{$domainURL}/classes/{$class_slug}/">{$Class_ClassName}</a>
    {$rightSingleQuote} <a href="{$domainURL}/sports/{$sportslug}/">{$Sport_SportName}</a>
</div>
<IFEQUAL $Sport_SportName "Ice Hockey">
<h1>Colorado ###Class {$Class_ClassName}### Prep {$Sport_SportName} Leaders</h1>
<ELSE>
<h1>Colorado Class {$Class_ClassName} Prep {$Sport_SportName} Leaders</h1>
</IFEQUAL>
<INCLUDE site=default tpl=Leaders>
</IFEMPTY>
