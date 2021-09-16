<?php
    class AdminDb
    {
        private $db;

        public function __construct()
        {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'wdpf47_rms';

            $this->db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            if(!$this->db){
                die('Connection error');
            }
        }

        public function add_user($data)
        {
            
        }
    }
?>