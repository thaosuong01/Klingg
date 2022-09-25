window.addEventListener('load', function () {
    //Group
    const delete_group = document.querySelectorAll('.delete_group');
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
                        url: href,
                        dataType: 'text',
                        success: function (data) {
                            if (+data > 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "There are "+(data)+" users in the group. Can't delete user group!",
                                    footer: '<a href="">Why do I have this issue?</a>'
                                })
                            }
                            else {
                                if (+data == -1) {
                                    that.parentElement.parentElement.remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your group has been deleted.',
                                        'success'
                                    )
                                }
                                else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: "System error!",
                                        footer: '<a href="">Why do I have this issue?</a>'
                                    })
                                }
                            }
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });

                }
            })
        }
    }))

    // User
    const delete_user = document.querySelectorAll('.delete_user');
    [...delete_user].forEach(item => item.addEventListener('click', function (e) {
        e.preventDefault();
        let that = this;
        if (e.target.matches('.delete_user i')) {
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
                        url: href,
                        dataType: 'text',
                        success: function (data) {
                            if (+data > 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    footer: '<a href="">Why do I have this issue?</a>'
                                })
                            }
                            else {
                                if (+data == -1) {
                                    that.parentElement.parentElement.remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'User has been deleted.',
                                        'success'
                                    )
                                }
                                else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: "System error!",
                                        footer: '<a href="">Why do I have this issue?</a>'
                                    })
                                }
                            }
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });

                }
            })
        }
    }))
})