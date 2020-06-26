$(function () {
    $(".item_product").slice(0, 3).show();
    $("#load").on('click', function (e) {
        e.preventDefault();
        $(".item_product:hidden").slice(0, 5).slideDown();
        if ($(".item_product:hidden").length == 0) {
            $("#load").fadeOut('slow');
            
        }

    });
});

let cate = document.getElementById('cate');
let cateVal = document.getElementById('cateValue');
cate.addEventListener('click', myFucntion);

function myFucntion() {
    $("#cateId").slice(0, 3).show();
    $("#load").on('click', function (e) {
        e.preventDefault();
        $("#cateId:hidden").slice(0, 5).slideDown();
        if ($("#cateId:hidden").length == 0) {
            $("#load").fadeOut('slow');
            
        }
    });
}