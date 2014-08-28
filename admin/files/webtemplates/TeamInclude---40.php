<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">

<IFEMPTY $form_TeamID>
	<font class="pageText">Please select a team in the search box above.</font>
	<?PHP exit() ?>
</IFEMPTY>

<QUERY name=Team ID=$form_TeamID>
<VAR $sportName = $Team_SportName>
<VAR $sqlSportName = strtolower(convertForSQL($sportName))>

<VAR $primaryColor = $Team_SchoolPrimaryColor>
<VAR $secondaryColor = $Team_SchoolSecondaryColor>
<IFEMPTY $primaryColor> <VAR $primaryColor = "#FF883D"> </IFEMPTY>
<IFEMPTY $secondaryColor> <VAR $secondaryColor = "#333399"> </IFEMPTY>

<div class="team_color" style="background-color:{$primaryColor}" /></div>
<div class="team_color" style="background-color:{$secondaryColor}" ></div>

<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$form_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $confWins = $TeamSeasonStats_Win>
<VAR $confLosses = $TeamSeasonStats_Loss>

<VAR $statType = "overall">
<VAR $TeamSeasonStats_query = "">
<QUERY name=TeamSeasonStats ID=$form_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $overallWins = $TeamSeasonStats_Win>
<VAR $overallLosses = $TeamSeasonStats_Loss>


<h2 class="teamTitleText">{$Team_TeamName} {$Team_TeamNickname} ({$Team_SportName})</h2>
<QUERY name=TeamPhoto ID=$form_TeamID PATHID=2>
<IFNOTEMPTY $TeamPhoto_UploadFile>
<img src="http://denver-tpweb.newsengin.com/web/graphics/team/{$TeamPhoto_UploadFile}" alt="{$Team_TeamName} Photo" style="float:left; margin-right:5px;" />
</IFNOTEMPTY>

<QUERY name=TeamPhoto prefix=TeamLogo ID=$form_TeamID PATHID=1>
<IFNOTEMPTY $TeamLogo_UploadFile>
<img src="http://denver-tpweb.newsengin.com/web/graphics/team/{$TeamLogo_UploadFile}" alt="{$Team_TeamName} Logo" style="float:left; margin-right:5px;" />
</IFNOTEMPTY>

<div id="map-field" style="float:right; width:250px;">
<?PHP 
$Team_SchoolCity_Map = str_replace(" ", "+", $Team_SchoolCity);
$Team_SchoolAddress_Map = str_replace(" ", "+", $Team_SchoolAddress);
$Team_SchoolAddress_Map_daddr = str_replace(".", "", $Team_SchoolAddress_Map);
?>
<p>

<!-- <a href="http://www.google.com/maps?q={$Team_SchoolAddress_Map}++{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&daddr={$Team_SchoolAddress_Map_daddr},+{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&saddr=&rl=1&ie=UTF8&spn=0.006299,0.008186&om=1&t=h"> -->

<a href="http://maps.yahoo.com/py/maps.py?addr={$Team_SchoolAddress_Map}&csz={$Team_SchoolCity_Map},+{$Team_SchoolState}+{$Team_SchoolZip}" title=""><img src="http://extras.denverpost.com/media/gif/preps_map.gif" alt="" border="0" ><br>
<strong>Get a map and directions to the field</strong></a></p>
<!-- 
<iframe width="250" height="350" frameborder="no" scrolling="no" marginheight="0" marginwidth="0" src="http://www.google.com/maps?q={$Team_SchoolAddress_Map}++{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&daddr={$Team_SchoolAddress_Map_daddr},+{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&saddr=&rl=1&ie=UTF8&spn=0.006299,0.008186&om=1&t=h&output=embed&s=AARTsJrOjBYtr_dwKMcvP1Et7hOVIqq7Nw"></iframe><br/><a href="http://www.google.com/maps?q={$Team_SchoolAddress_Map}++{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&daddr={$Team_SchoolAddress_Map_daddr},+{$Team_SchoolCity_Map},+CO+{$Team_SchoolZip}&saddr=&rl=1&ie=UTF8&ll=39.693765,-105.081589&spn=0.006299,0.008186&om=1&t=h&source=embed" style="color:#0000FF;text-align:left;font-size:small">View Larger Map</a> 
-->
</div>


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

<span class="teamLeftBoxText" id="TeamConference"><a href="{$externalURL}site=default&tpl=Standings&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}">{$Team_ConferenceName} Conference</a></span>
<span class="teamLeftBoxText" id="TeamClass">Class {$Team_ClassName}</span>
<IFNOTEMPTY $Team_DistrictName>
<br /><span class="teamLeftBoxText">District {$Team_DistrictName}</span>
</IFNOTEMPTY>

</p>

<p class="teamLeftBoxText"><br />
Current record: <?PHP if ($overallWins != "" && $overallLosses != "") { ?>
<a href="{$externalURL}site=default&tpl=Standings&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}">
{$overallWins}-{$overallLosses}
</a>
<?PHP } ?>
<?PHP if ($confWins != "" && $confLosses != "") { ?>
 (Conference: 
<a href="{$externalURL}site=default&tpl=Standings&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}">
{$confWins}-{$confLosses}</a>)
<?PHP } ?>
</p>


<p class="teamLeftBoxText">
<IFNOTEMPTY $Team_TeamHeadCoach>Head coach: {$Team_TeamHeadCoach}<br /></IFNOTEMPTY>
<IFNOTEMPTY $Team_TeamAssistantCoaches>
<VAR $assistantCoaches = str_replace("\r\n",", ",trim($Team_TeamAssistantCoaches))>
Assistant coaches: {$assistantCoaches}
</IFNOTEMPTY>
</p>


<br />




<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=TeamStats_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=TeamStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Basketball">
<INCLUDE site=default tpl=TeamStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=TeamStats_Baseball>
</IFEQUAL>
<br />

<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=TeamPlayerStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Basketball">
<INCLUDE site=default tpl=TeamPlayerStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=TeamPlayerStats_Football>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=TeamPlayerStats_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Field Hockey">
<INCLUDE site=default tpl=TeamPlayerStats_FieldHockey>
</IFEQUAL>
<IFEQUAL $sportName "Boys Soccer">
<INCLUDE site=default tpl=TeamPlayerStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Girls Soccer">
<INCLUDE site=default tpl=TeamPlayerStats_Soccer>
</IFEQUAL>

<br /><br />
<VAR $pointsClause = "">
<?PHP if ($sportName == "Football" || $sportName == "Boys Basketball") { ?>
<VAR $pointsClause = ",awayteamstats.TotalPoints as AwayTeamPoints,hometeamstats.TotalPoints as HomeTeamPoints">
<?PHP } ?>
<QUERY name=TeamSchedule TEAMID=$form_TeamID SPORTNAME=$sqlSportName POINTSCLAUSE=$pointsClause>
<VAR $gameCount = count($TeamSchedule_rows)>
<IFGREATER $gameCount 0>
<DIV CLASS="schedDiv">
<h3>Schedule</h3>
<table class="schedTable deluxe" cellpadding="0" cellspacing="0">
<tbody><tr id="header-sub">
<th scope="col" abbr="">Date</th>
<th scope="col" abbr="">Away</th>
<th scope="col" abbr=""></th>
<th scope="col" abbr="">Home</th>
<th scope="col" abbr=""></th>
<th scope="col" abbr="">Conference</th>
<th scope="col" abbr=""></th>
</tr>
<VAR $rowClass="schedRow trRow">
<RESULTS list=TeamSchedule_rows prefix=Game>
<tr class="{$rowClass}">
<th nowrap="nowrap" scope="row" abbr="Date and Time"><VAR $gameDate = date("D n/d",strtotime($Game_GameDate))>
{$gameDate}<br />
<VAR $gameTime = date("g:i a",strtotime($Game_GameTime))>
{$gameTime}
</th>
<td valign="top">
<IFNOTEQUAL $Game_AwayTeamID $form_TeamID>
<A HREF="{$externalURL}site=default&tpl=Team&TeamID={$Game_AwayTeamID}&Sport={$form_Sport}">
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
<A HREF="{$externalURL}site=default&tpl=Team&TeamID={$Game_HomeTeamID}">
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
<A HREF="{$domainURL}/boxscores/{$Game_GameID}" title="View the boxscore">Boxscore</a>
<?PHP } ?>
</td>
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

<br /><br />
<QUERY name=TeamRoster ID=$form_TeamID>
<VAR $rosterCount = count($TeamRoster_rows)>
<IFGREATER $rosterCount 0>
<h3>Roster</h3>
<table class="teamRosterTable deluxe" cellpadding="0" cellspacing="0">
<tbody><tr id="header-sub">
<th scope="col" abbr="Number">Number</th>
<th scope="col" abbr="Player name">Player name</th>
<th scope="col" abbr="Height">Height</th>
<th scope="col" abbr="Weight">Weight</th>
<th scope="col" abbr="Year">Year</th>
<th scope="col" abbr="Position">Position</th>
</tr>
<VAR $rowClass = "rosterRow trRow">
<RESULTS list=TeamRoster_rows prefix=Roster>
	<tr class="{$rowClass}">
	<td>{$Roster_TeamRosterPlayerNumber}</td>
	<th scope="row" abbr="{$Roster_PlayerFirstName} {$Roster_PlayerLastName}">
<?PHP
$player_name = $Roster_PlayerFirstName . ' ' . $Roster_PlayerLastName;
$player_slug = slugify($player_name);
?>
        <a href="{$domainURL}/players/{$player_slug}/{$Roster_PlayerID}/">{$player_name}</a></td>
	<td><IFNOTEQUAL $Roster_PlayerHeightFeet 0>{$Roster_PlayerHeightFeet}'</IFNOTEQUAL>
	<IFNOTEQUAL $Roster_PlayerHeightInches 0>{$Roster_PlayerHeightInches}"</IFNOTEQUAL>
	</td>
	<td><IFNOTEQUAL $Roster_PlayerWeight 0>{$Roster_PlayerWeight}</IFNOTEQUAL></td>
	<td>{$Roster_PlayerYear}</td>
	<td>{$Roster_TeamRosterPosition}
	<IFNOTEMPTY $Roster_TeamRosterAdditionalPositions>
	,{$Roster_TeamRosterAdditionalPositions}</IFNOTEMPTY></td>
	</tr>
	<IFEQUAL $rowClass "rosterRow trRow">
		<VAR $rowClass = "rosterRowAlternate trAlt">
	<ELSE>
		<VAR $rowClass = "rosterRow trRow">
	</IFEQUAL>
</RESULTS>
</tbody>
</table>
</IFGREATER>
