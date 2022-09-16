window.addEventListener('load', function () {
    const delete_group = document.querySelectorAll('.delete_group');
    console.log(delete_group);
    [...delete_group].forEach(item => item.addEventListener('click', function (e) {
        e.preventDefault();
        let that = this;
        if (e.target.matches('.delete_group i')) {
            let href = e.target.parentElement.getAttribute('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        contentType: "application/json",
                        url: "href",
                        dataType: 'text',
                        success: function (data) {
                            that.parentElement.parentElement.remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        },
                        error: function (e) {



                        }
                    });

                }
            })


        }
    }))
})