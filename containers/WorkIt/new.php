<!DOCTYPE html>
<html>
<head>
    <title>New File...</title>
    <?php
    include "init.php";
    ?>
</head>
<body onLoad="iFrameOn();">
<form action="parse.php" name="new" id="new" method="post">
<input placeholder="Title (Max. 80)" type="text" name="title" class="fields" maxlenght="80">
    <div id="toolbar">
    <input type="button" class="buttons" onclick="iBold();" value="B">
    <input type="button" class="buttons"  onclick="iUnderline();" value="U">
    <input type="button" class="buttons"  onclick="iItalic();" value="I">
    <input type="button" class="buttons"  onclick="iFontSize();" value="Font Size">
    <input id="colorPicker" type="color" onclick="iFontColor();">
    <input type="button" class="buttons" style="width: 80px;" onclick="iFontColor();" value="Update Color">
    <input type="button" class="buttons"  onclick="iHorizontalRule();" value="HR">
    <input type="button" class="buttons"  onclick="iUnorderedList();" value="UL">
    <input type="button" class="buttons"  onclick="iOrderedList();" value="OL">
    <input type="button" class="buttons"  onclick="iLink();" value="Link">
    <input type="button" class="buttons"  onclick="iUnlink();" value="Unlink">
    <input type="button" class="buttons"  onclick="iImage();" value="Image">
    </div>
    <br />
    <textarea onkeyup="cnt(this,document.new.c)" placeholder="Text here..." style="display:none;" name="text_area" id="text_area" class="fields"></textarea>
    <iframe onkeyup="cnt(this,document.new.c)" name="richText" id="richText" class="fields"></iframe>
    <br />
     <input type="text" name="c" value="0" size="5" onkeyup="cnt(document.new.text_area,this)" />
    <input name="save" type="button" value="Save" onclick="javascript:submit_form();">
</form>
</body>
</html>