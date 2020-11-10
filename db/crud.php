<?php 
class crud{

//private database object    
private $db;

//constructor to initialize private variable to the database connection
    function  __construct($conn){
        $this->db=$conn;

        
    }

    //function to insert a new record into the attendee database
    public function insertAttendees($fname,$lname,$dob,$email,$contact,$speciality,$avatar_path){
        try {
            //define sql statement to be executed
            $sql="INSERT INTO antendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,speciality_id,$avatar_path) VALUES(:fname,:lname,:dob,:email,:contact,:speciality, :avatar_path)";
            //prepare the sql statement for execution
            $stmt=$this->db->prepare($sql);
            //bind all placeholders to the actual values to prevent sql injection
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':speciality',$speciality);
            $stmt->bindparam(':avatar_path',$avatar_path);

            $stmt->execute();
            return true;


        } 
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }


    public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$speciality){
        try{
            $sql="UPDATE `antendee` SET `firstname`=:fname,`lastname`=:lname,
            `dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`speciality_id`=:speciality
             WHERE antendee_id :id";
             $stmt=$this->db->prepare($sql);
             //bind all placeholders to the actual values to prevent sql injection
             $stmt->bindparam(':id',$id);
             $stmt->bindparam(':fname',$fname);
             $stmt->bindparam(':lname',$lname);
             $stmt->bindparam(':dob',$dob);
             $stmt->bindparam(':email',$email);
             $stmt->bindparam(':contact',$contact);
             $stmt->bindparam(':speciality',$speciality);
    
             $stmt->execute();
             return true;
    
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function getAttendees(){
        try{
            $sql = "SELECT * FROM `antendee` a inner join specialities s on a.speciality_id = s.speciality_id";

            $result = $this->db->query($sql);
            return $result;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        
    }

    /*
    public function getAttendeeDetails($id){
        $sql="SELECT*FROM 'antendee' a inner join specialities s on a.speciality_id=s.speciality_id WHERE antendee_id=:id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result;

    }
    */

    public function getAttendeeDetails($id){
        try{
            $sql="select*from antendee where antendee_id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $result=$stmt->execute();
            return $result;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        
    }
    
    public function deleteAttendee($id){
       try{
        $sql="delete from antendee where antendee_id=:id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        return true;
       }
       catch(PDOException $e) {
        echo $e->getMessage();
        return false;
        }
        }


    

    
    public function getSpecialities(){
        try{
            $sql = "SELECT * FROM `specialities`";
            $result = $this->db->query($sql);
            return $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
                return false;
                }
    }
    

    public function getSpecialityById($id){
        try{
        $sql="SELECT*FROM specialities where speciality_id= :id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':id','$id');
        $stmt->execute();
        $result=$stmt->fetch();
        $result;
        
        }
        catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
        
        }
        

}
?>