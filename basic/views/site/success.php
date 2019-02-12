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
	  	<td><?= RandomCheker::$expectedValue ?></td>
	  	<td><?= round($randomCheker->getValue(),2) ?></td>
	  	<td><?= round($randomCheker->getValueMark(),2) ?>%</td>
	  </tr>
	  <tr>
	  	<td>Дисперсия</td>
	  	<td><?= RandomCheker::$expectedDispersion ?></td>
	  	<td><?= round($randomCheker->getDispersion(),2) ?></td>
	  	<td><?= round($randomCheker->getDispersionMark(),2) ?>%</td>
	  </tr>
	  <tr>
	  	<td>Последовательность (2 числа)</td>
	  	<td><?= round( $randomCheker->getExpectedRepeated(2), 2)?></td>
	  	 	<td><?= round( $randomCheker->getRepeated(2), 5)?></td>
	  	<td><?= round( $randomCheker->getRepeatedMark(2), 2)?></td>
	  </tr>
	  <tr>
	  	<td>Последовательность (3 числа)</td>
	  	<td><?= round( $randomCheker->getExpectedRepeated(3), 2)?></td>
	  	<td><?= round( $randomCheker->getRepeated(3), 5)?></td>
	  	<td><?= round( $randomCheker->getRepeatedMark(3), 2)?></td>
	  </tr>
	   <tr>
	  	<td>Последовательность (4 числа)</td>
	  	<td><?= round( $randomCheker->getExpectedRepeated(4), 2)?></td>
	  	<td><?= round( $randomCheker->getRepeated(4), 5)?></td>
	  	<td><?= round( $randomCheker->getRepeatedMark(4), 2)?></td>
	  </tr>
	  <tr>
	  	<td>Последовательность (5 чисел)</td>
	  	<td><?= round( $randomCheker->getExpectedRepeated(5), 2)?></td>
	  	<td><?= round( $randomCheker->getRepeated(5), 5)?></td>
	  	<td><?= round( $randomCheker->getRepeatedMark(5), 2)?></td>
	  </tr>
	</table>
</div>