<?php
class Model
{
    public static function pagination($options = [
        'query' => '',
        'page' => 0,
        'pageSize' => PAGE_SIZE,
        'orderBy' => '',
        'modelName' => ''
    ])
    {
        ['query' => $query, 'page' => $page, 'pageSize' => $pageSize, 'orderBy' => $orderBy, 'modelName' => $modelName] = $options;
        try {
            $conn = MySQLConnection::getConnect();
            $sqlCount = preg_replace('/(select).+(from)/i', "SELECT COUNT(*) FROM", $query);
            $sqlData = $query;

            if ($page > 0) {
                $skip = ($page - 1) * $pageSize;
                $sqlData = $query . " ORDER BY $orderBy LIMIT $pageSize OFFSET $skip";
            }

            $st = $conn->prepare($sqlData);
            $st->setFetchMode(PDO::FETCH_CLASS, $modelName);
            $st->execute();
            $data = $st->fetchAll();

            $totalRecords = $conn->query($sqlCount)->fetchColumn();
            $total = ceil($totalRecords / $pageSize);

            return [
                'page' => $page,
                'pageSize' => $pageSize,
                'total' => $total,
                'data' => $data
            ];
        } catch (Exception $ex) {
            throw new Exception($ex);
        }
    }

    public static function getNextID($table, $id)
    {
        $sql = "SELECT MAX($id) FROM $table";
        $conn = MySQLConnection::getConnect();
        $maxId = $conn->query($sql)->fetchColumn();
        return $maxId + 1;
    }
}
