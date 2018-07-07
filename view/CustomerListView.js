    // customer list rendering method ...
	/**
	 * renders the customer list into given html table container
	 * @param {?json object} c_json_list - the customer list json object array
     * @param {?string} render_container - the container id or class
	 */
    export function renderCustomerList (c_json_list, render_container) {
        var customer = c_json_list[0];
        var columns = [];
        for(var property in customer){
                columns.push({
                    data: property
                })
            }
        if ($.fn.dataTable.isDataTable(render_container)) {
            table = $(render_container).DataTable();
        }
        else {
            $(render_container).DataTable({
                data: c_json_list,
                "processing": true,
                columns: columns,
            });
        }
    }