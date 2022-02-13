function iFrameOn() {
    richText.document.designMode = "on";
    }
function iBold() {
    richText.document.execCommand("bold", false, null);
    }
function iUnderline() {
     richText.document.execCommand("underline", false, null);
    }
function iItalic() {
     richText.document.execCommand("italic", false, null);
    }
function iFontSize() {
    var size = prompt("Enter size 1-7", "");
    richText.document.execCommand("FontSize", false, size);
    }
function iFontColor() {
    var color = document.getElementById("colorPicker").value;
    richText.document.execCommand("ForeColor", false, color);
    }
function iHorizontalRule() {
    richText.document.execCommand("inserthorizontalrule", false, null);
    }
function iUnorderedList() {
    richText.document.execCommand("InsertUnorderedList", false, "newUL");
    }
function iOrderedList() {
     richText.document.execCommand("InsertOrderedList", false, "newOL");
    }
function iLink() {
    var linkURL = prompt("Enter a link...", "http://");
    richText.document.execCommand("CreateLink", false, linkURL);
    }
function iUnlink() {
    richText.document.execCommand("Unlink", false, null);
    }
function iImage() {
    var imgSrc = prompt("Enter the location of the picture...", "");
    if (imgSrc !== null) {
    richText.document.execCommand("insertimage", false, imgSrc);
    }
    }
function submit_form() {
    var form = document.getElementById("new");
    form.elements["text_area"].value = window.frames["richText"].document.body.innerHTML;
    form.submit();
    }
function cnt(w,x){
var y=w.value;
var r = 0;
a=y.replace(/\s/g,' ');
a=a.split(' ');
for (z=0; z<a.length; z++) {if (a[z].length > 0) r++;}
x.value=r;
}
function notSaved() {
	alert();
	
} //different variables on function to do different things (IDK)