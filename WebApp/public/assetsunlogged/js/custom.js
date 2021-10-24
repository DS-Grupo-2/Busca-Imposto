$(document).ready(function () {
    $(".searchInput")
        .on("input, click", function () {
            const item = $(this).val();
            const customUrl = $(this).attr("url");
            const method = $(this).attr("customInMethod");
            if (method === undefined) {
                method = "GET";
            }
            $.ajax({
                method: method,
                url: customUrl,
                data: {
                    item: item,
                },
                success: function (data, status) {
                    // console.log(data);
                    $(".search-custom li").remove();
                    const obj = JSON.parse(data);
                    var arrayLength = obj.length;
                    var imgPatch = base_url + "/uploads/thumbs/";
                    $(".search-custom").show();

                    for (var i = 0; i < arrayLength; i++) {
                        console.log(obj[i]);
                        dotsBigWords = "";
                        if (obj[i]["NomeProduto"].lenght > 30) {
                            dotsBigWords = "...";
                        }
                        $(".search-custom").append(
                            '<a href="'+base_url+'/product/'+obj[i]["id"]+'"><li class="list-group-item list-group-item-bic">' +
                                '<span class="text-center" >' +
                                '<img src="' +
                                imgPatch +
                                obj[i]["image"] +
                                '" style="height:50px; width:50px" class="rounded" alt="...">' +
                                "</span>" +
                                '<span class="search-item-name-bic">' +
                                obj[i]["NomeProduto"].substring(0, 30) +
                                dotsBigWords +
                                "</span>" +
                                "</li></a>"
                        );
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    /* implementation goes here */
                    console.log(jqXHR, textStatus, errorThrown);
                },
            });
        })
        .change();

    $("#navbar-search-main").on("click", function () {
        //Recebe a url
        //altera o action do form
        //Submete o forms
    });

    $("#navbar-search-main").bind("enterKey", function (e) {
        url = window.location.href;
        $("#navbar-search-main").attr("action", url);
        $("#navbar-search-main").submit();
    });
    $("#navbar-search-main").keyup(function (e) {
        if (e.keyCode == 13) {
            $(this).trigger("enterKey");
        }
    });
    $(document).click(function (event) {
        var $target = $(event.target);
        if (
            !$target.closest(".search-custom").length &&
            $(".search-custom").is(":visible")
        ) {
            $(".search-custom").hide();
        }
    });
});
function dropDownFunction() {
    document.getElementById("mydropcustdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches(".dropcustbtn")) {
        var dropdowns = document.getElementsByClassName("dropcustdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
            }
        }
    }
};
