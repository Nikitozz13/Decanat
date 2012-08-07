<h2>Специальности на вашем факультете</h2>

<div class="row">
  <div class="span2">
    <a href="Specialities/add" class="btn btn-primary">Добавить специальность</a>
  </div>
</div>

<table class='table table-bordered table-striped table-condensed' style="margin-top: 2em">
  <thead>
    <tr>
      <th>id</th>
      <th>Код</th>
      <th>Наименование</th>
      <th>Продолжительность обучения</th>
      <th style="width: 80px"></th>
    </tr> 
  </thead>
  <tbody>
    <?php foreach ($specialities as $speciality):  ?>
    <tr>
      <td><?php echo $speciality['Speciality']['id'];  ?>  </td>
      <td><?php echo $speciality['Speciality']['code'];  ?>  </td>
      <td><a href="/groups/groups_from_speciality/<?=$speciality['Speciality']['id'];?>"> <?= $speciality['Speciality']['name'];?> </a></td>
      <td><?php echo $speciality['Speciality']['duration'];  ?>  </td>
      <td><a href="#" class="btn">Изменить</a></td>
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>