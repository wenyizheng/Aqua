define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'base/baseconfig/index',
                    add_url: 'base/baseconfig/add',
                    edit_url: 'base/baseconfig/edit',
                    del_url: 'base/baseconfig/del',
                    multi_url: 'base/baseconfig/multi',
                    table: 'shower_baseconfig',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'config_id',
                sortName: 'config_id',
                columns: [
                    [
                                                {field: 'cost_money', title: __('Cost_money')},
{checkbox: true},
                        {field: 'config_id', title: __('Config_id')},
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