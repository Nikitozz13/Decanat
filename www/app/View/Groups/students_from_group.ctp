<h2>студенты из <?php echo $groups[0]['Group']['number'];?> группы</h2>

<div class="row">
  <div class="span2">
    <a href="#" class="btn btn-primary">Добавить студента в эту группу</a>
  </div>
</div>

<table class='table table-bordered table-striped table-condensed' style="margin-top: 2em">
  <thead>
    <tr>
      <th>id</th>
      <th>Персональный номер</th>
      <th>Фамилия</th>
      <th style="width: 80px"></th>
    </tr> 
  </thead>
  <tbody>
    <?php foreach ($groups as $group):  ?>
    <tr>
      <td><?php echo $group['Student']['id'];  ?>  </td>
      <td><?php echo $group['Student']['personal_number'];  ?>  </td>
      <td><?php echo $group['Person']['last_name'];  ?>  </td>
      <td><a href="#" class="btn">Изменить</a></td>
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>
