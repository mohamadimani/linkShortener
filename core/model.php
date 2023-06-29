<?php
class Model
{
    private static $db;
    private static $host = 'localhost';
    private static $dbname = 'linkshorter';
    private static $username = 'root';
    private static $password = '';


    function __construct()
    {
        $this->_init_db();
    }

    private   function _init_db()
    {
        try {
            self::$db = new PDO("mysql:host=" . static::$host . ";dbname=" . static::$dbname, static::$username, static::$password);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            vd($error->getMessage(), 0, 1);
        }
    }

    public static function DB()
    {
        return self::$db;
    }

    public static function Do_Select($sql = '', $param = [], $fetch = '')
    {
        $stmt = static::DB()->prepare($sql);
        if (!empty($param)) {
            foreach ($param as $key => $value) {
                $stmt->bindvalue($key + 1, $value);
            }
        }
        $stmt->execute();
        if (empty($fetch)) {
            $result = $stmt->fetchAll(2);
        } else {
            $result = $stmt->fetch(2);
        }
        return $result;
    }

    public static function Do_Query($sql = '', $values = [])
    {
        $stmt = self::$db->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function filter($data)
    {
        $data = trim(htmlspecialchars(stripcslashes($data)));
        return $data;
    }
}
