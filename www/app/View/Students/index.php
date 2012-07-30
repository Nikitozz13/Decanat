<h1>студенты</h1>
<table>
  <tr>
  	<th>id</th>
  	<th>Персональный номер</th>
  	<th>ФИО</th>
  	<th>Группа</th>
  </tr> 

  <?php foreach ($students as $student):  ?>
  <tr>
  	<td><?php echo $student['Student']['id'];  ?>  </td>
  	<td><?php echo $student['Student']['personal_number'];  ?>  </td>
  	<td>  </td>
  	<td>  </td>
  </tr>
<?php endforeach;  ?>
</table>
