define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'area/devicemsg/index',
                    add_url: 'area/devicemsg/add',
                    edit_url: 'area/devicemsg/edit',
                    del_url: 'area/devicemsg/del',
                    multi_url: 'area/devicemsg/multi',
                    table: 'shower_device',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'device_id',
                sortName: 'device_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'device_id', title: __('Device_id')},
                        {field: 'agent_id', title: __('Agent_id')},
                        {field: 'device_name', title: __('Device_name')},
                        {field: 'desc', title: __('Desc')},
                        {field: 'block_id', title: __('Block_id')},
                        {field: 'room_id', title: __('Room_id')},
                        {field: 'cell_id', title: __('Cell_id')},
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