;(function($){
    "use strict"

        var window_width = $(window).width(),
            window_height = window.innerHeight,
            header_height = $(".default-header").height(),
            header_height_static = $(".site-header.static").outerHeight(),
            fitscreen = window_height - header_height;

        $(".fullscreen").css("height", window_height);
        $(".fitscreen").css("height", fitscreen);


    /* ---------------------------------------------
        Nice Select js
     --------------------------------------------- */


        $('select').niceSelect();


    /* ---------------------------------------------
       Top Cart js
     --------------------------------------------- */


    $(".top-cart").on('click', function (event) {
        $(".mini-cart").slideToggle();  // Might cause problems depending on implementation
        event.stopPropagation();

        $(document).on('click', function (e) {
            if(!$(e.target).is('.top-cart')) {
                $(".mini-cart").slideUp();
            }
        });
    });


    /* ---------------------------------------------
        Initiate superfish on nav menu
     --------------------------------------------- */

        $('.nav-menu').superfish({
            animation: {
                opacity: 'show'
            },
            speed: 400
        });


    /* ---------------------------------------------
        Mobile Navigation
     --------------------------------------------- */

    if ($('#nav-menu-container').length) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="icons icon-menu"></i></button>');
        $('body').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="icons icon-arrow-down"></i>');

        $(document).on('click', '.menu-has-children i', function(e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("icon-arrow-up icon-arrow-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function(e) {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('lnr-cross icon-menu');
            $('#mobile-body-overly').toggle();
        });

        $(document).on('click',function(e){
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-cross icon-menu');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });



    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }


    /* -------------------------------------------------------------------
        Smooth scroll for the menu and links with .scrollto classes
     ------------------------------------------------------------------ */

        $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var target = $(this.hash);
                if (target.length) {
                    var top_space = 0;

                    if ($('#header').length) {
                        top_space = $('#header').outerHeight();

                        if (!$('#header').hasClass('header-fixed')) {
                            top_space = top_space;
                        }
                    }

                    $('html, body').animate({
                        scrollTop: target.offset().top - top_space
                    }, 1500, 'easeInOutExpo');

                    if ($(this).parents('.nav-menu').length) {
                        $('.nav-menu .menu-active').removeClass('menu-active');
                        $(this).closest('li').addClass('menu-active');
                    }

                    if ($('body').hasClass('mobile-nav-active')) {
                        $('body').removeClass('mobile-nav-active');
                        $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
                        $('#mobile-body-overly').fadeOut();
                    }
                    return false;
                }
            }
        });

        $(document).on('ready', function() {

            $('html, body').hide();

            if (window.location.hash) {

                setTimeout(function() {

                    $('html, body').scrollTop(0).show();

                    $('html, body').animate({

                        scrollTop: $(window.location.hash).offset().top - 68

                    }, 1000)

                }, 0);

            } else {

                $('html, body').show();

            }

        });



        jQuery(document).on('ready', function($) {

        });


        // Get current path and find target link
        var path = window.location.pathname.split("/").pop();

        // Account for home page with empty path
        if (path === '') {
            path = 'index.php';
        }

        var target = $('nav a[href="' + path + '"]');
        // Add active class to target link
        target.addClass('menu-active');

        $(document).on('ready', function() {
            if ($('.menu-has-children ul>li a').hasClass('menu-active')) {
                $('.menu-active').closest("ul").parentsUntil("a").addClass('parent-active');
            }
        });


    /* -------------------------------------------------------------------
        Header Scroll Class js
     ------------------------------------------------------------------ */

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 100) {
                $('#header').addClass('header-scrolled');
            } else {
                $('#header').removeClass('header-scrolled');
            }
        });


    /* -------------------------------------------------------------------
        MailChimp js
     ------------------------------------------------------------------ */

    $(document).on('ready', function() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    });


    /* -------------------------------------------------------------------
        Have Cupon Button Text Toggle Change
     ------------------------------------------------------------------ */

    if (document.getElementById("cuppon-wrap")) {

        $('.cuppon-wrap .have-btn').on('click', function(e){
            e.preventDefault();
            $('.cuppon-wrap .have-btn span').text(function(i, text){
              return text === "Have a Coupon?" ? "Close Coupon" : "Have a Coupon?";
            })
            $('.cuppon-wrap .cupon-code').fadeToggle("slow");
        });

        $('.load-more-btn').on('click', function(e){
            e.preventDefault();
            $('.load-product').fadeIn('slow');
            $(this).fadeOut();
        });

    }

    /* -------------------------------------------------------------------
        Quantity js
     ------------------------------------------------------------------ */


    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="icons icon-arrow-up"></i></div><div class="quantity-button quantity-down"><i class="icons icon-arrow-down"></i></div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.on('click', function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.on('click', function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });


    /* -------------------------------------------------------------------
        Settings Vertial tab js
     ------------------------------------------------------------------ */

      $( function() {
        $( "#tabs" ).tabs();
      } );



    /* -------------------------------------------------------------------
        Chart js
     ------------------------------------------------------------------ */
    //Look on footer or earning page
    // if (document.getElementById("sales-chart")) {
    //
    //     var canvas = document.getElementById("sales-chart");
    //     var ctx = canvas.getContext('2d');
    //
    //     // Global Options:
    //      Chart.defaults.global.defaultFontColor = '#797979';
    //      Chart.defaults.global.defaultFontSize = 14;
    //
    //     // Data with datasets options
    //     var data = {
    //         labels: ["2017","2018"],
    //           datasets: [
    //             {
    //                 label: "Sales",
    //                 fill: true,
    //                 backgroundColor: "#ecf7fe",
    //                 borderColor: "#DC143C",
    //                 data: [72, 32],
    //             }
    //         ]
    //     };
    //     // Chart declaration with some options:
    //     var myFirstChart = new Chart(ctx, {
    //         type: 'line',
    //         data: data
    //     })
    //
    // }



    /* -------------------------------------------------------------------
        Category and Settings Menu Dropdown js
     ------------------------------------------------------------------ */

    if (document.getElementById("cat-menu")) {

          // Create the dropdown base
          $("<select />").appendTo(".cat-nav-menu");

          // Create default option "Go to..."
          $("<option />", {
             "selected": "selected",
             "value"   : "",
             "text"    : "Select Category"
          }).appendTo("select");

          // Populate dropdown with menu items
          $(".cat-menu a").each(function() {
           var el = $(this);
           $("<option />", {
               "value"   : el.attr("href"),
               "text"    : el.text()
           }).appendTo("select");
          });


          $("select").change(function() {
            window.location = $(this).find("option:selected").val();
          });
          $('select').niceSelect();
    }

    // Settings Menu

    if (document.getElementById("usr-menu")) {

          // Create the dropdown base
          $("<select />").appendTo(".usr-menu");

          // Create default option "Go to..."
          $("<option />", {
             "selected": "selected",
             "value"   : "",
             "text"    : "profile"
          }).appendTo("select");

          // Populate dropdown with menu items
          $(".top-nav a").each(function() {
           var el = $(this);
           $("<option />", {
               "value"   : el.attr("href"),
               "text"    : el.text()
           }).appendTo("select");
          });


          $("select").change(function() {
            window.location = $(this).find("option:selected").val();
          });
          $('select').niceSelect();
    }


    //custom js
    /***************************************************************/
    /***************************************************************/
    /***************************************************************/

    // $('button.delete-btn').confirm({
    //     title: 'Are you sure?',
    //     content: "Apakah Anda benar-benar ingin menghapus item ini? Proses ini tidak dapat dibatalkan setelah terhapus.",
    //     type: 'red',
    //     typeAnimated: true,
    //     buttons: {
    //         confirm: function () {
    //             //confirm("Click OK to continue?");
    //             $(this).closest('#deleteFrom').submit();
    //         },
    //         cancel: function () {
    //             $.alert('Dibatalkan!');
    //         }
    //     }
    // });


    //Dashboard's and Other Notification Auto Hide FlashData Notification
    $(".alert.alert-info").delay(3000).hide("Slow");
    $(".alert.alert-danger").delay(3000).hide("Slow");
    $(".alert.alert-warning").delay(3000).hide("Slow");
    $(".ajaxNoti").delay(3000).hide("Slow");


    var askConfirmation = true;
    $('body').on('click','.delete-btn', function(e) {
        e.preventDefault(); // dont submit the form, ask for confirmation first.
      if (askConfirmation) {
        $.confirm({
            title: 'Are you sure?',
            content: "Apakah Anda benar-benar ingin menghapus item ini? Proses ini tidak dapat dibatalkan setelah terhapus.",
            type: 'red',
            typeAnimated: true,
          buttons: {
            confirm: {
              text: "Konfirmasi",
              btnClass: 'btn-danger',
              action: function() {
                askConfirmation = false; // done asking confirmation, now submit the form
                $('#deleteFrom').submit();
              }
            },
            cancel: {
              text: "Batalkan",
              btnClass: 'btn-default'
            }
          }
        });
      }
  });


    var askConfirmation = true;
    $('body').on('click','.delete-item', function(e) {
        var thisBtn = $(this).closest('form');
        e.preventDefault(); // dont submit the form, ask for confirmation first.
      if (askConfirmation) {
        $.confirm({
            title: 'Are you sure?',
            content: "Apakah Anda benar-benar ingin menghapus item ini? Proses ini tidak dapat dibatalkan setelah terhapus.",
            type: 'red',
            typeAnimated: true,
          buttons: {
            confirm: {
              text: "Konfirmasi",
              btnClass: 'btn-danger',
              action: function() {
                askConfirmation = false; // done asking confirmation, now submit the form
                thisBtn.submit();
              }
            },
            cancel: {
              text: "Batalkan",
              btnClass: 'btn-default'
            }
          }
        });
      }
  });



  $('a.edit-btn').on('click', function () {
      var itemid = $(this).attr('data-id');
      var url = baseurl + 'dashboard/getCategory/' + itemid; //get category by id first then put inside the form

      jQuery.ajax({
          type: "GET",
          url: url,
          dataType: 'json',
          //data: {"itemid": itemid},
          async: true,
          beforeSend: function () {
              $("div#loading").delay(100).fadeIn();
          },
          success: function (data) {
              $("div#loading").delay(100).fadeOut("slow");
              $('input#id').val(data.id);
              $('input#cat_title').val(data.cat_title);
              $('select#cat_type').children('option').remove();
              $('select#cat_type').prepend(data.selected_cat);
              $('select#cat_type').niceSelect('update');
          }
      });
  });



  //cart page update carts
  $('input#cartquantity').on('change', function () {
      var cartid = $(this).attr('data-cart-id');
      var itemqty = $(this).val();
      var totaldiv = $(this).closest('.cartpage-single-item').children('.cart-item-price').children('.total');
      var subtotaldiv = $('.cart-subtotal').children('span');
      var url = baseurl + 'cart/updateqty/'  + cartid; //get category by id first then put inside the form

      jQuery.ajax({
          type: "PUT",
          url: url,
          dataType: 'json',
          data: {"itemqty": itemqty, "cartid": cartid, "_token": $('meta[name="csrf-token"]').attr('content') },
          async: true,
          beforeSend: function () {
              $("div#loading").delay(100).fadeIn();
          },
          success: function (data) {
              $("div#loading").delay(100).fadeOut("slow");
              $(totaldiv).text(data.totalamount);
              $(subtotaldiv).text(data.subtotal);
          }
      });
  });


  //auto cart item by ajax
  $('a.itemcartajax').on('click', function (e) {
      e.preventDefault();
      var itemID = $(this).attr('data-id');
      var url = baseurl + 'cart/itemcartajax'; //get category by id first then put inside the form

      jQuery.ajax({
          type: "POST",
          url: url,
          dataType: 'json',
          data: {"itemID": itemID, "_token": $('meta[name="csrf-token"]').attr('content')},
          async: true,
          beforeSend: function () {
              $("div#loading").delay(100).fadeIn();
          },
          success: function (data) {
              $("div#loading").delay(100).fadeOut("slow");

              var totalCartNumber = $(".totalCartNumber").text();
              var totalCartNumber = parseInt(totalCartNumber) + 1;
              $(".totalCartNumber").html(totalCartNumber);
              $('.mini-cart .total-amount').after(data.itemHtml);

              $(".ajaxNoti.alert.alert-info").show();
              $(".ajaxNoti.alert.alert-info span.content").html('Successfully Added To Cart');
              $(".ajaxNoti").delay(3000).hide("Slow");
          }
      });
  });

    //chart page update carts
    $('a.earning-year-report-btn').on('click', function (e) {
      e.preventDefault();
      var url = baseurl + 'user/yearlysalereport/name';

      jQuery.ajax({
          type: "GET",
          url: url,
          dataType: 'json',
          async: true,
          beforeSend: function () {
              $("div#loading").delay(100).fadeIn();
          },
          success: function (reportdata) {
              $("div#loading").delay(100).fadeOut("slow");

              $('a.earning-month-report-btn').attr('class', 'primary-btn white-btn earning-month-report-btn');
              $('a.earning-year-report-btn').attr('class', 'primary-btn earning-year-report-btn');
              $('a.earning-all-report-btn').attr('class', 'primary-btn white-btn earning-all-report-btn');

              var canvas = document.getElementById("sales-chart");
              var ctx = canvas.getContext('2d');
              // Global Options:
               Chart.defaults.global.defaultFontColor = '#797979';
               Chart.defaults.global.defaultFontSize = 14;

              // Data with datasets options
              var data = {
                  labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                    datasets: [
                      {
                          label: "Sales",
                          fill: true,
                          backgroundColor: "#ecf7fe",
                          borderColor: "#DC143C",
                          data: [reportdata.jan, reportdata.feb, reportdata.mar, reportdata.apr, reportdata.may, reportdata.jun, reportdata.jul, reportdata.aug, reportdata.sep, reportdata.oct, reportdata.nov, reportdata.dec]
                      }
                  ]
              };
              // Chart declaration with some options:
              var myFirstChart = new Chart(ctx, {
                  type: 'line',
                  data: data
              })
          }
      });
    });


    //chart page update carts
    $('a.earning-month-report-btn').on('click', function (e) {
      e.preventDefault();
      var url = baseurl + 'user/monthlysalereport/name';

      jQuery.ajax({
          type: "GET",
          url: url,
          dataType: 'json',
          async: true,
          beforeSend: function () {
              $("div#loading").delay(100).fadeIn();
          },
          success: function (reportdata) {
              $("div#loading").delay(100).fadeOut("slow");

              $('a.earning-month-report-btn').attr('class', 'primary-btn earning-month-report-btn');
              $('a.earning-year-report-btn').attr('class', 'primary-btn white-btn earning-year-report-btn');
              $('a.earning-all-report-btn').attr('class', 'primary-btn white-btn earning-all-report-btn');

              var canvas = document.getElementById("sales-chart");
              var ctx = canvas.getContext('2d');
              // Global Options:
               Chart.defaults.global.defaultFontColor = '#797979';
               Chart.defaults.global.defaultFontSize = 14;

              // Data with datasets options
              var data = {
                  labels: ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
                    datasets: [
                      {
                          label: "Sales",
                          fill: true,
                          backgroundColor: "#ecf7fe",
                          borderColor: "#DC143C",
                          data: [
                              reportdata.d1,
                              reportdata.d2,
                              reportdata.d3,
                              reportdata.d4,
                              reportdata.d5,
                              reportdata.d6,
                              reportdata.d7,
                              reportdata.d8,
                              reportdata.d9,
                              reportdata.d10,
                              reportdata.d11,
                              reportdata.d12,
                              reportdata.d13,
                              reportdata.d14,
                              reportdata.d15,
                              reportdata.d16,
                              reportdata.d17,
                              reportdata.d18,
                              reportdata.d19,
                              reportdata.d20,
                              reportdata.d21,
                              reportdata.d22,
                              reportdata.d23,
                              reportdata.d24,
                              reportdata.d25,
                              reportdata.d26,
                              reportdata.d27,
                              reportdata.d28,
                              reportdata.d29,
                              reportdata.d30,
                              reportdata.d31
                           ]
                      }
                  ]
              };
              // Chart declaration with some options:
              var myFirstChart = new Chart(ctx, {
                  type: 'line',
                  data: data
              })
          }
      });
    });



    //chart page update carts
    $('a.earning-all-report-btn').on('click', function (e) {
      e.preventDefault();
      var url = baseurl + 'user/allsalereport/name';

      jQuery.ajax({
          type: "GET",
          url: url,
          dataType: 'json',
          async: true,
          beforeSend: function () {
              $("div#loading").delay(100).fadeIn();
          },
          success: function (reportdata) {
              $("div#loading").delay(100).fadeOut("slow");
              //console.log(reportdata);
              var i=0;
              var comma= '';
              var allsales = '';
              for(i=0; i < reportdata.sale.length; i++) {
                  // console.log(reportdata.length);
                  // console.log(i);
                  if((i+1) !== reportdata.sale.length){
                      comma = ",";
                  }
                  allsales += reportdata.sale[i] + comma;
                  //console.log(reportdata[i] + comma);
                  console.log(reportdata.sale);
                  console.log(reportdata.bar);
              }

              $('a.earning-month-report-btn').attr('class', 'primary-btn white-btn earning-month-report-btn');
              $('a.earning-year-report-btn').attr('class', 'primary-btn white-btn earning-year-report-btn');
              $('a.earning-all-report-btn').attr('class', 'primary-btn earning-all-report-btn');

              var canvas = document.getElementById("sales-chart");
              var ctx = canvas.getContext('2d');
              // Global Options:
               Chart.defaults.global.defaultFontColor = '#797979';
               Chart.defaults.global.defaultFontSize = 14;

              // Data with datasets options
              var data = {
                  labels: reportdata.bar,
                    datasets: [
                      {
                          label: "Sales",
                          fill: true,
                          backgroundColor: "#ecf7fe",
                          borderColor: "#DC143C",
                          data: reportdata.sale
                      }
                  ]
              };
              // Chart declaration with some options:
              var myFirstChart = new Chart(ctx, {
                  type: 'line',
                  data: data
              })
          }
      });
    });


    //dashboard user update
    $('a.user-update-btn').on('click', function (e) {
        e.preventDefault();
        var userID = $(this).attr('data-id');
        $('#dashboardUpdateUser input#userID').val(userID);
        $('#dashboardUpdateUser input#username').val('');
        $('#dashboardUpdateUser input#email').val('');
        $(".ajaxNoti.alert.alert-info").hide();
        $(".ajaxNoti.alert.alert-danger").hide();
        $("div#dashboardUpdateUser input#username").attr('style', 'border-color:#eee; background: #fff;');
        $("div#dashboardUpdateUser input#email").attr('style', 'border-color:#eee; background: #fff;');
    });


    //dashboard username update
    $('div#dashboardUpdateUser input#username').on('change paste', function (e) {
        e.preventDefault();
        var username = $(this).val();
        var userID = $(this).closest('form').children('input#userID').val();
        var url = baseurl + 'dashboard/checkusername/'; //get category by id first then put inside the form
        if(username && userID){
            jQuery.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: {"userID": userID, "username": username, "_token": $('meta[name="csrf-token"]').attr('content')},
                async: true,
                beforeSend: function () {
                    $("div#loading").delay(100).fadeIn();
                },
                success: function (data) {
                    $("div#loading").delay(100).fadeOut("slow");
                    if(data === 1){
                        $("div#dashboardUpdateUser input#username").attr('style', 'border-color:#88BC3AA; background: #e6ffc9;');
                        $(".ajaxNoti.alert.alert-info").show();
                        $(".ajaxNoti.alert.alert-info span.content").html('Username Available');
                        $(".ajaxNoti.alert.alert-danger").hide();
                    }else{
                        $("div#dashboardUpdateUser input#username").attr('style', 'border-color:#F44336; background: #ffd7d4;');
                        $(".ajaxNoti.alert.alert-danger").show();
                        $(".ajaxNoti.alert.alert-danger span.content").html('Username Alreay Exist');
                        $(".ajaxNoti.alert.alert-info").hide();
                    }
                }
            });
        }
    });


    //dashboard user email update
    $('div#dashboardUpdateUser input#email').on('change paste', function (e) {
        e.preventDefault();
        var email = $(this).val();
        var userID = $(this).closest('form').children('input#userID').val();
        var url = baseurl + 'dashboard/checkemail/'; //get category by id first then put inside the form
        if(email && userID){
            jQuery.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: {"userID": userID, "email": email, "_token": $('meta[name="csrf-token"]').attr('content')},
                async: true,
                beforeSend: function () {
                    $("div#loading").delay(100).fadeIn();
                },
                success: function (data) {
                    $("div#loading").delay(100).fadeOut("slow");
                    if(data === 1){
                        $("div#dashboardUpdateUser input#email").attr('style', 'border-color:#88BC3AA; background: #e6ffc9;');
                        $(".ajaxNoti.alert.alert-info").show();
                        $(".ajaxNoti.alert.alert-info span.content").html('Email Available');
                        $(".ajaxNoti.alert.alert-danger").hide();
                    }else{
                        $("div#dashboardUpdateUser input#email").attr('style', 'border-color:#F44336; background: #ffd7d4;');
                        $(".ajaxNoti.alert.alert-danger").show();
                        $(".ajaxNoti.alert.alert-danger span.content").html('Email Alreay Exist');
                        $(".ajaxNoti.alert.alert-info").hide();
                    }
                }
            });
        }
    });


   // dashboard category add/update
    $(document).on('change', 'select.cat_type', function () {
        var cat_type = $('select.cat_type').val();
        // alert(cat_type);
        if (cat_type != 2) {
            $('.parent_cat_div').hide();
            $('.parent_cat_div').attr("required", false);
        }else{
            $('.parent_cat_div').show();
            $('.parent_cat_div').attr("required", true);
        }
    });


    // item upload parent category
    var parentCategory = $('#primeCategory').val();
    $('#item_parent_category').val(parentCategory);

    $(document).on('change', '#primeCategory', function () {
        var parentCategory = $('#primeCategory').val();
        $('#item_parent_category').val(parentCategory);
    });

    // item fee
    $(document).on('change', 'input.item_price', function () {
        var item_price = $('input.item_price').val();
        var item_buyerfee = $('input.item_buyerfee').val();
        var total_fee = parseInt(item_price) + parseInt(item_buyerfee);
        console.log(total_fee);
        $('input.item_purchasefee').val(total_fee);
        $('input.disabled_item_purchasefee').val(total_fee);
    });

    $(document).on('change', 'input.item_ex_price', function () {
        var item_ex_price = $('input.item_ex_price').val();
        var item_ex_buyerfee = $('input.item_ex_buyerfee').val();
        var total_ex_fee = parseInt(item_ex_price) + parseInt(item_ex_buyerfee);
        $('input.item_ex_purchasefee').val(total_ex_fee);
        $('input.disabled_item_ex_purchasefee').val(total_ex_fee);
    });

})(jQuery)
