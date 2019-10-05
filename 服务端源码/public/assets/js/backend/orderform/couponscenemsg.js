define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'orderform/couponscenemsg/index',
                    add_url: 'orderform/couponscenemsg/add',
                    edit_url: 'orderform/couponscenemsg/edit',
                    del_url: 'orderform/couponscenemsg/del',
                    multi_url: 'orderform/couponscenemsg/multi',
                    table: 'fa_shower_coupon_scene',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'scene_id',
                sortName: 'scene_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'scene_id', title: __('Scene_id')},
                        {field: 'scene_sn', title: __('Scene_sn')},
                        {field: 'channel_id', title: __('Channel_id')},
                        {field: 'channel_sn', title: __('Channel_sn')},
                        {field: 'title', title: __('Title')},
                        {field: 'slug', title: __('Slug')},
                        {field: 'desc', title: __('Desc')},
                        {field: 'scene_type', title: __('Scene_type')},
                        {field: 'scope', title: __('Scope')},
                        {field: 'limit', title: __('Limit')},
                        {field: 'agent_id', title: __('Agent_id')},
                        {field: 'block_id', title: __('Block_id')},
                        {field: 'room_id', title: __('Room_id')},
                        {field: 'cell_id', title: __('Cell_id')},
                        {field: 'device_id', title: __('Device_id')},
                        {field: 'condition', title: __('Condition')},
                        {field: 'begin_time', title: __('Begin_time'), formatter: Table.api.formatter.datetime},
                        {field: 'end_time', title: __('End_time'), formatter: Table.api.formatter.datetime},
                        {field: 'available_begin_time', title: __('Available_begin_time'), formatter: Table.api.formatter.datetime},
                        {field: 'available_end_time', title: __('Available_end_time'), formatter: Table.api.formatter.datetime},
                        {field: 'scene_status', title: __('Scene_status'), formatter: Table.api.formatter.status},
                        {field: 'create_time', title: __('Create_time'), formatter: Table.api.formatter.datetime},
                        {field: 'discount', title: __('Discount')},
                        {field: 'fulldown_full', title: __('Fulldown_full')},
                        {field: 'fulldown_down', title: __('Fulldown_down')},
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