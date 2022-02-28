// Utility Types
// https://www.typescriptlang.org/docs/handbook/utility-types.html

/* --------------------------------
---------------  Partial<Type>  ---------------
-------------------------------- */
// Set all props of Type to optional
interface Todo {
	title: string;
	description: string;
}

function updateTodo(todo: Todo, fieldsToUpdate: Partial<Todo>) {
	return { ...todo, ...fieldsToUpdate };
}

const todo1 = {
	title: 'organize desk',
	description: 'clear clutter',
};

const todo2 = updateTodo(todo1, {
	description: 'throw out trash',
});

/* --------------------------------
---------------  Required<Type>  ---------------
-------------------------------- */
// Set all props of Type to required

interface Props {
	a?: number;
	b?: string;
}

const obj: Props = { a: 5 };

const obj2: Required<Props> = { a: 5 };

/* --------------------------------
---------------  Readonly<Type>  ---------------
-------------------------------- */
// Set all props of Type to readonly

/* --------------------------------
---------------  Record<Keys, Type>  ---------------
-------------------------------- */
//  Tạo ra 1 object mới với các keys là Keys và giá trị cho mỗi key đều là Type
interface CatInfo {
	age: number;
	breed: string;
}

type CatName = 'miffy' | 'boris' | 'mordred';

const cats: Record<CatName, CatInfo> = {
	miffy: { age: 10, breed: 'Persian' },
	boris: { age: 5, breed: 'Maine Coon' },
	mordred: { age: 16, breed: 'British Shorthair' },
};

/* --------------------------------
---------------  Pick<Type, Keys>  ---------------
-------------------------------- */
// Get some props with keys from Type
interface Todo {
	title: string;
	description: string;
	completed: boolean;
}

type TodoPreview = Pick<Todo, 'title' | 'completed'>;

const todo: TodoPreview = {
	title: 'Clean room',
	completed: false,
};

/* --------------------------------
---------------  Omit<Type, Keys>  ---------------
-------------------------------- */
// Get all props except keys
interface Todo {
	title: string;
	description: string;
	completed: boolean;
	createdAt: number;
}

type TodoPreview = Omit<Todo, 'description'>;

const todo: TodoPreview = {
	title: 'Clean room',
	completed: false,
	createdAt: 1615544252770,
};

/* --------------------------------
---------------  ReturnType<Type>  ---------------
-------------------------------- */
// Trả về kiểu dữ liệu cũa một hàm nào đó
type T0 = ReturnType<() => string>; // T0 = string

// ...
