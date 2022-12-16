<?php
 
class DbOperation
{
    //Database connection link
    private $con;
 
    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';
 
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
 
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }
 
    /*
    * The create operation
    * When this method is called a new record is created in the database
    */
    function createAttendance($audienceid,$checkedby)
    {
        $stmt = $this->con->prepare("INSERT INTO mmuscanned (IDAUDIENCE,CHECKEDBY) VALUES (?,?)");
        $stmt->bind_param("ss",$audienceid,$checkedby);
        if($stmt->execute())
        return true; 
        return false; 
        
    }


  /*
    * The create operation
    * When this method is called a new record of new Attended created in the database
    */
    function newAttendee($name,$email)
    {
        $stmt = $this->con->prepare("INSERT INTO audiences (Name,Email,College) VALUES (?,?,?)");
        $stmt->bind_param("sss",$name,$email,"VIP");
        if($stmt->execute())
        return true; 
        return false; 
    }

    
    /*
    * The read operation
    * When this method is called it is returning all the existing record of the database
    */
    function getAudience()
    {
        $stmt = $this->con->prepare("SELECT id, Name, StudentID, Email, College, qrcode FROM audiences");
        $stmt->execute();
        $stmt->bind_result($id, $name, $studentId, $email, $college, $qrcode);
        
        $audiences = array(); 
        
        while($stmt->fetch())
        {
            $audience  = array();
            $audience['id'] = $id; 
            $audience['Name'] = $name; 
            $audience['StudentID'] = $studentId; 
            $audience['Email'] = $email; 
            $audience['College'] = $college; 
            $audience['qrcode'] = $qrcode; 
            
            array_push($audiences, $audience); 
        }
        
        return $audiences; 
    }
    

      /*
    * The read operation
    * get the attendance of audience
    */
                        
    function getAttendance()
    {
        $stmt = $this->con->prepare("SELECT id, IDAUDIENCE, CHECKEDBY, TIMESTAMP FROM mmuscanned");
        $stmt->execute();
        $stmt->bind_result($id, $audienceId, $checkedby, $timestamp);
        
        $attendances = array(); 
        
        while($stmt->fetch())
        {
            $attendance  = array();
            $attendance['id'] = $id; 
            $attendance['IDAUDIENCE'] = $audienceId; 
            $attendance['CHECKEDBY'] = $checkedby; 
            $attendance['TIMESTAMP'] = $timestamp; 
          
            
            array_push($attendances, $attendance); 
        }
        
        return $attendances; 
    }
 
}