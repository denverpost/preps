<VAR $domainURL = "http://preps.denverpost.com">
<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Meet-by-Meet {$sportName} Results</h2>
<h4>Meets</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Date</th>
            <th scope="col" abbr="">Meet name</th>
            <th scope="col" abbr="">Score</th>
        </tr>
<IFGREATER $total_PlayerMeetNoEventStats 0>
<RESULTS list=PlayerMeetNoEventStats_rows prefix=PlayerMeetStats>
        <tr class="{$rowClass}">
<VAR $meetDate = date("m/d/y",strtotime($PlayerMeetStats_GameDate))>
            <td align="left">{$meetDate}</td>
<VAR $PlayerMeetStats_GameMeetName = fixApostrophes($PlayerMeetStats_GameMeetName)>
<VAR $PlayerMeetStats_MeetEventName = fixApostrophes($PlayerMeetStats_MeetEventName)>
            <td align="left"><a href="{$externalURL}site=default&tpl=Boxscore&ID={$PlayerMeetStats_GameID}">{$PlayerMeetStats_GameMeetName}</a></td>
            <td align="right">{$PlayerMeetStats_TotalStrokes}</td>
        </tr>
<IFEQUAL $rowClass "schedRow trRow">
<VAR $rowClass = "schedRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "schedRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
    </tbody>
</table>