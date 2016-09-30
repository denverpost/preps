<?
include('./url_handlers.php');

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


?><!DOCTYPE HTML>
<html lang="en">
	<head>
	<title><?= $related['sport']['titletag'] ?>Denver Post High School Sport Results</title>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<script>
	if ( document.location.search === '?site=default&tpl=Main' ) document.location.replace('http://preps.denverpost.com/');
	</script>

    <script>
        // Only load foundation.css on handheld devices
        if ( window.screen.availWidth < 769 || window.innerWidth < 769 )
        {
            var link = document.createElement( "link" );
            link.href = "http://cdn.foundation5.zurb.com/foundation.css";
            link.type = "text/css";
            link.rel = "stylesheet";
            link.media = "screen,print";
            document.getElementsByTagName("head")[0].appendChild(link);
        }
    </script>
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

	<link rel="stylesheet" type="text/css" href="http://extras.mnginteractive.com/live/css/site36/newsengin.css">

	<script src="http://extras.denverpost.com/media/js/jquery-min.js"></script>

	<script src="http://denver-tpweb.newsengin.com/web/js/calendar.js"></script>
	<script src="http://denver-tpweb.newsengin.com/web/js/header.js"></script>
	<script src="http://denver-tpweb.newsengin.com/web/js/prototype.js"></script>
	<script src="http://denver-tpweb.newsengin.com/web/js/gateway.js"></script>
	<script src="http://www.googletagservices.com/tag/js/gpt.js"></script>
	<script>var _sf_startpt=(new Date()).getTime()</script>

<style type="text/css">
/* Foundation overrides */
@media only screen and (max-width: 1004px) 
{
    #prepswrapper { border: 0px none; }
    /* Prep nav adjustments */
    #prepsnavwrapper { background-image: none; }
    #prepsnav
    {
        background: url(http://extras.mnginteractive.com/live/media/site36/2009/0904/20090904_025325_preps_nav_bg.gif) no-repeat scroll 5px 5px;
    }
    #page { width: 100%; }
    #navclasses, #navhome { display: none; }

    /* Page content adjustments */
    table.deluxe { width: 100%; }
    table.wide300 { width: 50%; }
    div.info { width: 80%; }
    div.region4, div.region5, h4.prepsub, h3#prepblogs, div.mainSection { width: auto!important; }
}
@media only screen and (max-width: 768px) 
{
    /* Kill the main nav */
    #wrapper { width:100%; overflow:hidden; }

    /* Prep nav adjust */
    #navconferences { display: none; }

    /* Adjust the layout */
    .adElement { width: 100%!important; }
    .row .maincol, #wrapper .row .sidebarcol { float: none!important; }
    body h3 { font-size: 1em; }
    body h1, body h2, body h3, body h4, body h5, body h6 { line-height: 1; }
    body h1 { width: 80%!important; }
}
@media only screen and (max-width: 728px) 
{

    /* Hide label text on searchbar */
    #prepssearchbox h5 { display: none; }
    #prepssearchbox { width: 100%; }
}
@media only screen and (max-width: 655px)
{
    #preps h1#prepphoto
    {
        background-image: none;
        text-indent: 0;
    }
}

ul, ol, dl { line-height: auto; }
table tr th
{
    padding: 5px 2px 4px 2px;
    color: white;
}
#prepswrapper 
{
    max-width: 1000px;
    width: 100%;
}
body #page {
    margin-top: 0;
    padding-top: 10px;
}
html body {
    text-align: left!important;
}
body #prepssearchbox { width: 640px; }
body #prepssearchbox h5 { margin-top: 10px; }
body #prepswrapper { margin-top: -28px; }
</style>
<script>
//Chartbeat startup
var _sf_startpt=(new Date()).getTime();
var _sf_async_config={};
</script>
    <link rel="stylesheet" href="https://assets.digitalfirstmedia.com/prod/static/css/denverpost.css?ver=1.0" type="text/css" />
    <link rel="stylesheet" id="all-css-0" href="http://www.denverpost.com/wp-content/plugins/site-denverpost/static/css/screen.min.css" type="text/css" media="all" />
    <link rel="stylesheet" id="mason-fonts-css"  href="https://fonts.googleapis.com/css?family=Source+Serif+Pro%3A400%2C400italic%2C600%2C600italic%2C700%2C700italic%7CSource+Sans+Pro%3A400%2C400italic%2C600%2C600italic%2C700%2C400italic&#038;ver=4.6" type="text/css" media="all" />
</head>
<body><a name="top"></a>
<div id="page" class="hfeed site">
    <header class="site-header default headroom--top headroom">
        <div class="nav-wrapper">
            <div class="nav-primary">
                <div class="navigation-inner">
                    <div class="logo"><a href="http://www.denverpost.com">The Denver Post</a></div>
                </div>
            </div>
        </div>
    </header>
</div>

<script>
function switchMenu(obj) {var el = document.getElementById(obj); if ( el.style.display != "none" ) {el.style.display = 'none';} else {el.style.display = '';}}
function pointercursor(){document.body.style.cursor = "move";}
function unpointercursor(){document.body.style.cursor="";}
</script>
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
</script>

<!-- Google Tag Manager Data Layer -->
  <script>
    var is_mobile = function() {
      var check = false;
      (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
      if ( check == true ) return 'YES';
      return 'NO';
    };
    analyticsEvent = function() {};
    analyticsSocial = function() {};
    analyticsVPV = function() {};
    analyticsClearVPV = function() {};
    analyticsForm = function() {};
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        'ga_ua':'UA-61435456-7',
        'quantcast':'p-4ctCQwtnNBNs2',
        'quantcast label': 'Denver',
        'comscore':'6035443',
        'errorType':'',
        'Publisher Domain':'denverpost.com',
        'Publisher Product':'denverpost.com',
        'Dateline':'',
        'Publish Hour of Day':'',
        'Create Hour of Day':'',
        'Update Hour of Day':'',
        'Behind Paywall':'NO',
        'Mobile Presentation':is_mobile(),
        'kv':'sports',
        'Release Version':'',
        'Digital Publisher':'denverpost.com',
        'Platform':'custom',
        'Section':'Preps / High School Sports',
        'Taxonomy1':'Sports',
        'Taxonomy2':'High-school-sports',
        'Taxonomy3':'Preps Stats',
	'Taxonomy4': tpl,
        'Taxonomy5':'Preps <?= $related['sport']['title'] ?>',
        'Content Source':'denverpost.com',
        'Canonical URL': '',
        'Slug':'',
        'Content ID':'',
        'Page Type':'section',
        'Publisher State':'CO',
        'Byline':'',
        'Content Title':'',
        'URL':'',
        'Page Title':'',
        'User ID':''
    });
  </script>
  <!-- End Google Tag Manager Data Layer -->
<!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TLFP4R" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>
(function(w,d,s,l,i) {
   w[l]=w[l]||[];
   w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
   var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
   j.async=true;
   j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})
(window,document,'script','dataLayer','GTM-TLFP4R');
</script><!-- End Google Tag Manager -->

<div id="dfmHeader"><!--Header Goes Here automatically--></div>

      <div id="page">


<div style="width:100%; margin-top:11px;">
<script src="http://extras.denverpost.com/media/js/Spry/SpryMenuBar.js"></script>
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
<script>
<!--
        var navinterface = new Spry.Widget.MenuBar("navinterface", {
                imgDown :"http://extras.denverpost.com/media/js/Spry/SpryMenuBarDownHover.gif",
                imgRight :"http://extras.denverpost.com/media/js/Spry/SpryMenuBarRightHover.gif"
        });
//-->
</script>

<div id="preps">
    <div id="prepswrapper">
        <div class="row">
            <div class="large-8 medium-12 small-12 columns">
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
                </div> <!-- CLOSE .MAINSECTION -->
            </div> <!-- CLOSE .COLUMNS -->
            <div class="large-4 medium-12 small-12 columns">

<!-- Begin DFP Premium ad uniqueId: dfp-20 -->
<div id='dfp-20' style="margin-bottom:10px;">
	<script>
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
<script src="http://extras.denverpost.com/cache/preps_news';
if ( isset($related['sport']['slug']) )
{
    echo '_' . $related['sport']['slug'];
}
echo '.js"></script></div>';
?>
                    </div>

<script>
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
	<script>
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
<script>
        webPath="http://denver-tpweb.newsengin.com/web/";
        document.write('<script src="'+webPath+'gateway.php?site=default&tpl=Calendar&divID=calendar&origQueryString='+escape(location.search)+'&webPath='+escape(webPath)+'"><\/script>');
</script>

<!--NEWSENGIN ENDS HERE-->

<div style="clear:both;"></div>

</div>
</div>

<div id="dfmFooter" style="margin-top:10px;"><!--Footer Goes Here--></div>
	<!-- 
	<script src="http://local.denverpost.com/common/dfm/dfm-nav/dfm-nav-core.js"></script>
    -->
	<script>
		//var waitingforGodot = setTimeout(function(){dfmNav.initParams("mode|article", "site|denverpost", "pageTitle|Colorado Prep Sports", "leaderboard|true", "thirdParty|true", "domain|denverpost")},1000);
	</script>
    <script>
    var _sf_async_config={};
    /** CONFIGURATION START **/
    _sf_async_config.title = document.title;
    _sf_async_config.uid = 2671;
    _sf_async_config.domain = "denverpost.com";
    _sf_async_config.sections = "data,sports,preps,vendor,";
    /** CONFIGURATION END **/
    (function(){
      function loadChartbeat() {
        window._sf_endpt=(new Date()).getTime();
        var e = document.createElement("script");
        e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
        document.body.appendChild(e);
      }
      var oldonload = window.onload;
      window.onload = (typeof window.onload != "function") ?
         loadChartbeat : function() { oldonload(); loadChartbeat(); };
    })();
    </script>

<footer class="site-footer">
                    <header class="footer-header">
            <div class="footer-header-wrapper">
                <ul id="primary-menu" class="footer-links"><li id="menu-item-351" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-351"><a href="https://www.denverpostmemberservices.com/">Member Services</a></li>
<li id="menu-item-352" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-352"><a href="http://dpo.st/alerts">News Alerts</a></li>
</ul>    <ul class="sharing">
                        <li>
                    <a href="https://facebook.com/denverpost" target="self" class="icon-facebook">
                        <span class="label">Facebook</span>
                    </a>
                </li>
                                <li>
                    <a href="https://twitter.com/denverpost" target="self" class="icon-twitter">
                        <span class="label">Twitter</span>
                    </a>
                </li>
                                <li>
                    <a href="https://instagram.com/denverpost" target="self" class="icon-instagram">
                        <span class="label">Instagram</span>
                    </a>
                </li>
                                <li>
                    <a href="http://www.denverpost.com/feed/" target="self" class="icon-feed">
                        <span class="label">RSS</span>
                    </a>
                </li>
                    </ul>
            </div>
        </header>
        <ul id="primary-menu" class="footer-menus"><li id="menu-item-28409" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-28409"><a href="https://www.denverpostmemberservices.com/">Subscribe</a><span class="expander"><a href="#" class="icon-plus"></a></span>
<ul class="footer-menu">
    <li id="menu-item-28410" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28410"><a href="https://www.denverpostmemberservices.com/">Become a Member / Subscribe</a></li>
    <li id="menu-item-5522" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5522"><a href="https://www.denverpostmemberservices.com/login.aspx?ReturnUrl=%2fSecurePage%2fVacationStop.aspx">Place a Hold</a></li>
    <li id="menu-item-5523" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5523"><a href="http://www.denverpoststore.com/">Denver Post Store</a></li>
    <li id="menu-item-2020994" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2020994"><a href="https://www.denverpostmemberservices.com/access.aspx">Digital Replica Edition</a></li>
</ul>
</li>
<li id="menu-item-5518" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5518"><a href="http://www.denverpost.com/classifieds/">Classifieds</a><span class="expander"><a href="#" class="icon-plus"></a></span>
<ul class="footer-menu">
    <li id="menu-item-5524" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5524"><a href="http://www.coloradodrives.com/">Autos</a></li>
    <li id="menu-item-5525" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5525"><a href="http://www.dphomes.today/">Real Estate</a></li>
    <li id="menu-item-28412" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28412"><a href="http://www.denverpost.com/jobs/">Jobs</a></li>
    <li id="menu-item-5527" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5527"><a href="http://ads.denverpost.com/">Today’s Ads</a></li>
    <li id="menu-item-28415" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28415"><a href="http://www.denverpost.com/weekly-ads/">Weekly Ads</a></li>
    <li id="menu-item-5529" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5529"><a href="http://ads.denverpost.com/">Daily Ads</a></li>
    <li id="menu-item-5530" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5530"><a href="http://marketplaceshopping.denverpost.com/SS/Tiles.aspx?ex=specialfeatures&amp;source=SubNav_Special_Sections">Special Sections</a></li>
</ul>
</li>
<li id="menu-item-5519" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5519"><a href="http://www.denverpost.com/contact-us/">Contact Us</a><span class="expander"><a href="#" class="icon-plus"></a></span>
<ul class="footer-menu">
    <li id="menu-item-28418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28418"><a href="http://www.denverpost.com/news-tips/">Submit a News Tip</a></li>
    <li id="menu-item-5534" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5534"><a href="https://www.denverpostmemberservices.com/">Member Services</a></li>
    <li id="menu-item-5535" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5535"><a href="http://mediakit.denverpost.com/">Advertise With Us</a></li>
    <li id="menu-item-5536" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5536"><a href="http://www.digitalfirstmedia.com/careers">Careers</a></li>
    <li id="menu-item-28449" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28449"><a href="http://www.denverpost.com/how-to-place-obituary-denver-post/">Place an Obituary</a></li>
</ul>
</li>
<li id="menu-item-29026" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-29026"><a href="http://www.denverpost.com/front-pages/">Today’s Front Page</a><span class="expander"><a href="#" class="icon-plus"></a></span>

<ul class="footer-menu">
    <li id="menu-item-29100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29100"><a href="http://www.denverpost.com/back-issues/">Back Issues</a></li>
    <li id="menu-item-2021001" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2021001"><a href="http://www.denverpost.com/archives/">Archives</a></li>
    <li id="menu-item-5539" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5539"><a href="http://extras.denverpost.com/mobile/index.html">Mobile Apps</a></li> </ul> </li> </ul>
            <div class="colophon">
                <ul id="primary-menu" class="menu"><li id="menu-item-101640" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-101640"><a href="http://digitalfirstmedia.com">Copyright © 2016 Digital First Media</a></li>
<li id="menu-item-174580" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-174580"><a href="http://www.denverpost.com/privacy-policy/">Privacy Policy</a></li>
<li id="menu-item-174622" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-174622"><a href="/sitemap.xml">Site Map</a></li>
<li id="menu-item-174608" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-174608"><a href="http://www.denverpost.com/ethics-policy/">Ethics Policy</a></li>
</ul>            </div>
        </footer>
</body>
<?
// Close out the whole-page caching.

    $data = ob_get_clean();
    // Do some search-and-replacing so we can publish better title tags:
    preg_match('/<h1( class="prepheader" id="prepphoto")?>([^<]+)<\/h1>/', $data, $matches);
    $page_title = str_replace(array("\r\n", "\r", "\n", "\t", "  "), ' ', trim($matches[2]));
    $page_title = str_replace('  ', ' ', $page_title);
    $data = str_replace('<title>', '<title>' . $page_title . ': ', $data);
    $data = str_replace('[PAGENAME]', $page_title, $data);
    $data = str_replace('[PAGENAMEURL]', urlencode($page_title), $data);
    $data = str_replace('^M', '', $data);
    echo $data;
    ////$cache_lite_entire->save($data);

////}
unset($data_entire);
unset($cache_lite_entire);
?>
</html>
