/* --------------------------------
---------------  Kiểu nguyên thuỷ (Primitive types)  ---------------
-------------------------------- */
// Boolean
let isTrue: boolean = false;

// Number
let decimal: number = 6;
let hex: number = 0xf00d;
let binary: number = 0b1010;
let octal: number = 0o744;
let big: bigint = 100n;

// String
let myName: string = 'Dyno';

// Null
const nullType: null = null;

// Undefined (Giá trị mặc định khi khởi tạo 1 biến mà chưa gán giá trị)
// Nếu gán 1 biến với kiểu undefined thì biến đó không bao giờ đc sử dụng nữa
let undefinedVar: number;
let undefinedVar2: undefined; // Không có ý nghĩa

/* --------------------------------
---------------  Các kiểu khác trong TS  ---------------
-------------------------------- */
// Array
let arr: number[] = [1, 2, 3];
let myArr: Array<number> = [1, 2, 3];

// Tuple (mảng phần tử nhiều kiểu có thứ tự)
let myTuple: [string, number, boolean, number];
myTuple = ['Dyno', 18, true, 20];
myTuple[0] = 1; // Chửi ngay `Type 'number' is not assignable to type 'string'`

// Enum
enum Color {
	Red, // 0
	Green, // 1
	Blue, // 2
}
console.log(Color.Blue); // 2
console.log(Color[2]); // Blue

enum Status {
	Waiting = 4,
	Doing = 1,
	Done = 5,
}

// Object
const obj1: object = {
	name: 'Dyno',
	age: 18,
	isStudent: true,
};
// TS sẽ kiểm tra type của từng thuộc tính trong obj
obj1.age = '18'; // Nó chửi liền `Type 'string' is not assignable to type 'number'`

// Any (nhận giá trị bất kỳ => Không nên dùng kiểu này trong TS)
let anyVar: any = 1;
anyVar = 'Dyno';
anyVar = [1, 2, 'Dyno'];

// Void (thường gán cho 1 hàm không trả về gì)
const funcReturnVoid = (): void => console.log('Hello');

// Never (Biểu diễn 1 sự việc không bao giờ xảy ra. 1 hàm không thể kết thúc hoặc luôn throw error)
const funcReturnNever = (): never => {
	while (true) {}
};
const funcReturnNever2 = (): never => {
	throw new Error('Error');
};

// Unknown (kiểu được gán khi chạy chương trình, thường đi với generics)

// Type Alias (định nghĩa ra 1 kiểu dữ liệu dựa trên các kiểu dữ liệu có sẵn)
type StringOrNumber = string | number;
let typeAlias: StringOrNumber = 1;
typeAlias = 'Dyno';

// TS sẽ kiểm tra type của từng thuộc tính trong obj
const obj1 = {
	name: 'Dyno',
	age: 18,
	isStudent: true,
};

obj1.age = '18'; // Nó chửi liền `Type 'string' is not assignable to type 'number'`

// Union type (1 biến có thể nhận nhiều kiểu dữ liệu)
let unionType: number | string | null = 1;
unionType = 'Hello';
unionType = null;
unionType = false; // không thể

/* --------------------------------
---------------  Các kiểu khai báo  ---------------
-------------------------------- */
// Khai báo kiểu tường minh (Explicit Types)
let explicitType: string = 'Explicit Type';

//  Khai báo kiểu ngầm định (Implicit Types)
let implicitType = 'Implicit Type'; // typeof implicitType = string
