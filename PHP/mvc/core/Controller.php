<?php
class Controller
{
    protected $data = [];

    function __construct()
    {
        $this->data['cssLinks'] = [];
        $this->data['jsLinks'] = [];
        $this->data['pageTitle'] = '18120634 Football';
        $this->data['passedVariables'] = [];
        $this->data['viewPath'] = '';
        $this->data['viewContent'] = [];
    }

    protected function setLayout($layoutName = 'general')
    {
        // Transform array keys to variables
        extract($this->data);

        $viewFilePath = _DIR_ROOT . '/app/views/layouts/' . $layoutName . '.php';
        if (file_exists($viewFilePath)) {
            require_once $viewFilePath;
        }
    }

    protected function render(string $view = '', array $data = [])
    {
        // Transform array keys to variables
        if (empty($data) || sizeof($data) === 0) {
            $data = $this->data;
        }
        extract($data);

        $viewFilePath = _DIR_ROOT . '/app/views/' . $view . '.php';
        if (file_exists($viewFilePath)) {
            require_once $viewFilePath;
        }
    }

    protected function renderToLayout(string $viewPath)
    {
        $this->data['viewPath'] = $viewPath;
    }

    protected function appendCssLink(string | array $cssFileName)
    {
        if (is_array($cssFileName)) {
            $this->data['cssLinks'] = array_merge($this->data['cssLinks'], $cssFileName);
        } else {
            array_push($this->data['cssLinks'], $cssFileName);
        }
    }

    protected function appendJSLink(string | array $jsFileName)
    {
        if (is_array($jsFileName)) {
            $this->data['jsLinks'] = array_merge($this->data['jsLinks'], $jsFileName);
        } else {
            array_push($this->data['jsLinks'], $jsFileName);
        }
    }

    protected function setPassedVariables(array $variables)
    {
        $this->data['passedVariables'] = array_merge($this->data['passedVariables'], $variables);
    }

    protected function setPageTitle(string $pageTitle = '')
    {
        if (!empty($pageTitle)) {
            $this->data['pageTitle'] = $pageTitle . ' | 18120634 Football';
        }
    }

    protected function setViewContent(string $key, $value)
    {
        $this->data['viewContent'][$key] = $value;
    }

    protected static function redirect(string $url = '', int $statusCode = 301)
    {
        header('Location:' . $url, true, $statusCode);
        exit(0);
    }

    protected static function renderErrorPage(string $errorCode = '404')
    {
        require_once _DIR_ROOT . '/app/errors/' . $errorCode . '.php';
        exit(0);
    }

    protected static function setSessionMessage($message = '', $isError = false)
    {
        $_SESSION['message'] = $message;
        $_SESSION['isError'] = $isError;
    }

    protected function showSessionMessage($autoDestroySession = true)
    {
        if (!empty($_SESSION['message'])) {
            require_once _DIR_ROOT . '/app/views/mixins/toast.php';
            $this->appendJSLink('utils/toast.js');
            renderToast($_SESSION['message'], true, true, isset($_SESSION['isError']) ? $_SESSION['isError'] : false);

            // Destroy it to prevent it from showing up again
            if ($autoDestroySession) {
                $_SESSION['message'] = null;
                $_SESSION['isError'] = null;
            }
        }
    }

    protected function sendResponseApi($statusCode = 200, $data = null)
    {
        header('HTTP/1.1 ' . $statusCode);
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
        exit();
    }
}
