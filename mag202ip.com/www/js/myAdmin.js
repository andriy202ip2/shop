/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    // <editor-fold defaultstate="collapsed" desc="Users">
    $('.delete-user-button').click(function () {

        var SEL = $('.dialog-message');

        var obj = new Object();
        obj['Id'] = $(this).attr("MyId");

        $.ajax({
            url: '/Admin/UserDell/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                    $("#dialog-message").dialog("open");
                } else {
                    $('.dialog-message').find('[name="message"]').html('User successfully deleted !');
                    $("#dialog-message").dialog("open");
                }
            }
        });

    });

    $('.edit-user-button').click(function () {

        EroreCleaner();

        var SEL = $('.edit-user-data');

        var $arr = ['Id', 'Email', 'Pass', 'Pass2', 'FirstName', 'LastName', 'Money', 'RightsAccess'];
        var obj = FormGetData($arr, SEL);

        $.ajax({
            url: '/Admin/UserEdit/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                } else {

                    $('.dialog-message').find('[name="message"]').html('User successfully Edit !');
                    $("#dialog-message").dialog("open");
                }
            }
        });

    });

    // </editor-fold>


    // <editor-fold defaultstate="collapsed" desc="Categories">

    $('.delete-categori-button').click(function () {

        var SEL = $('.dialog-message');

        var obj = new Object();
        obj['Id'] = $(this).attr("MyId");

        $.ajax({
            url: '/Admin/CategoriDell/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                    $("#dialog-message").dialog("open");
                } else {
                    $('.dialog-message').find('[name="message"]').html('Categori successfully deleted !');
                    $("#dialog-message").dialog("open");
                }
            }
        });
    });

    $('.edit-categori-button').click(function () {

        EroreCleaner();

        var SEL = $('.edit-categori-data');

        var $arr = ['Id', 'Name'];
        var obj = FormGetData($arr, SEL);

        $.ajax({
            url: '/Admin/CategoriEdit/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                } else {

                    if (obj['Id'] > 0) {
                        $('.dialog-message').find('[name="message"]').html('Categori successfully Edit !');
                    } else {
                        $('.dialog-message').find('[name="message"]').html('Categori successfully Add !');
                    }
                    $("#dialog-message").dialog("open");
                }
            }
        });

    });

    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="SubCategories">  

    $('.delete-subcategori-button').click(function () {

        var SEL = $('.dialog-message');

        var obj = new Object();
        obj['Id'] = $(this).attr("MyId");

        $.ajax({
            url: '/Admin/SubCategoriDell/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                    $("#dialog-message").dialog("open");
                } else {
                    $('.dialog-message').find('[name="message"]').html('SubCategori successfully deleted !');
                    $("#dialog-message").dialog("open");
                }
            }
        });

    });

    $('.edit-subcategori-button').click(function () {

        EroreCleaner();

        var SEL = $('.edit-subcategori-data');

        var $arr = ['Id', 'Name', 'CategoriId'];
        var obj = FormGetData($arr, SEL);

        $.ajax({
            url: '/Admin/SubCategoriEdit/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                } else {

                    if (obj['Id'] > 0) {
                        $('.dialog-message').find('[name="message"]').html('SubCategori successfully Edit !');
                    } else {
                        $('.dialog-message').find('[name="message"]').html('SubCategori successfully Add !');
                    }
                    $("#dialog-message").dialog("open");
                }
            }
        });

    });

    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Orders">  
    $('.delete-order-button').click(function () {

        var SEL = $('.dialog-message');

        var obj = new Object();
        obj['Id'] = $(this).attr("MyId");

        $.ajax({
            url: '/Admin/OrderDell/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                    $("#dialog-message").dialog("open");
                } else {
                    $('.dialog-message').find('[name="message"]').html('Order successfully deleted !');
                    $("#dialog-message").dialog("open");
                }
            }
        });

    });

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Products">

    $('.delete-product-button').click(function () {

        var SEL = $('.dialog-message');

        var obj = new Object();
        obj['Id'] = $(this).attr("MyId");

        $.ajax({
            url: '/Admin/ProductDell/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                    $("#dialog-message").dialog("open");
                } else {
                    $('.dialog-message').find('[name="message"]').html('Product successfully deleted !');
                    $("#dialog-message").dialog("open");
                }
            }
        });

    });

    $('.edit-product-button').click(function () {

        EroreCleaner();

        var SEL = $('.edit-product-data');

        var $arr = ['Id', 'Name', 'Count', 'Prise', 'Description', 'Id_categories', 'Id_sub_categories'];
        
        var obj = FormGetData($arr, SEL);

        $.ajax({
            url: '/Admin/ProductEdit/',
            type: 'POST',
            data: obj,
            success: function (resp) {

                var resp = eval('(' + resp + ')');

                if (resp.e != undefined) {
                    EroreAlert(resp, SEL);
                } else {

                    if (obj['Id'] > 0) {
                        $('.dialog-message').find('[name="message"]').html('Product successfully Edit !');
                    } else {
                        $('.dialog-message').find('[name="message"]').html('Product successfully Add !');
                    }
                    $("#dialog-message").dialog("open");
                }
            }
        });

    });

    $('.edit-product-data').find('[name=Id_categories]').change(function () {
        
        var obj = new Object();
                
        obj['Id'] = $(this).val();

        $.ajax({
            url: '/Admin/getAllSubCategoriesByCatId/',
            type: 'POST',
            data: obj,
            success: function (resp) {
                
                $('.edit-product-data').find('[name=Id_sub_categories]').html(resp);
                //alert();
            }
        });
        
    });




//

//
//
//
//
//
//
    // </editor-fold> 

});