// $(document).ready(function() {
//     //调用函数，初始化表格 
//     $("#searchBtn").click(function() {
//         var sname1 = $("#book_name").val();
//         $.ajax({
//              type: "get",
//              url: "http://localhost/LibrarySystem/index.php/Home/Book/getBookInfobyName",
//              data: '', 
//              dataType:"json",
//              success : function(json) {
//                 $("#booklist").bootstrapTable('load', json);//主要是要这种写法
//             }
//         });

//     });
// });
// var TableInit = function () {
//     var oTableInit = new Object();
//     //初始化Table
//     oTableInit.Init = function () {
//         var sname11 = $("#book_name").val();
//         var urlStr = 'http://localhost/LibrarySystem/index.php/Home/Book/getBookInfobyName?book_name' + sname11;
//         //console.log(urlStr);
//         $('#booklist').bootstrapTable({
//             url: urlStr,         //请求后台的URL（*）
//             method: 'get',                      //请求方式（*）
//             toolbar: '#toolbar',                //工具按钮用哪个容器
//             striped: true,                      //是否显示行间隔色
//             cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
//             pagination: true,                   //是否显示分页（*）
//             //sortable: false,                     //是否启用排序
//             //sortOrder: "asc",                   //排序方式
//                     //queryParams: oTableInit.queryParams,//传递参数（*）
//                     queryParams : {
//                         book_name : 'r',
//                     },
//                     sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
//                     pageNumber:1,                       //初始化加载第一页，默认第一页
//                     pageSize: 5,                       //每页的记录行数（*）
//                     pageList: [10, 25, 50, 100],        //可供选择的每页的行数（*）
//                     strictSearch: true,
//                     clickToSelect: true,                //是否启用点击选中行
//                     height: 460,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
//                     uniqueId: "id",                     //每一行的唯一标识，一般为主键列
//                     cardView: false,                    //是否显示详细视图
//                     detailView: false,                   //是否显示父子表
//                     columns: [{
//                         checkbox : true
//                     }, {
//                         field: 'book_id',
//                         title: '学号'
//                     }, {
//                         field: 'book_name',
//                         title: '姓名'
//                     }, {
//                         field: 'book_author',
//                         title: '性别'
//                     }, {
//                         field: 'book_publisher',
//                         title: '专业'
//                     },  
//                     {
//                         field: 'book_price',
//                         title: '價格'
//                     },
//                     {
//                         field: 'book_callnum',
//                         title: 'callnum'
//                     },
//                     {
//                         field: 'lib_id',
//                         title: 'lib_id'
//                     },
//                     {
//                         field: 'book_state',
//                         title: '狀態'
//                     },
//                     {
//                         field: 'lib_name',
//                         title: 'lib_name'
//                     },
//                     {
//                         field: 'lib_address',
//                         title: 'address'
//                     }
//                     ]
//                 });
//             };

//             //得到查询的参数
//           oTableInit.queryParams2 = function (params) {
//                 var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
//                     //limit: params.limit,   //页面大小
//                     //offset: params.offset,  //页码
//                     book_name : "r",
//                 };
//                 return temp;
//             };
//             return oTableInit;
//         };


$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

});


var TableInit = function () {
var oTableInit = new Object();
//初始化Table
oTableInit.Init = function () {
    $('#booklist').bootstrapTable({
        url: 'http://localhost/LibrarySystem/index.php/Home/Book/getBookInfobyName',         //请求后台的URL（*）
        method: 'GET',                      //请求方式（*）
        toolbar: '#toolbar',                //工具按钮用哪个容器
        striped: true,                      //是否显示行间隔色
        cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
        pagination: true,                   //是否显示分页（*）
        sortable: false,                     //是否启用排序
        sortOrder: "asc",                   //排序方式
        queryParams: oTableInit.queryParams,//传递参数（*）
        sidePagination: "server",           //分页方式：client客户端分页，server服务端分页（*）
        pageNumber:1,                       //初始化加载第一页，默认第一页
        pageSize: 10,                       //每页的记录行数（*）
        pageList: [10, 25, 50, 100],        //可供选择的每页的行数（*）
        search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
        strictSearch: true,
        showColumns: true,                  //是否显示所有的列
        showRefresh: true,                  //是否显示刷新按钮
        minimumCountColumns: 2,             //最少允许的列数
        clickToSelect: true,                //是否启用点击选中行
        height: 500,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
        uniqueId: "ID",                     //每一行的唯一标识，一般为主键列
        showToggle:true,                    //是否显示详细视图和列表视图的切换按钮
        cardView: false,                    //是否显示详细视图
        detailView: false,                   //是否显示父子表
        columns: [{
            field: 'book_id',
            title: '学号'
        }, {
            field: 'book_name',
            title: '姓名'
        }, {
            field: 'book_author',
            title: '性别'
        }, {
            field: 'book_publisher',
            title: '专业'
        },  
        {
            field: 'book_price',
            title: '價格'
        },
        {
            field: 'book_callnum',
            title: 'callnum'
        },
        {
            field: 'lib_id',
            title: 'lib_id'
        },
        {
            field: 'book_state',
            title: '狀態'
        },
        {
            field: 'lib_name',
            title: 'lib_name'
        },
        {
            field: 'lib_address',
            title: 'address'
        }
        ]
    });
};

//得到查询的参数
oTableInit.queryParams = function (params) {
    var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
        limit: params.limit,   //页面大小
        offset: params.offset,  //页码
        departmentname: $("#txt_search_name").val(),
    };
    return temp;
};
return oTableInit;
};


var ButtonInit = function () {
var oInit = new Object();
var postdata = {};

oInit.Init = function () {
    //初始化页面上面的按钮事件
};

return oInit;
};