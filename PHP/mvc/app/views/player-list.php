<?php
function renderOption($label, $value, $selected)
{
    if ($value == $selected) {
        echo "<option value='$value' selected>$label</option>";
    } else {
        echo "<option value='$value'>$label</option>";
    }
}
?>

<div class="container py-5">
    <h1 class="main-title">Danh sách cầu thủ</h1>

    <div class="d-flex mb-5">
        <select id="clubSelect" class="form-select w-auto form-select-lg py-2 px-3 fs-3 ms-auto">
            <option value="" disabled>Xem theo câu lạc bộ</option>
            <?php
            renderOption('Tất cả CLB', 0, $clubId);
            if (!empty($clubs)) {
                foreach ($clubs as $club) {
                    renderOption($club->_get('ClubName'), $club->_get('ClubID'), $clubId);
                }
            }
            ?>
        </select>

        <button class="btn btn-danger ms-4 fs-4 d-none" id="deletePlayerBtn">
            <i class="bi bi-trash-fill"></i>
            <span>Xoá cầu thủ</span>
        </button>
    </div>

    <table class="table table-striped fs-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">CLB</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Vị trí</th>
                <th scope="col">Quốc tịch</th>
                <th scope="col">Số áo</th>
                <th scope="col">
                    <div class="text-end"><input class="form-check-input" type="checkbox" id="selectAll"></div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($players)) {
                echo "<tr><td colspan='8' class='text-center text-danger py-3'>Không tìm thấy dữ liệu</td></tr>";
            } else {
                foreach ($players as $player) {
                    $dbo = $player->_get('DOB') ? date_format(date_create($player->_get('DOB')), 'd-m-Y') : '_';
                    $club = !empty($player->ClubName) ? $player->ClubName : $player->_get('ClubID');
                    $playerId =  $player->_get('PlayerID');

                    echo "<tr data-id='$playerId'>";
                    echo "<td>" . $playerId . "</td>";
                    echo "<td>" . $player->_get('FullName') . "</td>";
                    echo "<td>" . $club . "</td>";
                    echo "<td>" . $dbo . "</td>";
                    echo "<td>" . $player->_get('Position') . "</td>";
                    echo "<td>" . $player->_get('Nationality') . "</td>";
                    echo "<td>" . $player->_get('Number') . "</td>";
                    echo "<td class='text-end'>" .
                        "<i class='bi bi-pencil me-md-3 cursor-pointer update-player' data-bs-toggle='modal' data-bs-target='#updateModal' data-id='$playerId'></i>" .
                        "<input class='form-check-input' type='checkbox' value='$playerId'>" .
                        "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <!-- Render pagination -->
    <?php
    if (!empty($players)) {
        require_once _DIR_ROOT . '/app/views/mixins/pagination.php';
        echo "<div class='mt-5'>";
        renderPagination($total, $page);
        echo "</div>";
    }
    ?>
</div>

<!-- Editing modal -->
<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Cập nhật cầu thủ</h5>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gx-4 gy-5">
                    <div class="col col-12 col-md-6 col-lg-4">
                        <label for="FullName" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" name="FullName" id="FullName" placeholder="Nhập họ tên cầu thủ" autofocus required>
                    </div>
                    <div class="col col-12 col-md-6 col-lg-4">
                        <label for="DOB" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control" name="DOB" id="DOB" required>
                    </div>
                    <div class="col col-12 col-md-6 col-lg-4">
                        <label for="ClubID" class="form-label">Câu lạc bộ</label>
                        <select id="ClubID" class="form-select" name="ClubID" required>
                            <option value="" disabled selected>Chọn câu lạc bộ</option>
                            <?php
                            if (!empty($clubs)) {
                                foreach ($clubs as $club) {
                                    echo "<option value='" . $club->_get('ClubID') . "'>" . $club->_get('ClubName') . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col col-12 col-md-6 col-lg-4">
                        <label for="Position" class="form-label">Vị trí</label>
                        <input type="text" class="form-control" name="Position" id="Position" placeholder="Vị trí đá của cầu thủ" required>
                    </div>
                    <div class="col col-12 col-md-6 col-lg-4">
                        <label for="Nationality" class="form-label">Quốc tịch</label>
                        <input type="text" class="form-control" name="Nationality" id="Nationality" placeholder="Quốc tịch" required>
                    </div>
                    <div class="col col-12 col-md-6 col-lg-4">
                        <label for="Number" class="form-label">Số áo</label>
                        <input type="number" class="form-control" name="Number" id="Number" placeholder="Số áo" required>
                    </div>
                    <div class="col col-12 col-md-6 col-lg-8 d-none" id="errorWrap">
                        <div class="alert alert-danger" id="errorMsg"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Huỷ bỏ</button>
                <button type="button" class="btn btn-primary" id="updateBtn">Lưu lại</button>
            </div>
        </div>
    </div>
</div>