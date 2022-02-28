// Generic Type<T>
type StrArray = Array<string>;
const arrStr: StrArray = ['hello', 'Dyno'];

type NumberArray = Array<number>;
const arrNum: NumberArray = [1, 2, 3];

/* --------------------------------
---------------  Tạo 1 hàm vói Generic param  ---------------
-------------------------------- */
const genericFunc = <T>(arr: Array<T>) => {
	console.log(arr[arr.length - 1]);
};

genericFunc([1, 2, 3]);
genericFunc<string>(['Hello', 'Dyno']);

// Có thể có nhiều generic trong 1 hàm
function genericFuncXY<X, Y>(x: X, y: Y): [X, Y] {
	console.log([x, y]);
	return [x, y];
}

genericFuncXY(5, 'Hello');
genericFuncXY<string, string>('Hello', 'Dyno');

// default generic
function genericFuncDefault<X, Y = number>(x: X, y: Y) {
	return [x, y];
}

genericFuncDefault<string>('Hello', 1);
genericFuncDefault<string>('Hello', 'Dyno'); // Argument of type 'string' is not assignable to parameter of type 'number'

/* --------------------------------
---------------  Generic Extends  ---------------
-------------------------------- */
const makeFullNameConstraint = (obj: {
	firstName: string;
	lastName: string;
}) => {
	return { ...obj, fullname: `${obj.firstName} ${obj.lastName}` };
};
// Object truyền vào bắt buộc phải ;là { firstName và lastName }
makeFullNameConstraint({ name: 'Dyno', age: 18 });
makeFullNameConstraint({
	name: 'Dyno',
	age: 18,
	firstName: 'Dyno',
	lastName: 'Nguyen',
});
// Ok
makeFullNameConstraint({ firstName: 'Dyno', lastName: 'Nguyen' });

// Use generic extends
const makeFullNameConstraintWithGeneric = <
	T extends { firstName: string; lastName: string },
>(
	obj: T,
) => {
	return { ...obj, fullname: `${obj.firstName} ${obj.lastName}` };
};
makeFullNameConstraintWithGeneric({
	name: 'Dyno',
	age: 18,
	firstName: 'Dyno',
	lastName: 'Nguyen',
});
// Generic extends rất cần thiết khi ta cần viết 1 hàm truyền vào 1 object và chưa biết chính xác nó có những gì. Nhưng chắc chắn nó phải có 1 vài thuộc tính nào đó cần trích xuất dề sử dụng.

// Ex:
const addNewEmployee = (emp: object) => {
	return { ...emp, uid: Date.now() };
};
const newEmp = addNewEmployee({ name: 'Dyno', age: 18 });
console.log(newEmp.uid);
console.log(newEmp.name); // Do prop: "name" chỉ tồn tại khi nó khởi chạy

// Dùng generic extends
const addNewEmployeeT = <T extends object>(emp: T) => {
	return { ...emp, uid: Date.now() };
};
const newEmp2 = addNewEmployeeT({ name: 'Dyno', age: 18 });
console.log(newEmp2.uid);
console.log(newEmp2.name);

/* --------------------------------
---------------  Generic in Interface  ---------------
-------------------------------- */

interface APIData<T> {
	id: string;
	name: string;
	data: T[];
}

const apiData: APIData<string> = {
	id: '123',
	name: 'name',
	data: ['1', '2'],
};
