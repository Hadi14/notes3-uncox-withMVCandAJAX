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
            <td id="nidtr"><?= $row['noteID'] ?></td>
            <td><?= $row['noteTitle'] ?></td>
            <td><?= $row['noteText'] ?></td>
            <td><?= $row['noteTime'] ?></td>
            <td><a onClick="submitText('<?= $row['noteID'] ?>','<?= $row['noteTitle'] ?>','<?= $row['noteText'] ?>','<?= $row['noteTime'] ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal" class="link" href=""> <i class="bi bi-pencil-square"></i></a></td>
            <td><span class="link" onclick="deleteNote(this,<?= $row['noteID'] ?>)"> <i class="bi bi-calendar-x"></i></span></td>
        </tr>
    <? } ?>
</table><br>
<div class="insertdiv"> <a class="insertrecord" href="<?= getBaseUrl() ?>notes/submit">درج نت</a></div>



<!--------------------------- modal  ------------------------------------------------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" dir="rtl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ویرایش اطلاعات رکورد</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-0">
                        <label for="recipient-name1" class="col-form-label">کد نوت:</label>
                        <input name="id" type="text" class="form-control" id="recipient-name1">
                    </div>
                    <div class="mb-0">
                        <label for="recipient-name2" class="col-form-label">عوان نوت:</label>
                        <input name="title" type="text" class="form-control" id="recipient-name2">
                    </div>
                    <div class="mb-0">
                        <label for="recipient-name3" class="col-form-label">زمان نوت:</label>
                        <input name="time" type="text" class="form-control" id="recipient-name3">
                    </div>
                    <div class="mb-0">
                        <label for="message-text" class="col-form-label">متن نوت:</label>
                        <textarea name="text" class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="editNote('<?= $row['noteID'] ?>')">ویرایش</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خروج</button>
            </div>
        </div>
    </div>
</div>
<!--------------------------------- End of Modal ----------------------------------------------------------->
<script>
    function deleteNote(sender, noteId) {
        sender = $(sender);
        var parent = sender.parentsUntil('tr').parent();
        $.ajax('/notes3-uncox-withMVCandAJAX/notes/remove/' + noteId, {
            type: 'post',
            dataType: "JSON",
            success: function(data) {
                console.log("SUCCESS Ok");
                parent.remove();
            },
        });
    }
</script>
<script>
    // fill modal fields from data Record
    function submitText(nid, ntitle, ntext, ntime) {
        $('#recipient-name1').val(nid);
        $('#recipient-name2').val(ntitle);
        $('#message-text').val(ntext);
        $('#recipient-name3').val(ntime);
    }
    // do edit recrd by modal fileds and ajax 
    function editNote(noteId) {
        var ntitle = $('#recipient-name2').val();
        var ntext = $('#message-text').val();
        var ntime = $('#recipient-name3').val();
        // var ntime = "ok";
        console.log(noteId, ntitle, ntext, ntime);
        $.ajax('/notes3-uncox-withMVCandAJAX/notes/edit/' + noteId, {
            type: 'post',
            dataType: "json",
            data: {
                'id': noteId,
                'title': ntitle,
                'text': ntext,
                'time': ntime,
            },
            success: function(data) {
                console.log("SUCCESS Ok");

            },
        });
    }
</script>