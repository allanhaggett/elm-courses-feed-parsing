<?php opcache_reset(); header('Content-Type: application/json; ; charset=utf-8'); ?>
{
"version": "https://jsonfeed.org/version/1",
"title": "PSA Learning System Courses",
"home_page_url": "https://learn.bcpublicservice.gov.bc.ca/learningcentre/courses/feed.json",
"feed_url": "https://learn.bcpublicservice.gov.bc.ca/learningcentre/courses/feed.json",
"items": [
<?php 
// Open the GBC_ATWORK_CATALOG file that we get from ELM
// We can upload this file here by hitting up feed.php in 
// this folder.
if (($handle = fopen("courses.csv", "r")) !== FALSE) {
    // The following is a little bit of magic that transfers the CSV
    // data into an associative array where you can refer to the values 
    // in each row as the column name.
    $csvs = [];
    while(! feof($handle)) {
       $csvs[] = fgetcsv($handle);
    }
    $datas = [];
    $column_names = [];
    foreach ($csvs[0] as $single_csv) {
        $column_names[] = $single_csv;
    }
    foreach ($csvs as $key => $csv) {
        if ($key === 0) {
            continue;
        }
        foreach ($column_names as $column_key => $column_name) {
            $datas[$key-1][$column_name] = $csv[$column_key];
        }
    }
    fclose($handle);

    // Now that magic "allow us to refer to the column names as key values"
    // thing is done, let's loop through our nifty new array and output
    // some JSON in nice, easy way.
    //echo '<pre>';print_r($datas); exit;
    foreach($datas as $course) {
        
            $d = preg_replace( "/\r|\n/", "", htmlentities($course['Course Description']));
            $desc = iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $d);
            $newDate = date("Y-m-d\TH:i:s", strtotime($course['Course Last Modified']));
            echo '{' . PHP_EOL;
            echo '"id":"' . $course['Course Code'] . '",' . PHP_EOL;
            echo '"title":"' . $course['Course Name'] . '",' . PHP_EOL;
            echo '"summary":"'. $desc . '",' . PHP_EOL;
            echo '"content_text":"' . $course['Course Name'] . '",' . PHP_EOL;
            echo '"content_html":"<h1>' . $course['Course Name'] . '</h1>",' . PHP_EOL;
            echo '"delivery_method":"' . $course['Delivery Method'] . '",' . PHP_EOL;
            echo '"_available_classes":"' . $course['Available Classes'] . '",' . PHP_EOL;
            echo '"_keywords":"' . $course['Keywords'] . '",' . PHP_EOL;
            //echo '"duration":"' . $course['Days'] . '",' . PHP_EOL;
            echo '"_learning_partner":"' . $course['Course Owner Org'] . '",' . PHP_EOL;
            echo '"author":"' . $course['Course Owner Org'] . '",' . PHP_EOL;
            echo '"date_published":"2020-05-13T14:00:00",' . PHP_EOL;
            echo '"date_modified":"' . $newDate . '",' . PHP_EOL;
            echo '"tags":"' . rtrim(trim($course['Category']),',') . '",' . PHP_EOL;
            // echo '"url":"' . $course['Link to ELM Search'] . '"' . PHP_EOL;
            // The provided Link to ELM Search value needs to be parsed to %22 encode the quote values
            echo '"url":"https://learning.gov.bc.ca/psc/CHIPSPLM_6/EMPLOYEE/ELM/c/LM_OD_EMPLOYEE_FL.LM_FND_LRN_FL.GBL?Page=LM_FND_LRN_RSLT_FL&Action=U&KWRD=';
            echo '%22' . $course['Course Code'] . '%22"' . PHP_EOL;
            echo '},'.PHP_EOL;
        
    }
    echo '{}';
} // endif fopen courses.csv
?>
]
}