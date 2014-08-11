<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $webURL = "http://denver-tpweb.newsengin.com/web/graphics/team/">

<IFEMPTY $form_TeamID>
<font class="pageText">Please select a team in the search box above.</font>
<?PHP exit() ?>
</IFEMPTY>

<QUERY name=Team ID=$form_TeamID>
<VAR $sportName = $Team_SportName>
<VAR $sportType = $Team_SportType>
<VAR $Team_TeamName = fixApostrophes($Team_TeamName)>
<VAR $sqlSportName = strtolower(convertForSQL($sportName))>

<VAR $primaryColor = $Team_SchoolPrimaryColor>
<VAR $secondaryColor = $Team_SchoolSecondaryColor>
<IFEMPTY $primaryColor> <VAR $primaryColor = "#FF883D"> </IFEMPTY>
<IFEMPTY $secondaryColor> <VAR $secondaryColor = "#333399"> </IFEMPTY>

<div class="team_color" style="background-color:{$primaryColor}" /></div>
<div class="team_color" style="background-color:{$secondaryColor}" ></div>
<div class="team_color" style="background-color:{$marginColor}" ></div>

###<IFEQUAL $sqlSportName baseball>###
###<VAR $sportyear = 2008>###
###<ELSE>###
###<VAR $sportyear = 2008>###
###</IFEQUAL>###

<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$form_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $confWins = $TeamSeasonStats_Win>
<VAR $confLosses = $TeamSeasonStats_Loss>

<VAR $statType = "overall">
<VAR $TeamSeasonStats_query = "">
<QUERY name=TeamSeasonStats ID=$form_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $overallWins = $TeamSeasonStats_Win>
<VAR $overallLosses = $TeamSeasonStats_Loss>

###<table><tr><td colspan="2">###

<DIV align="left">

<h2 class="teamTitleText">{$Team_TeamName} {$Team_TeamNickname} ({$Team_SportName})</h2>
###<p class="teamTitleText">{$Team_TeamName} {$Team_TeamNickname} ({$Team_SportName})</p></td></tr>###
</div>
###<tr>###
###HERE IS A TD THAT PROBABLY SHOULD GO###
###<td colspan="2">###
<QUERY name=TeamPhoto prefix=TeamLogo ID=$form_TeamID PATHID=2>
<IFNOTEMPTY $TeamLogo_UploadFile>
###<img src="{$webURL}graphics/team/{$TeamLogo_UploadFile}" />###

<img src="http://denver-tpweb.newsengin.com/web/graphics/team/{$TeamLogo_UploadFile}" alt="{$Team_TeamName} Photo" style="float:left; margin-right:5px;" />
<ELSE>
<IFEQUAL $sportName "Football">
<img src="{$webURL}graphics/nophotofootball.jpg" height="100" width="100" />
<ELSE>
<img src="{$webURL}graphics/nophoto.jpg" height="50" width="50" />
</IFEQUAL>
</IFNOTEMPTY>

<div id="map-field" style="float:right; width:250px;">
<?PHP
$Map_Address = str_replace(" ", "+", trim($Team_SchoolAddress) . "&csz=" . trim($Team_SchoolCity . ",+" . $Team_SchoolState . "+" . $Team_SchoolZip));
?>
<p>
<a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title=""><img src="http://extras.denverpost.com/media/gif/preps_map.gif" alt="" border="0" ><br>
<strong>Get a map and directions to the school</strong></a></p>
<!-- 
<iframe width="250" height="350" frameborder="no" scrolling="no" marginheight="0" marginwidth="0" src="http://www.google.com/maps?q={$Team_SchoolAddress_Map}++{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&daddr={$Team_SchoolAddress_Map_daddr},+{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&saddr=&rl=1&ie=UTF8&spn=0.006299,0.008186&om=1&t=h&output=embed&s=AARTsJrOjBYtr_dwKMcvP1Et7hOVIqq7Nw"></iframe><br/><a href="http://www.google.com/maps?q={$Team_SchoolAddress_Map}++{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&daddr={$Team_SchoolAddress_Map_daddr},+{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&saddr=&rl=1&ie=UTF8&ll=39.693765,-105.081589&spn=0.006299,0.008186&om=1&t=h&source=embed" style="color:#0000FF;text-align:left;font-size:small">View Larger Map</a> 
-->
</div>

<DIV align="left">
<p class="teamAddressBox">
<span class="teamLeftBoxText">
<IFNOTEMPTY $Team_SchoolAddress>
<i>{$Team_SchoolAddress}</i>
</IFNOTEMPTY>

<IFNOTEMPTY $Team_SchoolAddressLine2>{$Team_SchoolAddressLine2}
</IFNOTEMPTY>

<IFNOTEMPTY $Team_SchoolCity>
<br />{$Team_SchoolCity}, {$Team_SchoolState} {$Team_SchoolZip}
</IFNOTEMPTY><br />

<IFNOTEMPTY $Team_SchoolURL>
<a href="{$Team_SchoolURL}">{$Team_SchoolURL}</a>
</IFNOTEMPTY> 
</span>

<IFNOTEMPTY $Team_SchoolEmailAddress>
<span class="teamLeftBoxText">
{$Team_SchoolEmailAddress}
</span>
</IFNOTEMPTY><br />

<IFNOTEMPTY $Team_SchoolPhone>
<span class="teamLeftBoxText">
{$Team_SchoolPhone}
</span>
</IFNOTEMPTY>

<IFNOTEMPTY $Team_SchoolFax>
 <span class="teamLeftBoxText">Fax: {$Team_SchoolFax}</span>
</IFNOTEMPTY><br />

<span class="teamLeftBoxText">
<strong>Conference: </strong>{$Team_ConferenceName}</span>
<span class="teamLeftBoxText"> <strong>Class: </strong>{$Team_ClassName}</span>
<IFNOTEMPTY $Team_DistrictName>
<br /><span class="teamLeftBoxText">District {$Team_DistrictName}</span>
</IFNOTEMPTY>
<DIV align="left">

</p>
###THIS IS COMMENTED OUT RIGHT NOW; FARTHER DOWN, IDENTICAL CODE IS THERE###
###FOR "TYPE 0" SPORTS SUCH AS FOOTBALL###
###<p class="teamLeftBoxText"><br />
<strong>Current record: </strong><?PHP if ($overallWins != "" && $overallLosses != "") { ?>
<a href="{$externalURL}site=default&tpl=Standings&SearchType=Standings&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}">
{$overallWins}-{$overallLosses}
</a>
<?PHP } ?>
<?PHP if ($confWins != "" && $confLosses != "") { ?>
 (Conference: 
<a href="{$externalURL}site=default&tpl=Standings&SearchType=Standings&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}">
{$confWins}-{$confLosses}</a>)
<?PHP } ?>
</p>###


<p class="teamLeftBoxText">
<IFNOTEMPTY $Team_TeamHeadCoach><strong>Head coach: </strong> {$Team_TeamHeadCoach}<br /></IFNOTEMPTY>
<IFNOTEMPTY $Team_TeamAssistantCoaches>
<VAR $assistantCoaches = str_replace("\r\n",", ",trim($Team_TeamAssistantCoaches))>
Assistant coaches: {$assistantCoaches}
</IFNOTEMPTY>
</p>

<br />


<IFNOTEQUAL $sportType 1>
###<tr><td colspan="2">###
<font class="teamLeftBoxText"><br />
<strong>Current record:</strong>  <?PHP if ($overallWins != "" && $overallLosses != "") { ?>
<a href="{$externalURL}site=default&tpl=Standings&SearchType=Standings&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}">
{$overallWins}-{$overallLosses}
</a>
<?PHP } ?>
<?PHP if ($confWins != "" && $confLosses != "") { ?>
 (Conference: 
<a href="{$externalURL}site=default&tpl=Standings&SearchType=Standings&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}">
{$confWins}-{$confLosses}</a>)
<?PHP } ?>
</font>
###</td></tr>###
</IFNOTEQUAL>
<VAR $Team_TeamHeadCoach = fixApostrophes($Team_TeamHeadCoach)>
<VAR $Team_TeamAssistantCoaches = fixApostrophes($Team_TeamAssistantCoaches)>
###<tr><td colspan="2"><font class="teamLeftBoxText"><IFNOTEMPTY $Team_TeamHeadCoach><b>Head coach: </b>{$Team_TeamHeadCoach}<br /></IFNOTEMPTY>
<IFNOTEMPTY $Team_TeamAssistantCoaches>
<VAR $assistantCoaches = str_replace("\r\n",", ",trim($Team_TeamAssistantCoaches))>
Assistant coaches: {$assistantCoaches}
</IFNOTEMPTY>###
</font></td></tr>

###</table>###

<br />
<QUERY name=TeamPhoto ID=$form_TeamID PATHID=3>
<IFNOTEMPTY $TeamPhoto_UploadFile>
<img src="{$webURL}graphics/team/{$TeamPhoto_UploadFile}" /><p>
</IFNOTEMPTY>

<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=TeamStats_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=TeamStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=TeamStats_Baseball>
</IFEQUAL>
<br />

<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=TeamPlayerStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=TeamPlayerStats_Football>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=TeamPlayerStats_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Cross Country">
<INCLUDE site=default tpl=TeamPlayerStats_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Girls Cross Country">
<INCLUDE site=default tpl=TeamPlayerStats_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Boys Golf">
<INCLUDE site=default tpl=TeamPlayerStats_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Girls Golf">
<INCLUDE site=default tpl=TeamPlayerStats_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Boys Tennis">
<INCLUDE site=default tpl=TeamPlayerStats_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Girls Tennis">
<INCLUDE site=default tpl=TeamPlayerStats_Tennis>
</IFEQUAL>

<br /><br />
<IFEQUAL $sportType 1>
<QUERY name=TeamMeetSchedule TEAMID=$form_TeamID SPORTNAME=$sqlSportName>
<VAR $meetCount = count($TeamMeetSchedule_rows)>
<IFGREATER $meetCount 0>
<table cellpadding="0" cellspacing="0" class="schedTable">
<tr><td colspan="50"><font class="pageTitle">Schedule</FONT></td></tr>
</table>

<div class="schedDiv">
<table cellpadding="0" cellspacing="0" class="schedTable">
<tr class="resultsText">
<td><b>Date</b></td>
<td><b>Meet name</b></td>
<?PHP if ($sportName == "Boys Tennis" || $sportName == "Girls Tennis") { ?>
<?PHP } else { ?>
<td><b>Score</b></td>
<?PHP } ?>
<td> </td>
</tr>
<VAR $rowClass="schedRow trRow">
<RESULTS list=TeamMeetSchedule_rows prefix=Meet>
<VAR $Meet_GameMeetName = fixApostrophes($Meet_GameMeetName)>
<VAR $Meet_SchoolName = fixApostrophes($Meet_SchoolName)>
<tr class="{$rowClass}">
<td><VAR $gameDate = date("D n/d",strtotime($Meet_GameDate))>
{$gameDate}<br />
<VAR $gameTime = date("g:i a",strtotime($Meet_GameTime))>
{$gameTime}
</td>
<td valign="top">
{$Meet_GameMeetName}
<IFNOTEMPTY $Meet_SchoolName>
<br />at {$Meet_SchoolName}
</IFNOTEMPTY>
</td>
<td valign="top">
<?PHP if ($sportName == "Boys Golf" || $sportName == "Girls Golf") { ?>
{$Meet_TotalStrokes}
<?PHP } elseif ($sportName == "Boys Tennis" || $sportName == "Girls Tennis") { ?>
###{$Meet_Points}###
<?PHP } else { ?>
{$Meet_Score}
<?PHP } ?>
</td>
<td valign="top">
<?PHP if($Meet_GameStatStatus == "3") { ?>
<A HREF="{$externalURL}site=default&tpl=Boxscore&ID={$Meet_GameID}">Summary</a>
<?PHP } ?>
</td>
</tr>
<IFEQUAL $rowClass "schedRow trRow">
<VAR $rowClass = "schedRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "schedRow trRow">
</IFEQUAL>
</RESULTS>
</table>
</div>
</IFGREATER>

<ELSE>

<VAR $pointsClause = "">
<?PHP if ($sportName == "Football" || $sportName == "Boys Basketball") { ?>
<VAR $pointsClause = ",awayteamstats.TotalPoints as AwayTeamPoints,hometeamstats.TotalPoints as HomeTeamPoints">
<?PHP } elseif ($sportName == "Baseball") { ?>
<VAR $pointsClause = ",awayteamstats.Runs as AwayTeamPoints,hometeamstats.Runs as HomeTeamPoints">
<?PHP } ?>
<QUERY name=TeamSchedule TEAMID=$form_TeamID SPORTNAME=$sqlSportName POINTSCLAUSE=$pointsClause>
<VAR $gameCount = count($TeamSchedule_rows)>
<IFGREATER $gameCount 0>
<table cellpadding="0" cellspacing="0" class="schedTable">
<tr><td colspan="50"><font class="pageTitle">Schedule</FONT></td></tr>
</table>
<DIV CLASS="schedDiv">
<table cellpadding="0" cellspacing="0" class="schedTable">
<tr class="resultsText">
<td><b>Date</b></td>
<td><b>Away</b></td>
<td> </td>
<td><b>Home</b></td>
<td> </td>
<td><b>Conference</b></td>
<td> </td>
</tr>

<VAR $rowClass="schedRow trRow">
<RESULTS list=TeamSchedule_rows prefix=Game>
<tr class="{$rowClass}">
<td><VAR $gameDate = date("D n/d",strtotime($Game_GameDate))>
{$gameDate}<br />
<VAR $gameTime = date("g:i a",strtotime($Game_GameTime))>
{$gameTime}
</td>
<VAR $Game_AwayTeamName = fixApostrophes($Game_AwayTeamName)>
<VAR $Game_HomeTeamName = fixApostrophes($Game_HomeTeamName)>
<td valign="top">
<IFNOTEQUAL $Game_AwayTeamID $form_TeamID>
<A HREF="{$externalURL}site=default&tpl=Team&TeamID={$Game_AwayTeamID}&SearchType=Teams">
</IFNOTEQUAL>
<?PHP if ($Game_GameStatStatus == "3") { ?>
<IFGREATER $Game_AwayTeamPoints $Game_HomeTeamPoints>
<b>{$Game_AwayTeamName}</b>
<ELSE>
{$Game_AwayTeamName}
</IFGREATER>
<ELSE>
{$Game_AwayTeamName}
<?PHP } ?>
<IFNOTEQUAL $Game_AwayTeamID $form_ID></a></IFNOTEQUAL>
</td>
<td valign="top">
<?PHP if($Game_GameStatStatus == "3") { ?>
{$Game_AwayTeamPoints}
<?PHP } ?>
</td>
<td valign="top">
<IFNOTEQUAL $Game_HomeTeamID $form_TeamID>
<A HREF="{$externalURL}site=default&tpl=Team&TeamID={$Game_HomeTeamID}&SearchType=Teams">
</IFNOTEQUAL>
<?PHP if ($Game_GameStatStatus == "3") { ?>
<IFGREATER $Game_HomeTeamPoints $Game_AwayTeamPoints>
<b>{$Game_HomeTeamName}</b>
<ELSE>
{$Game_HomeTeamName}
</IFGREATER>
<ELSE>
{$Game_HomeTeamName}
<?PHP } ?>
<IFNOTEQUAL $Game_HomeTeamID $form_TeamID></a></IFNOTEQUAL>
<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>
<br />(at {$Game_SchoolName})
</IFNOTEQUAL>
</td>
<td valign="top">
<?PHP if($Game_GameStatStatus == "3") { ?>
{$Game_HomeTeamPoints}
<?PHP } ?>
</td>
<td valign="top">
<IFEQUAL $Game_GameIsConference 1>
Yes
<ELSE>
No
</IFEQUAL>
</td>
<td valign="top">
<?PHP if($Game_GameStatStatus == "3") { ?>
<A HREF="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">Boxscore</a>
</td>
<?PHP } ?>
</tr>

<IFEQUAL $rowClass "schedRow trRow">
<VAR $rowClass = "schedRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "schedRow trRow">
</IFEQUAL>
</RESULTS>
</TABLE>
</DIV>
</IFGREATER>

</IFEQUAL>

<br /><br />
<QUERY name=TeamRoster ID=$form_TeamID>
<VAR $rosterCount = count($TeamRoster_rows)>
<IFGREATER $rosterCount 0>
<table class="teamRosterTable" cellpadding="0" cellspacing="0">
<tr><td colspan="50"><font class="pageTitle">Roster</font></td></tr>
<tr class="resultsText">
<IFNOTEQUAL $sportType 1><td><b>Number</b></td></IFNOTEQUAL>
<td><b>Player name</b></td>
<td><b>Height</b></td>
<td><b>Weight</b></td>
<td><b>Year</b></td>
<IFNOTEQUAL $sportType 1><td><b>Position</b></td></IFNOTEQUAL>
</tr>
<VAR $rowClass = "rosterRow trRow">
<RESULTS list=TeamRoster_rows prefix=Roster>
<tr class="{$rowClass}">
<IFNOTEQUAL $sportType 1>
<td>{$Roster_TeamRosterPlayerNumber}</td></IFNOTEQUAL>
<td>
<VAR $playerName = fixApostrophes($Roster_PlayerFirstName." ".$Roster_PlayerLastName)>
<a href="home.html?site=default&tpl=Player&ID={$Roster_PlayerID}">{$playerName}</a></td>
<td><IFNOTEQUAL $Roster_PlayerHeightFeet 0>{$Roster_PlayerHeightFeet}'</IFNOTEQUAL>
<IFNOTEQUAL $Roster_PlayerHeightInches 0>{$Roster_PlayerHeightInches}"</IFNOTEQUAL>
</td>
<td><IFNOTEQUAL $Roster_PlayerWeight 0>{$Roster_PlayerWeight}</IFNOTEQUAL></td>
<td>{$Roster_PlayerYear}</td>
<IFNOTEQUAL $sportType 1>
<td>{$Roster_TeamRosterPosition}
<IFNOTEMPTY $Roster_TeamRosterAdditionalPositions>
,{$Roster_TeamRosterAdditionalPositions}</IFNOTEMPTY></td>
</IFNOTEQUAL>
</tr>
<IFEQUAL $rowClass "rosterRow trRow">
<VAR $rowClass = "rosterRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "rosterRow trRow">
</IFEQUAL>
</RESULTS>
</table>
</IFGREATER>