<script>
    let input = document.querySelectorAll("#stock_input")
    let tagihan = document.getElementById("total_tagihan")
    let diskon = document.getElementById("total_tagihan_diskon")
    let pesan = document.getElementById("pesan-alert")
    let level = document.getElementById("level").value
    let tagihan_diskon = 0
    let discount = {
        "agen": {
            "dis": 40,
            "min": 3333334
        },
        "sub-agen": {
            "dis": 30,
            "min": 1428572
        },
        "reseller": {
            "dis": 20,
            "min": 50000
        }
    }
    let harga = {
        "40": 3333334,
        "30": 1428572,
        "20": 50000
    }
    let total = 0;

    resetStorage()

    input.forEach(i => {
        i.addEventListener("input", (e) => {
            let id = e.target.dataset.id
            let harga = e.target.dataset.harga
            let jumlah = e.target.value

            if(total == 0) {
                total += jumlah * harga
            } else {
                setTotal(id, jumlah, harga)
            }
            setStorage(id, jumlah, harga)
            if(total < discount[level].min) {
                tagihan_diskon = discountMin(total, discount[level].dis)
            } else {
                pesan.innerText = `Saat ini kamu mendapatkan diskon ${discount[level].dis}%`
                tagihan_diskon = parseInt(total) - (parseInt(total) * parseInt(discount[level].dis) / 100)
            }
            diskon.innerText = `Rp.${new Intl.NumberFormat().format(tagihan_diskon)}`
            tagihan.innerText = `Rp.${new Intl.NumberFormat().format(total)}`
        })
    });

    function discountMin(total, dis) {
        let newDis = parseInt(dis) - 10
        let newMin = harga[newDis]
        let newTotal = parseInt( total) - (parseInt(total) * parseInt(newDis) / 100)
        if(newMin !== undefined) {
            pesan.innerText = `Saat ini kamu menggunakan hanya dapat diskon ${newDis}%, tambah pesanan kamu untuk dapat diskon lebih banyak`
            console.log(newTotal, " ", newMin, " ",newDis, " ",newTotal < newMin);
            if(newTotal < newMin) {
                discountMin(newTotal, newDis)
            } else {
                return newTotal
            }
        }
        return newTotal
    }

    function resetStorage() {
        input.forEach(i => {
            localStorage.removeItem(i.dataset.id)
        })
    }

    function setStorage(id, jumlah, harga) {
        localStorage.setItem(id, JSON.stringify({
            "jumlah": jumlah,
            "harga": harga
        }))
    }

    function setTotal(id, jumlah, harga) {
        let before = JSON.parse(localStorage.getItem(id))
        before !== null ?  total -= before.jumlah * before.harga : ""
        total += jumlah * harga
    }

</script>
