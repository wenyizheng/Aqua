define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'orderform/ordermsg/index',
                    add_url: 'orderform/ordermsg/add',
                    edit_url: 'orderform/ordermsg/edit',
                    del_url: 'orderform/ordermsg/del',
                    multi_url: 'orderform/ordermsg/multi',
                    table: 'shower_order',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'order_id',
                sortName: 'order_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'order_id', title: __('Order_id')},
                        {field: 'order_sn', title: __('Order_sn')},
                        {field: 'use_time', title: __('Use_time'), formatter: Table.api.formatter.datetime},
                        {field: 'begin_time', title: __('Begin_time'), formatter: Table.api.formatter.datetime},
                        {field: 'end_time', title: __('End_time'), formatter: Table.api.formatter.datetime},
                        {field: 'order_status', title: __('Order_status'), formatter: Table.api.formatter.status},
                        {field: 'pay_status', title: __('Pay_status'), formatter: Table.api.formatter.status},
                        {field: 'refund_sn', title: __('Refund_sn')},
                        {field: 'refund_status', title: __('Refund_status'), formatter: Table.api.formatter.status},
                        {field: 'coupon_sn', title: __('Coupon_sn')},
                        {field: 'price', title: __('Price')},
                        {field: 'total_money', title: __('Total_money')},
                        {field: 'amount', title: __('Amount')},
                        {field: 'deduction_amount', title: __('Deduction_amount')},
                        {field: 'refund_money', title: __('Refund_money')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'block_id', title: __('Block_id')},
                        {field: 'room_id', title: __('Room_id')},
                        {field: 'cell_id', title: __('Cell_id')},
                        {field: 'create_time', title: __('Create_time'), formatter: Table.api.formatter.datetime},
                        {field: 'dosage', title: __('Dosage')},
                        {field: 'coupon_id', title: __('Coupon_id')},
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