import SVGSpriter from 'svg-sprite';
import fs from 'node:fs';
import path from 'node:path';

export const spriter = (config, svgSrcDir) => {
	const spriter = new SVGSpriter(config);

	const svgSrcContents = fs.readdirSync(svgSrcDir);
	svgSrcContents.forEach((srcFile) => {
		const srcFilePath = path.resolve(`${svgSrcDir}${srcFile}`);
		spriter.add(srcFilePath, null, fs.readFileSync(srcFilePath, 'utf-8'));
	})

	spriter.compile(function (error, result) {
		if (error) {
			throw new Error(error);
		}

		for (let mode in result) {

			for (let type in result[mode]) {
				const dir = path.dirname(result[mode][type].path);

				if (!fs.existsSync(dir)) {
					fs.mkdirSync(dir, { recursive: true });
				}
				fs.writeFileSync(result[mode][type].path, result[mode][type].contents);
			}
		}
	});
}