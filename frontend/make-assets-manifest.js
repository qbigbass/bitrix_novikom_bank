import { writeFile, readFile as fsReadFile } from 'node:fs';
import { readdir } from 'node:fs/promises';

const buildDir = 'build';

function readFile(filepath) {
	return new Promise((resolve, reject) => {
		fsReadFile(filepath, 'utf8', function (error, data) {
			if (error) return reject(error);
			resolve(data);
		});
	});
}

const getAssetsLinks = (str) => {
	const pageAssets = {};
	const linkReg = /<link rel=(.+)\/>/gm;
	const scriptReg = /<script(.+)><\/script>/gm;

	pageAssets.css = str.match(linkReg);
	pageAssets.js = str.match(scriptReg);

	Object.keys(pageAssets).forEach((key) => {
		const assetsCollection = pageAssets[key];

		if (pageAssets[key]) {
			if (key === 'css') {
				pageAssets.css = assetsCollection.map((link) => {
					const filePath = /href="(.+)"/.exec(link);
					return filePath.length && filePath[1] ?  `${filePath[1]}` : '';
				});
			}

			if (key === 'js') {
				pageAssets.js = assetsCollection.map((link) => {
					const filePath = /src="(.+)"/.exec(link);
					return filePath.length && filePath[1] ?  `${filePath[1]}` : '';
				});
			}
		}
	});

	return pageAssets;
}

const writeAssetsList = (assets) => {
	writeFile(`${buildDir}/assets-manifest.json`, JSON.stringify(assets), { flag: 'w' }, function (error) {
		if (error) {
			throw error;
		}
		console.info(`created ${buildDir}/assets-manifest.json`);
	});
}



const getPagesAssets = async () => {
	let pages = await readdir(buildDir);
	const assetsList = {};

	pages = pages.filter((page) => {
		const ext = page.split('.')[1];
		if (ext && ext === 'html') {
			return `${page}`;
		}
	});

	for(const page of pages) {
		const html = await readFile(`${buildDir}/${page}`);
		const assets = getAssetsLinks(html);
		const pageName = page.replace('.html', '');

		assetsList[pageName] = {
			css: assets.css,
			js: assets.js
		}
	}

	return assetsList;
}

const pagesAssets = await getPagesAssets();

writeAssetsList(pagesAssets);
