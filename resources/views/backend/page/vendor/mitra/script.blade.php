<script>
    function getKota() {
        var kota_id = '';
        var prov_id = $('#prov_id').val();
        axios.post("{{url('carikotauser')}}", {
            'prov_id': prov_id,
        }).then(function(res) {
            console.log(res)
            var kota = res.data.kota
            for (var i = 0; i < kota.length; i++) {
                kota_id += "<option id='kota_id_pilihan' value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
            }
            $('#kota_id').html(kota_id)
        }).catch(function(err) {
            console.log(err);
        })
    }

    $('#prov_id').change(function(e) {
        e.preventDefault();
        getKota()
    });
</script>
