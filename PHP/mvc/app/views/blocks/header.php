<header>
    <nav class="container-fluid">
        <div class="container nav-wrapper">
            <a href="/" class="vertical-center logo-group">
                <img src="/public/assets/images/logo.png" alt="MM Logo" class="logo">
                <strong class="logo-name desk">Football</strong>
            </a>

            <div class="d-flex right-side">
                <?php
                $link = empty($_SESSION['isAuth']) ? '/dang-nhap' : '#';
                echo "<a href='/dang-nhap' class='vertical-center account-group'>"
                ?>
                <i class="bi bi-person-circle me-3"></i>
                <?php
                if (!empty($_SESSION['isAuth'])) {
                    $user = $_SESSION['user'];
                    $name = $user['name'];
                    echo "<span class='fs-4'>$name</span>";
                    echo "<button class='btn ms-3 fs-4'><a href='/dang-xuat'>Đăng xuất</a></button>";
                } else {
                    echo "<span>Đăng nhập</span>";
                }
                ?>
                </a>
            </div>
        </div>
    </nav>
</header>