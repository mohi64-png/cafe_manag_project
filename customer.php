<?php
<div class="card-header bg-primary text-white">Available Products</div>
<div class="card-body" id="product_list">
Loading products...
</div>
</div>
</div>


<!-- -------------------------- -->
<!-- CART SECTION -->
<!-- -------------------------- -->
<div class="col-md-5">
<div class="card">
<div class="card-header bg-success text-white">Your Cart</div>
<div class="card-body" id="cart_box">
<p>No items added yet.</p>
</div>
<div class="card-footer text-end">
<button class="btn btn-success" id="submit_order">Submit Order</button>
</div>
</div>
</div>
</div>
</div>


<script>
// ---------------------------------------------
// LOAD PRODUCTS FROM AJAX
// ---------------------------------------------
fetch('ajax.php?action=get_products')
.then(r => r.text())
.then(html => {
document.getElementById('product_list').innerHTML = html;
});


// ---------------------------------------------
// ADD TO CART HANDLING
// (you must ensure your ajax.php accepts this)
// ---------------------------------------------
function add_to_cart(id){
fetch('ajax.php?action=add_to_cart&id=' + id)
.then(r=>r.text())
.then(html=>{
document.getElementById('cart_box').innerHTML = html;
});
}


// ---------------------------------------------
// SUBMIT ORDER
// ---------------------------------------------
document.getElementById('submit_order').addEventListener('click',()=>{
fetch('ajax.php?action=submit_customer_order')
.then(r=>r.text())
.then(res=>{
alert("Order Submitted Successfully");
location.reload();
});
});
</script>