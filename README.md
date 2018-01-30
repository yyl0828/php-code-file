# php-code-file


生成验证码：
使用GD库生成图片、干扰点、干扰线等
使用session保存验证码

上传图片：
使用$ajax方式提交图片,创建formData对象传输
使用copy或者move_upload_file()方法保存文件
如文件名中含有中文，使用iconv函数进行转换再保存
