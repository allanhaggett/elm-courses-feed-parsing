<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Allan Haggett <allan.haggett@gov.bc.ca>">

<link rel="stylesheet" href="/learning/bootstrap-theme/dist/css/bootstrap-theme.min.css">

<title>Learning Centre @Work Course Catalog Feed Generator</title>

</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary-nav mb-3">
  <span class="navbar-brand">Learning Centre @Work Course Catalog Feed Generator</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="jsonfeed.php">JSON Feed</a>
		</li>
    <li class="nav-item">
			<a class="nav-link" href="https://learn.bcpublicservice.gov.bc.ca/learningcentre/courses/feed.json">Public Feed</a>
		</li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<h1>Course Catalog</h1>
<p>Soon this will be an upload form which takes the result of the 
<a href="https://learning.gov.bc.ca/psc/CHIPSPLM_3/EMPLOYEE/ELM/q/?ICAction=ICQryNameURL%3DPUBLIC.GBC_ATWORK_CATALOG"
  target="_blank"
  rel="noopener">
	  GBC_ATWORK_CATALOG ELM query
</a>
parses it, and then spits out a JSON feed that is compatible with 
<a href="https://gww.gov.bc.ca/course-catalogue">the @Work Course Catalog</a>,
<a href="https://learningcentre.gww.gov.bc.ca">and our new comms platform</a>.</p>
<div class="row">
<div class="col-md-4">
<form enctype="multipart/form-data" method="post" 
									accept-charset="utf-8" 
									class="up" 
									action="controller.php">
  <div class="alert alert-light">
	<label>Choose an up-to-date Catalog CSV:<br>
		<input type="file" name="file" class="form-control-file btn btn-lg btn-primary">
	</label>
  </div>
  <div class="alert alert-light">
    After choosing the "Upload ..." button below, you will be directed to a 
    file which is the feed itself. You can simply do a File > Save from the 
    browser window, and choose to save it in the <br>
    <br>
    <strong>NonSSOLearning/LearningCentre/courses/</strong>
    <br><br>
    named "<strong>feed.json</strong>"
    <br><br>
    so
    <br><br>
    <strong>NonSSOLearning/LearningCentre/courses/feed.json</strong>
    <br><br>
    Try to rename the existing feed.json file as 2021-04-20-feed.json before 
    overwriting it, just in case something is wrong and we need to roll-back.


  </div>
	
	<input type="submit" class="btn btn-primary btn-block mt-3" value="Upload Current Course Stats CSV file">
</form>
</div>
</div>
</div> 
</div>
</div>
<script src="/lsapp/js/jquery-3.4.0.min.js"></script>
<script src="/lsapp/js/popper.min.js"></script>
<script src="/lsapp/js/bootstrap.min.js"></script>

</body>
</html>