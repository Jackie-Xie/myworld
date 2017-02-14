<?php
/**
 * 自定义数组格式化输出函数
 */
function p ($array) {
	dump($array,1,'<pre>',0);
}

/**
 * [replace_phiz description]
 * @param    [String]     $content [description]
 * @return   [String]              [description]
 */
function replace_phiz($content){

	preg_match_all('/\[.*?\]/is',$content,$arr);
	

	if($arr[0]){
		$phiz = F('phiz','','./data/');
		foreach($arr[0] as $v){
			foreach($phiz as $key => $value){
				if($v == '[' . $value . ']'){
					$content = str_replace($v,'<img src = "' . __ROOT__ . '/Public/images/phiz/' . $key . '.gif"/>',$content);
				}
		
			}
		}
		
	}
	return $content;
}
