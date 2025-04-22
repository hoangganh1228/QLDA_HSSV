<?php
class Database
{
    private $conn;
    function __construct()
    {
        $this->conn = SqlConnection::getConnection();
    }
    public function query($sql)
    {
        //var_dump($this->conn);
        $statement = $this->conn->prepare($sql);
        //echo $sql;
        $statement->execute();
        return $statement;
    }

    public function select($colArr =[], $table, $condition)
    {
        if (empty($colArr)) $colStr='*';

        else
        {
            $colStr = implode(', ', $colArr);
        }
        $sql = "select $colStr from $table $condition";
        // echo $sql . "<br>";
        $ret = $this->query($sql);
        return $ret->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($table, $condition)
    {
        if (!empty($condition))
            $sql = "delete from $table $condition";
        else $sql = "delete from $table";
        $statement = $this->query($sql);
        if ($statement) return true;
        return false;
    }

    public function insert($table, $insertData)
    {
        foreach ($insertData as $key => $value) {
            $insertData[$key] = "'$value'";
        }
        $keys = array_keys($insertData);
        $values = array_values($insertData);
        $cols = implode(",", $keys);
        $values = implode(',', $values);
        //echo $values;
        $sql = "insert into $table ($cols) values ($values)";
        $ret = $this->query($sql);
        return $ret;
    }

    public function update($table, $editData, $condition)
    {
        $editStr = '';
        foreach ($editData as $key => $value) {
            $editStr .= "$key = '$value', ";
        }
        $editStr = rtrim($editStr, ', ');
        $sql = "update $table set $editStr $condition";
        // echo $sql;
        $ret = $this->query($sql);
        return $ret;
    }

    public function isDuplicate($table, $col, $value)
    {
        $value = "'$value'";
        $sql = "SELECT * FROM $table WHERE $col = $value";
        //echo $sql;
        $ret = $this->query($sql);
        return $ret->rowCount() > 0;
    }

    public function lastInsertId() {
        return $this->conn->lastInsertId(); // Giả sử $this->pdo là đối tượng PDO của bạn
    }
}
