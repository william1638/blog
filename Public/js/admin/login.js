/**
 * 前端登录业务类
 * @author singwa
 */
var login = {
    check : function() {
        // 获取登录页面中的用户名 和 密码

        var password = $('input[name="ADMIN_PASSWORD"]').val();
        var verifyCode = $('input[name="verify"]').val();


        if(!verifyCode) {

            return dialog.error('验证码不能为空');
        }
        if(!password) {
            return dialog.error('密码不能为空');
        }

        var url = "/Admin/Login/login";
        var data = {'Admin_PASSWORD':password,'verify':verifyCode};
        // 执行异步请求  $.post
        $.post(url,data,function(result){

            if(result.status == 0) {

                return dialog.error(result.message);
            }
            if(result.status == 1) {

                return dialog.success(result.message, '/Admin/Index/index');
            }

        },'JSON');

    }
}