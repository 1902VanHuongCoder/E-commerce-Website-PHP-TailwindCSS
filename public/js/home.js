$(document).ready(function () {
  const successNotification = $("#success-notification");
  if (successNotification.length > 0) {
    successNotification.css("display", "block");
  }
  setTimeout(() => {
    successNotification.css("display", "none");
  }, 5000);

  // show notify when user hit ADD button in home page
  $(".add_to_cart").click(function () {
    const notify = $("#added_to_cart_successfully");
    notify.css("display", "block");
    setTimeout(() => {
      notify.css("display", "none");
    }, 4000);
  });

  //sidebar
  $(".bar").click(function () {
    $(".sidebar").toggleClass("left-[-100%]");
  });

  $(".closed").click(function () {
    $(".sidebar").toggleClass("left-[-100%]");
  });

  //ẩn hiện thanh ngang
  $(".clickdown_2").click(function () {
    $(".list_1").addClass("hidden");
    $(".dropdown_1").addClass("rotate-180");
    if (!$(".list_2").hasClass("hidden")) {
      $(".list_2").addClass("hidden");
    } else {
      $(".list_2").removeClass("hidden");
    }

    $(".dropdown_2").toggleClass("rotate-180");
  });

  //cart
  $(".close-cart").click(function () {
    $(".cart-shop").addClass("translate-x-[100%]");
    $(".opacity-toggle").addClass("hidden");
  });

  $(".fa-cart-shopping").click(function () {
    $(".cart-shop").removeClass("translate-x-[100%]");
    $(".opacity-toggle").removeClass("hidden");
  });

  $("#user_info").click(function () {
    $("#user_info_panel").toggleClass("right-4");
  });

  //filter products
  $("#shirts").click(function () {
    $(".shirts").show();
    $(".shoes").hide();
    $(".hats").hide();
    $(".backpacks").hide();
    $(".skirts").hide();
  });
  $("#shoes").click(function () {
    $(".shoes").show();
    $(".hats").hide();
    $(".shirts").hide();
    $(".backpacks").hide();
    $(".skirts").hide();
  });
  $("#skirts").click(function () {
    $(".skirts").show();
    $(".shirts").hide();
    $(".hats").hide();
    $(".backpacks").hide();
    $(".shoes").hide();
  });
  $("#hats").click(function () {
    $(".hats").show();
    $(".shoes").hide();
    $(".shirts").hide();
    $(".backpacks").hide();
    $(".skirts").hide();
  });
  $("#backpacks").click(function () {
    $(".backpacks").show();
    $(".shoes").hide();
    $(".hats").hide();
    $(".shirts").hide();
    $(".skirts").hide();
  });
  $("#all").click(function () {
    $(".style").show();
  });

  //filter mobile
  $("#shirts_1").click(function () {
    $(".shirts").show();
    $(".shoes").hide();
    $(".hats").hide();
    $(".backpacks").hide();
    $(".skirts").hide();
  });
  $("#shoes_1").click(function () {
    $(".shoes").show();
    $(".hats").hide();
    $(".shirts").hide();
    $(".backpacks").hide();
    $(".skirts").hide();
  });
  $("#skirts_1").click(function () {
    $(".skirts").show();
    $(".shirts").hide();
    $(".hats").hide();
    $(".backpacks").hide();
    $(".shoes").hide();
  });
  $("#hats_1").click(function () {
    $(".hats").show();
    $(".shoes").hide();
    $(".shirts").hide();
    $(".backpacks").hide();
    $(".skirts").hide();
  });
  $("#backpacks_1").click(function () {
    $(".backpacks").show();
    $(".shoes").hide();
    $(".hats").hide();
    $(".shirts").hide();
    $(".skirts").hide();
  });
  $("#all_1").click(function () {
    $(".style").show();
  });

  //add products
  let cart_items = [];
  $(".add").click(function () {
    var productElement = $(this).closest(".style");
    var productName = productElement.find(".text-base").text().trim();
    let price = parseFloat(
      productElement.find(".text-gray-500").text().trim().split("$")[0].trim()
    );
    var productWarehouse = productElement
      .find(".text-red-400")
      .text()
      .trim()
      .split(":")[1]
      .trim();
    var productImage = productElement.find("img").attr("src");
    var productID = productElement.find(".productID").text();
    add_to_cart(productName, price, productWarehouse, productImage, productID);
  });

  //Hàm này dùng để kiểm tra xem sản phẩm có không
  function find_CartItem(productName) {
    for (var i = 0; i < cart_items.length; i++) {
      if (cart_items[i].name === productName) {
        return i;
      }
    }
    return -1;
  }

  //Hàm này thêm giỏ hàng
  function add_to_cart(name, price, warehousem, image, productID) {
    var productIndex = find_CartItem(name);
    var totalPrice = 0;
    if (productIndex !== -1) {
      cart_items[productIndex].quantity++;
      cart_items[productIndex].price =
        price * cart_items[productIndex].quantity;
    } else {
      var products = {
        name: name,
        price: price,
        warehousem: warehousem,
        image: image,
        quantity: 1,
        productID: productID,
      };
      cart_items.push(products);
    }
    updateCount();
    updateTotalPrice();
    render_CartItems();
  }

  function render_CartItems() {
    $(".cart_product").empty();
    var totalPrice = 0;
    for (var i = 0; i < cart_items.length; i++) {
      var product = `
            <div class="flex justify-start gap-2 border-b-2 border-[#333] py-[20px] cart">
                <div class="w-1/3">
                    <img src="${cart_items[i].image}">
                </div>
                <div class="text-sm flex justify-center flex-col gap-[8px] font-semibold">
                    <h1>${cart_items[i].name}</h1>
                    <p>Price : <span class="text-[#4169E1] price">${cart_items[i].price}.00$</span></p>
                    <p>Warehouse: <span class="text-[#DC143C] warehouse">${cart_items[i].warehousem}</span></p>
                    <div class="flex items-center gap-4">
                        <a href="/orders/${cart_items[i].productID}" class="px-[18px] py-[6px] bg-[#FFD700] transition-all duration-500 hover:text-[#fff] hover:bg-[#4169E1]"><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
                        <button class="px-[18px] py-[6px] bg-[#DC143C] transition-all duration-500 hover:text-[#fff] del">Delete</button>
                    </div>
                </div>
            </div>
        `;
      $(".cart_product").append(product);
    }

    $(".plus").click(function () {
      var productElement = $(this).closest(".cart");
      var productNameCart = productElement.find("h1").text();
      var productIndex = find_CartItem(productNameCart);
      var initialPrice = cart_items[productIndex].price;
      cart_items[productIndex].quantity++;
      var currentPrice = cart_items[productIndex].quantity * initialPrice;
      productElement.find(".price").text(currentPrice + ".00$");
      productElement.find(".quantity").val(cart_items[productIndex].quantity);
      updateTotalPrice();
    });

    $(".minus").click(function () {
      var productElement = $(this).closest(".cart");
      var productNameCart = productElement.find("h1").text();
      var productIndex = find_CartItem(productNameCart);
      var initialPrice = cart_items[productIndex].price;
      if (cart_items[productIndex].quantity > 1) {
        cart_items[productIndex].quantity--;
        var currentPrice = cart_items[productIndex].quantity * initialPrice;
        productElement.find(".price").text(currentPrice + ".00$");
        productElement.find(".quantity").val(cart_items[productIndex].quantity);
      } else {
        productElement.remove();
        cart_items.splice(productIndex, 1);
        updateCount();
      }
      updateTotalPrice();
    });

    $(".del").click(function () {
      var productElement = $(this).closest(".cart");
      var productNameCart = productElement.find("h1").text();
      var productIndex = find_CartItem(productNameCart);
      cart_items.splice(productIndex, 1);
      productElement.remove();
      updateTotalPrice();
      updateCount();
    });
  }

  function updateTotalPrice() {
    var totalPrice = 0;
    for (var i = 0; i < cart_items.length; i++) {
      var productTotalPrice = cart_items[i].price * cart_items[i].quantity;
      totalPrice += productTotalPrice;
    }
    $(".total").text(totalPrice.toFixed(2) + " " + "$");
  }

  function updateCount() {
    var count = 0;
    count += cart_items.length;
    $(".count_products").text(count);
  }

  // Decrease the quantity of product
  $("#decrease").click(function () {
    if (parseInt($("#quantity").val()) === 1) {
      $("#quantity").val(1);
    } else {
      var quantity = parseInt($("#quantity").val()) - 1;
      $("#quantity").val(quantity);
    }
  });

  $("#increase").click(function () {
    var quantity = parseInt($("#quantity").val()) + 1;
    $("#quantity").val(quantity);
  });

  //  Show image when uploading image
  $("#imageInput").change(function () {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#imagePreview").removeClass("hidden");
      $("#image_icon").addClass("hidden");
      $("#imagePreview").attr("src", e.target.result);
    };
    reader.readAsDataURL(file);
  });

  // Hide and show the back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 500) {
      $("#backtotop").addClass("flex");
      $("#backtotop").removeClass("hidden");
    } else {
      $("#backtotop").addClass("hidden");
      $("#backtotop").removeClass("flex");
    }
  });
});
