<script>
    let totalInput = document.getElementById("total");
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
            totalInput.value = tagihan_diskon
            getOngkir(tagihan_diskon);
        })
    });

    function getOngkir(diskon) {
        let data = []
        let idGudang = document.getElementById("id_gudang");
        let idBarang = Array.from(document.querySelectorAll("#id_barang"))

        idBarang.forEach(async (ib) => {
            let item = JSON.parse(localStorage.getItem(ib.value))
            if(item !== null && !isNaN(item.jumlah) && parseInt(item.jumlah) > 0) {
                data.push({...item, id:ib.value})
                let ongkir = await fetchOngkir(data ,idGudang)
                if(ongkir !== undefined) {
                    document.getElementById("ongkir").innerText = `Rp.${new Intl.NumberFormat().format(ongkir)}`
                    // document.getElementById("total_tagihan_seluruhnya").innerText = `Rp.${new Intl.NumberFormat().format(ongkir + diskon)}`
                    document.getElementById("jumlah_ongkir").value = ongkir
                    document.getElementById("total_tagihan_seluruhnya").innerText = `Rp.${new Intl.NumberFormat().format(parseInt(ongkir + diskon))}`
                }
            }
        });
    }

    async function fetchOngkir(data, idGudang) {
        // console.log(axios);
        let res = await axios.get("/api/cek-ongkir-mitra", {
            params: {
                idBarang: data ,
                idGudang: idGudang.value
            }
        });
        console.log(res.data);
        let ongkir = null;
        let costs = res.data[0].costs
        if(costs.length > 1) {
            let cost = costs[costs.length - 1].cost[0].value
            ongkir = cost
        } else {
            ongkir = costs[0].cost[0].value
        }
        return ongkir
    }

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
