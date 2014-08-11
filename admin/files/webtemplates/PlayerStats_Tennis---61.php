<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Match-by-Match {$sportName} Results</h2>
<h4>Meets</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Date</th>
            <th scope="col" abbr="">Meet</th>
            <th scope="col" abbr="">Score</th>
        </tr>
<IFGREATER $total_PlayerTennisStats 0>
<RESULTS list=PlayerTennisStats_rows prefix=PlayerMeetStats>
        <tr class="{$rowClass}">
<VAR $meetDate = date("m/d/y",strtotime($PlayerMeetStats_GameDate))>
            <td align="left">{$meetDate}</td>
            <td align="left"><a href="{$externalURL}site=default&tpl=Boxscore&ID={$PlayerMeetStats_GameID}">{$PlayerMeetStats_GameMeetName}</a></td>
<IFEQUAL $PlayerMeetStats_WinningPlayer1 $form_ID>
<VAR $winLoss = "W"></IFEQUAL>
<IFEQUAL $PlayerMeetStats_WinningPlayer2 $form_ID>
<VAR $winLoss = "W"></IFEQUAL>
<IFEQUAL $PlayerMeetStats_LosingPlayer1 $form_ID>
<VAR $winLoss = "L"></IFEQUAL>
<IFEQUAL $PlayerMeetStats_LosingPlayer2 $form_ID>
<VAR $winLoss = "L"></IFEQUAL>
            <td align="left">{$winLoss} {$PlayerMeetStats_Set1} {$PlayerMeetStats_Set2} {$PlayerMeetStats_Set3}</td>
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
