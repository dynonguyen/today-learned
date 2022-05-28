<?php
class Home extends Controller
{
    public function index()
    {
        $this->showSessionMessage();
        $this->setPageTitle('Trang chủ');
        $this->appendCssLink('home.css');
        $this->renderToLayout('home');
        $this->setLayout('general');
    }

    public function introPage()
    {
        $rootDir = _DIR_ROOT;
        $introPageDir = str_replace('18120634_Football', '18120634_CV', $rootDir);

        $htmlContent = file_get_contents($introPageDir . "/18120634.html");
        $cssContent = file_get_contents($introPageDir . "/css/style.css");
        $avtSrc = 'data:image/png' . ';base64,' . base64_encode(file_get_contents($introPageDir . "/images/avatar.png"));

        $htmlContent .= "<style>$cssContent</style>";
        $htmlContent = str_replace('"./images/avatar.png"', $avtSrc, $htmlContent);
        $htmlContent = str_replace('<link rel="stylesheet" href="./css/style.css">', '', $htmlContent);
        echo $htmlContent;
    }
}
