<?PHP

$str = "
%E inproceedings
%0 7222946__
%A M. Bakkali, C. Mascarenas-Perez-Inigo  
%B 2015 International Conference on Information and Digital Technologies  
%T Real time digital signal processing and measurement method for electromagnetic compatibility verification into the ships  
%Y 2015  
%V   
%N   
%P 28-34  
%S In this paper, we present a new Electromagnetic Compatibility (EMC) measurement and verification system for ships, based on real time digital signal processing techniques, in combination with a VLF-UHF receiver. We programmed all the algorithms for the systems, in order to have reliable software, known, expandable and intuitive. The basis of our strategy is first described, then, our implemented computing algorithms are explained. Recommendations and examples about the significant parameters for dealing with the measurement process are given, and finally several measurements are performed to validate the proposed method.  
%K electromagnetic compatibility;marine engineering;measurement;radio receivers;ships;signal processing;EMC;VLF-UHF receiver;electromagnetic compatibility verification;measurement method;real time digital signal processing techniques;ships;Conferences;Decision support systems;Digital signal processing;Electromagnetic compatibility;Q measurement;Real-time systems;Time measurement;Digital Signal Processing (DSP);Electromagnetic Compatibility (EMC);Electromagnetic Interference (EMI);Maritime Radiocommunications;Sound Card  
%D 10.1109/DT.2015.7222946  
%I    
";

$i = 26;

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

echo "<pre>". $str ."</pre>";

?>