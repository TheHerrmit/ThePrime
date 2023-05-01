$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id,url){
    if(confirm('Xóa mà không thể khôi phục. Bạn có chắc không?')){
         $.ajax( {
             type:'DELETE',
             datetype:'JSON',
             data: {id},
             url: url,
             success: function (result){
                 if(result.error === false){
                     alert(result.message);
                     location.reload();
                 }else {
                     alert('Xóa lỗi. Vui long thử lại');
                 }
             }
         })
    }
}

//Upload file
$('#upload').change(function () {
    console.log(1123123);
    const form = new FormData();
    console.log($(this));
    console.log($(this)[0].files[0]);
    form.append( 'file',$(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results){
            console.log(results);
            console.log(results);



        }
    });
})

