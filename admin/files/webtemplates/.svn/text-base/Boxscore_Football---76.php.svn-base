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
{$Home_TeamName} {$Home_TotalPoints}, {$Away_TeamName} {$Away_TotalPoints}
<ELSE>
{$Away_TeamName} {$Away_TotalPoints}, {$Home_TeamName} {$Home_TotalPoints}
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
<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
            <th scope="col" abbr="">1</th>
            <th scope="col" abbr="">2</th>
            <th scope="col" abbr="">3</th>
            <th scope="col" abbr="">4</th>
            <th scope="col" abbr="">OT</th>
            <th scope="col" abbr="">Total</th>
<ELSE>
            <th scope="col" abbr="">1</th>
            <th scope="col" abbr="">2</th>
            <th scope="col" abbr="">3</th>
            <th scope="col" abbr="">4</th>
            <th scope="col" abbr="">Total</th>
</IFGREATER>        </tr>
        <tr>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
                <strong>{$Away_TeamName}</strong></a></td>
            <td align="right">{$Away_FirstQuarterPoints}</td>
            <td align="right">{$Away_SecondQuarterPoints}</td>
            <td align="right">{$Away_ThirdQuarterPoints}</td>
            <td align="right">{$Away_FourthQuarterPoints}</td>

<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
            <td align="right">{$Away_OvertimePoints}</td>
<ELSE>
</IFGREATER>
            <td align="right">{$Away_TotalPoints}</td>
        </tr>
        <tr>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
                <strong>{$Home_TeamName}</strong></a></td>
            <td align="right">{$Home_FirstQuarterPoints}</td>
            <td align="right">{$Home_SecondQuarterPoints}</td>
            <td align="right">{$Home_ThirdQuarterPoints}</td>
            <td align="right">{$Home_FourthQuarterPoints}</td>
<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
            <td align="right">{$Home_OvertimePoints}</td>
<ELSE>
</IFGREATER>
            <td align="right">{$Home_TotalPoints}</td>
        </tr>
    </tbody>
</table>

<br /><br />


<QUERY name=GameScoringSummary GAMEID=$form_ID SPORTNAME=$sqlSportName>
<IFGREATER count(GameScoringSummary_rows) 0>
<VAR $rowClass = "boxscoreRow trRow">
<h4>Scoring summary</h4>

<table class="boxscoreStatTable deluxe" width="450" cellpadding="0" cellspacing="0">
    <tbody>
<RESULTS list=GameScoringSummary_rows prefix=Summary>

<IFNOTEQUAL $Summary_SummaryPlayer2 0>

<tr class="{$rowClass}">
<td valign=top>
<strong>{$Summary_TeamCode} {$dash} </strong>
<IFNOTEMPTY $Summary_SummaryPlayer2>

<VAR $lastName = fixApostrophes($Summary_SummPlayer2LastName)>

{$Summary_SummPlayer2FirstName} {$lastName},
<ELSE>
{$Summary_SummPlayer1FirstName} {$lastName},
</IFNOTEMPTY>
<IFGREATER $Summary_SummaryPlayLength 0>
 {$Summary_SummaryPlayLength}-yard <?PHP echo(strtolower($Summary_SummaryPlayType)); ?>
<ELSE>
 {$Summary_SummaryPlayType}
</IFGREATER>
<IFEQUAL $Summary_SummaryPlayType "Interception">
 return
<ELSE>
</IFEQUAL>
<IFEQUAL $Summary_SummaryPlayType "Pass">

<IFNOTEMPTY $Summary_SummaryPlayer2>
<VAR $lastName = fixApostrophes($Summary_SummPlayer1LastName)>
 from {$Summary_SummPlayer1FirstName} {$lastName}
<ELSE>
</IFEQUAL>
</IFNOTEMPTY>

<IFNOTEQUAL $Summary_SummaryPAT "None">
. PAT: {$Summary_SummaryPAT}


<IFNOTEQUAL $Summary_SummaryPATPlayer2 0>
 (<VAR $patLastName = fixApostrophes($Summary_SummPATPlayer2LastName)>
<VAR $patLASTName = fixApostrophes($Summary_SummPATPlayerLastName)>



<IFEQUAL $Summary_SummaryPAT "2 Pt Pass">
{$Summary_SummPATPlayer2FirstName} {$patLastName} from {$Summary_SummPATPlayerFirstName} {$patLASTName}
<ELSE>
{$Summary_SummPATPlayer2FirstName} {$patLastName}
)</IFEQUAL>
###<ELSE>###
###<IFNOTEQUAL $Summary_SummaryPATPlayer2 0>###
###<VAR $patLastName = fixApostrophes($Summary_SummPATPlayer2LastName)>###
###{$Summary_SummPATPlayer2FirstName} {$patLastName}###
###</IFNOTEQUAL>###
###</IFEQUAL>###
</IFNOTEQUAL>
###)###</IFNOTEMPTY>
### THIS IFEQUAL PERTAINS TO THE IFEQUAL AT THE TOP OF THE PAT SECTION ###
###</IFEQUAL>###
<IFNOTEMPTY $Summary_SummaryTime>
, {$Summary_SummaryTime}
</IFNOTEQUAL>
<?PHP $Summary_SummaryQuarter = str_replace(array("1","2","3","4"),array("1st","2nd","3rd","4th"),$Summary_SummaryQuarter); ?>
<IFNOTEMPTY $Summary_SummaryQuarter>
, {$Summary_SummaryQuarter}
</IFNOTEMPTY>
.



</td></tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFNOTEQUAL>
</RESULTS>
    </tbody>
</table>
</IFGREATER>




<h2>Player Stats</h2>
<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<h3>{$teamNames[$teamKey]} Player Stats</h3>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count(GamePlayerStats_rows) 0>
<h4>Passing</h4>
<table class="boxscoreStatTable deluxe wide400" WIDTH=425 CELLPADDING=0 CELLSPACING = 0>
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Comp</th>
            <th scope="col" abbr="">Att</th>
            <th scope="col" abbr="">Pct</th>
            <th scope="col" abbr="">Yds</th>
            <th scope="col" abbr="">TD</th>
            <th scope="col" abbr="">INT</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Passing>
<IFGREATER $Passing_PassAttempts 0>
        <tr class="{$rowClass}">
            <td width="120">
                <a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}">
<VAR $passingLastName = fixApostrophes($Passing_PlayerLastName)>
                    {$Passing_PlayerFirstName} {$passingLastName}
                </a>
            </td>
            <td align="right">{$Passing_PassCompletions}</td>
            <td align="right">{$Passing_PassAttempts}</td>
<VAR $compPct = round($Passing_PassCompletionPercentage,1)>
            <td align="right">{$compPct}</td>
            <td align="right">{$Passing_PassingYards}</td>
            <td align="right">{$Passing_PassingTouchdowns}</td>
            <td align="right">{$Passing_PassingInterceptions}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
    </tbody>
</table>

<h4>Rushing</h4>
<table class="boxscoreStatTable deluxe wide400" WIDTH=425 CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr>
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Att</th>
            <th scope="col" abbr="">Yds</th>
            <th scope="col" abbr="">Yds/Att</th>
            <th scope="col" abbr="">Long</th>
            <th scope="col" abbr="">TD</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Rushing>
<IFGREATER $Rushing_RushingAttempts 0>
        <tr class="{$rowClass}">
            <td width="120">
                <a href="{$externalURL}site=default&tpl=Player&ID={$Rushing_PlayerID}">
<VAR $rushingLastName = fixApostrophes($Rushing_PlayerLastName)>
                    {$Rushing_PlayerFirstName} {$rushingLastName}
                </a>
            </td>
            <td align="right">{$Rushing_RushingAttempts}</td>
            <td align="right">{$Rushing_RushingYards}</td>
<VAR $yardsAtt = round($Rushing_RushingYardsPerAttempt,1)>
            <td align="right">{$yardsAtt}</td>
            <td align="right">{$Rushing_RushingLong}</td>
            <td align="right">{$Rushing_RushingTouchdowns}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
    </tbody>
</table>


<h4>Receiving</h4>
<table class="boxscoreStatTable deluxe wide400" WIDTH=425 CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr>
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Rec</th>
            <th scope="col" abbr="">Yds</th>
            <th scope="col" abbr="">Yds/Catch</th>
            <th scope="col" abbr="">Long</th>
            <th scope="col" abbr="">TD</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Receiving>
<IFGREATER $Receiving_Receptions 0>
<tr class="{$rowClass}">
<td width="120">
<a href="{$externalURL}site=default&tpl=Player&ID={$Receiving_PlayerID}">

<VAR $recLastName = fixApostrophes($Receiving_PlayerLastName)>

{$Receiving_PlayerFirstName} {$recLastName}
</a>
</td>
<td align="right">{$Receiving_Receptions}</td>
<td align="right">{$Receiving_ReceivingYards}</td>
<VAR $yardsCatch = round($Receiving_YardsPerCatch,1)>
<td align="right">{$yardsCatch}</td>
<td align="right">{$Receiving_ReceptionLong}</td>
<td align="right">{$Receiving_ReceivingTouchdowns}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
    </tbody>
</table>
<?PHP } ?>
</IFGREATER>