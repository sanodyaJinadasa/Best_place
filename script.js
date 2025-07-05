function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var f = new FormData();
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                fname.value = "";
                lname.value = "";
                email.value = "";
                password.value = "";
                mobile.value = "";
                document.getElementById("msg").innerHTML = "";

                changeView();
            } else {
                document.getElementById("msg").innerHTML = text;
            }
        }
    };
    r.open("POST", "signUpProcess.php", true);
    r.send(f);
}

function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var remember = document.getElementById("remember");
    //alert(remember.value);
    //alert(remember.checked);

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };
    r.open("POST", "signinProcess.php", true);
    r.send(formData);
}


var bm;

function forgotPassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                alert("Verification email sent. Please check your inbox.");

                var m = document.getElementById("forgetPasswordModel");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                alert(text);
            }
        }
    };
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function showPassword1() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";
    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }
}


// function basicSearch() {
//     //alert("ok");
//     var searchText = document.getElementById("basic_search_txt").value;
//     //alert(searchText);
//     var searchSelect = document.getElementById("basic_search_select").value;
//     //alert(searchSelect);
//     var cardrow = document.getElementById("pdetails");
//     cardrow.className = "d-none";
//     var cardcat = document.getElementById("pcat");
//     cardcat.className = "d-none";

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {

//         if (r.readyState == 4) {

//             var t = r.responseText;
//             if (t != "success") {

//                 //Salert(t);
//                 var ar = JSON.parse(t);
//                 //alert(ar);
//                 for (var i = 0; i < ar.length; i++) {

//                     var divrow = document.createElement("div");
//                     divrow.className = "row ci m-2";

//                     var div = document.createElement("div");
//                     div.className = "card col-6 col-lg-3 hd"

//                     var divrowcol = document.createElement("div");
//                     divrowcol.className = "card";

//                     var img = document.createElement("img");
//                     // img.src = "resources/mobile images/" + ar[i]["img"];
//                     img.className = "card-img-top cardtopimg";
//                     img.src = ar[i]["img"];

//                     var div1 = document.createElement("div");
//                     div1.className = "card-body";

//                     var h5 = document.createElement("h5");
//                     h5.className = "card-title";
//                     h5.innerHTML = ar[i]["title"];

//                     var span3 = document.createElement("span");
//                     span3.className = "card-text text-warning";
//                     span3.innerHTML = "In Stock";

//                     var span1 = document.createElement("span");
//                     span1.innerHTML = "New";

//                     var span2 = document.createElement("span");
//                     span2.className = "card-text text-primary";
//                     span2.innerHTML = ar[i]["price"];

//                     var br = document.createElement("br");

//                     var input = document.createElement("input");
//                     input.className = "form-cotrol mb-1";
//                     input.type = "number";
//                     input.value = ar[i]["qty"];
//                     input.className = "form-control mb-1";

//                     var a1 = document.createElement("a");
//                     a1.className = "btn btn-success col-12";
//                     a1.href = "singalproductview.php?id=" + ar[i]["id"];
//                     a1.innerHTML = "Buy Now"

//                     var a2 = document.createElement("a");
//                     a2.className = "btn btn-danger col-12 mt-2";
//                     //a2.href = "all.php";
//                     //a2.onclick = addToCart("50");
//                     //a2.href = "addtocartprocesswithjson.php?id=" + ar[i]["id"] + "&txt=1";
//                     //a2.href = "cart.php";
//                     a2.innerHTML = "Add To Cart";

//                     divrowcol.appendChild(divrow);
//                     divrow.appendChild(div);
//                     div.appendChild(img);
//                     div.appendChild(div1);
//                     div1.appendChild(h5);
//                     h5.appendChild(span1);
//                     div1.appendChild(span2);
//                     div1.appendChild(br);
//                     div1.appendChild(span3);
//                     div1.appendChild(input);
//                     div1.appendChild(a1);
//                     div1.appendChild(a2);

//                     document.getElementById("pdiv").appendChild(divrow);
//                     //document.getElementById("pdetails").appendChild(divrow);


//                 }
//             } else {
//                 window.location = "home.php";
//             }
//         }
//     }

//     r.open("GET", "basicSearchProcess.php?t=" + searchText + "&s=" + searchSelect, true);
//     r.send();

// }

function basicSearch() {
    //alert("ok");
    var searchText = document.getElementById("basic_search_txt").value;
    //alert(searchText);
    var searchSelect = document.getElementById("basic_search_select").value;
    //alert(searchSelect);
    var cardrow = document.getElementById("pdetails");
    cardrow.className = "d-none";
    var cardcat = document.getElementById("pcat");
    cardcat.className = "d-none";

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t != "success") {

                //Salert(t);
                var ar = JSON.parse(t);
                //alert(ar);
                for (var i = 0; i < ar.length; i++) {

                    var divrow = document.createElement("div");
                    divrow.className = "row ci m-2";

                    var div = document.createElement("div");
                    div.className = "card col-6 col-lg-3 hd"

                    var divrowcol = document.createElement("div");
                    divrowcol.className = "card";

                    var img = document.createElement("img");
                    // img.src = "resources/mobile images/" + ar[i]["img"];
                    img.className = "card-img-top cardtopimg";
                    img.src = ar[i]["img"];

                    var div1 = document.createElement("div");
                    div1.className = "card-body";

                    var h5 = document.createElement("h5");
                    h5.className = "card-title";
                    h5.innerHTML = ar[i]["title"];

                    var span3 = document.createElement("span");
                    span3.className = "card-text text-warning";
                    span3.innerHTML = "In Stock";

                    var span1 = document.createElement("span");
                    span1.innerHTML = "New";

                    var span2 = document.createElement("span");
                    span2.className = "card-text text-primary";
                    span2.innerHTML = ar[i]["price"];

                    var br = document.createElement("br");

                    var input = document.createElement("input");
                    input.className = "form-cotrol mb-1";
                    input.type = "number";
                    input.value = ar[i]["qty"];
                    input.className = "form-control mb-1";

                    var a1 = document.createElement("a");
                    a1.className = "btn btn-success col-12";
                    a1.href = "singalproductview.php?id=" + ar[i]["id"];
                    a1.innerHTML = "Buy Now"

                    var a2 = document.createElement("a");
                    a2.className = "btn btn-danger col-12 mt-2";
                    //a2.href = "all.php";
                    //a2.onclick = addToCart("50");
                    //a2.href = "addtocartprocesswithjson.php?id=" + ar[i]["id"] + "&txt=1";
                    //a2.href = "cart.php";
                    a2.innerHTML = "Add To Cart";

                    divrowcol.appendChild(divrow);
                    divrow.appendChild(div);
                    div.appendChild(img);
                    div.appendChild(div1);
                    div1.appendChild(h5);
                    h5.appendChild(span1);
                    div1.appendChild(span2);
                    div1.appendChild(br);
                    div1.appendChild(span3);
                    div1.appendChild(input);
                    div1.appendChild(a1);
                    div1.appendChild(a2);

                    document.getElementById("pdiv").appendChild(divrow);
                    //document.getElementById("pdetails").appendChild(divrow);


                }
            } else {
                window.location = "home.php";
            }
        }
    }

    r.open("GET", "basicSearchProcess.php?t=" + searchText + "&s=" + searchSelect, true);
    r.send();

}

function showPassword2() {
    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {
        rnp.type = "text";
        rnpb.innerHTML = "Hide";
    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }
}

function resetPassword() {
    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var formData = new FormData();
    formData.append("e", e.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                alert("Password Reset Success");

                bm.hide();
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "resetPassword.php", true);
    r.send(formData);
}


function gotoaddproduct() {

    window.location = "addproduct.php";
}


function changeImg() {
    var image = document.getElementById("imguploader");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}





// function addProduct() {


//     // window.location = "addproduct.php";
//     var category = document.getElementById("ca");
//     var brand = document.getElementById("br");
//     var model = document.getElementById("mo");
//     var title = document.getElementById("ti");
//     var condition;

//     if (document.getElementById("bn").checked) {
//         condition = "1";
//     } else if (document.getElementById("us").checked) {
//         condition = "2";
//     }

//     var colour;

//     if (document.getElementById("clr1").checked) {
//         colour = "1";
//     } else if (document.getElementById("clr2").checked) {
//         colour = "2";
//     } else if (document.getElementById("clr3").checked) {
//         colour = "3";
//     } else if (document.getElementById("clr4").checked) {
//         colour = "4";
//     } else if (document.getElementById("clr5").checked) {
//         colour = "5";
//     } else if (document.getElementById("clr6").checked) {
//         colour = "6";
//     }

//     var qty = document.getElementById("qty");
//     var price = document.getElementById("cost");
//     var delevery_within_colombo = document.getElementById("dwc");
//     var delevery_outof_colombo = document.getElementById("doc");
//     var description = document.getElementById("desc");
//     var image = document.getElementById("imguploader");

//     // alert(category.value);
//     // alert(brand.value);
//     //  alert(model.value);
//     // alert(title.value);
//     // alert(condition);
//     //alert(qty.value);
//     // alert(price.value);
//     // alert(delevery_within_colombo.value);
//     //alert(delevery_outof_colombo.value);
//     // alert(description.value);
//     //alert(image.value);

//     var form = new FormData();
//     form.append("c", category.value);
//     form.append("b", brand.value);
//     form.append("m", model.value);
//     form.append("t", title.value);
//     form.append("co", condition);
//     form.append("col", colour);
//     form.append("qty", qty.value);
//     form.append("p", price.value);
//     form.append("dwc", delevery_within_colombo.value);
//     form.append("doc", delevery_outof_colombo.value);
//     form.append("desc", description.value);
//     form.append("img", image.files[0]);

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             alert(text);



//         }
//     };

//     r.open("POST", "addProductProcess.php", true);
//     r.send(form);

// }
function addProduct() {
    //alert("ok");
    var category = document.getElementById("ca");
    var brand = document.getElementById("br");
    var model = document.getElementById("mo");
    var title = document.getElementById("ti");
    var condition;

    if (document.getElementById("bn").checked) {
        condition = "1";
    } else if (document.getElementById("us").checked) {
        condition = "2";
    }

    var colour;

    if (document.getElementById("clr1").checked) {
        colour = "1";
    } else if (document.getElementById("clr2").checked) {
        colour = "2";
    } else if (document.getElementById("clr3").checked) {
        colour = "3";
    } else if (document.getElementById("clr4").checked) {
        colour = "4";
    } else if (document.getElementById("clr5").checked) {
        colour = "5";
    } else if (document.getElementById("clr6").checked) {
        colour = "6";
    }
    // var colour = document.getElementById("clr1").value;
    // var colour = document.getElementById("clr2").value;
    // var colour = document.getElementById("clr3").value;
    // var colour = document.getElementById("clr4").value;
    // var colour = document.getElementById("clr5").value;
    // var colour = document.getElementById("clr6").value;
    //alert(colour);

    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var delevery_within_colombo = document.getElementById("dwc");
    var delevery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    var image = document.getElementById("imguploader");

    // alert(category.value);
    // alert(brand.value);
    // alert(model.value);
    // alert(title.value);
    // alert(condition);
    // alert(colour);
    // alert(qty.value);
    // alert(price.value);
    // alert(delevery_within_colombo.value);
    // alert(delevery_outof_colombo.value);
    // alert(description.value);
    //alert(image.value);

    var form = new FormData();
    form.append("c", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("t", title.value);
    form.append("co", condition);
    form.append("col", colour);
    form.append("qty", qty.value);
    form.append("p", price.value);
    form.append("dwc", delevery_within_colombo.value);
    form.append("doc", delevery_outof_colombo.value);
    form.append("desc", description.value);
    form.append("img", image.files[0]);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                swal(text, "", "success");
                window.location = "sellerproductview.php";
            } else {
                //alert(text);
                swal(text, "", "error");
            }

        }
    };

    r.open("POST", "addProductProcess.php", true);
    r.send(form);

}

function signout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            }
        }
    };

    r.open("GET", "signout.php", true);
    r.send();
}

function changeproductView() {
    var add = document.getElementById("addproductbox");
    var update = document.getElementById("updateproductbox");

    add.classList.toggle("d-none");
    update.classList.toggle("d-none");
}

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var postalcode = document.getElementById("postalcode");
    var img = document.getElementById("profileimg");


    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("a1", line1.value);
    f.append("a2", line2.value);
    f.append("c", city.value);
    f.append("p", postalcode.value);
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            swal(t);
            setInterval(pro, 3000);
        }
    };



    r.open("POST", "UpdateProfileProcess.php", true);
    r.send(f);
    // alert(fname.value);
    // alert(lname.value);
    // alert(mobile.value);
    // alert(line1.value);
    // alert(line2.value);
    // alert(city.value);
    // alert(img.value);
}

///change status

function changestatus(id) {

    var productid = id;
    var statuscheck = document.getElementById("check");
    var statuslabel = document.getElementById("ckecklabel" + productid);
    var status;

    if (statuscheck.checked) {
        status = 1;
    } else {
        status = 0;
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "deactive") {
                statuslabel.innerHTML = "make your product active";
                // window.location = "sellerproductview.php";
            } else if (t == "active") {
                statuslabel.innerHTML = "make your product deactive";
            }
        }
    };

    r.open("GET", "statuschangeProcess.php?p=" + productid, true);
    r.send();
}



// delete model
function deleteModel(id) {
    var dm = document.getElementById("deleteModel" + id);
    k = new bootstrap.Modal(dm);
    k.show();
}

// function deleteproduct(id) {
//     //alert(id);
//     var productid = id;
//     var request = new XMLHttpRequest();
//     request.onreadystatechang = function() {
//         if (request.readyState == 4) {
//             var t = request.responseText;
//             alert(t);
//         }
//     };
//     request.open("GET", "deleteproductprocess.php?id=" + productid, true);
//     request.send();
// }

function deleteproduct(id) {

    var productid = id;

    var requst = new XMLHttpRequest();
    requst.onreadystatechange = function() {
        if (requst.readyState == 4) {
            var t = requst.responseText;
            if (t = "success") {

                k.hide();
            }
        }
    };

    requst.open("GET", "deleteproductprocess.php?id=" + productid, true);
    requst.send();
}

///filters

// function addFilters() {

//     var search = document.getElementById("s");

//     var age;
//     if (document.getElementById("n").checked) {
//         age = 1;
//     } else if (document.getElementById("o").checked) {
//         age = 2;
//     } else {
//         age = 0;
//     }

//     var qty;
//     if (document.getElementById("l").checked) {
//         qty = 1;
//     } else if (document.getElementById("h").checked) {
//         qty = 2;
//     } else {
//         qty = 0;
//     }

//     var condition;
//     if (document.getElementById("b").checked) {
//         condition = 1;
//     } else if (document.getElementById("u").checked) {
//         condition = 2;
//     } else {
//         condition = 0;
//     }



//     var f = new FormData();
//     f.append("s", search.value);
//     f.append("a", age);
//     f.append("q", qty);
//     f.append("c", condition);

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             // var obj = JSON.stringify(t);
//             // var length = Object.keys(obj).length;
//             // alert(t);
//             // alert(length);
//             var arr = JSON.parse(t);
//             for (var i = 0; i < arr.length; i++) {
//                 var row = arr[i];
//                 alert(row["title"]);
//                 alert(arr["img"]);
//                 var d1 = document.createElement("div");
//                 var h = document.createElement("h1");
//                 h.value = "hello";
//                 d1.appendChild(h);
//             }
//         }

//     };

//     r.open("POST", "filterprocess.php", true);
//     r.send(f);
// }


function addFilters() {


    var search = document.getElementById("s");

    var age;

    if (document.getElementById("n").checked) {
        age = 1;
    } else if (document.getElementById("o").checked) {
        age = 2;
    } else {
        age = 0;
    }


    var qty;

    if (document.getElementById("l").checked) {
        qty = 1;
    } else if (document.getElementById("h").checked) {
        qty = 2;
    } else {
        qty = 0;
    }

    var condition;

    if (document.getElementById("b").checked) {
        condition = 1;
    } else if (document.getElementById("u").checked) {
        condition = 2;
    } else {
        condition = 0;
    }

    var f = new FormData();
    f.append("s", search.value);
    f.append("a", age);
    f.append("q", qty);
    f.append("c", condition);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            var arr = JSON.parse(t);
            for (var i = 0; i < arr.length; i++) {
                var row = arr[i];
                alert(row["title"]);
                alert(arr["img"]);

                var d1 = document.createElement("div");
                var h = document.createElement("h1");
                h.value = "hello";
                d1.appendChild(h);

            }

            var obj = JSON.stringify(t);
            var length = Object.keys(obj).length;
            alert(t);
            alert(length);
            alert(obj[0]["title"]);
        }
    };
    r.open("POST", "filterProcess.php", true);
    r.send(f);

}



function searchtoupdate() {
    var id = id;
    var category = document.getElementById("ca ");
    var bra = document.getElementById("br ");
    var model = document.getElementById("mo ");
    var title = document.getElementById("ti");
    var brand = document.getElementById("bn ");
    var use = document.getElementById("us ");
    var qty = document.getElementById("qty ");
    var price = document.getElementById(" cost");
    var dwc = document.getElementById(" dwc");
    var doc = document.getElementById("doc ");
    var desc = document.getElementById("desc ");
    var img = document.getElementById("prev ");



    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;

            // title.value = object["title"];
            // alert(object["title"]);
            var object = JSON.parse(text);

            bra.value = object["brand"];
            category.value = object["category"];
            model.value = object["model"];

            title.value = object["title"];
            if (object["condition"] == 1) {
                brand.checked = object["condition"];
            } else if (object["condition"] == 2) {
                use.checked = object["condition"]
            }


            if (object["condition"] == 1) {
                brand.checked = object["condition"];

            } else if (Object["condition"] == 2) {
                use.checked = object["condition"];
            }

            if (object["color"] == 1) {
                document.getElementById("clr1").checked = object["color"];
            } else if (object["color"] == 1) {
                document.getElementById("clr2").checked = object["color"];
            } else if (object["color"] == 1) {
                document.getElementById("clr3").checked = object["color"];
            } else if (object["color"] == 1) {
                document.getElementById("clr4").checked = object["color"];
            } else if (object["color"] == 1) {
                document.getElementById("clr5").checked = object["color"];
            } else if (object["color"] == 1) {
                document.getElementById("clr6").checked = object["color"];
            }

            qty.value = object["qty"];
            price.value = object["price"];
            dwc.value = object["delivery_with"];
            doc.value = object["delevery_out"];
            desc.value = object["description"];
            img.value = object["img"];





        }
    };
    request.open("GET", "searchtoupdateprocess.php?id=" + id, true);
    request.send();
}



function searchtoupdate() {

    // alert("search to update");
    var id = document.getElementById("searchToUpdate").value;
    var title = document.getElementById("ti")

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            var object = JSON.parse(text);
            // alert(object["title"]);
            title.value = object["title"];
        }
    }

    request.open("GET", "SearchToUpdateProcess.php?id=" + id, true);
    request.send();

}

function sendid(id) {
    var iid = id;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {
                window.location = "updateproduct.php";
            }
        }
    };
    r.open("GET", "sendproductprocess.php?id=" + iid, true);
    r.send();
}

function loadingmainimg(id) {
    var pid = id;
    var img = Document.getElementById("pimg" + pid).src;
    var mainimg = document.getElementById("mainimg")
    mainimg.style.backgroundImage = "url(" + img + ")";
    //alert(img);
}

function qty_inc(qty) {
    var pqty = qty;
    var input = document.getElementById("qtyinput");
    if (input.value < pqty) {
        var newvalue = parseInt(input.value) + 1;

        input.value = newvalue.toString();
    } else {
        swal("Minimum quantity count has been achieved");

    }

}

function qty_dec() {
    var input = document.getElementById("qtyinput");
    if (input.value > 1) {
        var newvalue = parseInt(input.value) - 1;

        input.value = newvalue.toString();

    } else {
        swal("Maximum quantity count has been achieved");
    }

}


function gotoindexx() {
    window.location = "index.php";
}
// function besicsearch() {
//     var searchtext = document.getElementById("basicsearchtxt").value;
//     var searchselect = document.getElementById("basicsearchselect").value;
//     var searchselect = document.getElementById("basicsearchselect").value;
//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             alert(t);
//             var ar = JSON.parse(t);
//             alert(ar);
//             for (var i = 0; i < ar.length; i++) {

//                 var div = document.createElement("div");
//                 div.className = "card col-6 col-lg-2  mt-1 mb-1 ms-1 ";
//                 var img = document.createElement("img");
//                 img.src = "resources/mobile images/" + ar[i]["image"];
//                 var div1 = document.createElement("div");
//                 div1.className = "card-body";
//                 var h5 = document.createElement("h5");
//                 h5.className = "card-title";
//                 h5.innerHTML = ar[i]["title"];
//                 var span1 = document.createElement("span");
//                 span1.innerHTML = "New";
//                 var span2 = document.createElement("span");
//                 span2.className = "card-text text-primary";
//                 span2.innerHTML = ar[i]["price"];
//                 var br = document.createElement("br");
//                 var span3 = document.createElement("span");
//                 span3.className = "card-text text-warning";
//                 span3.innerHTML = "In Stock";
//                 var input = document.createElement("input");
//                 input.type = "number";
//                 input.value = ar[i]["qty"];
//                 input.className = "form-control mb-1";
//                 var a1 = document.createElement("a");
//                 a1.className = "btn btn-success";
//                 a1.innerHTML = "Buy Now"
//                 var a2 = document.createElement("a");
//                 a2.className = "btn btn-danger";
//                 a2.innerHTML = "Add To Cart";
//                 div.appendChild(div1);
//                 div.appendChild(img);
//                 div1.appendChild(h5);
//                 h5.appendChild(span1);
//                 div1.appendChild(span2);
//                 div1.appendChild(br);
//                 div1.appendChild(span3);
//                 div1.appendChild(input);
//                 div1.appendChild(a1);
//                 div1.appendChild(a2);
//                 document.getElementById("pcat").className = "d-none";
//                 document.getElementById("pdetails").appendChild(div);
//             }
//         }

//     };
//     r.open("GET", "basicsearchprocess.php?t=" + searchtext + "&s=" + searchselect, true);
//     r.send();
// }


// function updateproduct() {
//     var category = document.getElementById("ca");
//     var brand = document.getElementById("br");
//     var model = document.getElementById("mo");
//     var title = document.getElementById("ti");
//     var condition;

//     if (document.getElementById("bn").checked) {
//         condition = "1";
//     } else if (document.getElementById("us").checked) {
//         condition = "2";
//     }

//     var colour;

//     if (document.getElementById("clr1").checked) {
//         colour = "1";
//     } else if (document.getElementById("clr2").checked) {
//         colour = "2";
//     } else if (document.getElementById("clr3").checked) {
//         colour = "3";
//     } else if (document.getElementById("clr4").checked) {
//         colour = "4";
//     } else if (document.getElementById("clr5").checked) {
//         colour = "5";
//     } else if (document.getElementById("clr6").checked) {
//         colour = "6";
//     }

//     var qty = document.getElementById("qty");
//     var price = document.getElementById("cost");
//     var delevery_within_colombo = document.getElementById("dwc");
//     var delevery_outof_colombo = document.getElementById("doc");
//     var description = document.getElementById("desc");
//     var image = document.getElementById("imguploader");

//     // alert(category.value);
//     // alert(brand.value);
//     //  alert(model.value);
//     // alert(title.value);
//     // alert(condition);
//     //alert(qty.value);
//     // alert(price.value);
//     // alert(delevery_within_colombo.value);
//     //alert(delevery_outof_colombo.v
//     // alert(description.value);
//     //alert(image.value);

//     var form = new FormData();
//     form.append("c", category.value);
//     form.append("b", brand.value);
//     form.append("m", model.value);
//     form.append("t", title.value);
//     form.append("co", condition);
//     form.append("col", colour);
//     form.append("qty", qty.value);
//     form.append("p", price.value);
//     form.append("dwc", delevery_within_colombo.value);
//     form.append("doc", delevery_outof_colombo.value);
//     form.append("desc", description.value);
//     form.append("img", image.files[0]);

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             alert(text);
//         }
//     };

//     r.open("POST", "updateProductProcess.php", true);
//     r.send(form);


// }

function updateproduct(id) {
    var category = document.getElementById("ca");
    var brand = document.getElementById("br");
    var model = document.getElementById("mo");
    var title = document.getElementById("ti");
    var condition;

    if (document.getElementById("bn").checked) {
        condition = "1";
    } else if (document.getElementById("us").checked) {
        condition = "2";
    }

    var colour;

    if (document.getElementById("clr1").checked) {
        colour = "1";
    } else if (document.getElementById("clr2").checked) {
        colour = "2";
    } else if (document.getElementById("clr3").checked) {
        colour = "3";
    } else if (document.getElementById("clr4").checked) {
        colour = "4";
    } else if (document.getElementById("clr5").checked) {
        colour = "5";
    } else if (document.getElementById("clr6").checked) {
        colour = "6";
    }

    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var delevery_within_colombo = document.getElementById("dwc");
    var delevery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    var image = document.getElementById("imguploader");

    // alert(category.value);
    // alert(brand.value);
    //  alert(model.value);
    // alert(title.value);
    // alert(condition);
    //alert(qty.value);
    // alert(price.value);
    // alert(delevery_within_colombo.value);
    //alert(delevery_outof_colombo.value);
    // alert(description.value);
    //alert(image.value);

    var form = new FormData();
    form.append("id", id);
    form.append("c", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("t", title.value);
    form.append("co", condition);
    form.append("col", colour);
    form.append("qty", qty.value);
    form.append("p", price.value);
    form.append("dwc", delevery_within_colombo.value);
    form.append("doc", delevery_outof_colombo.value);
    form.append("desc", description.value);
    form.append("img", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                swal(text);
                setInterval(gomy, 3000);
                //   
            } else {
                swal(text);
            }
        }
    };


    r.open("POST", "updateProductProcess.php", true);
    r.send(form);

}

function gomy() {
    window.location = "sellerproductview.php";
}

function pro() {
    window.location = "userprofile.php";
}




function addToWatchList(id) {
    var pid = id;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = this.responseText;
            if (t == "success") {
                window.location = "watchlist.php";
            } else {
                // swal(t);
                window.location = "watchlist.php";
            }

        }
    }
    r.open("GET", "addToWatchlistProcess.php?id=" + pid, true);
    r.send();
}

function deletefromwatchlist(id) {
    var wid = id;
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {

        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                window.location = "watchlist.php";
            }
            // alert(text);
        }
    }
    request.open("GET", "removewatchlistitemprocess.php?id=" + wid, true);
    request.send();

}

function deletefromtrans(id) {
    var wid = id;
    // alert(wid);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {

        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                window.location = "purcheshistory.php";
            }
            // alert(text);
        }
    }
    request.open("GET", "tprocess.php?id=" + wid, true);
    request.send();

}

function addToCart(id) {

    var qtytxt = document.getElementById("qtytxt" + id).value;
    var pid = id;
    //alert(qtytxt);
    //alert(pid);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {
                window.location = "cart.php";
            } else {
                swal(t);

            }

        }
    }
    r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
    r.send();

}

function deletefromcart(id) {
    var cid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
    r.send();
}

function cardd() {
    window.location = "cart.php";
}

function paynow(id) {
    var qty = document.getElementById("qtyinput").value;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = this.responseText;
            var obj = JSON.parse(t);


            var amount = obj["amount"];
            var mail = obj["email"];
            if (t == "1") {
                alert("Please sign in first");
                window.location = "index.php";

            } else if (t == "2") {
                alert("Please update your profile first");
                //window.location = "userprofile.php" + mail;
                window.location = "userprofile.php";
            } else {
                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {

                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, id, mail, amount, qty);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1217925", // Replace your Merchant ID
                    "return_url": "http://localhost/eshop3/singalproductview.php?id=" + id, // Important
                    "cancel_url": "http://localhost/eshop3/singalproductview.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": obj["email"],
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                document.getElementById('payhere-payment').onclick = function(e) {
                    payhere.startPayment(payment);
                };
            }

        }
    }
    r.open("GET", "buynowprocess.php?id=" + id + "&qty=" + qty, true);
    r.send();
}

function paynoww(end) {
    var qty = 2;
    //  alert(end);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = this.responseText;
            //  alert(t);
            var id = 1;
            var obj = JSON.parse(t);


            var amount = obj["amount"];
            var mail = obj["email"];
            if (t == "1") {
                alert("Please sign in first");
                window.location = "index.php";

            } else if (t == "2") {
                alert("Please update your profile first");
                //window.location = "userprofile.php" + mail;
                window.location = "userprofile.php";
            } else {
                //    alert("ok");
                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {

                    console.log("Payment completed. OrderID:" + orderId);
                    saveInvoicee(orderId, id, mail, amount, qty);
                    //  saveInvoice(orderId, mail, amount);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1217925", // Replace your Merchant ID
                    "return_url": "http://localhost/eshop3/cart.php?id=" + id, // Important
                    "cancel_url": "http://localhost/eshop3/cart.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": "",
                    "amount": amount,
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": obj["email"],
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                document.getElementById('payhere-payment').onclick = function(e) {
                    payhere.startPayment(payment);
                };
            }

        }
    }
    r.open("GET", "buynowprocesss.php?end=" + end, true);
    r.send();
}

function gotoadd() {
    window.location = "addproduct.php";
}


function saveInvoicee(orderId, id, mail, amount, qty) {

    //alert(id);
    //alert(orderId);
    //alert(mail);
    //alert(amount);
    //alert(qty);

    var order_id = orderId;
    // alert(order_id);
    var pid = id;
    var email = mail;
    var total = amount;
    var pqty = qty;

    var f = new FormData();
    f.append("oid", order_id);

    f.append("pid", pid);
    f.append("email", email);
    f.append("total", total);
    f.append("pqty", pqty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "1") {

                window.location = "invoice.php?id=" + order_id;

            }
        }
    }

    r.open("POST", "saveinvoicee.php", true);
    r.send(f);
}

function wwwww() {
    window.location = "Video Game Consoles.php";
}

function wwww() {
    window.location = "computer & tablets.php";
}

function www() {
    window.location = "Drones.php";
}

function ww() {
    window.location = "Cameras.php";
}

function w() {
    window.location = "Cell Phone & Accessories.php";
}



function contactadmin() {
    var ea = document.getElementById("ea").value;
    var cn = document.getElementById("cn").value;
    var msg = document.getElementById("msg").value;

    var f = new FormData();
    f.append("ea", ea);
    f.append("cn", cn);
    f.append("msg", msg);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {


                swal("Message Sent Successfully");

                setInterval(goms, 3000);


            } else {

                swal(t);


            }
        }
    }

    r.open("POST", "msgprocess.php", true);
    r.send(f);
}

function goms() {
    window.location = "messages.php";
}


function msgpro(email) {


    var mail = email;

    var blockbutton = document.getElementById("blockbutton" + mail);



    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success1") {
                window.location = "adminmsgpage.php";
                blockbutton.className = "col-12 btn btn-success";
                blockbutton.innerHTML = "Done";
            } else if (t == "success2") {

                blockbutton.className = "col-12 btn btn-danger";
                blockbutton.innerHTML = "Availabel";
            }
        }
    }

    r.open("POST", "adminmsprocess.php", true);
    r.send(f)

}

function detailsmodel(id) {
    alert(id);
}

function printDiv() {

    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
}

function addfeedback(id) {
    var feedmodel = document.getElementById("feedbackModel" + id);
    k = new bootstrap.Modal(feedmodel);
    k.show();
}

function savefeedback(id) {
    var pid = id;
    var feedtxt = document.getElementById("feedtxt").value;
    var f = new FormData();
    f.append("i", pid);
    f.append("ft", feedtxt);

    var r = new XMLHttpRequest();


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            //alert(t);
            if (t == "1") {
                k.hide();

            }
        }
    };
    r.open("POST", "savefeedbackprocess.php", true);
    r.send(f);
}



function saveInvoice(orderId, id, mail, amount, qty) {
    var orderid = orderId;
    var pid = id;
    var email = mail;
    var total = amount;
    var pqty = qty;

    var f = new FromData();
    f.append("oid", orderid);
    f.append("pid", pid);
    f.append("email", email);
    f.append("total", total);
    f.append("pqty", pqty);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "1") {
                window.location = "invoice.php?id=" + orderId;
            }
        }
    }
    r.open("POST", "saveinvoice.php", true)
    r.send(f);
}

function verify() {
    var verificationcode = document.getElementById("v").value;

    //alert(verificationcode);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "adminpanel.php";

            } else {
                swal(t);

            }


        }
    };

    r.open("GET", "verifyprocess.php?v=" + verificationcode, true);
    r.send();
}


var k2;

function adminverification() {
    var e = document.getElementById("e").value;

    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("e", e);

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                var verificationmodal = document.getElementById("verificationmodal");
                var k2 = new bootstrap.Modal(verificationmodal);
                k2.show();

            } else {
                swal(t);

            }

        }
    };

    r.open("POST", "adminverificationprocess.php", true);
    r.send(f);

}


// function blockuser(email) {

//     var email = email;
//     var blockbtn = document.getElementById("blockbtn" + email);

//     var f = new FormData();
//     f.append("e", email);

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {

//         if (r.readyState == 4) {
//             var t = r.responseText;
//             if (t == "success1") {
//                 // window.location = "manageuser.php";
//                 blockbtn.className = "btn btn-success";
//                 blockbtn.innerHTML = "Unblock";
//             } else if (t == "success2") {
//                 // window.location = "manageuser.php";
//                 blockbtn.className = "btn btn-danger";
//                 blockbtn.innerHTML = "Block";
//             }
//         }
//     }
//     r.open("POST", "userBlockProcess.php", true);
//     r.send(f);

// }
function blockusers(email) {


    var mail = email;

    var blockbutton = document.getElementById("blockbutton" + mail);



    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success1") {
                //window.location = "manageusers.php";
                blockbutton.className = "col-12 btn btn-success";
                blockbutton.innerHTML = "Unblock";
            } else if (t == "success2") {
                blockbutton.className = "col-12 btn btn-danger";
                blockbutton.innerHTML = "block";
            }
        }
    }

    r.open("POST", "userBlockProcess.php", true);
    r.send(f)

}


function searchUser() {

    var text = document.getElementById("searchtxt").value;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "manageuser.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "searchuser.php?s=" + text, true);
    r.send();
}

function veriify() {

    window.location = "adminpanel.php";
}



function blockproduct(id) {


    var pid = id;

    var blockp = document.getElementById("blockp" + pid);


    var f = new FormData();
    f.append("id", pid);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                //window.location = "manageusers.php";
                blockp.className = "col-12 btn btn-success";
                blockp.innerHTML = "Unblock";
            } else if (t == "2") {
                blockp.className = "col-12 btn btn-danger";
                blockp.innerHTML = "block";
            }
        }
    }

    r.open("POST", "productBlockProcess.php", true);
    r.send(f)

}

function advancedSearch(x) {
    // alert(x);
    var x = 1;
    var s = document.getElementById("s1").value;
    var ca = document.getElementById("ca1").value;
    var br = document.getElementById("br1").value;
    var mo = document.getElementById("mo1").value;
    var co = document.getElementById("co1").value;
    var col = document.getElementById("col1").value;
    var prif = document.getElementById("prif1").value;
    var prit = document.getElementById("prit2").value;
    var sort = document.getElementById("sort").value;

    // alert(s);
    // alert(ca);
    // alert(br);
    // alert(mo);
    // alert(co);
    // alert(col);
    // alert(prif);
    // alert(prit);

    var form = new FormData();
    form.append("page", x);
    form.append("s", s);
    form.append("c", ca);
    form.append("b", br);
    form.append("m", mo);
    form.append("co", co);
    form.append("col", col);
    form.append("prif", prif);
    form.append("prit", prit);
    form.append("sort", sort);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
            document.getElementById("filter").innerHTML = text;
        }
    };
    r.open("POST", "advancedSearchpro.php", true);
    r.send(form);

}






// function advanseSearch() {
//     var viewresult = document.getElementById("viewresult");
//     var keyword = document.getElementById("k").value;
//     var category = document.getElementById("c").value;
//     var brand = document.getElementById("b").value;
//     var model = document.getElementById("m").value;
//     var condition = document.getElementById("con").value;
//     var color = document.getElementById("clr").value;
//     var pricefrom = document.getElementById("pf").value;
//     var priceto = document.getElementById("pt").value;


//     var f = new FormData();
//     f.append("k", keyword);
//     f.append("c", category);
//     f.append("b", brand);
//     f.append("m", model);
//     f.append("con", condition);
//     f.append("clr", color);
//     f.append("pf", pricefrom);
//     f.append("pt", priceto);




//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;

//             viewresult.innerHTML = t;

//         }
//     }


//     r.open("POST", "advancesearchprocess.php", true);
//     r.send(f);
// }

function dailyselling() {

    // alert("man innoo");
    var from = document.getElementById("fromdate").value;
    // alert(from);
    var to = document.getElementById("todate").value;
    //alert(to);
    // var link = document.getElementById("historylink");
    // alert(link);

    window.location = "productSellingHistory.php?f=" + from + "&t=" + to;

    //  var r = new XMLHttpRequest();
    //  r.onreadystatechange = function() {
    //      if (r.readyState == 4) {
    //         var t = r.responseText;
    //         if (t == "success") {
    //             window.location = "productSellingHistory.php";
    //         }
    //     }
    // }
    // r.open("GET", "dailysellingprocess.php?f=" + from + "&t=" + to, true);
    // r.send();
}

function addnewmodel() {
    var pop = document.getElementById("addnewmodel");

    p = new bootstrap.Modal(pop);
    p.show();
}

function savecategory() {

    var txt = document.getElementById("category").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                p.hide();
                // alert("category saved successfilly");
                window.location = "manageproducts.php";
                alert(t);

            } else {
                alert(t);

            }
        }
    }
    r.open("GET", "addnewcategoryprocess.php?t=" + txt, true);
    r.send();
}

function singeviewmodel(id) {

    var pop = document.getElementById("singaleproductview" + id);

    k = new bootstrap.Modal(pop);
    k.show();
}


// sendmessage

function sendmessage(mail) {

    var email = mail;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "messages.php?email=" + mail;


            } else {
                alert("t");
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}

// refresher

function refresher(email) {

    setInterval(refreshmsgare(email), 500);
    setInterval(refreshrecentarea, 500);
}

// refres msg view area

function refreshmsgare(mail) {

    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;

        }
    }

    r.open("POST", "refreshmsgareaprocess.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
        }
    }

    r.open("POST", "refreshrecentareaprocess.php", true);
    r.send();

}

function sendSellerEmaill(mail) {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            window.location = "messages.php";

        }
    }

    r.open("GET", "messages.php?email=" + mail, true);
    r.send();
}

function sendSellerEmail(mail) {


    window.location = "messages.php?email=" + mail;



}

function viewmsgmodel() {

    var pop = document.getElementById("msgmodel");

    k = new bootstrap.Modal(pop);
    k.show();
}

function adminchat(mail) {

    var email = mail;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("admin", email);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "messages.php?email=" + mail;
                // alert("Message Sent Successfully");

            } else {
                alert("t");
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);
}




function goToProductUpdate() {
    window.location = "addproduct.php";
}

function adminsignout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminsignin.php";
            }
        }
    };

    r.open("GET", "adminsignout.php", true);
    r.send();
}



// function advancedSearch(x) {
//     // alert(x);
//     // var x = 1;
//     var s = document.getElementById("s1").value;
//     var ca = document.getElementById("ca1").value;
//     var br = document.getElementById("br1").value;
//     var mo = document.getElementById("mo1").value;
//     var co = document.getElementById("co1").value;
//     var col = document.getElementById("col1").value;
//     var prif = document.getElementById("prif1").value;
//     var prit = document.getElementById("prit2").value;

//     // alert(s);
//     // alert(ca);
//     // alert(br);
//     // alert(mo);
//     // alert(co);
//     // alert(col);
//     // alert(prif);
//     // alert(prit);

//     var form = new FormData();
//     form.append("page", x);
//     form.append("s", s);
//     form.append("c", ca);
//     form.append("b", br);
//     form.append("m", mo);
//     form.append("co", co);
//     form.append("col", col);
//     form.append("prif", prif);
//     form.append("prit", prit);


//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             // 
//             document.getElementById("filter").innerHTML = text;
//         }
//     };
//     r.open("POST", "advancedSearchpro.php", true);
//     r.send(form);

// }


function advancedSearch(x) {
    // alert(x);
    // var x = 1;
    var s = document.getElementById("s1").value;
    var ca = document.getElementById("ca1").value;
    var br = document.getElementById("br1").value;
    var mo = document.getElementById("mo1").value;
    var co = document.getElementById("co1").value;
    var col = document.getElementById("col1").value;
    var prif = document.getElementById("prif1").value;
    var prit = document.getElementById("prit2").value;
    var sort = document.getElementById("sort").value;

    // alert(s);
    // alert(ca);
    // alert(br);
    // alert(mo);
    // alert(co);
    // alert(col);
    // alert(prif);
    // alert(prit);

    var form = new FormData();
    form.append("page", x);
    form.append("s", s);
    form.append("c", ca);
    form.append("b", br);
    form.append("m", mo);
    form.append("co", co);
    form.append("col", col);
    form.append("prif", prif);
    form.append("prit", prit);
    form.append("sort", sort);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // 
            document.getElementById("filter").innerHTML = text;
        }
    };
    r.open("POST", "advancedSearchpro.php", true);
    r.send(form);

}

function adminsigninpage() {
    window.location = "adminsignin.php";
}


// function basicSearch() {

//     var searchText = document.getElementById("basic_search_txt").value;
//     var searchSelect = document.getElementById("basic_search_select").value;
//     var cardrow = document.getElementById("pdetails");
//     cardrow.className = "d-none";
//     var cardcat = document.getElementById("pcat");
//     cardcat.className = "d-none";

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {

//         if (r.readyState == 4) {
//             var t = r.responseText;
//             //Salert(t);
//             var ar = JSON.parse(t);
//             //alert(ar);
//             for (var i = 0; i < ar.length; i++) {

//                 var divrowcol = document.createElement("div");
//                 divrowcol.className = "col-12";

//                 var divrow = document.createElement("div");
//                 divrow.className = "row";
//                 var div = document.createElement("div");
//                 div.className = "card col-6 col-lg-2 mt-1 mb-1 ms-1";
//                 var img = document.createElement("img");
//                 // img.src = "resources/mobile images/" + ar[i]["img"];
//                 img.src = ar[i]["img"];
//                 var div1 = document.createElement("div");
//                 div1.className = "card-body";
//                 var h5 = document.createElement("h5");
//                 h5.className = "card-title";
//                 h5.innerHTML = ar[i]["title"];
//                 var span1 = document.createElement("span");
//                 span1.innerHTML = "New";
//                 var span2 = document.createElement("span");
//                 span2.className = "card-text text-primary";
//                 span2.innerHTML = ar[i]["price"];
//                 var br = document.createElement("br");
//                 var span3 = document.createElement("span");
//                 span3.className = "card-text text-warning";
//                 span3.innerHTML = "In Stock";
//                 var input = document.createElement("input");
//                 input.type = "number";
//                 input.value = ar[i]["qty"];
//                 input.className = "form-control mb-1";
//                 var a1 = document.createElement("a");
//                 a1.className = "btn btn-success";
//                 a1.innerHTML = "Buy Now"
//                 var a2 = document.createElement("a");
//                 a2.className = "btn btn-danger";
//                 a2.innerHTML = "Add To Cart";

//                 divrowcol.appendChild(divrow);
//                 divrow.appendChild(div);
//                 div.appendChild(div1);
//                 div.appendChild(img);
//                 div1.appendChild(h5);
//                 h5.appendChild(span1);
//                 div1.appendChild(span2);
//                 div1.appendChild(br);
//                 div1.appendChild(span3);
//                 div1.appendChild(input);
//                 div1.appendChild(a1);
//                 div1.appendChild(a2);

//                 document.getElementById("pdiv").appendChild(divrow);


//             }
//         }
//     }

//     r.open("GET", "basicSearchProcess.php?t=" + searchText + "&s=" + searchSelect, true);
//     r.send();

// }


function ClearAllRecords() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            if (t == "success") {

                window.location = "purcheshistory.php";
            }
        }
    };

    r.open("GET", "ClearAllRecords.php", true);
    r.send();
}







console.clear();

const { gsap, imagesLoaded } = window;

const buttons = {
    prev: document.querySelector(".btn--left"),
    next: document.querySelector(".btn--right"),
};
const cardsContainerEl = document.querySelector(".cards__wrapper");
const appBgContainerEl = document.querySelector(".app__bg");

const cardInfosContainerEl = document.querySelector(".info__wrapper");

buttons.next.addEventListener("click", () => swapCards("right"));

buttons.prev.addEventListener("click", () => swapCards("left"));

function swapCards(direction) {
    const currentCardEl = cardsContainerEl.querySelector(".current--card");
    const previousCardEl = cardsContainerEl.querySelector(".previous--card");
    const nextCardEl = cardsContainerEl.querySelector(".next--card");

    const currentBgImageEl = appBgContainerEl.querySelector(".current--image");
    const previousBgImageEl = appBgContainerEl.querySelector(".previous--image");
    const nextBgImageEl = appBgContainerEl.querySelector(".next--image");

    changeInfo(direction);
    swapCardsClass();

    removeCardEvents(currentCardEl);

    function swapCardsClass() {
        currentCardEl.classList.remove("current--card");
        previousCardEl.classList.remove("previous--card");
        nextCardEl.classList.remove("next--card");

        currentBgImageEl.classList.remove("current--image");
        previousBgImageEl.classList.remove("previous--image");
        nextBgImageEl.classList.remove("next--image");

        currentCardEl.style.zIndex = "50";
        currentBgImageEl.style.zIndex = "-2";

        if (direction === "right") {
            previousCardEl.style.zIndex = "20";
            nextCardEl.style.zIndex = "30";

            nextBgImageEl.style.zIndex = "-1";

            currentCardEl.classList.add("previous--card");
            previousCardEl.classList.add("next--card");
            nextCardEl.classList.add("current--card");

            currentBgImageEl.classList.add("previous--image");
            previousBgImageEl.classList.add("next--image");
            nextBgImageEl.classList.add("current--image");
        } else if (direction === "left") {
            previousCardEl.style.zIndex = "30";
            nextCardEl.style.zIndex = "20";

            previousBgImageEl.style.zIndex = "-1";

            currentCardEl.classList.add("next--card");
            previousCardEl.classList.add("current--card");
            nextCardEl.classList.add("previous--card");

            currentBgImageEl.classList.add("next--image");
            previousBgImageEl.classList.add("current--image");
            nextBgImageEl.classList.add("previous--image");
        }
    }
}

function changeInfo(direction) {
    let currentInfoEl = cardInfosContainerEl.querySelector(".current--info");
    let previousInfoEl = cardInfosContainerEl.querySelector(".previous--info");
    let nextInfoEl = cardInfosContainerEl.querySelector(".next--info");

    gsap.timeline()
        .to([buttons.prev, buttons.next], {
            duration: 0.2,
            opacity: 0.5,
            pointerEvents: "none",
        })
        .to(
            currentInfoEl.querySelectorAll(".text"), {
                duration: 0.4,
                stagger: 0.1,
                translateY: "-120px",
                opacity: 0,
            },
            "-="
        )
        .call(() => {
            swapInfosClass(direction);
        })
        .call(() => initCardEvents())
        .fromTo(
            direction === "right" ?
            nextInfoEl.querySelectorAll(".text") :
            previousInfoEl.querySelectorAll(".text"), {
                opacity: 0,
                translateY: "40px",
            }, {
                duration: 0.4,
                stagger: 0.1,
                translateY: "0px",
                opacity: 1,
            }
        )
        .to([buttons.prev, buttons.next], {
            duration: 0.2,
            opacity: 1,
            pointerEvents: "all",
        });

    function swapInfosClass() {
        currentInfoEl.classList.remove("current--info");
        previousInfoEl.classList.remove("previous--info");
        nextInfoEl.classList.remove("next--info");

        if (direction === "right") {
            currentInfoEl.classList.add("previous--info");
            nextInfoEl.classList.add("current--info");
            previousInfoEl.classList.add("next--info");
        } else if (direction === "left") {
            currentInfoEl.classList.add("next--info");
            nextInfoEl.classList.add("previous--info");
            previousInfoEl.classList.add("current--info");
        }
    }
}

function updateCard(e) {
    const card = e.currentTarget;
    const box = card.getBoundingClientRect();
    const centerPosition = {
        x: box.left + box.width / 2,
        y: box.top + box.height / 2,
    };
    let angle = Math.atan2(e.pageX - centerPosition.x, 0) * (35 / Math.PI);
    gsap.set(card, {
        "--current-card-rotation-offset": `${angle}deg`,
    });
    const currentInfoEl = cardInfosContainerEl.querySelector(".current--info");
    gsap.set(currentInfoEl, {
        rotateY: `${angle}deg`,
    });
}

function resetCardTransforms(e) {
    const card = e.currentTarget;
    const currentInfoEl = cardInfosContainerEl.querySelector(".current--info");
    gsap.set(card, {
        "--current-card-rotation-offset": 0,
    });
    gsap.set(currentInfoEl, {
        rotateY: 0,
    });
}

function initCardEvents() {
    const currentCardEl = cardsContainerEl.querySelector(".current--card");
    currentCardEl.addEventListener("pointermove", updateCard);
    currentCardEl.addEventListener("pointerout", (e) => {
        resetCardTransforms(e);
    });
}

initCardEvents();

function removeCardEvents(card) {
    card.removeEventListener("pointermove", updateCard);
}

function init() {

    let tl = gsap.timeline();

    tl.to(cardsContainerEl.children, {
            delay: 0.15,
            duration: 0.5,
            stagger: {
                ease: "power4.inOut",
                from: "right",
                amount: 0.1,
            },
            "--card-translateY-offset": "0%",
        })
        .to(cardInfosContainerEl.querySelector(".current--info").querySelectorAll(".text"), {
            delay: 0.5,
            duration: 0.4,
            stagger: 0.1,
            opacity: 1,
            translateY: 0,
        })
        .to(
            [buttons.prev, buttons.next], {
                duration: 0.4,
                opacity: 1,
                pointerEvents: "all",
            },
            "-=0.4"
        );
}

function gotocart() {
    window.location = "home.php";
}

const waitForImages = () => {
    const images = [...document.querySelectorAll("img")];
    const totalImages = images.length;
    let loadedImages = 0;
    const loaderEl = document.querySelector(".loader span");

    gsap.set(cardsContainerEl.children, {
        "--card-translateY-offset": "100vh",
    });
    gsap.set(cardInfosContainerEl.querySelector(".current--info").querySelectorAll(".text"), {
        translateY: "40px",
        opacity: 0,
    });
    gsap.set([buttons.prev, buttons.next], {
        pointerEvents: "none",
        opacity: "0",
    });

    images.forEach((image) => {
        imagesLoaded(image, (instance) => {
            if (instance.isComplete) {
                loadedImages++;
                let loadProgress = loadedImages / totalImages;

                gsap.to(loaderEl, {
                    duration: 1,
                    scaleX: loadProgress,
                    backgroundColor: `hsl(${loadProgress * 120}, 100%, 50%`,
                });

                if (totalImages == loadedImages) {
                    gsap.timeline()
                        .to(".loading__wrapper", {
                            duration: 0.8,
                            opacity: 0,
                            pointerEvents: "none",
                        })
                        .call(() => init());
                }
            }
        });
    });
};

waitForImages();