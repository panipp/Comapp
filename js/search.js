var data = [{
  "id": 1,
  "Emp_id": "XXXX",
  "Name": "XXXXX XXXXXXX",
  "dep": "Manager"
}, {
  "id": 2,
  "Emp_id": "YYYY",
  "Name": "YYYYY YYYYYYY",
  "dep": "Manager"
}];
 $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
   
    Materialize.updateTextFields();
  });
/* 
Dynamic creation of table is not the best practice...
Better way to clone existing table and fill it with data.
*/
$(data).each(function(i, elem) {
    $('.table').append('<tr><td>' + elem['Emp_id'] +
        '</td><td>' + elem['Name'] + '</td><td>' +
    elem['dep'] + '</td><td>')
});

// Delete Button Done!!!
$('.btn-floating.red').on('click', function(){
  $(this).parents('tr').remove();
})