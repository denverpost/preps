<VAR $domainURL = "http://preps.denverpost.com">
<VAR $statType = "conf">
<VAR $dash = chr(151)>
<VAR $period = ".">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "TeamSeasonStats">
<VAR $statType = "conf">

<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>
<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>



<h1>
<IFGREATER $Home_TotalPoints $Away_TotalPoints>
{$Home_TeamName} {$Home_TotalPoints}, {$Away_TeamName} {$Away_TotalPoints}
<ELSE>
{$Away_TeamName} {$Away_TotalPoints}, {$Home_TeamName} {$Home_TotalPoints}
</IFGREATER>
<IFEQUAL $Game_GameScoreIsFinal 1>
- Final
<ELSE>
</IFEQUAL>
</h1>
<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>
<h2 class="list">{$timeDateDisplay}</h2>
<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
         <tbody>
	<tr>
         	<td>{$Away_TeamName}</td>
		<td>Overall: {$awayOverallWins}-{$awayOverallLosses} </td>
		<td>Conference: {$awayConfWins}-{$awayConfLosses}</td>
	</tr>
	        <tr class="trAlt">
		<td>{$Home_TeamName}</td>
		<td>Overall: {$homeOverallWins}-{$homeOverallLosses} </td>
		<td>Conference: {$homeConfWins}-{$homeConfLosses}</td>
	</tr>
    </tbody>
</table>
<h4>Boxscore</h4>
<table class="boxscoreStatTable deluxe wide400" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="">1</th>
            <th scope="col" abbr="">2</th>
            <th scope="col" abbr="">3</th>
            <th scope="col" abbr="">4</th>
<IFTRUE $Away_OvertimePoints !=0 || $Home_OvertimePoints !=0>
            <th scope="col" abbr="">OT</th>
<ELSE>
</IFTRUE>
<IFTRUE $Away_Overtime2Points !=0 || $Home_Overtime2Points !=0>
            <th scope="col" abbr="">2OT</th>
<ELSE>
</IFTRUE>
            <th scope="col" abbr="">Total</th>
</tr>
        <tr>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
                <strong>{$Away_TeamName}</strong></a></td>
            <td align="right">{$Away_FirstQuarterPoints}</td>
            <td align="right">{$Away_SecondQuarterPoints}</td>
            <td align="right">{$Away_ThirdQuarterPoints}</td>
            <td align="right">{$Away_FourthQuarterPoints}</td>
<IFEMPTY $Away_OvertimePoints>
<$VAR $Away_OvertimePoints = 0>
<ELSE>
</IFEMPTY>
<IFEMPTY $Away_Overtime2Points>
<$VAR $Away_Overtime2Points = 0>
<ELSE>
</IFEMPTY>
<IFEMPTY $Home_OvertimePoints>
<$VAR $Home_OvertimePoints = 0>
<ELSE>
</IFEMPTY>
<IFEMPTY $Home_Overtime2Points>
<$VAR $Home_Overtime2Points = 0>
<ELSE>
</IFEMPTY>
<IFTRUE $Away_OvertimePoints != 0 || $Home_OvertimePoints !=0>
            <td align="right">{$Away_OvertimePoints}</td>
<ELSE>
</IFTRUE>
<IFTRUE $Away_Overtime2Points !=0 || $Home_Overtime2Points !=0>
            <td align="right">{$Away_Overtime2Points}</td>
<ELSE>
</IFTRUE>
            <td align="right">{$Away_TotalPoints}</td>
        </tr>
        <tr>
        <tr class="trAlt">
        <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
                <strong>{$Home_TeamName}</strong></a></td>
            <td align="right">{$Home_FirstQuarterPoints}</td>
            <td align="right">{$Home_SecondQuarterPoints}</td>
            <td align="right">{$Home_ThirdQuarterPoints}</td>
            <td align="right">{$Home_FourthQuarterPoints}</td>
<IFTRUE $Away_OvertimePoints !=0 || $Home_OvertimePoints !=0>
            <td align="right">{$Home_OvertimePoints}</td>
<ELSE>
</IFTRUE>
<IFTRUE $Away_Overtime2Points !=0 || $Home_Overtime2Points !=0>
            <td align="right">{$Home_Overtime2Points}</td>
<ELSE>
</IFTRUE>



            <td align="right">{$Home_TotalPoints}</td>
        </tr>
    </tbody>
</table>


<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<h3>{$teamNames[$teamKey]} Player Stats</h3>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count(GamePlayerStats_rows) 0>
<table class="boxscoreStatTable deluxe wide600" WIDTH=600 CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="" align="right">Pts</th>
            <th scope="col" abbr="" align="right">FG</th>
            <th scope="col" abbr="" align="right">3P</th>
            <th scope="col" abbr="" align="right">FT</th>
            <th scope="col" abbr="" align="right">Reb</th>
            <th scope="col" abbr="" align="right">PF</th>
            <th scope="col" abbr="" align="right">TF</Att</th>
            <th scope="col" abbr="" align="right">Asst</th>
            <th scope="col" abbr="" align="right">ST</th>
            <th scope="col" abbr="" align="right">BS</th>
            <th scope="col" abbr="" align="right">TO</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Scoring>

<IFTRUE $Scoring_FieldGoalsAttempted != 0 || $Scoring_ThreePointersAttempted != 0  || $Scoring_FreeThrowsAttempted != 0 || $Scoring_Assists != 0 || $Scoring_PersonalFouls != 0 || $Scoring_Technicals != 0 || $Scoring_TotalRebounds != 0 || $Scoring_Steals != 0 || $Scoring_BlockedShots != 0 || $Scoring_Turnovers != 0 || $Scoring_Played !=0 || $Scoring_Points !=0> 
        <tr class="{$rowClass}">
            <td width="120">
                <a href="{$externalURL}site=default&tpl=Player&ID={$Scoring_PlayerID}">
<VAR $LastName = fixApostrophes($Scoring_PlayerLastName)>
                    {$Scoring_PlayerFirstName} {$LastName}
                </a>
            </td>
            <td align="right">{$Scoring_Points}</td>
            <td align="right">{$Scoring_FieldGoalsMade}-{$Scoring_FieldGoalsAttempted}</td>
            <td align="right"> {$Scoring_ThreePointersMade}-{$Scoring_ThreePointersAttempted}</td>
            <td align="right">{$Scoring_FreeThrowsMade}-{$Scoring_FreeThrowsAttempted}</td>
            <td align="right">{$Scoring_TotalRebounds}</td>
            <td align="right">{$Scoring_PersonalFouls}</td>
            <td align="right">{$Scoring_Technicals}</td>
            <td align="right">{$Scoring_Assists}</td>
            <td align="right">{$Scoring_Steals}</td>
            <td align="right">{$Scoring_BlockedShots}</td>
            <td align="right">{$Scoring_Turnovers}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFTRUE>
</RESULTS>
    </tbody>
</table>

###</IFTRUE>###
###</RESULTS>###
###</table>###
<?PHP } ?>
</IFGREATER>
