$("#displayCust").click(function(){
  $.post("/model/customer/fetchCustomers", function(result){
    $("#custTable").append(result);
  }, 'json');
});
