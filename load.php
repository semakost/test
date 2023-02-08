<?php

session_start();

if(isset($_SESSION['role'])) {
    var_dump($_SESSION['role']);
}else {
    var_dump("Нет роли");
}
if(isset($_SESSION['role']) !== true) {
    $_SESSION['role'] = 'Admin';
    $_SESSION['role_id'] = '3';
}

function connect()
{
    $connectDb = null;

    if($connectDb === null)
    {
        $connectDb = mysqli_connect('localhost' , 'root' , '' , 'MyDB')
        or die('Error connect Db!!!');
    }

    return $connectDb;
}

echo 'Права доступа: ' . $_SESSION['role'];

if($_SESSION['role_id'] >= 2) {
    $result = mysqli_query(connect(), "SELECT * FROM MyDB.Staff");

    echo '<style>
th, td {padding: 5px 10px; border-bottom: 1px dotted black;}
table {margin: 20px auto;background-color: #76d5fc;}
tr:hover > td {background-color: #1ba3da;}
</style><table>
   <caption>Таблица сотрудников</caption>
   <tr>  <th>ID</th>  <th>ИМЯ</th>    <th>ДоЛЖНОСТЬ</th>    <th>ДР</th>    <th>Дети есть?</th>    <th>Телефон</th>   </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '<tr><td>'
            . $row['id'] . '</td><td>'
            . $row['name'] . '</td><td>'
            . $row['position'] . '</td><td>'
            . $row['birthday'] . '</td><td>';
        echo (($row['has_child'] == 1) ? 'Есть' : 'Нетушки');
        echo '</td><td>'
            . $row['phone'] . '</td></tr>';
    }
    echo '</table>';
    echo "<p>Okeyushki</p>";
}else {
    print 'ТЫ ЗДЕСЬ НЕ ПРОЙДЕШЬ!!!';
}
echo '<div style="cursor: pointer;" id="example-1">НАЖМИ НА МЕНЯ ЕЩЁ РАЗ!</div>';
mysqli_close(connect());
