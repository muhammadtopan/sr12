function kategori(category_id, ceklis) {
    if (ceklis.checked) {
        // alert("ceklis Dihidupkan")
        axios.post("{{route('filter.kategori')}}", {
            'id': product_id,
        }).then(function(res) {
            // console.log(res.data.message)
            toastr.success(res.data.message)
        }).catch(function(err) {
            console.log(err);
        })
    } 
}