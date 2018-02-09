<?php
	function errorHandler($err) {
		switch ($err->errorInfo[1]) {
			case 1452:
				$error = array(
					'errCod' => $err->errorInfo[1],
					'errMsg' => 'Error por llave foranea'
				);
				break;
			case 1062:
				$error = array(
					'errCod' => $err->errorInfo[1],
					'errMsg' => 'Ya existe el registro'
				);
				break;
			case 1048:
				/*$colPosIni = strpos($err->errorInfo[2] ,"'") + 1;
					$colPosFin = strpos($err->errorInfo[2] ,"'", $colPosIni) - $colPosIni;
					$colName = substr($err->errorInfo[2], $colPosIni, $colPosFin);
				
					$error = "Campo '$colName' no puede estar vacío";*/
				$error = array(
					'errCod' => $err->errorInfo[1],
					'errMsg' => 'Campo no puede estar vacío'
				);
				break;
			case 1146:
				$error = array(
					'errCod' => $err->errorInfo[1],
					'errMsg' => 'Tabla no existe'
				);
				break;
			/*case 0:
				$error = "";
				break;
			case 0:
				$error = "";
				break;
			case 0:
				$error = "";
				break;*/
			default:
				$error = array(
					'errCod' => $err->errorInfo[1],
					'errMsg' => 'Error no catalogado: ' . json_encode($err)
				);
		}

		return $error;
	}
?>