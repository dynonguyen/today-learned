<style>
    li {
        list-style: none;
        line-height: 2;
    }
</style>

<h1 class="display-6 text-center py-4">
    Thông tin sinh viên <b> <?php echo $studentInfo->__get('id'); ?> </b>
</h1>

<div class="text-center">
    <ul>
        <?php
        echo "<li><b>Mã số sinh viên:</b> {$studentInfo->__get('id')}</li>";
        echo "<li><b>Họ tên:</b> {$studentInfo->__get('name')}</li>";
        echo "<li><b>Email:</b> {$studentInfo->__get('email')}</li>";
        echo "<li><b>Ngày sinh:</b> {$studentInfo->__get('birthday')}</li>";
        echo "<li><b>Lớp:</b> {$studentInfo->__get('grade')}</li>";
        echo "<li><b>Sđt:</b> {$studentInfo->__get('phone')}</li>";
        ?>
    </ul>
</div>