<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $webURL = "http://denver-tpweb.newsengin.com/web/graphics/player/">
<VAR $rightSingleQuote = chr(38)."rsaquo;">
<QUERY name=Player ID=$form_ID>
<QUERY name=PlayerTeams ID=$form_ID>
<VAR $teamCount=count($PlayerTeams_rows)>
<VAR $primaryColor = $Player_SchoolPrimaryColor>
<VAR $secondaryColor = $Player_SchoolSecondaryColor>
<IFEMPTY $primaryColor> <VAR $primaryColor = "#FF883D"> </IFEMPTY>
<IFEMPTY $secondaryColor> <VAR $secondaryColor = "#333399"> </IFEMPTY>

<RESULTS list=PlayerTeams_rows prefix=PlayerTeams>
<VAR $sportName = $PlayerTeams_SportName>
</RESULTS>

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Sport&Sport={$PlayerTeams_SportID}">{$sportName}</a>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=School&School={$Player_SchoolID}">{$Player_SchoolName}</a>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerTeams_TeamRosterTeamID}">{$Player_SchoolName} {$sportName} Roster</a>
</div>


<h1>{$Player_PlayerFirstName} {$Player_PlayerLastName}, <IFNOTEMPTY $Player_PlayerYear>{$Player_PlayerYear} at </IFNOTEMPTY>{$Player_SchoolName}</h1>
<h2 class="list">
<IFGREATER $teamCount 0>
Sports Played: 
<RESULTS list=PlayerTeams_rows prefix=PlayerTeams>
<A HREF="{$externalURL}site=default&tpl=Team&TeamID={$PlayerTeams_TeamRosterTeamID}">
{$Player_SchoolName} {$PlayerTeams_SportName}</A><IFNOTEMPTY $PlayerTeams_TeamRosterPosition>{$PlayerTeams_TeamRosterPosition}<IFNOTEMPTY $PlayerTeams_TeamRosterAdditionalPositions>, {$PlayerTeams_TeamRosterAdditionalPositions}</IFNOTEMPTY></IFNOTEMPTY><IFGREATER $teamCount 1>, </IFGREATER>
</RESULTS>
</IFGREATER>    
</h2><!-- SCHOOLQUERY -->

<QUERY name=PlayerPhoto ID=$form_ID>
<div id="player_photo" class="photo">
<IFNOTEMPTY $PlayerPhoto_UploadFile>
    ### {$PlayerPhoto_UploadPathFolderFetch}/ ###
    <img src="{$webURL}{$PlayerPhoto_UploadFile}" alt="{$Player_PlayerFirstName} {$Player_PlayerLastName}" />
<ELSE>
<IFEQUAL $sportName "Football">
    <img src="http://denver-tpweb.newsengin.com/web/graphics/nophotofootball.jpg" alt="" />
<ELSE>
    <div style="width:190px; height:150px; overflow:hidden;"><img src="http://denver-tpweb.newsengin.com/web/graphics/nophoto.jpg" alt="" style="margin-top:-20px;"/></div>
</IFEQUAL>
</IFNOTEMPTY>
</div>

<div id="player_info" class="info" style="display:none;">
    <div>
        <dl>
<IFNOTEQUAL $Player_PlayerHeightFeet 0>
            <dt>Height/Weight:</dt>
            <dd>{$Player_PlayerHeightFeet}' {$Player_PlayerHeightInches}"
<IFNOTEMPTY $Player_PlayerWeight>/{$Player_PlayerWeight}</IFNOTEMPTY></dd>
</IFNOTEQUAL>
        </dl>
    </div>
</div>


<div class="clear"></div>

<RESULTS list=PlayerTeams_rows prefix=PlayerTeams>
    
<VAR $teamID = "">
<IFEMPTY $form_TeamID>
<IFGREATER $teamCount 0>
<VAR $teamID = $PlayerTeams_TeamRosterTeamID>
</IFGREATER>
<ELSE>
<VAR $teamID = $form_TeamID>
</IFEMPTY>

<VAR $sportName = "">
<IFNOTEMPTY $teamID>
<QUERY name=TeamSport ID=$teamID>
<VAR $sportName = $TeamSport_SportName>
<VAR $sportType = $TeamSport_SportType>
<VAR $sportTotalEvents = $TeamSport_SportTotalEvents>
<VAR $sqlSportName = strtolower(convertForSQL($sportName))>

<IFEQUAL $sportType 1>
    <IFEQUAL $sportTotalEvents 0>
        <IFTRUE ($sportName == "Boys Tennis") || ($sportName == "Girls Tennis")>
            <QUERY name=PlayerTennisStats SPORTNAME=$sqlSportName PLAYERID=$form_ID>
        <ELSE>
            <QUERY name=PlayerMeetNoEventStats SPORTNAME=$sqlSportName PLAYERID=$form_ID>
        </IFTRUE>
    <ELSE>
        <QUERY name=PlayerMeetStats SPORTNAME=$sqlSportName PLAYERID=$form_ID> <!-- error -->
    </IFEQUAL>
<ELSE>
    <QUERY name=PlayerSeasonStats SPORTNAME=$sqlSportName PLAYERID=$form_ID>
</IFEQUAL>

<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=PlayerStats_BoysBasketball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Cross Country">
<INCLUDE site=default tpl=PlayerStats_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Girls Cross Country">
<INCLUDE site=default tpl=PlayerStats_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=PlayerStats_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Golf">
<INCLUDE site=default tpl=PlayerStats_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Girls Golf">
<INCLUDE site=default tpl=PlayerStats_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Boys Tennis">
<INCLUDE site=default tpl=PlayerStats_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Girls Tennis">
<INCLUDE site=default tpl=PlayerStats_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Field Hockey">
<INCLUDE site=default tpl=PlayerStats_FieldHockey>
</IFEQUAL>
<IFEQUAL $sportName "Girls Soccer">
<INCLUDE site=default tpl=PlayerStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Boys Soccer">
<INCLUDE site=default tpl=PlayerStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Softball">
<INCLUDE site=default tpl=PlayerStats_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=PlayerStats_Baseball>
</IFEQUAL>
</IFNOTEMPTY>


</RESULTS>

<!-- BEGIN SIDEBAR -->
<!--
<h2 class="teamTitleText">
    {$Team_TeamName} {$Team_TeamNickname}
</h2>
<QUERY name=TeamPhoto prefix=TeamLogo ID=$form_TeamID PATHID=2>
<IFNOTEMPTY $TeamLogo_UploadFile>
<img src="http://denver-tpweb.newsengin.com/web/graphics/team/{$TeamLogo_UploadFile}" alt="{$Team_TeamName} {$Team_TeamNickname} Logo" style="float:left; margin-right:5px;" />
<ELSE>
<IFEQUAL $sportName "Football">
<img src="{$webURL}graphics/nophotofootball.jpg" height="100" width="100" />
<ELSE>
<img src="{$webURL}graphics/nophoto.jpg" height="50" width="50" />
</IFEQUAL>
</IFNOTEMPTY>
<div id="team_color_wrapper">
    <div class="team_color_margin" style="border-color:{$marginColor}" >
        <div class="team_color" style="background-color:{$primaryColor}" ></div>
        <div class="team_color" style="background-color:{$secondaryColor}" ></div>
    </div>
</div>

</div>
-->
<!-- END SIDEBAR -->




<!--
<h3>Player info</h3>
<table>
<tr><td valign="top" class="playerLabelText">
Friends:
</td>
<td valign="top" class="playerFieldText">
<?PHP $playerFriends = explode("\r\n",$Player_PlayerFriends); ?>
<?PHP foreach ($playerFriends as $friendURL) { ?>
<A HREF="{$friendURL}" TARGET="_blank"><?PHP echo(str_replace("http://","",$friendURL)) ?></A><BR>
<?PHP } ?>
</td>
</tr>

<tr><td valign="top" class="playerLabelText">
Planned college:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerPlannedCollege}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Favorite band:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerFavoriteBand}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Favorite book:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerFavoriteBook}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Favorite movie:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerFavoriteMovie}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Dream person to date:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerDreamPersonToDate}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Favorite junk food:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerFavoriteJunkFood}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Sports idol:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerSportsIdol}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Pet peeve:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerPetPeeve}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Favorite high school moment:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerFavoriteHighSchoolMoment}
</td>
</tr>
<tr><td valign="top" class="playerLabelText">
Goals:
</td>
<td valign="top" class="playerFieldText">
{$Player_PlayerGoals}
</td>
</tr>
</table>
-->