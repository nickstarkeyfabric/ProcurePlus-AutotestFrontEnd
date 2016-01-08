$(document).ready(function() {
    $('.active-toggle').each(function() {
        var curbut = $(this);

        curbut.on("click", function() {
            curbut.addClass("btn-warning");

            $.ajax({
              url: "/test_groups/ajax_toggle_test_active/" + curbut.data("test-id"),
              cache: false,
              dataType: "json"
            }).done(function(data) {
              if(data.success == true) {
                  curbut.removeClass("btn-warning").toggleClass("btn-success").toggleClass("btn-danger");

                  if(curbut.hasClass("btn-success")) {
                      curbut.text("YES");
                  } else {
                      curbut.text("NO");
                  }
              } else {
                  curbut.removeClass("btn-warning");
              }
              
              show_flash(data);
            });
        });
    });
});
