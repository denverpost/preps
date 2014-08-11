<VAR $statType = "conf">
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
{$Home_TeamName} {$Home_FinalScore}, {$Away_TeamName} {$Away_FinalScore}
<ELSE>
{$Away_TeamName} {$Away_FinalScore}, {$Home_TeamName} {$Home_FinalScore}
</IFGREATER>
 - <IFEQUAL $Game_GameScoreIsFinal 1>
Final
<ELSE>
In progress
</IFEQUAL>
</h1>
<h2 class="list"><VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))." ".date("g:ia",strtotime($Game_GameTime))>
{$dateTimeDisplay}</h2>
<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td>{$Away_TeamName}</td>
<td><strong>Overall:</strong> {$awayOverallWins}-{$awayOverallLosses} </td>
<td><strong>Conference:</strong> {$awayConfWins}-{$awayConfLosses}</td></tr>
<tr><td>{$Home_TeamName}</td>
<td><strong>Overall:</strong> {$homeOverallWins}-{$homeOverallLosses} </td>
<td><strong>Conference:</strong> {$homeConfWins}-{$homeConfLosses}</td></tr>
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
            <th scope="col" abbr="">5</th>
            <th scope="col" abbr="">Final</th>
        </tr>
        <tr>
            <td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
<strong>{$Away_TeamName}</strong></a></td>
<td align="right">{$Away_Game1Points}</td>
<td align="right">{$Away_Game2Points}</td>
<td align="right">{$Away_Game3Points}</td>
<td align="right">{$Away_Game4Points}</td>
<td align="right">{$Away_Game5Points}</td>
<td align="right">{$Away_FinalScore}</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
<strong>{$Home_TeamName}</strong></a></td>
<td align="right">{$Home_Game1Points}</td>
<td align="right">{$Home_Game2Points}</td>
<td align="right">{$Home_Game3Points}</td>
<td align="right">{$Home_Game4Points}</td>
<td align="right">{$Home_Game5Points}</td>
<td align="right">{$Home_FinalScore}</td>
</table>

<br /><br />
<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>
<h4>{$Away_TeamName}</h4>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$awayTeamID SPORTNAME=$sqlSportName>
<!-- query: {$GamePlayerStats_query} -->
<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING = 0>
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Player Name</th>
            <th scope="col" abbr="">GP</th>
            <th scope="col" abbr="">K</th>
            <th scope="col" abbr="">E</th>
            <th scope="col" abbr="">TotAtt</th>
            <th scope="col" abbr="">H%</th>
            <th scope="col" abbr="">Asst</th>
            <th scope="col" abbr="">SA</th>
            <th scope="col" abbr="">SvcErr</th>
            <th scope="col" abbr="">RecErr</th>
            <th scope="col" abbr="">Digs</th>
            <th scope="col" abbr="">BlkSolos</th>
            <th scope="col" abbr="">BlkAsst</th>
            <th scope="col" abbr="">BlkErr</th>
            <th scope="col" abbr="">BHE</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=PlayerStats>
<IFGREATER $PlayerStats_TotalAttempts 0>
<?PHP $hitPercentage = round(($PlayerStats_Kills-$PlayerStats_Errors)/$PlayerStats_TotalAttempts, 2) * 100 . "%"; ?>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
        <tr class="{$rowClass}">
            <td width="120">
                <a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}"><VAR $playerName = fixApostrophes($PlayerStats_PlayerLastName.", ".$PlayerStats_PlayerFirstName)>{$playerName}</a>
            </td>
            <td align="right">{$PlayerStats_GamesPlayed}</td>
            <td align="right">{$PlayerStats_Kills}</td>
            <td align="right">{$PlayerStats_Errors}</td>
            <td align="right">{$PlayerStats_TotalAttempts}</td>
            <td align="right">{$hitPercentage}</td>
            <td align="right">{$PlayerStats_Assists}</td>
            <td align="right">{$PlayerStats_ServiceAces}</td>
            <td align="right">{$PlayerStats_ServiceErrors}</td>
            <td align="right">{$PlayerStats_ReceivingErrors}</td>
            <td align="right">{$PlayerStats_Digs}</td>
            <td align="right">{$PlayerStats_BlockSolos}</td>
            <td align="right">{$PlayerStats_BlockAssists}</td>
            <td align="right">{$PlayerStats_BlockErrors}</td>
            <td align="right">{$PlayerStats_BallHandlingErrors}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
<IFGREATER $Away_TotalAttempts 0>
<VAR $hitPercentage = ($Away_TotalKills-$Away_TotalErrors)/$Away_TotalAttempts>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
        <tr class="{$rowClass}">
            <td width="120">
                Totals 
            </td>
            <td align="right"></td>
            <td align="right">{$Away_TotalKills}</td>
            <td align="right">{$Away_TotalErrors}</td>
            <td align="right">{$Away_TotalAttempts}</td>
            <td align="right">{$hitPercentage}</td>
            <td align="right">{$Away_Assists}</td>
            <td align="right">{$Away_ServiceAces}</td>
            <td align="right">{$Away_ServiceErrors}</td>
            <td align="right">{$Away_ReceivingErrors}</td>
            <td align="right">{$Away_Digs}</td>
            <td align="right">{$Away_BlockSolos}</td>
            <td align="right">{$Away_BlockAssists}</td>
            <td align="right">{$Away_BlockErrors}</td>
            <td align="right">{$Away_BallHandlingErrors}</td>
        </tr>
    </tbody>
</table>


<h4>{$Home_TeamName}</h4>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$homeTeamID SPORTNAME=$sqlSportName>
<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING = 0>
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Player Name</th>
            <th scope="col" abbr="">GP</th>
            <th scope="col" abbr="">K</th>
            <th scope="col" abbr="">E</th>
            <th scope="col" abbr="">TotAtt</th>
            <th scope="col" abbr="">H%</th>
            <th scope="col" abbr="">Asst</th>
            <th scope="col" abbr="">SA</th>
            <th scope="col" abbr="">SvcErr</th>
            <th scope="col" abbr="">RecErr</th>
            <th scope="col" abbr="">Digs</th>
            <th scope="col" abbr="">BlkSolos</th>
            <th scope="col" abbr="">BlkAsst</th>
            <th scope="col" abbr="">BlkErr</th>
            <th scope="col" abbr="">BHE</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=PlayerStats>
<IFGREATER $PlayerStats_TotalAttempts 0>
<VAR $hitPercentage = ($PlayerStats_TotalKills-$PlayerStats_TotalErrors)/$PlayerStats_TotalAttempts>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
        <tr class="{$rowClass}">
            <td width="120">
                <a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}"><VAR $playerName = fixApostrophes($PlayerStats_PlayerLastName.", ".$PlayerStats_PlayerFirstName)>{$playerName}</a>
            </td>
            <td align="right">{$PlayerStats_GamesPlayed}</td>
            <td align="right">{$PlayerStats_TotalKills}</td>
            <td align="right">{$PlayerStats_TotalErrors}</td>
            <td align="right">{$PlayerStats_TotalAttempts}</td>
            <td align="right">{$hitPercentage}</td>
            <td align="right">{$PlayerStats_Assists}</td>
            <td align="right">{$PlayerStats_ServiceAces}</td>
            <td align="right">{$PlayerStats_ServiceErrors}</td>
            <td align="right">{$PlayerStats_ReceivingErrors}</td>
            <td align="right">{$PlayerStats_Digs}</td>
            <td align="right">{$PlayerStats_BlockSolos}</td>
            <td align="right">{$PlayerStats_BlockAssists}</td>
            <td align="right">{$PlayerStats_BlockErrors}</td>
            <td align="right">{$PlayerStats_BallHandlingErrors}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
<IFGREATER $Home_TotalAttempts 0>
<VAR $hitPercentage = round(($Home_TotalKills-$Home_TotalErrors)/$Home_TotalAttempts,2)>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
        <tr class="{$rowClass}">
            <td width="120">
                Totals
            </td>
            <td align="right"></td>
            <td align="right">{$Home_TotalKills}</td>
            <td align="right">{$Home_TotalErrors}</td>
            <td align="right">{$Home_TotalAttempts}</td>
            <td align="right">{$hitPercentage}</td>
            <td align="right">{$Home_Assists}</td>
            <td align="right">{$Home_ServiceAces}</td>
            <td align="right">{$Home_ServiceErrors}</td>
            <td align="right">{$Home_ReceivingErrors}</td>
            <td align="right">{$Home_Digs}</td>
            <td align="right">{$Home_BlockSolos}</td>
            <td align="right">{$Home_BlockAssists}</td>
            <td align="right">{$Home_BlockErrors}</td>
            <td align="right">{$Home_BallHandlingErrors}</td>
        </tr>
    </tbody>
</table>
