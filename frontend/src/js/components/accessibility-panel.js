import $ from "../vendors/jquery.min";

const PANEL_IDS = {
    toggleContrast: '#toggleContrast',
    fontLarger: '#fontLarger',
    fontSmaller: '#fontSmaller',
    hideAccessibilityPanel: '#hideAccessibilityPanel',
    showAccessibilityPanel: '#showAccessibilityPanel',
    accessibilityPanel:'#accessibilityPanel'
}

const DEFAULT_FONT_SIZE = 16;



$(document).ready(function() {
    $(PANEL_IDS.toggleContrast).click(function() {
      $('body').toggleClass('high-contrast');
      $('img').toggle();
    });

  
    let fontSize = 16;
    $(PANEL_IDS.fontLarger).click(function() {
      if (fontSize < 24) {
        fontSize += 4;
        $('html').css('font-size', fontSize + 'px');
      }
    });
  
    $(PANEL_IDS.fontSmaller).click(function() {
      if (fontSize > DEFAULT_FONT_SIZE) {
        fontSize -= 4;
        $('html').css('font-size', fontSize + 'px');
      }
    });

    $(PANEL_IDS.showAccessibilityPanel).click(function() {
      $(PANEL_IDS.accessibilityPanel).show();
      $('body').css('margin-top', 40);
      $('body').addClass('accesibility');
    });

    $(PANEL_IDS.hideAccessibilityPanel).click(function() {
        $(PANEL_IDS.accessibilityPanel).hide();
        $('html').css('font-size', DEFAULT_FONT_SIZE + 'px');
        $('body').removeClass('high-contrast');
        $('body').removeClass('accesibility');
        $('body').css('margin-top', 0);
        $('img').show();
      });
  });
