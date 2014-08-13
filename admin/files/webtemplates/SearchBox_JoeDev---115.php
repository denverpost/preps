<VAR $domainURL = "http://preps.denverpost.com">
<!-- TeamPlayer search box begin -->
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $TeamInitialCharacter = "A">
<VAR $ConferenceInitialCharacter = "5">
<INCLUDE site=default tpl=SportSeasons>

<QUERY name=Sports>
<!-- Note 1:
	We've got so many high schools, we have to organize them by the first letter of their name.
	This template logic looks at the first letter, compares it with the previous letter,
	and if there's a difference between the two it outputs some markup.

	Also, if we're on the first letter of the list or the last letter of the list the template
	works differently.
-->

<div id="prepsnavwrapper" style="height:110px;">
	<div id="prepsnav" style="height:66px;">
		<ul id="navinterface" class="MenuBarHorizontal">	<!-- Tier 1 -->
			<li id="navhome"><a href="http://www.denverpost.com/preps?source=prepnav">Home</a></li>
### Commented out teams until proven necessary.
			<li id="navteams"><a href="" class="MenuBarItemSubmenu">Teams, Scores and Schedules</a>
				<ul class="dropDown">	<!-- Tier 2 -->
					<RESULTS list=Sports_rows prefix=Sport>
					<li><a href="{$externalURL}site=default&tpl=Sport&Sport={$Sport_SportID}&source=prepnav">{$Sport_SportName}</a>
						<ul class="doubleDrop">	<!-- Tier 3 -->
							<VAR $IndexLetter = "">
							<VAR $newIndexLetter = "">
							<QUERY name=SportTeams_dev SPORTID=$Sport_SportID>
								<IFGREATER count($SportTeams_dev_rows) 1>

							<li><a href="#">{$TeamInitialCharacter}</a>
								<ul class="doubleDrop">	<!-- Tier 4 -->
								<RESULTS list=SportTeams_dev_rows prefix=Team>


									<VAR $IndexLetter = $newIndexLetter>
									<VAR $newIndexLetter = strtoupper(substr($Team_TeamName, 0, 1))>
									<IFNOTEQUAL $newIndexLetter "">
									<IFNOTEQUAL $newIndexLetter $TeamInitialCharacter>
										<IFNOTEQUAL $newIndexLetter $IndexLetter>
							</ul></li>	<!-- /Tier 4 -->
							<li><a href="#">{$newIndexLetter}</a>
								<ul class="doubleDrop">	<!-- Tier 4 -->
										</IFNOTEQUAL>
									</IFNOTEQUAL>
									</IFNOTEQUAL>

									<li><a href="{$externalURL}site=default&tpl=Team&Sport={$Sport_SportID}&TeamID={$Team_TeamID}&source=prepnav">{$Team_TeamName}</a></li>
								</RESULTS>

							</ul></li>	<!-- /Tier 4 -->
								</IFGREATER>
						</ul></li>	<!-- /Tier 3 -->
					</RESULTS>
				</ul></li>	<!-- /Tier 2 -->
###
### ------------------------------------------------------------------------ ###
### Schools ###
### ------------------------------------------------------------------------ ###
			<QUERY name=Schools>
			<li id="navschools"><a href="{$externalDomain}/schools/" title="Prep sport team listings, by school">Schools</a>
				<ul class="dropDown">	<!-- Tier 2 -->
					<VAR $IndexLetter = "">
					<VAR $newIndexLetter = "">
					<li><a href="#">A</a>
						<ul class="doubleDrop">	<!-- Tier 3 -->
						<RESULTS list=Schools_rows prefix=School>
							<VAR $IndexLetter = $newIndexLetter>
							<VAR $newIndexLetter = strtoupper(substr($School_SchoolName, 0, 1))>
							<IFNOTEQUAL $newIndexLetter "">
							<IFNOTEQUAL $newIndexLetter "A">
								<IFNOTEQUAL $newIndexLetter $IndexLetter>
					</ul></li>	<!-- /Tier 3-->
					<li><a href="#">{$newIndexLetter}</a>
						<ul class="doubleDrop">	<!-- Tier 3 -->
								</IFNOTEQUAL>
							</IFNOTEQUAL>
							</IFNOTEQUAL>

<IFEQUAL $School_SchoolState "CO">
<?PHP $slug = slugify($School_SchoolName); ?>
							<li><a href="{$externalDomain}/schools/{$slug}/{$School_SchoolID}/">{$School_SchoolName}</a></li>
</IFEQUAL>
						</RESULTS>
						</ul></li>	<!-- /Tier 3 -->
				</ul></li>	<!-- /Tier 2 -->
### ------------------------------------------------------------------------ ###
### Conferences ###
### ------------------------------------------------------------------------ ###
			<QUERY name=Conferences>
			<li id="navconferences"><a href="{$externalURL}site=default&tpl=Conference&ConferenceID&source=prepnav-conf" title="Colorado Prep Sport Conference Schedules and Standings">Conference Schedules + Standings</a>
				<ul class="dropDown">	<!-- Tier 2 -->
					<RESULTS list=Sports_rows prefix=Sport>
					<QUERY name=ConferencesForSport SPORTID=$Sport_SportID>
					<IFGREATER count($ConferencesForSport_rows) 0>
					<li><a href="{$externalURL}site=default&tpl=Sport&Sport={$Sport_SportID}&source=prepnav-conf">{$Sport_SportName}</a>
						<ul class="doubleDrop wide">	<!-- Tier 3 -->
							<li><a href="{$externalURL}site=default&tpl=Sport&Sport={$Sport_SportID}&source=prepnav-conf">All Conferences</a></li>
							<RESULTS list=ConferencesForSport_rows prefix=Conf>
### This string substitution removes redundancies in the conference names, ###
### many of which also include the sport name, which we already know. ###
							<li><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conf_ConferenceID}&Sport={$Sport_SportID}&source=prepnav-conf"><?PHP $name = str_replace(" ($Sport_SportName)", "", $Conf_ConferenceName); $name = preg_replace("|\(? ?$Sport_SportName\)?|i", "", $name); echo $name; ?></a></li>
							</RESULTS>
						</ul></li>	<!-- /Tier 3 -->
					</IFGREATER>
					</RESULTS>
				</ul></li>	<!-- /Tier 2 -->
### ------------------------------------------------------------------------ ###
### Classes ###
### ------------------------------------------------------------------------ ###
			<li id="navclasses"><a href="{$externalURL}site=default&tpl=Class&ClassID&source=prepnav-classes">Classes + Leaders</a>
				<ul class="dropDown">	<!-- Tier 2 -->
					<RESULTS list=Sports_rows prefix=Sport>
					<li><a href="{$externalURL}site=default&tpl=Sport&Sport={$Sport_SportID}&source=prepnav-classes">{$Sport_SportName}</a>
						<ul class="doubleDrop">	<!-- Tier 3 -->
							<QUERY name=ClassesForSport SPORTID=$Sport_SportID>
							<RESULTS list=ClassesForSport_rows prefix=Class>
							<li><a href="{$externalURL}site=default&tpl=Class&Sport={$Sport_SportID}&ClassID={$Class_ClassID}&source=prepnav-classes">{$Class_ClassName}</a></li></RESULTS>
						</ul></li>	<!-- /Tier 3 -->
					</RESULTS>
				</ul></li>	<!-- /Tier 2 -->
### ------------------------------------------------------------------------ ###
### Sports ###
### ------------------------------------------------------------------------ ###
			<li id="navsports"><a href="http://preps.denverpost.com/sport/" title="Sports and Results">Results + Sports</a>
				<ul class="dropDown">	<!-- Tier 2 -->

<li><a href="http://preps.denverpost.com/sport/boys-cross-country/">Boys Cross Country</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-cross-country/">Girls Cross Country</a></li>
<li><a href="http://preps.denverpost.com/sport/field-hockey/">Field Hockey</a></li>
<li><a href="http://preps.denverpost.com/sport/football/">Football</a></li>
<li><a href="http://preps.denverpost.com/sport/boys-golf/">Boys Golf</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-gymnastics/">Girls Gymnastics</a></li>
<li><a href="http://preps.denverpost.com/sport/boys-soccer/">Boys Soccer</a></li>
<li><a href="http://preps.denverpost.com/sport/softball/">Softball</a></li>
<li><a href="http://preps.denverpost.com/sport/boys-tennis/">Boys Tennis</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-volleyball/">Girls Volleyball</a></li>

<li><a href="http://preps.denverpost.com/sport/boys-basketball/">Boys Basketball</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-basketball/">Girls Basketball</a></li>
<li><a href="http://preps.denverpost.com/sport/ice-hockey/">Ice Hockey</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-swimming-diving/">Girls Swimming and Diving</a></li>
<li><a href="http://preps.denverpost.com/sport/wrestling/">Wrestling</a></li>

<li><a href="http://preps.denverpost.com/sport/baseball/">Baseball</a></li>
<li><a href="http://preps.denverpost.com/sport/boys-lacrosse/">Boys Lacrosse</a></li>
<li><a href="http://preps.denverpost.com/sport/boys-swimming-diving/">Boys Swimming and Diving</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-golf/">Girls Golf</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-lacrosse/">Girls Lacrosse</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-soccer/">Girls Soccer</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-tennis/">Girls Tennis</a></li>
<li><a href="http://preps.denverpost.com/sport/boys-track/">Boys Track</a></li>
<li><a href="http://preps.denverpost.com/sport/girls-track/">Girls Track</a></li>

### Commented out, hard-coding allows us to organize by season.					<RESULTS list=Sports_rows prefix=Sport>
					<li><a href="{$externalURL}site=default&tpl=Sport&Sport={$Sport_SportID}&source=prepnav-sports">{$Sport_SportName}</a></li>
					</RESULTS> ###
### ------------------------------------------------------------------------ ###
### News, misc ###
### ------------------------------------------------------------------------ ###
				</ul></li>	<!-- /Tier 2 -->
			<li id="navnews"><a href="http://www.denverpost.com/preps?source=prepnav-misc">News, Blogs, Forums, Photos</a>
				<ul class="dropDown">	<!-- Tier 2 -->
					<li><a href="http://www.denverpost.com/preps?source=prepnav-misc">News</a></li>
					<li><a href="http://www.denverpost.com/prepathletes?source=prepnav-misc">Athletes of the Week</a></li>
					<li><a href="http://blogs.denverpost.com/preps/?source=prepnav-misc">Prep Blog</a></li>
					<li><a href="http://www.denverpost.com/preps/ci_6813914?&source=prepnav-misc">Prep Bulletin Board</a></li>
					<li><a href="http://neighbors.denverpost.com/viewforum.php?f=193&source=prepnav-misc">Prep Discussion Board</a></li>
					<li><a href="http://www.denverpost.com/prepsvideos?source=prepnav-misc">Prep Videos</a></li>
					<li><a href="http://photos.denverpost.com/photogalleries/prepimages/?source=prepnav-misc">Prep Photo Galleries</a></li>
				</ul></li>	<!-- /Tier 2 -->
		</ul>	<!-- /Tier 1 -->
	</div>

<div id="prepssearchbox" align="center" style="margin-top:40px!important;">
<h5>
<!-- <a href="http://preps.denverpost.com/home.html?site=default&tpl=scoreboard">LIVE FOOTBALL SCORES</a> || 
-->Search Player, School and Team Names</h5>
<form action="http://preps.denverpost.com/home.html" method="get">
	<input name="Query" value="" type="text">
	<input name="site" value="default" type="hidden">
	<input name="tpl" value="SearchResults" type="hidden">
	<input type="submit" value="Search">
</form>
</div>

</div>
