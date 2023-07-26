$(function(){
    $('table').DataTable();
})

//Ajouter une facture
$('#create').on('click', function(e){
    let formOrder=$('#formOrder')
    if(formOrder[0].checkValidity()){
        e.preventDefault();
        $ajax({
            url: 'process.php',
            type: 'post',
            data: formOrder.serialize() + '&action=create', 
            success: function(response){
                console.log(response);
            }
        })
    }
})