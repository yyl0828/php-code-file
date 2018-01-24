<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文件上传</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/ico"  />
    <link rel="icon" href="/favicon.ico" mce_href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" mce_href="/favicon.ico" type="image/x-icon">
    <style>
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
            background-size: 100% 100%;
            background-color: rgba(249, 246, 100, 0.33);
        }

        input {
            margin: 10px;
        }

        button {
            padding: 10px 20px;
        }

        #fileForm{
            display: none;
        }

        .btn{
            border: none;
            color: white;
            border-radius: 6px;
            outline:none;
            cursor: pointer;
        }

        .btn_b{
            background:rgba(27,194,14,0.93);
        }
        .btn_d{
            background:rgba(158,158,158,0.93);
        }
    </style>
</head>
<body>
<div style="padding: 20px">
    <input type="file" name="myfile"
           accept="image/gif,image/jpeg,image/jpg,image/png,image/svg"
           id="fileForm" onchange="fileupload()"/><br/>
    <button onclick="changeBg()" class="btn btn_b">修改背景</button>
    <button onclick="deleteBg()" class="btn btn_d">重置</button>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>

    function changeBg() {
        $('#fileForm').click();
    }
    function fileupload() {
        var formData = new FormData();
        if ($('#fileForm').val() === '') return;
        formData.append("myfile", document.getElementById("fileForm").files[0]);
        $.ajax({
            url: 'upload.php',
            contentType: false,
            type: 'post',
            processData: false,
            dataType: 'JSON',
            data: formData,
            success: function (res) {
                if (res.result) {
                    $('body').css('background', 'url("' + res.data.src + '")');
                }
                else {
                    alert(res.data.msg);
                }
            }
        })
    }
    function deleteBg() {
        $('body').css('background', ' rgba(249, 246, 100, 0.33)');
    }
</script>
</body>
</html>