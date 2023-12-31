 
        $("document").ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: '/admin/ajax/subcatById/' + categoryId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value=" ' + key + '">' + value +
                                    '</option>');
                            })
                        }

                    })
                } else {
                    $('select[name="subcategory_id"]').empty();
                }
            });


        });
 