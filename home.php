<?
if ( $_SERVER['QUERY_STRING'] == '?' || $_SERVER['QUERY_STRING'] == '' )
{
	header("Location: http://preps.denverpost.com/", TRUE, 301);
	die();
}

// SEO redirects
function sport_id($id)
{
        $lookup = Array(
                1 => 'football',
                6 => 'boys-basketball',
                11 => 'girls-volleyball',
                12 => 'boys-soccer',
                13 => 'boys-cross-country',
                14 => 'girls-cross-country',
                15 => 'girls-soccer',
                16 => 'boys-swimming-diving',
                17 => 'girls-swimming-diving',
                18 => 'boys-golf',
                19 => 'girls-golf',
                21 => 'girls-basketball',
                23 => 'wrestling',
                25 => 'boys-track',
                27 => 'boys-tennis',
                28 => 'girls-track',
                29 => 'baseball',
                30 => 'softball',
                31 => 'girls-tennis',
                32 => 'field-hockey',
                33 => 'girls-gymnastics',
                34 => 'ice-hockey',
                35 => 'boys-lacrosse',
                36 => 'girls-lacrosse');
        return $lookup[intval($id)];
}
function sport_slug($slug, $flip=FALSE)
{
	$lookup = Array(
		'football' => 1,
		'boys-basketball' => 6,
		'girls-volleyball' => 11,
		'boys-soccer' => 12,
		'boys-cross-country' => 13,
		'girls-cross-country' => 14,
		'girls-soccer' => 15,
		'boys-swimming-diving' =>16,
		'girls-swimming-diving' => 17,
		'boys-golf' => 18,
		'girls-golf' => 19,
		'girls-basketball' => 21,
		'wrestling' => 23,
		'boys-track' => 25,
		'boys-tennis' => 27,
		'girls-track' => 28,
		'baseball' => 29,
		'softball' => 30,
		'girls-tennis' => 31,
		'field-hockey' => 32,
		'girls-gymnastics' => 33,
		'ice-hockey' => 34,
		'boys-lacrosse' => 35,
		'girls-lacrosse' => 36);
	$flipped = array_flip($lookup);
	if ( $flip === FALSE ) return $lookup[strtolower($slug)];
	return $flipped[$slug];
}
function log_slug($tpl, $getvar, $slugvar='slug')
{
	$fn = 'lookup/' . $tpl;
        $id = intval($_GET[$getvar]);
        if ( $id > 0 )
        {
        	$existing = file_get_contents($fn) . "\n";
                file_put_contents($fn, $existing . $id . ':' . preg_replace('/[^-a-z0-9]+/', '', strtolower($_GET[$slugvar])));
        }
}
function lookup_slug($tpl, $id)
{
	// Given a template and a numeric ID, look up the corresponding slug string in the existing lookup file.
	$ids = file('lookup/' . $tpl, FILE_IGNORE_NEW_LINES);
	$id_matches = preg_grep('/^' . $id . ':.*$/', $ids);
	$id_parts = explode(':', current($id_matches));
	$slug = $id_parts[1];
	return $slug;
}

// Some generic cleanup on URLs, for google
if ( strpos($_SERVER['REQUEST_URI'], '&SearchType=') > 0 )
{
	if ( strpos($_SERVER['REQUEST_URI'], '&SearchType=&') > 0 )
	{
		$new_url = str_replace('SearchType=&', '', $_SERVER['REQUEST_URI']);
	}
	else
	{
		$new_url = preg_replace('/&SearchType=[^&]+/', '', $_SERVER['REQUEST_URI']);
	}
	header("Location: $new_url", TRUE, 301);
	die();
}
if ( strpos($_SERVER['REQUEST_URI'], '&ConferenceID=&') > 0 )
{
	$new_url = str_replace('ConferenceID=&', '', $_SERVER['REQUEST_URI']);
	header("Location: $new_url", TRUE, 301);
	die();
}

$tpl = htmlspecialchars(strtolower($_GET['tpl']));
if ( $tpl == 'sport')
{
	if ( strpos($_SERVER['REQUEST_URI'], 'site=default') > 0 )
	{
		if ( intval($_GET['Sport']) === 0 ) header("Location: http://preps.denverpost.com/sport/", TRUE, 301);
		else 
		{
			$sport_slug = sport_slug(intval($_GET['Sport']), TRUE);
			header("Location: http://preps.denverpost.com/sport/$sport_slug/", TRUE, 301);
			die();
		}
	}
}
elseif ( $tpl == 'school')
{
	if ( strpos($_SERVER['REQUEST_URI'], 'site=default') > 0 )
	{
		if ( intval($_GET['School']) === 0 ) header("Location: http://preps.denverpost.com/schools/", TRUE, 301);
		else 
		{
			// Look up the slug based on the school id.
			$slug = lookup_slug($tpl, intval($_GET['School']));
			header("Location: http://preps.denverpost.com/schools/$slug/" . intval($_GET['School']) . "/", TRUE, 301);
			die();
		}
	}
	else
	{
		// If we have a slug but no school, redirect to the schools index.
		if ( $_GET['slug'] == '' && isset($_GET['slug']) ) header("Location: http://preps.denverpost.com/schools/", TRUE, 301);

		// If it's a normal, SEO-friendly URL let's write it to a lookup table
		//log_slug($tpl, 'School');
	}
}
elseif ( $tpl == 'team' )
{
	if ( strpos($_SERVER['REQUEST_URI'], 'site=default') > 0 )
	{
		// Look up the slug based on the id.
		$slug = lookup_slug($tpl, intval($_GET['TeamID']));
		if ( trim($slug) != '' )
		{
			$sport_slug = sport_id(intval($_GET['Sport']));
			if ( $sport_slug != '' ) header("Location: http://preps.denverpost.com/schools/$slug/$sport_slug/" . intval($_GET['TeamID']) . "/", TRUE, 301);
		}
	}
	else
	{
		// If it's a normal, SEO-friendly URL let's write it to a lookup table
		//log_slug($tpl, 'TeamID', 'schoolSlug');
	}
}

//if ( strpos($_SERVER['QUERY_STRING'], 'source=') == TRUE && strpos($_SERVER['HTTP_REFERER'], 'denverpost.com/') == FALSE )

include('./functions.php');
////include('Cache/Lite.php');

$cache_id['nav'] = 'nav';

// Strip any of the source= strings from the query string.
$query_string = preg_replace('/(\?|&)source=[a-z-_]+/', '', $_SERVER['QUERY_STRING']);
//if ( $_SERVER['REMOTE_ADDR'] == "72.165.229.187" ) echo $query_string;
$cache_id['content'] = $query_string;
$cache_id['sidebar'] = $query_string . '-sidebar';
$cache_id['entire'] = $query_string . '-entire';

// For SEO-friendly URLs, we need to do some URL gymnastics.
// The first: For team URLs, we include a string representation of the sport instead of the sport id.
if ( isset($_GET['SportSlug']) && $_GET['SportSlug'] != '' )
{
	$sport_id = sport_slug($_GET['SportSlug']);
	$replacement = 'Sport=' . $sport_id;
	$query_string = str_replace('SportSlug=' . $_GET['SportSlug'], $replacement, $query_string);
}

$cache_time = determine_cache_time();
$cache_config = array(
    'cacheDir' => '/tmp/',
    'lifeTime' => 3600
);


//
// Entire page
// Will be cached according to determine_cache_time()
//
$cache_config['lifeTime'] = $cache_time;
////$cache_lite_entire = new Cache_Lite($cache_config);
////if ( $data_entire = $cache_lite_entire->get($cache_id['entire']) )
////{
////    echo $data_entire;
////}
////else
////{
    ob_start();




if ( isset($_GET['Sport']) && intval($_GET['Sport']) > 0 )
{
    $related['sport'] = map_sportid($_GET['Sport']);
    $related['sport']['titletag'] = $related['sport']['title'] . ': ';
}
else
{
    $related['sport'] = map_sportid(0);
}
$cache_id['sportsidebar'] = ( $related['sport']['blog_category'] != '' ) ? $related['sport']['blog_category'] : $related['sport']['slug'];
if ( $cache_id['sportsidebar'] == '' ) $cache_id['sportsidebar'] = 'basic';
/*
1 Football
6 Boys Basketball
11 Girls Volleyball
12 Boys Soccer
13 Boys Cross Country
14 Girls Cross Country
15 Girls Soccer
16 Boys Swimming and Diving
17 Girls Swimming and Diving
18 Boys Golf
19 Girls Golf
21 Girls Basketball
23 Wrestling
27 Boys Tennis
29 Baseball
30 Softball
31 Girls Tennis
32 Field Hockey
33 Girls Gymnastics
34 Ice Hockey
35 Boys Lacrosse
36 Girls Lacrosse
*/


?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?= $related['sport']['titletag'] ?>Denver Post High School Sport Results</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Style-Type" content="text/css">
<link rel="stylesheet" type="text/css" href="http://extras.denverpost.com/stateofhope/css/foundation.min.css">
<link rel="icon" href="http://extras.mnginteractive.com/live/media/favIcon/dpo/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://extras.mnginteractive.com/live/media/favIcon/dpo/favicon.ico" type="image/x-icon" />

<!-- Sports: Preps -->	<link rel="alternate" type="application/rss+xml"  description="Sports: Preps"  href="http://feeds.denverpost.com/dp-sports-preps"   title="Sports: Preps" text="Sports: Preps"/>
<!-- Sports: Preps: Blogs: All Things Colorado Preps -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Blogs: All Things Colorado Preps"  href="http://feeds.denverpost.com/dp-sports-preps-blog"   title="Denver Post Prep Blogs: All Things Colorado Preps" text="Denver Post Prep Blogs: All Things Colorado Preps"/>
<!-- Sports: Preps: Bulletin Board -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Bulletin Board"  href="http://feeds.denverpost.com/dp-sports-preps-bulletin_board"   title="Denver Post Prep Bulletin Board" text="Denver Post Prep Bulletin Board"/>
<!-- Sports: Preps: Athletes -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Athletes"  href="http://feeds.denverpost.com/dp-sports-preps-athletesoftheweek"   title="Denver Post Prep Athletes" text="Denver Post Prep Athletes"/>
<!-- Sports: Preps: Baseball -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Baseball"  href="http://feeds.denverpost.com/dp-sports-preps-baseball"   title="Denver Post Prep Baseball" text="Denver Post Prep Baseball"/>
<!-- Sports: Preps: Basketball: Boys -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Basketball: Boys"  href="http://feeds.denverpost.com/dp-sports-preps-basketball-boys"   title="Denver Post Prep Basketball: Boys" text="Denver Post Prep Basketball: Boys"/>
<!-- Sports: Preps: Basketball: Girls -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Basketball: Girls"  href="http://feeds.denverpost.com/dp-sports-preps-basketball-girls"   title="Denver Post Prep Basketball: Girls" text="Denver Post Prep Basketball: Girls"/>
<!-- Sports: Preps: Cross Country -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Cross Country"  href="http://feeds.denverpost.com/dp-sports-preps-cross_country"   title="Denver Post Prep Cross Country" text="Denver Post Prep Cross Country"/>
<!-- Sports: Preps: Field Hockey -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Field Hockey"  href="http://feeds.denverpost.com/dp-sports-preps-field_hockey"   title="Denver Post Prep Field Hockey" text="Denver Post Prep Field Hockey"/>
<!-- Sports: Preps: Football -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Football"  href="http://feeds.denverpost.com/dp-sports-preps-football"   title="Denver Post Prep Football" text="Denver Post Prep Football"/>
<!-- Sports: Preps: Golf -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Golf"  href="http://feeds.denverpost.com/dp-sports-preps-golf"   title="Denver Post Prep Golf" text="Denver Post Prep Golf"/>
<!-- Sports: Preps: Gymnastics -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Gymnastics"  href="http://feeds.denverpost.com/dp-sports-preps-gymnastics"   title="Denver Post Prep Gymnastics" text="Denver Post Prep Gymnastics"/>
<!-- Sports: Preps: Ice Hockey -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Ice Hockey"  href="http://feeds.denverpost.com/dp-sports-preps-icehockey"   title="Denver Post Prep Ice Hockey" text="Denver Post Prep Ice Hockey"/>
<!-- Sports: Preps: Lacrosse -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Lacrosse"  href="http://feeds.denverpost.com/dp-sports-preps-lacrosse"   title="Denver Post Prep Lacrosse" text="Denver Post Prep Lacrosse"/>
<!-- Sports: Preps: Showcase -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Showcase"  href="http://feeds.denverpost.com/dp-sports-preps-showcase"   title="Denver Post Prep Showcase" text="Denver Post Prep Showcase"/>
<!-- Sports: Preps: Skiing -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Skiing"  href="http://feeds.denverpost.com/dp-sports-preps-skiing"   title="Denver Post Prep Skiing" text="Denver Post Prep Skiing"/>
<!-- Sports: Preps: Soccer -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Soccer"  href="http://feeds.denverpost.com/dp-sports-preps-soccer"   title="Denver Post Prep Soccer" text="Denver Post Prep Soccer"/>
<!-- Sports: Preps: Softball -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Softball"  href="http://feeds.denverpost.com/dp-sports-preps-softball"   title="Denver Post Prep Softball" text="Denver Post Prep Softball"/>
<!-- Sports: Preps: Stats -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Stats"  href="http://feeds.denverpost.com/dp-sports-preps-prep_stats"   title="Denver Post Prep Stats" text="Denver Post Prep Stats"/>
<!-- Sports: Preps: Swimming -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Swimming"  href="http://feeds.denverpost.com/dp-sports-preps-swimming"   title="Denver Post Prep Swimming" text="Denver Post Prep Swimming"/>
<!-- Sports: Preps: Tennis -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Tennis"  href="http://feeds.denverpost.com/dp-sports-preps-tennis"   title="Denver Post Prep Tennis" text="Denver Post Prep Tennis"/>
<!-- Sports: Preps: Track -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Track"  href="http://feeds.denverpost.com/dp-sports-preps-track"   title="Denver Post Prep Track" text="Denver Post Prep Track"/>
<!-- Sports: Preps: Volleyball -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Volleyball"  href="http://feeds.denverpost.com/dp-sports-preps-volleyball"   title="Denver Post Prep Volleyball" text="Denver Post Prep Volleyball"/>
<!-- Sports: Preps: Wrestling -->	<link rel="alternate" type="application/rss+xml"  description="Denver Post Prep Wrestling"  href="http://feeds.denverpost.com/dp-sports-preps-wrestling"   title="Denver Post Prep Wrestling" text="Denver Post Prep Wrestling"/>

<link type="text/css" rel="stylesheet" href="http://extras.mnginteractive.com/live/css/site36/redesign_default.css">
<link rel="stylesheet" type="text/css" href="http://extras.mnginteractive.com/live/css/site36/newsengin.css">

<script type="text/javascript" src="http://extras.denverpost.com/media/js/jquery-min.js"></script>

<script type="text/javascript" src="http://denver-tpweb.newsengin.com/web/js/calendar.js"></script>
<script type="text/javascript" src="http://denver-tpweb.newsengin.com/web/js/header.js"></script>
<script type="text/javascript" src="http://denver-tpweb.newsengin.com/web/js/prototype.js"></script>
<script type="text/javascript" src="http://denver-tpweb.newsengin.com/web/js/gateway.js"></script>
<script type="text/javascript" src="http://www.googletagservices.com/tag/js/gpt.js"></script>

</head>
<body style="margin-top:0;text-align:left!important;"><a name="top"></a>

<script type="text/javascript">
function switchMenu(obj) {var el = document.getElementById(obj); if ( el.style.display != "none" ) {el.style.display = 'none';} else {el.style.display = '';}}
function pointercursor(){document.body.style.cursor = "move";}
function unpointercursor(){document.body.style.cursor="";}
</script>

<div id="dfmHeader"><!--Header Goes Here automatically--></div>

      <div id="page">

<div id="omniture" style="display:none;">
<!-- SiteCatalyst code version: H.1.
Copyright 1997-2005 Omniture, Inc. More info available at
http://www.omniture.com -->
<script>
/* Specify the Report Suite ID(s) to track here */
var s_account="denverpost";
</script>
<script src="http://extras.mnginteractive.com/live/js/omniture/SiteCatalystCode_H_1.js"></script>
<script src="http://extras.mnginteractive.com/live/js/omniture/OmnitureHelper.js"></script>
<script>
var q = document.location.search;
getParam = function(arg)
{
	if (q.indexOf(arg) >= 0)
	{
		var pntr = q.indexOf(arg) + arg.length + 1;
		if (q.indexOf("&", pntr) >= 0)
		{
			return q.substring(pntr, q.indexOf("&", pntr));
		}
		else
		{
			return q.substring(pntr, q.length);
		}
	}
	else
	{
	return '';
	}
}
var tpl = getParam('tpl');
//var SearchQuery = getParam('Query');
//var SportID = getParam('Sport');
//var TeamID = getParam('TeamID');
/* You may give each page an identifying name, server, and channel on
the next lines. */
s.pageName="Prep Sports Stats / " + tpl + " / [PAGENAME]"
s.channel="SPORTS"
s.prop1="SPORTS"
s.prop2="SPORTS / Prep Sports"
s.prop3="SPORTS / Preps / Stats"
s.prop4="SPORTS / Preps / Stats / " + tpl
s.prop5="SPORTS / Preps / Stats / <?= $related['sport']['title'] ?>"
s.prop26="Newsengin"
s.prop9=getCiQueryString("SOURCE")
s.eVar2=getCiQueryString("SOURCE")
/* E-commerce Variables */
s.campaign=getCiQueryString("EADID")+getCiQueryString("CREF")
s.eVar4=s.pageName
/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
var s_code=s.t();if(s_code)document.write(s_code)//--></script>
<script>
if(navigator.appVersion.indexOf('MSIE')>=0)document.write(unescape('%3C')+'\!-'+'-')
</script><noscript><img
src="http://denverpost.112.2O7.net/b/ss/denverpost/1/H.1--NS/0"
height="1" width="1" border="0" alt="" /></noscript><!--/DO NOT REMOVE/-->
<!-- End SiteCatalyst code version: H.1. -->
</div>

<div style="width:100%; margin-top:11px;">
<script type="text/javascript" src="http://extras.denverpost.com/media/js/Spry/SpryMenuBar.js"></script>
<div>
<?php
//
// Nav
// Will be cached for 12 hours
//
$include_url = 'http://denver-tpweb.newsengin.com/web/gateway.php?site=default&tpl=SearchBox_JoeDev&divID=searchBox&webPath=http%3A//denver-tpweb.newsengin.com/web/';
/*
$cache_config['lifeTime'] = 43200;
$cache_lite = new Cache_Lite($cache_config);
if ( $data = $cache_lite->get($cache_id['nav']) )
{
    echo $data;
}
else
{
*/
    $data = clean_content($include_url);
    echo $data['main'];
    ////$cache_lite->save($data['main']);
////}
unset($data);
unset($cache_lite);
?>
</div>
<script type="text/javascript">
<!--
        var navinterface = new Spry.Widget.MenuBar("navinterface", {
                imgDown :"http://extras.denverpost.com/media/js/Spry/SpryMenuBarDownHover.gif",
                imgRight :"http://extras.denverpost.com/media/js/Spry/SpryMenuBarRightHover.gif"
        });
//-->
</script>


<style type="text/css">
/*
#prepswrapper { border: 1px solid red; }
.mainSection { border: 1px solid yellow; }
#sidebar { border: 1px solid blue; }
#prep-sports-blogs-and-news { border: 1px solid green; }
.row { border: 2px dotted slateblue; }
.columns { border: 2px dotted yellowgreen; }
*/
</style>

<div id="preps">
    <div id="prepswrapper">
        <div class="row">
            <div class="large-8 medium-8 small-12 columns">
                <div class="mainSection">
<?
//
// Main Content
//
$include_url = 'http://denver-tpweb.newsengin.com/web/gateway.php?' . $query_string . '&divID=middleContent&webPath=http%3A//denver-tpweb.newsengin.com/web/';
    $data = clean_content($include_url);
    // Error checking
    if ( strpos($data['main'], 'error ') > 0 && strpos($data['main'], 'Terror ') == 0 &&  $_SERVER['REMOTE_ADDR'] != "72.165.229.187" && $_SERVER['HTTP_REFERER'] != "" )
    {
        mail('jmurphy@denverpost.com', '[Preps] Error: 404 - ' . $_SERVER['REMOTE_ADDR'], 'http://preps.denverpost.com' . $_SERVER['REQUEST_URI'] . "\n Referer: " . $_SERVER['HTTP_REFERER'] . "\n\n" . $data['main']);
    }
    echo $data['main'];
?>




<!-- [preps] article footer -->
                    <hr noshade>
                    <div class="row">
                        <div id="prep-sports-blogs-and-news">
                            <div class="leftcol region4">
<?
// Content include
include('freeforms/video.html');
?>
                            </div>
                            <div class="rightcol region5">
<?
// Content include
include('freeforms/blogs.html');
?>
                            </div>
                        </div>
                    </div> <!-- CLOSE .ROW -->
                </div> <!-- CLOSE .MAINSECTION -->
            </div> <!-- CLOSE .COLUMNS -->
            <div class="large-4 medium-4 small-12 columns">

<!-- Begin DFP Premium ad uniqueId: dfp-20 -->
<div id='dfp-20' style="margin-bottom:10px;">
	<script type='text/javascript'>
		googletag.defineSlot('/8013/denverpost.com/Sports/High-school-sports',[[300,250],[300,600],[160,600],[300,1050]], 'dfp-20').addService(googletag.pubads()).setTargeting('pos',['Cube1_RRail_ATF']).setTargeting('kv','prepshighschoolsports');
		googletag.pubads().enableSyncRendering();
		googletag.enableServices();
		googletag.display('dfp-20');
	</script>
</div>
<!-- End DFP Premium ad uniqueId: dfp-20 -->

<?
//
// Page-Specific Sidebar Content
//
    echo $data['sidebar'];

unset($data);
unset($cache_lite);
?>


                <div class="boxblue">
                    <div class="contentblock">
			 <!--
  <p><strong>We are experiencing problems with our TeamPlayer stats-entry software. If you have problems logging in, please try again later. Or if you can log in find that the application is slow, save your data frequently while entering it.</p> 
 <p>These problems are currently being addressed, but just when they will be resolved is not yet known.</strong></p> 
-->
            <p><strong>Attention: Coaches, parents, athletes: If you spot an error</strong>, please click on the "Contact us" link below and let us know what it is. Also, click on the "Contact us" link below to get an account for your team. 

<!--
Statistics from the 2014-15 season will appear once games begin being played.
-->
</p>
               <ul class="contentblock">
					<li><strong>Coaches:</strong> <a href="http://denver-tpext.newsengin.com/">Log in</a></li>
					<li><a href="http://preps.denverpost.com/home.html?site=default&tpl=Contact<?
// We only populate this variable if we're not on the contact page
if ( strpos($_SERVER['REQUEST_URI'], 'tpl=Contact') == FALSE )
{
    echo '&referer=' . urlencode('http://preps.denverpost.com' . $_SERVER['REQUEST_URI']);
}
?>"><strong>See an error?</strong> Contact us.</a></li>

					<li><a href="javascript:bookmark_us('http://preps.denverpost.com<?= $_SERVER['REQUEST_URI'] ?>','Preps: [PAGENAME]')">Add this page to your favorites</a></li>
<?php
//
// Sport-specific sidebar
//
	ob_start();
if ( isset($related['sport']['twitter']) )
{
    echo '<li><a href="http://twitter.com/' . $related['sport']['twitter'] . '">Follow @' . $related['sport']['twitter'] . ' on Twitter</a></li>';
}
else
{
    echo '<li><a href="http://twitter.com/PostPreps">Follow @PostPreps on Twitter</a></li>';
}
?>
				</ul>
                    </div>
                </div>

                    <h2><a href="http://www.denverpost.com/preps" title="Colorado Prep <?= $related['sport']['title'] ?> News">Colorado Prep <?= $related['sport']['title'] ?> News</a></h2>
                    <div class="boxblue">
<?
// Content include
// If we know what sport this is, we deliver a sport-specific list of headlines
    echo '<div class="contentblock clearfix">
<script type="text/javascript" src="http://extras.denverpost.com/cache/preps_news';
if ( isset($related['sport']['slug']) )
{
    echo '_' . $related['sport']['slug'];
}
echo '.js"></script></div>';
?>
                    </div>

<script type="text/javascript">
function bookmark_us(url, title)
{
    if (window.sidebar)
    {
        // firefox
        window.sidebar.addPanel(title, url, "");
    }
    else if(window.opera && window.print)
    {
        // opera
        var elem = document.createElement('a');
        elem.setAttribute('href',url);
        elem.setAttribute('title',title);
        elem.setAttribute('rel','sidebar');
        elem.click();
    }
    else if(document.all)
    {
        // ie
        window.external.AddFavorite(url, title);
    }
}
</script>

<a href="http://www.maxpreps.com/state/colorado.htm"><img src="http://extras.mnginteractive.com/live/media/site36/2011/1025/20111025_124623_maxpreps.gif" width="224" height="79" style="margin:0;"></a>

<!-- Begin DFP Premium ad uniqueId: dfp-21 -->
<div id='dfp-21' style="margin-bottom:10px;">
	<script type='text/javascript'>
		googletag.defineSlot('/8013/denverpost.com/Sports/High-school-sports',[[300,250]], 'dfp-21').addService(googletag.pubads()).setTargeting('pos',['Cube2_RRail_mid']).setTargeting('kv','prepshighschoolsports');
		googletag.pubads().enableSyncRendering();
		googletag.enableServices();
		googletag.display('dfp-21');
	</script>
</div>
<!-- End DFP Premium ad uniqueId: dfp-21 -->

<?
// Content include
//include('freeforms/photo.html');

    $data['sportsidebar'] = ob_get_flush();
unset($data);
unset($cache_lite);
?>
            </div> <!-- CLOSE .COLUMNS -->
        </div> <!-- CLOSE .ROW -->
    </div> <!-- CLOSE #PREPSWRAPPER -->

        </div>
</div>
<script src="http://denver-tpweb.newsengin.com/web/js/header.js"></script>
<script src="http://denver-tpweb.newsengin.com/web/js/prototype.js"></script>
<script type="text/javascript">
        webPath="http://denver-tpweb.newsengin.com/web/";
        document.write('<script type="text/javascript" src="'+webPath+'gateway.php?site=default&tpl=Calendar&divID=calendar&origQueryString='+escape(location.search)+'&webPath='+escape(webPath)+'"><\/script>');
</script>

<!--NEWSENGIN ENDS HERE-->

<div style="clear:both;"></div>

</div>
</div>

<div id="dfmFooter" style="margin-top:10px;"><!--Footer Goes Here--></div>
	<script type="text/javascript" src="http://local.denverpost.com/common/dfm/dfm-nav/dfm-nav-core.js"></script>
	<!-- You'll need to change the pageTitle in the script below. leaderboard|true displays a banner ad at the top -->
	<script>
		var waitingforGodot = setTimeout(function(){dfmNav.initParams("mode|article", "site|denverpost", "pageTitle|Colorado Prep Sports", "leaderboard|true", "thirdParty|true", "domain|denverpost")},1000);
	</script>

</body>
<?
// Close out the whole-page caching.

    $data = ob_get_clean();
    // Do some search-and-replacing so we can publish better title tags:
    preg_match("/<h1>([^<]+)<\/h1>/", $data, $matches);
    $page_title = str_replace(array("\r\n", "\r", "\n", "\t", "  "), ' ', trim($matches[1]));
    $page_title = str_replace('  ', ' ', $page_title);
    $data = str_replace('<title>', '<title>' . $page_title . ': ', $data);
    $data = str_replace('[PAGENAME]', $page_title, $data);
    $data = str_replace('[PAGENAMEURL]', urlencode($page_title), $data);
    echo $data;
    ////$cache_lite_entire->save($data);

////}
unset($data_entire);
unset($cache_lite_entire);
?>
