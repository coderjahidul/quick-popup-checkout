jQuery(document).ready(function($){

    $(document).on('click', '.qp-quick-buy', function(e){
        e.preventDefault();

        var product_id = $(this).data('product-id');

        $.post(qp_ajax.ajax_url, {
            action: 'qp_add_to_cart',
            product_id: product_id
        }, function(response){

            if(response.success){
                openCheckoutPopup();
            }
        });
    });

    function openCheckoutPopup(){

        if($('#qp-overlay').length) return;

        $('body').append(`
            <div id="qp-overlay">
                <div id="qp-modal">
                    <button id="qp-close">×</button>
                    <div class="qp-body">
                        <iframe src="${qp_ajax.checkout_url}${qp_ajax.checkout_url.indexOf('?') !== -1 ? '&' : '?'}qp_popup=1"></iframe>
                    </div>
                </div>
            </div>
        `);

        $('#qp-close').click(function(){
            $('#qp-overlay').remove();
        });

        $('#qp-overlay').click(function(e){
            if(e.target.id === 'qp-overlay'){
                $('#qp-overlay').remove();
            }
        });
    }

});