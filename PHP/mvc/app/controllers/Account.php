<?php
require_once _DIR_ROOT . '/app/models/User.php';

class Account extends Controller
{
    public function getLogin()
    {
        if (empty($_SESSION['isAuth'])) {
            self::initUserTable();

            $this->showSessionMessage();
            $this->appendJSLink('login.js');
            $this->appendCssLink('login.css');
            $this->setPageTitle('Đăng nhập');
            $this->renderToLayout('login');
            $this->setLayout('general');
        } else {
            self::redirect('/');
        }
    }

    public function postLogin()
    {
        if (empty($_POST)) {
            $this->setSessionMessage('Đăng nhập thất bại', true);
            self::redirect('/dang-nhap');
        }

        ['name' => $name, 'password' => $password] = $_POST;
        $user = UserModel::findUserByName($name);

        if (empty($user)) {
            $this->setSessionMessage('Tài khoản không tồn tại', true);
            self::redirect('/dang-nhap');
        }

        $userPassword = $user->_get('password');
        $isMatch = password_verify($password, $userPassword);
        if (!$isMatch) {
            $this->setSessionMessage('Mật khẩu không chính xác', true);
            self::redirect('/dang-nhap');
        }

        $this->onLoginSuccess($user);
        $this->setSessionMessage('Đăng nhập thành công', false);
        self::redirect('/');
    }

    public function logout()
    {
        unset($_SESSION['isAuth']);
        unset($_SESSION['user']);
        self::redirect('/');
    }

    private static function initUserTable()
    {
        if (empty($_SESSION['isCreateUser'])) {
            UserModel::createTableIfNotExist();
            UserModel::initAdminUser();
            $_SESSION['isCreateUser'] = true;
        }
    }

    private function onLoginSuccess($user)
    {
        $_SESSION['isAuth'] = true;
        $_SESSION['user'] = ['userid' => $user->_get('userid'), 'name' => $user->_get('name')];
    }
}
