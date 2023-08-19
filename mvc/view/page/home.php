<table>
    <tr>
        <th>کد نت</th>
        <th>عنوان نت</th>
        <th>متن نت</th>
        <th>زمان نت</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>
    <?
    if ($records == null) {
        $records = array();
    }
    foreach ($records as $row) {
        $t = $row['noteTitle'];

    ?>
        <tr>
            <td><?= $row['noteID'] ?></td>
            <td><?= $row['noteTitle'] ?></td>
            <td><?= $row['noteText'] ?></td>
            <td><?= $row['noteTime'] ?></td>
            <td><a href="<?= getBaseUrl() ?>notes/edit/<?= $row['noteID'] ?>/<?= $t ?>"> <i class="bi bi-pencil-square"></i></a></td>
            <td><a href="<?= getBaseUrl() ?>notes/remove/<?= $row['noteID'] ?>"> <i class="bi bi-calendar-x"></i></a></td>
        </tr>
    <? } ?>
</table><br>
<div class="insertdiv"> <a class="insertrecord" href="<?= getBaseUrl() ?>notes/submit">درج نت</a></div>