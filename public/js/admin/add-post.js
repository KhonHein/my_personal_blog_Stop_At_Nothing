{
    /* < script >
        $(document).ready(function() {
            $('.statusChange').change(function() {
                $currentStatus = $(this).val(); //$currentStatus = $('.statusChange').val();
                $parentNode = $(this).parents('tr');
                $orderCode = $parentNode.find('.orderCode').html();

                $data = {
                    'status': $currentStatus,
                    'orderCode': $orderCode
                };

                $.ajax({
                    type: 'get',
                    url: 'http://127.0.0.1:8000/admin/order/ajax/change/status',
                    data: $data,
                    dataType: 'json',
                    success: function(response) {

                    }
                })

            })
        }) <
        /script> */
}