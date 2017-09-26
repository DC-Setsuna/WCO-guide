<?php 


class Db {
	private static $_instance;
	public static $dbObj;

	public function __construct() {

	}

	static public function getInstance() {
		if(!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function connect() {
		if(!self::$dbObj) {
			try {
				$dsn = 'mysql:host=localhost;dbname=wco';
				$username = 'root';
				$passwd = 'dc931103';
				self::$dbObj = new PDO($dsn,$username,$passwd);
			} catch(PDOException $e) {
				
				echo $e->getMessage();
			}
		}
		return self::$dbObj;
	}
}
