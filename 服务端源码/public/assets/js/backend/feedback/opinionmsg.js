define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'feedback/opinionmsg/index',
                    add_url: 'feedback/opinionmsg/add',
                    edit_url: 'feedback/opinionmsg/edit',
                    del_url: 'feedback/opinionmsg/del',
                    multi_url: 'feedback/opinionmsg/multi',
                    table: 'shower_opinion',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'opinion_id',
                sortName: 'opinion_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'opinion_id', title: __('Opinion_id')},
                        {field: 'opinion_name', title: __('Opinion_name')},
                        {field: 'opinion_desc', title: __('Opinion_desc')},
                        {field: 'create_time', title: __('Create_time'), formatter: Table.api.formatter.datetime},
                        {field: 'opinion_type', title: __('Opinion_type')},
                        {field: 'user_id', title: __('User_id')},
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