<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Responsive Sidebar</title>
    <style>
        /* Customize your sidebar styles */
        .sidebar {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>

<body>

    <button type="button" name="status_button" class="btn btn-danger btn-sm status_button" data-id="10" data-status="Inactive">Inactive</button>



    <script>
        $(document).on('click', '.statusBTN', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            var next_status = 'Active';
            if (status == 'Active') {
                next_status = 'Inactive';
            }
            if (confirm("Are you sure you want to " + next_status + " it?")) {

                $.ajax({

                    url: "official_action.php",

                    method: "POST",

                    data: {
                        id: id,
                        action: 'change_status',
                        status: status,
                        next_status: next_status
                    },

                    success: function(data) {

                        $('#message').html(data);

                        dataTable.ajax.reload();

                        setTimeout(function() {

                            $('#message').html('');

                        }, 5000);

                    }

                })

            }
        });
    </script>


    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>