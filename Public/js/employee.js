$(document).ready(function(){
    // jQuery ajax教程: http://www.w3school.com.cn/jquery/ajax_ajax.asp

        $.ajax({
            type: "POST",           // 一般不可能是get方式, 明文传数据不敢相信会有这样的后端工程师... 
            url: "http://localhost/LibrarySystem/index.php/Home/Employee/getPersonalInfoByID",  //获取数据的后端PHP文件的路径,但是不知道路径对不对你自己调试的时候检查下
        
            success: function(data){        //如果前端收到后端传来的正确的数据则会进入此函数, 此处的参数data就是后端传来的数据
                //alert(JSON.stringify(data));
                showperson(data);
                // var bookdata = JSON.stringify(data)  //识别后端传过来的Json字符串(具体是什么格式要看后端,这里以json格式举例), 使用data['keyname']这样的形式来获取对应键的值
                //alert('success!');
            },
            error: function(err){      //如果收到后端的错误信息则进入此函数, err是自己随便取的参数名,代表了错误对象
                alert('error! '+ err + ' \nPlease try again!')
            }
        })
    })

    function showperson(data){
        document.getElementById('emp_name').innerHTML = data.emp_name;
        document.getElementById('libname').innerHTML = data.lib_name;
        document.getElementById('gender').innerHTML = data.emp_gender;
        document.getElementById('phone').innerHTML = data.emp_phone;
        document.getElementById('email').innerHTML = data.emp_email;
    }