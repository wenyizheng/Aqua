define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'feedback/orderproblemmsg/index',
                    add_url: 'feedback/orderproblemmsg/add',
                    edit_url: 'feedback/orderproblemmsg/edit',
                    del_url: 'feedback/orderproblemmsg/del',
                    multi_url: 'feedback/orderproblemmsg/multi',
                    table: 'shower_orderproblem',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'op_id',
                sortName: 'op_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'op_id', title: __('Op_id')},
                        {field: 'op_name', title: __('Op_name')},
                        {field: 'openid', title: __('Openid')},
                        {field: 'order_id', title: __('Order_id')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'block_id', title: __('Block_id')},
                        {field: 'room_id', title: __('Room_id')},
                        {field: 'cell_id', title: __('Cell_id')},
                        {field: 'device_id', title: __('Device_id')},
                        {field: 'agent_id', title: __('Agent_id')},
                        {field: 'op_desc', title: __('Op_desc')},
                        {field: 'op_type', title: __('Op_type')},
                        {field: 'create_time', title: __('Create_time'), formatter: Table.api.formatter.datetime},
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