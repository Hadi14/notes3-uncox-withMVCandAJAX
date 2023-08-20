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

            <td><span onclick="editNote(this,<?= $row['noteID'] ?>)"> <i class="bi bi-pencil-square"></i></span></td>

            <td><span onclick="deleteNote(this,<?= $row['noteID'] ?>)"> <i class="bi bi-calendar-x"></i></span></td>

        </tr>
    <? } ?>
</table><br>
<div class="insertdiv"> <a class="insertrecord" href="<?= getBaseUrl() ?>notes/submit">درج نت</a></div>

<script>
    function editNote() {
        $.ajax('<?= getBaseUrl() ?>notes/edit/<?= $row['noteID'] ?>', {
            type: 'post',
            dataType: "JSON",
            data: {
                key: inpvalue
            },
            success: function(data) {
                // console.log(data);
                // $('#txtbox').html(data);
                // var dec = JSON.parse(data);
                $('#txtbox').html(data.content);
            }
        })
    }



    function deleteNote(element, noteid) {
        elem = $(element);
        var parent = elem.parentsUntil('td').parent();

        $.ajax('notes3-uncox-withMVCandAJAX/notes/remove/' + noteid, {
            type: 'post',
            dataType: "JSON",
            success: function(data) {
                parent.remove();
            }
        })
    }
</script>