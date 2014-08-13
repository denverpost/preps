<VAR $domainURL = "http://preps.denverpost.com">
###<VAR $sportYear = 2010>###
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = 2013>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>

<QUERY name=Game_preview GAMEID=$form_ID>
<VAR $Home_TeamID = $Game_preview_GameHomeTeamID>
<VAR $Away_TeamID = $Game_preview_GameAwayTeamID>

###Game_preview: {$Game_preview_query}###

###GAMESTATSTATUS: {$Game_preview_GameStatStaus}###

<IFEQUAL $Game_preview_GameStatStatus 0>


###new stuff begins here###


<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = 2010>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>
<VAR $Home_TeamName = fixApostrophes($Home_TeamName)>
<VAR $Away_TeamName = fixApostrophes($Away_TeamName)>

###query:{$TeamSeasonStats_query}###

<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = 2010>
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>

<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = 2010>
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>

###query: {$TeamSeasonStats_query}###

<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = 2010>
<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>


</IFEQUAL>
</h1>


<IFEQUAL $Game_preview_GameStatStatus 0>
<h1>
{$Game_preview_AwayTeamName} at {$Game_preview_HomeTeamName}</h1><br>
<ELSE>
<IFGREATER $Home_TotalPoints $Away_TotalPoints>
<h1>{$Home_TeamName} {$Home_FinalScore}, {$Away_TeamName} {$Away_FinalScore}</h1>
<ELSE>
<h1>{$Away_TeamName} {$Away_FinalScore}, 
{$Home_TeamName} {$Home_FinalScore}</h1>
</IFGREATER>
</IFEQUAL>
###</h1>###

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
<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>
<h3 class="list"><h3>{$gameHour}:{$gameMinute} {$meridian} {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h3>
</IFEQUAL>

<VAR $Away_TeamName = $Game_preview_AwayTeamName>
<VAR $Home_TeamName = $Game_preview_HomeTeamName>

<VAR $TeamSeasonStats_query = "TeamSeasonStats">
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = 2010>
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>

###QUERY: {$TeamSeasonStats_query}###

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = 2010>
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = 2010>
<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>

###<h1>
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
</h1>###

 <table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
         <tbody>
	<tr>
               
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
                
      <tr><td>{$Away_TeamName}</td>
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
<td><strong>Overall:</strong> {$awayOverallWins}-{$awayOverallLosses} </td>
<td><strong>Conference:</strong> {$awayConfWins}-{$awayConfLosses}</td></tr>
	        <tr class="trAlt">
<td>{$Home_TeamName}</td>

<td><strong>Overall:</strong> {$homeOverallWins}-{$homeOverallLosses} </td>
<td><strong>Conference:</strong> {$homeConfWins}-{$homeConfLosses}</td></tr>
</table>

###GAMEPREVIEWSTATUS: {$Game_preview_GameStatStatus}###

<IFTRUE $Game_preview_GameStatStatus == 0 || $Game_preview_GameStatStatus == 1>
<ELSE>
<h4>Boxscore</h4>
<table class="boxscoreStatTable deluxe wide400" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="center">1</th>
            <th scope="col" abbr="" align="center">2</th>
            <th scope="col" abbr="" align="center">3</th>
            <IFNOTEMPTY $Away_Game4Points>
            <th scope="col" abbr="" align="center">4</th>
            <ELSE>
            </IFNOTEMPTY>
            <IFNOTEMPTY $Away_Game5Points>
            <th scope="col" abbr="" align="center">5</th>
            <ELSE>
            </IFNOTEMPTY>
            <th scope="col" abbr="" align="center">Final</th>
        </tr>
        <tr>
            <td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
<strong>{$Away_TeamName}</strong></a></td>
<td align="center">{$Away_Game1Points}</td>
<td align="center">{$Away_Game2Points}</td>
<td align="center">{$Away_Game3Points}</td>
            <IFNOTEMPTY $Away_Game4Points>
<td align="center">{$Away_Game4Points}</td>
             <ELSE>
             </IFNOTEMPTY>
            <IFNOTEMPTY $Away_Game5Points>
<td align="center">{$Away_Game5Points}</td>
             <ELSE>
             </IFNOTEMPTY>
<td align="center">{$Away_FinalScore}</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
<strong>{$Home_TeamName}</strong></a></td>
<td align="center">{$Home_Game1Points}</td>
<td align="center">{$Home_Game2Points}</td>
<td align="center">{$Home_Game3Points}</td>
            <IFNOTEMPTY $Home_Game4Points>
<td align="center">{$Home_Game4Points}</td>
<ELSE>
</IFNOTEMPTY>
            <IFNOTEMPTY $Home_Game5Points>
<td align="center">{$Home_Game5Points}</td>
<ELSE>
</IFNOTEMPTY>
<td align="center">{$Home_FinalScore}</td>
</table>

<br /><br />
<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>
<h4>{$Away_TeamName}</h4>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$awayTeamID SPORTNAME=$sqlSportName >

###query: {$GamePlayerStats_query}###

<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING = 0>
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Player Name</th>
            <th scope="col" abbr="" align="center">GP</th>
            <th scope="col" abbr="" align="center">K</th>
            <th scope="col" abbr="" align="center">E</th>
            <th scope="col" abbr="" align="center">Att</th>
            <th scope="col" abbr="" align="center">H%</th>
            <th scope="col" abbr="" align="center">Asst</th>
            <th scope="col" abbr="" align="center">Aces</th>
            <th scope="col" abbr="" align="center">SvcErr</th>
            <th scope="col" abbr="" align="center">RecErr</th>
            <th scope="col" abbr="" align="center">Digs</th>
            <th scope="col" abbr="" align="center">SoloBlk</th>
            <th scope="col" abbr="" align="center">BlkAsst</th>
            <th scope="col" abbr="" align="center">BlkErr</th>
            <th scope="col" abbr="" align="center">BHE</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=PlayerStats>
<IFGREATER $PlayerStats_TotalAttempts 0>
<VAR $hitPercentage = ($PlayerStats_Kills-$PlayerStats_Errors)/$PlayerStats_TotalAttempts>
<? $hitPercentage = sprintf("%.3f", $hitPercentage) ?><ELSE>
###<?PHP $hitPercentage = round(($PlayerStats_Kills-$PlayerStats_Errors)/$PlayerStats_TotalAttempts, 2) * 100 . "%"; ?>
<ELSE>###
<VAR $hitPercentage = sprintf("%.3f", 0)>
</IFGREATER>
        <tr class="{$rowClass}">
            <td width="120">
                <a href="{$externalURL}site=default&tpl=Player&ID={$PlayerStats_PlayerID}"><VAR $playerName = fixApostrophes($PlayerStats_PlayerLastName.", ".$PlayerStats_PlayerFirstName)>{$playerName}</a>
            </td>
            <td align="center">{$PlayerStats_GamesPlayed}</td>
            <td align="center">{$PlayerStats_Kills}</td>
            <td align="center">{$PlayerStats_Errors}</td>
            <td align="center">{$PlayerStats_TotalAttempts}</td>
            <td align="center">{$hitPercentage}</td>
            <td align="center">{$PlayerStats_Assists}</td>
            <td align="center">{$PlayerStats_ServiceAces}</td>
            <td align="center">{$PlayerStats_ServiceErrors}</td>
            <td align="center">{$PlayerStats_ReceivingErrors}</td>
            <td align="center">{$PlayerStats_Digs}</td>
            <td align="center">{$PlayerStats_BlockSolos}</td>
            <td align="center">{$PlayerStats_BlockAssists}</td>
            <td align="center">{$PlayerStats_BlockErrors}</td>
            <td align="center">{$PlayerStats_BallHandlingErrors}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
<IFGREATER $Away_TotalAttempts 0>
<VAR $hitPercentage = ($Away_TotalKills-$Away_TotalErrors)/$Away_TotalAttempts>
<? $hitPercentage = sprintf("%.3f", $hitPercentage) ?><ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
       <tr class="{$rowClass}">
          ###  <td width="120">
                Totals 
            </td>
            <td align="center"></td>
            <td align="center">{$Away_TotalKills}</td>
            <td align="center">{$Away_TotalErrors}</td>
            <td align="center">{$Away_TotalAttempts}</td>
            <td align="center">{$hitPercentage}</td>
            <td align="center">{$Away_Assists}</td>
            <td align="center">{$Away_ServiceAces}</td>
            <td align="center">{$Away_ServiceErrors}</td>
            <td align="center">{$Away_ReceivingErrors}</td>
            <td align="center">{$Away_Digs}</td>
            <td align="center">{$Away_BlockSolos}</td>
            <td align="center">{$Away_BlockAssists}</td>
            <td align="center">{$Away_BlockErrors}</td>
            <td align="center">{$Away_BallHandlingErrors}</td>
        </tr>###
    </tbody>
</table>

<h4>{$Home_TeamName}</h4>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$homeTeamID SPORTNAME=$sqlSportName>
<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING = 0>
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Player Name</th>
            <th scope="col" abbr="" align="center">GP</th>
            <th scope="col" abbr="" align="center">K</th>
            <th scope="col" abbr="" align="center">E</th>
            <th scope="col" abbr="" align="center">Att</th>
            <th scope="col" abbr="" align="center">H%</th>
            <th scope="col" abbr="" align="center">Asst</th>
            <th scope="col" abbr="" align="center">Aces</th>
            <th scope="col" abbr="" align="center">SvcErr</th>
            <th scope="col" abbr="" align="center">RecErr</th>
            <th scope="col" abbr="" align="center">Digs</th>
            <th scope="col" abbr="" align="center">SoloBlk</th>
            <th scope="col" abbr="" align="center">BlkAsst</th>
            <th scope="col" abbr="" align="center">BlkErr</th>
            <th scope="col" abbr="" align="center">BHE</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=PlayerStats>
<IFGREATER $PlayerStats_TotalAttempts 0>

<VAR $hitPercentage = ($PlayerStats_Kills-$PlayerStats_Errors)/$PlayerStats_TotalAttempts>
<? $hitPercentage = sprintf("%.3f", $hitPercentage) ?><ELSE>
###<?PHP $hitPercentage = round(($PlayerStats_Kills-$PlayerStats_Errors)/$PlayerStats_TotalAttempts, 2) * 100 . "%"; ?>
<ELSE>###
<VAR $hitPercentage = sprintf("%.3f", 0)>




</IFGREATER>
        <tr class="{$rowClass}">
            <td width="120">
                <a href="{$externalURL}site=default&tpl=Player&ID={$PlayerStats_PlayerID}"><VAR $playerName = fixApostrophes($PlayerStats_PlayerLastName.", ".$PlayerStats_PlayerFirstName)>{$playerName}</a>
            </td>
            <td align="center">{$PlayerStats_GamesPlayed}</td>
            <td align="center">{$PlayerStats_Kills}</td>
            <td align="center">{$PlayerStats_Errors}</td>
            <td align="center">{$PlayerStats_TotalAttempts}</td>
            <td align="center">{$hitPercentage}</td>
            <td align="center">{$PlayerStats_Assists}</td>
            <td align="center">{$PlayerStats_ServiceAces}</td>
            <td align="center">{$PlayerStats_ServiceErrors}</td>
            <td align="center">{$PlayerStats_ReceivingErrors}</td>
            <td align="center">{$PlayerStats_Digs}</td>
            <td align="center">{$PlayerStats_BlockSolos}</td>
            <td align="center">{$PlayerStats_BlockAssists}</td>
            <td align="center">{$PlayerStats_BlockErrors}</td>
            <td align="center">{$PlayerStats_BallHandlingErrors}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
<IFGREATER $Home_TotalAttempts 0>
<VAR $hitPercentage = ($Home_TotalKills-$Home_TotalErrors)/$Home_TotalAttempts>
<? $hitPercentage = sprintf("%.3f", $hitPercentage) ?><ELSE>



###<VAR $hitPercentage = round(($Home_TotalKills-$Home_TotalErrors)/$Home_TotalAttempts,2)>
<ELSE>###
<VAR $hitPercentage = sprintf("%.3f", 0)>
###<VAR $hitPercentage = "-">###
</IFGREATER>
       <tr class="{$rowClass}">
            ###<td width="120">
                Totals
            </td>
            <td align="center"></td>
            <td align="center">{$Home_TotalKills}</td>
            <td align="center">{$Home_TotalErrors}</td>
            <td align="center">{$Home_TotalAttempts}</td>
            <td align="center">{$hitPercentage}</td>
            <td align="center">{$Home_Assists}</td>
            <td align="center">{$Home_ServiceAces}</td>
            <td align="center">{$Home_ServiceErrors}</td>
            <td align="center">{$Home_ReceivingErrors}</td>
            <td align="center">{$Home_Digs}</td>
            <td align="center">{$Home_BlockSolos}</td>
            <td align="center">{$Home_BlockAssists}</td>
            <td align="center">{$Home_BlockErrors}</td>
            <td align="center">{$Home_BallHandlingErrors}</td>
        </tr>###
    </tbody>
</table>
</IFTRUE>