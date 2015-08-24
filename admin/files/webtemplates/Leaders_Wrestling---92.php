<VAR $domainURL = "http://preps.denverpost.com">
<VAR $beginLink = "/home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&leadersType=".$form_leadersType."&sort=">
<form name="leaderForm" action="/home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<input type="hidden" name="ClassID" id="ClassID" value="{$form_ClassID}" />
<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td>
<h2>Leaders</h2>
<select name="meetEventID" id="meetEventID" onchange="document.leaderForm.submit()">
<option value="">Select</option>
<QUERY name=SportMeetEvents SPORTID=$form_Sport>
<RESULTS list=SportMeetEvents_rows prefix=Event>
<option value="{$Event_MeetEventID}" <IFEQUAL $form_meetEventID $Event_MeetEventID>selected="selected"</IFEQUAL>>{$Event_MeetEventName}</option>
</RESULTS>
</select>
<br>
</td></tr>

</table>
<VAR $MeetEventID = addslashes($form_meetEventID)>
<VAR $sortClause = "WinPct DESC">
<VAR $whereClause = " AND Wins+Losses ".chr(62)." 0 ">
<IFNOTEMPTY $MeetEventID>
<QUERY name=Leaders_Wrestling SPORTNAME=$sqlSportName SORT=$sortClause>
<table cellpadding="0" cellspacing="0" class="leadersTable">
<tr id="header-sub" class="resultsText">
<th>Name</th>
<th>Team</th>
<th align="right">W-L</th>
</tr>
<IFGREATER count($Leaders_Wrestling_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_Wrestling_rows prefix=Plyr>
<tr class="{$rowClass}">
<td>
<?PHP
$player_name = $Plyr_PlayerFirstName . ' ' . $Plyr_PlayerLastName;
$player_slug = slugify($player_name);
?>
<a href="{$domainURL}/players/{$player_slug}/{$Plyr_PlayerID}/" class="leadersNameLink">
{$player_name}</a></td>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Plyr_TeamID}" class="leadersTeamLink">
{$Plyr_TeamName}</a></td>
<td>{$Plyr_Wins}-{$Plyr_Losses}</td>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</table>
<br /><br />
</IFNOTEMPTY>
</FORM>
