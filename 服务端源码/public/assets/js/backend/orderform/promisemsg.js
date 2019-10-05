define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'orderform/promisemsg/index',
                    add_url: 'orderform/promisemsg/add',
                    edit_url: 'orderform/promisemsg/edit',
                    del_url: 'orderform/promisemsg/del',
                    multi_url: 'orderform/promisemsg/multi',
                    table: 'shower_promise',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'promise_id',
                sortName: 'promise_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'promise_id', title: __('Promise_id')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'block_id', title: __('Block_id')},
                        {field: 'room_id', title: __('Room_id')},
                        {field: 'cell_id', title: __('Cell_id')},
                        {field: 'begin_time', title: __('Begin_time'), formatter: Table.api.formatter.datetime},
                        {field: 'end_time', title: __('End_time'), formatter: Table.api.formatter.datetime},
                        {field: 'expire_time', title: __('Expire_time'), formatter: Table.api.formatter.datetime},
                        {field: 'status', title: __('Status'), formatter: Table.api.formatter.status},
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