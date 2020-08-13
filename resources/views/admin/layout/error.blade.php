@if ($errors->update->any())
    <div class="alert alert-danger">
        <h3>错误信息</h3>
        <ul>
            @foreach ($errors->update->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        setTimeout(function () {
            $(".alert").hide();
        },5000)
    </script>
@endif
