$('document').ready(
    function addToCart(id){
    console.log("sfsdf");
        $('#addToCart').click(function() {
            console.log(window.location.pathname.slice(-2,window.location.pathname.length));
            $.ajax('/addToCart',{
                type: 'POST',
                dataType: 'json',
                data: {id: 23}
            });
        });
    }
);