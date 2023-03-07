<?php
/**
 * survey_view.php along with surveys_list.php provides a sample web application
 * 
 * @package SurveySez
 * @author Natasha Moore <natashadmoore@gmail.com>
 * @version 1.0 2023/02/25
 * @link http://www.example.com/
 * @license https://www.apache.org/licenses/LICENSE-2.0
 * @see surveys_list.php
 * @see Pager.php
 * @todo none
 */

# '../' works for a sub-folder.  use './' for the root  
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
 
# check variable of item passed in - if invalid data, forcibly redirect back to demo_list.php page
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{ 
	// send user to a safe page
	myRedirect(VIRTUAL_PATH . "surveys/surveys_list.php");
}

//sql statement to select individual item
$sql = "select Title, Description, DateAdded from winter2023_surveys where SurveyID = " . $myID;
// $sql = "select MuffinName,Description,MetaDescription,MetaKeywords,Price from test_Muffins where MuffinID = " . $myID;
//---end config area --------------------------------------------------

$foundRecord = FALSE; # Will change to true, if record found!
   
# connection comes first in mysqli (improved) function
$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	   $foundRecord = TRUE;	
	   while ($row = mysqli_fetch_assoc($result))
	   {
		$Title = dbOut($row['Title']);
		$Description = dbOut($row['Description']);
		$DateAdded = dbOut($row['DateAdded']);
	}
}

@mysqli_free_result($result); # We're done with the data!

if($foundRecord)
{#only load data if record found
	$config->titleTag = $Title . "survey"; #overwrite PageTitle with Survey info!
}
/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/
# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to theme header or header_inc.php

echo '<h3 align="center">' . $Title . '</h3>';

if($foundRecord)
{#records exist - show surveys!

	echo '
		<h3>' . $Title . '</h3>
		<p>' . $Description . '</p>
		<p>Date added: ' . $DateAdded . '</p>
	';
}else{//no such survey!
    echo '<div align="center">There is no such survey.</div>';
    echo '<div align="center"><a href="' . VIRTUAL_PATH . 'surveys/surveys_list.php">Another Survey?</a></div>';
}

get_footer(); #defaults to theme footer or footer_inc.php
?>
