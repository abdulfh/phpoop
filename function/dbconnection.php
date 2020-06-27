<?php
class Database{
    private $host = 'localhost';
    private $username = 'newuser';
    private $password = 'hallo';
    private $db = 'phpoop';
    
    function __construct(){
        $koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->db);
		
 
		if($koneksi){
			echo "Koneksi database mysql dan php berhasil.";
		}else{
			echo "Koneksi database mysql dan php GAGAL !";
		}
    }
}