function setSlugField(title) {
    let slug = generateSlug(title);
    document.getElementById('slugInput').value = slug;
}

function generateSlug(title) {
    return title
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
}


$('#delete').click(function(event) {

    var form = $(this).closest("form");

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
            form.submit();
        }
    })
});