$(function(){

    $("#gridContainer_workfromhome").dxDataGrid({
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
            applyFilter:"auto",
            applyFilterText:"Apply filter",
            betweenEndText:"End",
            betweenStartText:"Start",
            operationDescriptions: {
                between:"Between",
                contains:"Contains",
                endsWith:"Ends with",
                equal:"Equals",
                greaterThan:"Greater than",
                greaterThanOrEqual:"Greater than or equal to",
                lessThan:"Less than",
                lessThanOrEqual:"Less than or equal to",
                notContains:"Does not contain",
                notEqual:"Does not equal",
                startsWith:"Starts with"
            },
            resetOperationText:"Reset",
            showAllText:"",
            showOperationChooser:true,
            visible:true
        },
        columns: [
            {
                dataField: "request_date",
                dataType: "date"
            },
            {
                dataField: "created_at",
                dataType: "date"
            },
            {
				type: "buttons",
                buttons: [
					{
						template: function(element,row){
                            return $('<button id="delete_' + row.data.id + '" type="button" data-id="' + row.data.id + '" class="btn btn-sm btn-danger btn-delete">delete</button>');
						}
					}
				]
            }
        ]
    });
});