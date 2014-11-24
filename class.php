<?php
session_start();
class Db{
    protected static $_instance = null;
    protected $_db;
    public $rating;
    public $mass;
    private function __construct() {
        $this->_db=new PDO('mysql:host=localhost;dbname=knitu','root','');
    }
    private function __clone() {}
    static function getInstance(){
        if(Db::$_instance==null){
            Db::$_instance=new Db();
        }
        return self::$_instance;
    }
    static function rightAutorize(){
        if (isset($_SESSION['aut'])&&$_SESSION['aut']="yes"){
            
        }else {
            $_SESSION=array();
            session_destroy();
            header('Location: index.php');
        }
    }
    function ratingDiag(){
        $this->_db->exec('SET NAMES utf8');
        $sql="SELECT rating,count(rating) as count FROM Users GROUP BY rating";
        $sth=$this->_db->query($sql);
        $result = $sth->fetchall();
        return $result;
        
    }
    function saveRating($login,$rating){
        if ($rating<2) $rating=2;
        $sql="UPDATE Users SET rating=$rating WHERE login='$login'";
        $this->_db->exec($sql);
    }
    function showList(){
        $this->_db->exec('SET NAMES utf8');
        $sql="SELECT * FROM Users";
        $sth=$this->_db->query($sql);
        $result = $sth->fetchall();
        return $result;
    }
    function autorize($login,$pass){
        $sql="select count(*) from Users where login='$login' and password='$pass'";
        $aut=$this->_db->query($sql)->fetch(PDO::FETCH_NUM);
        if ((int)$aut[0]==1) {
            $_SESSION['aut']="yes";
            $_SESSION['rating']=0;
            $_SESSION['count']=0;
            $_SESSION['user']=$login;
            $_SESSION['quest']=array();
            header('Location: test.php');
        }else{
            $_SESSION=array();
            session_destroy();
            header('Location: index.php');
        }
    }
    function randQuestions(){
        $this->_db->exec('SET NAMES utf8');
        /*$sql="SELECT * FROM Questions ORDER BY RAND() LIMIT 1";
        $sth=$this->_db->query($sql);
        $result = $sth->fetch();
        if (count($_SESSION['quest'])==0){
                array_push($_SESSION['quest'], $result[0]);
                return $result;
        }else{
                if (!(array_search($result[0], $_SESSION['quest']))) {
                    array_push($_SESSION['quest'], $result[0]); 
                    return $result;
                }else $this->randQuestions ();
        }*/
        $wh="id_question!=0";
        if (count($_SESSION['quest'])==0){
                $sql="SELECT * FROM Questions ORDER BY RAND() LIMIT 1";
                $sth=$this->_db->query($sql);
                $result = $sth->fetch();
                array_push($_SESSION['quest'], $result[0]);
                return $result;
        }else{
            
            for($i=0;$i<=count($_SESSION['quest'])-1;$i++){
                $wh=$wh." and id_question!=".$_SESSION['quest'][$i];
                $sql="SELECT * FROM Questions WHERE ".$wh." ORDER BY RAND() LIMIT 1";
            }
            $sth=$this->_db->query($sql);
            $result = $sth->fetch();
            array_push($_SESSION['quest'], $result[0]);
            return $result;
        }
        
    }
    function getVariant($id){
        $this->_db->exec('SET NAMES utf8');
        $sql="SELECT * FROM variant WHERE id_question=$id";
        $sth=$this->_db->query($sql);
        $result = $sth->fetchall();
        return $result;
    }
    function rating($id_quest,$type,$answer){
       if($type==0){
           $sql="SELECT * FROM Questions WHERE id_question=$id_quest";
           $sth=$this->_db->query($sql);
           $result = $sth->fetch();
           if($result[2]==$answer){
                $_SESSION['rating']++;
           } 
       }elseif($type==1){
           $sql="SELECT Questions.*, variant.* FROM Questions JOIN variant ON Questions.rigth = variant.id_variant where Questions.id_question=$id_quest and variant.variant='$answer'";
           $sth=$this->_db->query($sql);
           $result = $sth->fetch();
           if($result[5]==$answer){
                $_SESSION['rating']++;
           } 
       }
       $_SESSION['count']++;
    }
}
