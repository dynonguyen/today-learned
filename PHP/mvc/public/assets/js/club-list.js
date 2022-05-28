let page = 1;
const pageSize = typeof PAGE_SIZE !== 'undefined' ? Number(PAGE_SIZE) : 10;
const totalPage = typeof TOTAL_PAGE !== 'undefined' ? Number(TOTAL_PAGE) : 1;

function renderClubs(clubs = []) {
	let xml = '';
	clubs.forEach((club) => {
		xml += `<tr>
      <td>${club.ClubID}</td>
      <td>${club.ClubName}</td>
      <td>${club.Shortname}</td>
      <td>${club.StadiumName}</td>
      <td>${club.CoachName}</td>
			<td class='text-center'>
				<i class='bi bi-pencil me-3 cursor-pointer' title='Chỉnh sửa thông tin'></i>
				<a href='/danh-sach-cau-thu?clubId=${club.ClubID}' title='Danh sách cầu thủ'>
						<i class='bi bi-card-list'></i>
				</a>
			</td>
    </tr>`;
	});
	$('tbody').append(xml);
}

jQuery(function () {
	$('#loadMore').on('click', async function () {
		if (page < totalPage) {
			$(this).addClass('disabled');
			$(this).find('span').html('Đang tải dữ liệu ...');

			const apiRes = await fetch(
				`${location.origin}/danh-sach-clb-api?page=${page + 1}`,
			);
			if (apiRes.status === 200) {
				const docs = await apiRes.json();
				const clubs = docs.data;
				renderClubs(clubs);

				++page;
				if (page >= totalPage) {
					$(this).parent('div').remove();
				} else {
					$(this).removeClass('disabled');
					$(this)
						.find('span')
						.html(`Xem thêm ${totalPage - page} trang`);
				}
			}
		}
	});
});
