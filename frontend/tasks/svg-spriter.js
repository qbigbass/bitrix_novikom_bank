import { spriter } from '../spriter.js'

const config = {
	'dest': './public/assets',
	'svg': {
		'xmlDeclaration': false
	},
	'mode': {
		'symbol': {
			// здесь ../ в пути чтобы файл попал в /public/svg-sprite.svg,
			// т.е. из пути конфига config.dest/config.mode.symbol.sprite
			// иначе SVGSpriter по умолчанию создаст директорию config.dest/config.mode.symbol/config.mode.symbol.sprite
			'sprite': '../svg-sprite'
		}
	}
};

spriter(config, 'src/assets/svg-sprite/');