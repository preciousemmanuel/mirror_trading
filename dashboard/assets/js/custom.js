$(function () {
  "use strict";

  // ______________LOADER
  $("#global-loader").fadeOut("slow");

  // This template is mobile first so active menu in navbar
  // has submenu displayed by default but not in desktop
  // so the code below will hide the active menu if it's in desktop
  if (window.matchMedia("(min-width: 992px)").matches) {
    $(".main-navbar .active").removeClass("show");
    $(".main-header-menu .active").removeClass("show");
  }
  // Shows header dropdown while hiding others
  $(".main-header .dropdown > a").on("click", function (e) {
    e.preventDefault();
    $(this).parent().toggleClass("show");
    $(this).parent().siblings().removeClass("show");
    $(this).find(".drop-flag").removeClass("show");
  });

  // ______________Theme layout
  $(".theme-layout").on("click", function (e) {

    if (!document.querySelector("body").classList.contains("dark-mode")) {
      $("body").addClass("dark-mode");
      $("body").removeClass("light-mode");

      $("body")?.removeClass("color-menu");
      $("body")?.removeClass("gradient-menu");
      $("body")?.removeClass("light-menu");
      $("body")?.removeClass("color-header");
      $("body")?.removeClass("gradient-header");
      $("body")?.removeClass("header-light");

      $("#myonoffswitch5").prop("checked", true);
      $("#myonoffswitch8").prop("checked", true);

      localStorage.setItem("xinodarkMode", true);
      localStorage.removeItem("xinolightMode");
      $("#myonoffswitch2").prop("checked", true);
    } else {
      $("body").removeClass("dark-mode");
      $("body").addClass("light-mode");
      $("#myonoffswitch3").prop("checked", true);
      $("#myonoffswitch6").prop("checked", true);

      localStorage.setItem("xinolightMode", true);
      localStorage.removeItem("xinodarkMode");
      $("#myonoffswitch1").prop("checked", true);
    }
  });

  // ______________Full screen
  $(document).on("click", ".fullscreen-button", function toggleFullScreen() {
    if (
      (document.fullScreenElement !== undefined &&
        document.fullScreenElement === null) ||
      (document.msFullscreenElement !== undefined &&
        document.msFullscreenElement === null) ||
      (document.mozFullScreen !== undefined && !document.mozFullScreen) ||
      (document.webkitIsFullScreen !== undefined &&
        !document.webkitIsFullScreen)
    ) {
      if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(
          Element.ALLOW_KEYBOARD_INPUT
        );
      } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
      }
    } else {
      if (document.cancelFullScreen) {
        document.cancelFullScreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }
  });

  // ______________Cover Image
  $(".cover-image").each(function () {
    var attr = $(this).attr("data-image-src");
    if (typeof attr !== typeof undefined && attr !== false) {
      $(this).css("background", "url(" + attr + ") center center");
    }
  });

  // ______________Search
  $('body, .main-header form[role="search"] button[type="reset"]').on(
    "click keyup",
    function (event) {
      if (
        (event.which == 27 &&
          $('.main-header form[role="search"]').hasClass("active")) ||
        $(event.currentTarget).attr("type") == "reset"
      ) {
        closeSearch();
      }
    }
  );
  function closeSearch() {
    var $form = $('.main-header form[role="search"].active');
    $form.find("input").val("");
    $form.removeClass("active");
  }
  // Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
  $(document).on(
    "click",
    '.main-header form[role="search"]:not(.active) button[type="submit"]',
    function (event) {
      event.preventDefault();
      var $form = $(this).closest("form"),
        $input = $form.find("input");
      $form.addClass("active");
      $input.focus();
    }
  );
  // if your form is ajax remember to call `closeSearch()` to close the search container
  $(document).on(
    "click",
    '.main-header form[role="search"].active button[type="submit"]',
    function (event) {
      event.preventDefault();
      var $form = $(this).closest("form"),
        $input = $form.find("input");
      $("#showSearchTerm").text($input.val());
      closeSearch();
    }
  );

  /* ----------------------------------- */

  // Showing submenu in navbar while hiding previous open submenu
  $(".main-navbar .with-sub").on("click", function (e) {
    e.preventDefault();
    $(this).parent().toggleClass("show");
    $(this).parent().siblings().removeClass("show");
  });
  // this will hide dropdown menu from open in mobile
  $(".dropdown-menu .main-header-arrow").on("click", function (e) {
    e.preventDefault();
    $(this).closest(".dropdown").removeClass("show");
  });
  // this will show navbar in left for mobile only
  $("#mainNavShow, #azNavbarShow").on("click", function (e) {
    e.preventDefault();
    $("body").addClass("main-navbar-show");
  });
  // this will hide currently open content of page
  // only works for mobile
  $("#mainContentLeftShow").on("click touch", function (e) {
    e.preventDefault();
    $("body").addClass("main-content-left-show");
  });
  // This will hide left content from showing up in mobile only
  $("#mainContentLeftHide").on("click touch", function (e) {
    e.preventDefault();
    $("body").removeClass("main-content-left-show");
  });
  // this will hide content body from showing up in mobile only
  $("#mainContentBodyHide").on("click touch", function (e) {
    e.preventDefault();
    $("body").removeClass("main-content-body-show");
  });
  // navbar backdrop for mobile only
  $("body").append('<div class="main-navbar-backdrop"></div>');
  $(".main-navbar-backdrop").on("click touchstart", function () {
    $("body").removeClass("main-navbar-show");
  });
  // Close dropdown menu of header menu
  $(document).on("click touchstart", function (e) {
    e.stopPropagation();
    // closing of dropdown menu in header when clicking outside of it
    var dropTarg = $(e.target).closest(".main-header .dropdown").length;
    if (!dropTarg) {
      $(".main-header .dropdown").removeClass("show");
    }
    // closing nav sub menu of header when clicking outside of it
    if (window.matchMedia("(min-width: 992px)").matches) {
      // Navbar
      var navTarg = $(e.target).closest(".main-navbar .nav-item").length;
      if (!navTarg) {
        $(".main-navbar .show").removeClass("show");
      }
      // Header Menu
      var menuTarg = $(e.target).closest(".main-header-menu .nav-item").length;
      if (!menuTarg) {
        $(".main-header-menu .show").removeClass("show");
      }
      if ($(e.target).hasClass("main-menu-sub-mega")) {
        $(".main-header-menu .show").removeClass("show");
      }
    } else {
      //
      if (!$(e.target).closest("#mainMenuShow").length) {
        var hm = $(e.target).closest(".main-header-menu").length;
        if (!hm) {
          $("body").removeClass("main-header-menu-show");
        }
      }
    }
  });
  $("#mainMenuShow").on("click", function (e) {
    e.preventDefault();
    $("body").toggleClass("main-header-menu-show");
  });
  $(".main-header-menu .with-sub").on("click", function (e) {
    e.preventDefault();
    $(this).parent().toggleClass("show");
    $(this).parent().siblings().removeClass("show");
  });
  $(".main-header-menu-header .close").on("click", function (e) {
    e.preventDefault();
    $("body").removeClass("main-header-menu-show");
  });

  $(".card-header-right .card-option .fe fe-chevron-left").on(
    "click",
    function () {
      var a = $(this);
      if (a.hasClass("icofont-simple-right")) {
        a.parents(".card-option").animate({
          width: "35px",
        });
      } else {
        a.parents(".card-option").animate({
          width: "180px",
        });
      }
      $(this).toggleClass("fe fe-chevron-right").fadeIn("slow");
    }
  );


	// ___________TOOLTIP
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})

  // __________POPOVER
  var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
  );
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });

  // By default, Bootstrap doesn't auto close popover after appearing in the page
  // resulting other popover overlap each other. Doing this will auto dismiss a popover
  // when clicking anywhere outside of it
  $(document).on("click", function (e) {
    $('[data-bs-toggle="popover"]').each(function () {
      //the 'is' for buttons that trigger popups
      //the 'has' for icons within a button that triggers a popup
      if (
        !$(this).is(e.target) &&
        $(this).has(e.target).length === 0 &&
        $(".popover").has(e.target).length === 0
      ) {
        (
          ($(this).popover("hide").data("bs.popover") || {}).inState || {}
        ).click = false; // fix for BS 3.3.6
      }
    });
  });

  // Enable Eva-icons with SVG markup
  eva.replace();

  // ______________Horizontal-menu Active Class
  $(document).ready(function () {
    $(".horizontalMenu-list li a").each(function () {
      var pageUrl = window.location.href.split(/[?#]/)[0];
      if (this.href == pageUrl) {
        $(this).addClass("active");
        $(this).parent().addClass("active"); // add active to li of the current link
        $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
        $(this).parent().parent().prev().click(); // click the item to make it drop
      }
    });
  });

  // ______________ BACK TO TOP BUTTON
  $(window).on("scroll", function (e) {
    if ($(this).scrollTop() > 0) {
      $("#back-to-top").fadeIn("slow");
    } else {
      $("#back-to-top").fadeOut("slow");
    }
  });
  $(document).on("click", "#back-to-top", function (e) {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      0
    );
    return false;
  });

  //Pattern
  $("a[data-theme]").click(function () {
    $("head link#theme").attr("href", $(this).data("theme"));
    $(this).toggleClass("active").siblings().removeClass("active");
  });
});
// ______________ CARD
const DIV_CARD = "div.card";

// ______________ FUNCTION FOR REMOVE CARD
$(document).on("click", '[data-bs-toggle="card-remove"]', function (e) {
  let $card = $(this).closest(DIV_CARD);
  $card.remove();
  e.preventDefault();
  return false;
});

// ______________ FUNCTIONS FOR COLLAPSED CARD
$(document).on("click", '[data-bs-toggle="card-collapse"]', function (e) {
  let $card = $(this).closest(DIV_CARD);
  $card.toggleClass("card-collapsed");
  e.preventDefault();
  return false;
});

// ______________ CARD FULL SCREEN
$(document).on("click", '[data-bs-toggle="card-fullscreen"]', function (e) {
  let $card = $(this).closest(DIV_CARD);
  $card.toggleClass("card-fullscreen").removeClass("card-collapsed");
  e.preventDefault();
  return false;
});
