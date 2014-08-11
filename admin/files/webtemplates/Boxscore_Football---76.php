<IFTRUE $sqlSportName == "football">
<VAR $sportYear = "2013">
<ELSE>
</IFTRUE>

<QUERY name=Game_preview GAMEID=$form_ID>
<VAR $Home_TeamID = $Game_preview_GameHomeTeamID>
<VAR $Away_TeamID = $Game_preview_GameAwayTeamID>

###query:{$Game_preview_query}<br>###

<VAR $statType = "conf">
<IFEQUAL $Game_preview_GameStatStatus 0>
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportyear>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>
<VAR $Home_TeamName = fixApostrophes($Home_TeamName)>

<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportyear>
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>
<VAR $Away_TeamName = fixApostrophes($Away_TeamName)>

<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportyear>
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>

<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportyear>
<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>
<ELSE>
</IFEQUAL>

<IFEQUAL $Game_preview_GameStatStatus 0>
<h1>
{$Game_preview_AwayTeamName} at {$Game_preview_HomeTeamName}
</h1>
<ELSE>
<h1>
<IFGREATER $Home_TotalPoints $Away_TotalPoints>
{$Home_TeamName} {$Home_TotalPoints}, {$Away_TeamName} {$Away_TotalPoints}<br>
<ELSE>
{$Away_TeamName} {$Away_TotalPoints}, {$Home_TeamName} {$Home_TotalPoints}<br>
</h1>
</IFGREATER>
</IFEQUAL>

<IFTRUE $Game_preview_GameScoreIsFinal == 1 && $Game_preview_GameStatStatus ."chr(62)". 2>
<h3>Final</h3>
<ELSE>
<IFTRUE $Game_preview_GameStatStatus ==2 && $Game_preview_GameScoreIsFinal == 0> 
<h3>In progress</h3>
<ELSE>
</IFTRUE>
</IFTRUE>



<VAR $statType = "conf">
<VAR $dash = chr(151)>
<VAR $period = ".">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "TeamSeasonStats">
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>

###query:{$TeamSeasonStats_query}<br>###


<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>

<VAR $isBoxscore = true>
<VAR $gameHour = date("g",strtotime($Game_GameTime))>
<VAR $gameMinute = date("i",strtotime($Game_GameTime))>
<VAR $gameSecond = date("s",strtotime($Game_GameTime))>
<VAR $meridian = date("a",strtotime($Game_GameTime))>
<VAR $gameDay = date("l",strtotime($Game_GameDate))>
<VAR $gameMonth = date("F",strtotime($Game_GameDate))>
<VAR $gameDate = date("j",strtotime($Game_GameDate))>
<VAR $gameYear = date("Y",strtotime($Game_GameDate))>

<IFTRUE $meridian == "pm">
<VAR $meridian = "p.m.">
<ELSE>
<VAR $meridian = "a.m.">
</IFTRUE>

<IFEQUAL $Game_preview_GameTimeTBD 1>
<VAR $timeDateDisplay = date("l, F j, Y",strtotime($Game_GameDate))>
<h3 class="list">TBD  {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h3>
<ELSE>
<h3 class="list"><VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>

{$gameHour}:{$gameMinute} {$meridian} {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h3>
</IFEQUAL>
</h3>
<VAR $Away_TeamName = $Game_preview_AwayTeamName>
<VAR $Home_TeamName = $Game_preview_HomeTeamName>

<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
         <tbody>
	<tr>
		<td><b><a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">{$Away_TeamName}</a></b></td>
         <IFEMPTY $awayOverallWins>
                <VAR $awayOverallWins = 0>
          </IFEMPTY>
	  <IFEMPTY $awayOverallLosses>
                <VAR $awayOverallLosses = 0>
           </IFEMPTY>
	   <IFEMPTY $awayConfWins>
                <VAR $awayConfWins = 0>
           </IFEMPTY>
	   <IFEMPTY $awayConfLosses>
                <VAR $awayConfLosses = 0>
           </IFEMPTY>
		<td>Overall: {$awayOverallWins}-{$awayOverallLosses} </td>
		<td>Conference: {$awayConfWins}-{$awayConfLosses}</td>
	</tr>
	      	<IFEMPTY $homeOverallWins>
                <VAR $homeOverallWins = 0>
                </IFEMPTY>
		<IFEMPTY $homeOverallLosses>
                <VAR $homeOverallLosses = 0>
                </IFEMPTY>
		<IFEMPTY $homeConfWins>
                <VAR $homeConfWins = 0>
                </IFEMPTY>
		<IFEMPTY $homeConfLosses>
                <VAR $homeConfLosses = 0>
                </IFEMPTY>
<tr class="trAlt">
		<td><b><a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">{$Home_TeamName}</a></b></td>
		<td>Overall: {$homeOverallWins}-{$homeOverallLosses} </td>
		<td>Conference: {$homeConfWins}-{$homeConfLosses}</td>
	</tr>
    </tbody>
</table>

<IFEQUAL $Game_GameScoreIsFinal 1>

<h4>Boxscore</h4>
<table class="boxscoreStatTable deluxe wide450" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
            <th scope="col" abbr="" td align="center">1</th>
            <th scope="col" abbr="" td align="center">2</th>
            <th scope="col" abbr="" td align="center">3</th>
            <th scope="col" abbr="" td align="center">4</th>
            <th scope="col" abbr="" td align="center">OT</th>
            <th scope="col" abbr="" td align="center" >Total</th>
<ELSE>
            <th scope="col" abbr="" td align="center">1</th>
            <th scope="col" abbr="" td align="center">2</th>
            <th scope="col" abbr="" td align="center">3</th>
            <th scope="col" abbr="" td align="center">4</th>
            <th scope="col" abbr="" td align="center">Total</th>
</IFGREATER>        </tr>
        <tr>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
                <strong>{$Away_TeamName}</strong></a></td>
            <td align="center">{$Away_FirstQuarterPoints}</td>
            <td align="center">{$Away_SecondQuarterPoints}</td>
            <td align="center">{$Away_ThirdQuarterPoints}</td>
            <td align="center">{$Away_FourthQuarterPoints}</td>

<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
            <td align="center">{$Away_OvertimePoints}</td>
<ELSE>
</IFGREATER>
            <td align="center">{$Away_TotalPoints}</td>
        </tr>
        <tr>
        <tr class="trAlt">
        <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
                <strong>{$Home_TeamName}</strong></a></td>
            <td align="center">{$Home_FirstQuarterPoints}</td>
            <td align="center">{$Home_SecondQuarterPoints}</td>
            <td align="center">{$Home_ThirdQuarterPoints}</td>
            <td align="center">{$Home_FourthQuarterPoints}</td>
<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
            <td align="center">{$Home_OvertimePoints}</td>
<ELSE>
</IFGREATER>
            <td align="center">{$Home_TotalPoints}</td>
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
<IFEQUAL $Summary_SummaryPlayType "Run"><VAR $Summary_SummaryPlayType = "run."><ELSE></IFEQUAL>
<IFNOTEQUAL $Summary_SummaryPlayType "Field goal"> {$Summary_SummaryPlayLength}-yard <?PHP echo(strtolower($Summary_SummaryPlayType)); ?><ELSE>{$Summary_SummaryPlayLength}-yard field goal.
</IFGREATER></IFTRUE>
<IFEQUAL $Summary_SummaryPlayType "Interception"> return.
<ELSE></IFEQUAL>
<IFEQUAL $Summary_SummaryPlayType "Fumble recovery"> fumble recovery.
<ELSE></IFEQUAL>
###<VAR $Summary_SummaryPlayType = trim($Summary_SummaryPlayType)>###
###PLAY TYPE: -{$Summary_SummaryPlayType}-###
<IFEQUAL $Summary_SummaryPlayType "Pass">
<IFNOTEMPTY $Summary_SummaryPlayer2>
<VAR $lastName = fixApostrophes($Summary_SummPlayer1LastName)>
<VAR $lastName = trim($Summary_SummPlayer1LastName)>
 from {$Summary_SummPlayer1FirstName} {$lastName}{$period}
<ELSE>
</IFEQUAL>
</IFNOTEMPTY>
<IFEQUAL $Summary_SummaryPAT "Failed kick">
<VAR $Summary_KickFailed = "(kick failed)">
<ELSE>
</IFEQUAL>
<IFEQUAL $Summary_SummaryPAT "Kick">
<VAR $Summary_SummaryPAT = "kick">
<ELSE>
</IFEQUAL>
<IFEQUAL $Summary_SummaryPAT "2 Pt Run">
<VAR $Summary_SummaryPAT = "2-pt run">
<ELSE>
</IFEQUAL>
<IFEQUAL $Summary_SummaryPAT "2 Pt Pass">
<VAR $Summary_SummaryPAT = "2-pt pass">
<ELSE>
</IFEQUAL>

<IFEMPTY $Summary_SummaryPAT><ELSE><IFEQUAL $Summary_SummaryPAT "None"><ELSE>
<VAR $pat2LastName = fixApostrophes($Summary_SummPATPlayer2LastName)><VAR $pat2LastName = fixApostrophes($pat2LastName)><VAR $patLastName = fixApostrophes($Summary_SummPATPlayerLastName)><VAR $patFirstName = trim($Summary_SummPATPlayerFirstName)><VAR $patLastName = trim($patLASTName)><VAR $pat2FirstName = trim($Summary_SummPATPlayer2FirstName)>###{$Summary_SummaryPAT}### <IFEQUAL $Summary_SummaryPAT "Failed kick">{$Summary_KickFailed}<ELSE></IFEQUAL><IFNOTEQUAL $Summary_SummaryPATPlayer2 0>
 (<IFEQUAL $Summary_SummaryPAT "2 Pt Pass">{$pat2FirstName} {$pat2LastName} from {$patFirstName} {$patLastName}<ELSE>{$pat2FirstName} {$pat2LastName} {$Summary_SummaryPAT})</IFEQUAL></IFNOTEQUAL></IFNOTEMPTY><IFNOTEMPTY $Summary_SummaryTime><IFEQUAL $Summary_SummaryPlayType "Field goal"><ELSE>, </IFEQUAL>{$Summary_SummaryTime}</IFNOTEQUAL><?PHP $Summary_SummaryQuarter = str_replace(array("1","2","3","4"),array("1st","2nd","3rd","4th"),$Summary_SummaryQuarter);?><IFNOTEMPTY $Summary_SummaryQuarter>, {$Summary_SummaryQuarter}</IFNOTEMPTY>.
</td></tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFEQUAL>
</IFEMPTY>
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
<table class="boxscoreStatTable deluxe wide450" CELLPADDING=0 CELLSPACING = 0>
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="" >Name</th>
            <th scope="col" abbr="" align="center">Comp</th>
            <th scope="col" abbr="" align="center">Att</th>
            <th scope="col" abbr="" align="center">Pct</th>
            <th scope="col" abbr="" align="center">Yds</th>
            <th scope="col" abbr="" align="center">TD</th>
            <th scope="col" abbr="" align="center">INT</th>
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
            <td align="center">{$Passing_PassCompletions}</td>
            <td align="center">{$Passing_PassAttempts}</td>
<VAR $compPct = round($Passing_PassCompletionPercentage,1)>
<? $compPct = sprintf("%.1f", $compPct) ?>

            <td align="center">{$compPct}</td>
            <td align="center">{$Passing_PassingYards}</td>
            <td align="center">{$Passing_PassingTouchdowns}</td>
            <td align="center">{$Passing_PassingInterceptions}</td>
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
<table class="boxscoreStatTable deluxe wide450" CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr>
            <th scope="col" abbr="" align="center">Name</th>
            <th scope="col" abbr="" align="center">Att</th>
            <th scope="col" abbr="" align="center">Yds</th>
            <th scope="col" abbr="" align="center">Yds/Att</th>
            <th scope="col" abbr="" align="center">Long</th>
            <th scope="col" abbr="" align="center">TD</th>
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
            <td align="center">{$Rushing_RushingAttempts}</td>
            <td align="center">{$Rushing_RushingYards}</td>
<VAR $yardsAtt = round($Rushing_RushingYardsPerAttempt,1)>
<? $yardsAtt = sprintf("%.1f", $yardsAtt) ?>
            <td align="center">{$yardsAtt}</td>
            <td align="center">{$Rushing_RushingLong}</td>
            <td align="center">{$Rushing_RushingTouchdowns}</td>
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
<table class="boxscoreStatTable deluxe wide450" CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr>
            <th scope="col" abbr="" align="center">Name</th>
            <th scope="col" abbr="" align="center">Rec</th>
            <th scope="col" abbr="" align="center">Yds</th>
            <th scope="col" abbr="" align="center">Yds/Catch</th>
            <th scope="col" abbr="" align="center">Long</th>
            <th scope="col" abbr="" align="center">TD</th>
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
<td align="center">{$Receiving_Receptions}</td>
<td align="center">{$Receiving_ReceivingYards}</td>
<VAR $yardsCatch = round($Receiving_YardsPerCatch,1)>
<? $yardsCatch = sprintf("%.1f", $yardsCatch) ?>
<td align="center">{$yardsCatch}</td>
<td align="center">{$Receiving_ReceptionLong}</td>
<td align="center">{$Receiving_ReceivingTouchdowns}</td>
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
<h4>Placekicking</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide450">
    <tbody>
        <tr id="header-sub">
        	<th scope="col" abbr="">Name</th>
            <th scope="col" abbr="XP-M" align="center">XP Made</th>
            <th scope="col" abbr="XP-A" align="center">XP Att</th>
			<th scope="col" abbr="FG-M" align="center">FG Made</th>
            <th scope="col" abbr="FG-A" align="center">FG Att</th>
            <th scope="col" abbr="FG-L" align="center">Long</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Placekicking>
<IFTRUE $Placekicking_FieldGoalsAttempted != 0 || $Placekicking_PointAfterTouchdownAttempts != 0 >
<tr class="{$rowClass}">
<td width="120">
          <a href="{$externalURL}site=default&tpl=Player&ID={$Placekicking_PlayerID}">
<VAR $placekickingLastName = fixApostrophes($Placekicking_PlayerLastName)>
                    {$PlaceKicking_PlayerFirstName} {$placekickingLastName}
                </a>
            <td align="center">{$Placekicking_PointAfterTouchdown}</td>
            <td align="center">{$Placekicking_PointAfterTouchdownAttempts}</td>
            <td align="center">{$Placekicking_FieldGoalsMade}</td>
            <td align="center">{$Placekicking_FieldGoalsAttempted}</td>
            <td align="center">{$Placekicking_FieldGoalLong}</td>
</td>
</IFTRUE>
</RESULTS>
    </tbody>
</table>
<h4>Punting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide450">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="" align="center">Name</th>
            <th scope="col" abbr="" align="center">Punts</th>
            <th scope="col" abbr="" align="center">Average</th>
            <th scope="col" abbr="" align="center">Blocked</th>
            <th scope="col" abbr="" align="center">Long</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Punting>
<IFTRUE $Punting_Punts != 0>
<tr class="{$rowClass}">
<td width="120">
          <a href="{$externalURL}site=default&tpl=Player&ID={$Punting_PlayerID}">
<VAR $puntingLastName = fixApostrophes($Punting_PlayerLastName)>
                    {$Punting_PlayerFirstName} {$puntingLastName}
                </a>
           <td align="center">{$Punting_Punts}</td>
###            <td align="center">{$Punting_PuntingYards}</td>###
          <VAR $puntAvg = round($Punting_PuntingAverage,1)>
          <? $puntAvg = sprintf("%.1f", $puntAvg) ?>
          <td align="center">{$puntAvg}</td>
            <td align="center">{$Punting_PuntsBlocked}</td>
            <td align="center">{$Punting_PuntingLong}</td>
</IFTRUE>
</RESULTS>
</table>
<h4>Defense</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide450">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="" align="center">Int.</th>
            <th scope="col" abbr="" align="center">Ret. Yds</th>
            <th scope="col" abbr="" align="center">Fum. Rec.</th>
            <th scope="col" abbr="" align="center">Ret. Yds</th>
            <th scope="col" abbr="" align="center">Tackles</th>
            <th scope="col" abbr="" align="center">Assists</th>
            <th scope="col" abbr="" align="center">TotTckls</th>
            <th scope="col" abbr="" align="center">Sacks</th>
            <th scope="col" abbr="" align="center">Sack Yds</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Defense>
<IFTRUE $Defense_DefensiveInterceptions != 0 || $Defense_InterceptionYards != 0 || $Defense_FumbleRecoveries != 0 || $Defense_FumbleRecYards != 0 || $Defense_Tackles != 0 || $Defense_Sacks != 0 || $Defense_SackYards != 0 || $Defense_Assists != 0 || $Defense_TotalTackles != 0>
<VAR $lastName = fixApostrophes($Defense_PlayerLastName)>
  <tr class="{$rowClass}">
    <td width="120">
                <a href="home.html?site=default&tpl=Player&ID={$Defense_PlayerID}">
                    {$Defense_PlayerFirstName}  {$lastName}
         </a>
           <td align="center">{$Defense_DefensiveInterceptions}</td>
           <td align="center">{$Defense_InterceptionYards}</td>
           <td align="center">{$Defense_FumbleRecoveries}</td>
           <td align="center">{$Defense_FumbleRecYards}</td>
           <td align="center">{$Defense_Tackles}</td>
           <td align="center">{$Defense_Assists}</td>
           <td align="center">{$Defense_TotalTackles}</td>
           <td align="center">{$Defense_Sacks}</td>
           <td align="center">{$Defense_SackYards}</td>

</td>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>




</IFEQUAL>
###SCORE NOT FINAL###
</IFTRUE>
</RESULTS>
</table>
<?PHP } ?>
</IFGREATER>