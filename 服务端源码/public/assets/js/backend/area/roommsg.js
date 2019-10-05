define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'area/roommsg/index',
                    add_url: 'area/roommsg/add',
                    edit_url: 'area/roommsg/edit',
                    del_url: 'area/roommsg/del',
                    multi_url: 'area/roommsg/multi',
                    table: 'shower_room',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'room_id',
                sortName: 'room_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'room_id', title: __('Room_id')},
                        {field: 'agent_id', title: __('Agent_id')},
                        {field: 'room_name', title: __('Room_name')},
                        {field: 'block_id', title: __('Block_id')},
                        {field: 'available_sex', title: __('Available_sex')},
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