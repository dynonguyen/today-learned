<div class="container py-5">
    <h1 class="main-title">Thêm câu lạc bộ</h1>

    <form id="form" action="/thuc-hien-them-clb" method="POST">
        <div class="row gx-4 gy-5">
            <div class="col col-12 col-md-6 col-lg-4">
                <label for="ClubName" class="form-label">Tên CLB</label>
                <input type="text" class="form-control" name="ClubName" id="ClubName" placeholder="Nhập tên CLB" autofocus required>
            </div>
            <div class="col col-12 col-md-6 col-lg-4">
                <label for="Shortname" class="form-label">Tên viết tắt</label>
                <input type="text" class="form-control" name="Shortname" id="Shortname" placeholder="Nhập tên viết tắt của CLB" required>
            </div>
            <div class="col col-12 col-md-6 col-lg-4">
                <label for="CoachID" class="form-label">Huấn luyện viên</label>
                <select id="CoachID" class="form-select" name="CoachID" required>
                    <option value="" disabled selected>Chọn huấn luyện viên trưởng</option>
                    <?php
                    if (!empty($coachList)) {
                        foreach ($coachList as $coach) {
                            echo "<option value='" . $coach->_get('CoachID') . "'>" . $coach->_get('CFullName') . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col col-12 col-md-6 col-lg-4">
                <label for="StadiumID" class="form-label">Sân vận động</label>
                <select id="StadiumID" class="form-select" name="StadiumID" required>
                    <option value="" disabled selected>Chọn sân vận động</option>
                    <?php
                    if (!empty($stadiums)) {
                        foreach ($stadiums as $stadium) {
                            echo "<option value='" . $stadium->_get('StadiumID') . "'>" . $stadium->_get('SName') . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col col-12 col-md-6 col-lg-4 d-flex">
                <button class="btn btn-primary text-uppercase w-100 mt-auto" type="submit">Thêm CLB</button>
            </div>
            <div class="col col-12 col-md-6 col-lg-4 d-none" id="errorWrap">
                <div class="alert alert-danger mt-auto mb-0" id="errorMsg"></div>
            </div>
        </div>
    </form>
</div>