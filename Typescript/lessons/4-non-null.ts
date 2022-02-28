/* --------------------------------
---------------  OPTIONAL & NON NULL  ---------------
-------------------------------- */
// Xuất hiện khi bật flag strict: true trong tsconfig

const addFunc = (a: number, b?: number): number => a + b;
// b -> Object is possibly 'undefined'
// Vì b là 1 biến optional nên nó có thể bị undefined, ta có thể giải quyết bằng 2 cách

// 1 - Check trước khi dùng
const addFuncWithCheck = (a: number, b?: number): number => (b ? a + b : a);
// 2 - Dùng toán tử NON NULL ! (báo với TS là mình sẽ chắc chắn truyền vào b khi code 🤣)
const addWithNonNull = (a: number, b?: number): number => a + b!;
