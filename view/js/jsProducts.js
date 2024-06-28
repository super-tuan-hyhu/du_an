var productsCustoms = document.querySelectorAll('input[name="size"]');
var productsList = document.querySelectorAll('.productSize');

function actionClickProduct(actionCustomer, actionList){
    actionCustomer.forEach (function(item, i){
        item.onclick = function(){
            actionList.forEach(function(item){
                item.classList.remove('activea');
            });
            actionList[i].classList.add('activea');
        };
    });
}

productsCustoms ? actionClickProduct(productsCustoms, productsList) : {};


function tang(){
    if(document.getElementById('quantity_1').value < parseInt(document.getElementById('slll').value)){
        document.getElementById('quantity_1').value++;
    }
}

function giam(){
    if(document.getElementById('quantity_1').value >1 ){
        document.getElementById('quantity_1').value--;
    }if(document.getElementById('quantity_1').value <0){
        document.getElementById('quantity_1').value =1;
    }
}





// let inputtt = document.getElementById("inputTag");
// let imageName = document.getElementById("imageName")

// inputtt.addEventListener("change", () =>{
//     let inputImage = document.querySelector("input[type=file]").files[0];
//     imageName.innerText = inputImage.name;
// })

$(document).ready(function() {
	
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả các nút mở modal
    let openModels = document.querySelectorAll('.tooltip-1');

    // Lặp qua từng nút và thêm sự kiện click
    openModels.forEach((openModel) => {
        openModel.addEventListener('click', () => {
            // Lấy phần tử modal tương ứng với nút được nhấn
            let modalId = openModel.getAttribute('data-bs-target');
            let modal = document.querySelector(modalId);

            // Kiểm tra xem modal có tồn tại hay không
            if (modal) {
                // Ẩn tất cả các modal khác
                let allModals = document.querySelectorAll('.product-modal');
                allModals.forEach((otherModal) => {
                    if (otherModal !== modal) {
                        otherModal.style.display = 'none';
                    }
                });

                // Hiển thị modal
                modal.style.display = 'block';
            }
        });
    });

    // Lấy tất cả các nút close
    let closeModels = document.querySelectorAll('.btn-close');

    // Lặp qua từng nút close và thêm sự kiện click
    closeModels.forEach((closeModel) => {
        closeModel.addEventListener('click', () => {
            // Tìm phần tử modal chứa nút close được nhấn
            let modal = closeModel.closest('.product-modal');
            
            // Đóng modal
            if (modal) {
                modal.style.display = 'none';
            }
        });
    });
});

var sl0 = document.getElementsByClassName('sl0');
var pr0 = document.getElementsByClassName('pr0');
var price0 = document.getElementsByClassName('price_0');

function tangTotal(i){
    sl0[i].value++;
    var coten = parseInt(sl0[i].value) * parseInt(pr0[i].value);
    price0[i].innerHTML = coten.toLocaleString("en-US") + "VND";
    var sl = 0;
    var tong = 0;
    for(var j=0;j<sl0.length; j++){
        tong = tong + parseInt(sl0[j].value) * parseInt(pr0[j].value);
        sl = sl + parseInt(sl0[j].value);
    }

    document.getElementById('total-product').innerHTML = sl;
    document.getElementById('total-not-discount').innerHTML = tong.toLocaleString("en-US") + "VND";
    document.getElementById('order-price-total').innerHTML = tong.toLocaleString("en-US") + "VND";
}

function giamTotal(i){
    if(sl0[i].value >1){
        sl0[i].value--;
        var coten = parseInt(sl0[i].value) * parseInt(pr0[i].value);
        price0[i].innerHTML = coten.toLocaleString("en-US") + "VND";
        var sl = 0;
        var tong = 0;
        for(var j=0;j<sl0.length; j++){
            tong = tong + parseInt(sl0[j].value) * parseInt(pr0[j].value);
            sl = sl + parseInt(sl0[j].value);
        }

        document.getElementById('total-product').innerHTML = sl;
        document.getElementById('total-not-discount').innerHTML = tong.toLocaleString("en-US") + "VND";
        document.getElementById('order-price-total').innerHTML = tong.toLocaleString("en-US") + "VND";
    }
    
if(document.getElementById('sl0').value <0)
    document.getElementById('sl0').value= 1;
}

window.onscroll = function() {stickyMenu()};

// Định nghĩa hàm khi sự kiện cuộn trang được kích hoạt
var menu, sticky;
menu = document.getElementById('Menu');
sticky = menu.offsetTop;

function stickyMenu() {
    if(window.pageYOffset >= sticky) {
        menu.classList.add("sticky");
    }else{
        menu.classList.remove("sticky");    
    }
}

