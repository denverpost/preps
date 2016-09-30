<?php
if ( $_SERVER['QUERY_STRING'] == '' || $_SERVER['QUERY_STRING'] == '?' )
{
	header("Location: http://preps.denverpost.com/", TRUE, 301);
	die();
}

//if ( $_SERVER['QUERY_STRING'] == '?site=default&tpl=Main' ):
//	header("Location: http://preps.denverpost.com/", TRUE, 301);
//	die();
//endif;

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
