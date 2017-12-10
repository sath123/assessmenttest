<?php
  class db {
        public $dbCon;

        public function __construct(){
			try {
					$config = parse_ini_file('config.ini');

					$this->dbCon = mysqli_connect($config['server_name'], $config['user_name'], $config['password'], $config['dbname']);

			} catch (Exception $e) {
				echo $e->getMessage();
			}
				
        }

        public function __destruct(){
                mysqli_close($this->dbCon);
        }   


    
    public function fetchdata($fromdt,$todate)
    {
			try {

				$sql = "SELECT a.type, SUM(a.amount)as cnt FROM invoice_items AS a JOIN invoices AS b ON a.invoice_id=b.id WHERE b.datepaid BETWEEN '".$fromdt."' AND '".$todate."'  GROUP BY a.type";       

				$result = $this->dbCon->query($sql);
				return $result;

			} catch (Exception $e) {
				echo  $e->getMessage();
			}
    }
	
	public function gettypeval(){		
		try {

			$sql = "SELECT a.id,a.invoice_id,a.type,a.amount, b.status, b.datepaid FROM invoice_items AS a LEFT JOIN invoices AS b ON a.invoice_id=b.id ";

			$result = $this->dbCon->query($sql);
			return $result;		
		} catch (Exception $e) {
				echo $e->getMessage();
			}
	}

    public function type_customized_result($result) {
        $final_result =  array();
        while($row = $result->fetch_assoc()){
            $final_result[$row['type']][] = $row;
        }
        $result->close();
        return $final_result;
    }
    

    public function query($sql){
    $result = $this->dbCon->query($sql);
    return $result;
    }

    public function result($result){   
	
	while($row = $result->fetch_assoc()){
    $rows[] = $row;
	}

   
    $result->close();
    return $rows;
    }

    public function row($result){    
    $row = $result->fetch_all();
    $result->close();
    return $row;
    }
    

 }

 ?>