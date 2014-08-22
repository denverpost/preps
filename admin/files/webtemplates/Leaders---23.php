<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $rightSingleQuote = chr(38)."rsaquo;">
<IFNOTEMPTY $form_Sport>

### This logic gets applied because we don't know if we're publishing leaders ###
### for an entire sport, for a class, or for a conference. ###
<IFNOTEMPTY $form_ConferenceID><VAR $selector = "&ConferenceID=".$form_ConferenceID></IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID><VAR $selector = "&ClassID=".$form_ClassID></IFNOTEMPTY>

<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>

###YEARCHECK###
###here is where we enter the season start and end dates for each sport###
<?PHP $strNow = time() ?>
<IFTRUE $sportName == "Football">
<VAR $myTime = strtotime("03 December 2014")>
<VAR $seasonStart = strtotime("24 August 2014")>
</IFTRUE>

<IFTRUE $sportName == "Softball">
###<VAR $myTime = strtotime("31 October 2014")>###
<VAR $softballSeasonStart = strtotime("19 August 2014")>
</IFTRUE>

<IFTRUE $sportName == "Baseball">
###<VAR $myTime = strtotime("31 October 2011")>###
<VAR $baseballSeasonStart = strtotime("08 March 2015")>
</IFTRUE>


<IFTRUE $sportName == "Boys Soccer">
###<?PHP $strNow = time() ?>###
<VAR $seasonStart = strtotime("24 August 2014")>
</IFTRUE>

###<IFTRUE $sportName == "Girls Soccer">###
###<?PHP $strNow = time() ?>###
###<VAR $seasonStart = strtotime("7 March 2014")>###
###</IFTRUE>###

<IFTRUE $sportName == "Field Hockey">
<?PHP $strNow = time() ?>
<VAR $seasonStart = strtotime("29 August 2014")>
</IFTRUE>

<IFTRUE $sportName == "Boys Basketball">
<VAR $seasonStart = strtotime("2 December 2014")>
</IFTRUE>

<IFTRUE $sportName == "Girls Basketball">
<VAR $seasonStart = strtotime("2 December 2014")>
</IFTRUE>

###<IFTRUE $sportName == "Boys Lacrosse">###
###<VAR $seasonStart = strtotime("7 March 2014")>###
###</IFTRUE>###
###<IFTRUE $sportName == "Girls Lacrosse">###
###<VAR $seasonStart = strtotime("7 March 2014")>###
###</IFTRUE>###



### If we're on the Leaders template itself, we need to give it a h1 and some breadcrumbs. ###
<IFTRUE $tpl == "Leaders">
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Sport&Sport={$form_Sport}">{$Sport_SportName}</a>
</div>
    <h1>Overall Colorado Prep {$sportName} Leaders</h1>
</IFTRUE>
</IFNOTEMPTY>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=Leaders_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=Leaders_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Basketball">
<INCLUDE site=default tpl=Leaders_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Wrestling">
<INCLUDE site=default tpl=Leaders_Wrestling>
</IFEQUAL>
<IFTRUE $sportName == "Boys Swimming and Diving" || $sportName == "Girls Swimming and Diving">
<INCLUDE site=default tpl=Leaders_Swimming>
</IFTRUE>
<IFTRUE $sportName == "Boys Track and Field" || $sportName == "Girls Track and Field">
<INCLUDE site=default tpl=Leaders_TrackAndField>
</IFTRUE>
<IFTRUE $sportName == "Field Hockey" >
<INCLUDE site=default tpl=Leaders_FieldHockey>
</IFTRUE>
<IFTRUE $sportName == "Baseball" >
<INCLUDE site=default tpl=Leaders_Baseball>
 <?PHP   $beginLink .= "&sort="; ?>
</IFTRUE>
<IFTRUE $sportName == "Softball" >
<INCLUDE site=default tpl=Leaders_Baseball>
 <?PHP   $beginLink .= "&sort="; ?>
</IFTRUE>
<IFTRUE $sportName == "Girls Volleyball" >
<INCLUDE site=default tpl=Leaders_Volleyball>
</IFTRUE>
<IFTRUE $sportName == "Boys Tennis" || $sportName == "Girls Tennis">
<INCLUDE site=default tpl=Leaders_Tennis>
</IFTRUE>
<IFTRUE $sportName == "Boys Golf" || $sportName == "Girls Golf">
<VAR $count = 50>
<INCLUDE site=default tpl=Leaders_Golf>
</IFTRUE>
<IFTRUE $sportName == "Boys Soccer" || $sportName == "Girls Soccer">
<VAR $count = 25>
<INCLUDE site=default tpl=Leaders_Soccer>
</IFTRUE>
<IFTRUE $sportName == "Girls Gymnastics">
<INCLUDE site=default tpl=Leaders_Gymnastics>
</IFTRUE>
<IFTRUE $sportName == "Girls Cross Country" ||$sportName == "Boys Cross Country">
<INCLUDE site=default tpl=Leaders_CrossCountry>
</IFTRUE>
<IFTRUE $sportName == "Ice Hockey">
<INCLUDE site=default tpl=Leaders_Hockey>
</IFTRUE>
<IFTRUE $sportName == "Boys Lacrosse">
<INCLUDE site=default tpl=Leaders_BoysLacrosse>
</IFTRUE>
<IFTRUE $sportName == "Girls Lacrosse">
<INCLUDE site=default tpl=Leaders_GirlsLacrosse>
</IFTRUE>



<IFTRUE $sportName == "Football" || $sportName == "Boys Basketball" || $sportName == "Girls Basketball" || $sportName == "Wrestling" || $sportName == "Softball" || $sportName == "Baseball" || $sportName == "Girls Volleyball" || $sportName == "Boys Golf" || $sportName == "Girls Golf"  || $sportName == "Boys Soccer" || $sportName == "Girls Soccer" || $sportName == "Boys Cross Country" || $sportName == "Girls Cross Country" || $sportName == "Girls Gymnastics" || $sportName == "Field Hockey"   || $sportName == "Boys Tennis" || $sportName == "Girls Tennis" || $sportName == "Ice Hockey" || $sportName == "Girls Lacrosse" || $sportName == "Boys Lacrosse">

<a name="class"></a>
<h2>Prep {$Sport_SportName} Leaders, By Class</h2>
<QUERY name=ClassesForSport SPORTID=$form_Sport>
<?PHP
$class_slug = class_id($Class_ClassID);
$sport_slug = sport_id($form_Sport);
?>
<ul>
<RESULTS list=ClassesForSport_rows prefix=Class>
<li><a href="{$domainURL}/classes/{$class_slug}/{$sport_slug}/">{$Class_ClassName} {$Sport_SportName} leaders</a></li></RESULTS>
</ul>
<ELSE>
</IFTRUE>
