<?php

/**
 * Enter description here...
 *
 * @return mixed
 */
function connect(){
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE);
	mysqli_autocommit($db, true);
	$_SESSION["db"] = $db;

	return $db;
}

/**
 * Enter description here...
 *
 * @param mixed $db
 * @param string $sql
 * @return array
 */
function executeQuery($db, $sql){
	$result = array();
	$tmp = mysqli_query($db, $sql);

	while ($row = mysqli_fetch_assoc($tmp))
	{
		$result[] = $row;
	}

	if( !empty($result) ){
		//Cas d'un seul résultat
		if( count($result) == 1 ){
			return $result[0];
		}
	}

	return $result;
}

/**
 * Enter description here...
 *
 * @param mixed $db
 * @param string $table
 * @param array $data
 * @return boolean
 */
function insertGenericQuery( $db, $table, $data ){
	$sql = "INSERT INTO $table ";

	$sqlField = "";
	$sqlValue = "";

	if( is_array($data) && !empty($data) ){
		$sqlField = join(', ', array_keys($data));
		$sqlValue = "'".join("', '", array_values($data))."'";

		$sql .= "(".$sqlField.") VALUES (".$sqlValue.")";
	}

	$result = mysqli_query($db, $sql);

	return $result;
}

/**
 * Enter description here...
 *
 * @param mixed $db
 * @param string $table
 * @param array $data
 * @param array $key
 * @return boolean
 */
function updateGenericQuery( $db, $table, $data, $key ){
	$sql = "UPDATE $table SET ";

	if( is_array($data) && !empty($data) ){
		$sqlSet = array();
		foreach ($data as $field => $value){
			$sqlSet[] = $field." = '".$value."'";
		}

		if( is_array($key) && !empty($key) ) {
			$field = array_keys($key);
			echo "<pre>"; var_export($field); echo "</pre>";
			$sqlWhere = "WHERE ".$field[0]." = '".$key[$field[0]]."'";

			$sql .= join(",", $sqlSet)." ".$sqlWhere;
			$result = mysqli_query($db, $sql);
		}
	}

	return $result;
}

/**
 * Enter description here...
 *
 * @param mixed $db
 * @param string $sql
 * @return boolean
 */
function insertQuery( $db, $sql ){
	$result = mysqli_query($db, $sql);
	if( !$result ){
		echo mysqli_errno($db)." ".mysqli_error($db);
	}
	return $result;
}