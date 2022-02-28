/* --------------------------------
---------------  Khai báo hàm và Function Signature  ---------------
-------------------------------- */
function funcName(param1: string, param2?: number): number {
	return 0;
}

const funcName2 = (param: number): number => param * 2;

let funcName3: Function;
funcName3 = () => console.log('Hello');

// Function signature (Khai báo 1 function như chưa định nghĩa)
let sayHelloFunction: (msg: string) => void;
sayHelloFunction = (msg: string) => console.log(msg);

/* --------------------------------
---------------  Kiểu trả về cho hàm  ---------------
-------------------------------- */
// Nếu function không khai báo kiểu trả về thì nó mặc định là void
function returnVoidValueFunc(param: any) {}
// tương đương
function returnVoidValueFunc2(param: any): void {}

// Hoặc function sẽ tự lấy kiểu ngầm định dựa trên kết quả tính toán
const implicitFunc = (num1: number, num2: number) => num1 * num2; // => type: number

/* --------------------------------
---------------  Optional param & default param  ---------------
-------------------------------- */

// Optional parameter ?
const add = (a: number, b: number, c?: number): number => a + b + c;

// Default parameter
const add2 = (a: number, b: number = 5) => a + b;
