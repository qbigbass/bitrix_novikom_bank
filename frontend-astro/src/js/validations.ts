export const notEmpty = (value: string): boolean => {
	return Boolean(String(value.trim()).length);
}

export const isEmail = (value: string): boolean => {
	return new RegExp('[^@ \\t\\r\\n]+@[^@ \\t\\r\\n]+\\.[^@ \\t\\r\\n]+').test(value);
}

export const isPhone = (value: string): boolean => {
	return new RegExp(/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/).test(value);
}