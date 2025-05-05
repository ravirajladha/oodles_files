<?php
class Homes
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function get_sleep($id) 
    {
        $this->db->query('SELECT * FROM sleep WHERE test_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }

    public function get_chapter_related_to_quiz($class,$category){
        $this->db->query('SELECT * from quizes where class_name=:class AND category=:category AND publish=:publish and chapter IN (SELECT DISTINCT chapter from quizes)');
        $this->db->bind(':class', $class);
        $this->db->bind(':category', $category);
    $this->db->bind(':publish', 1);

        $result = $this->db->resultSet();
        return $result;
    }
    public function get_subject_related_to_quiz($class,$category){
        $this->db->query('SELECT * from quizes where class_name=:class AND category=:category AND publish=:publish and subject_name IN (SELECT DISTINCT subject_name from quizes)');
        $this->db->bind(':class', $class);
        $this->db->bind(':category', $category);
        $this->db->bind(':publish', 1);

        $result = $this->db->resultSet();
        return $result;
    }

    public function get_all_quiz_by_category($category){
        $this->db->query('SELECT * from quizes where category=:category AND subject_name IN (SELECT DISTINCT subject_name from quizes)');
        $this->db->bind(':category', $category);
        $result = $this->db->resultSet();
        return $result;
    }
    
public function get_quiz_by_class_and_subject($class, $subject,$category){
    $this->db->query('SELECT * from quizes where class_name=:class and subject_name=:subject and category=:category and DATE(start_date) >= CURDATE() and publish=:publish');
    $this->db->bind(':class', $class);
    $this->db->bind(':subject', $subject);
    $this->db->bind(':category', $category);
    $this->db->bind(':category', $category);
    $this->db->bind(':publish', 1);
    $result = $this->db->resultSet();
    return $result;
}
public function get_quiz_by_class($class,$category){
    $this->db->query('SELECT * from quizes where class_name=:class  and category=:category and DATE(start_date) >= CURDATE() and publish=:publish');
    $this->db->bind(':class', $class);
    $this->db->bind(':publish', 1);
 
    $this->db->bind(':category', $category);
    $result = $this->db->resultSet();
    return $result;
}
public function get_all_quizes($category){
    $this->db->query('SELECT * from quizes where  category=:category and DATE(start_date) >= CURDATE() and publish=:publish');
    $this->db->bind(':publish', 1);

    $this->db->bind(':category', $category);
    $result = $this->db->resultSet();
    return $result;
}





    public function get_current_student()
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
        $this->db->bind(':id',$_SESSION['rexkod_oodles_student_id']);
        $result = $this->db->single();
        return $result;
    }

    public function add_student($data){
        $this->db->query('INSERT INTO student (student_id,school,school_temp,college,college_temp,course,academic_type) VALUES(:student_id,:school_name,:school_temp,:college,:college_temp,:class_name,:academic_type)');
        $this->db->bind(':student_id', $data['student_id']);
        $this->db->bind(':school_name', $data['school_name']);
        $this->db->bind(':class_name', $data['class_name']);
        $this->db->bind(':academic_type', $data['academic_type']);
        $this->db->bind(':college', Null);
        $this->db->bind(':college_temp', Null);
        $this->db->bind(':school_temp', Null);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_student($data){
        $this->db->query('UPDATE student SET school=:school_name,college=:college,college_temp=:college_temp,school_temp=:school_temp,course=:class_name,academic_type=:academic_type where student_id=:student_id');
        $this->db->bind(':student_id', $data['student_id']);
        $this->db->bind(':school_name', $data['school_name']);
        $this->db->bind(':class_name', $data['class_name']);
        $this->db->bind(':academic_type', $data['academic_type']);
        $this->db->bind(':college', Null);
        $this->db->bind(':college_temp', Null);
        $this->db->bind(':school_temp', Null);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_stress($id) 
    {
        $this->db->query('SELECT * FROM stress WHERE test_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
   public function  get_filter_school_details($state_name,$curriculum,$affiliation_board,$subtype){
    $this->db->query('SELECT * FROM school where state=:state_name AND curriculum=:curriculum AND affiliation_board = :affiliation_board AND subtype=:subtype');
    $this->db->bind(':state_name', $state_name);
    $this->db->bind(':curriculum', $curriculum);
    $this->db->bind(':affiliation_board', $affiliation_board);
    $this->db->bind(':subtype', $subtype);
 
    return $results = $this->db->resultset();
   }
   public function  get_filter_college_details($state_name){
    $this->db->query('SELECT * FROM college where state=:state_name');
    $this->db->bind(':state_name', $state_name);
    
 
    return $results = $this->db->resultset();
   }
   public function  get_filter_scholarship_details($state_name,$type){
    // echo $state_name;
    // echo $type;
    // die();
    $this->db->query('SELECT * FROM scholarship where state=:state_name AND type=:type');
    $this->db->bind(':state_name', $state_name);
    $this->db->bind(':type', $type);
 
    return $results = $this->db->resultset();
   }
   public function  get_filter_quizes_details($school,$class,$subject){
    $this->db->query('SELECT * FROM quizes where school_name=:school_name AND class_name=:class_name AND subject_name=:subject_name');
    $this->db->bind(':school_name', $school);
    $this->db->bind(':class_name', $class);
    $this->db->bind(':subject_name', $subject);
 
    return $results = $this->db->resultset();
   }


   
   public function  get_school_curriculum($curriculum){
    $this->db->query('SELECT * FROM school_type where id=:id');
    $this->db->bind(':id', $curriculum);
    return $results = $this->db->single();
   }
   public function  get_rating_college($college_id){
    $this->db->query('SELECT * FROM college_rating where college_id=:college_id ORDER BY id desc');
    $this->db->bind(':college_id', $college_id);
    return $results = $this->db->resultSet();
   }
   public function  get_rating_school($school_id){
    $this->db->query('SELECT * FROM school_rating where school_id=:school_id ORDER BY id desc');
    $this->db->bind(':school_id', $school_id);
    return $results = $this->db->resultSet();
   }

   public function add_rating_college($academic,$accomodation,$campus,$course,$faculty,$infra,$placement,$social,$review,$user_id,$college_id){
    $this->db->query('INSERT INTO college_rating (college_id,user_id,academic,accomodation,campus,course,faculty,infra,placement,social,review) VALUES (:college_id,:user_id,:academic,:accomodation,:campus,:course,:faculty,:infra,:placement,:social,:review)');
    $this->db->bind(':user_id',$user_id);
    $this->db->bind(':college_id',$college_id);
    $this->db->bind(':academic',$academic);
    $this->db->bind(':accomodation',$accomodation);
    $this->db->bind(':campus',$campus);
    $this->db->bind(':course',$course);
    $this->db->bind(':faculty',$faculty);
    $this->db->bind(':infra',$infra);
    $this->db->bind(':placement',$placement);
    $this->db->bind(':social',$social);
    $this->db->bind(':review',$review);
    
    if($this->db->execute())
    {
        return true;
    }
    else
    {
         return false;
    }
   }
   public function add_rating_school($academic,$faculty,$infra,$nonacademic,$review,$user_id,$college_id){
    $this->db->query('INSERT INTO school_rating (school_id	,user_id,academic,faculty,infra,nonacademic,review) VALUES (:college_id,:user_id,:academic,:faculty,:infra,:nonacademic,:review)');
    $this->db->bind(':user_id',$user_id);
    $this->db->bind(':college_id',$college_id);
    $this->db->bind(':academic',$academic);
    $this->db->bind(':faculty',$faculty);
    $this->db->bind(':infra',$infra);
    $this->db->bind(':nonacademic',$nonacademic);
    $this->db->bind(':review',$review);
    
    if($this->db->execute())
    {
        return true;
    }
    else
    {
         return false;
    }
   }
   public function update_rating_college($college_id,$rating,$count){
    $this->db->query('UPDATE college_rating SET  rating=:rating ,count=:count where college_id=:college_id');
    $this->db->bind(':college_id',$college_id);
    $this->db->bind(':rating',$rating);
    $this->db->bind(':count',$count);
    
    if($this->db->execute())
    {
        return true;
    }
    else
    {
         return false;
    }
   }

  
   public function update_rating_school($school_id,$rating,$count){
    $this->db->query('UPDATE school_rating SET  rating=:rating ,count=:count where school_id=:school_id');
    $this->db->bind(':school_id',$school_id);
    $this->db->bind(':rating',$rating);
    $this->db->bind(':count',$count);
    
    if($this->db->execute())
    {
        return true;
    }
    else
    {
         return false;
    }
   }


public function get_college_course_detail($id){
    $this->db->query("SELECT * FROM college_course where id=:id");
    $this->db->bind(':id', $id);
       return $results = $this->db->single();
}
public function get_all_webinars(){
    $this->db->query("SELECT * FROM webinar ORDER BY id desc");
       return $results = $this->db->resultSet();
}
public function get_single_webinar($id){
    $this->db->query("SELECT * FROM webinar where id=:id");
    $this->db->bind('id', $id);
       return $results = $this->db->single();
}
public function register_for_webinar($user_id,$webinar_id){
    $this->db->query('INSERT INTO webinar_register (user_id,webinar_id) VALUES (:user_id,:webinar_id)');
    $this->db->bind(':user_id',$user_id);
    $this->db->bind(':webinar_id',$webinar_id);
    
    if($this->db->execute())
    {
        return true;
    }
    else
    {
         return false;
    }
   }
   public function check_webinar_registration($webinar_id,$user_id){
    $this->db->query('SELECT * from webinar_register where user_id=:user_id AND webinar_id = :webinar_id');
    $this->db->bind(':user_id',$user_id);
    $this->db->bind(':webinar_id',$webinar_id);
    return $results = $this->db->single();
   }
   public function add_comment_home($data){
    $this->db->query('INSERT into comment_home (name,phone,email,subject,message) VALUES (:name,:phone,:email,:subject,:message)');
    $this->db->bind(':name',$data['name']);
    $this->db->bind(':phone',$data['phone']);
    $this->db->bind(':email',$data['email']);
    $this->db->bind(':subject',$data['subject']);
    $this->db->bind(':message',$data['message']);
    if($this->db->execute())
    {
        return true;
    }
    else
    {
         return false;
    }
   }

   public function resultset($table, $params) {
    $query = "SELECT * FROM $table WHERE ";
    foreach ($params as $key => $value) {
        $query .= $key . ' = :' . $key . ' AND ';
    }
    $query = rtrim($query, ' AND '); // remove last 'AND' from query
    $this->db->query($query);
    foreach ($params as $key => $value) {
        $this->db->bind(':' . $key, $value);
    }
    $result = $this->db->resultSet();
    return $result;
}


public function single($table, $column, $value) {
    // echo $table;
    // die();
    $this->db->query("SELECT * FROM $table WHERE $column = :value");
    $this->db->bind(':value', $value);
    return $this->db->single();
}

public function get_scholarship_doc($id){
    $this->db->query("SELECT * FROM scholarship_doc WHERE id = :id");
    $this->db->bind(':id', $id);
    return $this->db->single();
}

public function get_all_counsellor_courses(){
    $this->db->query("SELECT * FROM courses WHERE type = :type");
    $this->db->bind(':type', 'counsellor');
    $result = $this->db->resultSet();
    return $result;
}


}
