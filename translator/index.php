<?php

if ( empty($_POST) ) { ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Translator BibTex <=> EndNote </title>
    <meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

  </head>

  <body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Translator BibTex <=> EndNote </h1>
    <p class="lead">Wybierz opcje filtrowania oraz rodzaj edytora.</p>
  </div>
</div>


    <center>

	
    <form action="" target="view" method="post">
	
	
	<div class="card" style="width: 40rem;">
	
	<div class="card-header">
    <ul class="nav nav-pills card-header-pills">
	<a href="../index.php" class="btn btn-outline-success btn-sm">Strona główna</a>
	  </ul>
	  </div>
  <div class="card-body">
    <h4 class="card-title"></h4>
   <font face="Dosis">Rodzaj edytora: </font><select name="template" class="btn btn-secondary dropdown-toggle">
            <option value="xhtml_simple">Wizualny XHTML</option>
            <option value="bibtex_simple">BibTeX</option>
            <option value="dokuwiki_simple">EndNote</option>
          </select>
		  <br><br>
		  
		  
		  <div class="input-group" width="200px">
  <span class="input-group-addon" id="basic-addon1">Author: </span>
  <input name="only_author" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">

</div>
 <small>np. <code>Androulidakis</code></small>
 <br>
 <br>
 
  <div class="input-group" width="200px">
  <span class="input-group-addon" id="basic-addon1">Title: </span>
  <input name="only_title" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">

</div>
 <small>np. <code>Searching for hidden patterns</code></small>

<br><br>
 
 <div class="input-group" width="200px">
  <span class="input-group-addon" id="basic-addon1">Booktitle: </span>
  <input name="only_booktitle" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">

</div>
<small>np. <code>International</code></small>
 
 <br><br>
 
 <div class="input-group" width="200px">
  <span class="input-group-addon" id="basic-addon1">Year: </span>
  <input name="only_year" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">

</div>
<small>np. <code>2015</code></small>
 
 <br><br>
<input type="submit" value="Filtruj" class="btn btn-outline-primary btn-lg"/>

 </div>
</div>
	

</form>
   

    <hr />
</center>
<center>
    <iframe name="view" width="780px" height="550px" scrolling="auto" frameborder="0">
     Wybierz opcje filtrowania.
    </iframe>
</center>
<br><br>
  </body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  


</html>


<?php
}
else {
  require('bibtex_converter.safe.php');

  function sanitise($string) {
    return preg_replace(array('/\{|\}/',"/\\'e/",'/\\&/'), array('','é','&'), $string);
  }
$lang = 'en';
  
  $parser = new BibtexConverter(array(
    'only' => array('author' => $_POST['only_author'], 'title' => $_POST['only_title'], 'booktitle' => $_POST['only_booktitle'], 'year' => $_POST['only_year']),
    'lang' => $lang), 'sanitise');

	
  $result = $parser->convert(file_get_contents('upload/1'), file_get_contents($_POST['template'].'.safe.tpl'));

  if ( !preg_match('/^xhtml/', $_POST['template']) ) {
    $result = '<textarea cols="100" rows="100">'.$result.'</textarea>';
  }

  echo $result;
}

?>
