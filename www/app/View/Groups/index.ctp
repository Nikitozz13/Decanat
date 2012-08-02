<h2>Список групп на факультете <?//=echo $group['Faculty']['name'];?></h2>

<div class="row">
  <div class="span2">
    <a href="#" class="btn btn-primary">Добавить студента</a>
  </div>
</div>

<table class='table table-bordered table-striped table-condensed' style="margin-top: 2em">
  <thead>
    <tr>
      <th>id</th>
      <th>Номер</th>
      <th>Специальность</th>
      <th>Форма обучения</th>
      <th style="width: 80px"></th>
    </tr> 
  </thead>
  <tbody>
    <?php foreach ($groups as $group):  ?>
    <tr>
      <td><?php echo $group['Group']['id'];  ?>  </td>
      <td><?php echo $group['Group']['number'];  ?>  </td>
      <td><?php echo $group['Speciality']['name'];  ?>  </td>
      <td><?php echo $group['Education_form']['name'];  ?>   </td>
      <td><a href="#" class="btn">Изменить</a></td>
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>
