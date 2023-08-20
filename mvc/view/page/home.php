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
        <tr class="todo-entry">
            <td><?= $row['noteID'] ?></td>
            <td><?= $row['noteTitle'] ?></td>
            <td><?= $row['noteText'] ?></td>
            <td><?= $row['noteTime'] ?></td>

            <td><span class="link" onclick="editNote(this,<?= $row['noteID'] ?>)"> <i class="bi bi-pencil-square"></i></span></td>

            <td><span class="link" onclick="deleteNote(this,<?= $row['noteID'] ?>)"> <i class="bi bi-calendar-x"></i></span></td>

        </tr>
    <? } ?>
</table><br>
<div class="insertdiv"> <a class="insertrecord" href="<?= getBaseUrl() ?>notes/submit">درج نت</a></div>

<script>
    function editNote() {

    }

    function deleteNote(sender, noteId) {
        sender = $(sender);
        var parent = sender.parentsUntil('tr').parent();

        $.ajax('/notes3-uncox-withMVCandAJAX/notes/remove/' + noteId, {
            type: 'post',
            dataType: 'json',

            success: function(data) {
                console.log("SUCCESS Ok", data);
                parent.remove();
            }
        });
    }
</script>