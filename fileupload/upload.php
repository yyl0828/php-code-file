<?php

$_file = $_FILES['myfile'];
$filename =$_file['name'];
$tmp_name = $_file['tmp_name'];
$size = $_file['size'];
$error = $_file['error'];
$type = $_file['type'];

header("Content-type: text/html; charset=utf-8");

if ($error == 0) {
    if (isImage($type)) {
        copy($tmp_name, "fileDir/" . iconv("UTF-8", "gb2312", $filename));
        $data['result'] = true;
        $data['data']['src'] = "fileDir/" . $filename . "";
        $data['data']['msg'] = '上传成功';
        echo json_encode($data);
    } elseif (!isImage($type)) {
        $data['result'] = false;
        $data['data']['msg'] = '上传失败，上传图片格式不正确';
        $data['data']['type'] = $type;
        echo json_encode($data);
    }

} else {
    echo '上传失败请重试';
}

function isImage($img)
{
    if (
        $img == 'image/jpeg' ||
        $img == 'image/png' ||
        $img == 'image/gif' ||
        $img == 'image/jpg'||
        $img == 'image/svg'
    ) {
        return true;
    } else {
        return false;
    }
}

