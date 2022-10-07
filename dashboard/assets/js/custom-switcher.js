let html = document.querySelector("html");

//Switcher Styles
function switcherEvents() {
  "use strict";

  // LIGHT THEME START
  $(document).on("click", "#myonoffswitch1", function () {
    if (this.checked) {
      $("body").addClass("light-mode");
      $("#myonoffswitch19").prop("checked", true);
      $("#myonoffswitch6").prop("checked", true);
      $("body").removeClass("dark-mode");

      $("body")?.removeClass("color-menu");
      $("body")?.removeClass("gradient-menu");
      $("body")?.removeClass("dark-menu");
      $("body")?.removeClass("color-header");
      $("body")?.removeClass("gradient-header");
      $("body")?.removeClass("dark-header");

      // remove dark theme properties
      localStorage.removeItem("xinodarkPrimary");

      // remove light theme properties
      localStorage.removeItem("xinoprimaryColor");
      localStorage.removeItem("xinoprimaryHoverColor");
      localStorage.removeItem("xinoprimaryBorderColor");
      document
        .querySelector("html")
        .style.removeProperty("--primary-bg-color", localStorage.darkPrimary);
      document
        .querySelector("html")
        .style.removeProperty("--primary-bg-hover", localStorage.darkPrimary);
      document
        .querySelector("html")
        .style.removeProperty("--primary-bg-border", localStorage.darkPrimary);
      document
        .querySelector("html")
        .style.removeProperty("--dark-primary", localStorage.darkPrimary);

      // removing dark theme properties
      localStorage.removeItem("xinodarkPrimary");
      localStorage.removeItem("xinotransparentBgColor");
      localStorage.removeItem("xinotransparentThemeColor");
      localStorage.removeItem("xinotransparentPrimary");
      localStorage.removeItem("xinodarkprimaryTransparent");

      localStorage.setItem("xinolightMode", true);
      localStorage.removeItem("xinodarkMode");

      $("#myonoffswitch1").prop("checked", true);

      checkOptions();
      const root = document.querySelector(":root");
      root.style = "";
    }
    localStorageBackup();
  });
  // LIGHT THEME END

  // DARK THEME START
  $(document).on("click", "#myonoffswitch2", function () {
    if (this.checked) {
      $("body").addClass("dark-mode");

      $("#myonoffswitch5").prop("checked", true);
      $("#myonoffswitch8").prop("checked", true);
      $("body").removeClass("light-mode");
      $("body").removeClass("transparent-mode");

      $("body")?.removeClass("color-menu");
      $("body")?.removeClass("gradient-menu");
      $("body")?.removeClass("light-menu");
      $("body")?.removeClass("color-header");
      $("body")?.removeClass("gradient-header");
      $("body")?.removeClass("header-light");

      // remove light theme properties
      localStorage.removeItem("xinoprimaryColor");
      localStorage.removeItem("xinoprimaryHoverColor");
      localStorage.removeItem("xinoprimaryBorderColor");
      localStorage.removeItem("xinodarkPrimary");
      document
        .querySelector("html")
        .style.removeProperty("--primary-bg-color", localStorage.darkPrimary);
      document
        .querySelector("html")
        .style.removeProperty("--primary-bg-hover", localStorage.darkPrimary);
      document
        .querySelector("html")
        .style.removeProperty("--primary-bg-border", localStorage.darkPrimary);
      document
        .querySelector("html")
        .style.removeProperty("--dark-primary", localStorage.darkPrimary);

      // removing light theme data
      localStorage.removeItem("xinoprimaryColor");
      localStorage.removeItem("xinoprimaryHoverColor");
      localStorage.removeItem("xinoprimaryBorderColor");
      localStorage.removeItem("xinoprimaryTransparent");

      localStorage.setItem("xinodarkMode", true);
      localStorage.removeItem("xinolightMode");

      $("#myonoffswitch2").prop("checked", true);
      //
      checkOptions();

      const root = document.querySelector(":root");
      root.style = "";
    }
    localStorageBackup();
  });
  // DARK THEME END

  // VERTICAL MENU START
  $(document).on("click", "#myonoffswitch34", function () {
    if (this.checked) {
      ActiveSubmenu();
      $("body").removeClass("horizontal");
      $("body").removeClass("horizontal-hover");
      $(".main-content").removeClass("horizontal-content");
      $(".main-content").addClass("app-content");
      $(".main-container").removeClass("container");
      $(".main-container").addClass("container-fluid");
      $(".main-header").removeClass("hor-header");
      $(".hor-header").addClass("app-header");
      $(".app-sidebar").removeClass("horizontal-main");
      $(".main-sidemenu").removeClass("container");
      $(".slide-menu").removeClass("ps");
      $(".slide-menu").removeClass("ps--active-y");
      $("#slide-left").removeClass("d-none");
      $("#slide-right").removeClass("d-none");
      $("body").addClass("sidebar-mini");
      localStorage.setItem("xinosidebarMini", true);
      localStorage.removeItem("xinohorizontal");
      localStorage.removeItem("xinohorizontalHover");
      responsive();

      if (!(document.querySelector(".icontext-menu") !== null)) {
        hovermenu();
      }
    }
  });
  // VERTICAL MENU END

  // HORIZONTAL MENU START
  $(document).on("click", "#myonoffswitch35", function () {
    if (this.checked) {
      if (!document.querySelector(".login-page")) {
        ActiveSubmenu();
        checkHoriMenu();
        responsive();
      }
      if (window.innerWidth >= 992) {
        let li = document.querySelectorAll(".side-menu li");
        li.forEach((e, i) => {
          e.classList.remove("is-expanded");
        });
        var animationSpeed = 300;
        // first level
        var parent = $("[data-bs-toggle='sub-slide']").parents("ul");
        var ul = parent.find("ul:visible").slideUp(animationSpeed);
        ul.removeClass("open");
        var parent1 = $("[data-bs-toggle='sub-slide2']").parents("ul");
        var ul1 = parent1.find("ul:visible").slideUp(animationSpeed);
        ul1.removeClass("open");
      }
      $("body").addClass("horizontal");
      $(".main-content").addClass("horizontal-content");
      $(".main-content").removeClass("app-content");
      $(".main-container").addClass("container");
      $(".main-container").removeClass("container-fluid");
      $(".main-header").addClass("hor-header");
      $(".hor-header").removeClass("app-header");
      $(".app-sidebar").addClass("horizontal-main");
      $(".main-sidemenu").addClass("container");
      $("body").removeClass("sidebar-mini");
      $("body").removeClass("sidenav-toggled");
      $("body").removeClass("horizontal-hover");
      $("body").removeClass("default-menu");
      $("body").removeClass("icontext-menu");
      $("body").removeClass("icon-overlay");
      $("body").removeClass("closed-leftmenu");
      $("body").removeClass("hover-submenu");
      $("body").removeClass("hover-submenu1");
      // // To enable no-wrap horizontal style
      $("#slide-left").removeClass("d-none");
      $("#slide-right").removeClass("d-none");
      localStorage.setItem("xinohorizontal", true);
      localStorage.removeItem("xinosidebarMini");
      localStorage.removeItem("xinohorizontalHover");
      document
        .querySelector(".horizontal .side-menu")
        ?.classList.add("flex-nowrap");
      // To enable wrap horizontal style
      // $('#slide-left').addClass('d-none');
      // $('#slide-right').addClass('d-none');
      // document.querySelector('.horizontal .side-menu').style.flexWrap = 'wrap'
    }
  });
  // HORIZONTAL END

  // HORIZONTAL HOVER
  $(document).on("click", "#myonoffswitch111", function () {
    if (this.checked) {
      if (!document.querySelector(".login-page")) {
        checkHoriMenu();
        responsive();
      }
      if (window.innerWidth >= 992) {
        let li = document.querySelectorAll(".side-menu li");
        li.forEach((e, i) => {
          e.classList.remove("is-expanded");
        });
        var animationSpeed = 300;
        // first level
        var parent = $("[data-bs-toggle='sub-slide']").parents("ul");
        var ul = parent.find("ul:visible").slideUp(animationSpeed);
        ul.removeClass("open");
        var parent1 = $("[data-bs-toggle='sub-slide2']").parents("ul");
        var ul1 = parent1.find("ul:visible").slideUp(animationSpeed);
        ul1.removeClass("open");
      }
      $("body").addClass("horizontal-hover");
      $("body").addClass("horizontal");
      // $('#slide-left').addClass('d-none');
      // $('#slide-right').addClass('d-none');
      // document.querySelector('.horizontal .side-menu').style.flexWrap = 'wrap'
      $("#slide-left").addClass("d-none");
      $("#slide-right").addClass("d-none");
      document
        .querySelector(".horizontal .side-menu")
        ?.classList.add("flex-nowrap");
      $(".main-content").addClass("horizontal-content");
      $(".main-content").removeClass("app-content");
      $(".main-container").addClass("container");
      $(".main-container").removeClass("container-fluid");
      $(".main-header").addClass("hor-header");
      $(".hor-header").removeClass("app-header");
      $(".app-sidebar").addClass("horizontal-main");
      $(".main-sidemenu").addClass("container");
      $("body").removeClass("sidebar-mini");
      $("body").removeClass("sidenav-toggled");
      $("body").removeClass("default-menu");
      $("body").removeClass("icontext-menu");
      $("body").removeClass("icon-overlay");
      $("body").removeClass("closed-leftmenu");
      $("body").removeClass("hover-submenu");
      $("body").removeClass("hover-submenu1");
      localStorage.setItem("xinohorizontalHover", "true");
      localStorage.removeItem("xinosidebarMini");
      localStorage.removeItem("xinohorizontal");
    }
  });
  // HORIZONTAL HOVER END

  // RTL STYLE START
  $(document).on("click", "#myonoffswitch24", function () {
    if (this.checked) {
      $("body").addClass("rtl");

      $("#slide-left").removeClass("d-none");
      $("#slide-right").removeClass("d-none");
      $("html[lang=en]").attr("dir", "rtl");
      $("body").removeClass("ltr");
      $("head link#style").attr("href", $(this));

      $(".select2-container").attr("dir", "rtl");

      document
        .getElementById("style")
        .setAttribute(
          "href",
          "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"
        );
      var carousel = $(".owl-carousel");
      $.each(carousel, function (index, element) {
        // element == this
        var carouselData = $(element).data("owl.carousel");
        carouselData.settings.rtl = true; //don't know if both are necessary
        carouselData.options.rtl = true;
        $(element).trigger("refresh.owl.carousel");
      });
      localStorage.setItem("xinortl", true);
      localStorage.removeItem("xinoltr");
    }
  });
  // RTL STYLE END

  // LTR STYLE START
  $(document).on("click", "#myonoffswitch23", function () {
    if (this.checked) {
      $("body").addClass("ltr");

      $(".select2-container").attr("dir", "ltr");

      $("#slide-left").removeClass("d-none");
      $("#slide-right").removeClass("d-none");
      $("html[lang=en]").attr("dir", "ltr");
      $("body").removeClass("rtl");
      $("head link#style").attr("href", $(this));
      document
        .getElementById("style")
        .setAttribute(
          "href",
          "../assets/plugins/bootstrap/css/bootstrap.min.css"
        );
      var carousel = $(".owl-carousel");
      $.each(carousel, function (index, element) {
        // element == this
        var carouselData = $(element).data("owl.carousel");
        carouselData.settings.rtl = false; //don't know if both are necessary
        carouselData.options.rtl = false;
        $(element).trigger("refresh.owl.carousel");
      });
      localStorage.setItem("xinoltr", true);
      localStorage.removeItem("xinortl");
    }
  });
  // LTR STYLE END

  // LIGHT LEFTMENU START
  $(document).on("click", "#myonoffswitch3", function () {
    if (this.checked) {
      $("body").addClass("light-menu");
      $("body").removeClass("color-menu");
      $("body").removeClass("dark-menu");
      $("body").removeClass("gradient-menu");
      $("body").removeClass("theme-style");
      $("#myonoffswitch25").prop("checked", true);

      localStorage.setItem("xinoLightmenu", true);
      localStorage.removeItem("xinoDarkmenu");
      localStorage.removeItem("xinoGradientmenu");
      localStorage.removeItem("xinoColormenu");
      localStorage.removeItem("xinothemestyle");
    } else {
      $("body").removeClass("light-menu");
    }
  });
  // LIGHT LEFTMENU END

  // COLOR LEFTMENU START
  $(document).on("click", "#myonoffswitch4", function () {
    if (this.checked) {
      $("body").addClass("color-menu");
      $("body").removeClass("light-menu");
      $("body").removeClass("dark-menu");
      $("body").removeClass("gradient-menu");
      $("body").removeClass("theme-style");
      $("#myonoffswitch25").prop("checked", true);

      localStorage.setItem("xinoColormenu", true);
      localStorage.removeItem("xinoDarkmenu");
      localStorage.removeItem("xinoGradientmenu");
      localStorage.removeItem("xinoLightmenu");
      localStorage.removeItem("xinothemestyle");
    } else {
      $("body").removeClass("color-menu");
    }
  });
  // COLOR LEFTMENU END

  // DARK LEFTMENU START
  $(document).on("click", "#myonoffswitch5", function () {
    if (this.checked) {
      $("body").addClass("dark-menu");
      $("body").removeClass("color-menu");
      $("body").removeClass("light-menu");
      $("body").removeClass("gradient-menu");
      $("body").removeClass("theme-style");
      $("#myonoffswitch25").prop("checked", true);

      localStorage.setItem("xinoDarkmenu", true);
      localStorage.removeItem("xinoColormenu");
      localStorage.removeItem("xinoGradientmenu");
      localStorage.removeItem("xinoLightmenu");
      localStorage.removeItem("xinothemestyle");
    } else {
      $("body").removeClass("dark-menu");
    }
  });
  // DARK LEFTMENU END

  // GRADIENT LEFTMENU START
  $(document).on("click", "#myonoffswitch19", function () {
    if (this.checked) {
      $("body").addClass("gradient-menu");
      $("body").removeClass("color-menu");
      $("body").removeClass("light-menu");
      $("body").removeClass("dark-menu");
      $("body").removeClass("theme-style");
      $("#myonoffswitch25").prop("checked", true);

      localStorage.setItem("xinoGradientmenu", true);
      localStorage.removeItem("xinoColormenu");
      localStorage.removeItem("xinoDarkmenu");
      localStorage.removeItem("xinoLightmenu");
      localStorage.removeItem("xinothemestyle");
    } else {
      $("body").removeClass("gradient-menu");
    }
  });
  // GRADIENT LEFTMENU END

  // LIGHT HEADER START
  $(document).on("click", "#myonoffswitch6", function () {
    if (this.checked) {
      $("body").addClass("header-light");
      $("body").removeClass("color-header");
      $("body").removeClass("dark-header");
      $("body").removeClass("gradient-header");
      $("body").removeClass("theme-style");
      $("#myonoffswitch25").prop("checked", true);

      localStorage.setItem("xinoLightheader", true);
      localStorage.removeItem("xinoDarkheader");
      localStorage.removeItem("xinoGradientheader");
      localStorage.removeItem("xinoColorheader");
    } else {
      $("body").removeClass("header-light");
    }
  });
  // LIGHT HEADER END

  // COLOR HEADER START
  $(document).on("click", "#myonoffswitch7", function () {
    if (this.checked) {
      $("body").addClass("color-header");
      $("body").removeClass("header-light");
      $("body").removeClass("dark-header");
      $("body").removeClass("gradient-header");
      $("body").removeClass("theme-style");
      $("#myonoffswitch25").prop("checked", true);

      localStorage.setItem("xinoColorheader", true);
      localStorage.removeItem("xinoDarkheader");
      localStorage.removeItem("xinoGradientheader");
      localStorage.removeItem("xinoLightheader");
      localStorage.removeItem("xinothemestyle");
    } else {
      $("body").removeClass("color-header");
    }
  });
  // COLOR HEADER END

  // DARK HEADER START
  $(document).on("click", "#myonoffswitch8", function () {
    if (this.checked) {
      $("body").addClass("dark-header");
      $("body").removeClass("color-header");
      $("body").removeClass("header-light");
      $("body").removeClass("gradient-header");
      $("body").removeClass("theme-style");

      localStorage.setItem("xinoDarkheader", true);
      localStorage.removeItem("xinoColorheader");
      localStorage.removeItem("xinoGradientheader");
      localStorage.removeItem("xinoLightheader");
      localStorage.removeItem("xinothemestyle");
    } else {
      $("body").removeClass("dark-header");
    }
  });
  // DARK HEADER END

  // GRADIENT HEADER START
  $(document).on("click", "#myonoffswitch20", function () {
    if (this.checked) {
      $("body").addClass("gradient-header");
      $("body").removeClass("color-header");
      $("body").removeClass("header-light");
      $("body").removeClass("dark-header");
      $("#myonoffswitch25").prop("checked", true);

      localStorage.setItem("xinoGradientheader", true);
      localStorage.removeItem("xinoColorheader");
      localStorage.removeItem("xinoDarkheader");
      localStorage.removeItem("xinoLightheader");
      localStorage.removeItem("xinothemestyle");
    } else {
      $("body").removeClass("gradient-header");
    }
  });
  // GRADIENT HEADER END

  // FULL WIDTH LAYOUT START
  $(document).on("click", "#myonoffswitch9", function () {
    if (this.checked) {
      $("body").addClass("layout-fullwidth");
      $("body").removeClass("layout-boxed");
      checkHoriMenu();

      localStorage.setItem("xinofullwidth", true);
      localStorage.removeItem("xinoboxedwidth");
    }
  });
  // FULL WIDTH LAYOUT END

  // BOXED LAYOUT START
  $(document).on("click", "#myonoffswitch10", function () {
    if (this.checked) {
      $("body").addClass("layout-boxed");
      $("body").removeClass("layout-fullwidth");
      checkHoriMenu();

      localStorage.setItem("xinoboxedwidth", true);
      localStorage.removeItem("xinofullwidth");
    }
  });
  // BOXED LAYOUT END

  // HEADER POSITION STYLES START
  $(document).on("click", "#myonoffswitch11", function () {
    if (this.checked) {
      $("body").addClass("fixed-layout");
      $("body").removeClass("scrollable-layout");

      localStorage.setItem("xinofixed", true);
      localStorage.removeItem("xinoscrollable");
    }
  });

  $(document).on("click", "#myonoffswitch12", function () {
    if (this.checked) {
      $("body").addClass("scrollable-layout");
      $("body").removeClass("fixed-layout");

      localStorage.setItem("xinoscrollable", true);
      localStorage.removeItem("xinofixed");
    }
  });
  // HEADER POSITION STYLES END

  // DEFAULT SIDEMENU START
  $(document).on("click", "#myonoffswitch13", function () {
    if (this.checked) {
      $("body").addClass("default-menu");
      $("body").removeClass("sidenav-toggled");
      hovermenu();
      $("body").removeClass("icontext-menu");
      $("body").removeClass("icon-overlay");
      $("body").removeClass("closed-leftmenu");
      $("body").removeClass("hover-submenu");
      $("body").removeClass("hover-submenu1");

      localStorage.setItem("xinodefaultmenu", true);
      localStorage.removeItem("xinoclosedmenu");
      localStorage.removeItem("xinoicontextmenu");
      localStorage.removeItem("xinoiconoverlay");
      localStorage.removeItem("xinohoversubmenu");
      localStorage.removeItem("xinohoversubmenu1");
    }
  });
  // DEFAULT SIDEMENU END

  // ICON OVERLAY SIDEMENU START
  $(document).on("click", "#myonoffswitch15", function () {
    if (this.checked) {
      $("body").addClass("icon-overlay");
      hovermenu();
      iconoverlay();
      $("body").addClass("sidenav-toggled");
      $("body").removeClass("hover-submenu1");
      $("body").removeClass("default-menu");
      $("body").removeClass("closed-leftmenu");
      $("body").removeClass("hover-submenu");
      $("body").removeClass("icontext-menu");

      localStorage.setItem("xinoiconoverlay", true);
      localStorage.removeItem("xinodefaultmenu");
      localStorage.removeItem("xinoclosedmenu");
      localStorage.removeItem("xinoicontextmenu");
      localStorage.removeItem("xinohoversubmenu");
      localStorage.removeItem("xinohoversubmenu1");
    }
  });
  // ICON OVERLAY SIDEMENU END

  // ICONTEXT SIDEMENU START
  $(document).on("click", "#myonoffswitch14", function () {
    if (this.checked) {
      $("body").addClass("icontext-menu");
      icontext();
      $("body").addClass("sidenav-toggled");
      $("body").removeClass("icon-overlay");
      $("body").removeClass("hover-submenu1");
      $("body").removeClass("default-menu");
      $("body").removeClass("closed-leftmenu");
      $("body").removeClass("hover-submenu");

      localStorage.setItem("xinoicontextmenu", true);
      localStorage.removeItem("xinodefaultmenu");
      localStorage.removeItem("xinoclosedmenu");
      localStorage.removeItem("xinoiconoverlay");
      localStorage.removeItem("xinohoversubmenu");
      localStorage.removeItem("xinohoversubmenu1");
    }
  });
  // ICONTEXT SIDEMENU END

  // CLOSED SIDEMENU START
  $(document).on("click", "#myonoffswitch16", function () {
    if (this.checked) {
      $("body").addClass("closed-leftmenu");
      $("body").addClass("sidenav-toggled");
      $("body").removeClass("default-menu");
      $("body").removeClass("hover-submenu1");
      $("body").removeClass("hover-submenu");
      $("body").removeClass("icon-overlay");
      $("body").removeClass("icontext-menu");

      localStorage.setItem("xinoclosedmenu", true);
      localStorage.removeItem("xinodefaultmenu");
      localStorage.removeItem("xinoicontextmenu");
      localStorage.removeItem("xinoiconoverlay");
      localStorage.removeItem("xinohoversubmenu");
      localStorage.removeItem("xinohoversubmenu1");
    }
  });
  // CLOSED SIDEMENU END

  // HOVER SUBMENU START
  $(document).on("click", "#myonoffswitch17", function () {
    if (this.checked) {
      $("body").addClass("hover-submenu");
      hovermenu();
      $("body").addClass("sidenav-toggled");
      $("body").removeClass("hover-submenu1");
      $("body").removeClass("default-menu");
      $("body").removeClass("closed-leftmenu");
      $("body").removeClass("icon-overlay");
      $("body").removeClass("icontext-menu");
      $(".app-sidebar").removeClass("sidemenu-scroll");

      localStorage.setItem("xinohoversubmenu", true);
      localStorage.removeItem("xinodefaultmenu");
      localStorage.removeItem("xinoclosedmenu");
      localStorage.removeItem("xinoicontextmenu");
      localStorage.removeItem("xinoiconoverlay");
      localStorage.removeItem("xinohoversubmenu1");
    }
  });
  // HOVER SUBMENU END

  // HOVER SUBMENU STYLE-1 START
  $(document).on("click", "#myonoffswitch18", function () {
    if (this.checked) {
      $("body").addClass("hover-submenu1");
      hovermenu();
      $("body").addClass("sidenav-toggled");
      $("body").removeClass("hover-submenu");
      $("body").removeClass("default-menu");
      $("body").removeClass("closed-leftmenu");
      $("body").removeClass("icon-overlay");
      $("body").removeClass("icontext-menu");
      $(".app-sidebar").removeClass("sidemenu-scroll");

      localStorage.setItem("xinohoversubmenu1", true);
      localStorage.removeItem("xinodefaultmenu");
      localStorage.removeItem("xinoclosedmenu");
      localStorage.removeItem("xinoicontextmenu");
      localStorage.removeItem("xinoiconoverlay");
      localStorage.removeItem("xinohoversubmenu");
    }
  });
  // HOVER SUBMENU STYLE-1 END

  // LEFT MENU IMAGE STYLES //

  // LEFT MENU IMAGE1 START //
  $("#leftmenuimage1").on("click", function () {
    $("body").removeClass("leftbgimage2");
    $("body").removeClass("leftbgimage3");
    $("body").removeClass("leftbgimage4");
    $("body").removeClass("leftbgimage5");
    $("body").removeClass("theme-style");

    $("body").addClass("leftbgimage1");

    localStorage.setItem("xinoleftimage1", true);
    localStorage.removeItem("xinoleftimage2");
    localStorage.removeItem("xinoleftimage3");
    localStorage.removeItem("xinoleftimage4");
    localStorage.removeItem("xinoleftimage5");
    localStorage.removeItem("xinothemestyle");
    return false;
  });
  // LEFT MENU IMAGE1 END //

  // LEFT MENU IMAGE2 START //
  $("#leftmenuimage2").on("click", function () {
    $("body").removeClass("leftbgimage1");
    $("body").removeClass("leftbgimage3");
    $("body").removeClass("leftbgimage4");
    $("body").removeClass("leftbgimage5");
    $("body").removeClass("theme-style2");
    $("body").removeClass("theme-style");
    $("body").addClass("leftbgimage2");

    localStorage.setItem("xinoleftimage2", true);
    localStorage.removeItem("xinoleftimage1");
    localStorage.removeItem("xinoleftimage3");
    localStorage.removeItem("xinoleftimage4");
    localStorage.removeItem("xinoleftimage5");
    localStorage.removeItem("xinothemestyle");
    return false;
  });
  // LEFT MENU IMAGE2 END //

  // LEFT MENU IMAGE3 START //
  $("#leftmenuimage3").on("click", function () {
    $("body").removeClass("leftbgimage1");
    $("body").removeClass("leftbgimage2");
    $("body").removeClass("leftbgimage4");
    $("body").removeClass("leftbgimage5");
    $("body").removeClass("theme-style2");
    $("body").removeClass("theme-style");
    $("body").addClass("leftbgimage3");

    localStorage.setItem("xinoleftimage3", true);
    localStorage.removeItem("xinoleftimage2");
    localStorage.removeItem("xinoleftimage1");
    localStorage.removeItem("xinoleftimage4");
    localStorage.removeItem("xinoleftimage5");
    localStorage.removeItem("xinothemestyle");
    return false;
  });
  // LEFT MENU IMAGE3 END //

  // LEFT MENU IMAGE4 START //
  $("#leftmenuimage4").on("click", function () {
    $("body").removeClass("leftbgimage1");
    $("body").removeClass("leftbgimage2");
    $("body").removeClass("leftbgimage3");
    $("body").removeClass("leftbgimage5");
    $("body").removeClass("theme-style2");
    $("body").removeClass("theme-style");
    $("body").addClass("leftbgimage4");

    localStorage.setItem("xinoleftimage4", true);
    localStorage.removeItem("xinoleftimage2");
    localStorage.removeItem("xinoleftimage3");
    localStorage.removeItem("xinoleftimage1");
    localStorage.removeItem("xinoleftimage5");
    localStorage.removeItem("xinothemestyle");
    return false;
  });
  // LEFT MENU IMAGE4 END //

  // LEFT MENU IMAGE5 START //
  $("#leftmenuimage5").on("click", function () {
    $("body").removeClass("leftbgimage1");
    $("body").removeClass("leftbgimage2");
    $("body").removeClass("leftbgimage3");
    $("body").removeClass("leftbgimage4");
    $("body").removeClass("theme-style2");
    $("body").removeClass("theme-style");
    $("body").addClass("leftbgimage5");

    localStorage.setItem("xinoleftimage5", true);
    localStorage.removeItem("xinoleftimage2");
    localStorage.removeItem("xinoleftimage3");
    localStorage.removeItem("xinoleftimage4");
    localStorage.removeItem("xinoleftimage1");
    localStorage.removeItem("xinothemestyle");
    return false;
  });
  // LEFT MENU IMAGE5 END //

  // DEFAULT BODY STYLE //
  $(document).on("click", "#myonoffswitch25", function () {
    if (this.checked) {
      $("body").removeClass("theme-style");
      $("body")?.removeClass("dark-menu");
      $("body")?.removeClass("color-menu");
      $("body")?.removeClass("gradient-menu");
      $("body")?.removeClass("light-menu");
      $("body")?.removeClass("dark-header");
      $("body")?.removeClass("color-header");
      $("body")?.removeClass("gradient-header");
      $("body")?.removeClass("header-light");
      $("body").removeClass("plain-color");
      $("body").removeClass("plain-color2");
      $("body").removeClass("leftbgimage1");
      $("body").removeClass("leftbgimage2");
      $("body").removeClass("leftbgimage3");
      $("body").removeClass("leftbgimage4");
      $("body").removeClass("leftbgimage5");
    }
  });

  // BODY STYLE //
  $(document).on("click", "#myonoffswitch21", function () {
    if (this.checked) {
      $("body").addClass("theme-style");
      $("body")?.removeClass("dark-menu");
      $("body")?.removeClass("color-menu");
      $("body")?.removeClass("gradient-menu");
      $("body")?.removeClass("light-menu");
      $("body")?.removeClass("dark-header");
      $("body")?.removeClass("color-header");
      $("body")?.removeClass("gradient-header");
      $("body")?.removeClass("header-light");
      $("body").removeClass("plain-color");
      $("body").removeClass("plain-color2");
      $("body").removeClass("leftbgimage1");
      $("body").removeClass("leftbgimage2");
      $("body").removeClass("leftbgimage3");
      $("body").removeClass("leftbgimage4");
      $("body").removeClass("leftbgimage5");

      localStorage.setItem("xinothemestyle", true);
      localStorage.removeItem("xinoleftimage2");
      localStorage.removeItem("xinoleftimage3");
      localStorage.removeItem("xinoleftimage4");
      localStorage.removeItem("xinoleftimage5");
      localStorage.removeItem("xinoLightmenu");
      localStorage.removeItem("xinoDarkmenu");
      localStorage.removeItem("xinoColormenu");
      localStorage.removeItem("xinoGradientmenu");
      localStorage.removeItem("xinoLightheader");
      localStorage.removeItem("xinoDarkheader");
      localStorage.removeItem("xinoColorheader");
      localStorage.removeItem("xinoGradientheader");
    }
  });

  /***************** ADD SWITCHER STYLES *********************/

  //  RTL STYLE

  if (!localStorage.getItem("xinortl") && !localStorage.getItem("xinoltr")) {
    /***************** RTL *********************/
    // $('body').addClass('rtl');
    /***************** RTL *********************/
  }

  //  DARK-MODE STYLE

  if (
    !localStorage.getItem("xinolightMode") &&
    !localStorage.getItem("xinodarkMode")
  ) {
    /***************** DARK Mode *********************/
    $("body").addClass("dark-mode");
    $("body").removeClass("light-mode");
    /***************** Dark Mode *********************/
  }

  // VERICALMENU AND HORIZONTAL

  if (
    !localStorage.getItem("xinosidebarMini") &&
    !localStorage.getItem("xinohorizontal") &&
    !localStorage.getItem("xinohorizontalHover")
  ) {
    /***************** HORIZONTAL CLICK *********************/

    $("body").addClass("horizontal");

    /***************** HORIZONTAL CLICK *********************/

    /***************** HORIZONTAL-HOVER *********************/

    // $('body').addClass('horizontal-hover');

    /***************** HORIZONTAL-HOVER *********************/
  }

  // SIDEMENU LAYOUT STYLES

  if (
    !localStorage.getItem("xinodefaultmenu") &&
    !localStorage.getItem("xinoclosedmenu") &&
    !localStorage.getItem("xinoicontextmenu") &&
    !localStorage.getItem("xinoiconoverlay") &&
    !localStorage.getItem("xinohoversubmenu") &&
    !localStorage.getItem("xinohoversubmenu1")
  ) {
    /**closed-leftmenu**/
    // $('body').addClass('closed-leftmenu');
    // $('body').addClass('sidenav-toggled');
    // if(document.querySelector('.closed-leftmenu').classList.contains('login-page') !== true){
    // hovermenu();
    // }
    /**closed-leftmenu**/
    /**Icon-Text-Menu**/
    // $('body').addClass('icontext-menu');
    // $('body').addClass('sidenav-toggled');
    // if(document.querySelector('.icontext-menu').classList.contains('login-page') !== true){
    // icontext();
    // }
    /**Icon-Text-Menu**/
    /**Icon-Overlay-Menu**/
    // $('body').addClass('icon-overlay');
    // $('body').addClass('sidenav-toggled');
    /**Icon-Overlay-Menu**/
    /**Hover-Sub-Menu**/
    // $('body').addClass('hover-submenu');
    // $('body').addClass('sidenav-toggled');
    // if(document.querySelector('.hover-submenu').classList.contains('login-page') !== true){
    // hovermenu();
    // }
    /**Hover-Sub-Menu**/
    /**Hover-Sub-Menu1**/
    // $('body').addClass('hover-submenu1');
    // $('body').addClass('sidenav-toggled');
    // if(document.querySelector('.hover-submenu1').classList.contains('login-page') !== true){
    // hovermenu();
    // }
    /**Hover-Sub-Menu1**/
  }

  // BODY STYLE

  if (
    !localStorage.getItem("xinodefaultbody") &&
    !localStorage.getItem("xinothemestyle")
  ) {
    // $('body').addClass('theme-style');
  }

  // BOXED LAYOUT STYLE
  if (
    !localStorage.getItem("xinofullwidth") &&
    !localStorage.getItem("xinoboxedwidth")
  ) {
    /*Layout-width Styles*/
    // $('body').addClass('layout-boxed');
  }

  // SCROLLABLE LAYOUT STYLE
  if (
    !localStorage.getItem("xinofixed") &&
    !localStorage.getItem("xinoscrollable")
  ) {
    /*Header-Position Styles*/
    // $('body').addClass('scrollable-layout');
  }

  // MENU STYLES
  if (
    !localStorage.getItem("xinolightmenu") &&
    !localStorage.getItem("xinocolormenu") &&
    !localStorage.getItem("xinodarkmenu")
  ) {
    /**Light-menu**/
    // $('body').addClass('light-menu');
    /**Light-menu**/
    /**Color-menu**/
    // $('body').addClass('color-menu');
    /**Color-menu**/
    /**Dark-menu**/
    $("body").addClass("dark-menu");
    /**Dark-menu**/
    /**Gradient-menu**/
    // $('body').addClass('gradient-menu');
    /**Gradient-menu**/
  }

  // HEADER STYLES

  if (
    !localStorage.getItem("xinolightheader") &&
    !localStorage.getItem("xinocolorheader") &&
    !localStorage.getItem("xinodarkheader")
  ) {
    /**Light-Header**/
    // $('body').addClass('header-light');
    /**Light-Header**/
    /**Color-Header**/
    // $('body').addClass('color-header');
    /**Color-Header**/
    /**Dark-Header**/
    // $('body').addClass('dark-header');
    /**Dark-Header**/
    /**Gradient-Header**/
    // $('body').addClass('gradient-header');
    /**Gradient-Header**/
  }

  // LEFTMENU IMAGE STYLES

  if (
    !localStorage.getItem("xinoleftimage1") &&
    !localStorage.getItem("xinoleftimage2") &&
    !localStorage.getItem("xinoleftimage3") &&
    !localStorage.getItem("xinoleftimage4") &&
    !localStorage.getItem("xinoleftimage5")
  ) {
    /**leftbgimage1**/
    // $('body').addClass('leftbgimage1');
    /**leftbgimage1**/
    /**leftbgimage2**/
    // $('body').addClass('leftbgimage2');
    /**leftbgimage2**/
    /**leftbgimage3**/
    // $('body').addClass('leftbgimage3');
    /**leftbgimage3**/
    /**leftbgimage4**/
    // $('body').addClass('leftbgimage4');
    /**leftbgimage4**/
    /**leftbgimage5**/
    // $('body').addClass('leftbgimage5');
    /**leftbgimage5**/
  }

  /***************** ADD SWITCHER STYLES *********************/
}
switcherEvents();

(function () {
  "use strict";

  /***************** RTL HAs Class START *********************/
  let bodyRtl = $("body").hasClass("rtl");
  if (bodyRtl) {
    $("body").addClass("rtl");

    $("#slide-left").removeClass("d-none");
    $("#slide-right").removeClass("d-none");
    $("html[lang=en]").attr("dir", "rtl");
    $("body").removeClass("ltr");
    $("head link#style").attr("href", $(this));
    document
      .getElementById("style")
      .setAttribute(
        "href",
        "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"
      );
    var carousel = $(".owl-carousel");
    $.each(carousel, function (index, element) {
      // element == this
      var carouselData = $(element).data("owl.carousel");
      carouselData.settings.rtl = true; //don't know if both are necessary
      carouselData.options.rtl = true;
      $(element).trigger("refresh.owl.carousel");
    });
  }
  /***************** RTL HAs Class END *********************/

  /***************** Horizontal HAs Class START *********************/
  let bodyhorizontal = $("body").hasClass("horizontal");
  if (bodyhorizontal) {
    if (!document.querySelector(".login-page")) {
      ActiveSubmenu();
      checkHoriMenu();
      responsive();
    }
    if (window.innerWidth >= 992) {
      let li = document.querySelectorAll(".side-menu li");
      li.forEach((e, i) => {
        e.classList.remove("is-expanded");
      });
      var animationSpeed = 300;
      // first level
      var parent = $("[data-bs-toggle='sub-slide']").parents("ul");
      var ul = parent.find("ul:visible").slideUp(animationSpeed);
      ul.removeClass("open");
      var parent1 = $("[data-bs-toggle='sub-slide2']").parents("ul");
      var ul1 = parent1.find("ul:visible").slideUp(animationSpeed);
      ul1.removeClass("open");
    }
    $("body").addClass("horizontal");
    $(".main-content").addClass("horizontal-content");
    $(".main-content").removeClass("app-content");
    $(".main-container").addClass("container");
    $(".main-container").removeClass("container-fluid");
    $(".main-header").addClass("hor-header");
    $(".hor-header").removeClass("app-header");
    $(".app-sidebar").addClass("horizontal-main");
    $(".main-sidemenu").addClass("container");
    $("body").removeClass("sidebar-mini");
    $("body").removeClass("sidenav-toggled");
    $("body").removeClass("horizontal-hover");
    $("body").removeClass("default-menu");
    $("body").removeClass("icontext-menu");
    $("body").removeClass("icon-overlay");
    $("body").removeClass("closed-leftmenu");
    $("body").removeClass("hover-submenu");
    $("body").removeClass("hover-submenu1");

    $("body").removeClass("leftbgimage1");
    $("body").removeClass("leftbgimage2");
    $("body").removeClass("leftbgimage3");
    $("body").removeClass("leftbgimage4");
    $("body").removeClass("leftbgimage5");

    // // To enable no-wrap horizontal style
    $("#slide-left").removeClass("d-none");
    $("#slide-right").removeClass("d-none");
    document
      .querySelector(".horizontal .side-menu")
      ?.classList.add("flex-nowrap");
    // To enable wrap horizontal style
    // $('#slide-left').addClass('d-none');
    // $('#slide-right').addClass('d-none');
    // document.querySelector('.horizontal .side-menu').style.flexWrap = 'wrap'
  }
  /***************** Horizontal HAs Class END *********************/

  /***************** Horizontal Hover HAs Class START *********************/
  function light() {
    "use strict";
    if (document.querySelector("body").classList.contains("light-mode")) {
      $("#myonoffswitch19").prop("checked", true);
      $("#myonoffswitch6").prop("checked", true);
    }
  }
  light();
  let bodyhorizontalHover = $("body").hasClass("horizontal-hover");
  if (bodyhorizontalHover) {
    if (!document.querySelector(".login-page")) {
      checkHoriMenu();
      responsive();
    }
    if (window.innerWidth >= 992) {
      let li = document.querySelectorAll(".side-menu li");
      li.forEach((e, i) => {
        e.classList.remove("is-expanded");
      });
      var animationSpeed = 300;
      // first level
      var parent = $("[data-bs-toggle='sub-slide']").parents("ul");
      var ul = parent.find("ul:visible").slideUp(animationSpeed);
      ul.removeClass("open");
      var parent1 = $("[data-bs-toggle='sub-slide2']").parents("ul");
      var ul1 = parent1.find("ul:visible").slideUp(animationSpeed);
      ul1.removeClass("open");
    }
    $("body").addClass("horizontal-hover");
    $("body").addClass("horizontal");
    // $('#slide-left').addClass('d-none');
    // $('#slide-right').addClass('d-none');
    // document.querySelector('.horizontal .side-menu').style.flexWrap = 'wrap'
    $("#slide-left").addClass("d-none");
    $("#slide-right").addClass("d-none");
    document
      .querySelector(".horizontal .side-menu")
      ?.classList.add("flex-nowrap");
    $(".main-content").addClass("horizontal-content");
    $(".main-content").removeClass("app-content");
    $(".main-container").addClass("container");
    $(".main-container").removeClass("container-fluid");
    $(".main-header").addClass("hor-header");
    $(".hor-header").removeClass("app-header");
    $(".app-sidebar").addClass("horizontal-main");
    $(".main-sidemenu").addClass("container");
    $("body").removeClass("sidebar-mini");
    $("body").removeClass("sidenav-toggled");
    $("body").removeClass("default-menu");
    $("body").removeClass("icontext-menu");
    $("body").removeClass("icon-overlay");
    $("body").removeClass("closed-leftmenu");
    $("body").removeClass("hover-submenu");
    $("body").removeClass("hover-submenu1");

    $("body").removeClass("leftbgimage1");
    $("body").removeClass("leftbgimage2");
    $("body").removeClass("leftbgimage3");
    $("body").removeClass("leftbgimage4");
    $("body").removeClass("leftbgimage5");
  }
  /***************** Horizontal Hover HAs Class END *********************/

  /***************** CLOSEDMENU HAs Class *********************/
  let bodyclosed = $("body").hasClass("closed-leftmenu");
  if (bodyclosed) {
    $("body").addClass("closed-leftmenu");
    $("body").addClass("sidenav-toggled");
    if (
      document
        .querySelector(".closed-leftmenu")
        .classList.contains("login-page") !== true
    ) {
      hovermenu();
    }
  }
  /***************** CLOSEDMENU HAs Class *********************/

  /***************** ICONTEXT MENU HAs Class *********************/
  let bodyicontext = $("body").hasClass("icontext-menu");
  if (bodyicontext) {
    $("body").addClass("icontext-menu");
    $("body").addClass("sidenav-toggled");
    if (
      document
        .querySelector(".icontext-menu")
        .classList.contains("login-page") !== true
    ) {
      icontext();
    }
  }
  /***************** ICONTEXT MENU HAs Class *********************/

  /***************** ICONOVERLAY MENU HAs Class *********************/
  let bodyiconoverlay = $("body").hasClass("icon-overlay");
  if (bodyiconoverlay) {
    $("body").addClass("icon-overlay");
    $("body").addClass("sidenav-toggled");
    if (
      document
        .querySelector(".icon-overlay")
        .classList.contains("login-page") !== true
    ) {
      hovermenu();
    }
  }
  /***************** ICONOVERLAY MENU HAs Class *********************/

  /***************** HOVER-SUBMENU HAs Class *********************/
  let bodyhover = $("body").hasClass("hover-submenu");
  if (bodyhover) {
    $("body").addClass("hover-submenu");
    $("body").addClass("sidenav-toggled");
    if (
      document
        .querySelector(".hover-submenu")
        .classList.contains("login-page") !== true
    ) {
      hovermenu();
    }
  }
  /***************** HOVER-SUBMENU HAs Class *********************/

  /***************** HOVER-SUBMENU HAs Class *********************/
  let bodyhover1 = $("body").hasClass("hover-submenu1");
  if (bodyhover1) {
    $("body").addClass("hover-submenu1");
    $("body").addClass("sidenav-toggled");
    if (
      document
        .querySelector(".hover-submenu1")
        .classList.contains("login-page") !== true
    ) {
      hovermenu();
    }
  }
  /***************** HOVER-SUBMENU HAs Class *********************/
  checkOptions();
})();

// CHECK OPTIONS
function checkOptions() {
  "use strict";
  // rtl
  if (document.querySelector("body").classList.contains("rtl")) {
    $("#myonoffswitch24").prop("checked", true);
  }
  // horizontal
  if (document.querySelector("body").classList.contains("horizontal")) {
    $("#myonoffswitch35").prop("checked", true);
  }
  // horizontal-hover
  if (document.querySelector("body").classList.contains("horizontal-hover")) {
    $("#myonoffswitch111").prop("checked", true);
  }

  // light header
  if (document.querySelector("body").classList.contains("header-light")) {
    $("#myonoffswitch6").prop("checked", true);
  }
  // color header
  if (document.querySelector("body").classList.contains("color-header")) {
    $("#myonoffswitch7").prop("checked", true);
  }
  // gradient header
  if (document.querySelector("body").classList.contains("gradient-header")) {
    $("#myonoffswitch20").prop("checked", true);
  }
  // dark header
  if (document.querySelector("body").classList.contains("dark-header")) {
    $("#myonoffswitch8").prop("checked", true);
  }

  // light menu
  if (document.querySelector("body").classList.contains("light-menu")) {
    $("#myonoffswitch3").prop("checked", true);
  }
  // color menu
  if (document.querySelector("body").classList.contains("color-menu")) {
    $("#myonoffswitch4").prop("checked", true);
  }
  // gradient menu
  if (document.querySelector("body").classList.contains("gradient-menu")) {
    $("#myonoffswitch19").prop("checked", true);
  }
  // dark menu
  if (document.querySelector("body").classList.contains("dark-menu")) {
    $("#myonoffswitch5").prop("checked", true);
  }
}
checkOptions();

// RESET SWITCHER TO DEFAULT
function resetData() {
  "use strict";

  $("#myonoffswitch3").prop("checked", true);
  $("#myonoffswitch6").prop("checked", true);
  $("#myonoffswitch1").prop("checked", true);
  $("#myonoffswitch9").prop("checked", true);
  $("#myonoffswitch11").prop("checked", true);
  $("#myonoffswitch13").prop("checked", true);
  $("#myonoffswitch34").prop("checked", true);
  $("#myonoffswitch23").prop("checked", true);
  $("body")?.removeClass("transparent-mode");
  $("body")?.removeClass("dark-mode");
  $("body")?.removeClass("dark-menu");
  $("body")?.removeClass("color-menu");
  $("body")?.removeClass("gradient-menu");
  $("body")?.removeClass("light-menu");
  $("body")?.removeClass("dark-header");
  $("body")?.removeClass("color-header");
  $("body")?.removeClass("gradient-header");
  $("body")?.removeClass("header-light");
  $("body")?.removeClass("layout-boxed");
  $("body")?.removeClass("icontext-menu");
  $("body")?.removeClass("icon-overlay");
  $("body")?.removeClass("closed-leftmenu");
  $("body")?.removeClass("hover-submenu");
  $("body")?.removeClass("hover-submenu1");
  $("body")?.removeClass("sidenav-toggled");
  $("body")?.removeClass("scrollable-layout");
  $("body").removeClass("leftbgimage1");
  $("body").removeClass("leftbgimage2");
  $("body").removeClass("leftbgimage3");
  $("body").removeClass("leftbgimage4");
  $("body").removeClass("leftbgimage5");
  $("body").removeClass("theme-style2");
  $("body").removeClass("theme-style");
  $("body")?.removeClass("rtl");
  $("body")?.addClass("ltr");

  document.querySelector("html").setAttribute("dir", "ltr");

  // resetting horizontal to vertical
  $("body").removeClass("horizontal");
  $("body").removeClass("horizontal-hover");
  $(".main-content").removeClass("horizontal-content");
  $(".main-content").addClass("app-content");
  $(".main-container").removeClass("container");
  $(".main-container").addClass("container-fluid");
  $(".main-header").removeClass("hor-header");
  $(".hor-header").addClass("app-header");
  $(".app-sidebar").removeClass("horizontal-main");
  $(".main-sidemenu").removeClass("container");
  $(".slide-menu").removeClass("ps");
  $(".slide-menu").removeClass("ps--active-y");
  $("#slide-left").removeClass("d-none");
  $("#slide-right").removeClass("d-none");
  $("body").addClass("sidebar-mini");
  $("body").addClass("light-mode");

  $("head link#style").attr("href", $(this));
  document
    .getElementById("style")
    .setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.min.css");

  var carousel = $(".owl-carousel");
  $.each(carousel, function (index, element) {
    // element == this
    var carouselData = $(element).data("owl.carousel");
    carouselData.settings.rtl = false; //don't know if both are necessary
    carouselData.options.rtl = false;
    $(element).trigger("refresh.owl.carousel");
  });

  if (!document.querySelector("body").classList.contains("login-page")) {
    responsive();
  }
}
