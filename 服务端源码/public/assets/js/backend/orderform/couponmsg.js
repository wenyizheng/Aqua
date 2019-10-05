define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'orderform/couponmsg/index',
                    add_url: 'orderform/couponmsg/add',
                    edit_url: 'orderform/couponmsg/edit',
                    del_url: 'orderform/couponmsg/del',
                    multi_url: 'orderform/couponmsg/multi',
                    table: 'fa_shower_coupon',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'coupon_id',
                sortName: 'coupon_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'coupon_id', title: __('Coupon_id')},
                        {field: 'coupon_sn', title: __('Coupon_sn')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'channel_id', title: __('Channel_id')},
                        {field: 'add_time', title: __('Add_time'), formatter: Table.api.formatter.datetime},
                        {field: 'expire_time', title: __('Expire_time'), formatter: Table.api.formatter.datetime},
                        {field: 'use_time', title: __('Use_time'), formatter: Table.api.formatter.datetime},
                        {field: 'scene_id', title: __('Scene_id')},
                        {field: 'scene_sn', title: __('Scene_sn')},
                        {field: 'type', title: __('Type')},
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