<?php
class Database{
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $db = 'phpoop';
    
    function __construct(){
        $koneksi = mysqli_connect($this->host, $this->uname, $this->pass,$this->db);
		
 
		if($koneksi){
			echo "Koneksi database mysql dan php berhasil.";
		}else{
			echo "Koneksi database mysql dan php GAGAL !";
		}
    }
}