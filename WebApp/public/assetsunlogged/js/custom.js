$(document).ready(function () {
    $(".searchInput").on('input, click', function () {
        const item = $(this).val();
        const customUrl = $(this).attr('url');
        const method = $(this).attr('customInMethod');
        if(method === undefined){
            method = "GET";
        }
        $.ajax({
            method: method,
            url: customUrl,
            data:{
                'item': item
            },
            success: function (data, status){
                // console.log(data);
                $('.search-custom li').remove();
                const obj = JSON.parse(data);
                var arrayLength = obj.length;
                var imgPatch = base_url + '/uploads/thumbs/';
                $('.search-custom').show();

                for (var i = 0; i < arrayLength; i++) {
                    console.log(obj[i]);
                    dotsBigWords = '';
                    if(obj[i]['NomeProduto'].lenght > 30) { dotsBigWords = '...' };
                    $('.search-custom').append(
                        '<li class="list-group-item list-group-item-bic">'+
                            '<span class="text-center" >'+
                                '<img src="'+imgPatch+obj[i]['image']+'" style="height:50px; width:50px" class="rounded" alt="...">'+
                            '</span>'+
                            '<span class="search-item-name-bic">'+
                            obj[i]['NomeProduto'].substring(0, 30)+dotsBigWords
                            +
                            '</span>'+
                        '</li>'
                    );
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                /* implementation goes here */
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
    }).change();


    $(document).click(function(event) {
        var $target = $(event.target);
        if(!$target.closest('.search-custom').length && $('.search-custom').is(":visible")) {
            $('.search-custom').hide();
        }
    });
});
