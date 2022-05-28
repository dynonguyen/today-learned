<div class="container py-5">
    <h1 class="main-title">Danh sách câu lạc bộ</h1>

    <table class="table table-striped fs-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Tên ngắn</th>
                <th scope="col">Sân vận động</th>
                <th scope="col">Huấn luyện viên</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($clubs)) {
                echo "<tr><td colspan='7' class='text-center text-danger py-3'>Không tìm thấy dữ liệu</td></tr>";
            } else {
                foreach ($clubs as $club) {
                    $stadiumName = empty($club->SName) ? $club->_get('StadiumID') : $club->SName;
                    $coachName = empty($club->CFullName) ? $club->_get('CoachID') : $club->CFullName;
                    $clubId =  $club->_get('ClubID');

                    echo "<tr>";
                    echo "<td>" . $clubId . "</td>";
                    echo "<td>" . $club->_get('ClubName') . "</td>";
                    echo "<td>" . $club->_get('Shortname') . "</td>";
                    echo "<td>" . $stadiumName . "</td>";
                    echo "<td>" . $coachName . "</td>";
                    echo "<td class='text-center action-item'>
                            <i class='bi bi-pencil me-3 cursor-pointer' title='Chỉnh sửa thông tin'></i>
                            <a href='/danh-sach-cau-thu?clubId=$clubId' title='Danh sách cầu thủ'>
                                <i class='bi bi-card-list'></i>
                            </a>
                        </td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <?php if ($total > 1) { ?>
        <div class="text-center mt-4 fs-3 bg-light py-3 text-primary">
            <span class="cursor-pointer" id="loadMore">
                <?php
                $restPage = $total - $page;
                echo "<span>Xem thêm $restPage trang</span>";
                ?>
                <i class="bi bi-caret-down-fill"></i>
            </span>
        </div>
    <?php } ?>
</div>