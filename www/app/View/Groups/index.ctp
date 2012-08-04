<h2>Список групп на вашем факультете</h2>

<ul class="nav nav-tabs">
  <li <? if ($course == 1) : ?> class="active" <? endif ?>>
    <a href="/groups/index/1">1 курс</a>
  </li>
  <li <? if ($course == 2) : ?> class="active" <? endif ?>>
    <a href="/groups/index/2">2 курс</a>
  </li>
</ul>


<div class="row">
  <div class="span2">
    <a href="#" class="btn btn-primary">Добавить группу</a>
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
      <td><a href="/groups/students_from_group/<?= $group['Group']['id']; ?>"><?php echo $group['Group']['number'];  ?>   </td>
      <td><a href="/specialities/students_from_speciality/<?=$group['Speciality']['id'];?>"> <?= $group['Speciality']['name'];?> </a></td>
      <td><?php echo $group['Education_form']['name'];  ?>   </td>
      <td><a href="#" class="btn">Изменить</a></td>
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>
