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
	  	<td><?= $randomCheker->getValue() ?></td>
	  	<td><?= $randomCheker->getValueMark() ?>%</td>
	  </tr>
	  <tr>
	  	<td>Дисперсия</td>
	  	<td><?= RandomCheker::$expectedDispersion ?></td>
	  	<td><?= $randomCheker->getDispersion() ?></td>
	  	<td><?= $randomCheker->getDispersionMark()?>%</td>
	  </tr>
	  <tr>
	  	<td>Последовательность (2 числа)</td>
	  </tr>
	  <tr>
	  	<td>Последовательность (3 числа)</td>
	  </tr>
	   <tr>
	  	<td>Последовательность (4 числа)</td>
	  </tr>
	  <tr>
	  	<td>Последовательность (5 чисел)</td>
	  </tr>
	</table>
</div>