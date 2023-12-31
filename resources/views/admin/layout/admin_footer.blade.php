</div>
</div>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Other scripts -->
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>

<link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>



<script>
    jQuery(document).ready(function() {
        jQuery('#myTable').DataTable();
    });
</script>
<textarea id="productDescription"></textarea>

<script>
    tinymce.init({
        selector: 'textarea#productDescription',
        height: 300,
        plugins: 'lists link image imagetools code',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            // Implement your file picker logic here
        }
    });
</script>
</body>

</html>
