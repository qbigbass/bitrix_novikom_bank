export type Sizes = 'l' | 'm' | 's' | 'lm' | 'ls' | 'ms';
export type Colors = 'primary' | 'secondary' | 'white' | 'transparent' | 'green';
export type Elements = 'a' | 'button';

export interface Props {
	size?: Sizes;
	color?: Colors;
	element?: Elements;
	full?: boolean;
	outline?: boolean;
	text?: boolean;
	beforeIcon?: string;
	afterIcon?: string;
	afterIconClass?: string;
	beforeIconClass?: string;
	href?: string;
	class?: string;
}
