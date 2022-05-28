<div class="container py-5">
    <h1 class="main-title">Tìm kiếm cầu thủ</h1>

    <div class="input-group mb-3">
        <input type="text" class="form-control py-2 fs-3" id="name" placeholder="Nhập tên cầu thủ cần tìm">
        <button class="btn btn-primary fs-4" type="button" id="searchBtn">Tìm kiếm</button>
    </div>

    <div class="d-flex mt-4">
        <input type="number" id="number" class="form-control py-2 fs-3" placeholder="Nhập số áo">
        <input type="text" id="nationality" class="form-control py-2 fs-3 ms-3" placeholder="Nhập quốc tịch">
    </div>

    <h2 class="fs-1 my-5">Kết quả tìm kiếm <span class="fs-3 text-gray" id="searchResultText"></span></h2>

    <div class="text-end">
        <button class="btn btn-danger ms-4 fs-4 d-none mb-4" id="deletePlayerBtn">
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
                    <div class="text-center"><input class="form-check-input" type="checkbox" id="selectAll"></div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan='8' class='text-center text-gray py-3'>Hãy nhập từ khoá để tìm kiếm</td>
            </tr>
        </tbody>
    </table>
</div>