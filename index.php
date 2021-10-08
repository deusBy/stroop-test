<?
$allColors = array('red','blue','green','yellow','lime','magenta','black','gold','gray','tomato');
$stroopArray = array();
for($i=0;$i<5;$i++){
	for($j=0;$j<5;$j++){
		$color = $allColors[array_rand($allColors)];
		$text = $allColors[array_rand($allColors)];
		if(!empty($stroopArray[$i])) {                                	//если не первый элемент в строке
			if(in_array($text,array_column($stroopArray[$i],'text'))){	//если в этой строке есть уже такой цвет
				$tmp = array_column($stroopArray[$i],'text');
				while (true) { 
					$text = $allColors[array_rand($allColors,1)];
					if(!in_array($text,$tmp)) break;
				}
			}
		}
		if($color == $text){
			while (true) { 
				$color = $allColors[array_rand($allColors,1)];
				if($color != $text) break;	
			}
		}
		$stroopArray[$i][$j] = array('color'=>$color,'text'=>$text);
	}
}
?>
<html>
<head>
	<title>Тест Струпа</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="all">
	<div class="container">
		<?foreach ($stroopArray as $strng):?>
			<div>
				<?foreach($strng as $item):?>
				<span style="padding:10px;color:<?echo $item['color'];?>"><?echo $item['text'];?></span>
				<?endforeach;?>
			</div>
		<?endforeach;?>
	</div>
</div>
</body>
</html>