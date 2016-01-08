/**
 * Function to allow showing of flash messages from JS
 *
 * @param json  json object containing information
 */
function show_flash(json) {
    container = $('#flash-message');

    html = $(document.createElement('div'));
    html.addClass('alert');

    if(json.success == true) {
        html.addClass('alert-success');
    } else {
        html.addClass('alert-danger');
    }

    html.append('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
    html.append(json.message);

    container.html(html);
}
