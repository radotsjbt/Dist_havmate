
<!-- Favicons -->
<link href="{{ asset("assets/img/logo-1.png") }}" rel="icon">
<link href="{{ asset("assets/img/logo-1.png") }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="{{ asset('https://fonts.gstatic.com') }}" rel="preconnect">
<link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/quill/quill.snow.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/quill/quill.bubble.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/remixicon/remixicon.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/simple-datatables/style.css") }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">

<!-- Include SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">



<meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<<<<<<< HEAD
=======
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="{{ asset('build/assets/app2.js') }}"></script>
>>>>>>> 373c0e618a37c52f082a47d0a86a39e852ac0444

    <!-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> -->

<!-- Include SweetAlert2 JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

{{-- Sweet alert --}}
<script src="{{ asset("https://unpkg.com/sweetalert/dist/sweetalert.min.js") }}"></script>
{{-- jquery --}}
<script src="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js") }}"></script>

{{-- sweetalert2 --}}
<script src="{{ asset("https://cdn.jsdelivr.net/npm/sweetalert2@11") }}"></script>

<!-- Vendor JS Files -->
<script src="{{ asset("assets/vendor/apexcharts/apexcharts.min.js") }}"></script>
<script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("assets/vendor/chart.js/chart.umd.js") }}"></script>
<script src="{{ asset("assets/vendor/echarts/echarts.min.js") }}"></script>
<script src="{{ asset("assets/vendor/quill/quill.min.js") }}"></script>
<script src="{{ asset("assets/vendor/simple-datatables/simple-datatables.js") }}"></script>
<script src="{{ asset("assets/vendor/tinymce/tinymce.min.js") }}"></script>
<script src="{{ asset("assets/vendor/php-email-form/validate.js") }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   

<!-- Template Main JS File -->
<script src="{{ asset("assets/js/main.js") }}"></script>


<script>

$(document).ready(function() {
    // Function to update the badge number
    function updateBadgeNumber(number) {
        $('#notificationBadge').text(number);
    }

    // AJAX call to fetch the data
    $.ajax({
        url: '{{route('getNotificationCount')}}', // Replace with your server endpoint
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Assuming the response contains the number you want to display
            var number = response.count;

            console.log(response.count);
            // Update the badge number
            updateBadgeNumber(number);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
});

</script>

