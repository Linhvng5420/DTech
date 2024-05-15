<template>
    <div class="col-md-4 mt-2">
        <div class="card" style="padding: 5px; height: 30rem; width: 20rem; display: grid; justify-items: center; align-items: center;">
            <div>
                <img :src="`uploads/${productType}/${product.HinhAnh}`" alt="{{ product.TenSP }}" class="card-img-top" style="max-width: 200px; max-height: 190px; object-fit: cover;">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ product.TenSP }}</h5>
                <p class="card-text">{{ product.MieuTa }}</p>
                <p class="card-text">Giá: {{ number_format(product.Gia) }} VND</p>
            </div>
            <form action="#" method="POST">
                @csrf
                <input type="hidden" name="product_id" :value="product.id">
                <button type="submit" class="btn btn-primary btn-sm float-right">
                    <i class="fas fa-plus"></i> Thêm vào giỏ hàng
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: Object,
    },
    computed: {
        productType() {
            return this.product.__typename.toLowerCase().replace('app\\models\\', '');
        },
    },
};
</script>
