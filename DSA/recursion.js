// Recursion (Đệ quy) là cách thức thực thi một hàm và gọi lại chính nó cho đến khi gặp điều kiện dừng.

// Đệ quy rất hiệu quả trong nhiều trường hợp, có thể thay thế tốt cho vòng lặp. Tuy nhiên, nhiều trường hợp đệ quy gây lãng phí bộ nhớ và chậm chương trình (có thể crash - stack overflow).

/* 
Đệ quy cần có 2 yếu tố:
  - Điều kiện dừng: ở đk nhất định, function sẽ trả về kết quả hoặc dùng mà không cần gọi đệ quy
  - hàm đệ quy
*/

function fibonacciByLoop(n) {
	if (n <= 2) return 1;
	let fib1 = 1,
		fib2 = 1,
		fib = 0;
	for (let i = 3; i <= n; ++i) {
		fib = fib1 + fib2;
		fib1 = fib2;
		fib2 = fib;
	}
	return fib;
}

function fibonacciByRecursion(n) {
	// Điều kiện dừng
	if (n <= 2) return 1;

	// Hàm đệ quy
	return fibonacciByRecursion(n - 1) + fibonacciByRecursion(n - 2);
}

let result,
	n = 40;

// 3.376 ms ~ O(n)
console.time('fibonacciByLoop');
result = fibonacciByLoop(n);
console.log(`fibonacci(${n}) = ${result}`);
console.timeEnd('fibonacciByLoop');

// 875.69 ms ~ O(2^n)
console.time('fibonacciByRecursion');
result = fibonacciByRecursion(n);
console.log(`fibonacci(${n}) = ${result}`);
console.timeEnd('fibonacciByRecursion');
