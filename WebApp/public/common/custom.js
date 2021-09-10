$('document').ready(function(){
    $(".delete-btn-w-after").on("click", function (e) {
        e.preventDefault();
        url = $(this).attr("shref");
        method = $(this).attr("mthod");

        console.log(url);
        Swal.fire({
          title: "Você tem certeza",
          text: "Você nao será capaz de desfazer esta ação",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sim, deletar!",
        }).then((result) => {
          if (result.isConfirmed) {
            var request = $.ajax({
              url: url,
              type: method,
              dataType: "html",
            });

            request.done(function (msg) {
              $("#log").html(msg);
            });

            request.fail(function (jqXHR, textStatus) {
              alert("Request failed: " + textStatus);
            });

            Swal.fire("Deletado!", "Item deletado.", "success").then(() => {
              location.reload();
            });
          }
        });
      });
});


