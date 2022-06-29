$(function() {    
    $('#buscar').on('keyup', function() { 
        let filter = $(this).val().toLowerCase() 
        let type = $('#type-filter').val() 
        $("#table td.col"+type).each(function( index, va ) {
            if ($(this).text().toLowerCase().includes(filter)){
                    $(this).parent().removeClass('disabled') 
            }else{
                if (!$(this).parent().hasClass('disabled')) $(this).parent().addClass('disabled') ;
            }
        })

        if ($("#table tbody").find('tr').not('.disabled').length == 0){
            $('#no-data').removeClass('disabled')
        }else{
            if (!$('#no-data').hasClass('disabled')) $('#no-data').addClass('disabled') ;
        }
    });

});



  

