<?php
class PlayerModel extends Model
{
    use GetterSetter;

    public static $tableName = 'player';
    private $PlayerID;
    private $FullName;
    private $ClubID;
    private $DOB;
    private $Position;
    private $Nationality;
    private $Number;

    public static function findAllPlayersByClub($clubId = 0, $page = 0, $pageSize = PAGE_SIZE, $orderBy = 'PlayerID')
    {
        try {
            $sql = 'SELECT * FROM player AS p, club AS c WHERE p.ClubID = c.ClubID';
            if ($clubId > 0) {
                $sql = $sql . " AND c.ClubID = $clubId";
            }
            $docs = self::pagination([
                'query' => $sql,
                'page' => $page, 'pageSize' => $pageSize,
                'orderBy' => $orderBy, 'modelName' => static::class
            ]);
            return $docs;
        } catch (Exception $ex) {
            error_log($ex);
            return [];
        }
    }

    public static function deletePlayers($playerIds = [])
    {
        try {
            if (!empty($playerIds)) {
                $where = '';
                foreach ($playerIds as $index => $playerId) {
                    $where = $index == 0 ? $where . "PlayerID = $playerId" : $where . " OR PlayerID = $playerId";
                }
                $conn = MySQLConnection::getConnect();
                // Delete in match_goals
                $sql = "DELETE FROM match_goals WHERE $where";
                $st = $conn->prepare($sql);
                $st->execute();

                // Delete in match_players
                $sql = "DELETE FROM match_players WHERE $where";
                $st = $conn->prepare($sql);
                $st->execute();

                // Delete in player
                $sql = "DELETE FROM player WHERE $where";
                $st = $conn->prepare($sql);
                $st->execute();

                return true;
            }

            return false;
        } catch (Exception $ex) {
            error_log($ex);
            return false;
        }
    }

    public static function searchPlayers($name = '', $number = '', $nationality = '')
    {
        try {
            $sql = 'SELECT * FROM player AS p, club AS c WHERE p.ClubID = c.ClubID';
            if (!empty($name)) {
                $lowerName = strtolower($name);
                $sql .= " AND LOWER(p.FullName) LIKE '%$lowerName%'";
            }
            if (!empty($nationality)) {
                $lowerNationality = strtolower($nationality);
                $sql .= " AND LOWER(p.Nationality) LIKE '%$lowerNationality%'";
            }
            if (!empty($number)) {
                $sql .= " AND p.Number = $number";
            }

            $conn = MySQLConnection::getConnect();
            $st = $conn->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (Exception $ex) {
            error_log($ex);
            return [];
        }
    }

    public static function addPlayer($player)
    {
        try {
            [
                'FullName' => $FullName, 'DOB' => $DOB, 'ClubID' => $ClubID,
                'Position' => $Position, 'Nationality' => $Nationality, 'Number' => $Number
            ] = $player;

            $PlayerID = self::getNextID(self::$tableName, 'PlayerID');
            $sql = "INSERT INTO player (PlayerID, FullName, ClubID, DOB, Position, Nationality, Number) VALUES "
                . "($PlayerID, '$FullName', $ClubID, '$DOB', '$Position', '$Nationality', $Number)";

            $conn = MySQLConnection::getConnect();
            $st = $conn->prepare($sql);
            $isSuccess = $st->execute();
            return $isSuccess;
        } catch (Exception $ex) {
            throw new Exception($ex);
        }
    }

    public static function findPlayerById($playerId)
    {
        $sql = "SELECT * FROM player WHERE PlayerID = $playerId";
        $conn = MySQLConnection::getConnect();
        $st = $conn->prepare($sql);
        $st->execute();
        $player = $st->fetch(PDO::FETCH_ASSOC);
        return $player;
    }

    public static function updatePlayer($player)
    {
        [
            'PlayerID' => $PlayerID, 'FullName' => $FullName, 'DOB' => $DOB, 'ClubID' => $ClubID,
            'Position' => $Position, 'Nationality' => $Nationality, 'Number' => $Number
        ] = $player;
        $DOBSQL = empty($DOB) ? "" : ", DOB = '$DOB',";

        $sql = "UPDATE player 
                SET FullName = '$FullName',$DOBSQL ClubID = $ClubID, Position = '$Position', Nationality = '$Nationality', Number = '$Number'
                WHERE PlayerID = $PlayerID";
        $conn = MySQLConnection::getConnect();
        $st = $conn->prepare($sql);
        return $st->execute();
    }
}
