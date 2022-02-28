class Student {
	public name: string;
	private avg: number = 0; // gán giá trị mặc định
	protected gender: boolean;
	readonly id: string;

	constructor(n: string, a: number, g: boolean, id: string) {
		this.name = n;
		this.avg = a;
		this.gender = g;
		this.id = id;
	}
}

// create an instance
const student = new Student('Dyno', 18, true, '1');
console.log(student);
console.log(typeof student); // object
console.log(student instanceof Student); // true

console.log(student.id);
console.log(student.name);

console.log(student.avg); // không thễ truy cập vào private và protected từ bên ngoài
console.log(student.gender);

student.id = 1; // không thể thay đổi thuộc tính readonly

/* --------------------------------
---------------  Khai báo ngắn hơn  ---------------
-------------------------------- */

class Person {
	constructor(
		public name: string,
		private age: number,
		protected gender: boolean,
		readonly id: string,
	) {}
}

const person = new Person('Dyno', 18, true, '123');
