<?php
/**
 * 连接数据库
 * @return unknown
 */
function connet() {
    try {        
        $link = new PDO ( 'mysql:host=localhost;dbname=shopimooc', DB_USER, DB_PWD );
        $link->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//         $link->exec ( "set names" . DB_CHARSET );
    } catch ( PDOException $e ) {
        echo '数据库连接失败' . $e->getMessage ();
    }
    return $link;
}

/* 插入数据 */
function insert($table, $array) {
    try {
        $conn = connet ();
        $key = join ( ",", array_keys ( $array ) );
        $vals = "'" . join ( "','", array_values ( $array ) ) . "'";
        $sql = "insert into {$table} ($key) values ({$vals})";
        $result = $conn->exec ( $sql );
        return $conn->lastInsertId ();
    } catch ( PDOException $e ) {
        echo '插入失败' . $e->getMessage ();
    }
}

/* 更新数据 */
function update($table, $array, $where = null) {
    try {
        $conn = connet ();
        foreach ( $array as $key => $val ) {
            if (isset($str) == null) {
                $sep = "";
            } else {
                $sep = ",";
            }
            $str .= $sep.$key."='".$val."'";
        }
        $sql = "update {$table} set {$str}" . ($where == null ? null : " where ". $where);
        $result = $conn->exec ( $sql );
        if ($result) {//通过判断来排除输入相同名操作
            return $result;
        } else {
            return false;
        }
    } catch ( PDOException $e ) {
        echo '更新数据失败' . $e->getMessage ();
    }
}

/* 删除数据 */
function delete($table, $where = null) {
    try {
        $conn = connet ();
        $where = $where == null ? null : " where " . $where;
        $sql = "delete from {$table} {$where}";
        $result = $conn->exec ( $sql );
        return $result;
    } catch ( PDOException $e ) {
        echo '删除数据失败' . $e->getMessage ();
    }
}

/* 得到指定一条记录 */
function fetchOne($sql, $result_type = PDO::FETCH_ASSOC) {
    try {
        $conn=connet();
        $result=$conn->query($sql);
        $row=$result->fetch($result_type);
        return $row;
    } catch ( PDOException $e ) {
        echo '得到指定一条记录失败' . $e->getMessage ();
    }
}

/* 得到所有结果 */
function fetchAll($sql, $result_type = PDO::FETCH_ASSOC) {
    try {
        $conn = connet ();
        $result = $conn->query ( $sql );
        
        while ( @$row = $result->fetch($result_type)) {
            $rows [] = $row;
        }
        return $rows;
    } catch ( PDOException $e ) {
        echo '得到所有结果失败' . $e->getMessage ();
    }
}
/* 得到所有结果条数 */
function getResultNum($sql) {
    try {
        $conn = connet ();
        $result = $conn->query ( $sql );
        $row_count = $result->rowCount ();
        return $row_count;
    } catch ( PDOException $e ) {
        echo '得到所有结果条数失败' . $e->getMessage ();
    }
}

/**
 * 得到上一步插入记录的ID号
 * @return number
 */
function getInsertId(){
    try {
        $conn = connet ();
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        echo '得到上一步插入记录的ID号失败' . $e->getMessage ();
    }

}
?>