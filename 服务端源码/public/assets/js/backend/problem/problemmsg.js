define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'problem/problemmsg/index',
                    add_url: 'problem/problemmsg/add',
                    edit_url: 'problem/problemmsg/edit',
                    del_url: 'problem/problemmsg/del',
                    multi_url: 'problem/problemmsg/multi',
                    table: 'shower_problem',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'problem_id',
                sortName: 'problem_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'problem_id', title: __('Problem_id')},
                        {field: 'problem_title', title: __('Problem_title')},
                        {field: 'problem_content', title: __('Problem_content')},
                        {field: 'problem_type', title: __('Problem_type')},
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