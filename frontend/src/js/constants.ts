export const VALIDATION_ERRORS = {
	notEmpty: 'Поле обязательно для заполнения!',
	isEmail: 'Электронный адрес введен не верно!',
	isPhone: 'Номер телефона введен не верно!'
}

export const INPUT_MASKS: { [key: string] : string } = {
	phone: '+{7} (000) 000-00-00',
}

export const MEDIA_QUERIES = {
	'mobile-s': '320px',
	mobile: '375px',
	tablet: '768px',
	'tablet-album': '1200px',
	laptop: '1440px',
	'laptop-x': '1600px',
	desktop: '1920px',
}
