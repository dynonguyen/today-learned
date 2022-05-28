const MAX_FULL_NAME = 100;
const MAX_PLAYER_NUMBER = 100;
const MAX_POSITION = 50;
const MAX_NATIONALITY = 50;
const MIN_AGE = 8;

function showError(msg = '') {
	$('#errorWrap').removeClass('d-none');
	$('#errorMsg').text(msg);
}

function calcAge(DOB) {
	const yearNow = new Date().getFullYear();
	const yearOfDOB = new Date(DOB).getFullYear();
	return yearNow - yearOfDOB;
}

jQuery(function () {
	$('#form').on('submit', function (e) {
		e.preventDefault();

		const FullName = $('#FullName').val().trim();
		const DOB = $('#DOB').val();
		const ClubID = $('#ClubID').val();
		const Position = $('#Position').val().trim();
		const Nationality = $('#Nationality').val().trim();
		const PlayerNumber = $('#Number').val();

		if (!FullName) return showError('Vui lòng nhập họ tên cầu thủ');
		if (!DOB) return showError('Vui lòng nhập ngày sinh của cầu thủ');
		if (!ClubID) return showError('Vui lòng chọn câu lạc bộ cầu thủ');
		if (!Position) return showError('Vui lòng nhập vị trí đá cầu thủ');
		if (!Nationality) return showError('Vui lòng nhập quốc tịch cầu thủ');
		if (isNaN(PlayerNumber)) return showError('Vui lòng nhập số áo cầu thủ');

		if (FullName.length > MAX_FULL_NAME)
			return showError(`Họ tên tối đa ${MAX_FULL_NAME} ký tự`);
		if (calcAge(DOB) < MIN_AGE)
			return showError(`Cầu thủ tối thiểu ${MIN_AGE} tuổi`);
		if (PlayerNumber < 0 || PlayerNumber > MAX_PLAYER_NUMBER)
			return showError(`Số áo tối thiểu 0 và tối đa ${MAX_PLAYER_NUMBER}`);
		if (Position.length > MAX_POSITION)
			return showError(`Vị trí tối đa ${MAX_POSITION} ký tự`);
		if (Nationality.length > MAX_NATIONALITY)
			return showError(`Quốc tịch tối đa ${MAX_NATIONALITY} ký tự`);

		this.submit();
	});
});
