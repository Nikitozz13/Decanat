<?php
class Group extends AppModel {
	public $name = 'Group';
	public $belongsTo = 'Speciality';
	public $hasMany = 'GroupStudent';
}
?>