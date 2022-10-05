<div id="notice"></div>

@if (isset($_GET['login_status']) && isset($_SESSION['username'])) {
        @if ($_GET['login_status'] == '1') {
            <script> callNotice("Welcome, '.$_SESSION['username'].'!") </script>
        }
        @endif
    }
@endif