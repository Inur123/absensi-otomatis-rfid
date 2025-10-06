<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Absen</title>
</head>
<body>
    <h1>Form Absen</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    @error('uuid')
        <p style="color:red">{{ $message }}</p>
    @enderror

   <form action="/data-absen" method="POST">
    @csrf
    <input type="text" name="uuid" placeholder="Masukkan UUID" required>
    <button type="submit">Absen</button>
</form>
</body>
</html>
