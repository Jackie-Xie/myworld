<?php

//以栏目主体的关联模型
Class CategoryRelationModel extends RelationModel{
	Protected $tableName = 'category';

	Protected $_link = array(
			'article' => array(
				'mapping_type' => HAS_MANY,
				'foreign_key' => 'cid',
				// 'mapping_field' => 'cname'
			)
	); 

}