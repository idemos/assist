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
                caption: "user",
                dataField: "user[name]",
                dataType: "string"
            },
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
                            console.log(row.data.status);
                            btn = '<button id="delete_' + row.data.id + '" type="button" data-id="' + row.data.id + '" class="btn btn-sm btn-danger btn-delete">delete</button>';
                            
                            if(row.data.status == 0){
                                btn+= ' <button id="pending_' + row.data.id + '" type="button" data-id="' + row.data.id + '" class="btn btn-sm btn-warning btn-pending">pending</button>';
                            }else if(row.data.status == 1){
                                btn+= ' <button id="accepted_' + row.data.id + '" type="button" data-id="' + row.data.id + '" class="btn btn-sm btn-success">success</button>';
                            }else if(row.data.status == 2){
                                btn+= ' <button id="refused_' + row.data.id + '" type="button" data-id="' + row.data.id + '" class="btn btn-sm btn-danger">refused</button>';
                            }
                            return $(btn);
						}
					}
				]
            }
        ]
    });
});