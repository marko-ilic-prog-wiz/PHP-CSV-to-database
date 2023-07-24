<?php
    require_once('backend/database-check-create-repair/database-check.php');
?>

<!doctype html>
<html>
    <head>
        <title>Marko Ilic - Test</title>
        <script src="js/jquery-3.6.3.min.js"></script>
        <link rel="stylesheet" href="CSS/style.css?v=<?php echo time(); ?>">
    </head>

    <body id="bodyID" >
    <div class="notificationClass" id="notificationID"></div>
        <div class="wrapper">
            <div class="innerWrapper">
                <h1>I've made 3 ways to upload the .csv file:</h1>
                <h3>&nbsp;&nbsp;&nbsp;1. Direct file upload from PC/phone by choosing the file in file manager</h3>
                <h3>&nbsp;&nbsp;&nbsp;2. Upload by pasting the URL of the file</h3>
                <h3>&nbsp;&nbsp;&nbsp;3. Drag and drop, like WeTransfer, Google or Dropbox</h3>
                <div><h3 style="display: inline ! important;">&nbsp;&nbsp;&nbsp;Check for duplicates</h3><input type="checkbox" id="duplicatesID" name="duplicate" checked></div>
                <div class="divider" id="idDiv1"></div>
                <div class="groupClass">
                    <div>
                        <form action="upload-controller/upload.php" method="post" enctype="multipart/form-data">
                            <h3>Select file to upload:
                            <input id="fileupload" type="file" name="fileupload" multiple/></h3>
                            <div class="uplCl" onclick="upld1()">UPLOAD</div>
                        </form>
                    </div>
                </div>
                <div class="divider" id="idDiv2"></div>
                <div class="groupClass">
                    <h3 style="display: inline ! important;">Please paste URL link for CSV file&nbsp;&nbsp;&nbsp;</h3><input type="text" id="urlID" name="csvUrl" class="textBoxCl">
                    <div class="uplCl" onclick="upld2()">UPLOAD</div>
                </div>
                <div class="divider" id="idDiv3"></div>
                <div class="groupClass">
                    <h3>Drag and drop a file, or click on the field</h3>
                    <div class="uplCl" onclick="upld3()">UPLOAD</div>
                    <br><br>
                    <div class="area">
                        <h1 class="dragText">Drag here</h1>
                        <input type="file" id="upload" multiple/>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/javascript.js?v=<?php echo time(); ?>"></script>
    </body>
</html>