<h2>студенты</h2>

<div class="row">
  <div class="span2">
    <a href="#" class="btn btn-primary">Добавить студента</a>
  </div>
</div>

<table class='table table-bordered table-striped table-condensed' style="margin-top: 2em">
  <thead>
    <tr>
      <th>id</th>
      <th>Персональный номер</th>
      <th>Фамилия</th>
      <th>Группа</th>
      <th>Факультет</th>
      <th style="width: 80px"></th>
    </tr> 
  </thead>
  <tbody>
    <?php foreach ($students as $student):  ?>
    <tr>
      <td><?php echo $student['Student']['id'];  ?>  </td>
      <td><?php echo $student['Student']['personal_number'];  ?>  </td>
      <td><?php echo $student['Person']['last_name'];  ?>  </td>
      <td><a href="/students/students_from_group/<?= $student['Group']['id']; ?>"><?php echo $student['Group']['number'];  ?>   </td>
      <td><?php echo $student['Faculty']['name'];  ?>   </td>
      <td><a href="#" class="btn">Изменить</a></td>
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>
