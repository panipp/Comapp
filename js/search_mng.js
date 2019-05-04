var data = [{
  "id": 1,
  "pj_id": "0001",
    "Name": "XXXXX XXXXX XXXXX",
   "area": "Northern"
}, {
  "id": 2,
  "pj_id": "0002",
        "Name": "YYYYY YYYYY YYYYY",
  "area": "Northern"
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
    $('.table').append('<tr><td>' + elem['pj_id'] +
        '</td><td>' + elem['Name'] + '</td><td>' +
        elem['area'] + '</td><td>' +
    '\
<a href="#edit=' + elem['id'] + '"data-target="modal1" class="btn-floating waves-effect waves-light orange btn modal-trigger"><i class="material-icons">edit</i>\
    </a> \
<a href="#delete=' + elem['id'] + '" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i>\
    </a> \
                     </td></tr>')
});

// Delete Button Done!!!
$('.btn-floating.red').on('click', function(){
  $(this).parents('tr').remove();
})