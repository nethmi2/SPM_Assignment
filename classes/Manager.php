<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Manager
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addSchedule($data){
        $vdate =  mysqli_real_escape_string($this->db->link,$data['viva_date']);
        $regNo =  mysqli_real_escape_string($this->db->link,$data['regId']);
        $time =  mysqli_real_escape_string($this->db->link,$data['time']);
        
        if($vdate==""){
           
            echo"<script>alert('Insert a Date!')</script>";    	
        }
        if($time==""){
           
            echo"<script>alert('Insert a Time!')</script>";    	
        }

        
        
            $query = "update schedule_tab set Viva_date='$vdate', Time='$time' where Reg_no='$regNo'";
                      
            $result = $this->db->update($query);
            if($result){
                $msg = "<span class='alert alert-success msg'>Scheduled Successfully!</span>";
                return $msg;
                echo"<script>alert('updated Successfully!!')</script>";
            }else{
                
                echo"<script>alert(' NOT Scheduled Successfully!!')</script>";
            }
        

    }



   

}

?>
