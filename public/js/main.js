


    function repaintBadgeCart() {
        var count;
        console.log(count);
        $.ajax({
            url: '/countCart',
            type: "POST",
            data: {
                count: count
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function ($data) {
                $('#badgeCart').text($data);
                console.log('-bandeCatr.text repainted')
            },
            error: function (msg) {
                document.write(msg['responseText']);
            }
        });
    };
