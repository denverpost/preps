<VAR $domainURL = "http://preps.denverpost.com">
<VAR $SORTCLAUSE = "TotalStrokes">

<VAR $dateTimeDisplay = date("l, F j, Y",strtotime($Game_GameDate))>
<h1>{$Game_GameMeetName} ###at {$Game_SchoolName}###</h1>
<h3 class="list">{$dateTimeDisplay}</h3>
###<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>###

<h4>{$Game_GameMeetName} Boxscore</h4>
<table class="boxscoreStatTable deluxe wide400" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="">Rd 1</th>
            <th scope="col" abbr="">Rd 2</th>
            <th scope="col" abbr="">Total</th>
            <th scope="col" abbr="">+/-</th>
         
        </tr>

<IFGREATER $total_MeetTeamStats 0>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=MeetTeamStats_rows prefix=MeetTeamStats>
        <tr class="{$rowClass}">
            <td>
<VAR $MeetTeamStats_TeamName = fixApostrophes($MeetTeamStats_TeamName)>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$MeetTeamStats_TeamID}">
{$MeetTeamStats_TeamName}</a></td>
            <td>{$MeetTeamStats_RoundOneScore}</td>
            <td>{$MeetTeamStats_RoundTwoScore}</td>
            <td>{$MeetTeamStats_TotalStrokes}</td>
            <td>{$MeetTeamStats_OverUnderPar}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
    </tbody>
</table>


<h4>{$Game_GameMeetName} Leaders</h4>
<QUERY name=MeetGolfPlayerStats GAMEID=$form_ID SPORTNAME=$sqlSportName>
<IFGREATER $total_MeetGolfPlayerStats 0>
<table class="boxscoreStatTable deluxe wide400" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="">Rd 1</th>
            <th scope="col" abbr="">Rd 2</th>
            <th scope="col" abbr="">Total</th>
            <th scope="col" abbr="">+/-</th>
        </tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=MeetGolfPlayerStats_rows prefix=PlayerStats>
        <tr class="{$rowClass}">
            <td align="left">
<VAR $playerName = fixApostrophes($PlayerStats_PlayerFirstName." ".$PlayerStats_PlayerLastName)>
<VAR $teamName = fixApostrophes($PlayerStats_TeamName)>
                <a href="{$externalURL}site=default&tpl=Player&ID={$PlayerStats_PlayerID}">{$playerName}</a>
            </td>
            <td align="left">
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerStats_TeamID}">{$teamName}</a>
            </td>
            <td>
                {$PlayerStats_RoundOneScore}
            </td>
            <td>
                {$PlayerStats_RoundTwoScore}
            </td>
            <td>
                {$PlayerStats_TotalStrokes}
            </td>
            <td>
                {$PlayerStats_OverUnderPar}
            </td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
    </tbody>
</table>
</IFGREATER>


###
<pre>
GameID: {$Game_GameID}
GameDateTimeCreated: {$Game_GameDateTimeCreated}
GameDateTimeModified: {$Game_GameDateTimeModified}
GameCreator: {$Game_GameCreator}
GameModifier: {$Game_GameModifier}
GameSportID: {$Game_GameSportID}
GameSeason: {$Game_GameSeason}
GameAwayTeamID: {$Game_GameAwayTeamID}
GameHomeTeamID: {$Game_GameHomeTeamID}
GameAwayTeamStatus: {$Game_GameAwayTeamStatus}
GameHomeTeamStatus: {$Game_GameHomeTeamStatus}
GameDate: {$Game_GameDate}
GameEndDate: {$Game_GameEndDate}
GameTime: {$Game_GameTime}
GameTimeTBD: {$Game_GameTimeTBD}
GameMeetName: {$Game_GameMeetName}
GameIsConference: {$Game_GameIsConference}
GameIsDistrict: {$Game_GameIsDistrict}
GameIsGameOfWeek: {$Game_GameIsGameOfWeek}
GameIsPlayoff: {$Game_GameIsPlayoff}
GameIsTournament: {$Game_GameIsTournament}
GameIsNeutral: {$Game_GameIsNeutral}
GameNeutralSite: {$Game_GameNeutralSite}
GameMeetSite: {$Game_GameMeetSite}
GameLocation: {$Game_GameLocation}
GameHighlights: {$Game_GameHighlights}
GameNotables: {$Game_GameNotables}
GameScoringSummary: {$Game_GameScoringSummary}
GameStatsFinal: {$Game_GameStatsFinal}
GameStatsDateTimeModified: {$Game_GameStatsDateTimeModified}
GameStatsModifier: {$Game_GameStatsModifier}
GameStatsModifierType: {$Game_GameStatsModifierType}
GameProcessed: {$Game_GameProcessed}
GameScoreIsFinal: {$Game_GameScoreIsFinal}
GameIsTop: {$Game_GameIsTop}
GameExternalDateTimeCreated: {$Game_GameExternalDateTimeCreated}
GameExternalDateTimeModified: {$Game_GameExternalDateTimeModified}
GameExternalCreator: {$Game_GameExternalCreator}
GameExternalModifier: {$Game_GameExternalModifier}
GameUpdate: {$Game_GameUpdate}
GameHasUpdate: {$Game_GameHasUpdate}
</pre>
###