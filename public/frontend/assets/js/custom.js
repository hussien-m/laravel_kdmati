/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */

!(function ($) {
    'use strict';

    // Global Onyx object
    var Onyx = Onyx || {};

    Onyx = {
        /**
         * Fire all functions
         */
        init: function () {
            var self = this,
                obj;

            for (obj in self) {
                if (self.hasOwnProperty(obj)) {
                    var _method = self[obj];
                    if (_method.selector !== undefined && _method.init !== undefined) {
                        if ($(_method.selector).length > 0) {
                            _method.init();
                        }
                    }
                }
            }
        },

        /**
         * Files upload
         */
        userFilesDropzone: {
            selector: 'div.dropzone2',
            init: function () {
                var base = this,
                    container = $(base.selector);

                base.initFileUploader(base, 'div.dropzone2');
            },
            initFileUploader: function (base, target) {
                var previewNode = document.querySelector('#onyx-dropzone-template'); // Dropzone template holder

                previewNode.id = '';

                var previewTemplate = previewNode.parentNode.innerHTML;
                previewNode.parentNode.removeChild(previewNode);

                var onyxDropzone = new Dropzone(target, {
                    url: $(target).attr('action') ? $(target).attr('action') : '/post/service/upload', // Check that our form has an action attr and if not, set one here
                    maxFiles: 5,
                    maxFilesize: 20,
                    acceptedFiles:
                        'image/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf,.zip,.rar,.psd,.mp3,.mp4',
                    previewTemplate: previewTemplate,
                    previewsContainer: '#previews',
                    clickable: true,

                    createImageThumbnails: true,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

                    /**
                     * The text used before any files are dropped.
                     */
                    dictDefaultMessage: 'Drop files here to upload.', // Default: Drop files here to upload

                    /**
                     * The text that replaces the default message text it the browser is not supported.
                     */
                    dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.", // Default: Your browser does not support drag'n'drop file uploads.

                    /**
                     * If the filesize is too big.
                     * `{{filesize}}` and `{{maxFilesize}}` will be replaced with the respective configuration values.
                     */
                    dictFileTooBig: 'File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.', // Default: File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.

                    /**
                     * If the file doesn't match the file type.
                     */
                    dictInvalidFileType: "You can't upload files of this type.", // Default: You can't upload files of this type.

                    /**
                     * If the server response was invalid.
                     * `{{statusCode}}` will be replaced with the servers status code.
                     */
                    dictResponseError: 'Server responded with {{statusCode}} code.', // Default: Server responded with {{statusCode}} code.

                    /**
                     * If `addRemoveLinks` is true, the text to be used for the cancel upload link.
                     */
                    dictCancelUpload: 'Cancel upload.', // Default: Cancel upload

                    /**
                     * The text that is displayed if an upload was manually canceled
                     */
                    dictUploadCanceled: 'Upload canceled.', // Default: Upload canceled.

                    /**
                     * If `addRemoveLinks` is true, the text to be used for confirmation when cancelling upload.
                     */
                    dictCancelUploadConfirmation: 'Are you sure you want to cancel this upload?', // Default: Are you sure you want to cancel this upload?

                    /**
                     * If `addRemoveLinks` is true, the text to be used to remove a file.
                     */
                    dictRemoveFile: 'Remove file', // Default: Remove file

                    /**
                     * If this is not null, then the user will be prompted before removing a file.
                     */
                    dictRemoveFileConfirmation: null, // Default: null

                    /**
                     * Displayed if `maxFiles` is st and exceeded.
                     * The string `{{maxFiles}}` will be replaced by the configuration value.
                     */
                    dictMaxFilesExceeded: 'You can not upload any more files.', // Default: You can not upload any more files.

                    /**
                     * Allows you to translate the different units. Starting with `tb` for terabytes and going down to
                     * `b` for bytes.
                     */
                    dictFileSizeUnits: { tb: 'تيرا', gb: 'جيجا', mb: 'ميجا', kb: 'كيلو بايت', b: 'بايت' }
                });

                Dropzone.autoDiscover = false;

                onyxDropzone.on('addedfile', function (file) {
                    $('.preview-container').css('visibility', 'visible');
                    file.previewElement.classList.add('type-' + base.fileType(file.name)); // Add type class for this element's preview
                });

                onyxDropzone.on('totaluploadprogress', function (progress) {
                    var progr = document.querySelector('.progress .determinate');

                    if (progr === undefined || progr === null) return;

                    progr.style.width = progress + '%';
                });

                onyxDropzone.on('dragenter', function () {
                    $(target).addClass('hover');
                });

                onyxDropzone.on('dragleave', function () {
                    $(target).removeClass('hover');
                });

                onyxDropzone.on('drop', function () {
                    $(target).removeClass('hover');
                });


                onyxDropzone.on('removedfile', function (file) {
                    var c = confirm("هل انت متاكد من حذف هذا العنصر ؟");
                    if (c) {

                        $.ajax({
                            type: 'POST',
                            url: $(target).attr('action') ? $(target).attr('action') : '../../file-upload.php',
                            data: {
                                target_file: file.upload_ticket,
                                delete_file: 1
                            }, success: function (result) {
                                var files = $("#files").val();

                                var fileText = files.replace(file.upload_ticket + ',', '');
                                fileText = fileText.replace(file.upload_ticket, '');
                                $("#files").val(fileText);


                            }



                        });
                    }


                });

                onyxDropzone.on('success', function (file, response) {
                    let parsedResponse = JSON.parse(response);
                    file.upload_ticket = parsedResponse.file_link;
                    console.log(parsedResponse.file_link);
                    console.log(parsedResponse);
                    console.log(parsedResponse.status);

                    var files = $("#files").val();
                    if (parsedResponse.status == 'error') {
                        $(".preview-container").append("<div class='alert alert-danger' id='error'>" + parsedResponse.info + "</div>");
                        $('div.dz-processing:last').remove();
                    } else {
                        $("#error").remove();
                    }
                    if (files == '' || files == null) {
                        $("#files").val(parsedResponse.file_link);
                    } else {
                        $("#files").val(files + ',' + parsedResponse.file_link);
                    }



                    // Make it wait a little bit to take the new element
                    setTimeout(function () {
                        console.log('Files count: ' + base.dropzoneCount());
                    }, 350);

                    $(".fa-check-circle").css('color', 'green');

                    // Something to happen when file is uploaded, like showing a message
                });
            },
            dropzoneCount: function () {
                var filesCount = $('#previews > .dz-success.dz-complete').length;
                return filesCount;
            },
            fileType: function (fileName) {
                var fileType = /[.]/.exec(fileName) ? /[^.]+$/.exec(fileName) : undefined;
                return fileType[0];
            }
        }
    };

    $(document).ready(function () {
        Onyx.init();
    });
})(jQuery);

if ($('div.plyr').length) {

    const players = {};
    Array.from(document.querySelectorAll('.audio-player')).forEach(video => {
        players[video.id] = new Plyr(video);

    });


}

jQuery.fn.clickToggle = function (a, b) {
    return this.on("click", function (ev) { [b, a][this.$_io ^= 1].call(this, ev) })
};

// TEST:
$('#side-btn').clickToggle(function (ev) {
    openNav();
}, function (ev) {
    closeNav();
});


$('#record-btn').clickToggle(function (ev) {
    $("#recordingsList").html("");
    $("#record-input").val("");
    $("#delete-record").hide();
    $("#title-inner").html("جارى التسجيل ");
    startRecording();
    $("#record-btn .fa").addClass("recording");
    $("#record-btn .fa").addClass("fa-stop");
    $("#record-btn .fa").removeClass("fa-microphone");

}, function (ev) {

    stopRecording();
    $("#title-inner").html("استمع للرسالة");
    $("#record-btn .fa").removeClass("recording");
    $("#record-btn .fa").removeClass("fa-stop");
    $("#record-btn .fa").addClass("fa-microphone");
    $("#delete-record").show();


});

$(document.body).on('click', '#delete-record', function () {
    var c = confirm("هل انت متاكد من حذف هذا العنصر ؟");
    if (c) { //you can just return c because it will be true or false

        $("#delete-record").hide();
        $("#recordingsList").html("");
        $("#record-input").val("");
        $("#title-inner").html("اضغط على الميكروفون لتبدأ التسجيل ");
    }

});

$(document.body).on('click', '#paypal-button', function () {
});
$(document.body).on('click', '.delete-file', function () {
    var c = confirm("هل انت متاكد من حذف هذا العنصر ؟");
    return c;
});


function openNav() {
    document.getElementById("sidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("header-nav").style.marginRight = "250px";
    document.getElementById("header-nav").style.marginLeft = "-250px";

}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("sidenav").style.width = "0";
    document.getElementById("main").style.marginRight = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("header-nav").style.marginRight = "0";
    document.getElementById("header-nav").style.marginLeft = "0";


}
$(document.body).on('click', '#main', function () {
    closeNav();
});
$(document.body).on('click', '#sidbar-btn', function () {
    $(".messages-sidebar").toggle();
});
function readURL(e) {
    if (e.files && e.files[0]) {
        var t = new FileReader;
        t.onload = function (e) {
            $(".profile-avatar").attr("src", e.target.result)
        }, t.readAsDataURL(e.files[0])
    }
}

function socialWindow(e) {
    var t = (screen.width - 570) / 2,
        n = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + (screen.height - 570) / 2 + ",left=" + t;
    window.open(e, "NewWindow", n)
}

function setShareLinks() {
    var e = encodeURIComponent(document.URL),
        t = encodeURIComponent($("meta[property='og:description']").attr("content"));
    $(".social-share.facebook").on("click", function () {
        url = "https://www.facebook.com/sharer.php?u=" + e, socialWindow(url)
    }), $(".social-share.twitter").on("click", function () {
        url = "https://twitter.com/intent/tweet?url=" + e + "&text=" + t, socialWindow(url)
    }), $(".social-share.linkedin").on("click", function () {
        url = "https://www.linkedin.com/shareArticle?mini=true&url=" + e, socialWindow(url)
    })
}


window.onload = function () {

    $('body').show();

    if ($('.popup').length) {
        $('.popup').magnificPopup({ type: 'image' });
    }
    if ($('.iframe-popup').length) {

        $('.iframe-popup').magnificPopup({
            type: 'iframe'
        });

    }
    if ($('.gallery').length) {

        $('.gallery').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image'
            // other options
        });
    }

    $("input.phone").length && ($("input.phone").intlTelInput({
        preferredCountries: ["us", "br", "gb", "in"],
        initialCountry: "auto",
        utilsScript: "/danpenstudio/assets/js/intlTelInput.utils.js",
        geoIpLookup: function (e) {
            $.get("https://ipinfo.io/json", function () { }, "jsonp").always(function (t) {
                var n = t && t.country ? t.country : "";
                e(n)
            })
        }
    }), $("input.phone").on("blur", function () {
        $(this).intlTelInput("getNumber") && $(this).val($(this).intlTelInput("getNumber"))
    }), $(".avatar-input").change(function () {
        readURL(this)
    }), $(".owl1").owlCarousel({
        loop: !0,
        margin: 20,
        rtl: !0,
        nav: !1,
        dots: !1,
        autoplay: !0,
        autoplaySpeed: 1500,
        animateIn: "slideInRight",
        animateOut: "slideOutLeft",
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    }))
};


$('.confirm').submit(function () {
    var c = confirm("هل انت متاكد من حذف هذا العنصر ؟");
    return c; //you can just return c because it will be true or false
});
$(document.body).on('click', '.confirm4', function () {
    var c = confirm("هل انت متاكد من حذف هذا العنصر ؟");
    return c; //you can just return c because it will be true or false
});

$('.confirm2').submit(function () {
    var c = confirm("هل انت متاكد من هذا الاجراء ؟");
    return c; //you can just return c because it will be true or false
});
$('.confirm3').submit(function () {
    var c = confirm("هل انت متاكد من اختيارك ؟");
    return c; //you can just return c because it will be true or false
});
