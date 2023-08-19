<?
class UserModel
{
    public static function insert($user, $pass, $level)
    {
        $db = Db::getInstance();
        return $db->insert("insert into users (username, password,level) values ('$user','$pass','$level') ");
    }
    public static function getFirst($u, $p)
    {
        $db = Db::getInstance();
        $sql = "select * from users where username='$u' and password='$p'";
        $records = $db->first($sql);
        return $records;
    }
}
