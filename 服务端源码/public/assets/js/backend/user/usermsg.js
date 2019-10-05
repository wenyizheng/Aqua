define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'user/usermsg/index',
                    add_url: 'user/usermsg/add',
                    edit_url: 'user/usermsg/edit',
                    del_url: 'user/usermsg/del',
                    multi_url: 'user/usermsg/multi',
                    table: 'fa_shower_user',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'user_id',
                sortName: 'user_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'nickname', title: __('Nickname')},
                        {field: 'openid', title: __('Openid')},
                        {field: 'sex', title: __('Sex')},
                        {field: 'headimgurl', title: __('Headimgurl'), formatter: Table.api.formatter.url},
                        {field: 'money', title: __('Money')},
                        {field: 'credit', title: __('Credit')},
                        {field: 'user_key', title: __('User_key')},
                        {field: 'room_name', title: __('Room_name')},
                        {field: 'block_name', title: __('Block_name')},
                        {field: 'tel', title: __('Tel')},
                        {field: 'integral', title: __('Integral')},
                        {field: 'operate', title: __('Operate'), events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});