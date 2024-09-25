import { spriter } from '../spriter.js'

const config = {
	'dest': './public/assets',
	'svg': {
		'xmlDeclaration': false
	},
	'mode': {
		'symbol': {
			'sprite': '../app-logos'
		}
	}
};

spriter(config, 'src/assets/app-logos/');