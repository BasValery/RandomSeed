<?php
$this->registerCssFile('@web/css/statistic.css');
$this->title = 'Статистика';
?>

<h2>Средний результат пользователей:</h2>

<?php  
	
	$g = 255 * ($average/100);
	$r = 255 - $g;
	echo "<div class = \"result\"";
	echo "style = \"color: rgb($r,$g,0)\"";
	echo ">${average}%</div>";
?>
