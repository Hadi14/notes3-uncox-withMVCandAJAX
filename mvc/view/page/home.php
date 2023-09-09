<table class="rcdtable">
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
        $nid = $row['noteID'];
        $txt = $row['noteText'];
        $time = $row['noteTime'];

    ?>
        <tr class="todo-entry">
            <td id="nidtr"><?= $row['noteID'] ?></td>
            <td id="ntit"><?= $row['noteTitle'] ?></td>
            <td id="ntex"><?= $row['noteText'] ?></td>
            <td id="ntim"><?= $row['noteTime'] ?></td>
            <td><a onclick="editRecord('<?= $row['noteID'] ?>','<?= $row['noteTitle'] ?>','<?= $row['noteText'] ?>','<?= $row['noteTime'] ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal" class="link" href=""> <i class="bi bi-pencil-square"></i></a></td>
            <td><span class="link" onclick="deleteNote(this,<?= $row['noteID'] ?>)"> <i class="bi bi-calendar-x"></i></span></td>
        </tr>
    <? } ?>
</table><br>
<div class="insertdiv"> <a class="insertrecord" href="#" data-bs-target="#addModal" data-bs-toggle="modal">درج نت</a></div>



<!---------------------------Add modal  ------------------------------------------------------------------------->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" dir="rtl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ثبت نوت </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-0">
                        <label for="recipient-name1" class="col-form-label">کد نوت:</label>
                        <input name="id" type="text" class="form-control" id="add-recipient-name1">
                    </div>
                    <div class="mb-0">
                        <label for="recipient-name2" class="col-form-label">عنوان نوت:</label>
                        <input name="title" type="text" class="form-control" id="add-recipient-name2">
                    </div>
                    <div class="mb-0">
                        <label for="recipient-name3" class="col-form-label">زمان نوت:</label>
                        <input name="time" type="text" class="form-control" id="add-recipient-name3">
                    </div>
                    <div class="mb-0">
                        <label for="message-text" class="col-form-label">متن نوت:</label>
                        <textarea name="text" class="form-control" id="add-message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal" onclick="addNote()">ثبت</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خروج</button>
            </div>
        </div>
    </div>
</div>
<!--------------------------------- End of Add Modal ----------------------------------------------------------->

<!--------------------------- Edit modal  ------------------------------------------------------------------------->
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
                        <input disabled name="id" type="text" class="form-control" id="recipient-name1">
                    </div>
                    <div class="mb-0">
                        <label for="recipient-name2" class="col-form-label">عنوان نوت:</label>
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
                <button class="btn btn-primary" data-bs-dismiss="modal" onclick="editNote()">ویرایش</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خروج</button>
            </div>
        </div>
    </div>
</div>
<!--------------------------------- End of Modal ----------------------------------------------------------->
<script>
    var list = <?php echo json_encode($records); ?>

    // console.log(list);
    // const host = "1pelak.ir/"
    function deleteNote(sender, noteId) {
        sender = $(sender);
        var parent = sender.parentsUntil('tr').parent();
        $.ajax('/notes3-uncox-withMVCandAJAX/notes/remove/' + noteId, {
            type: 'post',
            dataType: "JSON",
            success: function(data) {
                // console.log("SUCCESS Ok");
                parent.remove();
            },
        });
    }
    /************************************************** */
    function addNote() {
        var ntitle = $('#add-recipient-name2').val();
        var nid = $('#add-recipient-name1').val();
        var ntext = $('#add-message-text').val();
        var ntime = $('#add-recipient-name3').val();
        $.ajax('/notes3-uncox-withMVCandAJAX/notes/submitNote/' + nid, {
            type: 'post',
            dataType: "text",
            data: {
                'id': nid,
                'title': ntitle,
                'text': ntext,
                'time': ntime,
            },
            success: function(data) {
                fetch();
            },
        });
    }
</script>
<script>
    // fill modal fields from data Record
    function editRecord(id, tit, tex, tim) {
        // console.log(id);
        $('#recipient-name1').val(id);
        $('#recipient-name2').val(tit);
        $('#message-text').val(tex);
        $('#recipient-name3').val(tim);
    }

    // do edit recrd by modal fileds and ajax 
    function editNote() {
        var ntitle = $('#recipient-name2').val();
        var nid = $('#recipient-name1').val();
        var ntext = $('#message-text').val();
        var ntime = $('#recipient-name3').val();
        // console.log("EDDDDit fields");
        // console.log(nid, ntitle, ntext, ntime);
        $.ajax('/notes3-uncox-withMVCandAJAX/notes/edit/' + nid, {
            type: 'post',
            dataType: "text",
            data: {
                'id': nid,
                'title': ntitle,
                'text': ntext,
                'time': ntime,
            },
            success: function(data) {
                fetch();
            },
        });
    }


    function getall() {
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

            },
        });
    }


    function fetch() {
        $.ajax('/notes3-uncox-withMVCandAJAX/notes/getAllNote/', {
            type: 'post',
            dataType: "json",
            success: function(data) {
                $(".rcdtable .todo-entry").remove();
                data.forEach(element => {
                    $(".rcdtable").append(' <tr class="todo-entry">' +
                        '<td id="nidtr">' + element['noteID'] + '</td>' +
                        '<td>' + element['noteTitle'] + '</td>' +
                        '<td>' + element['noteText'] + '</td>' +
                        '<td>' + element['noteTime'] + '</td>' +
                        '<td><a onclick="editRecord(' + "'" + element['noteID'] + "','" + element['noteTitle'] + "','" + element['noteText'] + "','" + element['noteTime'] + "'" + ')"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="link" href=""> <i class="bi bi-pencil-square"></i></a>' + '</td>' +
                        '<td><span class="link" onclick="deleteNote(' + "this" + ',' + element['noteID'] + ')">' + '<i class="bi bi-calendar-x"></i></span></td>' +
                        '</tr>');

                });
            },
        });
    }
</script>