$(document).ready(function(){
    // jQuery ajax教程: http://www.w3school.com.cn/jquery/ajax_ajax.asp

    // $('#searchBook').click(function(){       
    //     var info = document.getElementById("inputbook").value;
    // query是按钮的id, '#id_name' 可以通过id获取页面元素,'.classname'用来通过类名来获取页面元素,
    //一般推荐通过id获取,因为class有可能会重名而id不会
        $.ajax({
            type: "POST",           // 一般不可能是get方式, 明文传数据不敢相信会有这样的后端工程师... 
            url: "http://localhost/LibrarySystem/index.php/Home/User/getBorrowRecordByID",  //获取数据的后端PHP文件的路径,但是不知道路径对不对你自己调试的时候检查下
            /*
            url:"../Home/Controller/BookController.class.php?action=getBookInfo",     //为了调用函数写成了这

            */

           
            success: function(data){        //如果前端收到后端传来的正确的数据则会进入此函数, 此处的参数data就是后端传来的数据
                // 这里写要进行的处理
                //alert(JSON.stringify(data));
                showbook(data);
                // var bookdata = JSON.stringify(data)  //识别后端传过来的Json字符串(具体是什么格式要看后端,这里以json格式举例), 使用data['keyname']这样的形式来获取对应键的值
                //alert('success!');
            },
            error: function(err){      //如果收到后端的错误信息则进入此函数, err是自己随便取的参数名,代表了错误对象
                alert('error! '+ err + ' \nPlease try again!')
            }
        })
    })

    function showbook(data){
        var tbody=window.document.getElementById('borrow_body');  
        var html = '';
				for ( var i = 0; i < data.length; i++) {//循环json对象，拼接tr,td的html
                    html = html + '<tr>';
					html = html + '<td>' + data[i].book_name + '</td>';
					html = html + '<td>' + data[i].book_author + '</td>';
					html = html + '<td>' + data[i].book_publisher + '</td>';
                    html = html + '<td>' + data[i].borrow_time + '</td>';
                    html = html + '<td>' + data[i].practical_return_time + '</td>';
                    html = html + '<td>' + data[i].expected_return_time + '</td>';
                    html = html + '<td>' + data[i].fine_num + '</td>';
					html = html + '</tr>';
                }
                tbody.innerHTML = html;
				// $('#booklist').html(html);//通过jquery方式获取table，并把tr,td的html输出到table中
    }