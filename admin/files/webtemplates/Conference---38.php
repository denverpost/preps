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
    &rsaquo; <a href="{$externalURL}site=default&tpl=Conference&ConferenceID">Conferences</a>
</div>

<h1>{$Conference_ConferenceName} Sports</h1>
<QUERY name=SportsForConference CONFERENCEID=$form_ConferenceID>
<RESULTS list=SportsForConference_rows prefix=Sport>
<h2 class="list"><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Sport_SportID}">{$Sport_SportName}</a></h2>
</RESULTS>

</IFEMPTY>
<ELSE>
### ConferenceForSport Detail view ###

<QUERY name=Conference prefix=Conference CONFERENCEID=$form_ConferenceID>
<QUERY name=Sport prefix=Sport SPORTID=$form_Sport>

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    &rsaquo; <a href="{$externalURL}site=default&tpl=Conference&ConferenceID">Conferences</a>
    &rsaquo; <a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$form_ConferenceID}">{$Conference_ConferenceName}</a>
</div>
<h1>{$Conference_ConferenceName} {$Sport_SportName} Schedule and Standings</h1>
<ul id="subnav">
    <li><a href="#results">{$Conference_ConferenceName} Results</a></li>
    <li><a href="#schedule">{$Conference_ConferenceName} Schedule</a></li>
    <li><a href="#standings">{$Conference_ConferenceName} Standings</a></li>
</ul>



<a name="results"></a>
<h2>Recent {$Conference_ConferenceName} Prep {$Sport_SportName} Results</h2>
<VAR $form_SearchDate>
<IFEMPTY $form_SearchDateEnd><VAR $form_SearchDateEnd = date("m/d/Y")></IFEMPTY>
<VAR $schedule_type = "results">
<INCLUDE site=default tpl=ScheduleResultsWrapper>



<a name="schedule"></a>
<h2>This week's {$Conference_ConferenceName} {$Sport_SportName} Schedule</h2>
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
<h2>{$Conference_ConferenceName} {$Sport_SportName} Standings</h2>
<IFTRUE $Sport_SportName != "Boys Golf" && $Sport_SportName != "Girls Golf" && $Sport_SportName != "Boys Cross Country" && $Sport_SportName != "Girls Cross Country" && $Sport_SportName != "Boys Tennis" && $Sport_SportName != "Girls Tennis"  && $Sport_SportName != "Wrestling" >
<INCLUDE site=default tpl=Standings>
<ELSE>
<h3>{$Sport_SportName} does not have standings, though it does have leaders. <a href="{$externalURL}site=default&tpl=Class&Sport={$form_Sport}">View {$Sport_SportName} leaders here</a>.</h3>
</IFTRUE>

</IFEMPTY>
