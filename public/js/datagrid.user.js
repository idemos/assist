$(function () {

    $("#gridContainer_user").dxDataGrid({
        allowColumnReordering: true,
        rowAlternationEnabled: true,
        showBorders: true,
        selection: {
            mode: "single"
        },
        scrolling: {
            mode: "virtual"
        },
        hoverStateEnabled: true,
        searchPanel: {
            visible: false,
            highlightCaseSensitive: true
        },
        filterRow: {
            applyFilter: "auto",
            applyFilterText: "Apply filter",
            betweenEndText: "End",
            betweenStartText: "Start",
            operationDescriptions: {
                between: "Between",
                contains: "Contains",
                endsWith: "Ends with",
                equal: "Equals",
                greaterThan: "Greater than",
                greaterThanOrEqual: "Greater than or equal to",
                lessThan: "Less than",
                lessThanOrEqual: "Less than or equal to",
                notContains: "Does not contain",
                notEqual: "Does not equal",
                startsWith: "Starts with"
            },
            resetOperationText: "Reset",
            showAllText: "",
            showOperationChooser: true,
            visible: true
        },
        columns: [
            {
                dataField: "name",
                dataType: "string"
            },
            {
                dataField: "email",
                dataType: "string"
            },
            {
                dataField: "type",
                dataType: "string",
                cellTemplate: function (container, options) {

                    $("<div>")
                        .append(options.value == 1 ? 'admin' : 'user')
                        .appendTo(container);
                }
            },
            {
                dataField: "created_at",
                dataType: "date"
            },
            {
                type: "buttons",
                buttons: [
                    {
                        template: function (element, row) {
                            return $('<button id="edit_' + row.data.id + '" type="button" data-id="' + row.data.id + '" class="btn btn-sm btn-secondary btn-edit">edit</button> <button id="delete_' + row.data.id + '" type="button" data-id="' + row.data.id + '" class="btn btn-sm btn-danger btn-delete">delete</button> <button id="task_sync_' + row.data.id + '" type="button" data-id="' + row.data.id + '" class="btn btn-sm btn-success btn-task-sync">tasks</button>');
                        }
                    }
                ]
            }

        ],
        /*
        onSelectionChanged: function (selectedItems) {
            var data = selectedItems.selectedRowsData[0];
            if(data) {
                //console.dir(data);
                $("#gridContainer_sub").show().dxDataGrid('instance').option("dataSource","data.js?id="+data.id);
            }
        }
        */
    });
});

$(document).on('click', "#gridContainer_user .btn-edit", function (obj) {
    const url_edit = data.url_edit.replace(':id', $(this).data('id'));
    document.location.href = url_edit;
    console.log('data-id', $(this).data('id'));
});

$(document).on('click', ".btn-task-sync", function (obj) {
    const url_task_sync = data.url_task_sync.replace(':id', $(this).data('id'));
    document.location.href = url_task_sync;
    console.log('url_task_sync-id', url_task_sync);
});


