const MAX_CLUB_NAME = 50;
const MAX_CLUB_SHORTNAME = 10;

function showError(msg = '') {
	$('#errorWrap').removeClass('d-none').addClass('d-flex flex-column');
	$('#errorMsg').text(msg);
}

jQuery(function () {
	$('#form').on('submit', function (e) {
		e.preventDefault();

		const ClubName = $('#ClubName').val().trim();
		const Shortname = $('#Shortname').val().trim();
		const StadiumID = $('#StadiumID').val();
		const CoachID = $('#CoachID').val();

		if (!ClubName) return showError('Vui lòng nhập tên CLB');
		if (!Shortname) return showError('Vui lòng nhập tên viết tắt của CLB');
		if (!StadiumID) return showError('Vui lòng chọn SVĐ');
		if (!CoachID) return showError('Vui lòng chọn HLV');

		if (ClubName > MAX_CLUB_NAME)
			return showError(`Tên CLB tối đa ${MAX_CLUB_NAME} ký tự`);
		if (Shortname > MAX_CLUB_SHORTNAME)
			return showError(`Tên viết tắt CLB tối đa ${MAX_CLUB_SHORTNAME} ký tự`);

		this.submit();
	});
});
