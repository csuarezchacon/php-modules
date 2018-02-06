<?php
	function errorHandler($errCode) {
		switch ($errCode->errorInfo[1]) {
			case 1452:
				$errMsg = "Error por llave foranea";
				break;
			case 1062:
				$errMsg = "Ya existe el registro";
				break;
			case 1048:
				/*$colPosIni = strpos($errCode->errorInfo[2] ,"'") + 1;
					$colPosFin = strpos($errCode->errorInfo[2] ,"'", $colPosIni) - $colPosIni;
					$colName = substr($errCode->errorInfo[2], $colPosIni, $colPosFin);
				
					$errMsg = "Campo '$colName' no puede estar vacío";*/
				$errMsg = "Campo no puede estar vacío";
				break;
			/*case 0:
				$errMsg = "";
				break;
				case 0:
					$errMsg = "";
					break;
				case 0:
					$errMsg = "";
					break;
				case 0:
					$errMsg = "";
					break;*/
			default:
				$errMsg = "Error no catalogado: " . json_encode($errCode);
		}

		return $errMsg;
	}
?>