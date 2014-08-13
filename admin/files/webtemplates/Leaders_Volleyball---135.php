<VAR $domainURL = "http://preps.denverpost.com">
<h2>Colorado Prep Volleyball Leaders</h2>

<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>

###<VAR $whereClause = " AND GamesPlayed ".chr(62)." 0 ">###
<IFEQUAL $sqlSportName "girlsvolleyball">
###<VAR $whereClause = " AND 1=1">###
</IFEQUAL>
<IFEMPTY $form_sort>
<VAR $form_sort = "Kills">
</IFEMPTY>
<VAR  $sortClauseLeaders = $form_sort."+0 DESC" >
<VAR $beginLink = $externalURL."site=default&tpl=Leaders&Sport=".$form_Sport."&DistrictID=".$form_DistrictID."&ConferenceID=".$form_ConferenceID."&SearchType=".$form_SearchType>

<VAR $beginLink = "home.html?site=default&tpl=".$tpl."&Sport=".$form_Sport.$selector."&sort=">
<!-- BeginLink: {$beginLink} -->
<form name="leaderForm" action="home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<input type="hidden" name="ClassID" id="ClassID" value="{$form_ClassID}" />

<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClauseLeaders WHERECLAUSE=$whereClause ARCHIVETAG=$archiveTag SEASON=$form_Season>
###clause: {$sortClause}###
###query: {$Leaders_query}###
<h4>Leaders</h4>
<font class="smallText"><span class="colsort">Click column headers to sort</span></font>

<table class="leadersTable deluxe" cellpadding="0" cellspacing="0"  summary="Leaders formatting" width="100%">
  <tr id="header-sub" class="resultsText">
    <th scope="col" abbr="">Name</th>
    <th scope="col" abbr="">Team</th>
    <th scope="col" abbr="K"><a href="{$beginLink}Kills" onmouseover="highlightKey('keyKills')" onmouseout = "unHighlightKey('keyKills')">Kills</a></th>
    <th scope="col" abbr="A"><a href="{$beginLink}Assists" onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyPoints')">Assists</a></th>
    <th scope="col" abbr="SA"><a href="{$beginLink}ServiceAces" onmouseover="highlightKey('keyServiceAces')" onmouseout = "unHighlightKey('keyServiceAces')">Aces</a></th>
    <th scope="col" abbr="DIG"><a href="{$beginLink}Digs" onmouseover="highlightKey('keyDigs')" onmouseout = "unHighlightKey('keyDigs')">Digs</a></th>
    <th scope="col" abbr="BS"><a href="{$beginLink}BlockSolos" onmouseover="highlightKey('keyGamesPlayed')" onmouseout = "unHighlightKey('BlockSolos')">Solo Blk</a></th>
    <th scope="col" abbr="GP"><a href="{$beginLink}GamesPlayed" onmouseover="highlightKey('keyGamesPlayed')" onmouseout = "unHighlightKey('keyGamePlayed')">Games</a></th>
  </tr>
    <IFGREATER count($Leaders_rows) 0>
  <VAR $rowClass="leadersRow trRow">
  <RESULTS list=Leaders_rows prefix=Leader>
  <tr class="{$rowClass}">
    <td><a href="{$externalURL}site=default&tpl=Player&Season={$form_Season}&ID={$Leader_PlayerID}&TeamID={$Leader_TeamID}&SearchType=Teams&Sport={$form_Sport}" CLASS="leadersNameLink"><?php echo fixApostrophes( $Leader_PlayerFirstName . " " . $Leader_PlayerLastName ); ?></a></td>
    <td><a href="{$externalURL}site=default&tpl=Team&Season={$form_Season}&TeamID={$Leader_TeamID}&SearchType=Teams&Sport={$form_Sport}" CLASS="leadersTeamLink">
<?php echo fixApostrophes($Leader_TeamName) ?></a></td>
    <?php $ppg = sprintf( "%01.2f", $Leader_PointsPerGame ); ?>
    <ROW NAME=LeaderBBallCol STATFIELD="Kills" STAT=$Leader_Kills>
    <ROW NAME=LeaderBBallCol STATFIELD="Assists" STAT=$Leader_Assists>
    <ROW NAME=LeaderBBallCol STATFIELD="ServiceAces" STAT=$Leader_ServiceAces>
    <ROW NAME=LeaderBBallCol STATFIELD="Digs" STAT=$Leader_Digs>
    <ROW NAME=LeaderBBallCol STATFIELD="BlockSolos" STAT=$Leader_BlockSolos>
    <ROW NAME=LeaderBBallCol STATFIELD="GamesPlayed" STAT=$Leader_GamesPlayed>
  </tr>
    <IFEQUAL $rowClass "leadersRow trRow">
      <VAR $rowClass = "leadersRowAlternate trAlt">
    <ELSE>
      <VAR $rowClass = "leadersRow trRow">
    </IFEQUAL>
  </RESULTS>
<ELSE>
  <tr><td class="leadersRow" colspan="50">No data</td></tr>
</IFGREATER>

</table>
