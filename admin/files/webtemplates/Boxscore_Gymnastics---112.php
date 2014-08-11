<h1>{$Game_GameMeetName}</h1>
<VAR $dateTimeDisplay = date("g:ia",strtotime($Game_GameTime))."
".date("l, F j, Y",strtotime($Game_GameDate))>
<h2 class="list">{$dateTimeDisplay}</h2>
<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>

<h4>Boxscore</h4>
<table class="boxscoreStatTable wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="">Score</th>
        </tr>

<IFGREATER $total_MeetTeamStats 0>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=MeetTeamStats_rows prefix=MeetTeamStats>
        <tr class="{$rowClass}">
            <td>
<VAR $MeetTeamStats_TeamName = fixApostrophes($MeetTeamStats_TeamName)>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$MeetTeamStats_TeamID}">
                    {$MeetTeamStats_TeamName}</a></td>
            <? $MeetTeamStats_AllAround = sprintf("%.3f", $MeetTeamStats_AllAround) ?>
            <td align="right">{$MeetTeamStats_AllAround}</td>
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
<br />


<h2>Gymnastics Meet Results</h2>
<VAR $rowClass = "boxscoreRow trRow">
<?PHP $arrEvents = array("All Around","Vault","Uneven Bars","Balance Beam","Floor Exercise") ?>
<?PHP foreach ($arrEvents as $eventName) { 
$scoreField = str_replace(" ","",$eventName); ?>

<QUERY name=MeetGymPlayerStats GAMEID=$form_ID SPORTNAME=$sqlSportName SORTCLAUSE=$scoreField>
<IFGREATER $total_MeetGymPlayerStats 0>
<h4>{$eventName}</h4>
<table class="boxscoreStatTable deluxe wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Player Name</th>
            <th scope="col" abbr="">Team Name</th>
            <th scope="col" abbr="">Score</th>
        </tr>
<RESULTS list=MeetGymPlayerStats_rows prefix=PlayerStats>
<VAR $playerName = fixApostrophes($PlayerStats_PlayerLastName)>
<VAR $teamName = fixApostrophes($PlayerStats_TeamCode)>
<IFEMPTY $teamName>
<VAR $teamName = fixApostrophes($PlayerStats_TeamName)>
</IFEMPTY>
        <tr class="{$rowClass}">
            <td><a href="{$externalURL}site=default&tpl=Player&ID={$PlayerStats_PlayerID}">{$playerName}</a></td>
            <td><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerStats_TeamID}">{$teamName}</a></td>
<? $PlayerStats_Score = sprintf("%.3f", $PlayerStats_Score) ?>
            <td>{$PlayerStats_Score}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>

</table>
</IFGREATER>
<?PHP } ?>
