function renderSearchResult(players = []) {
	let xml = '';

	if (players.length) {
		players.forEach((player) => {
			const {
				FullName,
				PlayerID,
				Nationality,
				Position,
				DOB,
				ClubName,
				Number: PlayerNumber,
			} = player;
			const dobStr = DOB ? new Date(DOB).getFullYear() : '_';
			xml += `<tr>
        <td>${PlayerID}</td>
        <td>${FullName}</td>
        <td>${ClubName}</td>
        <td>${dobStr}</td>
        <td>${Position}</td>
        <td>${Nationality}</td>
        <td>${PlayerNumber}</td>
        <td class='text-center'><input class='form-check-input' type='checkbox' value='${PlayerID}'></td>
      </tr>`;
		});
	} else {
		xml +=
			"<tr><td colspan='8' class='text-center text-danger py-3'>Không tìm thấy kết quả phù hợp</td></tr>";
	}

	$('tbody').html(xml);
	onCheckboxChange();
}

jQuery(function () {
	$('#searchBtn').on('click', async function () {
		const playerName = $('#name').val().trim();
		const playerNumber = $('#number').val().trim();
		const nationality = $('#nationality').val().trim();

		if (!playerName && !playerNumber && !nationality) {
			return;
		}

		const url = new URL(`${location.origin}/tim-kiem-cau-thu-api`);
		if (playerName) url.searchParams.set('name', playerName);
		if (playerNumber) url.searchParams.set('number', playerNumber);
		if (nationality) url.searchParams.set('nationality', nationality);

		let searchResult = [];
		const apiRes = await fetch(url.href);
		if (apiRes.status === 200) {
			searchResult = await apiRes.json();
		}

		$('#searchResultText').html(
			`Có <b class='text-danger'>${searchResult.length}</b> phù hợp cho từ khoá trên`,
		);
		renderSearchResult(searchResult);
	});
});
