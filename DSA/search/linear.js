export function linearSearch(keyword, data = []) {
	for (const [index, value] of data) {
		if (value === keyword) {
			return index;
		}
	}

	return -1;
}
