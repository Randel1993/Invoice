$(document).ready(function(){
    show_invoice(); //call function show all invoice
    getCustomer();
    getProduct();      
    //function show all invoice
    function show_invoice(){
        $.ajax({
            type  : 'ajax',
            url   : '/Invoice/invoice/invoice_data',
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                            '<td>'+data[i].invoice_code+'</td>'+
                            '<td>'+data[i].customer_id+'</td>'+
                            '<td style="text-align:right;">'+
                                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-invoice_code="'+data[i].invoice_code+'">Edit</a>'+' '+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-invoice_code="'+data[i].invoice_code+'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

    function getCustomer(){
        $.ajax({
            type  : 'ajax',
            url   : '/Invoice/invoice/getCustomer',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += "<option value='" + data[i].customer_id+ "'>" + data[i].customer_id +" - "+ data[i].customer_name + "</option>";
                }
                $('#customer_id').html(html);
            }

        });
    }

    function getProduct(){
        $.ajax({
            type  : 'ajax',
            url   : '/Invoice/invoice/getProduct',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += "<option value='" + data[i].product_code+ "'>" + data[i].product_code +" - "+ data[i].product_name + "</option>";
                }
                $('#product_select').html(html);
            }

        });
    }

    function getDetailList(invoice_code){
        $.ajax({
            type  : 'POST',
            url   : '/Invoice/invoice/getDetailList',
            async : true,
            dataType : 'json',
            data: {invoice_code: invoice_code},
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                            '<td>'+data[i].product_code+'</td>'+
                            '<td>'+data[i].quantity+'</td>'+
                            '<td style="text-align:right;">'+
                                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-invoice_code="'+data[i].invoice_code+'" data-product_code="'+data[i].product_code+'"  data-quantity="'+data[i].quantity+'">Edit</a>'+' '+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-invoice_code="'+data[i].invoice_code+'" data-product_code="'+data[i].product_code+'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                }
                $('#order_list').html(html);
            }

        });
    }

    function saveDetail(invoice_code, product_code, quantity){
        $.ajax({
            type  : 'POST',
            url   : '/Invoice/invoice/saveDetail',
            async : true,
            dataType : 'JSON',
            data: {invoice_code: invoice_code, product_code: product_code, quantity: quantity},
            success : function(data){
               $('#Modal_Order').modal("hide");
               getDetailList(invoice_code);
               $('#quantity').val('');
            }

        });
    }

    //Save invoice?
    $('#btn_save').on('click',function(){
        var customer_id = $('#customer_id').val();
        $.ajax({
            type : "POST",
            url  : "/Invoice/invoice/save",
            dataType : "JSON",
            data : {customer_id:customer_id},
            success: function(data){
                $('#Modal_Add').modal("hide");
                $('#Modal_Order_List').modal("show");
                var invoice_code = data;
                $('#inv_code').html(invoice_code);
                $('#invoice_code_save').val(invoice_code);
        
                getDetailList(invoice_code);
                show_invoice();
            }
        });
        return false;
    });

    $('#btn_save_order').on('click',function(){
        var invoice_code = $('#invoice_code_save').val();
        var product_code = $('#product_select').val();
        var quantity = $('#quantity').val();
        
        saveDetail(invoice_code, product_code, quantity);
        return false;
    });

    //get data for update record
    $('#show_data').on('click','.item_edit',function(){
        $('#Modal_Order_List').modal("show");
        var invoice_code = $(this).data('invoice_code');
        $('#inv_code').html(invoice_code);
        $('#invoice_code_save').val(invoice_code);

        getDetailList(invoice_code);
    });

    //get data for update record
    $('#order_list').on('click','.item_edit',function(){
        var product_code = $(this).data('product_code');
        var quantity = $(this).data('quantity');
        $('#product_select').val(product_code);
        $('#quantity').val(quantity);

        isAdd = false;
        $('#Modal_Order').modal('show');
    });

    //get data for delete record
    $('#show_data').on('click','.item_delete',function(){
        var invoice_code = $(this).data('invoice_code');
         
        $('#Modal_Delete').modal('show');
        $('[name="invoice_code_delete"]').val(invoice_code);
    });

    //delete record to database
     $('#btn_delete').on('click',function(){
        var invoice_code = $('#invoice_code_delete').val();
        $.ajax({
            type : "POST",
            url  : "/Invoice/invoice/delete",
            dataType : "JSON",
            data : {invoice_code:invoice_code},
            success: function(data){
                $('[name="invoice_code_delete"]').val("");
                $('#Modal_Delete').modal('hide');
                show_invoice();
            }
        });
        return false;
    });

    //get data for delete record
    $('#order_list').on('click','.item_delete',function(){
        var invoice_code = $('#invoice_code_save').val();
        var product_code = $(this).data('product_code');
        $.ajax({
            type : "POST",
            url  : "/Invoice/invoice/deleteDetail",
            dataType : "JSON",
            data : {invoice_code:invoice_code, product_code:product_code},
            success: function(data){
                getDetailList(invoice_code);
            }
        });
        return false;
    });
});