<?php
require_once _DIR_ROOT . '/app/models/Player.php';
require_once _DIR_ROOT . '/app/models/Club.php';

class Player extends Controller
{
    public function showList()
    {
        $page = !empty($_GET['page']) && (int)$_GET['page'] ? (int)$_GET['page'] : 1;
        $pageSize = !empty($_GET['pageSize']) && (int)$_GET['pageSize'] ? (int)$_GET['pageSize'] : PAGE_SIZE;
        $clubId = !empty($_GET['clubId']) && (int)$_GET['clubId'] ? (int)$_GET['clubId'] : 0;

        $clubs = ClubModel::findAllClubOptions();
        $playerDocs = PlayerModel::findAllPlayersByClub($clubId, $page, $pageSize);

        $players = $playerDocs['data'] ?? [];
        $total = $playerDocs['total'] ?? 0;

        $this->setViewContent('page', $page);
        $this->setViewContent('pageSize', $pageSize);
        $this->setViewContent('clubId', $clubId);
        $this->setViewContent('total', $total);
        $this->setViewContent('clubs', $clubs);
        $this->setViewContent('players', $players);

        $this->appendCssLink(['pagination.css', 'player-list.css']);
        $this->appendJSLink(['pagination.js', 'player-list.js']);
        $this->setPageTitle('Danh sách cầu thủ');
        $this->renderToLayout('player-list');
        $this->setLayout('general');
    }

    public function searchPlayerPage()
    {
        $this->appendJSLink(['player-list.js', 'search-player.js']);
        $this->setPageTitle('Tìm kiếm cầu thủ');
        $this->renderToLayout('search-player');
        $this->setLayout('general');
    }

    public function addPlayer()
    {
        if (!empty($_SESSION['message'])) {
            $this->showSessionMessage();
        }
        $clubs = ClubModel::findAllClubOptions();
        $this->setViewContent('clubs', $clubs);

        $this->setPageTitle('Thêm cầu thủ');
        $this->appendCssLink('add-player.css');
        $this->appendJSLink('add-player.js');
        $this->renderToLayout('add-player');
        $this->setLayout('general');
    }

    public function postAddPlayer()
    {
        if (empty($_POST)) {
            $this->setSessionMessage('Thêm cầu thủ thất bại', true);
            self::redirect('/them-cau-thu');
        }

        try {
            $isSuccess = PlayerModel::addPlayer($_POST);
            if ($isSuccess) {
                $this->setSessionMessage('Thêm cầu thủ thành công');
                self::redirect('/them-cau-thu');
            }
        } catch (Exception $ex) {
            error_log($ex);
            $this->setSessionMessage('Thêm cầu thủ thất bại', true);
            self::redirect('/them-cau-thu');
        }
    }

    // APIs
    public function deletePlayerApi()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'DELETE' || empty($_GET['playerIds'])) {
            $this->sendResponseApi(404);
        }

        $playerIds = explode(',', $_GET['playerIds']);
        $isSuccess = PlayerModel::deletePlayers($playerIds);

        if ($isSuccess) $this->sendResponseApi(200);
        $this->sendResponseApi(500);
    }

    public function searchPlayerApi()
    {
        if (empty($_GET)) {
            $this->sendResponseApi(400);
        }

        $name = !empty($_GET['name']) ? $_GET['name'] : '';
        $number = !empty($_GET['number']) ? $_GET['number'] : '';
        $nationality = !empty($_GET['nationality']) ? $_GET['nationality'] : '';

        if (empty($name) && empty($number) && empty($nationality)) {
            $this->sendResponseApi(400);
        }

        $players =  PlayerModel::searchPlayers($name, $number, $nationality);
        $this->sendResponseApi(200, $players);
    }

    public function getPlayerById($playerId)
    {
        $player = PlayerModel::findPlayerById($playerId);
        $this->sendResponseApi(200, $player);
    }

    public function updatePlayer()
    {
        if (!empty($_POST)) {
            $isSuccess = PlayerModel::updatePlayer($_POST);
            if ($isSuccess) $this->sendResponseApi(200);
        }
        $this->sendResponseApi(500);
    }
}
