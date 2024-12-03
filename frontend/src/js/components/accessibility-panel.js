import $ from "../vendors/jquery.min";

const PANEL_IDS = {
  fontDefault: ".fontDefault",
  fontMedium: ".fontMedium",
  fontLarge: ".fontLarge",
  hideAccessibilityPanel: "#hideAccessibilityPanel",
  showAccessibilityPanel: "#showAccessibilityPanel",
  accessibilityPanel: "#accessibilityPanel",

  contrastColorsBlue: ".contrastColorsBlue",
  contrastColorsBlack: ".contrastColorsBlack",
  contrastColorsYellow: ".contrastColorsYellow"
};

const DEFAULT_FONT_SIZE = 1;
const MEDIUM_FONT_SIZE = 1.25;
const LARGE_FONT_SIZE = 1.5;

$(document).ready(function () {
  const isPanelOpen = localStorage.getItem("accessibilityPanelOpen") === "true";

  if (isPanelOpen) {
    openAccessibilityPanel();
  } else {
    closeAccessibilityPanel();
  }

  $(".contrastColorsBlue").trigger("click");
  $(PANEL_IDS.fontDefault).trigger("click");

  $(PANEL_IDS.contrastColorsBlue).click(function () {
    $("body")
      .removeClass("blue-contrast black-contrast yellow-contrast")
      .addClass("blue-contrast");
    updateActiveContrastButton(this);
  });

  $(PANEL_IDS.contrastColorsBlack).click(function () {
    $("body")
      .removeClass("blue-contrast yellow-contrast")
      .addClass("black-contrast");
    updateActiveContrastButton(this);
  });

  $(PANEL_IDS.contrastColorsYellow).click(function () {
    $("body")
      .removeClass("blue-contrast black-contrast")
      .addClass("yellow-contrast");
    updateActiveContrastButton(this);
  });

  $(PANEL_IDS.fontDefault).click(function () {
    $("html").css("font-size", `${DEFAULT_FONT_SIZE}rem`);
    updateActiveButton(PANEL_IDS.fontDefault);
  });

  $(PANEL_IDS.fontMedium).click(function () {
    $("html").css("font-size", `${MEDIUM_FONT_SIZE}rem`);
    updateActiveButton(PANEL_IDS.fontMedium);
  });

  $(PANEL_IDS.fontLarge).click(function () {
    $("html").css("font-size", `${LARGE_FONT_SIZE}rem`);
    updateActiveButton(PANEL_IDS.fontLarge);
  });

  $(PANEL_IDS.showAccessibilityPanel).click(function () {
    openAccessibilityPanel();
  });

  $(PANEL_IDS.hideAccessibilityPanel).click(function () {
    closeAccessibilityPanel();
  });

  function openAccessibilityPanel() {
    $(PANEL_IDS.accessibilityPanel).slideDown();
    $("body").css("margin-top", 100);
    $("body").addClass("accessibility");
    localStorage.setItem("accessibilityPanelOpen", "true");
  }

  function closeAccessibilityPanel() {
    $(PANEL_IDS.accessibilityPanel).slideUp();
    $("html").css("font-size", `${DEFAULT_FONT_SIZE}rem`);
    $("body").removeClass(
      "accessibility blue-contrast black-contrast yellow-contrast"
    );
    $("body").css("margin-top", 0);
    $("img").show();
    localStorage.setItem("accessibilityPanelOpen", "false");
  }

  function updateActiveButton(activeButton) {
    $(".fontSizes div").removeClass("selected");
    $(activeButton).addClass("selected");
  }

  function updateActiveContrastButton(activeButton) {
    $(".contrastColors div").removeClass("selected");
    $(activeButton).addClass("selected");
  }
});
