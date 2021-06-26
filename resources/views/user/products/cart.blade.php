@include('user.header')
<div class="cart-wrapper">
    @include('user.products.components.cart')
</div>

@include('user.footer')
<script>
    function cartUpdate(event) {
        event.preventDefault();
        let urlUpdate = $('.cartUpdateUrl').data('url')
        let id = $(this).data('id');
        let amount = $(this).parents('tr').find('input.amount').val()
        $.ajax({
            type: 'GET',
            url: 'urlUpdate',
            data: {
                id: id,
                amount: amount
            },
            success: function(data) {
                if (data.code === 200) {
                    $('.cart-wrapper').html(data.productList)
                    alert('Update success')
                }
            },
            error: function() {
                alert('false')
            }

        })
    }
    $(function() {
        $('.cartUpdate').on('click', cartUpdate);
        $('i:last-child').on('click', function(e) {
            e.preventDefault();
            let id = $('input[name="course_id"]').val()
            let url = '{{ route('deleteProduct') }}'
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.code == 200) {
                        alert('ok')
                    }
                },
                error: function(response) {
                    alert('cc')
                }
            })
        })
    })
</script>
