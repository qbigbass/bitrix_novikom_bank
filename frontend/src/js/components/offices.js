const OFFICES_ELEMS = {
  buttonToTop: '.js-scroll-to-top',
  wrapper: '.section-office',
  mapContent: '.map-content',
  mapWrapper: '.map-wrapper',
  showClass: 'is-show'
}

function initOffices() {
  const buttonToTop = document.querySelector(OFFICES_ELEMS.buttonToTop);
  const sectionOffice = document.querySelector(OFFICES_ELEMS.wrapper);
  const mapWrapper = document.querySelector(OFFICES_ELEMS.mapWrapper);

  if (!buttonToTop || !sectionOffice || !mapWrapper) return;

  const mapWrapperHeight = mapWrapper.offsetHeight;

  buttonToTop.addEventListener('click', () => {
    sectionOffice.scrollTo({
      top: 0,
      behavior: 'smooth'
    })
  })

  const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      buttonToTop.classList.remove(OFFICES_ELEMS.showClass);
    } else {
      buttonToTop.classList.add(OFFICES_ELEMS.showClass);
    }
  }, {
    root: sectionOffice,
    rootMargin: `${mapWrapperHeight}px`,
    threshold: 1.0
  });

  observer.observe(mapWrapper);
}

export default initOffices;
