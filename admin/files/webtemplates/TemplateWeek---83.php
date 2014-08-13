<VAR $domainURL = "http://preps.denverpost.com">
<pre>
<?PHP
echo file_get_contents("/var/www/denver/tpweb/web/templates/tplatest_default.php");

// Configure the variables for the week generator
function week_generate($game_timestamp)
{
    $saturday = 6;
    $game_day = date("w", $game_timestamp);
    $game_days_until_saturday = $saturday - $game_day;
    $week_start = strtotime("-$game_day days", $game_timestamp);
    $week_end = strtotime("+$game_days_until_saturday days", $game_timestamp);
    return array($week_start, $week_end);
}


function season_by_week($season_start, $season_end, $type="schedule", $sport_id=1, $week_current=0, $conference_id=0)
{
    /*
     Generates pagination-style navigation for a particular sport's schedule.
     We do it by week because that makes sense to people.
     
     The $type variable recognizes three options:
        schedule: Returns weeks for current and future weeks.
        results: Returns weeks for current and past weeks.
        all: Returns all.
    */
    $season_start = strtotime($season_start);
    $season_end = strtotime($season_end);
    $seconds_in_a_week = 604800;
        
    // How many weeks are in a season?
    $season_weeks = round(( $season_end - $season_start ) / $seconds_in_a_week);
    
    $this_week = round(( time() - $season_start ) / $seconds_in_a_week);
    if ( $this_week < 0 ) $this_week = 0;

    switch ( strtolower($type) )
    {
        case "schedule":
            $week_start = $this_week;
            break;
        case "results":
            $week_start = 0;
            $season_weeks = $this_week;
            break;
        default:
        
            $week_start = 0;
            break;
    }


    //echo "<dd>Weeks: $season_weeks</dd>";
    //echo "<dd>This week: $this_week</dd>";
    //echo "<dd>Week start: $week_start</dd>";
    
    if ( $conference_id > 0 )
    {
        $conference_link = "&ConferenceID=$conference_id";
    }
    
    // Loop through the weeks, put the dates in an array.
    $return = "";
    for ( $i = $week_start; $i <= $season_weeks; $i ++ )
    {
        $week_display = $i + 1;
        $timestamp = $season_start + ( $seconds_in_a_week * $i );
        $week[$i] = week_generate($timestamp);
        
        $link = "/home.html?site=default&tpl=Schedule&Sport=" . $sport_id . "&SearchDate=" . date("m/d/Y", $week[$i][0]) . "&SearchDateEnd=" . date("m/d/Y", $week[$i][1]) . "&start=0&count=250&Week=" . $week_display . $conference_link;
        
        
        
        if ( $week_current == $week_display )
        {
            $return .= $week_display . " ";
        }
        else
        {
            $return .= "<a href=" . $link . " class=pageNumberLink>" . $week_display . "</a> ";
        }
        
    }
    return $return;
}
?>
</pre>

<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<QUERY name=Sports>


<RESULTS list=Sports_rows prefix=Sport>
<VAR $Sport = $Sport_SportID>

<VAR $Sport = 1>
<dl>
    <dt>{$Sport_SportName}</dt>

<QUERY name=SeasonSchedule prefix=Season>
<VAR $sort="GameDate DESC">
<QUERY name=SeasonSchedule prefix=SeasonEnd>

<?PHP
season_by_week($Season_GameDate, $SeasonEnd_GameDate, "all", $Sport);
?>
    <dd><VAR $gameDate = date("D n/d/Y",strtotime($Season_GameDate))>   First Game of the Season: {$Season_GameDate}</dd>
    <dd>
<VAR $gameDate = date("D n/d/Y",strtotime($SeasonEnd_GameDate))>   Last Game of the Season: {$SeasonEnd_GameDate}</dd>


</dl>
<hr>

</RESULTS>
