<?php
//以评论表为主体的关联模型
Class CommentRelationModel extends RelationModel{
	Protected $tableName = 'comment';

	Protected $_link = array(
			'article' => array(
				'mapping_type' => BELONGS_TO,
				'foreign_key' => 'aid'
				// 'mapping_field' => 'cname'
			),
			'user' => array(
				'mapping_type' => BELONGS_TO,
				'foreign_key' => 'uid'
				// 'mapping_field' => 'cname'
			)
	); 
	
}