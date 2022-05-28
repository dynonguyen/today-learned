<div class='container py-5'>
    <form id='form' method='POST' action='/account/postLogin'>
        <h1 class='text-center my-4 main-title'>Đăng nhập</h1>

        <p id='formError' class='form-error mb-4 d-none'></p>
        <p class="fs-3 text-gray my-3 text-center">Tài khoản test: admin/admin</p>

        <input id='name' name='name' type='text' class='form-control form-control-lg' minlength="1" maxlength="50" placeholder='Tên'>
        <div class='password-field'>
            <input id='password' name='password' type='password' class='form-control form-control-lg' placeholder='Mật khẩu' maxlength="100">
            <i class='bi bi-eye-slash-fill password-icon'></i>
        </div>

        <button type='submit' id='submitBtn' class='btn btn-primary'>Đăng nhập</button>
    </form>
</div>