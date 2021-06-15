{{-- Kode Referal --}}
<script>
    let url = window.location.pathname;
    let arr = url.split("/");

    if(arr[4] !== undefined) {
        (async function() {
            let res = await axios.get("http://localhost:8000/api/check-referal", {params:{referal:arr[4]}})
            const {status} = res.data;
            if(status === "ok") {
                sessionStorage.setItem("referal",arr[4])
            } else {
                window.history.pushState("","",`/user/register/`);
            }
        })()
    }

</script>

{{-- Kota Berdasarkan Provinsi --}}
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
    $('#prov_idm').change(function(e) {
        e.preventDefault();
        var kota_idm = '';
        var prov_idm = $('#prov_idm').val();
        axios.post("{{url('carikotauser')}}", {
            'prov_id': prov_idm,
        }).then(function(res) {
            console.log(res)
            var kota = res.data.kota
            for (var i = 0; i < kota.length; i++) {
                kota_idm += "<option value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
            }
            $('#kota_idm').html(kota_idm)
        }).catch(function(err) {
            console.log(err);
        })
    });
</script>
