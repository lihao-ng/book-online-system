$(function () {
    console.log("entered js");

    $('#collectionType').on('change', function() {
        console.log("inside function");
        opt = $(this).val();
        if (opt == "selfCollection") {
            console.log("selfCollection");
            $('#selfCollectionSelected').show();
        }else if (opt == "delivery") {
            console.log("delivery");
            $('#selfCollectionSelected').hide();
        }
    });
});