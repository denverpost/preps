<VAR $domainURL = "http://preps.denverpost.com">
<VAR $pointer = ›>
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $form_ConferenceID = intval($form_ConferenceID)>
<VAR $form_Sport = intval($form_Sport)>

<IFEMPTY $form_Sport>
<IFEMPTY $form_ConferenceID>
### Conference Index view ###
### If we don't have a ConferenceID, that means we should publish an index of all our conferences. ###
<QUERY name=Conferences>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
</div>
<h1>Conferences in Colorado</h1>
<RESULTS list=Conferences_rows prefix=Conference>
<h2 class="list"><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}" title="{$Conference_ConferenceName} Conference">{$Conference_ConferenceName}</a></h2>
</RESULTS>

<ELSE>
### Conference Detail view ###

<QUERY name=Conference prefix=Conference CONFERENCEID=$form_ConferenceID>
<div id="breadcrumbs">
<INCLUDE site=default tpl=TemplateBreadcrumbs> 
<a href="{$externalURL}site=default&tpl=Conference&ConferenceID" Conferences</a>
</div>

<h1>{$Conference_ConferenceName} Conference Sports</h1>
<QUERY name=SportsForConference CONFERENCEID=$form_ConferenceID>
<RESULTS list=SportsForConference_rows prefix=Sport>
<h2 class="list"><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Sport_SportID}" &amp;#8250; {$Sport_SportName}</a></h2>
</RESULTS>

</IFEMPTY>
<ELSE>
### ConferenceForSport Detail view ###

<QUERY name=Conference prefix=Conference CONFERENCEID=$form_ConferenceID>
<QUERY name=Sport prefix=Sport SPORTID=$form_Sport>

<VAR $confName=$Conference_ConferenceName>

<IFTRUE $Sport_SportName == "Ice Hockey"  || $form_Sport == "34">
<?php
$confName = preg_replace("/(\w+)\s(\(Ice hockey\))/", "$1", "$Conference_ConferenceName");
?>
</IFTRUE>

<IFTRUE $Sport_SportName == "Boys Lacrosse"  || $form_Sport == "35">
<?php
$confName = preg_replace("/(\w+)\s(\(Boys lacrosse\))/", "$1", "$Conference_ConferenceName");
?>
</IFTRUE>
<IFTRUE $Sport_SportName == "Girls Lacrosse"  || $form_Sport == "36">
<?php
$confName = preg_replace("/(\w+)\s(\(Girls lacrosse\))/", "$1", "$Conference_ConferenceName");
?>
</IFTRUE>



<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    &amp;#8250; <a href="{$externalURL}site=default&tpl=Conference&ConferenceID">Conferences</a>
&amp;#8250; <a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$form_ConferenceID}"> {$confName}</a>
</div>
<h1>{$confName} {$Sport_SportName} Schedule and Standings</h1>
<ul id="subnav">
    <li><a href="#results">{$confName} Results</a></li>
    <li><a href="#schedule">{$confName} Schedule</a></li>
    <li><a href="#standings">{$confName} Standings</a></li>
</ul>

<IFEQUAL $Sport_SportName "Girls Gymnastics">
<VAR $Conference_ConferenceName = "">
<ELSE>
</IFEQUAL>
<a name="results"></a>
<IFEQUAL $Sport_SportName "Field Hockey">
<h2>Recent Prep {$Sport_SportName} Results</h2>
<ELSE>
<h2>Recent {$confName} Prep {$Sport_SportName} Results</h2>
</IFEQUAL>
<VAR $form_SearchDate>
<IFEMPTY $form_SearchDateEnd><VAR $form_SearchDateEnd = date("m/d/Y")></IFEMPTY>
<VAR $schedule_type = "results">
<INCLUDE site=default tpl=ScheduleResultsWrapper>



<a name="schedule"></a>
<IFEQUAL $Sport_SportName "Field Hockey">
<h2>This week's {$Sport_SportName} Schedule</h2>
<ELSE>
<h2>This week's {$confName} {$Sport_SportName} Schedule</h2>
</IFEQUAL>
<VAR $form_count = 250>
<VAR $count = 250>
<VAR $form_SearchDate = date("m/d/Y")>
<?PHP
// To show the remainder of this week's schedule,
// we need to figure out what day is the next Saturday.
$saturday = 6;
$this_day = date("w");
$days_until_saturday = $saturday - $this_day;
$saturday_date = strtotime("+$days_until_saturday days");
?>
<VAR $form_SearchDateEnd = date("m/d/Y", $saturday_date)>
<VAR $schedule_type = "schedule">
<INCLUDE site=default tpl=ScheduleInclude>



<a name="standings"></a>
<IFEQUAL $Sport_SportName "Field Hockey">
<h2>{$Sport_SportName} Standings</h2>
<ELSE>
<h2>{$$confName} {$Sport_SportName} Standings</h2>
</IFEQUAL>
<IFTRUE $Sport_SportName != "Boys Golf" && $Sport_SportName != "Girls Golf" && $Sport_SportName != "Boys Cross Country" && $Sport_SportName != "Girls Cross Country" && $Sport_SportName != "Boys Tennis" && $Sport_SportName != "Girls Tennis"  && $Sport_SportName != "Wrestling" && $Sport_SportName != "Girls Gymnastics" && $Sport_SportName != "Girls Swimming and Diving" && $Sport_SportName != "Boys Swimming and Diving" && $Sport_SportName != "Girls Track and Field" && $Sport_SportName != "Boys Track and Field">
<INCLUDE site=default tpl=Standings>
<ELSE>
<h3>{$Sport_SportName} does not have standings, though it does have leaders. <a href="{$externalURL}site=default&tpl=Class&Sport={$form_Sport}">View {$Sport_SportName} leaders here</a>.</h3>
</IFTRUE>

</IFEMPTY>
