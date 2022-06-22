// Place Order
$(document).ready(function () {
    $("#checkoutForm").validate();

    $("#placeOrder").click(function (e) {
        alert("Button Clicked");

        let paymentMethod = $("input[name=paymentmethod]:checked").val();

        if (paymentMethod === 'Online') {
            if ($("#checkoutForm").valid()) {
                e.preventDefault();
                let amount = document.getElementById('grandTotal').value * 100;
                // alert(amount);
                let options = {
                    "key": "rzp_test_dRWiKHS7zr2Gki",
                    "amount": amount,
                    "name": "",
                    "description": "",
                    "image": "",
                    "handler": function (response) {
                        alert(response.razorpay_payment_id);

                        if (response.razorpay_payment_id === "") {
                            window.location.href = "add_payment_details.php?=failed";
                        } else {
                            let controls = document.getElementById('checkoutForm').elements;

                            let formData = new FormData();
                            for (let i = 0; i < controls.length; i++) {
                                if (controls[i].type === "file") {
                                    formData.append(controls[i].name, controls[i].files[0]);
                                } else {
                                    formData.append(controls[i].name, controls[i].value);
                                }
                            }
                            let http = new XMLHttpRequest();
                            http.onreadystatechange = function () {
                                if (this.status === 200 && this.readyState === 4) {
                                    let output = this.responseText;
                                    console.log(output);
                                    window.location.href = "thanks.php?bid=" + output;
                                }
                            };
                            http.open("POST", "insertPayment.php", true);
                            http.send(formData);
                        }
                    },
                    "prefill": {
                        "name": "",
                        "email": document.getElementById('emailid').value,
                        "contact": document.getElementById('mobile').value,
                    },
                    "notes": {
                        "address": ""
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };
                let rzp1 = new Razorpay(options);
                rzp1.open();
            }
        }
    })
});

// Change Quantity
function changeQty(pid, type, stock) {
    let quantity = parseInt(document.getElementById("quantity-" + pid).value);
    let flag;

    if (type === 'plus') {
        if (quantity >= stock) {
            document.getElementById('plusicon-' + pid).className = "fa fa-plus disabled";
            flag = 0;
        } else {
            document.getElementById('minusicon-' + pid).className = "fa fa-minus";
            document.getElementById('plusicon-' + pid).className = "fa fa-plus";
            quantity += 1;
        }
    } else if (type === 'minus') {
        if (quantity > 1) {
            quantity -= 1;
            document.getElementById('minusicon-' + pid).className = "fa fa-minus";
        } else {
            document.getElementById('minusicon-' + pid).className = "fa fa-minus disabled";
            flag = 0;
        }
    }

    if (flag !== 0) {
        let http = new XMLHttpRequest();
        http.onreadystatechange = function () {
            if (this.status === 200 && this.readyState === 4) {
                // console.log(this.responseText);
                let response = (JSON.parse(this.responseText));
                console.log(response);

                document.getElementById("quantity-" + pid).value = response.qty;
                document.getElementById("netprice-" + pid).innerHTML = response.netPrice;
                document.getElementById("grandTotal").value = response.grandTotal;
            }
        }
        http.open("GET", "changeQty.php?pid=" + pid + "&qty=" + quantity, true);
        http.send();
    }
}

// Add To Cart
function addToCart(pid, qty) {
    let http = new XMLHttpRequest();
    http.onreadystatechange = function () {
        if (this.status === 200 && this.readyState === 4) {
            alert("Product added to cart.");
            document.getElementById('cartCount').innerHTML = this.responseText;
        }
    };
    http.open("GET", "addToCart.php?pid=" + pid + "&qty=" + qty, true);
    http.send();
}

// Fetch Cart Count
function getCartCount() {
    let http = new XMLHttpRequest();
    http.onreadystatechange = function () {
        if (this.status === 200 && this.readyState === 4) {
            document.getElementById('cartCount').innerHTML = this.responseText;
        }
    };
    http.open("GET", "cartCount.php", true);
    http.send();
}