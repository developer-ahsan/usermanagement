// JavaScript Document
$(function() {
 "use strict";

  function responsive_dropdown () {
    /* ---- For Mobile Menu Dropdown JS Start ---- */
      $("#menu span.opener, #menu-main span.opener").on("click", function(){
         var menuopener = $(this);
      if (menuopener.hasClass("plus")) {
         menuopener.parent().find('.mobile-sub-menu').slideDown();
         menuopener.removeClass('plus');
         menuopener.addClass('minus');
      }
      else
      {
         menuopener.parent().find('.mobile-sub-menu').slideUp();
         menuopener.removeClass('minus');
         menuopener.addClass('plus');
      }
      return false;
      });

      jQuery( ".mobilemenu" ).on("click", function() {
      jQuery( ".mobilemenu-content" ).slideToggle();
      if ($(this).hasClass("openmenu")) {
          $(this).removeClass('openmenu');
          $(this).addClass('closemenu');
        }
        else
        {
          $(this).removeClass('closemenu');
          $(this).addClass('openmenu');
        }
        return false;
    });
    /* ---- For Mobile Menu Dropdown JS End ---- */

    /* ---- For Sidebar JS Start ---- */
      $('.sidebar-box span.opener').on("click", function(){
      
        if ($(this).hasClass("plus")) {
          $(this).parent().find('.sidebar-contant').slideDown();
          $(this).removeClass('plus');
          $(this).addClass('minus');
        }
        else
        {
          $(this).parent().find('.sidebar-contant').slideUp();
          $(this).removeClass('minus');
          $(this).addClass('plus');
        }
        return false;
      });
    /* ---- For Sidebar JS End ---- */

    /* ---- For Footer JS Start ---- */
      $('.footer-static-block span.opener').on("click", function(){
      
        if ($(this).hasClass("plus")) {
          $(this).parent().find('.footer-block-contant').slideDown();
          $(this).removeClass('plus');
          $(this).addClass('minus');
        }
        else
        {
          $(this).parent().find('.footer-block-contant').slideUp();
          $(this).removeClass('minus');
          $(this).addClass('plus');
        }
        return false;
      });
    /* ---- For Footer JS End ---- */

     /* ---- For Navbar JS Start ---- */
    $('.navbar-toggle').on("click", function(){
      var menu_id = $('#menu');
      var nav_icon = $('.navbar-toggle i');
      if(menu_id.hasClass('menu-open')){
        menu_id.removeClass('menu-open');
        nav_icon.removeClass('fa-close');
        nav_icon.addClass('fa-bars');
      }else{
        menu_id.addClass('menu-open');
        nav_icon.addClass('fa-close');
        nav_icon.removeClass('fa-bars');
      }
      return false;
    });
    /* ---- For Navbar JS End ---- */

    /* ---- For Category Dropdown JS Start ---- */
    $('.btn-sidebar-menu-dropdown').on("click", function() {
      $('.cat-dropdown').slideToggle();
    });
    /* ---- For Category Dropdown JS End ---- */

    /* ---- For Content Dropdown JS Start ---- */
    $('.content-link').on("click", function() {
      $('.content-dropdown').toggle();
    });
    /* ---- For Content Dropdown JS End ---- */
  }

  function search_open () {
    /* ----- Search open close Start  ------ */
    $('.search-opener').on("click", function(){
      var search_bar = $('.top-search-bar');
      if(search_bar.hasClass('open')){
        search_bar.removeClass('open');
      }else{
        search_bar.addClass('open');
      }
      return false;
    });
    /* ----- Search open close Start  ------ */
  }

  function owlcarousel_slider () {
    /* ------------ OWL Slider Start  ------------- */

      /* ----- tab_slider Start  ------ */
      $('.tab_slider').owlCarousel({
        items: 5,
        navigation: true,
        pagination: false,
        itemsDesktop : [1769, 3],
        itemsDesktopSmall : [991, 3],
        itemsTablet : [768, 2],
        itemsTabletSmall : false,
        itemsMobile : [479, 2]
      });
      /* ----- tab_slider End  ------ */

      /* ----- pro_cat_slider Start  ------ */
      $('.pro-cat-slider').owlCarousel({
        items: 5,
        navigation: true,
        pagination: false,
        itemsDesktop : [1769, 3],
        itemsDesktopSmall : [991, 3],
        itemsTablet : [768, 2],
        itemsTabletSmall : false,
        itemsMobile : [479, 2]
      });
      /* ----- pro_cat_slider End  ------ */

      /* ----- pro_cat_slider Start  ------ */
      $('.pro_cat_slider').owlCarousel({
        items: 5,
        navigation: true,
        pagination: false,
        itemsDesktop : [1199, 4],
        itemsDesktopSmall : [991, 3],
        itemsTablet : [768, 2],
        itemsTabletSmall : false,
        itemsMobile : [479, 2]
      });
      /* ----- pro_cat_slider End  ------ */

      /* ----- sub_menu_slider Start  ------ */
      $('.sub_menu_slider').owlCarousel({
        items: 1,
        navigation: true,
        pagination: false,
        itemsDesktop : [1199, 1],
        itemsDesktopSmall : [991, 1],
        itemsTablet : [768, 1],
        itemsTabletSmall : false,
        itemsMobile : [479, 1]
      });
      /* -----sub_menu_slider End  ------ */

      /* ----- our-sell-pro_slider Start  ------ */
      $('#our-sell-pro').owlCarousel({
        items: 4,
        navigation: true,
        pagination: false,
        itemsDesktop : [1199, 4],
        itemsDesktopSmall : [991, 3],
        itemsTablet : [768, 2],
        itemsTabletSmall : false,
        itemsMobile : [479, 1]
      });
      /* ----- our-sell-pro_slider End  ------ */

      /* ----- best-seller-pro Start  ------ */
        $('.best-seller-pro').owlCarousel({
          items: 2,
          navigation: true,
          pagination: false,
          itemsDesktop : [1199, 1],
          itemsDesktopSmall : [991, 1],
          itemsTablet : [767, 2],
          itemsTabletSmall : false,
          itemsMobile : [500, 1]
        });
      /* ----- best-seller-pro End  ------ */

      /* ----- brand-logo Start  ------ */
      $('#brand-logo').owlCarousel({
        items: 5,
        navigation: true,
        pagination: false,
        itemsDesktop : [1769, 3],
        itemsDesktopSmall : [991, 3],
        itemsTablet : [768, 1],
        itemsTabletSmall : false,
        itemsMobile : [479, 1]
      });
      /* ----- brand-logo End  ------ */

      /* ---- Testimonial Start ---- */
      $("#client, .main-banner").owlCarousel({
     
        //navigation : true,  Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        autoPlay: false,
        pagination:true,
        singleItem:true,
        navigation:true
      });
      /* ----- Testimonial End  ------ */
      return false;
    /* ------------ OWL Slider End  ------------- */
  }

  function scrolltop_arrow () {
   /* ---- Page Scrollup JS Start ---- */
   //When distance from top = 250px fade button in/out
    var scrollup = $('#scrollup');
    var headertag = $('header');
    var mainfix = $('.main');
    $(window).scroll(function(){
      if ($(this).scrollTop() > 250) {
          scrollup.fadeIn(300);
      } else {
          scrollup.fadeOut(300);
      }

      /* header-fixed JS Start */
      if ($(this).scrollTop() > 0){
         headertag.addClass("header-fixed");
      }
      else{ 
         headertag.removeClass("header-fixed");
      }

      /* main-fixed JS Start */
      if ($(this).scrollTop() > 0){
         mainfix.addClass("main-fixed");
      }
      else{ 
         mainfix.removeClass("main-fixed");
      }
      /* ---- Page Scrollup JS End ---- */
    });
    
    //On click scroll to top of page t = 1000ms
    scrollup.on("click", function(){
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });
  }

  function custom_tab() {
    /* ------------ Account Tab JS Start ------------ */
    $('.account-tab-stap').on('click', 'li', function() {
        $('.account-tab-stap li').removeClass('active');
        $(this).addClass('active');
        
        $(".account-content").fadeOut();
        var currentLiID = $(this).attr('id');
        $("#data-"+currentLiID).fadeIn();
        return false;
    });
    /* ------------ Account Tab JS End ------------ */
  }

  /* Price-range Js Start */
  function price_range () {
      $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 800,
      values: [ 75, 500 ],
      slide: function( event, ui ) {
      $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
      });
      $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  }
  /* Price-range Js End */

  /*Video_Popup Js Start*/
  function video_popup() {
    if($('.popup-youtube').length > 0){      
    $('.popup-youtube').magnificPopup({          
        disableOn: 700,          
        type: 'iframe',          
        mainClass: 'mfp-fade',          
        removalDelay: 160,          
        preloader: false,          
        fixedContentPos: false      
      });    
    }  
  }
  /*Video_Popup Js Ends*/

  /* Product Detail Page Tab JS Start */
  function description_tab () {
    $("#tabs li a").on("click", function(e){
      var title = $(e.currentTarget).attr("title");
      $("#tabs li a , .tab_content li div").removeClass("selected")
      $(".tab-"+title +", .items-"+title).addClass("selected")
      $("#items").attr("class","tab-"+title);

      return false;
    });
  }

  /*Search-box-close-button*/

  $('.search-closer').on('click', function() {
      var sidebar = $('.sidebar-navigation');
      var nav_icon = $('.navbar-toggle i');
      if(sidebar.hasClass('open')){
        //sidebar.removeClass('open');
      }else{
        sidebar.addClass('open');
        nav_icon.addClass('fa-search-close');
        nav_icon.removeClass('fa-search-bars');
      }

      $('.sidebar-search-wrap').removeClass('open');
      return false;
  });


  /* Product Detail Page Tab JS End */
  $(document).ready(function() {
    owlcarousel_slider(); price_range (); responsive_dropdown(); description_tab (); custom_tab (); scrolltop_arrow (); search_open (); video_popup();
  });

  $( window ).on( "resize", function() {

  });
});

  $( window ).on( "load", function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
