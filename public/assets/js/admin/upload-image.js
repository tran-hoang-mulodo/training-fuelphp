$('#image-add').hide();
function readURL(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('#image-add').show();
        reader.onload = function (e) {
            $('#image-add')
                .attr('src', e.target.result)
                .width(70)
                .height(50);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
