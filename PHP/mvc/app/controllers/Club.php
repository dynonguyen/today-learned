<?php
require_once _DIR_ROOT . '/app/models/Player.php';
require_once _DIR_ROOT . '/app/models/Club.php';
require_once _DIR_ROOT . '/app/models/Coach.php';
require_once _DIR_ROOT . '/app/models/Stadium.php';

class Club extends Controller
{
    public function showList()
    {
        $page = 1;
        $pageSize = PAGE_SIZE;

        $clubDocs = ClubModel::findAllClubs($page, $pageSize);

        $clubs = $clubDocs['data'] ?? [];
        $total = $clubDocs['total'] ?? 0;

        $this->setViewContent('page', $page);
        $this->setViewContent('pageSize', $pageSize);
        $this->setViewContent('total', $total);
        $this->setViewContent('clubs', $clubs);

        $this->setPassedVariables(['PAGE_SIZE' => PAGE_SIZE]);
        $this->setPassedVariables(['TOTAL_PAGE' => $total]);
        $this->appendJSLink('club-list.js');
        $this->setPageTitle('Danh sách câu lạc bộ');
        $this->renderToLayout('club-list');
        $this->setLayout('general');
    }

    public function addClub()
    {
        if (!empty($_SESSION['message'])) {
            $this->showSessionMessage();
        }

        $coachList = CoachModel::findAllCoachOptions();
        $stadiums = StadiumModel::findAllStadiumOptions();

        $this->setViewContent('coachList', $coachList);
        $this->setViewContent('stadiums', $stadiums);

        $this->setPageTitle('Thêm câu lạc bộ');
        $this->appendCssLink('add-player.css');
        $this->appendJSLink('add-club.js');
        $this->renderToLayout('add-club');
        $this->setLayout('general');
    }

    public function postAddClub()
    {
        if (empty($_POST)) {
            $this->setSessionMessage('Thêm câu lạc bộ thất bại', true);
            self::redirect('/them-clb');
        }

        try {
            $isSuccess = ClubModel::addClub($_POST);
            if ($isSuccess) {
                $this->setSessionMessage('Thêm câu lạc bộ thành công');
                self::redirect('/them-clb');
            }
        } catch (Exception $ex) {
            error_log($ex);
            $this->setSessionMessage('Thêm câu lạc bộ thất bại', true);
            self::redirect('/them-clb');
        }
    }

    // API
    public function getClubsApi()
    {
        $page = !empty($_GET['page']) && (int)$_GET['page'] ? (int)$_GET['page'] : 1;
        $pageSize = !empty($_GET['pageSize']) && (int)$_GET['pageSize'] ? (int)$_GET['pageSize'] : PAGE_SIZE;
        $clubDocs = ClubModel::findAllClubs($page, $pageSize);

        if (!empty($clubDocs)) {
            $clubs = $clubDocs['data'];
            $resultData = [];

            foreach ($clubs as $club) {
                array_push($resultData, [
                    'ClubID' => $club->_get('ClubID'),
                    'ClubName' => $club->_get('ClubName'),
                    'Shortname' => $club->_get('Shortname'),
                    'StadiumName' => $club->SName,
                    'CoachName' => $club->CFullName
                ]);
            }

            $this->sendResponseApi(200, [
                'data' => $resultData,
                'total' => $clubDocs['total'], 'page' => $page, 'pageSize' => $pageSize
            ]);
        }
        $this->sendResponseApi(500);
    }
}
