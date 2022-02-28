/* --------------------------------
---------------  Interface  ---------------
-------------------------------- */

interface IPerson {
	name: string;
	age: number;
	gender: boolean;
	birthday?: Date;
	speak(lang: string): void;
}

const p: IPerson = {
	name: 'Dyno',
	age: 18,
	gender: true,
	speak: (lang: string) => {
		console.log(`Speak ${lang}`);
	},
};

// Một class có thể implement từ 1 hoặc nhiều Interface
class Person2 implements IPerson {
	constructor(
		public name: string,
		public age: number,
		public gender: boolean,
	) {}

	speak(lang: string): void {
		console.log(lang);
	}
}

/* --------------------------------
---------------  Type  ---------------
-------------------------------- */
type Shape = {
	name: string;
	color: string;
};

/* --------------------------------
---------------  Sự khác nhau giữa Type và Interface  ---------------
-------------------------------- */

// 1. Interface tự merge còn Type thì không
interface A {
	a: number;
}
interface A {
	b: string;
}
const instanceA: A = {
	a: 1,
	b: 'hello',
};

// Duplicate identifier 'B'
type B = {
	a: number;
};
type B = {
	b: string;
};

// 2. Type có thể sử dụng được với "Computed Properties" còn interface thì không
type keys = 'color' | 'name';

type ComputedProp = {
	[key in keys]: string;
};
const typeInstance: ComputedProp = {
	name: 'Red',
	color: '#ff0000',
};

// A mapped type may not declare properties or methods
interface IComputedProp {
	[key in keys]: string;
}

// 3. Tuple Type
type Tuple = [number, number];

interface ITuple {
	0: number;
	1: number;
}

[1, 2, 3] as Tuple; // Conversion of type '[number, number, number]' to type '[number, number]' may be a mistake
[1, 2, 3] as ITuple; // Ok

// 4. Type có Unions type còn interface thì không
type colors = 'blue' | 'green';

// 5. Cú pháp extends
interface IAnimal {
	name: string;
}

interface IBear extends IAnimal {
	honey: boolean;
}

//  Với Type sử dụng Intersection Types(&):
type TAnimal = {
	name: string;
};

type TBear = TAnimal & {
	honey: boolean;
};
