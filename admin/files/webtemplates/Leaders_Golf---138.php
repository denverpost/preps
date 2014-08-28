<VAR $domainURL = "http://preps.denverpost.com">
<INCLUDE site=default tpl=SportSeasons>
<h2>Colorado Prep {$sportName} Leaders</h2>

<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>

<VAR $whereClause = " AND TotalStrokes ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $form_sort = "TotalStrokes">
</IFEMPTY>
<VAR $beginLink = "index.php?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">
<VAR $sortClause = $form_sort." ASC">
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause>
<!-- query: {$Leaders_query} -->
<h4>Leaders</h4>
<table class="leadersTable deluxe wide300" cellpadding="0" cellspacing="0"  summary="Leaders formatting">
<tr id="header-sub" class="resultsText">
    <th scope="col" abbr="">Name</th>
    <th scope="col" abbr="">Team</th>
    <th scope="col" abbr="">Score</th>
</tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Leader>
<tr class="{$rowClass}">
<td>
<VAR $playerName = fixApostrophes($Leader_PlayerFirstName." ".$Leader_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Leader_PlayerID}" CLASS="leadersNameLink">
{$playerName}</a></td>
<td>
<VAR $Leader_TeamName = fixApostrophes($Leader_TeamName)>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$Leader_TeamName}</a></td>
<VAR $ppg = round($Leader_PointsPerGame,1)>
<ROW NAME=LeaderBBallCol STATFIELD="TotalStrokes" STAT=$Leader_TotalStrokes>
</td>
</tr>
    <IFEQUAL $rowClass "leadersRow trRow">
      <VAR $rowClass = "leadersRowAlternate trAlt">
    <ELSE>
      <VAR $rowClass = "leadersRow trRow">
    </IFEQUAL>
</RESULTS>
</IFGREATER>
</table>
