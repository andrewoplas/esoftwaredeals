$uploadCrop = $('#upload-display').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
    $("#upload-display").show();
    $("#product_thumbnail").hide();
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadCrop.croppie('bind', {
            url: e.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
});

$('#submit').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'original'
        }).then(function (resp) {
            $('#imagebase64').val(resp);
            $('#form').submit();
        });
    });