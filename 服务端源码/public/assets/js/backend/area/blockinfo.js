define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'area/blockinfo/index',
                    add_url: 'area/blockinfo/add',
                    edit_url: 'area/blockinfo/edit',
                    del_url: 'area/blockinfo/del',
                    multi_url: 'area/blockinfo/multi',
                    table: 'shower_block',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'block_id',
                sortName: 'block_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'block_id', title: __('Block_id')},
                        {field: 'agent_id', title: __('Agent_id')},
                        {field: 'block_name', title: __('Block_name')},
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