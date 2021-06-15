<script>
    // Cara Mengambil Kota Berdasarkan Provinsi
    $('#prov_id').change(function(e) {
        e.preventDefault();
        var kota_id = '';
        var prov_id = $('#prov_id').val();
        axios.post("{{url('carikotauser')}}", {
            'prov_id': prov_id,
        }).then(function(res) {
            console.log(res)
            var kota = res.data.kota
            for (var i = 0; i < kota.length; i++) {
                kota_id += "<option value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
            }
            $('#kota_id').html(kota_id)
        }).catch(function(err) {
            console.log(err);
        })
    });

    let kota = document.getElementById("kota_id")
    let prov = document.getElementById("prov_id")

    async function vendorDalamKota(e,qtyParam,product_idParam) {
        let kota_value = e.value
        let prov_value = prov.value
        let qty = qtyParam
        let product_id = product_idParam

        try {
            let res = await axios("http://localhost:8000/api/get-vendor-dalam-kota", {
                params: {
                    prov_baru: prov_value,
                    kota_baru: kota_value,
                    qty: qty,
                    product_id: product_id
                }
            })
            console.log(res.data);
            let vendor = document.getElementById("vendor")
            let data = res.data
            let option = "";

            data.forEach(d => {
                option+= `<option value="${d.user_id}">${d.nama_lengkap}</option>`
            })
            vendor.innerHTML = option
        } catch (error) {
            console.error(error);
        }

    }

    let total = document.getElementById("total").innerText.split(",").join("")
    localStorage.setItem("old", total)
    document.getElementById("total").innerText = new Intl.NumberFormat().format(parseInt(total) + parseInt(data[0].costs[0].cost[0].value))

    async function cekOngkir(e) {
        let kota_value = kota.value
        let vendor_id = e.value
        try {
            let res = await axios.get('/api/cek-ongkir', {
                params: {
                    destination: document.getElementById("kota_id").value,
                    vendor: vendor_id
                }
            })
            let data = res.data;
            let option = ""
            console.log(data);
            data[0].costs.forEach(c => {
                option += `<option value="${c.cost[0].value}"> Ongkir: ${new Intl.NumberFormat().format(c.cost[0].value)} Deskripsi: ${c.description} Estimasi: ${c.cost[0].etd} hari </option>`
            })
            document.getElementById("jenis_kirim").innerHTML = option
            document.getElementById("jenis_kirim_container").style.display = "initial"
            document.getElementById("total").innerText = new Intl.NumberFormat().format(parseInt(total) + parseInt(data[0].costs[0].cost[0].value))

        } catch (error) {
            console.error(error);
        }

    }

    function changeTotal(e) {
        let old = parseInt(localStorage.getItem("old"))
        let value = e.value
        document.getElementById("total").innerText = new Intl.NumberFormat().format(old + parseInt(value))
    }

</script>
