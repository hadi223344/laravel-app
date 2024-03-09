"use strict";

// const { parseInt } = require("lodash");

// const { isSet } = require("lodash");
var updateForms = document.querySelectorAll(".updateForm");
var deleteCarts = document.querySelectorAll(".delete_cart");
var updateCarts = document.querySelectorAll(".update_cart");
var counterCarts = document.querySelectorAll(".counter_cart");
var totalCart = document.querySelector(".totalCart");
var totalCost = document.querySelector(".total-cost");
var totalOneCost = document.querySelector(".totalOneCost");

var totalPrice = 0;
var cart = [];

localStorage.clear();
for (let i = 0; i < deleteCarts.length; i++) {
    cart[i] = JSON.parse(deleteCarts[i].value);
    localStorage.setItem("oldCount[" + i + "]", parseInt(cart[i].count));
    // console.log(localStorage.getItem("oldCount[" + i + "]"));
    deleteCarts[i].addEventListener("click", () => {
        // var formData = new FormData();
        // var file = 'cart/deleteCart'
        // var _token = "{{ csrf_token() }}";
        // var cart = JSON.parse(deleteCart.previousElementSibling.getAttribute('fullArray'))
        // formData.append('_token', "{{csrf_token()}}");
        // formData.append('q', cart.id)

        var file = "/deleteCart/" + cart[i].id;
        fetch(file, {
            method: "GET",
            // body: formData
            // headers: {
            //   'X-CSRF-TOKEN': _token
            // },
        })
            .then((response) => response.text())
            .then((response) => {
                totalCost.textContent =
                    parseInt(totalCost.textContent) -
                    localStorage.getItem("oldCount[" + i + "]") *
                        parseInt(cart[i].price) +
                    "$";
                totalCart.textContent =
                    parseInt(totalCart.textContent) -
                    localStorage.getItem("oldCount[" + i + "]");

                //set localstorage
                for (let j = i; 1 == 1; j++) {
                    updateCarts[j].variableI = j;
                    updateCarts[j].removeEventListener(
                        "click",
                        updateButton,
                        false
                    );
                    if (
                        (localStorage.getItem(`oldCount[ ${j + 1}  ]`) ==
                            null) |
                        (localStorage.getItem(`oldCount[ ${j + 1}  ]`) ==
                            "null")
                    ) {
                        localStorage.removeItem(`oldCount[ ${j} ]`);
                        break;
                    }

                }
                deleteCarts[
                    i
                ].parentElement.parentElement.parentElement.parentElement.remove();
                // console.log(response);

                updateCarts = document.querySelectorAll(".update_cart");
                counterCarts = document.querySelectorAll(".counter_cart");

                cartUpdate();
                validateCart();
            })
            .catch((err) => console.log(err));
    });
}

cartUpdate();
validateCart();
// localStorage.removeItem("oldCount[" + i + "]");
// console.log(localStorage.getItem("oldCount[" + i + "]"));
function cartUpdate() {
    for (let i = 0; i < updateCarts.length; i++) {
        updateCarts[i].addEventListener("click", updateButton, false);
        updateCarts[i].variableI = i;
    }
}
function updateButton(e) {
    // console.log(e.currentTarget.variableI);
    var i = e.currentTarget.variableI;
    cart[i] = JSON.parse(updateCarts[i].value);
    var newCount = parseInt(
        updateCarts[i].previousElementSibling.previousElementSibling.value
    );

    var file = "/updateCart/" + cart[i].id + "/" + newCount;
    fetch(file, {
        method: "GET",
    })
        .then((response) => response.text())
        .then((response) => {
            // console.log(localStorage.getItem("oldCount[" + i + "]"));
            totalCost.textContent =
                parseInt(totalCost.textContent) +
                cart[i].price *
                    (newCount - localStorage.getItem("oldCount[" + i + "]")) +
                "$";
            totalCart.textContent =
                parseInt(totalCart.textContent) +
                newCount -
                localStorage.getItem("oldCount[" + i + "]");
            localStorage.setItem("oldCount[" + i + "]", newCount);
        })
        .catch((err) => console.log(err));
}

// updateForms[i].addEventListener('submit', (e) => {
//   e.preventDefault()
//   var newCount = updateCarts[i].previousElementSibling.previousElementSibling.value
//     cart[i] = JSON.parse(updateCarts[i].value)
//     if(localStorage.getItem('oldCount['+i+']') === null)
//      oldCount[i] = cart[i].count
//     else{
//      oldCount[i] = localStorage.getItem('oldCount['+i+']')
//     }
//     var formData = new FormData(updateForms[i]);
//     formData.append('id', cart[i].id);
//     formData.append('count', newCount);
//     const data = Object.fromEntries(formData)
//     console.log(formData.get('counter'));
//     // formData.append('_token', '{{csrf_token()}}');
//     var file = 'cart/updateCart'
//     fetch(file, {
//       method: 'POST',
//       headers: {
//         "Content-Type": "application/json"
//       },
//       mode: "same-origin",
//       credentials: "same-origin",

//       body:JSON.stringify(formData) ,
//       // headers: {
//       //     'X-CSRF-TOKEN': '{{ csrf_token() }}'
//       //   }
//     })
//     .then(response => response.json())
//     .then((response) => {

//       totalCost.textContent = parseInt(totalCost.textContent) + cart[i].price*(newCount- oldCount[i]) + '$'
//       localStorage.setItem( 'oldCount['+i+']', newCount)
//       console.log(newCount);
//     }).catch((err)=>console.log(err))

// })
function validateCart() {
    for (let i = 0; i < updateCarts.length; i++) {
        counterCarts[i].addEventListener("input", (e) => {
            // console.log(e.key);
            var val = counterCarts[i].value;
            val = val.replace(/^0+|[^\d]/g, "");
            counterCarts[i].value = val;
            if (val == "")
                counterCarts[
                    i
                ].nextElementSibling.nextElementSibling.style.display = "none";
            else
                counterCarts[
                    i
                ].nextElementSibling.nextElementSibling.style.display =
                    "inline-block";
        }),
            counterCarts[i].addEventListener("blur", () => {
                if (counterCarts[i].value === "") {
                    counterCarts[i].value = counterCarts[i].value.replace(
                        "",
                        localStorage.getItem("oldCount[" + i + "]")
                    );
                    // counterCarts[i].nextElementSibling.nextElementSibling.style.display = 'inline-block'
                }
            });
        counterCarts[i].addEventListener("focus", () => {
            if (
                counterCarts[i].value !== "" &&
                counterCarts[i].nextElementSibling.nextElementSibling.style
                    .display == "none"
            )
                counterCarts[
                    i
                ].nextElementSibling.nextElementSibling.style.display =
                    "inline-block";
        });
    }
}
//    **--**
//  ** order page ** {

var paymentCheck = "";
var address = "";
const orderButton = document.querySelector(".order-button");
const orderChecks = document.querySelectorAll(".order-check");
const orderAddress = document.querySelector(".order-Address");

orderAddress.addEventListener("input", (e) => {
    e.preventDefault();
    if (orderAddress.value == "") {
        orderButton.classList.add("text-primary");
        orderButton.classList.remove("btn-info");
        orderButton.textContent = "Fullfield fields";
        return;
    }
    orderChecks.forEach((orderCheck) => {
        if (paymentCheck != "") {
            orderButton.classList.remove("text-primary");
            orderButton.classList.add("btn-info");
            orderButton.textContent = "BuyNow";
        }
    });
    address = orderAddress.value;
});

orderChecks.forEach((orderCheck) => {
    orderCheck.addEventListener("click", () => {
        paymentCheck = orderCheck.value;
        if (orderAddress.value != "") {
            orderButton.classList.remove("text-primary");
            orderButton.classList.add("btn-info");
            orderButton.textContent = "BuyNow";
        }
    });
});

// orderButton.addEventListener('click', () => {
//   console.log([paymentCheck , orderAddress.value]);
//   if (paymentCheck == '' || orderAddress.value == '') {
//     return
//   }

//   var file1 = '/buy/' + paymentCheck + '/' + address;
//   fetch(file1, {
//     method: 'GET',
//   })
//     .then(response => response.text())
//     .then((response) => {
//     })
// })
