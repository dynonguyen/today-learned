<div class="container">
    <h1 class="text-center py-3 display-6">Danh sách sinh viên</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">MSSV</th>
                <th scope="col">Họ Tên</th>
                <th scope="col">Lớp</th>
                <th scope="col">Điểm TB</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($studentList)) {
                foreach ($studentList as $index => $student) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $index + 1 . "</th>";
                    echo "<td><a href='/sinh-vien/{$student->__get('id')}'>{$student->__get('id')}</a></td>";
                    echo "<td>{$student->__get('name')}</td>";
                    echo "<td>{$student->__get('grade')}</td>";
                    echo "<td>{$student->__get('avg')}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>