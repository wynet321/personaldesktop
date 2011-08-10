<?php
/*
 Quick start：
 $db = new Db([$dbname]);
 $ResultArray=$db->getXXX();
 echo $ResultArray[?][?]...
 $db->close();

 Functions:
 Db([$dbname])                             //constuction function. If $dbname ommitted, will use class default value.
 Boolean runTranx($sqlarray)               //complete transaction sql command;
 Array getResultArray($sql)                //get ResultSet as an array from DB;
 Integer getResultArrayRowsNum([$sql])     //get ResultSet row number. If $sql omitted, will return last query row number.

 Sample:
 include 'db.inc';
 $db=new Db();
 $ResultArray=$db->getResultArray("select * from table1;");
 echo $ResultArray[1][1];
 $db->close();
 */

class Db
{
	private $User="dennis";
	private $Password="passw0rd";
	private $Server="localhost";
	private $DbName="dennis";
	private $Connection;
	private $ResultArray;
	private $ResultSet;

	function Db($dbname="")
	{
		$this->Connection= (""==$dbname) ?
		mysqli_connect($this->Server,$this->User,$this->Password,$this->DbName):
		mysqli_connect($this->Server,$this->User,$this->Password,$dbname);
	}

	private function query($QueryString)
	{
		//free memory
		if($this->ResultSet)
		{
			mysqli_free_result($this->ResultSet);
		}
		if(""!=$QueryString && $this->Connection)
		{
			$this->ResultSet=mysqli_query($this->Connection,$QueryString);
			while($row=mysqli_fetch_array($this->ResultSet)) {
				$this->ResultArray[] = $row;
			}
		}
	}

	//close Connection, need close() in each page end.
	function close()
	{
		if($this->Connection)
		{
			mysqli_close($this->Connection);
		}
	}

	function getResultArray($QueryString="")
	{
		$this->query($QueryString);
		if($this->ResultSet)
		{
			return $this->ResultArray;
		}
		return;
	}

	function getResultArrayRowsNum($QueryString="")
	{
		if(""==$QueryString)
		{
			if($this->ResultSet)
			{
				return mysqli_num_rows($this->ResultSet);
			}
			else
			{
				return 0;
			}
		}
		else
		{
			$this->query($QueryString);
			return mysqli_num_rows($this->ResultSet);
		}
	}

	function runTranx($CommandArray="")
	{
		if(""==$CommandArray)
		{
			return false;
		}
		// SQL execute success flag
		$IsSuccess=true;
		foreach($CommandArray as $Command)
		{
			mysqli_query($this->Connection,$Command) ? null : $IsSuccess=false;
		}
		//check if we can commit or rollback
		$IsSuccess ? mysqli_commit() : mysqli_rollback();
		return $IsSuccess;


	}

}
?>
