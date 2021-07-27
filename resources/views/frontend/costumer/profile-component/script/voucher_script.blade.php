<script>
    let detailVoucher = document.querySelectorAll("#detail_voucher")
    let gambar = document.getElementById("gambar_voucher")
    let nama = document.getElementById("nama_voucher")
    let item = document.getElementById("item_voucher")
    let point = document.getElementById("point_voucher")
    let deskripsi = document.getElementById("deskripsi")

    detailVoucher.forEach(dv => {
        dv.addEventListener("click", async (e) => {
            let idVoucher = e.target.dataset.id
            let res = await axios.get("/api/get-detail-voucher", {
                params: {id: idVoucher}
            })
            console.log(res.data);
            gambar.src = `/dokumen/${res.data.gambar}`
            nama.value = res.data.nama_voucher
            item.value = res.data.item
            point.value = res.data.jumlah_point
            deskripsi.innerText = res.data.deskripsi_voucher
        })
    })

</script>
