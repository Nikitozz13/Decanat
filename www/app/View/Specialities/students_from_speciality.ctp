<h2>студенты cо специальности <?php echo $specialities[0]['Speciality']['name'];?> </h2>

<div class="row">
  <div class="span2">
    <a href="#" class="btn btn-primary">Добавить студента на эту специальность</a>
  </div>
</div>

<table class='table table-bordered table-striped table-condensed' style="margin-top: 2em">
  <thead>
    <tr>
      <th>id</th>
      <th>Персональный номер</th>
      <th>Фамилия</th>
      <th>Група</th>
      <th style="width: 80px"></th>
    </tr> 
  </thead>
  <tbody>
    <?php foreach ($specialities as $speciality):  ?>
    <tr>
      <td><?php echo $speciality['Student']['id'];  ?>  </td>
      <td><?php echo $speciality['Student']['personal_number'];  ?>  </td>
      <td><?php echo $speciality['Person']['last_name'];  ?>  </td>
      <td><?php echo $speciality['Group']['number'];  ?>  </td>
      <td><a href="#" class="btn">Изменить</a></td>
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>