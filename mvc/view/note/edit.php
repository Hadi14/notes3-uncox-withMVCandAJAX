<form action="<?= getBaseUrl() ?>notes/edit/<?= $noteID ?>" method="post">
    <label for="noteid">NoteID: </label>
    <input name="id" required id="noteid" type="text" value="<?= $noteID ?>"><br>
    <label for="notetit">NoteTitle</label>
    <input name="title" required id="notetit" type="text" value="<?= $noteTitle ?>"><br>
    <label for="notete">NoteText</label>
    <input name="text" required id="notete" type="text" value="<?= $noteText ?>"><br>
    <label for="notetim">NoteTime</label>
    <input name="time" required id="notetim" type="text" value="<?= $noteTime ?>"><br>
    <input type="submit" value="Send">
</form>