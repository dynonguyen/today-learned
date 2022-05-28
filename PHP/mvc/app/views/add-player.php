<div class="container py-5">
    <h1 class="main-title">Thêm cầu thủ</h1>

    <form id="form" action="/thuc-hien-them-cau-thu" method="POST">
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
            <div class="col col-12 col-md-6 col-lg-4 ms-auto text-end">
                <button class="btn btn-primary text-uppercase w-100" type="submit">Thêm cầu thủ</button>
            </div>
        </div>
    </form>
</div>