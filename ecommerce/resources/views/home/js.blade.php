<!--! icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!--!javascript file  -->
<script type="module" src="{{asset('home/assets/index.js')}}"></script>
<!--!sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- remove if code is destroyed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<script>
    // logout-user

    $(document).ready(function() {
        $('#logout').on('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, log out!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#logout-form').submit();
                }
            });
        });
    });

    $(document).ready(function() {
        $('.deleteCart').on('click', function(event) {
            event.preventDefault();

            var url = $(this).data('url');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
    // mycart

    $(document).ready(function() {
        $('#checkbox-all').on('change', function() {
            var isChecked = $(this).is(':checked');
            $('.item-checkbox').prop('checked', isChecked);
            calculateTotal();
        });

        $('.item-checkbox').on('change', function() {
            var allChecked = $('.item-checkbox').length === $('.item-checkbox:checked').length;
            $('#checkbox-all').prop('checked', allChecked);
            calculateTotal();
        });

        function calculateTotal() {
            var total = 0;
            $('.item-checkbox:checked').each(function() {
                total += parseFloat($(this).data('price'));
            });
            $('#total-value').text(total.toFixed(2));
        }
    });

    // check item place order
    $(document).ready(function() {
        $('#order-form').on('submit', function(e) {
            var $form = $(this);
            $('.item-checkbox:checked').each(function() {
                var itemId = $(this).attr('id').split('-')[1];
                $form.append('<input type="hidden" name="items[]" value="' + itemId + '">');
            });
        });

        $('#checkbox-all').on('change', function() {
            var checked = $(this).is(':checked');
            $('.item-checkbox').prop('checked', checked);
        });

        $('.item-checkbox').on('change', function() {
            var allChecked = $('.item-checkbox').length === $('.item-checkbox:checked').length;
            $('#checkbox-all').prop('checked', allChecked);
        });
    });
</script>