<?php 
use app\business\RandomCheker;
 ?>
<div class="responceContainer">
	<h3 class="successHeader">
	Последовательность добавлена!
	</h3>
	<table>
	  <tr>
	  	<th></th>
	    <th>Нормативное значение</th>
	    <th>Ваш результат</th>
	    <th>Оценка</th>
	  </tr>
	  <tr>
	  	<td>Мат. ожидание</td>
	  	<td><?= RandomCheker::expectedValue ?></td>
	  	<td><?= round($randomCheker->getValue(),2) ?></td>
	  	<td><?= round($randomCheker->getValueMark(),2) ?>%</td>
	  </tr>
	  <tr>
	  	<td>Дисперсия</td>
	  	<td><?=RandomCheker::expectedDispersion ?></td>
	  	<td><?=round($randomCheker->getDispersion(),2) ?></td>
	  	<td><?=round($randomCheker->getDispersionMark(),2) ?>%</td>
	  </tr>
	  <tr>
	  	<td>Уникальность (2 числа подряд)</td>
	  	<td colspan="2"></td>
	  	<td><?=$randomCheker->getRepeatedMark(2)?>%</td>
	  </tr>
	  <tr>
	  	<td>Уникальность (3 числа подряд)</td>
	  	<td colspan="2"></td>
	  	<td><?=$randomCheker->getRepeatedMark(3)?>%</td>
	  </tr>
	</table>
	<h4>
		Результат: <?= $randomCheker->getTotalScore() ?>%
	</h4>
</div>