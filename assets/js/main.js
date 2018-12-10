/*
 *  John Richard S. Quitaneg
 *  Email: johnrichardq@gmail.com
 *  Date Created: 08/17/2018
 *  Copyright 2018
 */

var rowCount = 2;
$(document).ready(function() {
    $('#add_row').click(function() {
        add_row();
    });
    load_sku();
    load_cust();
});

function add_row(){
    var recRow = '<div id="rowcount'+rowCount+'"> ' +
        '<div class="row" style="padding: 0 10px 0 10px;">' +
        '<div class="col-xs-1 no-padding">' +
        '<input type="text" name="no'+rowCount+'" id="no'+rowCount+'" value="0000'+rowCount+'" class="form-control round-input input-sm">' +
        '</div>' +
        '<div class="col no-padding">' +
        '<select name="sku'+rowCount+'" id="sku'+rowCount+'" class="form-control round-input input-sm" placeholder="SKU"></select>' +
        '</div>' +
        '<div class="col no-padding">' +
        '<input type="text" class="form-control round-input input-sm" placeholder="Description">' +
        '</div>' +
        '<div class="col-xs-1 no-padding">' +
        '<input type="number" name="qty_exp'+rowCount+'" id="qty_exp'+rowCount+'" class="form-control round-input input-sm" placeholder="Qty Expected">' +
        '</div>' +
        '<div class="col-xs-1 no-padding">' +
        '<input type="number" name="qty_rcv'+rowCount+'" id="qty_rcv'+rowCount+'" class="form-control round-input input-sm" placeholder="Qty Receive">' +
        '</div>' +
        '<div class="col-xs-1 no-padding">' +
        '<input type="text" name="uom'+rowCount+'" id="uom'+rowCount+'" class="form-control round-input input-sm" placeholder="Unit of Measurement">' +
        '</div>' +
        '<div class="col no-padding">' +
        '<input type="text" name="pid'+rowCount+'" id="pid'+rowCount+'" class="form-control round-input input-sm" placeholder="Pallet ID">' +
        '</div>' +
        '<div class="col no-padding">' +
        '<input type="text" name="batch_lot'+rowCount+'" id="batch_lot'+rowCount+'" class="form-control round-input input-sm" placeholder="Batch No/Lot No">' +
        '</div>' +
        '<div class="col no-padding">' +
        '<input type="text" name="exp_date'+rowCount+'" id="exp_date'+rowCount+'" class="form-control round-input input-sm" placeholder="Expiry Date">' +
        '</div>' +
        '<div class="no-padding">' +
        '<a id="x'+rowCount+'" onclick="removeRow('+rowCount+')" class=""><i class="fa fa-times-circle" style="color: red"></i></a>' +
        '</div>' +
        '<div class="no-padding" style="display: none;" id="spacer'+rowCount+'"> ' +
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' +
        '</div>' +
    '</div></div>';
    rcount(rowCount);
    $('#rowcount').val(rowCount);
    jQuery('#addedRows').append(recRow);
    load_sku('#sku'+ rowCount);
    rowCount ++;
}

function load_sku(id = '#sku')
{
    $.ajax({
        url : base_url + "SKU/get_sku",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var options = '';
            for (var x = 0; x < data.length; x++) {
                options += '<option value = "' + data[x]['sku'] + '">' + data[x]['sku'] + '</option>';
            }
            $(id).html(options);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get account list from ajax');
        }
    });
}

function load_cust()
{
    $.ajax({
        url : base_url + "Customer/get_cust",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var options = '';
            for (var x = 0; x < data.length; x++) {
                options += '<option value = "' + data[x]['customerkey'] + '">' + data[x]['name'] + '</option>';
            }
            $('#customer').html(options);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get account list from ajax');
        }
    });
}

function rcount(rowc,rem = 0){
    if (rowCount>1){
        $('#x'+(rowc-1)).hide();
        $('#spacer'+(rowc-1)).show();
        if(rem==1){
            $('#x'+ (rowc-2)).show('slow');
            $('#spacer'+(rowc-2)).hide();
        }
    }
    if (rowc>14){
        $('#add_row').prop('disabled', true);
    }
    else{
        $('#add_row').prop('disabled', false);
    }
}
function removeRow(removeNum) {
    $('#rowcount'+removeNum).remove();
    rcount(rowCount,1);
    $('#rowcount').val(rowCount-2);
    rowCount--;
}

$(".panel-top").resizable({
    handleSelector: ".splitter-horizontal",
    resizeWidth: false
});

$(window).bind('resize', function() {
    if($(window).width() < 1255){
        //alert($(window).width());
        $('.labeler').hide();
    }else{
        $('.labeler').show();
    }
});