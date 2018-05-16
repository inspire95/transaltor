
<?php

  
if(isset($_POST['select'])){


$bibtex = file('upload/1');
$enw = 'enw.enw';


//unlink('upload/1');

}?>


<?php 
$target_dir = "translator/upload/";
$target_file =  $target_dir . basename(isset($_FILES["fileToUpload"]["name"]));
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


$filename = 'translator/upload/1';

if (file_exists($filename)) {
    unlink('translator/upload/1');
} 

if (isset($_POST["select2"])) {

	if($_POST["exampleRadios"] == 'bib'){

    if ($target_file == "translator/upload/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } 
    else if (file_exists($target_file)) {
        $msg = "Plik istnieje.";
        $uploadOk = 0;
    } 
    else if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $msg = "Plik jest za duży.";
        $uploadOk = 0;
    } 
    else if ($uploadOk == 0) {
        $msg = "Nie wgrano.";

    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        }
    }
	header("Location: translator/index.php");
	}


	else if($_POST["exampleRadios"] == 'enw'){
	
	 if ($target_file == "translator/upload/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } 
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    } 
    else if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    } 
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        }
    }
	$url = 'translator/upload/1';
	$str = file_get_contents($url);
	
	$i = 15;

$str = str_replace('%E inproceedings', '',$str);
$str = str_replace('%0 ','@inproceedings{',$str);
$str = str_replace('%A', 'author = {', $str);
$str = str_replace('%B', 'booktitle = {', $str);
$str = str_replace('%T', 'title = {', $str);
$str = str_replace('%Y', 'year = {', $str);
$str = str_replace('%V', 'volume = {', $str);
$str = str_replace('%N', 'number = {', $str);
$str = str_replace('%P', 'pages = {', $str);
$str = str_replace('%S', 'abstract = {', $str);
$str = str_replace('%K', 'keywords = {', $str);
$str = str_replace('%D', 'doi = {', $str);
$str = str_replace('%I', 'issn = {', $str);
$str = str_replace('  ', '},', $str);
$str = str_replace('__', ',', $str);

	//echo $str;
	
	file_put_contents($url,$str);

	header("Location: translator/index.php");

	}
}


?> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

	<br><center>
	_______________________________________________________________________________________________
	<br><br>
	<h1 class="display-4">Translator BibTex <=> EndNote </h1>

	
	<br><br><br>
    <form  method="post" enctype="multipart/form-data">

	<label class="custom-file">
    <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
	<span class="custom-file-control">Wybierz plik</span>
	
	</label>
	<br>
	<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="exampleRadios" id="inlineRadio1" value="bib" checked> <small>.*bib</small>
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="exampleRadios" id="inlineRadio2" value="enw"> <small>.*enw</small>
  </label>
</div>

	
	

	<br><br>
	
  
</div>
</div>
	
	<br>
    <input type="submit" name="select2" class="btn btn-outline-primary" value="Wczytaj" >
	

    </form>

<br>
<br>

_______________________________________________________________________________________________
<br>
<small>Webowy translator formatów opisów bibliograficznych BibTex <=> EndNote z opcjami filtrowania.</small>
<br>
<p><small>@version 1.0 beta</small></p>

<br>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Co trzeba jeszcze zrobić ?
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
<small>
- <del> zrobić parser dla opisu: <i>1.1 aplha</i></del> <u>10.12.2017</u><br>
- <del> zrobić pętlę dla n opisów: <i>1.2 alpha</i></del> <u>15.12.2017</u><br>
- <del> zrobić filtrowanie podstawowe: <i>1.3 alpha</i></del><u>16.12.2017</u><br>
- <del> zrobić filtrowanie całości<i>1.4 alpha</i></del> <u>17.12.2017</u><br>
- <del> zrobić translacje EndNote => BibTex <i>1.5 alpha</del></i><u>17.12.2017</u>

</small>
<br>
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    100% ukończono
  </div>
</div>
  </div>
</div>
</center>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  



