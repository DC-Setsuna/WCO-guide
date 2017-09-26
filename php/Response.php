<?php 

class Response {

	const JSON = "json";

	/**
	 * 综合输出通信数据方式
	 * @param  integer $code    状态码
	 * @param  string $message 提示信息
	 * @param  array  $data    数据
	 * @param  string $type    输出数据类型
	 * @return string          
	 */
	public static function show($code,$message='',$data=array(),$type=self::JSON) {
		if(!is_numeric($code)) {
			return '';
		}

		$types = array('json','array','xml');
		$type = in_array($_GET['format'],$types) ? $_GET['format'] : self::JSON;

		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);

		if($type == 'json') {
			self::json($code,$message,$data);
			exit;
		} elseif($type == 'array') {
			var_dump($result);
		} elseif($type == 'xml') {
			self::xmlEncode($code,$message,$data);
			exit;
		}
	}


	/**
	 * 按JSON方式封装通信数据
	 * @param  integer $code    状态码
	 * @param  string $message 提示信息
	 * @param  array  $data    数据
	 * @return string          返回JSON数据
	 */
	private static function json($code,$message='',$data=array()) {

		if(!is_numeric($code)) {
			return '';
		}

		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);

		echo json_encode($result);
		exit;
	}


	/**
	 * 按xml方式封装通信数据
	 * @param  integer $code    状态码
	 * @param  string $message 提示信息
	 * @param  array  $data    数据
	 * @return string          返回xml数据
	 */
	private static function xmlEncode($code,$message='',$data=array()) {

		if(!is_numeric($code)) {
			return '';
		}
		
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);

		header("Content-Type:text/xml");

		$xml = "<?xml version='1.0' encoding='UTF-8'?>";
		$xml .= "<root>";
		$xml .= self::xmlToEncode($result);
		$xml .= "</root>";

		echo $xml;
		exit;
	}


	/**
	 * xml格式化
	 * @param  array $data 需要格式化的数据
	 * @return string       
	 */
	private static function xmlToEncode($data) {
		$xml = $attr = "";
		foreach ($data as $key => $value) {
			if(is_numeric($key)) {
				$attr = "id='{$key}'";
				$key = "item";
			}
			$xml .= "<{$key} {$attr}>";
			$xml .= is_array($value)?self::xmlToEncode($value):$value;
			$xml .= "</{$key}>";
		}
		return $xml;
	}






}


