(function($) {
    $('textarea[data-editor="summernote"]').summernote({
        height: 300,
        onImageUpload: function(files) {
            uploadFiles(this, files);
        }
    });

    function uploadFiles(editor, files) {
        var data = new FormData();

        for (var i = 0; i < files.length; i++) {
            data.append('file', files[i]);

            $.ajax({
                url: '/admin/uploads/store',
                method: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function (json) {
                    if (json['success']) {
                        editor.summernote('insertImage', json['success'], function($image) {
                            $image.attr('src', json['success']);
                        });
                    }
                }
            });
        }
    }
})(jQuery);