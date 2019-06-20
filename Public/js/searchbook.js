$(document).ready(function(){
    // jQuery ajax教程: http://www.w3school.com.cn/jquery/ajax_ajax.asp

    $('#searchBook').click(function(){       
        var info = document.getElementById("inputbook").value;
    // query是按钮的id, '#id_name' 可以通过id获取页面元素,'.classname'用来通过类名来获取页面元素,
    //一般推荐通过id获取,因为class有可能会重名而id不会
        $.ajax({
            type: "POST",           // 一般不可能是get方式, 明文传数据不敢相信会有这样的后端工程师... 
            url: "http://localhost/LibrarySystem/index.php/Home/book/getBookInfobyName/name/"+info,  //获取数据的后端PHP文件的路径,但是不知道路径对不对你自己调试的时候检查下
            /*
            url:"../Home/Controller/BookController.class.php?action=getBookInfo",     //为了调用函数写成了这

            */


            success: function(data){        //如果前端收到后端传来的正确的数据则会进入此函数, 此处的参数data就是后端传来的数据
                // 这里写要进行的处理
               // alert(JSON.stringify(data));
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
        var tbody=window.document.getElementById('book_body');  
        var html = '';
				for ( var i = 0; i < data.length; i++) {//循环json对象，拼接tr,td的html
                    html = html + '<tr>';
					html = html + '<td>' + data[i].book_id + '</td>';
					html = html + '<td>' + data[i].book_name + '</td>';
					html = html + '<td>' + data[i].book_author + '</td>';
					html = html + '<td>' + data[i].book_publisher + '</td>';
					html = html + '<td>' + data[i].book_price + '</td>';
                    html = html + '<td>' + data[i].book_callnum + '</td>';
                    html = html + '<td>' + data[i].book_state + '</td>';
                    html = html + '<td>' + data[i].lib_name + '</td>';
                    html = html + '<td>' + data[i].lib_address + '</td>';
					html = html + '</tr>';
                }
                tbody.innerHTML = html;
				// $('#booklist').html(html);//通过jquery方式获取table，并把tr,td的html输出到table中
    }

    /*
    如果要使用js动态修改页面元素,使用xxx = getElementById()函数来获取页面标签然后进行操作 
    
    举一些例子吧

    document.getElementById("my_canvas").style.display = "block"
    其中'my_canvas'就是一个标签的id,`.style`后面的就是对应的CSS属性,可以有很多种可以改
    
    js的语法和C++,java几乎一样,但是句子结尾的 `;`可以省略
    
    匿名函数的写法就是 function(){...}
    比如$('id_name').click(function(){...})
    就是在id为'id_name'的按钮被点击的时候调用匿名函数

    变量声明不需要类型,但是要用var开头表示为一个新变量
    var value
    var value1 = document.getElementById('...')
    value1.style.fontsize='...'
    value1.style.display='...'
    ...

    也可以直接通过js添加页面标签并且按照类似于上面的方式修改样式
    
    样例: https://jingyan.baidu.com/article/a948d65139fd290a2dcd2ea7.html

    还可能用到的是innerHTML功能

    innerHTML在JS是双向功能：获取对象的内容 或 向对象插入内容；
    如：<div id="aa">这是内容</div> ，
    我们可以通过 document.getElementById('aa').innerHTML 来获取id为aa的对象的内嵌内容；
    也可以对某对象插入内容，如 document.getElementById('abc').innerHTML='这是被插入的内容';
    这样就能向id为abc的对象插入内容

    innerHTML和innerTEXT的区别: https://zhidao.baidu.com/question/1957135221297859020.html

    */
})
