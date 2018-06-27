<?php
	
	class Database extends PDO
	{

		public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PW)
		{
			parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PW);
			$this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}

		public function select($sth, $array = array(), $fetch_mode = PDO::FETCH_ASSOC)
		{
			$query = $this->prepare($sth);

			foreach ($array as $key => $value) {
				$query->bindValue(":$key", $value);
			}

			$query->execute();

			return $query->fetchAll($fetch_mode);
		}

		public function insert($table, $data)
		{
			ksort($data);

			$field_names = implode('`, `', array_keys($data));
			$field_values = ':' . implode(', :', array_keys($data));

			$query = $this->prepare("INSERT INTO $table (`$field_names`) VALUES ($field_values)");

			foreach ($data as $key => $value) {
				$query->bindValue(":$key", $value);
			}

			$query->execute();
		}

		public function update($table, $data, $where)
		{
			ksort($data);

			$field_details = null;

			foreach ($data as $key => $value) {
				$field_details .= "`$key`=:$key, ";
			}

			$field_details = rtrim($field_details, ", ");
			$field_names = implode('`, `', array_keys($data));
			$field_values = ':' . implode(', :', array_keys($data));

			//die("UPDATE $table SET $field_details WHERE $where");
			$query = $this->prepare("UPDATE $table SET $field_details WHERE $where");

			foreach ($data as $key => $value) {
				$query->bindValue(":$key", $value);
			}
			$query->execute();
		}

		public function delete($table, $where, $limit = 1)
		{
			return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit"); 
		}

	}