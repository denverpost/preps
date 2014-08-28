<VAR $domainURL = "http://preps.denverpost.com">
<INCLUDE site=default tpl=SportSeasons>
<h2>Colorado Tennis Leaders</h2>

<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>

<IFEQUAL $form_ConferenceID "all"><VAR $ConferenceID = ""></IFEQUAL>  
<form name="leaderForm" action="home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<IFEMPTY $form_sort>
<VAR $form_sort = "PlayerFirstName">
</IFEMPTY>
<VAR $beginLink = "home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">
<VAR $sortClause = $form_sort." DESC">
<!-- {$whereClause} -->
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause> <!-- <WHERECLAUSE=$whereClause> -->
<!-- query: {$Leaders_query} -->
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0"  summary="Leaders formatting" width="100%">
<tr><td colspan="50"><h4>Leaders</h4>
###<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span>###
<br />
###<font class="smallText">Click column headers to sort</font>###</td></tr>
<tr><td colspan="50">
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keySingles">Singles</td>
<td id="keyDoubles">Doubles</td>
</tr>
</tr>
</tr>
</table>
</div>
</td></tr>
<tr id="header-sub" class="resultsText">
    <th scope="col" abbr="">Name</th>
    <th scope="col" abbr="">Team</th>
    <th scope="col" abbr=""><a href="{$beginLink}SinglesWins" onmouseover="highlightKey('keySinglesWins')" onmouseout = "unHighlightKey('keySinglesWins')">Singles Wins</a></th>
    <th scope="col" abbr=""><a href="{$beginLink}SinglesLosses" onmouseover="highlightKey('keySinglesLosses')" onmouseout = "unHighlightKey('keySinglesLosses')">Singles Losses</a></th>
    <th scope="col" abbr=""><a href="{$beginLink}DoublesWins" onmouseover="highlightKey('keyDoubles')" onmouseout = "unHighlightKey('keyDoublesWins')">Doubles Wins</a></th>
    <th scope="col" abbr=""><a href="{$beginLink}DoublesLosses" onmouseover="highlightKey('keyDoublesLosses')" onmouseout = "unHighlightKey('keyDoubles')">Doubles Losses</a></th>
</tr>

<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Leader>
<tr class="{$rowClass}">
<td>
<a href="{$externalURL}site=default&tpl=Player&ID={$Leader_PlayerID}" CLASS="leadersNameLink">
<VAR $Leader_PlayerFirstName = fixApostrophes($Leader_PlayerFirstName)>
<VAR $Leader_PlayerLastName = fixApostrophes($Leader_PlayerLastName)>
<VAR $single_win = $PlyrWins["Singles"]>
<VAR $single_loss = $PlyrLosses["Singles"]>
<VAR $double_win = $PlyrWins["Doubles"]>
<VAR $double_loss = $PlyrLosses["Doubles"]>
{$Leader_PlayerFirstName} {$Leader_PlayerLastName}</a></td>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$Leader_TeamName}</a></td>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$Leader_SinglesWins}</a>
</td>
<td><a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$single_loss}</a>
</td>
<td> <a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$double_win}
</td>
<td> <a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$double_loss}
</td>
<!-- <ROW NAME=LeaderCol STATFIELD="Singles" STAT={$plyrWins[$ID_PlayerID]["Singles"]}-{$plyrLosses[$ID_PlayerID]["Singles"]}>
<ROW NAME=LeaderCol STATFIELD="Doubles" STAT={$plyrWins[$ID_PlayerID]["Doubles"]}-{$plyrLosses[$ID_PlayerID]["Doubles"]}>  -->

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
