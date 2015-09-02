<VAR $domainURL = "http://preps.denverpost.com">
<VAR $blank = "">
<VAR $space = " ">
<VAR $dash = chr(151)>
<VAR $period = ".">
<VAR $statType = "conf">
<VAR $sportYear = "2015"> ###YEARCHECK###

<QUERY name=Game_preview GAMEID=$form_ID>
<VAR $Home_TeamID = $Game_preview_GameHomeTeamID>
<VAR $Away_TeamID = $Game_preview_GameAwayTeamID>

###query:{$Game_preview_query}<br>###

<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$sportYear>
<VAR $homeConfWins = $TeamSeasonStats_Win >
<VAR $homeConfLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "TeamSeasonStats">
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$sportYear>
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>
<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$sportYear>
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$sportYear>
<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>

<IFEQUAL $Game_preview_GameStatStatus 0>
<h1>
{$Game_preview_AwayTeamName} at {$Game_preview_HomeTeamName}
</h1>
<ELSE>

<h1>
<IFGREATER $Home_TotalPoints $Away_TotalPoints>
{$Home_TeamName} {$Home_TotalGoals}, {$Away_TeamName} {$Away_TotalGoals}
<ELSE>
{$Away_TeamName} {$Away_TotalGoals}, {$Home_TeamName} {$Home_TotalGoals}
</IFGREATER>
</h1>
</IFEQUAL>
<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>

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

<VAR $Away_TeamName = $Game_preview_AwayTeamName>
<VAR $Home_TeamName = $Game_preview_HomeTeamName>

<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>
###<h2 class="list">{$timeDateDisplay}</h2>###
<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
         <tbody>
	<tr>
		<td><b><a href="{$externalURL}site=default&tpl=Team&TeamID= {$Away_TeamID}">{$Away_TeamName}</a></b></td>

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
	        <tr class="trAlt">
		<td><b><a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">    {$Home_TeamName}</a></b></td>

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

<td>Overall: {$homeOverallWins}-{$homeOverallLosses} </td>
		<td>Conference: {$homeConfWins}-{$homeConfLosses}</td>
	</tr>
    </tbody>
</table>

<IFEQUAL $Game_GameScoreIsFinal 1>


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

<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>
<VAR $Home_TeamName = fixApostrophes($Home_TeamName)>
<VAR $Away_TeamName = fixApostrophes($Away_TeamName)>

<VAR $TeamSeasonStats_query = "">
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
<h4>Boxscore</h4>
<table class="boxscoreStatTable deluxe wide400" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
<IFTRUE $Away_OvertimeGoals !=0 || $Home_OvertimeGoals !=0>
            <th scope="col" abbr="" align="center">1</th>
            <th scope="col" abbr="" align="center">2</th>
            <th scope="col" abbr="" align="center">3</th>
            <th scope="col" abbr="" align="center">OT</th>
            <th scope="col" abbr="" align="center">Total</th>
<ELSE>
            <th scope="col" abbr="" td align="center">1</th>
            <th scope="col" abbr="" td align="center">2</th>
            <th scope="col" abbr="" td align="center">3</th>
            <th scope="col" abbr="" td align="center">Total</th>
</IFTRUE>        </tr>
<tr>
   <td>     
   <a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
                <strong>{$Away_TeamName}</strong></a></td>
            <td align="center">{$Away_FirstPeriodGoals}</td>
            <td align="center">{$Away_SecondPeriodGoals}</td>
            <td align="center">{$Away_ThirdPeriodGoals}</td>
<IFTRUE $Away_OvertimeGoals !=0 || $Home_OvertimeGoals !=0>
            <td align="center">{$Away_OvertimeGoals}</td>
<ELSE>
</IFGREATER>
            <td align="center">{$Away_TotalGoals}</td>
        </tr>
               <tr>
       <tr class="trAlt">
        <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
                <strong>{$Home_TeamName}</strong></a></td>
            <td align="center">{$Home_FirstPeriodGoals}</td>
            <td align="center">{$Home_SecondPeriodGoals}</td>
            <td align="center">{$Home_ThirdPeriodGoals}</td>
<IFTRUE $Away_OvertimeGoals !=0 || $Home_OvertimeGoals !=0>
            <td align="center">{$Home_OvertimeGoals}</td>
<ELSE>
</IFTRUE>
            <td align="center">{$Home_TotalGoals}</td>
        </tr>
    </tbody>
</table>
<br /><br />
<QUERY name=HockeyScoringSummary GAMEID=$form_ID SPORTNAME=$sqlSportName>
<IFGREATER count(HockeyScoringSummary_rows) 0>
<VAR $rowClass = "boxscoreRow trRow">
<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
<h4>Scoring summary</h4>
<RESULTS list=HockeyScoringSummary_rows prefix=Summary>
<IFNOTEMPTY $Summary_GoalScorerLastName>
<tr class="{$rowClass}">
<td valign=top>
<VAR $teamCode = $Summary_TeamName>
<IFEMPTY $teamCode><VAR $teamCode = $Summary_TeamName></IFEMPTY>
<strong>{$teamCode}</strong>  {$dash}  Goal: {$Summary_GoalScorerFirstName} {$Summary_GoalScorerLastName},
<IFNOTEQUAL $Summary_AsstPlayer1LastName "">
 Assist: {$Summary_AsstPlayer1FirstName} {$Summary_AsstPlayer1LastName},
<IFNOTEQUAL $Summary_AsstPlayer2LastName ""> 
 Assist: {$Summary_AsstPlayer2FirstName} {$Summary_AsstPlayer2LastName},
</IFNOTEQUAL>

</IFNOTEQUAL>
<IFNOTEMPTY $Summary_SummaryTime> {$Summary_SummaryTime}</IFNOTEQUAL>
<?PHP $Summary_SummaryPeriod = str_replace(array("1","2","3","4"),array("1st","2nd","3rd","OT"),$Summary_SummaryPeriod); ?>
<IFNOTEMPTY $Summary_SummaryPeriod>
 {$Summary_SummaryPeriod}</IFNOTEMPTY>.
</td></tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFNOTEQUAL>
</RESULTS>
</table>
</IFGREATER>
<h4>Player stats</h4>
###<VAR $SORT = "Points DESC">###
<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<h3>{$teamNames[$teamKey]} Player Stats</h3>
<QUERY name=GamePlayerStatsHockey GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>### SORT=$SORT>###
<IFGREATER count(GamePlayerStatsHockey_rows) 0>
<table class="boxscoreStatTable deluxe wide600" WIDTH=600 CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="" align="center">G</th>
            <th scope="col" abbr="" align="center">PPG</th>
            <th scope="col" abbr="" align="center">SHG</th>
            <th scope="col" abbr="" align="center">Asst</th>
            <th scope="col" abbr="" align="center">Pts</th>
            <th scope="col" abbr="" align="center">GMin</th>
            <th scope="col" abbr="" align="center">GA</th>
            <th scope="col" abbr="" align="center">GAAvg</th>
            <th scope="col" abbr="" align="center">SOG</Att</th>
            <th scope="col" abbr="" align="center">SV</th>
            <th scope="col" abbr="" align="center">SV%</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStatsHockey_rows prefix=Scoring>

<IFTRUE $Scoring_Goals != 0 || $Scoring_Assists != 0  || $Scoring_Points != 0 || $Scoring_GoalsAllowed != 0 || $Scoring_Saves != 0 || $Scoring_ShotsAgainst != 0 || $Scoring_GoalkeeperMinutes != 0>
        <tr class="{$rowClass}">
            <td width="120">
<VAR $LastName = fixApostrophes($Scoring_PlayerLastName)>
<?PHP $player_name = $Scoring_PlayerFirstName . ' ' . $LastName; ?>
                <a href="{$domainURL}/players/<?PHP echo slugify($player_name); ?>/{$Scoring_PlayerID}/">
                    {$player_name}
<IFTRUE $Scoring_GoalieWin != 0>
(W)
<ELSE>
</IFTRUE>
<IFTRUE $Scoring_GoalieLoss != 0>
(L)
<ELSE>
</IFTRUE>
<IFTRUE $Scoring_GoalieTie != 0>
(T)
<ELSE>
</IFTRUE>
                </a>
            </td>
            <td align="center">{$Scoring_Goals}</td>
            <td align="center">{$Scoring_PowerPlayGoals}</td>
            <td align="center">{$Scoring_ShortHandedGoals}</td>
            <td align="center">{$Scoring_Assists}</td>
            <td align="center"> {$Scoring_Points}</td>
            <td align="center">{$Scoring_GoalkeeperMinutes}</td>
            <IFEQUAL $Scoring_GoalkeeperMinutes "">
                   <VAR $gA = " ">
             <ELSE>
                   <VAR $gA = $Scoring_GoalsAllowed>
            </IFEQUAL>
            <td align="center">{$gA}</td>
            <IFEQUAL $Scoring_GoalkeeperMinutes "">
                   <VAR $sOG = " ">
            <ELSE>
                 <VAR $sOG = $Scoring_ShotsAgainst>
             </IFEQUAL>

            <IFEQUAL $Scoring_GoalkeeperMinutes "">
                   <VAR $gAA = " ">
             <ELSE>
                    <? $gAA = sprintf("%.3f", $Scoring_GoalsAgainstAverage) ?>
            </IFEQUAL>
             <td align="center">{$gAA}</td>
            <IFEQUAL $Scoring_GoalkeeperMinutes "">
                   <VAR $sOG = " ">
            <ELSE>
                 <VAR $sOG = $Scoring_ShotsAgainst>
             </IFEQUAL>
            <td align="center">{$sOG}</td>
            <IFEQUAL $Scoring_GoalkeeperMinutes "">
            <VAR $sV = $space>
            <ELSE>
            <VAR $sV = $Scoring_Saves>
            </IFEQUAL>
            <IFEQUAL $Scoring_GoalkeeperMinutes "">
            <VAR $svPCT = $space>
            <ELSE>
            <? $svPCT = sprintf("%.3f", $Scoring_SavePercentage) ?>
            </IFEQUAL>
            <td align="center">{$sV}</td>
            <td align="center">{$svPCT}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>###
</IFTRUE>
        </RESULTS>

<QUERY name=GameTeamStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b></td>
<td align="center">{$GameTeamStats_Goals}
<td align="center">{$GameTeamStats_PowerPlayGoals}
<td align="center">{$GameTeamStats_ShortHandedGoals}
<td align="center">{$GameTeamStats_Assists}
<td align="center">{$GameTeamStats_Points}
<td align="center">{$blank}
<td align="center">{$GameTeamStats_GoalsAllowed}
            <? $gAA = sprintf("%.3f", $GameTeamStats_GoalsAgainstAverage) ?>
<td align="center">{$gAA}
<td align="center">{$GameTeamStats_ShotsAgainst}
<td align="center">{$GameTeamStats_Saves}
            <? $svPCT = sprintf("%.3f", $GameTeamStats_SavePercentage) ?>
<td align="center">{$svPCT}
</tr>
    </tbody>
</table>
<?PHP } ?>
</IFEQUAL>


</IFGREATER>
