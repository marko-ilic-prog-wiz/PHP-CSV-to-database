var notificationBuffer=[];
var notificationBufferActiveCounter=0;


async function mainUpload(fileupload1) {
    for(var i=0;i<fileupload1.files.length;i++) {
        if(fileupload1.files[i].name.substring(fileupload1.files[i].name.lastIndexOf(".")).toLowerCase()===".csv") {

            var checkedBox=1;
            if(document.getElementById('duplicatesID').checked){ checkedBox=1; }
            else{ checkedBox=0; }

            let formData = new FormData();
            formData.append("file", fileupload1.files[i]);
            formData.append("notURL",1);
            formData.append("duplicate",checkedBox);

            $.ajax({
                type: "POST",
                url: "backend/upload-controller/upload.php",
                data: formData,
                contentType: false,
                processData: false
            }).done(function (response) {
                setTimeout(function () {
                    notificationBuffer[notificationBufferActiveCounter] = "The file has been successfully uploaded. <br>"+response;//" + fileupload.files[i].name + "
                    notificationBufferActiveCounter++;
                    spinNotifyUser();
                }, 15);
            });;
        }
        else
        {
            notificationBuffer[notificationBufferActiveCounter] = "The file " + fileupload.files[i].name + " is not .csv.";
            notificationBufferActiveCounter++;
            spinNotifyUser();
        }
    }
}

async function upld1() {
    mainUpload(fileupload);
}

/*************************************/
//method 2
async function upld2() {
    if(document.getElementById("urlID").value.substring(document.getElementById("urlID").value.lastIndexOf(".")).toLowerCase()===".csv") {

        var checkedBox=1;
        if(document.getElementById('duplicatesID').checked){ checkedBox=1; }
        else{ checkedBox=0; }

        $.post('backend/upload-controller/upload2.php', {"duplicate": checkedBox, urlVar: document.getElementById("urlID").value}).done(function (response) {
            setTimeout(function () {
                alert(response);
                if (response === "Success") {
                    notificationBuffer[notificationBufferActiveCounter] = "The file from URL has been successfully uploaded.";
                    notificationBufferActiveCounter++;
                    spinNotifyUser();
                } else {
                    notificationBuffer[notificationBufferActiveCounter] = "There has been an error.";
                    notificationBufferActiveCounter++;
                    spinNotifyUser();
                }
            }, 10);
        });
    }
    else
    {
        notificationBuffer[notificationBufferActiveCounter] = "The file from the URL is not .csv.";
        notificationBufferActiveCounter++;
        spinNotifyUser();
    }
}

/*************************************/
//method 3

var upload = document.getElementById('upload');
var files;
function onFile() {
    var me = this,
        files= upload.files;
}

async function upld3() {
    mainUpload(upload);
}

upload.addEventListener('dragenter', function (e) {
    upload.parentNode.className = 'area dragging';
}, false);

upload.addEventListener('dragleave', function (e) {
    upload.parentNode.className = 'area';
}, false);

upload.addEventListener('dragdrop', function (e) {
    onFile();
}, false);

upload.addEventListener('change', function (e) {
    onFile();
}, false);

var notYet=false;
var countToActiveCounter=0;
var closeAccess = false;
function spinNotifyUser(){
    if(notYet==false){
        notYet=true;
        notifyUser(notificationBuffer[countToActiveCounter]);
        const loopTime = setInterval(function(){
            notYet=false;
            if(!closeAccess) {
                closeAccess=true;
                if (countToActiveCounter < notificationBufferActiveCounter-1) {
                    countToActiveCounter++;
                    notifyUser(notificationBuffer[countToActiveCounter]);
                    closeAccess = false;
                } else {
                    notificationBufferActiveCounter = 0;
                    countToActiveCounter = 0;
                    closeAccess = false;
                    notYet=false;
                    clearInterval(loopTime);
                }
            }
        }, 4100);
    }
}

function notifyUser(textToBeDisplayed){
    setTimeout(function() {
        document.getElementById("notificationID").innerHTML = textToBeDisplayed;
        setTimeout(function() {
            document.getElementById("notificationID").style.setProperty("transform", "translateY(0px)", "important");
            setTimeout(function() {
                document.getElementById("notificationID").style.setProperty("transform", "translateY(-500px)", "important");
                closeAccess = false;
                notYet=false;
            }, 3000);
        }, 10);
    }, 10);
}