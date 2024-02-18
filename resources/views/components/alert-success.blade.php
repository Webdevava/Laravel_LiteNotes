@if (session('success'))
    <div id="success-message" class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
        {!! $slot !!}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 10000); // 10 seconds
    </script>
@endif
