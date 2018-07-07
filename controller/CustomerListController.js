import {renderCustomerList} from '../view/CustomerListView.js';
$(document).ready(function(){
    $('#btnLoad').click(function(){
        $(this).val('Loading...');
        $.post(window.location.href.match(/^.*\//) + '/CustomerService/CustomerService.php',)
            .done(function(data) { 
                    var jsonObj = JSON.parse(data);
                    renderCustomerList(jsonObj, '#table');
                }).fail(function(jqxhr, settings, ex) { 
                      console.log('failed, ' , jqxhr);
                      $('#table').html("No data found..!!");
                });
    });
    $('#buttonImport').click(function(){
        $(this).val('Loading...');
        $.post(window.location.href.match(/^.*\//) + '/CustomerService/CustomerImportService.php',)
            .done(function(data) { 
                    alert("Successfully Imported data..!!");
                }).fail(function(jqxhr, settings, ex) { 
                    alert(failed, + jqxhr); 
                });
    });
});