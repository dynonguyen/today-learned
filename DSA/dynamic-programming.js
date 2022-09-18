// Dynamic programing (Quy hoạch động) là một cách thức (tư duy) lập trình tái sử dụng lại kết quả mà không cần phải thực hiện lại việc tính toán phức tạp.

const fibonacciByRecursion = n => {
	if (n <= 2) return 1;
	return fibonacciByRecursion(n - 1) + fibonacciByRecursion(n - 2);
};

const fibonacciByMemoizeCache = (n, fibs = [0, 1, 1]) => {
	if (fibs[n]) return fibs[n];
	fibs[n] =
		fibonacciByMemoizeCache(n - 1, fibs) + fibonacciByMemoizeCache(n - 2, fibs);
	return fibs[n];
};

let result,
	n = 40;

// 4.036 ms ~ O(n)
console.time('fibonacciByMemoizeCache');
result = fibonacciByMemoizeCache(n);
console.log(`fibonacci(${n}) = ${result}`);
console.timeEnd('fibonacciByMemoizeCache');

// 844.848ms ~ O(2^n)
console.time('fibonacciByRecursion');
result = fibonacciByRecursion(n);
console.log(`fibonacci(${n}) = ${result}`);
console.timeEnd('fibonacciByRecursion');
