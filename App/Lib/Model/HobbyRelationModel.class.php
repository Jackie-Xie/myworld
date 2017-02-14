<?php
//以爱好为主体的关联模型
Class HobbyRelationModel extends RelationModel{
	Protected $tableName = 'hobby';

	Protected $_link = array(
			'picture' => array(
				'mapping_type' => HAS_MANY,
				'foreign_key' => 'hid'
				
			)
	); 
	
}