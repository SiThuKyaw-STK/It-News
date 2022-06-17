@if(session('alert'))
    <script>
        let alertInfo = @json(session('alert'));
        Swal.fire(
            alertInfo.title,
            alertInfo.message,
            alertInfo.icon
        )
    </script>
@endif
