define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'area/agentmsg/index',
                    add_url: 'area/agentmsg/add',
                    edit_url: 'area/agentmsg/edit',
                    del_url: 'area/agentmsg/del',
                    multi_url: 'area/agentmsg/multi',
                    table: 'shower_agent',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'agent_id',
                sortName: 'agent_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'agent_id', title: __('Agent_id')},
                        {field: 'agent_name', title: __('Agent_name')},
                        {field: 'admin_id', title: __('Admin_id')},
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