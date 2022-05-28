let playerSelected = [];
let editingPlayer = null;

function onCheckboxChange() {
	const deletePlayerBtn = $('#deletePlayerBtn');

	$('td input[type="checkbox"]').on('change', function () {
		const playerId = $(this).val();
		const isChecked = $(this).is(':checked');

		if (isChecked) {
			playerSelected.push(playerId);
			deletePlayerBtn.removeClass('d-none');
		} else {
			playerSelected = playerSelected.filter((id) => id != playerId);
			if (!playerSelected.length) {
				deletePlayerBtn.addClass('d-none');
			}
		}
	});
}

function updateEditPlayerModal(player = {}) {
	const {
		FullName,
		DOB,
		ClubID,
		Nationality,
		Number: PlayerNumber,
		Position,
	} = player;
	$('#FullName').val(FullName);
	$('#DOB').val(DOB);
	$('#ClubID').val(ClubID);
	$('#Nationality').val(Nationality);
	$('#Number').val(PlayerNumber);
	$('#Position').val(Position);
}

function getPlayerInModal() {
	return {
		FullName: $('#FullName').val(),
		DOB: $('#DOB').val(),
		ClubID: $('#ClubID').val(),
		Nationality: $('#Nationality').val(),
		Number: $('#Number').val(),
		Position: $('#Position').val(),
	};
}

jQuery(function () {
	const deletePlayerBtn = $('#deletePlayerBtn');

	$('#clubSelect').on('change', function () {
		const clubId = Number($(this).val());
		const url = new URL(location.href);

		if (!clubId || isNaN(clubId)) {
			url.searchParams.delete('clubId');
		} else {
			url.searchParams.set('clubId', clubId);
		}

		location.href = url.href;
	});

	$('#selectAll').on('change', function () {
		const isChecked = $(this).is(':checked');

		const checkboxes = $('td input[type="checkbox"]');
		playerSelected = [];

		checkboxes.each(function () {
			isChecked && playerSelected.push($(this).val());
			$(this).prop('checked', isChecked);
		});

		if (isChecked && playerSelected.length) {
			deletePlayerBtn.removeClass('d-none');
		} else {
			deletePlayerBtn.addClass('d-none');
		}
	});

	onCheckboxChange();

	deletePlayerBtn.on('click', function () {
		if (playerSelected.length) {
			const isConfirm = confirm(
				`Bạn có chắc muốn xoá các cầu thủ ${playerSelected.join(
					',',
				)}. Các dữ liệu liên quan đến cầu thủ này cũng sẽ bị xoá như trận đấu, bàn thắng. Dữ liệu sau xoá sẽ không thể khôi phục.`,
			);

			if (isConfirm) {
				const url = `${
					location.origin
				}/xoa-cau-thu?playerIds=${playerSelected.join(',')}`;

				fetch(url, { method: 'DELETE' }).then((response) => {
					if (response.status === 200) {
						alert('Xoá thành công');
						location.reload();
					} else {
						alert('Xoá thất bại');
					}
				});
			}
		}
	});

	$('.update-player').on('click', async function () {
		const playerId = $(this).attr('data-id');
		const apiRes = await fetch(
			`${location.origin}/player/getPlayerById/${playerId}`,
		);
		const player = await apiRes.json();
		if (player) {
			updateEditPlayerModal(player);
			editingPlayer = player;
		}
	});

	$('#updateBtn').on('click', async function () {
		const player = getPlayerInModal();
		const newPlayer = { ...player, PlayerID: editingPlayer.PlayerID };
		const apiRes = await fetch(`${location.origin}/player/updatePlayer`, {
			method: 'POST',
			headers: {
				'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8',
			},
			body: Object.entries(newPlayer)
				.map(([k, v]) => {
					return k + '=' + v;
				})
				.join('&'),
		});
		if (apiRes.status === 200) {
			alert('cập nhập thành công');
			location.reload();
		} else {
			alert('Cập nhật thất bại');
		}
	});
});
