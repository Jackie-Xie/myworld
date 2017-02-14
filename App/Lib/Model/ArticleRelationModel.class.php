<?php

//以文章主体的关联模型
Class ArticleRelationModel extends RelationModel{
	Protected $tableName = 'article';

	Protected $_link = array(
			'category' => array(
				'mapping_type' => BELONGS_TO,
				'foreign_key' => 'cid',
				// 'mapping_field' => 'cname'
			),
			'comment' => array(
				'mapping_type' => HAS_MANY,
				'foreign_key' => 'aid'
			)
	); 

}