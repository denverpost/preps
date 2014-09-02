<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<INCLUDE site=default tpl=SportSeasons>
<?PHP
$sport_slug = sport_id($form_Sport);
?>

<IFNOTEMPTY $form_ConferenceID>
<QUERY name=Conference prefix=Conference CONFERENCEID=$form_ConferenceID>
</IFNOTEMPTY>

<QUERY name=Sport prefix=Sport SPORTID=$form_Sport>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    › <a href="{$domainURL}/sport/">Sports</a>
    › <a href="{$domainURL}/sport/{$sport_slug}/">{$Sport_SportName}</a>
<IFNOTEMPTY $form_ConferenceID>    › <a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$form_ConferenceID}">{$Conference_ConferenceName} Conference</a></IFNOTEMPTY>
</div>
<h1>
High School 
<IFNOTEMPTY $form_ConferenceID>    {$Conference_ConferenceName}</IFNOTEMPTY>
    {$Sport_SportName} Schedule<IFNOTEMPTY $form_Week>, Week {$form_Week}</IFNOTEMPTY><IFNOTEMPTY $form_Day>, Day {$form_Day}</IFNOTEMPTY>
</h1>




<INCLUDE site=default tpl=ScheduleInclude>

<IFTRUE $Sport_SportName == "Girls Swimming and Diving" || $Sport_SportName == "Field Hockey">
<ELSE>
<IFEMPTY $form_ConferenceID>
<h2>{$Sport_SportName} schedules by conference</h2>
<QUERY name=ConferencesForSport SPORTID=$Sport_SportID>
<RESULTS list=ConferencesForSport_rows prefix=Conf>
### This string substitution removes redundancies in the conference names, ###
### many of which also include the sport name, which we already know. ###
<h2 class="list twocolumns"><a href="<?PHP echo $_SERVER["HTTP_REFERER"]; ?>&ConferenceID={$Conf_ConferenceID}"><?PHP $name = str_replace(" ($Sport_SportName)", "", $Conf_ConferenceName); $name = preg_replace("|\(? ?$Sport_SportName\)?|i", "", $name); echo $name; ?></a></h2>
</RESULTS>
</IFEMPTY>
</IFTRUE>


### Display a link back to the main schedule for this sport ###
<IFNOTEMPTY $form_ConferenceID>
<h2><a href="{$externalURL}site=default&tpl=Schedule&Sport={$form_Sport}&SearchDate={$form_SearchDate}&SearchDateEnd={$form_SearchDateEnd}&start={$form_start}&count={$form_count}<IFNOTEMPTY $form_Week>&Week={$form_Week}<IFNOTEMPTY $form_Day>&Day={$form_Day}</IFNOTEMPTY></IFNOTEMPTY>">Go back to the full prep {$Sport_SportName} schedule for {$strDateDisplay}</a></h2>
</IFNOTEMPTY>
