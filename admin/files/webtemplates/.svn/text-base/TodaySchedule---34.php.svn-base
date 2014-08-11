<VAR $externalURL = "http://preps.denverpost.com/home.html?">
### Set default values for start and count ###

<IFEMPTY $form_start><VAR $form_start = 0></IFEMPTY>
<IFEMPTY $form_count><VAR $form_count = 25></IFEMPTY>

### Format search begin/end dates for MySQL, display ###
<IFNOTEMPTY $form_SearchDate>
<IFEQUAL $form_SearchDate "mm/dd/yy">
<VAR $_REQUEST["SearchDate"] = date("Y-m-d")>
<ELSE>
<VAR $_REQUEST["SearchDate"] = date("Y-m-d",strtotime($form_SearchDate))>
</IFEQUAL>
<VAR $strDateDisplay = date("m/d/Y",strtotime($_REQUEST["SearchDate"]))>
<ELSE>
<VAR $strDateDisplay = date("m/d/Y")>
</IFNOTEMPTY>

<IFNOTEMPTY $form_SearchDateEnd>
<IFEQUAL $form_SearchDateEnd "mm/dd/yy">
<VAR $_REQUEST["SearchDateEnd"] = date("Y-m-d")>
<ELSE>
<VAR $_REQUEST["SearchDateEnd"] = date("Y-m-d",strtotime($form_SearchDateEnd))>
</IFEQUAL>
<VAR $strDateDisplay = $strDateDisplay." - ".date("m/d/Y",strtotime($_REQUEST["SearchDateEnd"]))>
<ELSE>
<VAR $strDateDisplay = date("m/d/Y")>
</IFNOTEMPTY>

<QUERY name=TodaySchedule>
<VAR $gameCount = count($Schedule_rows)>
<RUN setPreviousNextPageLinks($form_start,$form_count,$gameCount,$total_Schedule) >
<RUN $beginPrevNextURL = $externalURL."site=default&tpl=Schedule">
<RUN $beginPrevNextURL .= "&SearchScheduleSport=".$form_SearchScheduleSport>
<RUN $beginPrevNextURL .= "&SearchDate=".$form_SearchDate>
<RUN $beginPrevNextURL .= "&SearchDateEnd=".$form_SearchDateEnd>
<table>
<h3>Schedule</h3>
<tr>
<td colspan="50" align="left" valign="top">
<font class="scheduleHeaderText"><b>{$total_Schedule}</b> game<IFNOTEQUAL $total_Schedule 1>s</IFNOTEQUAL> for {$strDateDisplay}</FONT>
<br />
<IFGREATER $gameCount 0>

<IFGREATER 501 $total_Schedule>
<font class="pageNumber"><b>Pages:</b>
</IFGREATER>

<IFTRUE $showPrevPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start-$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Previous</a>
</IFTRUE>

<IFGREATER 501 $total_Schedule>
<LOOP counter=i start=0 end=$totalPages-1 incr=1>
<IFEQUAL $i*$form_count $form_start>
<font class="pageNumber">{$i+1} </font>
<ELSE>
<a href="{$beginPrevNextURL}
&start={$i*$form_count}
&count={$form_count}
&sort={$strReqSort}" class="pageNumberLink">{$i+1}</a>
</IFEQUAL>
</LOOP>
</IFGREATER>

<IFTRUE $showNextPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start+$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Next</a>
</IFTRUE>

</font>
</td>
</tr>
<tr><td>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
<tbody><tr id="header-sub">
<th scope="col" abbr="">Date</th>
<th scope="col" abbr="">Sport</th>
<th scope="col" abbr="">Away</th>
<th scope="col" abbr=""></th>
<th scope="col" abbr="">Home</th>
<th scope="col" abbr=""></th>
<!-- <th scope="col" abbr="">Conference</th> -->
<th scope="col" abbr="">Boxscore</th>
</tr>
<VAR $rowClass = "schedRow trRow">
<RESULTS list=Schedule_rows prefix=Game>
<tr class="{$rowClass}">
<th nowrap="nowrap" scope="row" abbr="Date and Time"><VAR $gameDate = date("D n/d",strtotime($Game_GameDate))>
{$gameDate}
<br />
<VAR $gameTime = date("g:ia",strtotime($Game_GameTime))>
{$gameTime}
</td>
<td valign="top">
{$Game_SportName}
</td>
<td valign="top">
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Game_AwayTeamID}&SearchType=Teams">
{$Game_AwayTeamName}
</A>
</TD>
<TD VALIGN=TOP>
{$Game_AwayTeamPoints}
</TD>
<TD VALIGN=TOP>
<A HREF="{$externalURL}site=default&tpl=Team&TeamID={$Game_HomeTeamID}&SearchType=Teams">
{$Game_HomeTeamName}
</a>
<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
//$Map_Address = str_replace(" ", "+", $Game_SchoolAddress . "&csz=" . $Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip);
?>
<br />(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field"><strong>{$Game_SchoolName}</strong></a>)
</IFNOTEQUAL>
</TD>
<TD VALIGN=TOP>
{$Game_HomeTeamPoints}
</TD>
<TD VALIGN=TOP>
<IFEQUAL $Game_GameIsConference 1>
Yes
<ELSE>
No
</IFEQUAL>
</TD>
<TD VALIGN=TOP>
<?PHP if ($Game_GameStatus == "Ready for web" || $Game_GameStatus == "Final") { ?>
<A HREF="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">Boxscore</A>
<?PHP } ?>
</td>
</tr>

<IFEQUAL $rowClass "schedRow trRow">
<VAR $rowClass = "schedRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "schedRow trRow">
</IFEQUAL>
</RESULTS>
</tbody>
</table>
</td></tr>
<tr><td colspan="50">
<IFGREATER 501 $total_Schedule>
<font class="pageNumber"><b>Pages:</b>
</IFGREATER>

<IFTRUE $showPrevPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start-$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Previous</a>
</IFTRUE>

<IFGREATER 501 $total_Schedule>
<LOOP counter=i start=0 end=$totalPages-1 incr=1>
<IFEQUAL $i*$form_count $form_start>
<font class="pageNumber">{$i+1}</FONT>
<ELSE>
<a href="{$beginPrevNextURL}
&start={$i*$form_count}
&count={$form_count}
&sort={$strReqSort}" class="pageNumberLink">{$i+1}</a>
</IFEQUAL>
</LOOP>
</IFGREATER>

<IFTRUE $showNextPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start+$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Next</a>
</IFTRUE>

</FONT>
</IFGREATER>
</td></tr>
</table>
