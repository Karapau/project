<div class="total">
    <div class="container">
        <div class="itens">
            <div>
                <span>itens ({{ Cart::getTotalQuantity() }})</span>
            </div>
            <div>
                <span>{{ '€ ' . number_format(Cart::getSubTotal(), 2, ',', '.') }}</span>
            </div>
        </div>
    </div>
    <div class="finalizar">
        <a href="{{ route('store.checkout.adress') }}"> <button>FINALIZAR COMPRA</button></a>
    </div>
</div>
