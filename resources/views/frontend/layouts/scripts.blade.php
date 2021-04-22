<script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/switcher.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/theme.js') }}"></script>
<script>
    function previewFiles(input, previewDiv) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(`${previewDiv}`).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0])
        }
    }
</script>
