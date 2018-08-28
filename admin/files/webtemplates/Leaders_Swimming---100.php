<VAR $domainURL = "http://preps.denverpost.com">
<INCLUDE site=default tpl=SportSeasons>
<VAR $resultNum = 500>
<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>

<VAR $beginLink = "/home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&leadersType=".$form_leadersType."&sort=">
<form name="leaderForm" action="/home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<input type="hidden" name="ClassID" id="ClassID" value="{$form_ClassID}" />
<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td>
<font class="pageTitle">Leaders</font>
<select name="leadersType" id="leadersType" onchange="document.leaderForm.submit()">
<option value="">Select</option>
<VAR $meetEvents = array()>
<QUERY name=SportMeetEvents SPORTID=$form_Sport>
<RESULTS list=SportMeetEvents_rows prefix=Event>
<option value="{$Event_MeetEventID}" <IFEQUAL $form_leadersType $Event_MeetEventID>selected="selected"</IFEQUAL>>{$Event_MeetEventName}</option>
<VAR $meetEvents[$Event_MeetEventID] = $Event_MeetEventName>
</RESULTS>
</select>
<br>
</td></tr>

</table>
<VAR $meetEventName = $meetEvents[$form_leadersType]>
<IFNOTEMPTY $meetEventName>
<IFTRUE ($meetEventName == "200-yard Medley Relay") || ($meetEventName == "200-yard Freestyle Relay") || ($meetEventName == "400-yard Freestyle Relay")>
<VAR $whereClause = " AND FinalsTime ".chr(62)." 0 AND SeasonTeamEventType = ".$form_leadersType>
<VAR $sortClause = "FinalsTime ASC">
<QUERY name=LeadersTeam SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause>
<IFNOTEMPTY $form_debug>
###Leaders query: {$Leaders_query}###
</IFNOTEMPTY>
<table cellpadding="0" cellspacing="0" class="leadersTable">
<tr class="leadersColumnHeader">
<td>Team</td>
<td align="right">Time</td>
</tr>
<IFGREATER count($LeadersTeam_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=LeadersTeam_rows prefix=Team>
<tr class="{$rowClass}">
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Team_TeamID}" class="leadersTeamLink">
{$Team_TeamName}</a></td>
<td align="right">
<?PHP
$hours = 0;
$mins = 0;
$secs = 0;
if ($Team_FinalsTimeSecs > 3600) {
$hours = (integer) ($Team_FinalsTimeSecs / 3600);
$Team_FinalsTimeSecs .= $hours * 3600;
}
$mins = (integer) ($Team_FinalsTimeSecs / 60);
$secs = ($Team_FinalsTimeSecs - ($mins * 60));
$timeDisp = "";
if ($hours > 0) $timeDisp = $hours.":";
if ($mins < 10) $mins = "0".$mins;
$timeDisp .= $mins.":";
if ($secs < 10) $secs = "0".$secs;
$timeDisp .= $secs;
?><VAR $timeDisp=$Team_FinalsTime>
{$timeDisp}
</td>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
<ELSE>
</IFGREATER>
</table>
<br /><br />
<ELSE>
<VAR $isDiving = false>
<IFEQUAL $meetEventName "1-M Springboard"><VAR $isDiving = true></IFEQUAL>
<VAR $whereClause = " AND FinalsTime ".chr(62)." 0 AND SeasonPlyrEventType = ".$form_leadersType>
<VAR $sortClause = "FinalsTime ASC">
<IFTRUE $isDiving>
<VAR $whereClause = " AND Points ".chr(62)." 0 AND SeasonPlyrEventType = ".$form_leadersType>
<VAR $sortClause = "Points DESC">
</IFTRUE>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause count=$resultNum>###Leaders query: {$Leaders_query}###
<IFNOTEMPTY $form_debug>
###Leaders query: {$Leaders_query}###
</IFNOTEMPTY>
<table cellpadding="0" cellspacing="0" class="leadersTable">
<tr class="leadersColumnHeader">
<td>Name</td>
<td>Team</td>
<IFTRUE $isDiving>
<td align="right">Points</td>
<ELSE>
<td align="right">Time</td>
</IFTRUE>
</tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Player>
<tr class="{$rowClass}">
<td>
<?PHP
$player_name = $Player_PlayerFirstName . ' ' . $Player_PlayerLastName;
$player_slug = slugify($player_name);
?>
<a href="{$domainURL}/players/{$player_slug}/{$Player_PlayerID}/" class="leadersNameLink">
{$player_name}</a></td>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Player_TeamID}" class="leadersTeamLink">
{$Player_TeamName}</a></td>
<IFTRUE $isDiving>
<td align="right">{$Player_Points}</td>
<ELSE>
<?PHP
$hours = 0;
$mins = 0;
$secs = 0;
if ($Player_FinalsTimeSecs > 3600) {
$hours = (integer) ($Player_FinalsTimeSecs / 3600);
$Player_FinalsTimeSecs -= $hours * 3600;
}
$mins = (integer) ($Player_FinalsTimeSecs / 60);
$secs = ($Player_FinalsTimeSecs - ($mins * 60));
$timeDisp = "";
if ($hours > 0) $timeDisp = $hours.":";
if ($mins < 10) $mins = "0".$mins;
$timeDisp .= $mins.":";
if ($secs < 10) $secs = "0".$secs;
$timeDisp .= $secs;
?>
<VAR $timeDisp=$Player_FinalsTime>
<td align="right">{$timeDisp}</td>
</IFTRUE>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</table>
<br /><br />
</IFTRUE>


</IFNOTEMPTY>
</FORM>
