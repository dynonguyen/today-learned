<?php
/*
    --- BASIC PHP Syntax ---
    - PHP được bắt đầu trong cặp
    <?php
        code ở đây
    ?>

    - Nếu bắt đầu file bằng Php thì không cần kết thúc với ?>
    - Kết thúc câu lệnh với dấu ;
*/

/* 
    --- PHP CASE SENSITIVITY ---
    - Đối với keyword PHP không phân biệt hoa thường như ECHO, echo, Echo, if, else, ...
    - Tuy nhiên với biến thì có
*/

/*
    --- CODING CONVENTION ---
    - Tuân theo - PSR (PHP Standards Recommendation) bao gồm PRS-0, PSR-1, PSR-2, PRS-4 (Autoloader)

    - PRS-1 (https://www.php-fig.org/psr/psr-1/):
        + Code phải được viết trong cặp thẻ <?php ?>.
        + Code chỉ được sử dụng UTF-8 không có BOM (Byte Order Mark)
        + Mỗi một file PHP chỉ nên làm 1 nhiệm vụ duy nhất, tránh chồng chéo (gọi là side effect).
        + Với constants phải viết $CONSTANT_NAME
        + Tên method phải viết kiểu camelCase()
        + Tên biết thuộc tính có thể sử dụng tùy ý nhưng cần nhất quán trong cả package

    - PRS-2 (https://www.php-fig.org/psr/psr-2/)
        + Phải tuân thủ PSR-1
        + Sử dụng 4 khoảng trắng(spaces) để thụt dòng thay vì dùng tab.
        + Phải có 1 dòng trắng sau khi khai báo namespace và phải có 1 dòng trắng sau các khai báo use.
        + Kết thúc file phài là UNIX LF.
        + Thẻ đóng và mở của 1 hàm {} phải nằm riêng biệt trên một dòng.
        + Trước thẻ mở & đóng hàm {} thì không được có 1 dòng trắng.
        + Dùng single quote khi khai báo chụỗi.

*/

/* 
    --- COMMENT ---
    - Single line: // or #
    - Multiple line: /*

*/
