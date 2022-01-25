<script>
    ;(function ($) {
        var mainUploadBtn = '';

        //after select image
        $(document).on('click','.media_upload_modal_submit_btn',function (e) {
            e.preventDefault();
            var allData = $('.media-uploader-image-list li.selected');
            if( typeof allData != 'undefined'){
                mainUploadBtn.parent().find('.img-wrap').html('');
                var imageId = '';
                $.each(allData,function(index,value){
                    var el = $(this).data();
                    var separator = allData.length == index ? '' : '|';
                    imageId += el.imgid + separator;
                    mainUploadBtn.prev('input').attr('data-imgsrc',el.imgsrc);
                    mainUploadBtn.parent().find('.img-wrap').append('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img src="'+el.imgsrc+'"></div></div></div>');
                });
                 mainUploadBtn.prev('input').val(imageId.substring(0,imageId.length -1));

            }
            $('#media_upload_modal').modal('hide');
            $('.media_upload_form_btn').text('Change Image');
        });


        //delete image form media uploader
        $(document).on('click','.media_library_image_delete_btn',function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{route('admin.upload.media.file.delete')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    img_id : $('.img-meta .image_id').text()
                },
                success: function (data) {
                    $('.media-uploader-image-info a,.media-uploader-image-info .img-meta').hide();
                    $('.media-uploader-image-list li.selected').remove();
                    $('.media-uploader-image-info .img-wrapper img').attr('src','');
                    $('.media-uploader-image-info .img-info .img-title').text('');
                },
                error: function (error) {

                }
            });

        });


        $(document).on('click','.media_upload_form_btn',function (e) {
            e.preventDefault();

            var parent = $('#media_upload_modal');
            var el = $(this);
            var imageId = el.prev('input').val();
            mainUploadBtn = el;

            parent.find('.media_upload_modal_submit_btn').text(el.data('btntitle'));
            parent.find('.modal-title').text(el.data('modaltitle'));

            if(el.data('mulitple')){
                parent.attr('data-mulitple','true')
            }else{
                parent.removeAttr('data-mulitple');
            }

            if(imageId =! ''){
                $('#load_all_media_images').trigger('click');
            }

        });

        $('body').on('click', '.media-uploader-image-list > li', function (e) {
            e.preventDefault();
            var el = $(this);
            var allData = el.data();

            if( typeof $('#media_upload_modal').attr('data-mulitple') == 'undefined'){
                el.toggleClass('selected').siblings().removeClass('selected');
            }else{
                el.toggleClass('selected');
            }

            $('.media-uploader-image-info a,.media-uploader-image-info .img-meta').show();

            var parent = $('.img-meta');
            parent.children('.date').text(allData.date);
            parent.children('.dimension').text(allData.dimension);
            parent.children('.size').text(allData.size);
            parent.children('.imgsrc').text(allData.imgsrc);
            parent.children('.image_id').text(allData.imgid);
            $('.img-info .img-title').text(allData.title)
            $('.media-uploader-image-info .img-wrapper img').attr('src',allData.imgsrc);
        });

        Dropzone.options.placeholderfForm = {
            dictDefaultMessage: "Drag or Select Your Image",
            maxFiles: 50,
            maxFilesize: 10, //MB
            acceptedFiles: 'image/*',
            success: function (file, response) {
                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
                $('#load_all_media_images').trigger('click');
                $('.media-uploader-image-list li:first-child').addClass('selected');
            },
            error: function (file, message) {
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if ((typeof message !== "String") && message.error) {
                        message = message.error;
                    }
                    for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                        node.textContent = message.errors.file[0];
                    }
                }
            }
        };


        $(document).on('click', '#upload_media_image', function (e) {
            e.preventDefault();
            $('.media_upload_modal_submit_btn').hide();
        });


        $(document).on('click', '#load_all_media_images', function (e) {
            e.preventDefault();
            loadAllImages();
        });

        function loadAllImages() {
            $.ajax({
                type: "POST",
                url: "{{route('admin.upload.media.file.all')}}",
                data: {
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    $('.media-uploader-image-list').html('');
                    $.each(data,function (index,value) {

                        $('.media-uploader-image-list').append('<li data-date="'+value.upload_at+'" data-imgid="'+value.image_id+'" data-imgsrc="'+value.img_url+'" data-size="'+value.size+'" data-dimension="'+value.dimensions+'" data-title="'+value.title+'">\n' +
                            '<div class="attachment-preview">\n' +
                            '<div class="thumbnail">\n' +
                            '<div class="centered">\n' +
                            '<img src="'+value.img_url+'" alt="">\n' +
                            '</div>\n' +
                            '</div>\n' +
                            '</div>\n' +
                            '</li>');

                    });
                    hidePreloader();
                    $('.media_upload_modal_submit_btn').show();
                    selectOldImage();
                },
                error: function (error) {

                }
            });
        }


        /**
         * hide preloader
         * @since 2.2
         * */
        function hidePreloader() {
            $('.image-preloader-wrapper').hide(300);
        }

        /**
         * Select preveiously selected image
         * @since 2.2
         * */
        function selectOldImage(){
            var imageId = mainUploadBtn.prev('input').val();
            var matches = imageId.match(/([|])/g);
            if(matches != null){
                var imgArr = imageId.split('|');
                var filtered = imgArr.filter(function (el) {
                    return el != "";
                });
                $.each(filtered,function(index,value){
                    $('.media-uploader-image-list li[data-imgid="'+value+'"]').trigger('click');
                });
            }else{
                $('.media-uploader-image-list li[data-imgid="'+imageId+'"]').trigger('click').siblings().removeClass('selected');
            }

        }
    })(jQuery);
</script>
