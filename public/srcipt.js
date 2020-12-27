// MENU RED LINE
var menuItems = document.getElementsByClassName("menu-item");
Array.from(menuItems).forEach(function (element) {
    element.addEventListener("click", function (event) {
        toggleMobileMenu(false);
        if (event.currentTarget.classList.contains("active")) {
            return;
        }
        removeClass("menu-item active", "active");
        element.classList.add("active");
        if (element.getAttribute("data-element")) {
            smoothscroll(element.getAttribute("data-element"));
        }
    });
});

// SCROLL MENU
function smoothscroll(elemID) {
    if (screen.width < 768) {
        var scroll = document.querySelector("#" + elemID).offsetTop;
    } else {
        var scroll =
            document.querySelector("#" + elemID).offsetTop -
            document.querySelector("#header").offsetHeight;
    }
    window.scrollTo({
        top: scroll,
        behavior: "smooth",
    });
}

function removeClass(elements, className) {
    var activeElements = document.getElementsByClassName(elements);
    Array.from(menuItems).forEach(function (element) {
        element.classList.remove(className);
    });
}

function handleScroll(position) {
    if (position === 0) {
        document.body.querySelector("header").classList.remove("black");
    }
    if (position > 0) {
        document.body.querySelector("header").classList.add("black");
    }
}

window.addEventListener("scroll", function(event) {
    debounce(handleScroll, this.scrollY, 10);
});

function debounce(method, props, delay) {
    if (method._tId) {
        clearTimeout(method._tId);
    }
    method._tId = setTimeout(function () {
        method(props);
    }, delay);
}

// DRAG AND DROP
var myDropzone = new Dropzone("#upload", {
    url: "http://localhost/toyota/public/upload-image",
    thumbnailWidth: null,
    thumbnailHeight: null,
    previewTemplate:
        '<div class="dz-preview dz-file-preview"> <img class="thumbnail" data-dz-thumbnail /> <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div> </div>',
    success: function (file, res) {
        $("#img").val(res.path);
        $(".regular-upload").remove();
    },
});
myDropzone.on("sending", function (file, formData) {
    console.log(formData);
});

// INIT
handleScroll(window.scrollY);
$('#arrow-right').hide();
$(".input").focus(function () {
    $(this).removeClass("error");
    $('#'+$(this).attr("id")+'_error').text("");
});

$(".checkbox").change(function () {
    $(this).removeClass("error");
    $('#'+$(this).attr("id")+'_error').text("");
});

$(".custom-file-upload").click(function () {
    $(this).removeClass("error");
    $("#img_error").text("");
});

$(".preview").click(function () {
    $(this).removeClass("error");
    $("#img_error").text("");
});

// image upload
document.getElementById("file-upload").onchange = function () {
    var formData = new FormData();
    formData.append("_token", $('meta[name="csrf-token"]').attr("content"));
    formData.append("file", $("#file-upload")[0].files[0]);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: window.location.href+'upload-image',
        data: formData, // serializes the form's elements.
        cache: false,
        contentType: false,
        processData: false,
        timeout: 600000,
        success: function (data) {
            if (data.path) {
                $(".thumbnail").remove();
                $("#img").val(data.path);
                var elem = $(
                    '<img class="thumbnail regular-upload" src="'+data.path+'">'
                );
                elem.appendTo(".preview");
            }
        },
        error: function (e) {
            console.log("ERROR : ", e);
        },
    });
};

// get images build gallery
var page = 1;
var per_page = screen.width < 768 ? 4 : 6;
var fetchedPages = {};
var total_pages = 0;
$.ajax({
    type: "POST",
    url: window.location.href+'get-images',
    data: {
        _token: $('meta[name="csrf-token"]').attr("content"),
        page: page,
        per_page: per_page,
    },
    success: function (data, status, xhr) {
        if(!data.error && (data.results && data.results.length > 0)){
            total_pages = data.total_pages;
            fetchedPages[page] = true;
            page = page;
            createSlider();
            generateSlides(data, per_page);
            checkImageURL();
        }
    },
});

function generateSlides(data, per_page) {
    if(per_page === 6){
            data.results.forEach(function (item) {
                var elem = $( '<div class="keen-slider__slide"><img class="slider-img"src="'+item.img+'"><div class="user_name">'+item.first_name+'</div></div>' );
                $('#keen-slider').slick('slickAdd',elem);
            });
    }else{
        var elem = '';
        $.each( data.results, function( key, value ) {
            if(key % 2 == 0){
                elem += '<div class="keen-slider__slide"><div class="slide-wraper">';
                elem += '<div><img class="slider-img"src="'+value.img+'"><div class="user_name">'+value.first_name+'</div></div>';
            }else{
                elem += '<div><img class="slider-img"src="'+value.img+'"><div class="user_name">'+value.first_name+'</div></div>';
                elem += '</div></div>';
            }
        });
        $('#keen-slider').slick('slickAdd',elem);
    }
}
function checkImageURL(imgurl) {
    $("#keen-slider img").on("error", function (e) {
        $(this).remove();
    });
}

var slider;
var realSlide;
var slidesToShow = screen.width < 768 ? 2 : 3;
function createSlider() {
    // SLIDER
    $('#keen-slider').slick({
        rtl: true,
        arrows: true,
        infinite: false,
        prevArrow: $('#arrow-right'),
        nextArrow: $('#arrow-left'),
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
      });

     // On before slide change
    $('#keen-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        
        if(nextSlide + slidesToShow == slick.slideCount ){
        // if(nextSlide == (slick.slideCount-1)){
            getImageFromServer();
        }
    });

    $('#keen-slider').on('afterChange', function(event, slick, currentSlide){
        if(currentSlide === 0){
            $('#arrow-right').hide();
        }else{
            $('#arrow-right').show();
        }

        if(currentSlide + slidesToShow == slick.slideCount ){
            $('#arrow-left').hide();
        }else{
            $('#arrow-left').show();
        }
    });

    function getImageFromServer(){
        var per_page = screen.width < 768 ? 4 : 6;
        var go_to_page = ++page;
        
        if(fetchedPages[go_to_page] || go_to_page > total_pages){
            // already fetched this page
            return false;
        }

        var data = 'page='+go_to_page+'&per_page='+per_page;
        // data = `${data}&_token=${$(\'meta[name="csrf-token"]').attr( "content" )}`;
        data = data+'&_token='+$('meta[name="csrf-token"]').attr( "content" );
        $.ajax({
            type: "POST",
            url: window.location.href+'get-images',
            data: data,
            success: function (data, status, xhr) {
                if(!data.error && (data.results && data.results.length > 0)){
                    fetchedPages[go_to_page] = true;
                    page = go_to_page;
                    generateSlides(data, per_page);
                    checkImageURL();
                }
            },
        });
    }
}

// LEAD FORM
$("#lead-form .submit").click(function (e) {
    if (!isValidLeadForm()) {
        return false;
    }
    var data = $("#lead-form").serialize();
    // data = `${data}&_token=${$('meta[name="csrf-token"]').attr("content")}`;
    data = data+'&_token='+$('meta[name="csrf-token"]').attr( "content" );
    $.ajax({
        type: "POST",
        url: window.location.href+'create-lead',
        data: data,
        success: function (data, status, xhr) {
            if (data.error) {
                handleFormErrors(data.messages);
            } else {
                // success lead form
                $('.success_overlay').addClass('show');
                $("#success").show();
            }
        },
    });
});

function isValidLeadForm() {
    // 'first_name' => 'required|string|min:2',
    // 'last_name' => 'required|string|min:2',
    // 'phone' => 'required|regex:/^05\d\d{7}$/',
    // 'email' => 'required|email',
    // 'img' => 'required|url',
    var mail_pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var phone_pattern = /^05\d\d{7}$/;
    var errors = {};
    var first_name_val = $("#first_name").val();
    var last_name_val = $("#last_name").val();
    var phone_val = $("#phone").val();
    var email_val = $("#email").val();
    var img_val = $("#img").val();
    if (!$("#approve").is(":checked")) {
        errors["approve"] = ["required"];
    }
    if (!first_name_val) {
        errors["first_name"] = ["required"];
    }
    if (!last_name_val) {
        errors["last_name"] = ["required"];
    }
    if (!phone_val) {
        errors["phone"] = ["required"];
    }
    if (!email_val) {
        errors["email"] = ["required"];
    }
    if (!img_val) {
        errors["img"] = ["required"];
        $(".custom-file-upload, .preview").addClass("error");
    }

    if (email_val && !mail_pattern.test(String(email_val).toLowerCase())) {
        errors["email"] = ["invalid"];
    }
    if (phone_val && !phone_pattern.test(String(phone_val).toLowerCase())) {
        errors["phone"] = ["invalid"];
    }

    handleFormErrors(errors);
    if ($.isEmptyObject(errors)) {
        return true;
    }
    return false;
}

function handleFormErrors(errors) {
    var fields_names = {
        first_name: "שם פרטי",
        last_name: "שם משפחה",
        phone: "טלפון",
        email: "דואר אלקטרוני",
        img: "תמונה",
        approve: "תקנון",
    };
    $.each(errors, function (key, valueObj) {
        switch (valueObj[0]) {
            case "invalid":
                $("#"+key).addClass("error");
                $("#"+key+'_error').text(fields_names[key]+' לא תקין');
                break;
            case "required":
                $("#"+key).addClass("error");
                $("#"+key+'_error').text(fields_names[key]+' שדה חובה');
                break;
            default:
                break;
        }
    });
}

// hamburger
$(".hamburger").click(function () {
    toggleMobileMenu(true);
});

$(".close-popup").click(function () {
    toggleMobileMenu(false);
});

function toggleMobileMenu(state) {
    if (state) {
        $("#header ul .wrapper").addClass("size-up");
        setTimeout(function () {
            $("#header ul .wrapper").addClass("active");
        }, 100);
    } else {
        $("#header ul .wrapper").removeClass("active");
        setTimeout(function () {
            $("#header ul .wrapper").removeClass("size-up");
        }, 500);
    }
}
