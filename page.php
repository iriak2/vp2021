<?php
	$author_name = "Kairi Käpa";
	$weekday_names_et = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
	$full_time_now = date("d.m.Y H:i:s");
	$hour_now = date("H");
	//echo $hour_now;
	$weekday_now = date("N");
	//echo $weekday_now;
	$day_category = "ebamäärane";
	if($weekday_now <= 5) { // < suuremkui > väiksemkui <= on väiksemkuivõrdne => on suuremkuivõrdne == on kontrolliks != on ei võrdu
		$day_category = "koolipäev";
	} else {
			$day_category = "puhkepäev";
	}
	
	if($hour_now <= 8){
		$time = "Tere hommikust!";
		
	} elseif($hour_now > 8 and $hour_now <= 17 and $weekday_now <= 5){
		$time = "Koolipäev!";
		
	} elseif($hour_now > 8 and $hour_now <= 17 and $weekday_now > 5){
		$time = "Vaba aeg :)";
		
	} else{
		$time = "Tere õhtust!";
	}
	
	
	
	//if($muutuja > 8 and $muutuja <= 18)
		
	//echo $day_category;
	//kuupäev kellaaeg, on koolipäev
	
	//loeme fotode kataloogi sisu
	$photo_dir = "photos/";
	$allowed_photo_types = ["image/jpeg", "image/png"];
	//$all_files = scandir($photo_dir);
	$all_files = array_slice(scandir($photo_dir), 2);
	//echo $all_files; jama
	//var_dump($all_files);
	//$only_files = array_slice($all_files, 2);
	//var_dump($only_files);
	
	//sõelun välja aint lubatud pildid
	$photo_files = [];
	foreach($all_files as $file) {
		$file_info = getimagesize($photo_dir .$file);
		if(isset($file_info["mime"])){
		if(in_array($file_info["mime"], $allowed_photo_types)){
			array_push($photo_files, $file);
			}
		}
	}	
	$limit = count($photo_files);
	//echo $limit;
	$pic_num = mt_rand(0, $limit - 1);
	$pic_file = $photo_files[$pic_num];
	// <img src="pilt.jpg" alt="Tallinna Ülikool">
	$pic_html = '<img src= "' .$photo_dir .$pic_file .'" alt="Tallinna Ülikool">';
?>
<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?>, veebiprogrammeerimine</title>
</head>
<body>
	<hl><?php echo $author_name; ?>, veebiprogrammeerimine</hl>
	<p>See leht on valminud õppetöö raames ja ei sisalda mingisugust tõsiseltvõetavat sisu!</p>
	<p>Õppetöö toimus <a href="https://www.tlu.ee/dt">Tallinna Ülikooli Digitehnoloogiate instituudis</a>.</p>
	<img src="3700x1100pildivalik187.jpg" alt="Tallinna Ülikooli Terra õppehoone" width="600">
	<p>Lehe avamise hetk: <span><?php echo $weekday_names_et[$weekday_now - 1] .", " .$full_time_now .", on " . $day_category; ?></span>.</p>
	<p><?php echo $time; ?></p>
	<h2>Kursusel õpime</h2>
	<ul>
	<li>HTML keelt</li>
	<li>PHP</li>
	<li>jne</li>
	</ul>
	<?php echo $pic_html; ?>
</body>
</html>